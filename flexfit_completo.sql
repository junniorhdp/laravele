-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2025 a las 20:38:59
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
-- Base de datos: `flexfit`
--
CREATE DATABASE IF NOT EXISTS `flexfit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `flexfit`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `obtener_rutinas_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_rutinas_usuario` (IN `p_id_usuario ` INT)   SELECT 
    r.id_rutina, r.nombre, r.descripcion, r.disciplina, r.duracion_total
  FROM rutina AS r
  INNER JOIN rutina_usuario AS ru 
    ON ru.id_rutina = r.id_rutina
  WHERE ru.id_usuario = p_id_usuario$$

DROP PROCEDURE IF EXISTS `obtener_seguimiento_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_seguimiento_usuario` (IN `p_id_usuario` INT)   SELECT 
    s.fecha, s.id_ejercicio, s.repeticiones_realizadas, s.series_realizadas, s.peso_usado
  FROM seguimiento AS s
  WHERE s.id_usuario = p_id_usuario
  ORDER BY s.fecha DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

DROP TABLE IF EXISTS `ejercicio`;
CREATE TABLE IF NOT EXISTS `ejercicio` (
  `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo_ejercicio` tinyint(4) DEFAULT NULL,
  `equipo_necesario` text DEFAULT NULL,
  `nivel_dificultad` enum('Bajo','Medio','Alto') DEFAULT NULL,
  `instrucciones` text DEFAULT NULL,
  `url_video` text DEFAULT NULL,
  PRIMARY KEY (`id_ejercicio`),
  KEY `tipo_ejercicio` (`tipo_ejercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id_ejercicio`, `nombre`, `tipo_ejercicio`, `equipo_necesario`, `nivel_dificultad`, `instrucciones`, `url_video`) VALUES
(1, 'Sentadillas', 2, 'Ninguno', '', 'Flexiona rodillas y baja lentamente', 'https://video.com/sentadillas'),
(2, 'Burpees', 1, 'Ninguno', '', 'Salta, baja, y haz flexión', 'https://video.com/burpees'),
(3, 'Plancha', 2, 'Colchoneta', '', 'Sostén el cuerpo recto por 30s', 'https://video.com/plancha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

DROP TABLE IF EXISTS `logros`;
CREATE TABLE IF NOT EXISTS `logros` (
  `id_logro` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `requisito` text DEFAULT NULL,
  `valoracion_num` tinyint(4) DEFAULT NULL,
  `estado` enum('Disponible','Bloqueado','Alcanzado') DEFAULT NULL,
  `cantidad` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_logro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logros`
--

INSERT INTO `logros` (`id_logro`, `nombre`, `descripcion`, `requisito`, `valoracion_num`, `estado`, `cantidad`) VALUES
(1, 'Primer Día', 'Completar una rutina', 'Completar 1 rutina', 10, '', 1),
(2, 'Fuerza Nivel 1', 'Realizar 3 rutinas de fuerza', '3 rutinas de fuerza', 20, '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

DROP TABLE IF EXISTS `medidas`;
CREATE TABLE IF NOT EXISTS `medidas` (
  `id_medida` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre_med` varchar(50) NOT NULL,
  PRIMARY KEY (`id_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id_medida`, `nombre_med`) VALUES
(1, 'Peso (kg)'),
(2, 'Estatura (cm)'),
(3, 'IMC'),
(4, 'Grasa Corporal (%)'),
(5, 'Masa Muscular (%)'),
(6, 'Frecuencia Cardiaca'),
(7, 'Presión Arterial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

DROP TABLE IF EXISTS `niveles`;
CREATE TABLE IF NOT EXISTS `niveles` (
  `id_nivel` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nombre`) VALUES
(1, 'Principiante'),
(2, 'Intermedio'),
(3, 'Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE IF NOT EXISTS `notificacion` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `estado` enum('Leída','No Leída') DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id_notificacion`, `id_usuario`, `mensaje`, `fecha_hora`, `estado`) VALUES
(1, 1, '¡Has completado tu primera rutina!', '2025-05-20 10:00:00', ''),
(2, 2, 'No olvides entrenar hoy', '2025-05-20 12:00:00', ''),
(3, 1, 'Has registrado 12 repeticiones y 3 series para el ejercicio ID 2', '2025-06-13 23:08:50', 'No Leída');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

DROP TABLE IF EXISTS `rutina`;
CREATE TABLE IF NOT EXISTS `rutina` (
  `id_rutina` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_nivel` tinyint(4) DEFAULT NULL,
  `disciplina` varchar(100) DEFAULT NULL,
  `duracion_total` varchar(50) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  PRIMARY KEY (`id_rutina`),
  KEY `id_nivel` (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`id_rutina`, `nombre`, `descripcion`, `id_nivel`, `disciplina`, `duracion_total`, `comentario`) VALUES
(1, 'Rutina Quema Grasa', 'Rutina intensa para bajar grasa', 1, 'Cardio', '30 min', 'Para principiantes'),
(2, 'Rutina Fuerza Total', 'Fortalecimiento general', 2, 'Fuerza', '45 min', 'Requiere concentración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina_ejercicio`
--

DROP TABLE IF EXISTS `rutina_ejercicio`;
CREATE TABLE IF NOT EXISTS `rutina_ejercicio` (
  `id_rutina_ejercicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_rutina` int(11) DEFAULT NULL,
  `id_ejercicio` int(11) DEFAULT NULL,
  `dia_semana` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') DEFAULT NULL,
  `orden` tinyint(4) DEFAULT NULL,
  `repeticiones` tinyint(4) DEFAULT NULL,
  `series` tinyint(4) DEFAULT NULL,
  `descanso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rutina_ejercicio`),
  KEY `id_rutina` (`id_rutina`),
  KEY `id_ejercicio` (`id_ejercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutina_ejercicio`
--

INSERT INTO `rutina_ejercicio` (`id_rutina_ejercicio`, `id_rutina`, `id_ejercicio`, `dia_semana`, `orden`, `repeticiones`, `series`, `descanso`) VALUES
(1, 1, 1, 'Lunes', 1, 15, 3, '30s'),
(2, 1, 2, 'Miércoles', 2, 10, 3, '30s'),
(3, 2, 3, 'Viernes', 1, 1, 3, '1min');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina_usuario`
--

DROP TABLE IF EXISTS `rutina_usuario`;
CREATE TABLE IF NOT EXISTS `rutina_usuario` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_rutina` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `estado` enum('Activa','Finalizada','Pausada') DEFAULT NULL,
  `adaptaciones_personalizadas` text DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_rutina` (`id_rutina`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutina_usuario`
--

INSERT INTO `rutina_usuario` (`id_asignacion`, `id_usuario`, `id_rutina`, `fecha_inicio`, `fecha_final`, `estado`, `adaptaciones_personalizadas`) VALUES
(1, 1, 1, '2025-05-15', NULL, 'Activa', 'Adaptada para rodillas sensibles'),
(2, 2, 2, '2025-05-16', NULL, 'Activa', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

DROP TABLE IF EXISTS `seguimiento`;
CREATE TABLE IF NOT EXISTS `seguimiento` (
  `id_progreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_ejercicio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `repeticiones_realizadas` tinyint(4) DEFAULT NULL,
  `series_realizadas` tinyint(4) DEFAULT NULL,
  `peso_usado` decimal(5,2) DEFAULT NULL,
  `comentarios` text DEFAULT NULL,
  PRIMARY KEY (`id_progreso`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_ejercicio` (`id_ejercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id_progreso`, `id_usuario`, `id_ejercicio`, `fecha`, `repeticiones_realizadas`, `series_realizadas`, `peso_usado`, `comentarios`) VALUES
(1, 1, 1, '2025-05-17', 15, 3, 0.00, 'Bien hecho'),
(2, 2, 3, '2025-05-17', 1, 3, 0.00, 'Excelente core'),
(3, 1, 2, '2025-05-18', 10, 3, 0.00, 'Cansado pero cumplido'),
(4, 1, 2, '2025-06-14', 12, 3, 15.00, 'Prueba trigger');

--
-- Disparadores `seguimiento`
--
DROP TRIGGER IF EXISTS `trg_notif_seguimiento`;
DELIMITER $$
CREATE TRIGGER `trg_notif_seguimiento` AFTER INSERT ON `seguimiento` FOR EACH ROW INSERT INTO notificacion (id_usuario, mensaje, fecha_hora, estado)
VALUES (
  NEW.id_usuario,
  CONCAT(
    'Has registrado ', NEW.repeticiones_realizadas,
    ' repeticiones y ', NEW.series_realizadas,
    ' series para el ejercicio ID ', NEW.id_ejercicio
  ),
  NOW(),
  'No Leída'
)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ejercicio`
--

DROP TABLE IF EXISTS `tipo_ejercicio`;
CREATE TABLE IF NOT EXISTS `tipo_ejercicio` (
  `id_tipo` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ejercicio`
--

INSERT INTO `tipo_ejercicio` (`id_tipo`, `nombre`) VALUES
(1, 'Cardio'),
(2, 'Fuerza'),
(3, 'Resistencia'),
(4, 'Flexibilidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `rol` enum('Usuario','Profesional','Admin') NOT NULL DEFAULT 'Usuario',
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `rol`) VALUES
(1, 'Usuario'),
(2, 'Profesional'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `genero` enum('Masculino','Femenino','Otro') NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `edad` tinyint(4) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `objetivo` varchar(100) DEFAULT NULL,
  `disciplina_preferida` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `id_tipo_usuario` tinyint(4) DEFAULT NULL,
  `id_medida` smallint(6) DEFAULT NULL,
  `nivel_usuario` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  KEY `id_medida` (`id_medida`),
  KEY `nivel_usuario` (`nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `genero`, `contrasena`, `edad`, `email`, `objetivo`, `disciplina_preferida`, `fecha_registro`, `id_tipo_usuario`, `id_medida`, `nivel_usuario`) VALUES
(1, 'Camila', 'Moreno', 'Masculino', '1234', 25, 'camila@email.com', 'Perder peso', 'Zumba', '2025-05-01', 1, 1, 1),
(2, 'Daniel', 'López', 'Masculino', '1234', 30, 'daniel@email.com', 'Ganar masa muscular', 'Crossfit', '2025-05-02', 1, 2, 2),
(3, 'Laura', 'García', 'Masculino', '1234', 32, 'laura@email.com', 'Motivar usuarios', 'Funcional', '2025-05-03', 2, 3, 2),
(4, 'Carlos', 'Ramírez', 'Masculino', '1234', 40, 'carlos@email.com', 'Evaluar progreso', 'Evaluación física', '2025-05-04', 2, 4, 3),
(5, 'Ana', 'Torres', 'Masculino', '1234', 35, 'ana@email.com', 'Administrar sistema', 'Gestión', '2025-05-05', 3, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_logro`
--

DROP TABLE IF EXISTS `usuario_logro`;
CREATE TABLE IF NOT EXISTS `usuario_logro` (
  `id_usuario` int(11) NOT NULL,
  `id_logro` smallint(6) NOT NULL,
  `fecha_obtenida` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_logro`),
  KEY `id_logro` (`id_logro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_logro`
--

INSERT INTO `usuario_logro` (`id_usuario`, `id_logro`, `fecha_obtenida`) VALUES
(1, 1, '2025-05-19'),
(2, 2, '2025-05-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_profesional`
--

DROP TABLE IF EXISTS `valoracion_profesional`;
CREATE TABLE IF NOT EXISTS `valoracion_profesional` (
  `id_valoracion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_valoracion` date DEFAULT NULL,
  `comentarios` text DEFAULT NULL,
  `id_medida` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_valoracion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_medida` (`id_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoracion_profesional`
--

INSERT INTO `valoracion_profesional` (`id_valoracion`, `id_usuario`, `fecha_valoracion`, `comentarios`, `id_medida`) VALUES
(1, 1, '2025-05-10', 'Buena evolución', 1),
(2, 2, '2025-05-11', 'Requiere mejorar fuerza', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `ejercicio_ibfk_1` FOREIGN KEY (`tipo_ejercicio`) REFERENCES `tipo_ejercicio` (`id_tipo`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD CONSTRAINT `rutina_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`);

--
-- Filtros para la tabla `rutina_ejercicio`
--
ALTER TABLE `rutina_ejercicio`
  ADD CONSTRAINT `rutina_ejercicio_ibfk_1` FOREIGN KEY (`id_rutina`) REFERENCES `rutina` (`id_rutina`),
  ADD CONSTRAINT `rutina_ejercicio_ibfk_2` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id_ejercicio`);

--
-- Filtros para la tabla `rutina_usuario`
--
ALTER TABLE `rutina_usuario`
  ADD CONSTRAINT `rutina_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `rutina_usuario_ibfk_2` FOREIGN KEY (`id_rutina`) REFERENCES `rutina` (`id_rutina`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `seguimiento_ibfk_2` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id_ejercicio`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_medida`) REFERENCES `medidas` (`id_medida`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`nivel_usuario`) REFERENCES `niveles` (`id_nivel`);

--
-- Filtros para la tabla `usuario_logro`
--
ALTER TABLE `usuario_logro`
  ADD CONSTRAINT `usuario_logro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuario_logro_ibfk_2` FOREIGN KEY (`id_logro`) REFERENCES `logros` (`id_logro`);

--
-- Filtros para la tabla `valoracion_profesional`
--
ALTER TABLE `valoracion_profesional`
  ADD CONSTRAINT `valoracion_profesional_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `valoracion_profesional_ibfk_2` FOREIGN KEY (`id_medida`) REFERENCES `medidas` (`id_medida`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
