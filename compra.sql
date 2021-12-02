DROP DATABASE if exists compravende;
CREATE DATABASE compravende;

CREATE TABLE compravende.cliente (
    id integer AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE compravende.compra (
    id integer AUTO_INCREMENT PRIMARY KEY,
    cliente_id INTEGER NOT NULL,
    fecha_compra DATE NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES compravende.cliente(id) ON DELETE CASCADE
);
CREATE TABLE compravende.producto (
    id integer AUTO_INCREMENT PRIMARY KEY,
    cliente_id INTEGER NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES compravende.cliente(id) ON DELETE CASCADE
);

    CREATE TABLE compravende.item (
    id integer AUTO_INCREMENT PRIMARY KEY,
    compra_id INTEGER NOT NULL,
    producto_id INTEGER NOT NULL,
    cantidad INTEGER NOT NULL,
    valor DECIMAL(10,2) NOT NULL
);

ALTER TABLE `item` ADD CONSTRAINT `compra_id_FK` FOREIGN KEY (`compra_id`) REFERENCES `compra`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `item` ADD CONSTRAINT `producto_id_FK` FOREIGN KEY (`producto_id`) REFERENCES `producto`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

Use compravende;
INSERT INTO compravende.cliente (nombre, password, direccion, telefono, email) VALUES ('Juan Perez', 1234, 'Calle 123', '12345678', 'femwiof@f2i3.com');
INSERT INTO compravende.cliente (nombre, password,direccion, telefono, email) VALUES ('Pedro Perez', 1234, 'Calle 123', '12345678', 'femwiof@f2i3.com');
INSERT INTO compravende.cliente (nombre, password,direccion, telefono, email) VALUES ('Maria Perez', 1234, 'Calle 123', '12345678', 'fieifi@fwe.es');
INSERT INTO compravende.cliente (nombre, password,direccion, telefono, email) VALUES ('Juan Perez', 1234, 'Calle 123', '12345678', 'ghiot@oef.es');
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 1);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 2);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 3);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 4);

INSERT INTO `compra` (`id`, `cliente_id`, `fecha_compra`, `valor`, `descripcion`) VALUES (NULL, '1', '2021-11-30', '20.5', 'Esto es uina descripcion de una compra');
INSERT INTO `compra` (`id`, `cliente_id`, `fecha_compra`, `valor`, `descripcion`) VALUES (NULL, '2', '2021-11-30', '10.5', 'Esto es uina descripcion de una compra');
INSERT INTO `compra` (`id`, `cliente_id`, `fecha_compra`, `valor`, `descripcion`) VALUES (NULL, '3', '2021-12-01', '28.5', 'Esto es uina descripcion de una compra');
INSERT INTO `compra` (`id`, `cliente_id`, `fecha_compra`, `valor`, `descripcion`) VALUES (NULL, '4', '2021-11-30', '480.5', 'Esto es uina descripcion de una compra');

INSERT INTO `item` (`id`, `compra_id`, `producto_id`, `cantidad`, `valor`) VALUES (NULL, '1', '1', '5', '20.5');
