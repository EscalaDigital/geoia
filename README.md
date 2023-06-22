# geoia
Pequeña solución de cartografía colaborativa creada 100% con IA

Este código se generó como parte del estudio científico llamado "DESARROLLO DE HERRAMIENTAS DE CARTOGRAFÍA COLABORATIVA MEDIANTE EL USO DE INTELIGENCIA ARTIFICIAL"

Es libre de usarlo como desee

La consulta SQL para crear la BD es

CREATE DATABASE mapa;
USE mapa;

CREATE TABLE usuarios (
  email VARCHAR(255) PRIMARY KEY,
  nombre VARCHAR(255),
  clave VARCHAR(255)
);

CREATE TABLE elemento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  descripcion TEXT,
  fecha_toma DATE,
  email VARCHAR(255),
  FOREIGN KEY (email) REFERENCES usuarios(email)
);

CREATE TABLE ubicacion (
  id INT PRIMARY KEY,
  coordenadas GEOMETRY,
  id_elemento INT,
  FOREIGN KEY (id_elemento) REFERENCES elemento(id)
);
