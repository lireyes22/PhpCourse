
CREATE DATABASE IF NOT EXISTS Ventas;

USE Ventas;

CREATE TABLE IF NOT EXISTS Articulos (
    cveArticulo varchar(13) PRIMARY KEY,
    descripcion varchar(50),
    descuento int(2),
    iva int(2),
    precio float(3)
);

CREATE TABLE IF NOT EXISTS Existencias (
    cveArticulo varchar(13),
    existencia int(11),
    FOREIGN KEY (cveArticulo) REFERENCES Articulos(cveArticulo) ON DELETE CASCADE
);

INSERT INTO Articulos (cveArticulo, descripcion, descuento, iva, precio) VALUES 
('ART-001', 'Laptop HP', 10, 16, 15000.00),
('ART-002', 'Teléfono Samsung', 5, 16, 8000.00),
('ART-003', 'Impresora Epson', 15, 16, 5000.00),
('ART-004', 'Monitor LG', 8, 16, 4000.00),
('ART-005', 'Tablet Lenovo', 12, 16, 7000.00);

INSERT INTO Existencias (cveArticulo, existencia) VALUES 
('ART-001', 20),
('ART-002', 15),
('ART-003', 10),
('ART-004', 5),
('ART-005', 18);
