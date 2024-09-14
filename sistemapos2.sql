-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2024 a las 17:45:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemapos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `usuario` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `usuario`, `fecha_creacion`) VALUES
(101, 'Antifluido F.E.', 'admin\r', '2024-07-09 03:50:15'),
(102, 'Antifluido Mascota', 'admin\r', '2024-07-09 03:48:58'),
(103, 'Bengalina Blusera', 'admin\r', '2024-07-09 03:48:58'),
(104, 'Bengalina Popelera', 'admin\r', '2024-07-09 03:48:58'),
(105, 'Camuflado', 'uno', '2024-07-11 05:32:26'),
(106, 'Chalis Licra', 'uno', '2024-07-11 05:33:04'),
(107, 'Chalis Licrado Estampado', 'admin\r', '2024-07-09 03:48:58'),
(108, 'Chalis Rigido', 'uno', '2024-07-11 05:33:24'),
(109, 'Chambray', 'admin\r', '2024-07-09 03:48:58'),
(110, 'ChantillY', 'admin', '2024-08-13 04:23:38'),
(111, 'Chantilly 3_D', 'admin\r', '2024-07-09 03:48:58'),
(112, 'Chantilly Con Lentejuelas', 'admin\r', '2024-07-09 03:48:58'),
(113, 'Cuerina', 'admin\r', '2024-07-09 03:48:58'),
(114, 'Dacron Blanco', 'admin\r', '2024-07-09 03:48:58'),
(115, 'Dacron Color', 'admin\r', '2024-07-09 03:48:58'),
(116, 'Dacron Estampado', 'admin\r', '2024-07-09 03:48:58'),
(117, 'Dacron Estampado Infantil', 'admin\r', '2024-07-09 03:48:58'),
(118, 'Dril Licrado', 'admin\r', '2024-07-09 03:48:58'),
(119, 'Escosesa Textilia', 'admin\r', '2024-07-09 03:48:58'),
(120, 'Gabardinita', 'admin\r', '2024-07-09 03:48:58'),
(121, 'Hojalillo Blanco', 'admin\r', '2024-07-09 03:48:58'),
(122, 'Lame Esponja', 'admin\r', '2024-07-09 03:48:58'),
(123, 'Lame Licrado', 'admin\r', '2024-07-09 03:48:58'),
(124, 'Lentejuela', 'admin\r', '2024-07-09 03:48:58'),
(125, 'Lino 2,80', 'admin\r', '2024-07-09 03:48:58'),
(126, 'Lino 9000', 'admin\r', '2024-07-09 03:48:58'),
(127, 'Lino Cocina', 'admin\r', '2024-07-09 03:48:58'),
(128, 'Lino Flex', 'admin\r', '2024-07-09 03:48:58'),
(129, 'Lino Navidad_1', 'admin\r', '2024-07-09 03:48:58'),
(130, 'Lino Navidad_2', 'admin\r', '2024-07-09 03:48:58'),
(131, 'Noche De Viena', 'admin\r', '2024-07-09 03:48:58'),
(132, 'Ojalillo', 'admin\r', '2024-07-09 03:48:58'),
(133, 'Organza Bordado', 'admin\r', '2024-07-09 03:48:58'),
(134, 'Organza Puntos', 'admin\r', '2024-07-09 03:48:58'),
(135, 'Popelina', 'admin\r', '2024-07-09 03:48:58'),
(136, 'Satin Estampado', 'admin\r', '2024-07-09 03:48:58'),
(137, 'Satin Fashion', 'admin\r', '2024-07-09 03:48:58'),
(138, 'Satin Flores', 'admin\r', '2024-07-09 03:48:58'),
(139, 'Satin Licrado', 'admin\r', '2024-07-09 03:48:58'),
(140, 'Satin Rigido', 'admin', '2024-08-13 04:27:09'),
(141, 'Scuba Creepe', 'admin\r', '2024-07-09 03:48:58'),
(142, 'Scuba Lisa', 'admin\r', '2024-07-09 03:48:58'),
(143, 'Seda Forros', 'admin\r', '2024-07-09 03:48:58'),
(144, 'Seda Mango', 'admin\r', '2024-07-09 03:48:58'),
(145, 'Seda Mango Estampado', 'admin\r', '2024-07-09 03:48:58'),
(146, 'Seda Mango F.E.', 'admin\r', '2024-07-09 03:48:58'),
(147, 'Tafetan', 'admin\r', '2024-07-09 03:48:58'),
(148, 'Tull Con Lame', 'admin\r', '2024-07-09 03:48:58'),
(149, 'Tull Escarchado', 'admin\r', '2024-07-09 03:48:58'),
(150, 'Velo Burdo Bordado', 'admin\r', '2024-07-09 03:48:58'),
(151, 'Velo Burdo F.E.', 'admin\r', '2024-07-09 03:48:58'),
(152, 'Velo Suizo', 'admin\r', '2024-07-09 03:48:58'),
(153, 'Velo Suizo Color', 'admin\r', '2024-07-09 03:48:58'),
(154, 'Yakard', 'admin\r', '2024-07-09 03:48:58'),
(155, 'Yakard Bicolor', 'admin\r', '2024-07-09 03:48:58'),
(156, 'prueba', 'prueba', '2024-07-10 16:04:01'),
(159, 'Array', 'prueba', '2024-07-10 04:18:08'),
(160, 'Array', 'Array', '2024-07-10 04:24:04'),
(161, 'admin', 'admin', '2024-07-10 04:44:06'),
(162, 'ana', 'ana', '2024-07-10 04:44:49'),
(163, 'prueba3', 'ana', '2024-07-10 04:52:12'),
(164, 'Jean', 'ana', '2024-07-10 04:53:00'),
(165, 'Lona', 'ana', '2024-07-10 04:53:41'),
(166, 'prueba 10 de julio OK', 'admin', '2024-08-13 04:26:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `ciudad` text NOT NULL,
  `total_compras` int(11) NOT NULL DEFAULT 0,
  `ultima_compra` date NOT NULL,
  `creado_por` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellido`, `ciudad`, `total_compras`, `ultima_compra`, `creado_por`, `fecha_registro`) VALUES
(1, 'gildardo', 'arenas', 'medellin', 0, '0000-00-00', 'admin', '2024-07-16 13:10:26'),
(2, 'carlo ol', 'gomez', 'Bogota', 0, '0000-00-00', 'admin', '2024-08-13 15:58:54'),
(3, 'pedro', 'suarez', 'cali', 0, '0000-00-00', '', '2024-07-15 23:51:10'),
(8, 'juan', 'rico', 'medellin', 0, '0000-00-00', 'admin', '2024-07-31 04:33:59'),
(9, 'antonio', 'nuevo agosto', 'chile', 0, '0000-00-00', 'admin', '2024-08-06 00:03:46'),
(10, 'fredy', 'gonzalez', 'cucuta', 0, '0000-00-00', 'ana', '2024-08-06 04:57:27'),
(12, 'dos', 'jose', 'medellin', 0, '0000-00-00', 'admin', '2024-08-13 04:18:32'),
(13, 'tres', 'ASASD', 'medellin', 0, '0000-00-00', 'admin', '2024-08-13 04:18:45'),
(14, 'CUATRO', 'AD', 'medellin', 0, '0000-00-00', 'admin', '2024-08-13 04:18:59'),
(15, 'CUATRO', 'ASDASD', 'medellin', 0, '0000-00-00', 'admin', '2024-08-13 04:19:12'),
(16, 'SDASFD', 'SAFDDF', 'medellin', 0, '0000-00-00', 'admin', '2024-08-13 04:19:58'),
(17, 'FGSGDFH', 'SGDFGHFDH', 'SDFGDFGA', 0, '0000-00-00', 'admin', '2024-08-13 04:20:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `idColor` int(11) NOT NULL,
  `color` text NOT NULL,
  `usuario` text NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`idColor`, `color`, `usuario`, `fechaRegistro`) VALUES
(501, 'AMARILLO CLARO', 'admin', '2024-07-16 19:07:42'),
(502, 'AMARILLO FUERTE', 'admin', '2024-07-16 19:07:26'),
(503, 'ARENA ', 'admin', '2024-07-16 19:07:26'),
(504, 'AZUL CELESTE', 'jose', '2024-07-17 06:16:59'),
(505, 'AZUL OSCURO', 'admin', '2024-07-16 19:07:26'),
(506, 'AZUL REY', 'admin', '2024-07-16 19:07:26'),
(507, 'AZUL TURQUESA', 'admin', '2024-07-16 19:07:26'),
(508, 'BEIS', 'admin', '2024-07-16 19:07:26'),
(509, 'BLANCO', 'admin', '2024-07-16 19:07:26'),
(510, 'CELESTE', 'admin', '2024-07-16 19:07:26'),
(511, 'CORAL', 'admin', '2024-07-16 19:07:26'),
(512, 'CURUBA MORADO', 'admin', '2024-07-16 19:07:26'),
(513, 'DORADO CLARO', 'admin', '2024-07-16 19:07:26'),
(514, 'DORADO OSCURO', 'admin', '2024-07-16 19:07:26'),
(515, 'FUCSIA', 'admin', '2024-07-16 19:07:26'),
(516, 'GRIS CLARO', 'admin', '2024-07-16 19:07:26'),
(517, 'GRIS OSCURO', 'admin', '2024-07-16 19:07:26'),
(518, 'GRIS PLATA', 'admin', '2024-07-16 19:07:26'),
(519, 'LILA', 'admin', '2024-07-16 19:07:26'),
(520, 'MORADO', 'admin', '2024-07-16 19:07:26'),
(521, 'NARANJA', 'admin', '2024-07-16 19:07:26'),
(522, 'NEGRO', 'admin', '2024-07-16 19:07:26'),
(523, 'PALO DE ROSA', 'admin', '2024-07-16 19:07:26'),
(524, 'PALO DE ROSA CLARO', 'admin', '2024-07-16 19:07:26'),
(525, 'PALO DE ROSA OSCURO', 'admin', '2024-07-16 19:07:26'),
(526, 'PLATEADO', 'admin', '2024-07-16 19:07:26'),
(527, 'REY', 'admin', '2024-07-16 19:07:26'),
(528, 'ROJO', 'admin', '2024-07-16 19:07:26'),
(529, 'ROSADO', 'admin', '2024-07-16 19:07:26'),
(530, 'ROSADO OSCURO', 'admin', '2024-07-16 19:07:26'),
(531, 'TURQUESA', 'admin', '2024-07-16 19:07:26'),
(532, 'VERDE ANTIOQUIA', 'admin', '2024-07-16 19:07:26'),
(533, 'VERDE BOTELLA', 'admin', '2024-07-16 19:07:26'),
(534, 'VERDE MENTA', 'admin', '2024-07-16 19:07:26'),
(535, 'VINO TINTO', 'admin', '2024-07-16 19:07:26'),
(536, '1-1#', 'admin', '2024-07-16 19:07:26'),
(537, '1-2#', 'admin', '2024-07-16 19:07:26'),
(538, '1-3#', 'admin', '2024-07-16 19:07:26'),
(539, '2-1#', 'admin', '2024-07-16 19:07:26'),
(540, '2-2#', 'admin', '2024-07-16 19:07:26'),
(541, '2-3#', 'admin', '2024-07-16 19:07:26'),
(542, '3-1#', 'admin', '2024-07-16 19:07:26'),
(543, '3-2#', 'admin', '2024-07-16 19:07:26'),
(544, '3-3#', 'admin', '2024-07-16 19:07:26'),
(545, '4-1#', 'admin', '2024-07-16 19:07:26'),
(546, '4-2#', 'admin', '2024-07-16 19:07:26'),
(547, '4-3#', 'admin', '2024-07-16 19:07:26'),
(548, '5-1#', 'admin', '2024-07-16 19:07:26'),
(549, '5-2#', 'admin', '2024-07-16 19:07:26'),
(550, '5-3#', 'admin', '2024-07-16 19:07:26'),
(551, '6-1#', 'admin', '2024-07-16 19:07:26'),
(552, '6-2#', 'admin', '2024-07-16 19:07:26'),
(553, '6-3#', 'admin', '2024-07-16 19:07:26'),
(554, '7-1#', 'admin', '2024-07-16 19:07:26'),
(555, '7-2#', 'admin', '2024-07-16 19:07:26'),
(556, '7-3#', 'admin', '2024-07-16 19:07:26'),
(557, '7-4#', 'admin', '2024-07-16 19:07:26'),
(558, '8-1#', 'admin', '2024-07-16 19:07:26'),
(559, '8-2#', 'admin', '2024-07-16 19:07:26'),
(560, '8-3#', 'admin', '2024-07-16 19:07:26'),
(561, '8-4#', 'admin', '2024-07-16 19:07:26'),
(562, '9-1#', 'admin', '2024-07-16 19:07:26'),
(563, '9-2#', 'admin', '2024-07-16 19:07:26'),
(564, '9-3#', 'admin', '2024-07-16 19:07:26'),
(565, '10-1#', 'admin', '2024-07-16 19:07:26'),
(566, '10-2#', 'admin', '2024-07-16 19:07:26'),
(567, '10-3#', 'admin', '2024-07-16 19:07:26'),
(568, '11-1#', 'admin', '2024-07-16 19:07:26'),
(569, '11-2#', 'admin', '2024-07-16 19:07:26'),
(570, '11-3#', 'admin', '2024-07-16 19:07:26'),
(571, '11-4#', 'admin', '2024-07-16 19:07:26'),
(572, '12-1#', 'admin', '2024-07-16 19:07:26'),
(573, '12-2#', 'admin', '2024-07-16 19:07:26'),
(574, '12-3#', 'admin', '2024-07-16 19:07:26'),
(575, '12-4#', 'admin', '2024-07-16 19:07:26'),
(576, '13-1#', 'admin', '2024-07-16 19:07:26'),
(577, '13-2#', 'admin', '2024-07-16 19:07:26'),
(578, '13-3#', 'admin', '2024-07-16 19:07:26'),
(579, '13-4#', 'admin', '2024-07-16 19:07:26'),
(580, '14-1#', 'admin', '2024-07-16 19:07:26'),
(581, '14-2#', 'admin', '2024-07-16 19:07:26'),
(582, '14-3#', 'admin', '2024-07-16 19:07:26'),
(583, '14-4#', 'admin', '2024-07-16 19:07:26'),
(584, '15-1#', 'admin', '2024-07-16 19:07:26'),
(585, '15-2#', 'admin', '2024-07-16 19:07:26'),
(586, '15-3#', 'admin', '2024-07-16 19:07:26'),
(587, '15-4#', 'admin', '2024-07-16 19:07:26'),
(588, '16-1#', 'admin', '2024-07-16 19:07:26'),
(589, '16-2#', 'admin', '2024-07-16 19:07:26'),
(590, '16-3#', 'admin', '2024-07-16 19:07:26'),
(591, '16-4#', 'admin', '2024-07-16 19:07:26'),
(592, '17-1#', 'admin', '2024-07-16 19:07:26'),
(593, '17-2#', 'admin', '2024-07-16 19:07:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `CodigoProducto` bigint(11) NOT NULL,
  `idTela` int(11) DEFAULT NULL,
  `idColor` int(11) DEFAULT NULL,
  `metrosRollo` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `ventas` int(11) DEFAULT NULL,
  `fechaCompra` date NOT NULL,
  `fechaCargue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `CodigoProducto`, `idTela`, `idColor`, `metrosRollo`, `stock`, `usuario`, `ventas`, `fechaCompra`, `fechaCargue`) VALUES
(1, 24081420555111, 111, 555, 20, 40, 'admin', 0, '2024-08-14', '2024-08-14 02:10:33'),
(2, 24080140555111, 111, 555, 40, 20, 'admin', 0, '2024-08-01', '2024-08-14 02:13:04'),
(3, 24072552511111, 111, 511, 52, 11, 'admin', 0, '2024-07-25', '2024-08-14 03:38:18'),
(4, 24072511151153, 111, 511, 53, 1, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(5, 24072511151154, 111, 511, 54, 13, 'admin', 0, '2024-07-25', '2024-08-14 03:40:16'),
(6, 24072511151149, 111, 511, 49, 10, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(7, 24072512252850, 122, 528, 50, 2, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(8, 24072512252951, 122, 529, 51, 6, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(9, 24072512253052, 122, 530, 52, 8, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(10, 24072512253153, 122, 531, 53, 12, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(11, 24072512253249, 122, 532, 49, 32, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(12, 24072513151950, 131, 519, 50, 2, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(13, 24072513151951, 131, 519, 51, 5, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(14, 24072513151952, 131, 519, 52, 7, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(15, 24072513151549, 131, 515, 49, 23, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(16, 24072513151550, 131, 515, 50, 10, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(17, 24072513151551, 131, 515, 51, 11, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(18, 24072513150648, 131, 506, 48, 12, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(19, 24072513150649, 131, 506, 49, 15, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(20, 24072513150650, 131, 506, 50, 23, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(21, 24072513253940, 132, 539, 40, 10, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(22, 24072513253950, 132, 539, 50, 12, '', 0, '2024-07-25', '2024-07-17 17:23:01'),
(23, 24061213253951, 132, 539, 51, 14, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(24, 24061213254048, 132, 540, 48, 3, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(25, 24061213254049, 132, 540, 49, 245, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(26, 24061213254050, 132, 540, 50, 23, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(27, 24061213254051, 132, 540, 51, 10, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(28, 24061213254152, 132, 541, 52, 100, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(29, 24061213254148, 132, 541, 48, 120, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(30, 24061213254149, 132, 541, 49, 100, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(31, 24061213254250, 132, 542, 50, 20, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(32, 24061213254351, 132, 543, 51, 14, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(33, 24061213254452, 132, 544, 52, 25, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(34, 24061213254549, 132, 545, 49, 35, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(35, 24061213254550, 132, 545, 50, 15, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(36, 24061213254551, 132, 545, 51, 24, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(37, 24061213254552, 132, 545, 52, 23, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(38, 24061212252850, 122, 528, 50, 2, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(39, 24061212253249, 122, 532, 49, 32, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(40, 24061213151950, 131, 519, 50, 2, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(41, 24061213151951, 131, 519, 51, 5, '', 0, '2024-06-12', '2024-07-17 17:23:01'),
(42, 2407114504101, 101, 504, 4, 6, 'admin', 0, '0000-00-00', '2024-07-28 07:44:31'),
(43, 24071250501101, 101, 501, 50, 50, 'admin', 0, '0000-00-00', '2024-07-28 08:16:04'),
(44, 24071112508107, 107, 508, 12, 45, 'admin', 0, '2024-07-11', '2024-07-28 08:22:52'),
(45, 24050212503102, 102, 503, 12, 100, 'admin', 0, '2024-05-02', '2024-07-28 08:23:43'),
(46, 24072511151150, 111, 511, 50, 200, 'admin', 0, '0000-00-00', '2024-07-30 14:28:04'),
(47, 24081245507111, 111, 507, 45, 20, 'admin', 0, '2024-08-12', '2024-08-13 04:30:12'),
(48, 24081450505105, 105, 505, 50, 10, 'admin', NULL, '2024-08-14', '2024-08-13 14:54:37'),
(49, 24080150509104, 104, 509, 50, 10, 'admin', NULL, '2024-08-01', '2024-08-13 15:01:37'),
(50, 24080150503105, 105, 503, 50, 20, 'admin', NULL, '2024-08-01', '2024-08-14 00:57:57'),
(51, 24060550519119, 119, 519, 50, 10, 'admin', NULL, '2024-06-05', '2024-08-14 01:44:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` char(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'img',
  `estado` int(11) NOT NULL DEFAULT 0,
  `ultimo_login` datetime DEFAULT '0000-00-00 00:00:00',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(22, 'antonio', 'arenas', 'admin', '$2y$10$NZ0eMs7PQ3.FHTOXtuVH9es/r/xxHn2jNWZ/1mMWI9Aeu46GCmFo2', 'Administrador', 'vistas/img/usuarios/admin/182.png', 1, '2024-08-12 16:59:09', '2024-08-12 21:59:09'),
(32, 'carlos', 'rodriguez', 'admin1', '$2y$10$1Rr4VUegbIzzPu43MGgZ5.hhHsLMxA/IyHX/0OBgc.shrzLk9QgAy', 'Administrador', 'vistas/img/usuarios/admin1/862.png', 1, '2024-07-03 07:10:59', '2024-07-05 15:23:59'),
(49, 'prueba', 'madrugada', 'madrugada', '$2y$10$h8BSAd5DCSfeIwB9P8s/t.1hqWjG3ZurYxvmxBrTaegu0bi3JG5oW', 'Bodeguero', 'vistas/img/usuarios/madrugada/846.png', 1, '2017-07-13 00:37:50', '2024-07-05 15:24:01'),
(53, 'oscar', 'gonzalez', 'ana', '$2y$10$EA457KPoWuhnyaSsb4B8n.7ZsMRO9bBiURQLq5VqUctomzBjxVJyC', 'Administrador', '', 1, '2024-08-05 21:59:23', '2024-08-06 02:59:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `productos` text NOT NULL,
  `valorVenta` int(11) NOT NULL,
  `metodo de pago` text NOT NULL,
  `cantidadDias` int(11) NOT NULL,
  `fechaNovedad` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`idColor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `idColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
