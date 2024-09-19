-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 23:15:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vetconnect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcitas`
--

CREATE TABLE `tbcitas` (
  `idTbCitas` int(11) NOT NULL,
  `id_EmpCrea` int(11) NOT NULL,
  `idTbEmAsig` int(11) NOT NULL,
  `idtbMascotas` int(11) NOT NULL,
  `idTbServicios` int(11) NOT NULL,
  `IdCitaPre` varchar(45) DEFAULT NULL,
  `CitaNom` varchar(45) NOT NULL,
  `CitaDate` datetime NOT NULL,
  `CitaEst` int(11) NOT NULL,
  `CitaObs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleados`
--

CREATE TABLE `tbempleados` (
  `idTbEmpleados` int(11) NOT NULL,
  `idTbEmpresas` int(11) NOT NULL,
  `idTbRoles` int(11) NOT NULL,
  `EmpNom` varchar(45) NOT NULL,
  `EmpCod` varchar(45) NOT NULL,
  `EmpUsu` varchar(45) NOT NULL,
  `EmpCla` varchar(45) NOT NULL,
  `EmpCel` varchar(45) NOT NULL,
  `EmpEst` int(11) NOT NULL,
  `EmpEmail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempresas`
--

CREATE TABLE `tbempresas` (
  `idTbEmpresas` int(11) NOT NULL,
  `EmpreNom` varchar(45) NOT NULL,
  `EmpreNit` varchar(45) NOT NULL,
  `EmpreDir` varchar(250) NOT NULL,
  `EmpreEst` int(11) NOT NULL,
  `EmpreRepre` varchar(45) NOT NULL,
  `EmpreRepreTel` int(11) NOT NULL,
  `EmpreRepreCC` varchar(45) NOT NULL,
  `EmpreFechCrea` date NOT NULL,
  `EmpreAct` int(11) DEFAULT NULL,
  `EmpreActFehUlt` datetime DEFAULT NULL,
  `EmpreAdj` varchar(250) NOT NULL,
  `EmpreContr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbempresas`
--

INSERT INTO `tbempresas` (`idTbEmpresas`, `EmpreNom`, `EmpreNit`, `EmpreDir`, `EmpreEst`, `EmpreRepre`, `EmpreRepreTel`, `EmpreRepreCC`, `EmpreFechCrea`, `EmpreAct`, `EmpreActFehUlt`, `EmpreAdj`, `EmpreContr`) VALUES
(1, 'Huellitas', '15615616', 'calle 1815165', 0, 'Benito', 2147483647, '5468456456456', '0000-00-00', NULL, NULL, 'a72Lo.pdf', 'dtccC.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbespecies`
--

CREATE TABLE `tbespecies` (
  `idTbEspecies` int(11) NOT NULL,
  `EspeNom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhisclinica`
--

CREATE TABLE `tbhisclinica` (
  `idTbHisClinica` int(11) NOT NULL,
  `idtbMascotas` int(11) NOT NULL,
  `idTbEmpleados` int(11) NOT NULL,
  `HisObserv` text DEFAULT NULL,
  `HisFec` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhistorialpago`
--

CREATE TABLE `tbhistorialpago` (
  `idTbHistorialPago` int(11) NOT NULL,
  `idTbPlanes` int(11) NOT NULL,
  `idTbEmpresas` int(11) NOT NULL,
  `HistPagoFec` date NOT NULL,
  `HistPagoObs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmascotas`
--

CREATE TABLE `tbmascotas` (
  `idtbMascotas` int(11) NOT NULL,
  `idTbUsuarios` int(11) NOT NULL,
  `idTbEspecies` int(11) NOT NULL,
  `MascoCod` varchar(45) NOT NULL,
  `MascoFechNac` varchar(45) DEFAULT NULL,
  `MascoYear` varchar(45) NOT NULL,
  `MacoMes` varchar(45) NOT NULL,
  `MascoSex` varchar(45) NOT NULL,
  `MascoPelaje` varchar(45) NOT NULL,
  `MascoPeso` varchar(45) NOT NULL,
  `MacoComidaHab` varchar(45) DEFAULT NULL,
  `MascoVivienda` varchar(45) DEFAULT NULL,
  `MascoUltCelo` date DEFAULT NULL,
  `MascoChip` varchar(45) DEFAULT NULL,
  `MascoPatologia` varchar(45) DEFAULT NULL,
  `MascoAdop` int(11) DEFAULT NULL,
  `MascoPic` varchar(45) DEFAULT NULL,
  `MascoAgresion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tboptservicios`
--

CREATE TABLE `tboptservicios` (
  `IdoptServicios` int(11) NOT NULL,
  `OptNombre` varchar(250) NOT NULL,
  `OptEst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tboptservicios`
--

INSERT INTO `tboptservicios` (`IdoptServicios`, `OptNombre`, `OptEst`) VALUES
(1, 'Urgencias', 1),
(2, 'Cita Medica', 1),
(3, 'Vacunacion', 1),
(4, 'Hospitalización', 1),
(5, 'Mensajería Interna', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbplanes`
--

CREATE TABLE `tbplanes` (
  `idTbPlanes` int(11) NOT NULL,
  `PlanNom` varchar(45) NOT NULL,
  `PlanVigenciaDia` int(11) DEFAULT NULL,
  `PlanCosto` float NOT NULL,
  `PlanEst` int(11) NOT NULL DEFAULT 1,
  `PlanVigenciaMes` int(11) DEFAULT NULL,
  `PlanIcono` text NOT NULL,
  `PlanFechCrea` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbplanes`
--

INSERT INTO `tbplanes` (`idTbPlanes`, `PlanNom`, `PlanVigenciaDia`, `PlanCosto`, `PlanEst`, `PlanVigenciaMes`, `PlanIcono`, `PlanFechCrea`) VALUES
(8, 'Plan Prueba ', 15, 0, 2, 0, '', '2024-07-30 03:13:38'),
(9, 'Plan Mensual', 30, 200000, 1, 0, '', '2024-07-30 03:13:56'),
(10, 'Plan Pro', 0, 350000, 1, 2, '', '2024-07-30 03:14:28'),
(11, 'vip', 5, 22000, 1, 1, '', '2024-08-13 00:33:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrazas`
--

CREATE TABLE `tbrazas` (
  `idTbRazas` int(11) NOT NULL,
  `RazNom` varchar(45) NOT NULL,
  `idTbEspecies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbroles`
--

CREATE TABLE `tbroles` (
  `idTbRoles` int(11) NOT NULL,
  `RolNom` varchar(45) NOT NULL,
  `RolTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbroles`
--

INSERT INTO `tbroles` (`idTbRoles`, `RolNom`, `RolTipo`) VALUES
(1, 'Admin', 1),
(2, 'Propietario Mascota', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicios`
--

CREATE TABLE `tbservicios` (
  `idTbServicios` int(11) NOT NULL,
  `idTbPlanes` int(11) NOT NULL,
  `ServiciosEst` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbservicios`
--

INSERT INTO `tbservicios` (`idTbServicios`, `idTbPlanes`, `ServiciosEst`) VALUES
(1, 8, 1),
(2, 8, 1),
(1, 9, 2),
(2, 9, 2),
(3, 9, 2),
(1, 10, 1),
(2, 10, 1),
(3, 10, 2),
(4, 10, 1),
(5, 10, 1),
(3, 11, 1),
(5, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `idTbUsuarios` int(11) NOT NULL,
  `idTbRoles` int(11) NOT NULL,
  `UsuNom` varchar(45) NOT NULL,
  `UsuUser` varchar(45) NOT NULL,
  `UsuEmail` varchar(45) DEFAULT NULL,
  `UsuCel` int(11) DEFAULT NULL,
  `UsuCC` varchar(45) NOT NULL,
  `UsuDirec` varchar(45) DEFAULT NULL,
  `UsuCla` varchar(45) NOT NULL,
  `UsuPic` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbusuarios`
--

INSERT INTO `tbusuarios` (`idTbUsuarios`, `idTbRoles`, `UsuNom`, `UsuUser`, `UsuEmail`, `UsuCel`, `UsuCC`, `UsuDirec`, `UsuCla`, `UsuPic`) VALUES
(1, 1, 'Diego Arenas', 'AARENAS', 'diegoaarenas@gmail.com', 30546, '1003895100', 'calle 18', '123', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcitas`
--
ALTER TABLE `tbcitas`
  ADD PRIMARY KEY (`idTbCitas`),
  ADD KEY `fk_TbCitas_tbMascotas1_idx` (`idtbMascotas`),
  ADD KEY `fk_TbCitas_TbEmpleados1_idx` (`idTbEmAsig`),
  ADD KEY `fk_TbCitas_TbEmpleados2_idx` (`id_EmpCrea`),
  ADD KEY `fk_TbCitas_TbServicios1_idx` (`idTbServicios`);

--
-- Indices de la tabla `tbempleados`
--
ALTER TABLE `tbempleados`
  ADD PRIMARY KEY (`idTbEmpleados`),
  ADD KEY `fk_TbEmpleados_TbRoles1_idx` (`idTbRoles`),
  ADD KEY `fk_TbEmpleados_TbEmpresas1_idx` (`idTbEmpresas`);

--
-- Indices de la tabla `tbempresas`
--
ALTER TABLE `tbempresas`
  ADD PRIMARY KEY (`idTbEmpresas`);

--
-- Indices de la tabla `tbespecies`
--
ALTER TABLE `tbespecies`
  ADD PRIMARY KEY (`idTbEspecies`);

--
-- Indices de la tabla `tbhisclinica`
--
ALTER TABLE `tbhisclinica`
  ADD PRIMARY KEY (`idTbHisClinica`),
  ADD KEY `fk_TbHisClinica_tbMascotas1_idx` (`idtbMascotas`),
  ADD KEY `fk_TbHisClinica_TbEmpleados1_idx` (`idTbEmpleados`);

--
-- Indices de la tabla `tbhistorialpago`
--
ALTER TABLE `tbhistorialpago`
  ADD PRIMARY KEY (`idTbHistorialPago`),
  ADD KEY `fk_TbHistorialPago_TbPlanes1_idx` (`idTbPlanes`),
  ADD KEY `fk_2` (`idTbEmpresas`);

--
-- Indices de la tabla `tbmascotas`
--
ALTER TABLE `tbmascotas`
  ADD PRIMARY KEY (`idtbMascotas`),
  ADD UNIQUE KEY `MascoCod_UNIQUE` (`MascoCod`),
  ADD KEY `fk_tbMascotas_TbUsuarios1_idx` (`idTbUsuarios`),
  ADD KEY `fk_tbMascotas_TbEspecies1_idx` (`idTbEspecies`);

--
-- Indices de la tabla `tboptservicios`
--
ALTER TABLE `tboptservicios`
  ADD PRIMARY KEY (`IdoptServicios`);

--
-- Indices de la tabla `tbplanes`
--
ALTER TABLE `tbplanes`
  ADD PRIMARY KEY (`idTbPlanes`);

--
-- Indices de la tabla `tbrazas`
--
ALTER TABLE `tbrazas`
  ADD PRIMARY KEY (`idTbRazas`),
  ADD KEY `fk_TbRazas_TbEspecies1_idx` (`idTbEspecies`);

--
-- Indices de la tabla `tbroles`
--
ALTER TABLE `tbroles`
  ADD PRIMARY KEY (`idTbRoles`);

--
-- Indices de la tabla `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`idTbUsuarios`),
  ADD KEY `fk_TbUsuarios_TbRoles1_idx` (`idTbRoles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbcitas`
--
ALTER TABLE `tbcitas`
  MODIFY `idTbCitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbempleados`
--
ALTER TABLE `tbempleados`
  MODIFY `idTbEmpleados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbempresas`
--
ALTER TABLE `tbempresas`
  MODIFY `idTbEmpresas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbespecies`
--
ALTER TABLE `tbespecies`
  MODIFY `idTbEspecies` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbhisclinica`
--
ALTER TABLE `tbhisclinica`
  MODIFY `idTbHisClinica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbhistorialpago`
--
ALTER TABLE `tbhistorialpago`
  MODIFY `idTbHistorialPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbmascotas`
--
ALTER TABLE `tbmascotas`
  MODIFY `idtbMascotas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tboptservicios`
--
ALTER TABLE `tboptservicios`
  MODIFY `IdoptServicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbplanes`
--
ALTER TABLE `tbplanes`
  MODIFY `idTbPlanes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbrazas`
--
ALTER TABLE `tbrazas`
  MODIFY `idTbRazas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbroles`
--
ALTER TABLE `tbroles`
  MODIFY `idTbRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `idTbUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcitas`
--
ALTER TABLE `tbcitas`
  ADD CONSTRAINT `fk_TbCitas_TbEmpleados1` FOREIGN KEY (`idTbEmAsig`) REFERENCES `tbempleados` (`idTbEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TbCitas_TbEmpleados2` FOREIGN KEY (`id_EmpCrea`) REFERENCES `tbempleados` (`idTbEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TbCitas_TbServicios1` FOREIGN KEY (`idTbServicios`) REFERENCES `tbservicios` (`idTbServicios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TbCitas_tbMascotas1` FOREIGN KEY (`idtbMascotas`) REFERENCES `tbmascotas` (`idtbMascotas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbempleados`
--
ALTER TABLE `tbempleados`
  ADD CONSTRAINT `fk_TbEmpleados_TbEmpresas1` FOREIGN KEY (`idTbEmpresas`) REFERENCES `tbempresas` (`idTbEmpresas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TbEmpleados_TbRoles1` FOREIGN KEY (`idTbRoles`) REFERENCES `tbroles` (`idTbRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbhisclinica`
--
ALTER TABLE `tbhisclinica`
  ADD CONSTRAINT `fk_TbHisClinica_TbEmpleados1` FOREIGN KEY (`idTbEmpleados`) REFERENCES `tbempleados` (`idTbEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TbHisClinica_tbMascotas1` FOREIGN KEY (`idtbMascotas`) REFERENCES `tbmascotas` (`idtbMascotas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbhistorialpago`
--
ALTER TABLE `tbhistorialpago`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`idTbEmpresas`) REFERENCES `tbempleados` (`idTbEmpleados`),
  ADD CONSTRAINT `fk_TbHistorialPago_TbPlanes1` FOREIGN KEY (`idTbPlanes`) REFERENCES `tbplanes` (`idTbPlanes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbmascotas`
--
ALTER TABLE `tbmascotas`
  ADD CONSTRAINT `fk_tbMascotas_TbEspecies1` FOREIGN KEY (`idTbEspecies`) REFERENCES `tbespecies` (`idTbEspecies`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbMascotas_TbUsuarios1` FOREIGN KEY (`idTbUsuarios`) REFERENCES `tbusuarios` (`idTbUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbrazas`
--
ALTER TABLE `tbrazas`
  ADD CONSTRAINT `fk_TbRazas_TbEspecies1` FOREIGN KEY (`idTbEspecies`) REFERENCES `tbespecies` (`idTbEspecies`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbservicios`
--
ALTER TABLE `tbservicios`
  ADD CONSTRAINT `fk_TbServicios_TbPlanes1` FOREIGN KEY (`idTbPlanes`) REFERENCES `tbplanes` (`idTbPlanes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD CONSTRAINT `fk_TbUsuarios_TbRoles1` FOREIGN KEY (`idTbRoles`) REFERENCES `tbroles` (`idTbRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
