CREATE TABLE `categorias` (
  `id_categoria` int(11) PRIMARY KEY NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
); 

CREATE TABLE `clientes` (
  `id_cliente` int(11) PRIMARY KEY NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL
);

CREATE TABLE `detalleventas` (
  `id_detventa` int(11) PRIMARY KEY NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL
);

CREATE TABLE `files` (
  `id_files` int(11) PRIMARY KEY NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
);

CREATE TABLE `productos` (
  `id_producto` int(11) PRIMARY KEY NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
);

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL
);

CREATE TABLE `ventas` (
  `id_venta` int(11) PRIMARY KEY NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_pago` varchar(255) DEFAULT NULL,
  FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`)
);

CREATE TABLE `user`(
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `usuario` VARCHAR(100),
    `clave` VARCHAR(100),
    `conclave` VARCHAR(100),
    `email` VARCHAR(100)
);

CREATE USER 'admin'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
