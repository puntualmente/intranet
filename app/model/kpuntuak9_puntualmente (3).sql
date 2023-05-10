-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 23:52:36
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kpuntuak9_puntualmente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(10) NOT NULL,
  `n_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `n_area`) VALUES
(1, 'Administrativo'),
(2, 'Tecnologia'),
(3, 'Operativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(10) NOT NULL,
  `n_empresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `n_empresa`) VALUES
(1, 'Puntualmente'),
(2, 'CLAB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id_etiqueta` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `descrip_etiq` varchar(1000) NOT NULL,
  `t_estimado` int(10) NOT NULL,
  `tipo_t` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id_etiqueta`, `id_area`, `descrip_etiq`, `t_estimado`, `tipo_t`) VALUES
(1, 1, 'Solicitud Certificacion Laboral', 5, 'Dias'),
(2, 1, 'Solicitud Desprendibles de Nomina', 5, 'Dias'),
(3, 1, 'Solicitud Vacaciones', 5, 'Dias'),
(4, 1, 'Solicitud Certificado Ingresos y Retenciones', 5, 'Dias'),
(5, 1, 'Solicitud Planilla Seguridad Social', 5, 'Dias'),
(6, 1, 'Solicitud Prestamos Internos', 7, 'Dias'),
(7, 2, 'Soporte Diadema', 5, 'Minutos'),
(8, 2, 'Soporte Equipo', 15, 'Minutos'),
(9, 2, 'Soporte Remoto (Home Office)', 15, 'Minutos'),
(13, 3, 'General', 5, 'Minutos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `n_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `n_grupo`) VALUES
(1, 'Administrativo'),
(2, 'Avista'),
(3, 'Bayport'),
(4, 'Bbva'),
(5, 'Bcs'),
(6, 'Consigue Tu Credito'),
(7, 'Coopetrol'),
(8, 'Credivalores'),
(9, 'Doowin'),
(10, 'Dr Peso'),
(11, 'Finandina'),
(12, 'Flex Fintech'),
(13, 'Garnet'),
(14, 'Pichincha'),
(15, 'Rapicredit'),
(16, 'Rapihome'),
(17, 'Tecnologia'),
(18, 'Tigo Panama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_chat`
--

CREATE TABLE `grupos_chat` (
  `id_grupo` int(10) NOT NULL,
  `n_grupo` varchar(50) NOT NULL,
  `propietario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos_chat`
--

INSERT INTO `grupos_chat` (`id_grupo`, `n_grupo`, `propietario`) VALUES
(1, 'Nuevo Grupo', 143);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_integrante`
--

CREATE TABLE `grupo_integrante` (
  `id` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `tipo_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo_integrante`
--

INSERT INTO `grupo_integrante` (`id`, `id_grupo`, `id_usuario`, `tipo_user`) VALUES
(1, 1, 2, 'user'),
(2, 1, 143, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefe_grupo`
--

CREATE TABLE `jefe_grupo` (
  `id` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `id_jefe` int(10) NOT NULL,
  `id_area` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jefe_grupo`
--

INSERT INTO `jefe_grupo` (`id`, `id_grupo`, `id_jefe`, `id_area`) VALUES
(1, 1, 23, 1),
(2, 1, 45, 1),
(3, 1, 99, 1),
(4, 2, 153, 3),
(5, 3, 89, 3),
(6, 4, 163, 3),
(7, 4, 48, 3),
(8, 4, 296, 3),
(9, 4, 60, 3),
(10, 4, 66, 3),
(11, 4, 140, 3),
(12, 4, 157, 3),
(13, 4, 235, 3),
(14, 4, 287, 3),
(15, 5, 206, 3),
(16, 5, 90, 3),
(17, 5, 272, 3),
(18, 6, 212, 3),
(19, 7, 150, 3),
(20, 7, 16, 3),
(21, 8, 16, 3),
(22, 8, 106, 3),
(23, 8, 160, 3),
(24, 9, 183, 3),
(25, 10, 153, 3),
(26, 10, 150, 3),
(27, 11, 136, 3),
(28, 11, 142, 3),
(29, 11, 153, 3),
(30, 11, 284, 3),
(31, 13, 153, 3),
(32, 13, 284, 3),
(33, 14, 160, 3),
(34, 14, 153, 3),
(35, 15, 186, 3),
(36, 15, 300, 3),
(37, 15, 301, 3),
(38, 16, 186, 3),
(39, 16, 300, 3),
(40, 17, 50, 2),
(41, 17, 101, 2),
(42, 17, 117, 2),
(43, 17, 143, 2),
(44, 18, 279, 3),
(45, 18, 329, 3),
(46, 18, 25, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_grupos`
--

CREATE TABLE `mensajes_grupos` (
  `id` int(10) NOT NULL,
  `id_msg` int(10) NOT NULL,
  `id_persona` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes_grupos`
--

INSERT INTO `mensajes_grupos` (`id`, `id_msg`, `id_persona`, `id_grupo`, `estado`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 143, 1, 1),
(3, 111, 2, 1, 1),
(4, 111, 143, 1, 1),
(5, 120, 2, 1, 1),
(6, 120, 143, 1, 1),
(7, 3, 2, 1, 1),
(8, 3, 143, 1, 1),
(9, 4, 2, 1, 1),
(10, 4, 143, 1, 1),
(11, 5, 2, 1, 1),
(12, 5, 143, 1, 1),
(13, 6, 2, 1, 1),
(14, 6, 143, 1, 1),
(15, 7, 2, 1, 0),
(16, 7, 143, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`, `estado`, `fecha`, `hora`, `ip`) VALUES
(1, 143, 2, 'Holaa', '', 0, 1, '2023-05-08', '15:25:42', '::1'),
(2, 143, 2, 'hey', '', 0, 1, '2023-05-08', '15:37:16', '::1'),
(3, 143, 2, 'Hola', '', 0, 1, '2023-05-08', '15:38:31', '::1'),
(4, 2, 143, 'jaja', '', 0, 1, '2023-05-08', '15:39:19', '127.0.0.1'),
(5, 143, 2, '', '1683578512image.png', 1, 1, '2023-05-08', '15:41:52', '::1'),
(6, 2, 143, 'Holaaaaa!!', '', 0, 1, '2023-05-08', '15:44:19', '127.0.0.1'),
(7, 2, 143, 'jaja', '', 0, 1, '2023-05-08', '15:52:00', '127.0.0.1'),
(8, 143, 1, 'Hola', '', 0, 1, '2023-05-08', '16:22:57', '172.16.20.12'),
(9, 1, 143, 'que tal?', '', 0, 1, '2023-05-08', '16:23:31', '127.0.0.1'),
(10, 1, 60, 'HOLA!!', '', 0, 1, '2023-05-08', '16:29:42', '::1'),
(11, 1, 60, '', '1683581484image.png', 1, 1, '2023-05-08', '16:31:24', '::1'),
(12, 1, 60, '', '1683581543image.png', 1, 1, '2023-05-08', '16:32:23', '::1'),
(13, 1, 60, 'HOLA', '', 0, 1, '2023-05-08', '16:32:56', '::1'),
(14, 1, 60, 'jkashd', '', 0, 1, '2023-05-08', '16:32:58', '::1'),
(15, 1, 60, 'jekjad', '', 0, 1, '2023-05-08', '16:33:04', '::1'),
(16, 1, 60, 'jhdf', '', 0, 1, '2023-05-08', '16:33:11', '::1'),
(17, 1, 60, 'iuris', '', 0, 1, '2023-05-08', '16:33:17', '::1'),
(18, 143, 2, 'jaja', '', 0, 1, '2023-05-08', '16:34:13', '::1'),
(19, 143, 2, 'Hola', '', 0, 1, '2023-05-08', '16:34:16', '::1'),
(20, 143, 2, 'hey', '', 0, 1, '2023-05-08', '16:34:19', '::1'),
(21, 143, 2, 'aklsj', '', 0, 1, '2023-05-08', '16:34:22', '::1'),
(22, 60, 1, 'Jshsjsg', '', 0, 1, '2023-05-08', '16:35:12', '172.16.20.12'),
(23, 1, 60, 'jasdh', '', 0, 1, '2023-05-08', '16:37:04', '::1'),
(24, 1, 60, 'kjh', '', 0, 1, '2023-05-08', '16:37:14', '::1'),
(25, 1, 60, 'Holaa', '', 0, 1, '2023-05-08', '16:38:02', '::1'),
(26, 143, 2, 'sjhd', '', 0, 1, '2023-05-08', '16:39:50', '::1'),
(27, 143, 2, 'ssk', '', 0, 1, '2023-05-08', '16:39:53', '::1'),
(28, 143, 2, 'jaja', '', 0, 1, '2023-05-08', '16:39:58', '::1'),
(29, 60, 1, 'Uwgz', '', 0, 1, '2023-05-08', '16:40:15', '172.16.20.12'),
(30, 1, 60, 'hsjgd', '', 0, 1, '2023-05-08', '16:40:22', '::1'),
(31, 1, 60, 'jsdhf', '', 0, 1, '2023-05-08', '16:40:23', '::1'),
(32, 60, 1, 'Jahahs', '', 0, 1, '2023-05-08', '16:41:16', '172.16.20.12'),
(33, 1, 60, 'hajsh', '', 0, 1, '2023-05-08', '16:41:21', '::1'),
(34, 1, 60, 'ksjdhf', '', 0, 1, '2023-05-08', '16:41:23', '::1'),
(35, 1, 60, 'djfj', '', 0, 1, '2023-05-08', '16:41:26', '::1'),
(36, 1, 60, 'Hola', '', 0, 1, '2023-05-09', '08:10:18', '::1'),
(37, 1, 2, 'Hola!!', '', 0, 1, '2023-05-09', '10:42:49', '::1'),
(38, 60, 2, 'Hola!', '', 0, 1, '2023-05-09', '10:43:12', '::1'),
(39, 60, 2, 'asjhd', '', 0, 1, '2023-05-09', '10:44:08', '::1'),
(40, 60, 2, 'jas', '', 0, 0, '2023-05-09', '10:44:17', '::1'),
(41, 60, 2, 'sakjdh', '', 0, 0, '2023-05-09', '10:44:19', '::1'),
(42, 60, 2, 'uegd', '', 0, 0, '2023-05-09', '10:44:21', '::1'),
(43, 60, 2, 'ashgd', '', 0, 0, '2023-05-09', '10:44:23', '::1'),
(44, 60, 2, 'gwahedv', '', 0, 0, '2023-05-09', '10:44:26', '::1'),
(45, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '10:54:28', '::1'),
(46, 143, 2, 'Hola', '', 0, 1, '2023-05-10', '10:55:47', '::1'),
(47, 2, 143, 'hey', '', 0, 1, '2023-05-10', '10:56:06', '::1'),
(48, 2, 143, 'hey', '', 0, 1, '2023-05-10', '10:56:24', '::1'),
(49, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '10:58:18', '::1'),
(50, 143, 2, 'Hola', '', 0, 1, '2023-05-10', '10:58:40', '::1'),
(51, 143, 2, 'Hola', '', 0, 1, '2023-05-10', '10:59:34', '::1'),
(52, 2, 143, 'Holaaa', '', 0, 1, '2023-05-10', '10:59:51', '::1'),
(53, 2, 143, 'Holaaaaa', '', 0, 1, '2023-05-10', '11:02:26', '::1'),
(54, 2, 143, 'ahshgd', '', 0, 1, '2023-05-10', '11:03:11', '::1'),
(55, 2, 143, 'jahsgd', '', 0, 1, '2023-05-10', '11:03:16', '::1'),
(56, 2, 143, 'Hollaaa', '', 0, 1, '2023-05-10', '11:04:37', '::1'),
(57, 2, 143, 'hey', '', 0, 1, '2023-05-10', '11:07:36', '::1'),
(58, 143, 2, 'Hola', '', 0, 1, '2023-05-10', '11:22:58', '::1'),
(59, 143, 2, 'que tal', '', 0, 1, '2023-05-10', '11:23:06', '::1'),
(60, 143, 2, '', '1683737293image.png', 1, 1, '2023-05-10', '11:48:13', '::1'),
(61, 143, 2, 'Hola', '', 0, 1, '2023-05-10', '12:00:42', '::1'),
(62, 143, 2, '', '1683738614image.png', 1, 1, '2023-05-10', '12:10:14', '::1'),
(63, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '12:19:46', '::1'),
(64, 2, 143, ' que tal!', '', 0, 1, '2023-05-10', '12:19:54', '::1'),
(65, 143, 2, 'holaaa', '', 0, 1, '2023-05-10', '12:22:57', '::1'),
(66, 0, 143, 'Hola', '', 0, 0, '2023-05-10', '12:47:43', '::1'),
(67, 0, 2, 'Hola', '', 0, 0, '2023-05-10', '12:49:29', '::1'),
(68, 0, 2, 'Holaaa', '', 0, 0, '2023-05-10', '12:49:50', '::1'),
(69, 0, 2, 'hey', '', 0, 0, '2023-05-10', '12:50:38', '::1'),
(70, 0, 2, 'hey', '', 0, 0, '2023-05-10', '12:51:16', '::1'),
(71, 0, 2, 'que tal', '', 0, 0, '2023-05-10', '12:51:26', '::1'),
(72, 0, 143, 'hi', '', 0, 0, '2023-05-10', '12:51:34', '::1'),
(73, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '12:56:24', '::1'),
(74, 2, 143, 'hey', '', 0, 1, '2023-05-10', '12:57:05', '::1'),
(75, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '13:03:44', '::1'),
(76, 143, 2, 'hey', '', 0, 1, '2023-05-10', '13:03:50', '::1'),
(77, 2, 143, 'jaja', '', 0, 1, '2023-05-10', '13:03:59', '::1'),
(78, 143, 2, 'hi', '', 0, 1, '2023-05-10', '13:04:15', '::1'),
(79, 2, 143, 'que tal?', '', 0, 1, '2023-05-10', '13:04:23', '::1'),
(80, 143, 2, 'hi', '', 0, 1, '2023-05-10', '13:04:44', '::1'),
(81, 2, 143, 'Como estas?', '', 0, 1, '2023-05-10', '13:04:54', '::1'),
(82, 143, 2, 'hi', '', 0, 1, '2023-05-10', '13:05:08', '::1'),
(83, 2, 143, 'Que tal?', '', 0, 1, '2023-05-10', '13:05:17', '::1'),
(84, 143, 2, 'hi', '', 0, 1, '2023-05-10', '13:07:11', '::1'),
(85, 2, 143, 'Como estas?', '', 0, 1, '2023-05-10', '13:07:23', '::1'),
(86, 143, 2, 'Hola', '', 0, 1, '2023-05-10', '13:08:42', '::1'),
(87, 2, 143, 'que tal ', '', 0, 1, '2023-05-10', '13:08:50', '::1'),
(88, 143, 2, 'que tal?', '', 0, 1, '2023-05-10', '13:10:15', '::1'),
(89, 143, 2, 'hi', '', 0, 1, '2023-05-10', '13:10:29', '::1'),
(90, 143, 2, 'hey', '', 0, 1, '2023-05-10', '13:11:56', '::1'),
(91, 2, 143, 'Como estas?', '', 0, 1, '2023-05-10', '13:12:12', '::1'),
(92, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '13:17:17', '::1'),
(93, 143, 2, 'quetal', '', 0, 1, '2023-05-10', '13:17:38', '::1'),
(94, 2, 143, 'bien', '', 0, 1, '2023-05-10', '13:17:45', '::1'),
(95, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '14:32:53', '::1'),
(96, 143, 2, 'Que tal?', '', 0, 1, '2023-05-10', '14:33:35', '::1'),
(97, 143, 2, 'Buenas', '', 0, 1, '2023-05-10', '14:33:57', '::1'),
(98, 143, 2, 'hey', '', 0, 1, '2023-05-10', '14:34:12', '::1'),
(99, 2, 143, 'jaja', '', 0, 1, '2023-05-10', '14:35:52', '::1'),
(100, 2, 143, '', '1683747471image.png', 1, 1, '2023-05-10', '14:37:51', '::1'),
(101, 2, 143, '', '1683747723image.png', 1, 1, '2023-05-10', '14:42:03', '::1'),
(102, 2, 143, '', '1683747735image.png', 1, 1, '2023-05-10', '14:42:15', '::1'),
(103, 2, 143, '', '1683747744image.png', 1, 1, '2023-05-10', '14:42:24', '::1'),
(104, 2, 143, '', '1683747752image.png', 1, 1, '2023-05-10', '14:42:32', '::1'),
(105, 2, 143, '', '1683747772image.png', 1, 1, '2023-05-10', '14:42:52', '::1'),
(106, 143, 2, '', '1683748137image.png', 1, 1, '2023-05-10', '14:48:57', '::1'),
(107, 143, 2, '', '1683748263image.png', 1, 1, '2023-05-10', '14:51:03', '::1'),
(108, 143, 2, '', '1683748274image.png', 1, 1, '2023-05-10', '14:51:14', '::1'),
(109, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '14:57:19', '::1'),
(110, 2, 143, 'Que tal?', '', 0, 1, '2023-05-10', '14:57:26', '::1'),
(111, 1, 143, 'Holaaa', '', 0, 1, '2023-05-10', '14:59:42', '::1'),
(112, 143, 1, 'Hey', '', 0, 1, '2023-05-10', '15:00:02', '172.16.20.12'),
(113, 2, 1, 'Jjaja', '', 0, 1, '2023-05-10', '15:00:31', '172.16.20.12'),
(114, 60, 1, 'Que tal?', '', 0, 0, '2023-05-10', '15:00:39', '172.16.20.12'),
(115, 60, 2, 'jaja', '', 0, 0, '2023-05-10', '15:05:32', '::1'),
(116, 60, 1, 'Hey', '', 0, 0, '2023-05-10', '15:05:43', '172.16.20.12'),
(117, 2, 1, 'Jaja', '', 0, 1, '2023-05-10', '15:05:55', '172.16.20.12'),
(118, 1, 2, '', '1683749171image.png', 1, 1, '2023-05-10', '15:06:11', '::1'),
(119, 143, 2, 'jaja', '', 0, 1, '2023-05-10', '15:10:37', '::1'),
(120, 1, 2, 'jaja', '', 0, 1, '2023-05-10', '15:10:51', '::1'),
(121, 2, 143, 'Hola', '', 0, 1, '2023-05-10', '15:26:54', '::1'),
(122, 143, 2, 'Que tal?', '', 0, 1, '2023-05-10', '15:27:13', '::1'),
(123, 2, 1, 'Hola', '', 0, 1, '2023-05-10', '15:33:42', '172.16.20.12'),
(124, 1, 2, '', '16837532681682712118image.png', 1, 0, '2023-05-10', '16:14:28', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages_grupos`
--

CREATE TABLE `messages_grupos` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages_grupos`
--

INSERT INTO `messages_grupos` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`, `estado`, `fecha`, `hora`, `ip`) VALUES
(1, 1, 143, 'Hola', '', 0, 0, '2023-05-10', '11:17:05', '::1'),
(2, 1, 2, '', '1683737346image.png', 1, 0, '2023-05-10', '11:49:06', '::1'),
(3, 1, 2, 'Hola', '', 0, 0, '2023-05-10', '16:26:56', '::1'),
(4, 1, 2, 'que tal?', '', 0, 0, '2023-05-10', '16:27:08', '::1'),
(5, 1, 2, 'jaja', '', 0, 0, '2023-05-10', '16:27:27', '::1'),
(6, 1, 2, 'shdgad', '', 0, 0, '2023-05-10', '16:32:23', '::1'),
(7, 1, 143, 'jsahjd', '', 0, 0, '2023-05-10', '16:48:06', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(10) NOT NULL,
  `id_origen` int(10) NOT NULL,
  `id_destino` int(10) NOT NULL,
  `tipo_noty` varchar(100) NOT NULL,
  `descrip_noty` varchar(500) NOT NULL,
  `f_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `id_origen`, `id_destino`, `tipo_noty`, `descrip_noty`, `f_h`, `visto`) VALUES
(1, 60, 143, 'tkt-asig', 'Te fue asignado un ticket', '2023-05-09 17:13:35', 0),
(2, 2, 143, 'tkt-redir', 'Te fue asignado un ticket', '2023-05-09 17:13:56', 0),
(4, 2, 143, 'tkt-solu', 'Te fue asignado el ticket 7', '2023-05-09 17:14:12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(10) NOT NULL,
  `n_sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `n_sede`) VALUES
(1, 'Calle 75'),
(2, 'Teusaquillo'),
(3, 'Calle 19'),
(4, 'Medellin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `ip_origen` varchar(15) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `id_grupo_proyecto` int(10) NOT NULL,
  `id_propietario_tck` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `id_jefe` int(10) NOT NULL,
  `id_etiqueta` int(10) NOT NULL,
  `descrip` varchar(500) NOT NULL,
  `estado` int(3) NOT NULL,
  `descrip_solucion` varchar(1000) NOT NULL,
  `id_area_redireccion` int(10) NOT NULL,
  `f_h_cierre` datetime NOT NULL,
  `ip_cierre` varchar(15) NOT NULL,
  `id_user_cierre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `fecha_hora`, `ip_origen`, `id_empresa`, `id_grupo_proyecto`, `id_propietario_tck`, `id_area`, `id_jefe`, `id_etiqueta`, `descrip`, `estado`, `descrip_solucion`, `id_area_redireccion`, `f_h_cierre`, `ip_cierre`, `id_user_cierre`) VALUES
(1, '2023-05-08 04:25:58', '172.16.20.12', 1, 18, 1, 2, 143, 9, 'Por favor', 3, 'listo', 0, '2023-05-08 04:27:41', '::1', 60),
(2, '2023-05-09 07:19:02', '::1', 2, 4, 2, 3, 60, 13, 'Por favor', 3, 'ok', 0, '2023-05-09 07:19:37', '::1', 60),
(3, '2023-05-09 08:58:12', '::1', 2, 4, 2, 2, 143, 9, 'Por favor', 1, '', 0, '2023-05-09 08:58:12', '', 0),
(4, '2023-05-09 09:00:06', '::1', 2, 4, 60, 2, 143, 9, 'please', 1, '', 0, '2023-05-09 09:00:06', '', 0),
(5, '2023-05-09 09:58:49', '::1', 2, 4, 2, 2, 143, 8, 'Por favor', 1, '', 0, '2023-05-09 09:58:49', '', 0),
(6, '2023-05-09 10:24:03', '::1', 2, 4, 2, 2, 143, 8, 'Ok', 1, '', 0, '2023-05-09 10:24:03', '', 0),
(7, '2023-05-09 10:27:33', '::1', 2, 4, 2, 2, 143, 9, 'Por favor', 1, '', 0, '2023-05-09 10:27:33', '', 0),
(8, '2023-05-09 10:32:55', '::1', 2, 4, 2, 2, 143, 7, 'Por favor', 1, '', 0, '2023-05-09 10:32:55', '', 0),
(9, '2023-05-09 10:33:48', '::1', 2, 4, 2, 2, 143, 9, 'Por favor', 1, '', 0, '2023-05-09 10:33:48', '', 0),
(10, '2023-05-09 10:35:47', '::1', 2, 4, 2, 2, 143, 9, 'Please', 1, '', 0, '2023-05-09 10:35:47', '', 0),
(11, '2023-05-09 11:11:44', '::1', 2, 4, 2, 2, 143, 8, 'ok', 1, '', 0, '2023-05-09 11:11:44', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_redireccion`
--

CREATE TABLE `ticket_redireccion` (
  `id_redireccion` int(10) NOT NULL,
  `id_ticket` int(10) NOT NULL,
  `descrip_redirec` varchar(1000) NOT NULL,
  `area_redireccion` int(10) NOT NULL,
  `id_jefe` int(10) NOT NULL,
  `user_redireccion` int(10) NOT NULL,
  `f_h_redireccion` date NOT NULL,
  `estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket_redireccion`
--

INSERT INTO `ticket_redireccion` (`id_redireccion`, `id_ticket`, `descrip_redirec`, `area_redireccion`, `id_jefe`, `user_redireccion`, `f_h_redireccion`, `estado`) VALUES
(1, 1, 'por favor', 3, 60, 143, '2023-05-08', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `n_user` varchar(100) NOT NULL,
  `l_user` varchar(100) NOT NULL,
  `tel_user` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `id_area` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `f_ingreso_empre` date NOT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `rol` int(5) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `n_user`, `l_user`, `tel_user`, `cedula`, `password`, `f_nacimiento`, `id_area`, `id_empresa`, `f_ingreso_empre`, `id_grupo`, `rol`, `img`, `status`, `activo`) VALUES
(1, 'Abisag Betsabet', 'Mora Martinez', '3044585770', '5023059', '76381f4a7041c27ab1b4075eb93538b3', '2000-09-10', 3, 1, '2022-11-09', 18, 3, 'puntual.jpg', 'Disponible', 1),
(2, 'Adriana Katerine', 'Yara Vera', '3225955541', '52760847', '76381f4a7041c27ab1b4075eb93538b3', '1984-01-04', 3, 2, '2020-09-01', 4, 3, 'clab.jpeg', 'Disponible', 1),
(3, 'Aireth Daniela', 'Poloche Gomez', '3224743066', '1000695696', '76381f4a7041c27ab1b4075eb93538b3', '2003-07-29', 3, 1, '2023-01-14', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(4, 'Alba Rocio', 'Avendano Barrera', '3144661047', '1022947451', '76381f4a7041c27ab1b4075eb93538b3', '1988-12-08', 3, 2, '2023-03-22', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(5, 'Alejandra', 'Franco Restrepo', '3004583941', '1036336779', '76381f4a7041c27ab1b4075eb93538b3', '1988-08-06', 3, 2, '2023-02-20', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(6, 'Alexander', 'Restrepo Ardila', '3188001946', '11189679', '76381f4a7041c27ab1b4075eb93538b3', '1973-10-14', 3, 1, '2022-11-09', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(7, 'Alison Daniela', 'Castro Perez', '3102560339', '1024543765', '76381f4a7041c27ab1b4075eb93538b3', '1993-08-29', 3, 1, '2022-12-02', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(8, 'Ana Cristina', 'Guayazan Granados', '3114518537', '1018424633', '76381f4a7041c27ab1b4075eb93538b3', '1989-01-03', 3, 2, '2021-02-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(9, 'Ana Gisella', 'Marquez Salazar', '3208340643', '1010241745', '76381f4a7041c27ab1b4075eb93538b3', '1998-03-30', 3, 1, '2023-04-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(10, 'Ana Maria', 'Borjas Colemnarez', '3117917638', '4975411', '76381f4a7041c27ab1b4075eb93538b3', '1988-08-19', 3, 1, '2022-11-05', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(11, 'Ana Valentina', 'Jimenez Silvera', '3045253576', '1234096697', '76381f4a7041c27ab1b4075eb93538b3', '1999-10-23', 3, 2, '2023-02-16', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(12, 'Anderson Stiven', 'Ortiz Rodriguez', '3195446963', '1010104120', '76381f4a7041c27ab1b4075eb93538b3', '2002-10-31', 3, 1, '2023-01-27', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(13, 'Andrea Carolina', 'Franco Caita', '3045921910', '1016943413', '76381f4a7041c27ab1b4075eb93538b3', '2004-04-26', 3, 1, '2023-04-14', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(14, 'Andrea Meliza', 'Torrecillas Aros', '3054063539', '1018495329', '76381f4a7041c27ab1b4075eb93538b3', '1997-07-04', 3, 1, '2023-04-13', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(15, 'Andres Camilo', 'Moreno Beltran', '3123730358', '1013667787', '76381f4a7041c27ab1b4075eb93538b3', '1996-05-21', 3, 2, '2023-03-24', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(16, 'Andres Eduardo', 'Leguia Peluffo', '3215108958', '1002343605', '76381f4a7041c27ab1b4075eb93538b3', '2001-04-22', 3, 1, '2022-02-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(17, 'Andres Felipe', 'Gaitan Bohorquez', '3192694485', '1010009851', '76381f4a7041c27ab1b4075eb93538b3', '2000-09-03', 3, 1, '2023-04-21', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(18, 'Andres Felipe', 'Hernandez Martinez', '3104856295', '1034397516', '76381f4a7041c27ab1b4075eb93538b3', '2004-11-03', 3, 1, '2022-12-28', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(19, 'Andres Felipe', 'Molina Cruz', '3192476328', '1013096295', '76381f4a7041c27ab1b4075eb93538b3', '2003-10-10', 3, 1, '2022-10-27', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(20, 'Andres Felipe', 'Rangel Betancourt', '3102161846', '1066478048', '76381f4a7041c27ab1b4075eb93538b3', '2003-07-28', 3, 1, '2022-10-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(21, 'Andres Felipe', 'Triana Acero', '3196741080', '1000225162', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-27', 3, 1, '2022-11-16', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(22, 'Andres Mauricio', 'Polania Ramos', '3145881800', '1000591948', '76381f4a7041c27ab1b4075eb93538b3', '2001-10-17', 3, 1, '2023-01-13', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(23, 'Andres Mauricio', 'Vega Guayacan', '3057075591', '80252083', '76381f4a7041c27ab1b4075eb93538b3', '1986-01-22', 1, 1, '2019-06-01', 1, 1, 'puntual.jpg', 'Desconectado', 1),
(24, 'Angela Karina', 'Calderon Guerrero', '3213846592', '1024576695', '76381f4a7041c27ab1b4075eb93538b3', '1996-10-24', 3, 1, '2023-03-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(25, 'Angelica Rocio', 'Mejia Sanchez', '3145537161', '1070596852', '76381f4a7041c27ab1b4075eb93538b3', '1989-06-04', 3, 1, '2023-04-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(26, 'Angelly Vanessa', 'Tavera Cruz', '3041096763', '1000857283', '76381f4a7041c27ab1b4075eb93538b3', '2003-10-24', 3, 2, '2022-08-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(27, 'Angie Julieth', 'Beltran Forero', '3024187937', '1012418334', '76381f4a7041c27ab1b4075eb93538b3', '1994-12-21', 3, 1, '2023-02-03', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(28, 'Angie', 'Katerine Zuluaga', '3166150647', '1098743756', '76381f4a7041c27ab1b4075eb93538b3', '1993-09-16', 3, 2, '2023-02-03', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(29, 'Angie Liliana', 'Buitrago Martinez', '3138586094', '1000136712', '76381f4a7041c27ab1b4075eb93538b3', '2000-03-24', 3, 1, '2023-01-24', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(30, 'Angie Lucia', 'Camargo Mendez', '3118891085', '1022962614', '76381f4a7041c27ab1b4075eb93538b3', '1990-09-05', 3, 1, '2023-01-17', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(31, 'Angie Lucia', 'Zubieta Aguilar', '3153356605', '1024583355', '76381f4a7041c27ab1b4075eb93538b3', '1997-08-14', 3, 2, '2022-12-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(32, 'Angie Milena', 'Sosa Salcedo', '3125113461', '1000692916', '76381f4a7041c27ab1b4075eb93538b3', '2002-03-14', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(33, 'Angie Paola', 'Castro Villalobos', '3208628548', '1012390552', '76381f4a7041c27ab1b4075eb93538b3', '1992-05-18', 3, 2, '2021-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(34, 'Angie Valentina', 'Hernandez Vivas', '3204641458', '1007698830', '76381f4a7041c27ab1b4075eb93538b3', '2001-01-27', 3, 1, '2023-04-19', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(35, 'Angie Vanessa', 'Tunjacipa Pinzon', '3192876383', '1000835010', '76381f4a7041c27ab1b4075eb93538b3', '2002-08-31', 3, 2, '2022-11-11', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(36, 'Angie Vanessa', 'Villamizar Alvarez', '3209758287', '1015462442', '76381f4a7041c27ab1b4075eb93538b3', '1996-05-30', 3, 1, '2023-03-16', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(37, 'Angie Viviana', 'Manios Tole', '3508984382', '1030591276', '76381f4a7041c27ab1b4075eb93538b3', '1991-05-01', 3, 1, '2023-02-06', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(38, 'Angie Yessenia', 'Perez Riano', '3185070281', '1018458940', '76381f4a7041c27ab1b4075eb93538b3', '1993-04-30', 3, 2, '2023-03-02', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(39, 'Anny Valentina', 'Brinez Barragan', '3002720987', '1000214258', '76381f4a7041c27ab1b4075eb93538b3', '2001-12-26', 3, 1, '2022-08-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(40, 'Antonio', 'Perez Lizarazo', '3219418834', '79573044', '76381f4a7041c27ab1b4075eb93538b3', '1971-05-12', 3, 2, '2023-03-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(41, 'Anyi Carolina', 'Sanchez Magin', '3008531646', '1143825707', '76381f4a7041c27ab1b4075eb93538b3', '1989-06-02', 3, 1, '2023-03-16', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(42, 'Ariel Steven', 'Arce Pino', '3213061832', '1004011820', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-09', 3, 1, '2023-04-25', 3, 3, 'puntual.jpg', 'Desconectado', 1),
(43, 'Armando Jose', 'Martinez Funes', '3043450420', '6112797', '76381f4a7041c27ab1b4075eb93538b3', '1992-12-03', 3, 1, '2023-04-24', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(44, 'Berleydis', 'Caballero Davila', '3013392547', '1122808305', '76381f4a7041c27ab1b4075eb93538b3', '1986-03-04', 3, 1, '2023-02-15', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(45, 'Bibiana Marcela', 'Nieto Gualteros', '3502087920', '1032507893', '76381f4a7041c27ab1b4075eb93538b3', '1999-11-15', 1, 1, '2020-11-01', 1, 1, 'puntual.jpg', 'Desconectado', 1),
(46, 'Blanca', 'Lucero Diaz', '3115112171', '1000571946', '76381f4a7041c27ab1b4075eb93538b3', '2000-12-14', 3, 1, '2023-01-30', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(47, 'Blanca Yaneth', 'Medina Arevalo', '3144249654', '1075665671', '76381f4a7041c27ab1b4075eb93538b3', '1992-01-10', 3, 1, '2023-02-10', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(48, 'Brandon Yesid', 'Ruiz Guzman', '3175691784', '1024552185', '76381f4a7041c27ab1b4075eb93538b3', '1994-05-06', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(49, 'Brayan Alberto', 'Escobar Sanchez', '3203613945', '1026285602', '76381f4a7041c27ab1b4075eb93538b3', '1993-09-22', 3, 2, '2021-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(50, 'Brian Stiven', 'Pinzon Reyes', '3238136956', '1022430280', '76381f4a7041c27ab1b4075eb93538b3', '1997-09-03', 2, 1, '2022-08-24', 17, 2, 'puntual.jpg', 'Desconectado', 1),
(51, 'Britny Estefania', 'Ortiz Salcedo', '3208180290', '1000126353', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-31', 3, 1, '2022-11-12', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(52, 'Camila Alexandra', 'Olaya Chaves', '3227086677', '1000730565', '76381f4a7041c27ab1b4075eb93538b3', '2002-08-16', 1, 1, '2022-08-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(53, 'Camilo Andres', 'Munoz Marin', '3152535439', '1016095522', '76381f4a7041c27ab1b4075eb93538b3', '1997-07-05', 3, 1, '2022-10-22', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(54, 'Camilo Esteban', 'Romero Pena', '3183302570', '1007445300', '76381f4a7041c27ab1b4075eb93538b3', '2000-05-27', 3, 1, '2023-03-04', 14, 3, 'puntual.jpg', 'Desconectado', 1),
(55, 'Carlos Alberto', 'Deal Pulido', '3142639813', '1018514569', '76381f4a7041c27ab1b4075eb93538b3', '1999-08-20', 3, 1, '2022-11-11', 12, 3, 'puntual.jpg', 'Desconectado', 1),
(56, 'Carolina', 'Lopez Aguilar', '3152219593', '1070586795', '76381f4a7041c27ab1b4075eb93538b3', '1986-10-18', 3, 2, '2023-02-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(57, 'Cesar Agusto', 'Cespedes Sanchez', '3124036745', '1014181844', '76381f4a7041c27ab1b4075eb93538b3', '1987-01-05', 3, 2, '2023-01-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(58, 'Charon Ivon', 'Clavijo Obando', '3157226203', '1000004750', '76381f4a7041c27ab1b4075eb93538b3', '2002-04-22', 3, 1, '2023-02-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(59, 'Cily Maria', 'Velasquez Gutierrez', '3219360006', '1073685624', '76381f4a7041c27ab1b4075eb93538b3', '1990-01-11', 3, 1, '2022-10-28', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(60, 'Cindy Alexandra', 'Ramirez Albino', '3133390482', '1031131420', '76381f4a7041c27ab1b4075eb93538b3', '1991-03-18', 3, 2, '2023-04-10', 4, 2, 'clab.jpeg', 'Desconectado', 1),
(61, 'Cindy Elizabeth', 'Roa Ramos', '3016315734', '1022335827', '76381f4a7041c27ab1b4075eb93538b3', '2005-10-18', 3, 1, '2023-03-14', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(62, 'Cindy Johana', 'Rubiano Vargas', '3228877045', '1023940947', '76381f4a7041c27ab1b4075eb93538b3', '1995-03-16', 3, 1, '2023-03-14', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(63, 'Cindy Paola', 'Zubieta Aguilar', '3219572490', '1233509555', '76381f4a7041c27ab1b4075eb93538b3', '1999-07-26', 3, 1, '2022-12-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(64, 'Claudia', 'Marcelachavarro Amezquita', '3223578125', '1022409814', '76381f4a7041c27ab1b4075eb93538b3', '1995-11-11', 3, 1, '2023-02-03', 10, 3, 'puntual.jpg', 'Desconectado', 1),
(65, 'Claudia Patricia', 'Cristancho Sanchez', '3027791621', '52330635', '76381f4a7041c27ab1b4075eb93538b3', '1975-03-26', 3, 2, '2022-11-09', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(66, 'Claudia Patricia', 'Gomez Camacho', '3112482942', '52798759', '76381f4a7041c27ab1b4075eb93538b3', '1980-05-23', 3, 2, '2023-02-01', 4, 2, 'clab.jpeg', 'Desconectado', 1),
(67, 'Claudia Tatiana', 'Zamora Prieto', '3204277848', '1024562278', '76381f4a7041c27ab1b4075eb93538b3', '1995-03-27', 3, 1, '2021-04-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(68, 'Cristian Daniel', 'Malpica Romero', '3166253026', '1022430328', '76381f4a7041c27ab1b4075eb93538b3', '1997-09-01', 3, 1, '2022-12-23', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(69, 'Cristian Daniel', 'Solorzano Riano', '3132609161', '1018430252', '76381f4a7041c27ab1b4075eb93538b3', '1989-10-25', 3, 2, '2020-11-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(70, 'Dana Valentina', 'Benavides Aguilar', '3142118824', '1026305880', '76381f4a7041c27ab1b4075eb93538b3', '1999-06-12', 3, 1, '2023-01-17', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(71, 'Daniel Alejandro', 'Lopez Arbelaez', '3008202664', '1012394814', '76381f4a7041c27ab1b4075eb93538b3', '1992-12-15', 3, 1, '2023-03-24', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(72, 'Daniel Antonio', 'Torres Alvarez', '3115672641', '1023979152', '76381f4a7041c27ab1b4075eb93538b3', '1999-10-13', 3, 2, '2022-10-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(73, 'Daniel Extit', 'Castellanos Medina', '3143135875', '1026252062', '76381f4a7041c27ab1b4075eb93538b3', '2004-05-30', 3, 1, '2022-11-28', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(74, 'Daniel Fernando', 'Guzman Rincon', '3227146761', '1014659045', '76381f4a7041c27ab1b4075eb93538b3', '2005-01-20', 3, 1, '2023-03-09', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(75, 'Daniel Mateo', 'Santos Bermudez', '3022150625', '1000494049', '76381f4a7041c27ab1b4075eb93538b3', '2003-06-08', 3, 1, '2023-02-13', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(76, 'Danna Nataly', 'Tordecilla Palacio', '3044198385', '1001119363', '76381f4a7041c27ab1b4075eb93538b3', '2001-11-16', 3, 1, '2023-01-21', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(77, 'Dariuska', 'Mesa Arayan', '3197729568', '1679319', '76381f4a7041c27ab1b4075eb93538b3', '1996-05-20', 3, 1, '2023-01-06', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(78, 'Darly Iscandey', 'Taborda Garzon', '3237429133', '52227828', '76381f4a7041c27ab1b4075eb93538b3', '1975-07-14', 3, 1, '2023-01-27', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(79, 'David Santiago', 'Londono Frasser', '3028346271', '1001297397', '76381f4a7041c27ab1b4075eb93538b3', '2002-01-01', 3, 1, '2023-01-21', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(80, 'Dayana Del Pilar', 'Rojas Molina', '3107783503', '1002752253', '76381f4a7041c27ab1b4075eb93538b3', '2000-12-05', 3, 1, '2023-01-27', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(81, 'Dayana Esmeralda', 'Hernandez Amezquita', '3001111112', '1033815825', '76381f4a7041c27ab1b4075eb93538b3', '1999-05-02', 3, 1, '2022-11-02', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(82, 'Debbie Ismeray', 'Palencia Figuera', '3223909796', '5604533', '76381f4a7041c27ab1b4075eb93538b3', '1994-03-28', 3, 1, '2023-02-01', 10, 3, 'puntual.jpg', 'Desconectado', 1),
(83, 'Deivid Johan', 'Mendez Nino', '3213797508', '1000287097', '76381f4a7041c27ab1b4075eb93538b3', '2002-08-04', 3, 1, '2022-11-17', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(84, 'Derly Johana', 'Torres Carabali', '3027679732', '1018459304', '76381f4a7041c27ab1b4075eb93538b3', '1993-05-09', 3, 2, '2023-03-15', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(85, 'Derly Sofia', 'Martinez Vergara', '3117611889', '1000130860', '76381f4a7041c27ab1b4075eb93538b3', '2003-03-25', 3, 2, '2022-11-24', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(86, 'Diana Clemita', 'Morales Zapata', '3138384326', '52970235', '76381f4a7041c27ab1b4075eb93538b3', '1982-09-10', 3, 2, '2021-01-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(87, 'Diana Fabiana', 'Mora Pena', '3045211389', '1000126607', '76381f4a7041c27ab1b4075eb93538b3', '2002-02-12', 3, 1, '2022-11-02', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(88, 'Diana Maritza', 'Perez Avila', '3193020424', '52156729', '76381f4a7041c27ab1b4075eb93538b3', '1975-03-23', 3, 2, '2020-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(89, 'Diana Mayerly', 'Tautiva Vargas', '3184362272', '1013611562', '76381f4a7041c27ab1b4075eb93538b3', '1990-04-23', 3, 1, '2023-04-26', 3, 2, 'puntual.jpg', 'Desconectado', 1),
(90, 'Diana Milena', 'Santafe Rodriguez', '3208677881', '1012448530', '76381f4a7041c27ab1b4075eb93538b3', '1997-12-18', 3, 1, '2020-09-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(91, 'Diana Nathaly', 'Prieto Lesmes', '3213069713', '1013644166', '76381f4a7041c27ab1b4075eb93538b3', '1993-09-08', 3, 2, '2022-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(92, 'Diego Leonardo', 'Kopp Orjuela', '3227154663', '1014182870', '76381f4a7041c27ab1b4075eb93538b3', '1986-12-23', 3, 2, '2023-03-10', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(93, 'Diego Orlando', 'Cortes Sierra', '3219053517', '1010142211', '76381f4a7041c27ab1b4075eb93538b3', '2000-10-27', 3, 1, '2023-04-19', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(94, 'Dixon Alexander', 'Moncada Ramos', '3123067594', '1007647717', '76381f4a7041c27ab1b4075eb93538b3', '1998-02-12', 3, 1, '2023-01-25', 14, 3, 'puntual.jpg', 'Desconectado', 1),
(95, 'Duban Alonso', 'Orjuela Durango', '3022907701', '1128438324', '76381f4a7041c27ab1b4075eb93538b3', '1991-06-08', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(96, 'Eberth Ernesto', 'Pena Quinones', '3114647535', '1010234003', '76381f4a7041c27ab1b4075eb93538b3', '1997-06-13', 3, 1, '2023-04-19', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(97, 'Edison Manuel', 'Estupinan Tovar', '3106892715', '1024561661', '76381f4a7041c27ab1b4075eb93538b3', '1995-03-19', 3, 2, '2020-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(98, 'Edna Paola', 'Santos Martinez', '3186460908', '1016004332', '76381f4a7041c27ab1b4075eb93538b3', '1987-07-22', 3, 1, '2022-11-10', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(99, 'Edward', 'Galindo Villa', '3144024252', '79795721', '76381f4a7041c27ab1b4075eb93538b3', '1978-05-08', 1, 1, '2015-05-13', 1, 1, 'puntual.jpg', 'Desconectado', 1),
(100, 'Elizabeth Lorena', 'Parrado Fajardo', '3222915899', '1012427388', '76381f4a7041c27ab1b4075eb93538b3', '1995-11-26', 3, 2, '2023-02-13', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(101, 'Andres', 'Moreno Hurtado', '3005939708', '1016011795', '76381f4a7041c27ab1b4075eb93538b3', '1986-09-03', 2, 1, '2018-02-05', 17, 1, 'puntual.jpg', 'Disponible', 1),
(102, 'Erika Natalia', 'Robledo Castro', '3223516982', '1012367507', '76381f4a7041c27ab1b4075eb93538b3', '1990-06-12', 3, 1, '2022-12-12', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(103, 'Estefania', 'Carrion Villamizar', '3212174080', '1001114986', '76381f4a7041c27ab1b4075eb93538b3', '2001-12-12', 3, 1, '2023-02-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(104, 'Estefania', 'Galvis Mateus', '3214507370', '1001330420', '76381f4a7041c27ab1b4075eb93538b3', '2002-12-17', 3, 1, '2023-01-10', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(105, 'Estryd Yanni', 'Herrera Rojas', '3227525598', '1000595894', '76381f4a7041c27ab1b4075eb93538b3', '2001-09-17', 3, 1, '2022-11-16', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(106, 'Eva Giselle', 'Moreno Giraldo', '3196999738', '1010235874', '76381f4a7041c27ab1b4075eb93538b3', '1997-09-30', 3, 1, '2023-03-27', 8, 2, 'puntual.jpg', 'Desconectado', 1),
(107, 'Eylen Dayily', 'Gonzalez Brausin', '3202875844', '1003698974', '76381f4a7041c27ab1b4075eb93538b3', '2001-12-01', 3, 1, '2023-03-14', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(108, 'Felipe Josue', 'Gomez Muza', '3137043860', '1006653889', '76381f4a7041c27ab1b4075eb93538b3', '2003-02-13', 3, 1, '2023-03-16', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(109, 'Flor Mirian', 'Cruz Cardozo', '3228485478', '52735032', '76381f4a7041c27ab1b4075eb93538b3', '1983-08-30', 3, 2, '2023-01-18', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(110, 'Fredy Santiago', 'Serrano Rojas', '3227839685', '1003616497', '76381f4a7041c27ab1b4075eb93538b3', '2003-01-14', 3, 1, '2022-12-10', 10, 3, 'puntual.jpg', 'Desconectado', 1),
(111, 'Freizer', 'Sanchez Sanchez', '3219453976', '79769897', '76381f4a7041c27ab1b4075eb93538b3', '1977-11-25', 3, 1, '2021-09-14', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(112, 'Genesis Nakary', 'Reyes Garcia', '3187217790', '3268588', '76381f4a7041c27ab1b4075eb93538b3', '1993-07-07', 3, 1, '2023-01-10', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(113, 'Genny Esteban', 'Ramirez Munoz', '3144411862', '1000460087', '76381f4a7041c27ab1b4075eb93538b3', '2002-07-20', 3, 1, '2023-01-24', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(114, 'Geraldine', 'Gonzalez Arango', '3227085572', '1007158625', '76381f4a7041c27ab1b4075eb93538b3', '2000-04-25', 3, 1, '2023-01-25', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(115, 'Geraldine', 'Rodriguez Poveda', '3112865568', '1023014968', '76381f4a7041c27ab1b4075eb93538b3', '1996-04-25', 3, 2, '2022-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(116, 'Harold Snneider', 'Garzon Medina', '3202624784', '1000603577', '76381f4a7041c27ab1b4075eb93538b3', '2001-12-16', 3, 2, '2023-03-02', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(117, 'Harrison Juced', 'Higuera Caicedo', '3504515088', '1125302214', '76381f4a7041c27ab1b4075eb93538b3', '1995-12-24', 2, 1, '2020-09-01', 17, 2, 'puntual.jpg', 'Desconectado', 1),
(118, 'Heidy Carolina', 'Cely Patino', '3214831582', '1000591199', '76381f4a7041c27ab1b4075eb93538b3', '2003-01-17', 3, 2, '2023-01-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(119, 'Heidy Valentina', 'Vanegas Castaneda', '3117350988', '1095484203', '76381f4a7041c27ab1b4075eb93538b3', '2004-04-28', 3, 1, '2023-01-31', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(120, 'Henry Steven', 'Lizarazo Gomez', '3105853500', '1024516351', '76381f4a7041c27ab1b4075eb93538b3', '1991-02-10', 3, 2, '2022-03-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(121, 'Heylin', 'Acosta Salazar', '3203738483', '1000382664', '76381f4a7041c27ab1b4075eb93538b3', '2001-01-26', 3, 2, '2020-11-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(122, 'Idaly', 'Espinosa Montero', '3112174207', '52194741', '76381f4a7041c27ab1b4075eb93538b3', '1975-10-07', 1, 1, '2022-04-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(123, 'Ingri Paola', 'Patino Valderrama', '3153929701', '1073682261', '76381f4a7041c27ab1b4075eb93538b3', '1989-06-06', 3, 1, '2023-01-11', 10, 3, 'puntual.jpg', 'Desconectado', 1),
(124, 'Ivan Camilo', 'Camargo Patino', '3223916394', '1014297220', '76381f4a7041c27ab1b4075eb93538b3', '1998-04-30', 3, 1, '2022-02-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(125, 'Ivan Leonardo', 'Cordoba Puerta', '3209865778', '1067956768', '76381f4a7041c27ab1b4075eb93538b3', '1997-10-13', 3, 2, '2022-09-20', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(126, 'Ivan Stevens', 'Gutierrez Mendoza', '3144265352', '1014225252', '76381f4a7041c27ab1b4075eb93538b3', '1991-08-16', 3, 2, '2021-05-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(127, 'Iveth Juranny', 'Organista Ordonez', '3204643050', '1000272042', '76381f4a7041c27ab1b4075eb93538b3', '2001-12-27', 3, 1, '2022-10-22', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(128, 'Jamer Yesid', 'Daza Castro', '3223636889', '1000119828', '76381f4a7041c27ab1b4075eb93538b3', '2001-04-27', 3, 1, '2023-02-10', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(129, 'Jasbleidy Milena', 'Quevedo Rojas', '3156747704', '1033780012', '76381f4a7041c27ab1b4075eb93538b3', '1995-09-02', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(130, 'Jazmin Adriana', 'Molina Pinzon', '3143568999', '1003672957', '76381f4a7041c27ab1b4075eb93538b3', '2003-05-06', 3, 1, '2023-03-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(131, 'Jeferson', 'Pinzon Camargo', '3214301769', '1033743609', '76381f4a7041c27ab1b4075eb93538b3', '1992-04-13', 3, 2, '2022-07-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(132, 'Jeikol Esteban', 'Garcia Duque', '3229317266', '1092455186', '76381f4a7041c27ab1b4075eb93538b3', '2005-02-03', 3, 1, '2023-04-14', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(133, 'Jeime Lorena', 'Vera Ospina', '3147265542', '1001330399', '76381f4a7041c27ab1b4075eb93538b3', '2000-12-12', 3, 2, '2022-10-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(134, 'Jeisson', 'Morales Duarte', '3132504080', '1024541033', '76381f4a7041c27ab1b4075eb93538b3', '1993-04-27', 3, 1, '2023-04-20', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(135, 'Jenifer Angelica', 'Veloza Ruiz', '3003818290', '1010010058', '76381f4a7041c27ab1b4075eb93538b3', '2000-04-18', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(136, 'Jennifer Lorena', 'Castro Rubiano', '3222122172', '1022418045', '76381f4a7041c27ab1b4075eb93538b3', '1996-07-30', 3, 1, '2020-09-01', 11, 2, 'puntual.jpg', 'Desconectado', 1),
(137, 'Jenny Alexandra', 'Barreto Castillo', '3502162109', '52972230', '76381f4a7041c27ab1b4075eb93538b3', '1982-09-20', 3, 2, '2022-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(138, 'Jenny Paola', 'Hernandez Forero', '3134185397', '1022384081', '76381f4a7041c27ab1b4075eb93538b3', '1993-05-24', 3, 2, '2020-11-01', 11, 3, 'clab.jpeg', 'Desconectado', 1),
(139, 'Jessica Daniela', 'Ortega Zabala', '3143727431', '1031139341', '76381f4a7041c27ab1b4075eb93538b3', '1992-02-18', 3, 2, '2021-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(140, 'Jesus Humberto', 'Cubillos Hernandez', '3125352712', '1023885248', '76381f4a7041c27ab1b4075eb93538b3', '1989-06-10', 3, 2, '2020-09-01', 4, 2, 'clab.jpeg', 'Desconectado', 1),
(141, 'Jhireth Suheigtllen', 'Romero Morales', '3143130753', '1001050221', '76381f4a7041c27ab1b4075eb93538b3', '2003-02-19', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(142, 'Jhoan Andres', 'Zapata Duarte', '3145943703', '1054538893', '76381f4a7041c27ab1b4075eb93538b3', '2003-10-31', 3, 1, '2023-02-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(143, 'Jhoan Manuel', 'Duarte Villalobos', '3214096428', '1069766798', '76381f4a7041c27ab1b4075eb93538b3', '1999-04-30', 2, 1, '2023-02-09', 17, 1, 'puntual.jpg', 'Disponible', 1),
(144, 'Joan Stiven', 'Rodriguez Nino', '3133176097', '1031643832', '76381f4a7041c27ab1b4075eb93538b3', '2004-09-21', 3, 1, '2023-04-10', 10, 3, 'puntual.jpg', 'Desconectado', 1),
(145, 'Joann Alejandro', 'Rodriguez Romero', '3026988673', '1000351445', '76381f4a7041c27ab1b4075eb93538b3', '2002-04-07', 3, 1, '2023-01-17', 14, 3, 'puntual.jpg', 'Desconectado', 1),
(146, 'Johan Alejandro', 'Castillo Angel', '3108839307', '1000855934', '76381f4a7041c27ab1b4075eb93538b3', '1999-12-12', 3, 1, '2022-12-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(147, 'Johana Andrea', 'Escobar Velez', '3026463419', '1214717187', '76381f4a7041c27ab1b4075eb93538b3', '1993-01-17', 3, 1, '2022-11-16', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(148, 'Johanna Stephania', 'Fajardo Olaya', '3219945912', '1031173278', '76381f4a7041c27ab1b4075eb93538b3', '1997-12-26', 3, 1, '2023-04-27', 3, 3, 'puntual.jpg', 'Desconectado', 1),
(149, 'John Alexander', 'Velasquez Valencia', '3002655617', '1094909850', '76381f4a7041c27ab1b4075eb93538b3', '1989-12-31', 3, 2, '2023-04-10', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(150, 'John Edison', 'Garcia Rubio', '3108667274', '80904151', '76381f4a7041c27ab1b4075eb93538b3', '1985-10-18', 3, 1, '2022-07-16', 10, 2, 'puntual.jpg', 'Desconectado', 1),
(151, 'John Erick', 'Silva Acevedo', '3006577889', '1128414970', '76381f4a7041c27ab1b4075eb93538b3', '1988-04-19', 3, 2, '2022-12-14', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(152, 'John Manuel', 'Paez Celis', '3016440274', '1007107099', '76381f4a7041c27ab1b4075eb93538b3', '2003-07-01', 3, 1, '2023-04-21', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(153, 'Jonathan David', 'Cantillo Carranza', '3044983725', '1043123426', '76381f4a7041c27ab1b4075eb93538b3', '2003-03-19', 3, 1, '2023-01-01', 2, 3, 'puntual.jpg', 'Desconectado', 1),
(154, 'Jonathan David', 'Cantillo Roja', '3118572595', '1000835255', '76381f4a7041c27ab1b4075eb93538b3', '2002-10-11', 3, 1, '2023-04-21', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(155, 'Jonathan Steven', 'Contreras Aguilar', '3192447409', '1023035266', '76381f4a7041c27ab1b4075eb93538b3', '1999-03-03', 3, 1, '2023-03-13', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(156, 'Jorge Enrique', 'Bohorquez Ortiz', '3014245503', '1003651158', '76381f4a7041c27ab1b4075eb93538b3', '2000-10-11', 3, 1, '2023-01-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(157, 'Jose Alejandro', 'Useche Gil', '3046367606', '1014179211', '76381f4a7041c27ab1b4075eb93538b3', '1986-05-31', 3, 2, '2021-02-01', 4, 2, 'clab.jpeg', 'Desconectado', 1),
(158, 'Jose Angel', 'Mora Torrez', '3166435152', '5137261', '76381f4a7041c27ab1b4075eb93538b3', '1976-06-28', 1, 1, '2023-01-05', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(159, 'Jose Antonio', 'Hernandez Roja', '3143439514', '1018482287', '76381f4a7041c27ab1b4075eb93538b3', '1995-11-24', 3, 1, '2023-01-30', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(160, 'Jose Luis', 'Cardenas Escobar', '3023140358', '1030680241', '76381f4a7041c27ab1b4075eb93538b3', '1997-08-18', 3, 1, '2022-11-04', 8, 2, 'puntual.jpg', 'Desconectado', 1),
(161, 'Juan Alejandro', 'Zarate Amortegui', '3107511987', '1016101141', '76381f4a7041c27ab1b4075eb93538b3', '1998-03-28', 3, 1, '2022-08-11', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(162, 'Juan Camilo', 'Capera Apache', '3203311752', '1109846100', '76381f4a7041c27ab1b4075eb93538b3', '1994-10-17', 3, 2, '2023-01-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(163, 'Juan David', 'Nieto Lamprea', '3108128007', '1032492213', '76381f4a7041c27ab1b4075eb93538b3', '1997-07-24', 3, 2, '2020-10-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(164, 'Juan Felipe', 'Gomez Gomez', '3138558284', '1025140615', '76381f4a7041c27ab1b4075eb93538b3', '2004-01-26', 3, 1, '2023-01-19', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(165, 'Juan Manuel', 'Aragon Palacio', '3193385500', '1022951820', '76381f4a7041c27ab1b4075eb93538b3', '1989-05-23', 3, 2, '2023-03-24', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(166, 'Juan Sebastian', 'Quezada Lozano', '3022423209', '1000274181', '76381f4a7041c27ab1b4075eb93538b3', '2001-03-31', 3, 1, '2022-10-01', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(167, 'Juan Stevan', 'Toro Nossa', '3043497770', '1000160330', '76381f4a7041c27ab1b4075eb93538b3', '2002-09-26', 3, 1, '2023-01-30', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(168, 'Juanita', 'Valles Silva', '3229027221', '1000184334', '76381f4a7041c27ab1b4075eb93538b3', '2003-05-26', 3, 1, '2022-12-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(169, 'Julian Andres', 'Munoz Gomez', '3143326079', '1023903991', '76381f4a7041c27ab1b4075eb93538b3', '1991-01-05', 3, 2, '2022-11-03', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(170, 'Julian Camilo', 'Hernandez Castellanos', '3142664393', '1014275861', '76381f4a7041c27ab1b4075eb93538b3', '1996-03-06', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(171, 'Julian Camilo', 'Verdugo Bermudez', '3015432273', '1000159407', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-03', 3, 1, '2023-01-17', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(172, 'Juliana', 'Segura', '3203607281', '1012316623', '76381f4a7041c27ab1b4075eb93538b3', '2003-11-27', 3, 1, '2022-10-27', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(173, 'Jusleny Alexandra', 'Neme Pinzon', '3108721059', '1023964031', '76381f4a7041c27ab1b4075eb93538b3', '1997-10-01', 3, 1, '2022-08-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(174, 'Karen Daniela', 'Correa Pena', '3223476796', '1012321339', '76381f4a7041c27ab1b4075eb93538b3', '2002-06-01', 3, 1, '2023-01-31', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(175, 'Karen Dayana', 'Duarte Romero', '3112685282', '1022442663', '76381f4a7041c27ab1b4075eb93538b3', '1999-04-01', 3, 2, '2021-07-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(176, 'Karen Dayana', 'Salamanca Rodriguez', '3232856468', '1002404205', '76381f4a7041c27ab1b4075eb93538b3', '2003-03-04', 3, 1, '2022-11-02', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(177, 'Karen Tatiana', 'Tapiero Donoso', '3137680641', '1000732903', '76381f4a7041c27ab1b4075eb93538b3', '2001-04-01', 3, 1, '2023-02-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(178, 'Karina Andrea', 'De Leon Bermudez', '3166720774', '1000513977', '76381f4a7041c27ab1b4075eb93538b3', '2000-10-01', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(179, 'Karol Johanna', 'Londono Parra', '3054243890', '1010008196', '76381f4a7041c27ab1b4075eb93538b3', '2000-10-30', 3, 1, '2023-01-30', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(180, 'Karol Libied', 'Dominguez Sanchez', '3112392501', '1014294548', '76381f4a7041c27ab1b4075eb93538b3', '1998-01-03', 3, 1, '2023-04-26', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(181, 'Karoll Dayanna', 'Garzon Duarte', '3015549698', '1000352550', '76381f4a7041c27ab1b4075eb93538b3', '2002-03-18', 3, 1, '2022-09-27', 7, 3, 'puntual.jpg', 'Desconectado', 1),
(182, 'Katerine', 'Chico Tirado', '3124054570', '1022399017', '76381f4a7041c27ab1b4075eb93538b3', '1994-11-22', 3, 1, '2022-10-26', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(183, 'Katerine', 'Robayo Martinez', '3136269431', '1030601055', '76381f4a7041c27ab1b4075eb93538b3', '1991-10-02', 3, 1, '2023-04-14', 9, 2, 'puntual.jpg', 'Desconectado', 1),
(184, 'Kathy Julieth', 'Mendoza Ramos', '3027256492', '1003431121', '76381f4a7041c27ab1b4075eb93538b3', '1998-07-02', 3, 1, '2023-01-11', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(185, 'Kevin Leonardo', 'Serna Castaneda', '3023321146', '1023024132', '76381f4a7041c27ab1b4075eb93538b3', '1997-09-12', 3, 1, '2023-04-01', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(186, 'Kevin Santiago', 'Heredia Parra', '3057943336', '1000726498', '76381f4a7041c27ab1b4075eb93538b3', '2002-08-15', 3, 1, '2022-10-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(187, 'Khatterin Johanna', 'Rozo Ramos', '3214724770', '1019035073', '76381f4a7041c27ab1b4075eb93538b3', '1989-07-20', 3, 1, '2023-02-02', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(188, 'Kimberly', 'Aponte Sogamoso', '3132663076', '1026251210', '76381f4a7041c27ab1b4075eb93538b3', '1986-04-19', 3, 2, '2023-02-14', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(189, 'Laura Camila', 'Devia Robles', '3213002289', '1000330727', '76381f4a7041c27ab1b4075eb93538b3', '2000-04-16', 3, 2, '2023-02-08', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(190, 'Laura Daniela', 'Mendez Animero', '3108518303', '1000727637', '76381f4a7041c27ab1b4075eb93538b3', '2002-12-11', 3, 1, '2023-01-18', 14, 3, 'puntual.jpg', 'Desconectado', 1),
(191, 'Laura Daniela', 'Murcia Gamba', '3208461640', '1030699359', '76381f4a7041c27ab1b4075eb93538b3', '1999-09-02', 3, 2, '2023-03-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(192, 'Laura', 'Hernandez Huertas', '3213149404', '1032499448', '76381f4a7041c27ab1b4075eb93538b3', '1998-08-16', 3, 1, '2022-05-02', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(193, 'Laura Jimena', 'Zapata Diaz', '3046667316', '1000321526', '76381f4a7041c27ab1b4075eb93538b3', '2000-06-27', 3, 1, '2023-04-14', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(194, 'Laura Rocio', 'Rodriguez Mora', '3227194283', '1022443548', '76381f4a7041c27ab1b4075eb93538b3', '1999-05-15', 3, 1, '2022-08-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(195, 'Laura Tatiana', 'Cely Abreu', '3022023322', '1001299310', '76381f4a7041c27ab1b4075eb93538b3', '2003-04-23', 3, 1, '2023-01-01', 7, 3, 'puntual.jpg', 'Desconectado', 1),
(196, 'Laura Valentina', 'Barrera Rodriguez', '3185263298', '1000987338', '76381f4a7041c27ab1b4075eb93538b3', '2000-07-02', 3, 2, '2023-04-17', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(197, 'Laura Valentina', 'Becerra Chacon', '3153866364', '1000520845', '76381f4a7041c27ab1b4075eb93538b3', '2000-10-30', 1, 1, '2022-10-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(198, 'Laura Yibeth', 'Gonzalez Brausin', '3013706437', '1053322852', '76381f4a7041c27ab1b4075eb93538b3', '2004-03-24', 3, 1, '2023-01-27', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(199, 'Leidi Rocio', 'Campos Paez', '3115960325', '53096979', '76381f4a7041c27ab1b4075eb93538b3', '1984-07-20', 3, 1, '2022-11-21', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(200, 'Leidy Johana', 'Mahecha Lopez', '3134457211', '1233898293', '76381f4a7041c27ab1b4075eb93538b3', '1998-05-03', 3, 2, '2021-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(201, 'Leidy Marcela', 'Jimenez Barrera', '3156698278', '1073711514', '76381f4a7041c27ab1b4075eb93538b3', '1997-06-01', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(202, 'Leidy Tatiana', 'Pava Cardenas', '3227201251', '1073692937', '76381f4a7041c27ab1b4075eb93538b3', '1992-01-20', 3, 1, '2023-02-08', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(203, 'Leidy Viviana', 'Osorio Roncancio', '3157231999', '30235326', '76381f4a7041c27ab1b4075eb93538b3', '1983-04-13', 3, 2, '2023-02-27', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(204, 'Leidy Yurany', 'Varon Marino', '3192885344', '1000455113', '76381f4a7041c27ab1b4075eb93538b3', '2001-11-10', 3, 1, '2023-03-16', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(205, 'Leiny Johanna', 'Garcia Marin', '3117748072', '1130590548', '76381f4a7041c27ab1b4075eb93538b3', '1987-01-29', 3, 2, '2022-08-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(206, 'Liliana Andrea', 'Martinez Gonzalez', '3024450624', '1015475120', '76381f4a7041c27ab1b4075eb93538b3', '1998-05-19', 3, 1, '2021-04-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(207, 'Liliana', 'Castiblanco Barbosa', '3012817393', '52429970', '76381f4a7041c27ab1b4075eb93538b3', '1979-01-14', 3, 2, '2023-04-17', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(208, 'Liliana', 'Hernandez Polania', '3014169944', '1004089315', '76381f4a7041c27ab1b4075eb93538b3', '2003-06-27', 3, 1, '2023-02-03', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(209, 'Lina Marcela', 'De Leon Bermudez', '3166720840', '1019984289', '76381f4a7041c27ab1b4075eb93538b3', '2004-10-19', 3, 1, '2023-01-21', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(210, 'Lismey Andrea', 'Graterol Escalona', '3004894281', '6336540', '76381f4a7041c27ab1b4075eb93538b3', '1995-06-15', 3, 1, '2023-02-06', 7, 3, 'puntual.jpg', 'Desconectado', 1),
(211, 'Lizeth', 'Daniela Gonzalez', '3212930182', '1000462034', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-16', 3, 1, '2023-03-02', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(212, 'Loren Geraldine', 'Bautista Pena', '3213696216', '1024577593', '76381f4a7041c27ab1b4075eb93538b3', '1997-01-14', 3, 1, '2023-04-10', 6, 3, 'puntual.jpg', 'Desconectado', 1),
(213, 'Lorena Mayerli', 'Zarate Trujillo', '3123876614', '1000731679', '76381f4a7041c27ab1b4075eb93538b3', '2003-01-18', 3, 1, '2022-11-25', 13, 3, 'puntual.jpg', 'Desconectado', 1),
(214, 'Luis Felipe', 'Sanchez Carvajal', '3167077877', '1075663594', '76381f4a7041c27ab1b4075eb93538b3', '1991-03-13', 3, 1, '2023-03-21', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(215, 'Luis Fernando', 'Pena De Leon', '3163285827', '1052703734', '76381f4a7041c27ab1b4075eb93538b3', '1996-09-01', 3, 1, '2023-03-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(216, 'Luisa Fernanda', 'Bello Villamarin', '3213750370', '1000954501', '76381f4a7041c27ab1b4075eb93538b3', '2001-06-18', 3, 1, '2023-04-18', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(217, 'Luisa Fernanda', 'Garcia Ospina', '3132129042', '1193509639', '76381f4a7041c27ab1b4075eb93538b3', '2001-07-28', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(218, 'Luisa Fernanda', 'Infante Gaitan', '3106982720', '1028780100', '76381f4a7041c27ab1b4075eb93538b3', '2004-04-19', 3, 1, '2023-01-30', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(219, 'Luisa Fernanda', 'Velandia Linares', '3132706194', '1030594661', '76381f4a7041c27ab1b4075eb93538b3', '1990-09-24', 3, 1, '2023-03-06', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(220, 'Luisa Vanessa', 'Mejia Carvajal', '3112166511', '1030689007', '76381f4a7041c27ab1b4075eb93538b3', '1998-07-01', 3, 1, '2021-10-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(221, 'Luz', 'Aida Rodriguez', '3203065313', '52385651', '76381f4a7041c27ab1b4075eb93538b3', '1977-07-19', 3, 2, '2022-12-05', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(222, 'Magda Viviana', 'Villarreal Reyes', '3103111869', '1012320110', '76381f4a7041c27ab1b4075eb93538b3', '1986-03-01', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(223, 'Maicol Alejandro', 'Vallejo Manrrique', '3115759524', '1016078554', '76381f4a7041c27ab1b4075eb93538b3', '1995-08-05', 3, 1, '2023-02-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(224, 'Mardeluz', 'Sierra Guerra', '3133056129', '1020718937', '76381f4a7041c27ab1b4075eb93538b3', '1986-09-23', 3, 2, '2023-03-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(225, 'Maria Alejandra', 'Arboleda Chacin', '3243451325', '6041622', '76381f4a7041c27ab1b4075eb93538b3', '2003-12-22', 3, 1, '2023-03-17', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(226, 'Maria Alejandra', 'Avila Sanabria', '3228152816', '1000118983', '76381f4a7041c27ab1b4075eb93538b3', '1999-08-02', 3, 1, '2023-01-13', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(227, 'Maria Alejandra', 'Rodriguez Ramirez', '3132156395', '1018456705', '76381f4a7041c27ab1b4075eb93538b3', '1992-09-24', 3, 1, '2023-01-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(228, 'Maria Camila', 'Sepulveda Barreto', '3016463311', '1030611446', '76381f4a7041c27ab1b4075eb93538b3', '1992-03-23', 3, 1, '2022-12-02', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(229, 'Maria Del Pilar', 'Murcia Montenegro', '3142826871', '1033751505', '76381f4a7041c27ab1b4075eb93538b3', '1993-01-27', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(230, 'Maria Del Rosario', 'Beltran Martinez', '3219052902', '1030529448', '76381f4a7041c27ab1b4075eb93538b3', '2001-06-09', 3, 2, '2022-02-01', 11, 3, 'clab.jpeg', 'Desconectado', 1),
(231, 'Maria Fernanda', 'Hernandez Parrado', '3145881800', '1013663287', '76381f4a7041c27ab1b4075eb93538b3', '1995-11-28', 3, 1, '2023-01-06', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(232, 'Maria Fernanda', 'Pulga Sanchez', '3108520857', '1001275256', '76381f4a7041c27ab1b4075eb93538b3', '2003-04-16', 3, 1, '2023-01-30', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(233, 'Maria Jose', 'Ruiz Salazar', '3135518293', '1002457947', '76381f4a7041c27ab1b4075eb93538b3', '2001-04-30', 3, 1, '2023-02-08', 13, 3, 'puntual.jpg', 'Desconectado', 1),
(234, 'Maria Paula', 'Infante Gaitan', '3213617243', '1028780099', '76381f4a7041c27ab1b4075eb93538b3', '2004-04-19', 3, 1, '2023-01-30', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(235, 'Maria Rocio', 'Gomez Hernandez', '3204210593', '52584254', '76381f4a7041c27ab1b4075eb93538b3', '1970-11-07', 3, 2, '2022-06-29', 4, 2, 'clab.jpeg', 'Desconectado', 1),
(236, 'Mariana', 'Chicaiza Munoz', '3053583513', '1031149249', '76381f4a7041c27ab1b4075eb93538b3', '1993-05-16', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(237, 'Mariangel Yeylin', 'Ragua Molina', '3242976326', '1034312188', '76381f4a7041c27ab1b4075eb93538b3', '2003-04-16', 3, 1, '2023-02-22', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(238, 'Maritza', 'Mateus Barbosa', '3209829528', '1000213219', '76381f4a7041c27ab1b4075eb93538b3', '2001-07-09', 3, 1, '2023-04-21', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(239, 'Martha Isabel', 'Contreras Luna', '3136355890', '20872096', '76381f4a7041c27ab1b4075eb93538b3', '1979-03-23', 3, 1, '2023-02-06', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(240, 'Martha Liliana', 'Peralta Ardila', '3178888315', '46679033', '76381f4a7041c27ab1b4075eb93538b3', '1976-05-04', 3, 1, '2023-04-24', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(241, 'Martha Yolanda', 'Alape Cardenas', '3123864951', '52732565', '76381f4a7041c27ab1b4075eb93538b3', '1982-11-03', 3, 1, '2022-12-12', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(242, 'Martin Felipe', 'Carrillo Solano', '3125536782', '1019128699', '76381f4a7041c27ab1b4075eb93538b3', '1997-02-08', 3, 1, '2023-01-13', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(243, 'Maryuri', 'Galvez Sanchez', '3194073522', '1007370626', '76381f4a7041c27ab1b4075eb93538b3', '2000-02-25', 3, 1, '2023-01-30', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(244, 'Maryury Dayanna', 'Aponte Moreno', '3219309349', '1000724468', '76381f4a7041c27ab1b4075eb93538b3', '2000-06-13', 3, 2, '2023-02-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(245, 'Mayra Alejandra', 'Olaya Chaves', '3002930788', '1024583278', '76381f4a7041c27ab1b4075eb93538b3', '1997-08-14', 1, 1, '2023-01-10', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(246, 'Melissa', 'Gomez Lozano', '302779234', '1000160191', '76381f4a7041c27ab1b4075eb93538b3', '2002-08-10', 3, 1, '2022-11-11', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(247, 'Merlys Josefina', 'Berridos Becerra', '3027953368', '6289051', '76381f4a7041c27ab1b4075eb93538b3', '2000-08-28', 3, 1, '2023-01-27', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(248, 'Mery Janneth', 'Vasquez Castro', '3112086390', '52264560', '76381f4a7041c27ab1b4075eb93538b3', '1976-05-03', 3, 1, '2022-11-22', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(249, 'Michael Andres', 'Berrio Petro', '3225857530', '1000942938', '76381f4a7041c27ab1b4075eb93538b3', '2000-06-30', 3, 1, '2023-01-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(250, 'Michael Steven', 'Castro Guerrero', '3143530702', '1000577308', '76381f4a7041c27ab1b4075eb93538b3', '2000-11-07', 3, 1, '2023-01-30', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(251, 'Michael Stiven', 'Gomez Blandon', '3115312007', '1007333706', '76381f4a7041c27ab1b4075eb93538b3', '2001-01-09', 3, 1, '2023-01-10', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(252, 'Michel', 'Herrera Vargas', '3192176544', '1000626645', '76381f4a7041c27ab1b4075eb93538b3', '2003-09-10', 3, 1, '2023-01-10', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(253, 'Miguel Angel', 'Ramirez Sanchez', '3115816392', '1069754331', '76381f4a7041c27ab1b4075eb93538b3', '1996-02-14', 3, 2, '2023-02-17', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(254, 'Monica Alexandra', 'Zapata Bastidas', '3229034686', '53010234', '76381f4a7041c27ab1b4075eb93538b3', '1983-02-27', 3, 2, '2023-01-24', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(255, 'Monica Del', 'Pilar Nieto', '3102003631', '53153226', '76381f4a7041c27ab1b4075eb93538b3', '1985-05-11', 3, 2, '2023-03-04', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(256, 'Monica Lorena', 'Triana Carrion', '3124974051', '1019091754', '76381f4a7041c27ab1b4075eb93538b3', '1994-01-12', 3, 1, '2023-04-24', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(257, 'Nashly Valentina', 'Reyes Martinez', '3239634541', '1233695442', '76381f4a7041c27ab1b4075eb93538b3', '1999-09-08', 3, 1, '2023-04-13', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(258, 'Natalia Alejandra', 'Castro Rodriguez', '3217333625', '1000936639', '76381f4a7041c27ab1b4075eb93538b3', '2002-03-08', 3, 1, '2023-04-14', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(259, 'Nayeli', 'Moreno Herrera', '3053786337', '1007596402', '76381f4a7041c27ab1b4075eb93538b3', '2000-07-22', 3, 1, '2023-03-03', 11, 3, 'puntual.jpg', 'Desconectado', 1),
(260, 'Neidymar', 'Villegas Pacheco', '3103141097', '9,41397E+14', '76381f4a7041c27ab1b4075eb93538b3', '1996-05-21', 3, 2, '2022-01-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(261, 'Nicol Brigitte', 'Munoz Velosa', '3106642648', '1032797610', '76381f4a7041c27ab1b4075eb93538b3', '2004-10-04', 3, 1, '2023-04-24', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(262, 'Nicol Daniela', 'Torres Perez', '3195210991', '1000727654', '76381f4a7041c27ab1b4075eb93538b3', '2002-10-10', 3, 1, '2023-01-13', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(263, 'Nicol Vanessa', 'Pinilla Guerrero', '3001111113', '1000320708', '76381f4a7041c27ab1b4075eb93538b3', '2002-10-10', 3, 1, '2022-11-02', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(264, 'Nicole Dayan', 'Gonzalez Alvarez', '3124646358', '1023365793', '76381f4a7041c27ab1b4075eb93538b3', '2004-09-06', 3, 1, '2022-11-21', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(265, 'Nicole Dayana', 'Punetes Espitia', '3024878708', '1021666648', '76381f4a7041c27ab1b4075eb93538b3', '2004-10-30', 3, 1, '2023-01-27', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(266, 'Nikol Natalia', 'Rodriguez Chambueta', '3134611856', '1000729295', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-08', 3, 1, '2023-01-30', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(267, 'Olga Lucia', 'Chaves Valenzuela', '3103330177', '51956934', '76381f4a7041c27ab1b4075eb93538b3', '1970-03-21', 1, 1, '2023-01-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(268, 'Olgui Giselle', 'Chaux Benavides', '3168885022', '1001200165', '76381f4a7041c27ab1b4075eb93538b3', '2001-06-28', 3, 1, '2023-01-13', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(269, 'Omaira Del Carmen', 'Gomez Villamizar', '3117453564', '1014313828', '76381f4a7041c27ab1b4075eb93538b3', '1990-01-28', 1, 1, '2020-09-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(270, 'Omar Abraham', 'Merlo Silva', '3213308468', '1712765', '76381f4a7041c27ab1b4075eb93538b3', '1986-03-27', 1, 1, '2022-09-26', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(271, 'Omar David', 'Marin Reyes', '3013133816', '1014305715', '76381f4a7041c27ab1b4075eb93538b3', '1999-05-19', 3, 2, '2023-03-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(272, 'Oscar Andres', 'Herrera Echeverry', '3172203981', '1016074935', '76381f4a7041c27ab1b4075eb93538b3', '1995-03-29', 3, 1, '2021-08-01', 5, 2, 'puntual.jpg', 'Desconectado', 1),
(273, 'Oscar Orlando', 'Guerrero Ariaz', '3152611942', '19467010', '76381f4a7041c27ab1b4075eb93538b3', '1961-10-24', 3, 2, '2023-02-08', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(274, 'Oscar Rafael', 'Romero Marcano', '3237956523', '6972760', '76381f4a7041c27ab1b4075eb93538b3', '1994-05-24', 3, 1, '2023-01-24', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(275, 'Paola Andrea', 'Escovar Sanchez', '3173936283', '1019138820', '76381f4a7041c27ab1b4075eb93538b3', '1998-04-02', 3, 2, '2020-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(276, 'Paola Liliana', 'Carmona Suarez', '3005970438', '53041258', '76381f4a7041c27ab1b4075eb93538b3', '1985-09-19', 3, 2, '2020-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(277, 'Paula Andrea', 'Chacon Morales', '3123208546', '1000685758', '76381f4a7041c27ab1b4075eb93538b3', '2001-04-06', 3, 2, '2023-01-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(278, 'Paula Andrea', 'Garcia Cruz', '3024766896', '1013680048', '76381f4a7041c27ab1b4075eb93538b3', '1998-03-07', 3, 1, '2023-02-01', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(279, 'Paula Andrea', 'Mateus Puentes', '3108501991', '1033755897', '76381f4a7041c27ab1b4075eb93538b3', '1993-07-05', 3, 1, '2022-10-21', 18, 2, 'puntual.jpg', 'Desconectado', 1),
(280, 'Paula Andrea', 'Nino Lara', '3117420171', '1030520977', '76381f4a7041c27ab1b4075eb93538b3', '2004-01-22', 3, 1, '2023-02-06', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(281, 'Paula Daniela', 'Ramirez Vargas', '3133356959', '1020833731', '76381f4a7041c27ab1b4075eb93538b3', '1998-06-24', 3, 2, '2023-01-03', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(282, 'Paula Daniela', 'Riano Hurtado', '3115625216', '1001046907', '76381f4a7041c27ab1b4075eb93538b3', '2002-05-03', 3, 1, '2023-02-01', 18, 3, 'puntual.jpg', 'Desconectado', 1);
INSERT INTO `users` (`id`, `n_user`, `l_user`, `tel_user`, `cedula`, `password`, `f_nacimiento`, `id_area`, `id_empresa`, `f_ingreso_empre`, `id_grupo`, `rol`, `img`, `status`, `activo`) VALUES
(283, 'Pedro Ernesto', 'Lopez Parara', '3057873765', '19498095', '76381f4a7041c27ab1b4075eb93538b3', '1963-01-28', 3, 1, '2022-10-29', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(284, 'Poll Steven', 'Barreto Pineda', '3222272017', '1010203057', '76381f4a7041c27ab1b4075eb93538b3', '1992-04-07', 3, 1, '2023-04-24', 13, 2, 'puntual.jpg', 'Desconectado', 1),
(285, 'Ramiro Antonio', 'Amariz Rocha', '3024557726', '1124042784', '76381f4a7041c27ab1b4075eb93538b3', '1992-03-24', 3, 2, '2023-03-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(286, 'Rebeca', 'Merlo Silva', '3227799215', '1414735', '76381f4a7041c27ab1b4075eb93538b3', '1989-01-07', 3, 1, '2023-01-14', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(287, 'Ricardo', 'Jimenez Caceres', '3203691246', '1015461887', '76381f4a7041c27ab1b4075eb93538b3', '1996-04-29', 3, 2, '2020-09-01', 4, 2, 'clab.jpeg', 'Desconectado', 1),
(288, 'Rimsky Nayib', 'Ovalle Moreno', '3196772936', '79614873', '76381f4a7041c27ab1b4075eb93538b3', '1972-11-26', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(289, 'Robinson Andres', 'Calero Avendano', '3138198486', '1073709288', '76381f4a7041c27ab1b4075eb93538b3', '1997-02-21', 3, 1, '2022-10-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(290, 'Rodrigo Jose', 'Camargo Isaza', '3138377201', '72282617', '76381f4a7041c27ab1b4075eb93538b3', '1983-04-27', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(291, 'Ruth Jireth', 'Ramos Mayorga', '3001111114', '1000803191', '76381f4a7041c27ab1b4075eb93538b3', '2000-03-17', 3, 1, '2022-10-29', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(292, 'Saira', 'Karina Gallego', '3195197267', '52014592', '76381f4a7041c27ab1b4075eb93538b3', '1969-09-05', 3, 1, '2023-01-10', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(293, 'Sanda Milena', 'Diaz Valencia', '3132493342', '52975052', '76381f4a7041c27ab1b4075eb93538b3', '1983-04-04', 3, 2, '2022-11-05', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(294, 'Sandra Julieth', 'Suarez Leon', '3144899921', '1000855336', '76381f4a7041c27ab1b4075eb93538b3', '2000-06-15', 3, 1, '2022-10-21', 7, 3, 'puntual.jpg', 'Desconectado', 1),
(295, 'Sandra Rocio', 'Fuquene Gordillo', '3222668901', '39742084', '76381f4a7041c27ab1b4075eb93538b3', '1975-01-23', 3, 1, '2022-10-11', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(296, 'Santiago Andres', 'Bohorquez Vega', '3503492001', '1000686548', '76381f4a7041c27ab1b4075eb93538b3', '2001-05-07', 3, 2, '2020-10-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(297, 'Sara Alexis', 'Pulido Sierra', '3043423105', '1024470508', '76381f4a7041c27ab1b4075eb93538b3', '2004-12-22', 3, 1, '2023-03-28', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(298, 'Sara Catalina', 'Agon Arevalo', '3212254049', '1018476215', '76381f4a7041c27ab1b4075eb93538b3', '1995-02-28', 3, 1, '2023-02-07', 11, 3, 'puntual.jpg', 'Desconectado', 1),
(299, 'Sara', 'Ortiz Cardenas', '3208744642', '1129004056', '76381f4a7041c27ab1b4075eb93538b3', '2004-01-31', 3, 1, '2023-02-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(300, 'Sebastian', 'Ortega Patino', '3115511818', '1012417389', '76381f4a7041c27ab1b4075eb93538b3', '1994-12-14', 3, 1, '2022-11-01', 15, 2, 'puntual.jpg', 'Desconectado', 1),
(301, 'Sebastian', 'Rincon Valencia', '3144886947', '1012425250', '76381f4a7041c27ab1b4075eb93538b3', '1995-09-05', 3, 1, '2023-01-05', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(302, 'Sehyfer Oswaldo', 'Florez Altuve', '3053917087', '1063494785', '76381f4a7041c27ab1b4075eb93538b3', '1997-04-25', 3, 1, '2023-03-01', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(303, 'Shelcy Julieth', 'Mora Contreras', '3246686325', '1007159103', '76381f4a7041c27ab1b4075eb93538b3', '2003-01-11', 3, 1, '2022-11-24', 12, 3, 'puntual.jpg', 'Desconectado', 1),
(304, 'Shirly Lorena', 'Forero Piedras', '3223783391', '1031641113', '76381f4a7041c27ab1b4075eb93538b3', '2004-02-05', 3, 1, '2022-10-29', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(305, 'Silvana Yseth', 'Perea Mosquera', '3166596635', '1193586071', '76381f4a7041c27ab1b4075eb93538b3', '2002-11-05', 3, 1, '2023-01-23', 12, 3, 'puntual.jpg', 'Desconectado', 1),
(306, 'Sofia', 'Ardila Sanchez', '3238421546', '1000319698', '76381f4a7041c27ab1b4075eb93538b3', '2001-09-29', 3, 1, '2023-04-19', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(307, 'Sonia', 'Rodriguez Cardozo', '3196956077', '28697449', '76381f4a7041c27ab1b4075eb93538b3', '1963-04-21', 3, 2, '2022-03-15', 7, 3, 'clab.jpeg', 'Desconectado', 1),
(308, 'Steffanny', 'Enciso Diaz', '3188378228', '1110536883', '76381f4a7041c27ab1b4075eb93538b3', '1993-07-03', 3, 2, '2023-04-19', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(309, 'Sugey Maria', 'Colmenares Dautant', '3054623061', '5768429', '76381f4a7041c27ab1b4075eb93538b3', '1981-10-08', 3, 2, '2023-04-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(310, 'Sully Viviana', 'Calderon Calderon', '3022676215', '1012357552', '76381f4a7041c27ab1b4075eb93538b3', '1989-10-06', 3, 1, '2021-01-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(311, 'Tifany Natacha', 'Mendez Morgado', '3134376695', '6640778', '76381f4a7041c27ab1b4075eb93538b3', '2000-01-16', 3, 1, '2023-04-27', 3, 3, 'puntual.jpg', 'Desconectado', 1),
(312, 'Valentina', 'Cantor Franco', '3001111115', '1034396289', '76381f4a7041c27ab1b4075eb93538b3', '2004-01-12', 3, 1, '2022-11-02', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(313, 'Valentina', 'Espinosa Jimenez', '3042055205', '1001205142', '76381f4a7041c27ab1b4075eb93538b3', '2001-08-30', 3, 1, '2023-01-26', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(314, 'Valentina', 'Rivera Bolivar', '3203555563', '1010001845', '76381f4a7041c27ab1b4075eb93538b3', '2000-09-29', 3, 1, '2023-04-19', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(315, 'Valentina', 'Soto Ramirez', '3118176253', '1000836414', '76381f4a7041c27ab1b4075eb93538b3', '2001-05-12', 3, 1, '2022-09-01', 5, 3, 'puntual.jpg', 'Desconectado', 1),
(316, 'Valeri Tatiana', 'Rodriguez Rodriguez', '3112965481', '1010032538', '76381f4a7041c27ab1b4075eb93538b3', '2000-07-21', 3, 1, '2023-01-27', 15, 3, 'puntual.jpg', 'Desconectado', 1),
(317, 'Victor Hugo', 'Bernal Murcia', '3132452067', '79644735', '76381f4a7041c27ab1b4075eb93538b3', '1973-05-09', 3, 2, '2022-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(318, 'Victor Manuel', 'Becerra Calderon', '3001111116', '79996303', '76381f4a7041c27ab1b4075eb93538b3', '1981-04-12', 1, 1, '2018-05-21', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(319, 'Vivian', 'Velasquez Pena', '3054382304', '52022984', '76381f4a7041c27ab1b4075eb93538b3', '1971-09-07', 3, 2, '2023-04-17', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(320, 'Walter Stiven', 'Rodriguez Gutierrez', '3134500518', '1022927232', '76381f4a7041c27ab1b4075eb93538b3', '2004-08-31', 3, 1, '2023-04-01', 10, 3, 'puntual.jpg', 'Desconectado', 1),
(321, 'Wendy Carolina', 'Rodriguez Zubieta', '3194221558', '1000728287', '76381f4a7041c27ab1b4075eb93538b3', '2002-12-08', 3, 1, '2023-04-27', 3, 3, 'puntual.jpg', 'Desconectado', 1),
(322, 'William Daniel', 'Munoz Bernal', '3144922277', '1022404788', '76381f4a7041c27ab1b4075eb93538b3', '1995-06-27', 1, 1, '2021-02-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(323, 'William Eduardo', 'Marino Vargas', '3125763922', '1020785644', '76381f4a7041c27ab1b4075eb93538b3', '1993-09-14', 3, 2, '2022-12-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(324, 'Wilmar', 'Sanchez Nontoa', '3204464877', '1031133910', '76381f4a7041c27ab1b4075eb93538b3', '1991-09-01', 3, 1, '2022-10-21', 4, 3, 'puntual.jpg', 'Desconectado', 1),
(325, 'Wilson Leonardo', 'Rodriguez Vargas', '3195086058', '79968124', '76381f4a7041c27ab1b4075eb93538b3', '1977-08-16', 1, 1, '2023-02-06', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(326, 'Yancy Alexandra', 'Suarez Saavedra', '3175119923', '1233891073', '76381f4a7041c27ab1b4075eb93538b3', '1997-07-09', 3, 1, '2023-04-26', 3, 3, 'puntual.jpg', 'Desconectado', 1),
(327, 'Yeni Rocio', 'Zapata Rodriguez', '3017199567', '1032449338', '76381f4a7041c27ab1b4075eb93538b3', '1992-02-20', 3, 1, '2023-01-06', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(328, 'Yennifer Yenipse', 'Gonzalez Romero', '3022768267', '1022344006', '76381f4a7041c27ab1b4075eb93538b3', '1988-01-25', 3, 1, '2022-11-11', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(329, 'Yenny Karina', 'Gonzalez Leon', '3132258220', '1012354690', '76381f4a7041c27ab1b4075eb93538b3', '1989-07-27', 3, 1, '2022-11-02', 18, 2, 'puntual.jpg', 'Desconectado', 1),
(330, 'Yesica Paola', 'Pachon Sierra', '3007506435', '1233498665', '76381f4a7041c27ab1b4075eb93538b3', '1998-06-24', 1, 1, '2022-09-01', 1, 3, 'puntual.jpg', 'Desconectado', 1),
(331, 'Yessica', 'Alaguna Navarro', '3045897229', '1020800642', '76381f4a7041c27ab1b4075eb93538b3', '1995-01-04', 3, 1, '2022-03-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(332, 'Yherly Dayana', 'Tapiero Castro', '3147327434', '1001175757', '76381f4a7041c27ab1b4075eb93538b3', '2003-09-27', 3, 1, '2023-04-14', 9, 3, 'puntual.jpg', 'Desconectado', 1),
(333, 'Yinna Paola', 'Ariza Diaz', '3133719732', '1110575383', '76381f4a7041c27ab1b4075eb93538b3', '1996-10-04', 3, 1, '2022-10-01', 8, 3, 'puntual.jpg', 'Desconectado', 1),
(334, 'Yised Yorelly', 'Leon Triana', '3195472466', '1016054051', '76381f4a7041c27ab1b4075eb93538b3', '1993-03-23', 3, 2, '2020-09-01', 4, 3, 'clab.jpeg', 'Desconectado', 1),
(335, 'Yolanda', 'Lopez Neira', '3123164585', '1015395850', '76381f4a7041c27ab1b4075eb93538b3', '1986-06-17', 3, 1, '2022-11-21', 16, 3, 'puntual.jpg', 'Desconectado', 1),
(336, 'Yully Esperanza', 'Umbarila Moreno', '3044560510', '1022988556', '76381f4a7041c27ab1b4075eb93538b3', '1993-07-29', 3, 1, '2023-02-10', 18, 3, 'puntual.jpg', 'Desconectado', 1),
(337, 'Yuly Tatiana', 'Henao Toro', '3172456110', '1000224068', '76381f4a7041c27ab1b4075eb93538b3', '2002-03-25', 3, 1, '2023-04-14', 9, 3, 'puntual.jpg', 'Desconectado', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id_etiqueta`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `grupos_chat`
--
ALTER TABLE `grupos_chat`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jefe_grupo`
--
ALTER TABLE `jefe_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes_grupos`
--
ALTER TABLE `mensajes_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `messages_grupos`
--
ALTER TABLE `messages_grupos`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `ticket_redireccion`
--
ALTER TABLE `ticket_redireccion`
  ADD PRIMARY KEY (`id_redireccion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel_user` (`tel_user`,`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id_etiqueta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `grupos_chat`
--
ALTER TABLE `grupos_chat`
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `jefe_grupo`
--
ALTER TABLE `jefe_grupo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `mensajes_grupos`
--
ALTER TABLE `mensajes_grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `messages_grupos`
--
ALTER TABLE `messages_grupos`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ticket_redireccion`
--
ALTER TABLE `ticket_redireccion`
  MODIFY `id_redireccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
