import { BaseController } from "../../shared/controller-base.js";
import Alumno from "../models/alumno.model.js";
import { createAlumnoSchema } from "../validators/alumno.create-validator.js";
import { updateAlumnoSchema } from "../validators/alumno.update-validator.js";

class AlumnoController extends BaseController {
  async getAll(_, res) {
    try {
      const alumnos = await Alumno.getAll(this.getDbPool());
      res.json(alumnos);
    } catch (error) {
      this.handleError(resizeBy, 500, "Error al obtener a los alumnos");
    }
  }

  async getById(req, res) {
    try {
      const id = parseInt(req.params.id);
      const alumno = await Alumno.getById(this.getDbPool(), id);

      if (!alumno) return res.status(404).json({ message: "Zombie no encontrado" });
      res.json(alumno);
    } catch (error) {
      this.handleError(res, 500, error, "Error al obtener el zombie");
    }
  }

  async create(req, res) {
    try {
      const { error: validationError, value } = createAlumnoSchema.validate(req.body, { abortEarly: false });
      if (validationError) {
        return res.status(400).json({
          message: "Validación fallida",
          details: validationError.details.map(d => d.message)
        });
      }

      const exists = await Alumno.exists(this.getDbPool(), value.dni);
      if (exists) {
        return res.status(400).json({ message: "Ya existe un alumno con este dni" });
      }

      const alumno = new Alumno(
        null,
        value.nombres,
        value.apellidos,
        value.dni,
      );
      const result = await alumno.create(this.getDbPool());

      res.status(201).json({ message: "alumno creado", id: result.insertId });
    } catch (error) {
      this.handleError(res, 500, error, "Error al crear el alumno");
    }
  }

}

export default new AlumnoController();