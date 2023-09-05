-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2023 a las 06:35:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventa`
--
-- Creación: 29-08-2023 a las 09:43:35
--

CREATE TABLE `tbldetalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIOUNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCARGADO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbldetalleventa`
--

INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES
(1, 1, 1, 40.00, 1, 0),
(2, 3, 1, 40.00, 1, 0),
(3, 3, 2, 0.00, 1, 0),
(4, 4, 1, 40.00, 1, 0),
(5, 4, 2, 0.00, 1, 0),
(6, 5, 1, 40.00, 1, 0),
(7, 5, 2, 0.00, 1, 0),
(8, 6, 1, 40.00, 1, 0),
(9, 6, 2, 0.00, 1, 0),
(10, 7, 1, 40.00, 1, 0),
(11, 7, 2, 0.00, 1, 0),
(12, 8, 1, 40.00, 1, 0),
(13, 8, 2, 0.00, 1, 0),
(14, 12, 1, 40.00, 1, 0),
(15, 12, 2, 0.00, 1, 0),
(16, 13, 1, 40.00, 1, 0),
(17, 13, 2, 0.00, 1, 0),
(18, 14, 1, 40.00, 1, 0),
(19, 14, 2, 0.00, 1, 0),
(20, 16, 1, 40.00, 1, 0),
(21, 16, 2, 0.00, 1, 0),
(22, 17, 1, 40.00, 1, 0),
(23, 17, 2, 0.00, 1, 0),
(24, 18, 1, 40.00, 1, 0),
(25, 18, 2, 0.00, 1, 0),
(26, 19, 1, 40.00, 1, 0),
(27, 19, 2, 0.00, 1, 0),
(28, 20, 1, 40.00, 1, 0),
(29, 20, 2, 0.00, 1, 0),
(30, 21, 1, 40.00, 1, 0),
(31, 21, 2, 0.00, 1, 0),
(32, 22, 1, 40.00, 1, 0),
(33, 22, 2, 0.00, 1, 0),
(34, 23, 1, 40.00, 1, 0),
(35, 23, 2, 0.00, 1, 0),
(36, 24, 1, 40.00, 1, 0),
(37, 24, 2, 0.00, 1, 0),
(38, 25, 1, 40.00, 1, 0),
(39, 26, 1, 40.00, 1, 0),
(40, 26, 2, 0.00, 1, 0),
(41, 26, 3, 0.00, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--
-- Creación: 28-08-2023 a las 02:26:23
--

CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(1, 'HALO', 40.00, 'Halo es una icónica serie de videojuegos de ciencia ficción que combina acción y aventuras en primera persona. Desarrollada por Bungie y posteriormente continuada por 343 Industries, la franquicia se centra en la lucha épica entre la humanidad y una alianza alienígena conocida como el Covenant, así como en la aparición de la amenaza parasitaria llamada los Flood. Los juegos siguen al Jefe Maestro, un super soldado mejorado cibernéticamente, en su misión por proteger a la humanidad y enfrentar los peligros que se interponen en su camino. A lo largo de la serie, los jugadores experimentan emocionantes combates, vehículos futuristas y una trama rica en narrativa en un entorno futurista y galáctico. Con su acción intensa y su cautivadora historia, Halo se ha convertido en un referente en la industria de los videojuegos y ha dejado una marca duradera en la cultura pop.', 'https://akihabarablues.com/wp-content/uploads/2012/05/halo-4-portada-caratula-grande.not_.jpg'),
(2, 'free fire', 0.00, 'Sobrevive en 10 minutos ', 'https://cdn6.aptoide.com/imgs/a/0/7/a07457f9d059715922bd0baa696456d4_icon.png'),
(3, 'Pug Mobile', 0.00, 'PVP', 'https://upload.wikimedia.org/wikipedia/en/4/44/PlayerUnknown%27s_Battlegrounds_Mobile.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--
-- Creación: 29-08-2023 a las 09:19:20
--

CREATE TABLE `tblventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblventas`
--

INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) VALUES
(1, '12345678910', '', '2023-08-29 11:21:18', 'ksoledispa@utm.edu.ec', 700.00, 'pendiente'),
(2, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:41:50', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(3, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:50:29', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(4, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:51:05', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(5, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:51:06', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(6, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:51:24', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(7, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:51:56', 'kevinjair-soledispa@hotmail.com', 120.00, 'pendiente'),
(8, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:53:47', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(9, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:55:44', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(10, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 06:55:50', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(11, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 07:01:47', 'ksoledispa3407@utm.com', 120.00, 'pendiente'),
(12, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 07:07:57', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(13, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 07:15:23', 'cbiologia91@gmail.com', 120.00, 'pendiente'),
(14, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 07:20:22', 'kevinjahir-soledispa@hotmail.com', 120.00, 'pendiente'),
(15, 'qhkcoc2h4v4b9v9acve0cmd216', '', '2023-09-01 09:28:13', 'kevinjair-soledispa@hotmail.com', 80.00, 'pendiente'),
(16, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:30:46', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(17, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:43:15', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(18, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:44:43', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(19, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:45:04', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(20, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:45:12', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(21, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:50:39', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(22, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:50:46', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(23, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 09:50:58', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(24, 'q7k8advreunki3negfmv3ojvco', '', '2023-09-01 10:01:42', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(25, 'elolcn3numn9p15cklfu5486pd', '', '2023-09-01 21:47:15', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente'),
(26, 'elolcn3numn9p15cklfu5486pd', '', '2023-09-01 22:33:45', 'kevinjahir-soledispa@hotmail.com', 40.00, 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `tblventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tblproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
