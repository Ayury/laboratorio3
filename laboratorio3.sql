-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2021 a las 17:48:11
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_provincia` int(2) DEFAULT NULL,
  `nombre_distrito` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_provincia`, `nombre_distrito`) VALUES
(1, 'Almirante'),
(1, 'Bocas del Toro'),
(1, 'Changuinola'),
(1, 'Chiriquí Grande'),
(2, 'Aguadulce'),
(2, 'Antón'),
(2, 'La Pintada'),
(2, 'Natá'),
(2, 'Penonomé'),
(3, 'Chagres'),
(3, 'Colón'),
(3, 'Donoso'),
(3, 'Omar Torrijos Herrera'),
(3, 'Portobelo'),
(3, 'Santa Isabel'),
(4, 'Alanje'),
(4, 'Barú'),
(4, 'Boquerón'),
(4, 'Boquete'),
(4, 'Bugaba'),
(4, 'David'),
(4, 'Gualaca'),
(4, 'Remedios'),
(4, 'Renacimiento'),
(4, 'San Félix'),
(4, 'San Lorenzo'),
(4, 'Tierras Altas'),
(4, 'Tolé'),
(5, 'Chepigana'),
(5, 'Pinogana'),
(5, 'Santa Fe - Darién'),
(6, 'Chitré'),
(6, 'Las Minas'),
(6, 'Los Pozos'),
(6, 'Ocú'),
(6, 'Parita'),
(6, 'Pesé'),
(6, 'Santa María'),
(7, 'Guararé'),
(7, 'Las Tablas'),
(7, 'Los Santos'),
(7, 'Macaracas'),
(7, 'Pedasí'),
(7, 'Pocrí'),
(7, 'Tonosí'),
(8, 'Balboa'),
(8, 'Chepo'),
(8, 'Chimán'),
(8, 'Panamá'),
(8, 'San Miguelito'),
(8, 'Taboga'),
(9, 'Atalaya'),
(9, 'Calobre'),
(9, 'Cañazas'),
(9, 'La Mesa'),
(9, 'Las Palmas'),
(9, 'Mariato'),
(9, 'Montijo'),
(9, 'Río de Jesús'),
(9, 'San Francisco'),
(9, 'Santa Fe - Veraguas'),
(9, 'Santiago'),
(9, 'Soná'),
(11, 'Cémaco'),
(11, 'Jirondai'),
(11, 'Ñürüm'),
(11, 'Sambú'),
(11, 'Santa Catalina o Calovébora'),
(12, 'Besikó'),
(12, 'Kankintú'),
(12, 'Kusapín'),
(12, 'Mironó'),
(12, 'Müna'),
(12, 'Nole Düima'),
(13, 'Arraiján'),
(13, 'Capira'),
(13, 'Chame'),
(13, 'La Chorrera'),
(13, 'San Carlos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(2) NOT NULL,
  `nombre_provincia` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre_provincia`) VALUES
(1, 'Bocas del Toro'),
(2, 'Coclé'),
(3, 'Colón'),
(4, 'Chiriquí'),
(5, 'Darién'),
(6, 'Herrera'),
(7, 'Los Santos'),
(8, 'Panamá'),
(9, 'Veraguas'),
(10, 'Guna Yala, Madugandí y Wargandí'),
(11, 'Emberá Wounaan'),
(12, 'Ngóbe-Buglé'),
(13, 'Panamá Oeste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(2) NOT NULL,
  `nombre_tipo_usuario` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nombre_tipo_usuario`) VALUES
(1, 'Estuadiante'),
(2, 'Administrativo'),
(3, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `tipo` int(2) DEFAULT NULL,
  `provincia` int(2) DEFAULT NULL,
  `nombre_distrito` varchar(70) DEFAULT NULL,
  `telefono` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `email`, `tipo`, `provincia`, `nombre_distrito`, `telefono`) VALUES
('Luis', 'Mata', 'sistema.as@utp.ac.pa', 1, 1, 'Chiriquí Grande', '66332278');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`nombre_distrito`),
  ADD KEY `fk_id_distrito` (`id_provincia`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_id_usuario_distrito` (`nombre_distrito`),
  ADD KEY `fk_id_usuario_provincia` (`provincia`),
  ADD KEY `fk_id_tipo` (`tipo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `fk_id_distrito` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id_tipo`),
  ADD CONSTRAINT `fk_id_usuario_distrito` FOREIGN KEY (`nombre_distrito`) REFERENCES `distrito` (`nombre_distrito`),
  ADD CONSTRAINT `fk_id_usuario_provincia` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`id_provincia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
