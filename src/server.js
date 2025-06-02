import express from 'express';
import db from './config/mysql/mysql.js';
import AlumnoRouter from './modules/alumnos/routers/alumno.route.js';

class Server {
  constructor() {
    this.app = express();
    this.port = process.env.PORT;
    this.alumno_path = '/api/v1/alumno';

    this.connectDB();
    this.middlewares();
    this.routes();
  }

  listen() {
    this.app.listen(this.port, () => {
      console.log(`👾 I'M ALIVE => PORT: ${this.port}`);
    });
  }

  async connectDB() {
    await db.testConnection();
  }

  middlewares() {
    this.app.use(express.json());
  }

  routes() {
    this.app.use(this.alumno_path, AlumnoRouter);
  }
}

export default Server;