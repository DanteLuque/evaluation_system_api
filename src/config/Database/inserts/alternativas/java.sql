# JAVA

-- Pregunta 1: ¿Qué es la JVM? (ID_PREGUNTA = 1)
INSERT INTO ALTERNATIVAS (ENUNCIADO, ES_CORRECTA, ID_PREGUNTA, created_at, updated_at) VALUES
('Un compilador de código Java a código máquina.', FALSE, 1, NOW(), NOW()),
('Un entorno de desarrollo para Java.', FALSE, 1, NOW(), NOW()),
('Una biblioteca de clases estándar.', FALSE, 1, NOW(), NOW()),
('Una máquina virtual que ejecuta bytecode de Java.', TRUE, 1, NOW(), NOW()),
('Una base de datos usada por Java.', FALSE, 1, NOW(), NOW());

-- Pregunta 2: ¿Qué diferencia hay entre JDK y JRE? (ID_PREGUNTA = 2)
INSERT INTO ALTERNATIVAS (ENUNCIADO, ES_CORRECTA, ID_PREGUNTA, created_at, updated_at) VALUES
('JDK es solo para usuarios finales, JRE es para desarrolladores.', FALSE, 2, NOW(), NOW()),
('JDK incluye herramientas de desarrollo, JRE solo permite ejecutar aplicaciones.', TRUE, 2, NOW(), NOW()),
('JDK contiene la JVM, pero JRE no.', FALSE, 2, NOW(), NOW()),
('Ambos son lo mismo, solo cambian de nombre.', FALSE, 2, NOW(), NOW()),
('JRE se usa para compilar código Java.', FALSE, 2, NOW(), NOW());

-- Pregunta 3: ¿Qué es una excepción en Java? (ID_PREGUNTA = 3)
INSERT INTO ALTERNATIVAS (ENUNCIADO, ES_CORRECTA, ID_PREGUNTA, created_at, updated_at) VALUES
('Un tipo de variable especial.', FALSE, 3, NOW(), NOW()),
('Una herramienta para depurar código.', FALSE, 3, NOW(), NOW()),
('Un error en tiempo de ejecución que puede ser manejado.', TRUE, 3, NOW(), NOW()),
('Una condición de éxito del programa.', FALSE, 3, NOW(), NOW()),
('Un tipo de método.', FALSE, 3, NOW(), NOW());

-- Pregunta 4: ¿Qué son los generics en Java? (ID_PREGUNTA = 4)
INSERT INTO ALTERNATIVAS (ENUNCIADO, ES_CORRECTA, ID_PREGUNTA, created_at, updated_at) VALUES
('Una forma de definir interfaces gráficas.', FALSE, 4, NOW(), NOW()),
('Un tipo de excepción personalizada.', FALSE, 4, NOW(), NOW()),
('Una manera de escribir código que puede trabajar con diferentes tipos.', TRUE, 4, NOW(), NOW()),
('Un conjunto de bibliotecas para bases de datos.', FALSE, 4, NOW(), NOW()),
('Un nombre alternativo para las clases abstractas.', FALSE, 4, NOW(), NOW());

-- Pregunta 5: ¿Qué es una clase abstracta? (ID_PREGUNTA = 5)
INSERT INTO ALTERNATIVAS (ENUNCIADO, ES_CORRECTA, ID_PREGUNTA, created_at, updated_at) VALUES
('Una clase que no puede contener métodos.', FALSE, 5, NOW(), NOW()),
('Una clase que no puede heredar de otras.', FALSE, 5, NOW(), NOW()),
('Una clase que puede tener métodos definidos y no definidos.', TRUE, 5, NOW(), NOW()),
('Una clase utilizada solo para interfaces gráficas.', FALSE, 5, NOW(), NOW()),
('Una clase con todos sus métodos estáticos.', FALSE, 5, NOW(), NOW());
