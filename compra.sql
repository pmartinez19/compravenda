DROP DATABASE compravende;
CREATE DATABASE compravende;
CREATE TABLE compravende.compra (
    id SERIAL PRIMARY KEY,
    cliente_id INTEGER NOT NULL,
    fecha_compra DATE NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES compravende.cliente(id) ON DELETE CASCADE
);
CREATE TABLE compravende.item (
    id SERIAL PRIMARY KEY,
    cliente_id INTEGER NOT NULL,
    compra_id INTEGER NOT NULL,
    producto_id INTEGER NOT NULL,
    cantidad INTEGER NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    FOREIGN KEY (compra_id) REFERENCES compravende.compra(id) ON DELETE CASCADE,
    FOREIGN KEY (producto_id) REFERENCES compravende.producto(id) ON DELETE CASCADE,
    FOREIGN KEY (cliente_id) REFERENCES compravende.cliente(id) ON DELETE CASCADE
);
CREATE TABLE compravende.produto (
    id SERIAL PRIMARY KEY,
    cliente_id INTEGER NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    valor NUMERIC(10,2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES compravende.cliente(id) ON DELETE CASCADE
);
CREATE TABLE compravende.cliente (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
INSERT INTO compravende.cliente (nombre, direccion, telefono, email) VALUES ('Juan Perez', 'Calle 123', '12345678', 'femwiof@f2i3.com');
INSERT INTO compravende.cliente (nombre, direccion, telefono, email) VALUES ('Pedro Perez', 'Calle 123', '12345678', 'femwiof@f2i3.com');
INSERT INTO compravende.cliente (nombre, direccion, telefono, email) VALUES ('Maria Perez', 'Calle 123', '12345678', 'fieifi@fwe.es');
INSERT INTO compravende.cliente (nombre, direccion, telefono, email) VALUES ('Juan Perez', 'Calle 123', '12345678', 'ghiot@oef.es');
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 1);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 2);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 3);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 4);
INSERT INTO compravende.producto (nombre, valor, cliente_id) VALUES ('Pizza', '10', 5);
INSERT INTO compravende.compra (1,fecha_compra, valor, descripcion) VALUES ('2020-01-01', '10', 'Pizza');
INSERT INTO compravende.compra (2,fecha_compra, valor, descripcion) VALUES ('2020-01-01', '10', 'Pizza');
INSERT INTO compravende.compra (3,fecha_compra, valor, descripcion) VALUES ('2020-01-01', '10', 'Pizza');
INSERT INTO compravende.compra (4,fecha_compra, valor, descripcion) VALUES ('2020-01-01', '10', 'Pizza');
INSERT INTO compravende.compra (5,fecha_compra, valor, descripcion) VALUES ('2020-01-01', '10', 'Pizza');
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (1, 1, 1, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (1, 1, 2, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (1, 1, 3, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (1, 1, 4, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (1, 1, 5, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (2, 2, 1, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (2, 2, 2, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (2, 2, 3, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (2, 2, 4, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (2, 2, 5, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (3, 3, 1, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (3, 3, 2, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (3, 3, 3, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (3, 3, 4, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (3, 3, 5, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (4, 4, 1, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (4, 4, 2, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (4, 4, 3, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (4, 4, 4, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (4, 4, 5, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (5, 5, 1, 1, 10);
INSERT INTO compravende.item (cliente_id, compra_id, producto_id, cantidad, valor) VALUES (5, 5, 2, 1, 10);

