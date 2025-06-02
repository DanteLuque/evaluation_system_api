import { BaseController } from "../../shared/controller-base.js";
import Alumno from "../models/alumno.model.js";

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

}

export default new AlumnoController();