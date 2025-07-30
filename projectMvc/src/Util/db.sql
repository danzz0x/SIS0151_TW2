CREATE DATABASE project;
CREATE TABLE Productos{
  id int PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(100) NOT NULL,
  cantidad int NOT NULL,
  precio decimal(10, 2) NOT NULL,
  descripcion text,
  imagen varchar(255),
  disponible boolean
}
CREATE TABLE venta{
  id int PRIMARY KEY AUTO_INCREMENT,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
  total decimal(10, 2) NOT NULL,
  user_id bigint unsigned NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
}
CREATE TABLE detalle_venta{
  id int PRIMARY KEY AUTO_INCREMENT,
  venta_id int NOT NULL,
  producto_id int NOT NULL,
  cantidad int NOT NULL,
  precio decimal(10, 2) NOT NULL,
  FOREIGN KEY (venta_id) REFERENCES venta(id),
  FOREIGN KEY (producto_id) REFERENCES Productos(id)
}
