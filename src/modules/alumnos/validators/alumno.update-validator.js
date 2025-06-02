import Joi from 'joi';

export const updateAlumnoSchema = Joi.object({
    nombres: Joi.string()
        .max(70)
        .optional()
        .messages({
            'string.base': 'Los nombres deben ser una cadena de texto',
            'string.max': 'Los nombres no pueden exceder los 70 caracteres'
        }),

    apellidos: Joi.string()
        .max(70)
        .optional()
        .messages({
            'string.base': 'Los apellidos deben ser una cadena de texto',
            'string.max': 'Los apellidos no pueden exceder los 70 caracteres'
        }),

    dni: Joi.string()
        .length(8)
        .pattern(/^\d+$/)
        .optional()
        .messages({
            'string.base': 'El DNI debe ser una cadena de texto',
            'string.length': 'El DNI debe tener exactamente 8 caracteres',
            'string.pattern.base': 'El DNI debe contener solo números'
        })
});
F