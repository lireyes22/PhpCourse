CREATE TABLE usuarios (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    nameUser VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    numTelefono VARCHAR(20) NOT NULL,
    sexo ENUM('M', 'F', 'O') NOT NULL
);
/* 2023-04-11 14:19:01 [3 ms] */ 
INSERT INTO usuarios (nameUser, password, email, nombre, apellidos, edad, numTelefono, sexo) VALUES
    ('usuario1', 'pass1', 'usuario1@example.com', 'Juan', 'Pérez García', 25, '555-1234', 'M'),
    ('usuario2', 'pass2', 'usuario2@example.com', 'María', 'González López', 32, '555-5678', 'F'),
    ('usuario3', 'pass3', 'usuario3@example.com', 'Pedro', 'Ramírez Gómez', 45, '555-9012', 'M'),
    ('usuario4', 'pass4', 'usuario4@example.com', 'Ana', 'Martínez Rodríguez', 27, '555-3456', 'F'),
    ('usuario5', 'pass5', 'usuario5@example.com', 'Jorge', 'Hernández Sánchez', 38, '555-7890', 'M');
/* 2023-04-19 03:09:26 [6 ms] */ 
USE prueba;
CREATE PROCEDURE LoginDts (
    IN vNameUser VARCHAR(50), 
    IN vPassword VARCHAR(50)
)
BEGIN
    SELECT * FROM usuarios WHERE nameUser = vNameUser AND password = vPassword;
END;
/* 2023-04-19 03:19:28 [4 ms] */ 
INSERT INTO usuarios(`idUser`,`nameUser`,password,email,nombre,apellidos,edad,`numTelefono`,sexo) VALUES(6,'li','123','li@example.com','Li','Reyes Varguez',20,'9837336211','M');
/* 2023-04-19 03:26:59 [2 ms] */ 
CREATE PROCEDURE ShowTitlesColumns (
    IN vNameTable VARCHAR(255)
)
BEGIN
    SELECT COLUMN_NAME 
    FROM information_schema.columns 
    WHERE TABLE_NAME = vNameTable;
END;
/* 2023-04-19 04:15:24 [4 ms] */ 
CREATE PROCEDURE ShowTables(IN tabla VARCHAR(50))
BEGIN
  SET @query = CONCAT('SELECT * FROM ', tabla);
  PREPARE stmt FROM @query;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
END;

CREATE PROCEDURE ShowTitleTables ()
BEGIN
    SELECT table_name
    FROM information_schema.tables
    WHERE table_schema = DATABASE();
END

