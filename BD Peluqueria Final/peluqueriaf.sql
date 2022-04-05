-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2022 a las 19:25:50
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
-- Base de datos: `peluqueriaf`
--


--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `descripcion`) VALUES
(1, 'barbero'),
(2, 'manicurista'),
(3, 'tintes'),
(4, 'keratinas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL,
  `Servicio_idServicio` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL,
  `Horas_idHoras` int(11) NOT NULL,
  `Fecha_cita` date NOT NULL,
  `Estado_cita_idEstado_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idcita`, `Servicio_idServicio`, `Cliente_idCliente`, `Empleado_idEmpleado`, `Horas_idHoras`, `Fecha_cita`, `Estado_cita_idEstado_cita`) VALUES
(1, 1, 1000578129, 75893234, 1, '2021-10-13', 1),
(2, 2, 1001867554, 528755312, 10, '2021-10-13', 1),
(6, 1, 1000578129, 75893234, 6, '2022-04-05', 3),
(8, 1, 1000578129, 75893234, 9, '2022-04-05', 1),
(10, 1, 1000578129, 86543234, 19, '2022-04-05', 3),
(13, 1, 1000345237, 75893234, 6, '2022-04-05', 3),
(14, 1, 1000345237, 75893234, 6, '2022-04-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Fecha_N` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombres`, `Apellidos`, `Correo`, `Fecha_N`) VALUES
(1000345237, 'Juan', 'Sosa', 'js@gmail.com', '2000-01-03'),
(1000578129, 'Danilo', 'Sainea', 'ds@gmail.com', '2000-10-04'),
(1001867554, 'Sergio', 'Mejia', 'sm@gmail.com', '2004-01-04'),
(1010345231, 'Robinson', 'Inagan', 'rs@gmail.com', '2001-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `iddias` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`iddias`, `dia`) VALUES
(1, 'lunes'),
(2, 'martes'),
(3, 'miercoles'),
(4, 'jueves'),
(5, 'viernes'),
(6, 'sabado'),
(7, 'domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Dirección` varchar(45) NOT NULL,
  `dias_iddias` int(11) NOT NULL,
  `cargo_idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cedula`, `nombre`, `Apellidos`, `Correo`, `Dirección`, `dias_iddias`, `cargo_idcargo`) VALUES
(45893203, 'Andrea', 'Romero', 'am@gmail.com', 'calle 68 #14-11', 5, 4),
(52345895, 'Tatiana', 'Bermudez', 'tb@gmail.com', 'cra 114 # 64-14', 3, 3),
(75893234, 'Luis', 'Salas', 'ls@gmail.com', 'cra 137 # 17-65', 1, 1),
(86543234, 'Dilan', 'Perez', 'dp@gmail.com', 'Calle 68 # 21-44', 2, 1),
(121444444, 'Fredy', 'Castro', 'fc@correo.com', 'Cra 43 #76-21', 4, 2),
(528755312, 'Eliana ', 'Ramirez', 'em@gmail.com', 'av 1 # 22-11', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cita`
--

CREATE TABLE `estado_cita` (
  `idEstado_cita` int(11) NOT NULL,
  `descripciòn` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_cita`
--

INSERT INTO `estado_cita` (`idEstado_cita`, `descripciòn`) VALUES
(1, 'asignada'),
(2, 'finalizada'),
(3, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `idHoras` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`idHoras`, `descripcion`) VALUES
(1, '8:00'),
(2, '8:30'),
(3, '9:00'),
(4, '9:30'),
(5, '10:00'),
(6, '10:30'),
(7, '11:00'),
(8, '11:30'),
(9, '12:00'),
(10, '12:30'),
(11, '14:00'),
(12, '14:30'),
(13, '15:00'),
(14, '15:30'),
(15, '16:00'),
(16, '16:30'),
(17, '17:00'),
(18, '17:30'),
(19, '18:00'),
(20, '18:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `Rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `descripición` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `cargo_idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `descripición`, `precio`, `cargo_idcargo`) VALUES
(1, 'corte', 12000, 1),
(2, 'Manicure', 8000, 2),
(3, 'Pedicure', 9000, 2),
(4, 'Tinte', 70000, 3),
(5, 'Keratina', 50000, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_c`
--

CREATE TABLE `telefonos_c` (
  `idCliente_fk` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefonos_c`
--

INSERT INTO `telefonos_c` (`idCliente_fk`, `numero`) VALUES
(1000578129, 8926743),
(1000578129, 3112294),
(1010345231, 3012345),
(1001867554, 3204218),
(1000345237, 3014567),
(1000345237, 3157651);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_e`
--

CREATE TABLE `telefonos_e` (
  `Empleado_cedula` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefonos_e`
--

INSERT INTO `telefonos_e` (`Empleado_cedula`, `numero`) VALUES
(75893234, 6547328),
(75893234, 3475328),
(86543234, 8962744),
(52345895, 7640821),
(528755312, 5674310),
(528755312, 2348609),
(45893203, 4562184),
(121444444, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `Cliente_idCliente` int(11) DEFAULT NULL,
  `Empleado_cedula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Usuario`, `Contraseña`, `Roles_idRoles`, `Cliente_idCliente`, `Empleado_cedula`) VALUES
(1, 'admin', 'admin', 1, NULL, NULL),
(2, 'Danilo', '1234', 2, 1000578129, NULL),
(3, 'Juan', '1234', 2, 1000345237, NULL),
(4, 'Luis', '1234', 3, NULL, 75893234),
(5, 'Dilan', '1234', 3, NULL, 86543234),
(6, 'fredy', '1234', 3, NULL, 121444444);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idcita`),
  ADD UNIQUE KEY `Cliente_idCliente` (`Cliente_idCliente`,`Fecha_cita`,`Horas_idHoras`,`Estado_cita_idEstado_cita`,`Empleado_idEmpleado`) USING BTREE,
  ADD KEY `Servicio_idServicio` (`Servicio_idServicio`),
  ADD KEY `Horas_idHoras` (`Horas_idHoras`),
  ADD KEY `Estado_cita_idEstado_cita` (`Estado_cita_idEstado_cita`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`iddias`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `dias_iddias` (`dias_iddias`),
  ADD KEY `cargo_idcargo` (`cargo_idcargo`);

--
-- Indices de la tabla `estado_cita`
--
ALTER TABLE `estado_cita`
  ADD PRIMARY KEY (`idEstado_cita`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`idHoras`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `cargo_idcargo` (`cargo_idcargo`);

--
-- Indices de la tabla `telefonos_c`
--
ALTER TABLE `telefonos_c`
  ADD KEY `idCliente_fk` (`idCliente_fk`);

--
-- Indices de la tabla `telefonos_e`
--
ALTER TABLE `telefonos_e`
  ADD KEY `Empleado_cedula` (`Empleado_cedula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `Roles_idRoles` (`Roles_idRoles`),
  ADD KEY `Cliente_idCliente` (`Cliente_idCliente`),
  ADD KEY `Empleado_cedula` (`Empleado_cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`Servicio_idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`Horas_idHoras`) REFERENCES `horas` (`idHoras`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_5` FOREIGN KEY (`Estado_cita_idEstado_cita`) REFERENCES `estado_cita` (`idEstado_cita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`dias_iddias`) REFERENCES `dias` (`iddias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`cargo_idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`cargo_idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `telefonos_c`
--
ALTER TABLE `telefonos_c`
  ADD CONSTRAINT `telefonos_c_ibfk_1` FOREIGN KEY (`idCliente_fk`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos_e`
--
ALTER TABLE `telefonos_e`
  ADD CONSTRAINT `telefonos_e_ibfk_1` FOREIGN KEY (`Empleado_cedula`) REFERENCES `empleado` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Roles_idRoles`) REFERENCES `roles` (`idRoles`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`Empleado_cedula`) REFERENCES `empleado` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `incitas` (IN `servicio1` INT, IN `cliente` INT, IN `empleado1` INT, IN `hora1` INT, IN `fecha1` DATE)  begin
	if((select cargo_idcargo from empleado where cedula=empleado1)=(select cargo_idcargo from servicio where idservicio=servicio1))then
		if(SELECT (case dayofweek(fecha1) when 2 then 'Lunes' when 3 then 'Martes' when 4 then 'Miércoles' when 5 then 'Jueves' when 6 then 'Viernes' when 7 then 'Sábado' when 1 then 'Domingo' end)=(select dia from dias inner join empleado on iddias=dias_iddias where cedula=empleado1)) then
			select 'El empleado descansa ese dia' as Alerta;
		else
			insert into citas (Servicio_idServicio,
  Cliente_idCliente,Empleado_idEmpleado,Horas_idHoras, Fecha_cita,Estado_cita_idEstado_cita) values (servicio1,cliente,empleado1,hora1,fecha1,1);
        end if;
	else
		select 'El empleado no puede realizar este servicio' as Alerta; 
    end if;
end$$

DELIMITER ;

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
