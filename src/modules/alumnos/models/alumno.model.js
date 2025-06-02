import ModelBase from "../../shared/model-base.js";

class Alumno extends ModelBase {
  constructor(
    id = null,
    nombres,
    apellidos,
    dni
  ) {
    super();
    this.id = id,
      this.nombres = nombres,
      this.apellidos = apellidos,
      this.dni = dni
  }

  static async getById(conexion, id) {
    const [result] = await conexion.query(
      "SELECT * FROM ALUMNOS WHERE ID = ? AND deleted_at IS NULL",
      [id]
    );
    return result[0];
  }

  static async getAll(conexion) {
    const [result] = await conexion.query(
      "SELECT * FROM ALUMNOS WHERE deleted_at IS NULL"
    );
    return result;
  }

  async create(conexion) {
    const now = new Date();
    this.created_at = now;
    this.updated_at = now;

    const [result] = await conexion.query(
      `INSERT INTO ALUMNOS 
             (NOMBRES, APELLIDOS, DNI, created_at, updated_at)
             VALUES (?, ?, ?, ?, ?)`,
      [
        this.nombres,
        this.apellidos,
        this.dni,
        this.created_at,
        this.updated_at
      ]
    );
    this.id = result.insertId;
    return result;
  }

  async update(conexion) {
    this.updated_at = new Date();

    const [result] = await conexion.query(
      `UPDATE ALUMNOS
             SET NOMBRES = ?, APELLIDOS = ?, DNI = ?
             WHERE ID = ? AND deleted_at IS NULL`,
      [
        this.nombres,
        this.apellidos,
        this.dni,
        this.updated_at,
        this.id
      ]
    );
    return result;
  }

  static async softDelete(conexion, id) {
    const deleted_at = new Date();
    const [result] = await conexion.query(
      `UPDATE ALUMNOS SET deleted_at = ? WHERE ID = ? AND deleted_at IS NULL`,
      [deleted_at, id]
    );
    return result;
  }

  static async exists(conexion, dni) {
    const [result] = await conexion.query(
      "SELECT COUNT(*) AS count FROM ALUMNOS WHERE DNI = ? AND deleted_at IS NULL",
      [dni]
    );
    return result[0].count > 0;
  }
}

export default Alumno;