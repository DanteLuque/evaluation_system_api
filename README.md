# 🧠 Sistema de Evaluación - API REST en PHP

Este proyecto es una API REST construida en PHP para gestionar un sistema de evaluaciones por área de conocimiento. Incluye funcionalidades para gestionar áreas, evaluaciones, preguntas, alternativas y desarrollo de evaluaciones.

## 🚀 Tecnologías Utilizadas

- 🐘 PHP
- 🛠️ Composer
- 🐬 MySQL
- 📂 Arquitectura modular (MVC simplificado)
- 📄 Archivos SQL con datos de prueba
---

## 📦 Estructura del Proyecto
```
danteluque-evaluation_system_api/  
├── public/ # Punto de entrada (index.php)  
├── src/  
│ ├── config/ # Configuración y scripts de DB  
│ ├── modules/ # Módulos organizados por dominio  
│ └── server.php # Registro de rutas y dispatch  
├── .env.example # Variables de entorno  
├── composer.json # Dependencias PHP  
└── README.md # Este archivo
```
---

## ⚙️ Instalación del Proyecto

### 🐬 1. Crear y Poblar la Base de Datos

1. Crear la base de datos y tablas:
```
   Ejecutar src/config/mysql/Database/base.sql
```
2. Insertar los registros base:
```
Ejecutar en orden:
- inserts/areas.sql
- inserts/evaluaciones.sql
- inserts/preguntas.sql
```
3. Insertar las alternativas por tecnología:
```
Ejecutar cada uno:
- inserts/alternativas/java.sql
- inserts/alternativas/php.sql
- inserts/alternativas/python.sql
- inserts/alternativas/c#.sql
- inserts/alternativas/javascript.sql
```
4. Insertar alumnos y sus desarrollos:
```
- inserts/alumnos.sql
- inserts/desarrollo_evaluacion.sql
```
5. Ejecutar consultas de prueba:
```
- queries/tarea_seminario.sql
```

### 🖥️ 2. Configurar Servidor Local con XAMPP

1.  📁 Clona o mueve el proyecto a la carpeta `htdocs`:
```
C:\xampp\htdocs\danteluque-evaluation_system_api
```
2. ⚙️ Crea un archivo .env con el mismo contenido de .env.example:
>Nota: Ajusta los valores si tu base de datos no usa las credenciales por defecto.

3. 📥 Instala dependencias:
```
composer install
```

4. 🔥 Inicia XAMPP:
    
    -   Levanta **Apache** y **MySQL** desde el panel.
        
5.  🌐 Ruta base para las pruebas en postman:
```
http://localhost/danteluque-evaluation_system_api/public
```
---
## 🧾 Endpoints disponibles (ejemplo)

Actualmente solo están registradas rutas para evaluaciones:

| Método | Endpoint                        | Descripción                      |
|--------|----------------------------------|----------------------------------|
| GET    | `/api/v1/evaluaciones`          | Obtener todas las evaluaciones  |
| GET    | `/api/v1/evaluaciones/{id}`     | Obtener una evaluación por ID   |
| POST   | `/api/v1/evaluaciones`          | Crear una nueva evaluación      |
---

## 🧪 Ejecutar archivos de prueba desde la Shell de XAMPP

Puedes probar los modelos individualmente desde la **Shell de XAMPP** . Simplemente navega a la carpeta del test y ejecuta el script correspondiente.

📌 Ejemplo para el modelo`preguntas`:
```
php create.php
```
```
php getAll.php
```
```
php getById.php
```