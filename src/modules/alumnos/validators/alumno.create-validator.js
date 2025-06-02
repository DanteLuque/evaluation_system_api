import Joi from 'joi';

export const createAlumnoSchema = Joi.object({
  nombres: Joi.string()
    .max(70)
    .required()
    .messages({
      'string.base': 'Los nombres deben ser una cadena de texto',
      'string.empty': 'Los nombres no pueden estar vacíos',
      'string.max': 'Los nombres no pueden exceder los 70 caracteres',
      'any.required': 'Los nombres son obligatorios'
    }),

  apellidos: Joi.string()
    .max(70)
    .required()
    .messages({
      'string.base': 'Los apellidos deben ser una cadena de texto',
      'string.empty': 'Los apellidos no pueden estar vacíos',
      'string.max': 'Los apellidos no pueden exceder los 70 caracteres',
      'any.required': 'Los apellidos son obligatorios'
    }),

  dni: Joi.string()
    .length(8)
    .pattern(/^\d+$/)
    .required()
    .messages({
      'string.base': 'El DNI debe ser una cadena de texto',
      'string.empty': 'El DNI no puede estar vacío',
      'string.length': 'El DNI debe tener exactamente 8 caracteres',
      'string.pattern.base': 'El DNI debe contener solo números',
      'any.required': 'El DNI es obligatorio'
    })
});
