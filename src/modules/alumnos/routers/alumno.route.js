import { Router } from "express";
import alumnoController from "../controllers/alumno.controller.js";

const AlumnoRouter = Router();

AlumnoRouter.get("/", (req, res) => alumnoController.getAll(req, res));

AlumnoRouter.get("/:id", (req, res) => alumnoController.getById(req, res));

AlumnoRouter.post("/", (req, res) => alumnoController.create(req, res));

export default AlumnoRouter;