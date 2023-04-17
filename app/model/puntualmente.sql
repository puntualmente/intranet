-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2023 a las 19:52:32
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
-- Base de datos: `puntualmente`
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
(20, 'Administrativo'),
(21, 'Tecnologia'),
(22, 'Operativo');

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
(3, 'Puntualmente'),
(6, 'CLAB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id_etiqueta` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `descrip_etiq` varchar(1000) NOT NULL,
  `t_estimado` int(3) NOT NULL,
  `tipo_t` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id_etiqueta`, `id_area`, `descrip_etiq`, `t_estimado`, `tipo_t`) VALUES
(6, 21, 'desc tec 1', 100, 'Dias'),
(7, 20, 'etiq adm 1', 10, 'Horas'),
(8, 20, 'otra de admin', 100, 'Horas'),
(9, 20, 'nueva de admin', 200, 'Minutos'),
(10, 21, 'hola', 10, 'Minutos'),
(11, 22, 'ashdg', 10, 'Minutos'),
(12, 21, 'Camb. Diademas', 5, 'Minutos'),
(13, 20, 'Nomina', 2, 'Horas');

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
(7, 'Grupo 1');

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
(58, 'Hola', 22),
(59, 'ok', 16),
(60, 'Grupo admin', 26),
(61, 'Con regular', 26);

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
(144, 58, 16, 'user'),
(145, 58, 22, 'admin'),
(146, 59, 24, 'user'),
(147, 59, 22, 'user'),
(148, 59, 23, 'user'),
(149, 59, 16, 'admin'),
(150, 60, 25, 'user'),
(151, 60, 28, 'user'),
(152, 60, 26, 'admin'),
(153, 61, 27, 'user'),
(154, 61, 26, 'admin');

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
(163, 430, 16, 58, 1),
(164, 430, 22, 58, 0),
(165, 0, 16, 58, 1),
(166, 0, 22, 58, 0),
(167, 0, 25, 60, 1),
(168, 0, 28, 60, 1),
(169, 0, 26, 60, 1),
(170, 0, 25, 60, 1),
(171, 0, 28, 60, 1),
(172, 0, 26, 60, 1),
(173, 0, 25, 60, 1),
(174, 0, 28, 60, 1),
(175, 0, 26, 60, 1),
(176, 0, 27, 61, 1),
(177, 0, 26, 61, 1),
(178, 0, 27, 61, 1),
(179, 0, 26, 61, 1),
(180, 0, 25, 60, 1),
(181, 0, 28, 60, 1),
(182, 0, 26, 60, 1),
(183, 0, 25, 60, 1),
(184, 0, 28, 60, 1),
(185, 0, 26, 60, 1),
(186, 0, 25, 60, 1),
(187, 0, 28, 60, 1),
(188, 0, 26, 60, 1),
(189, 0, 27, 61, 1),
(190, 0, 26, 61, 1),
(191, 0, 27, 61, 1),
(192, 0, 26, 61, 1),
(193, 0, 27, 61, 1),
(194, 0, 26, 61, 1),
(195, 0, 25, 60, 1),
(196, 0, 28, 60, 1),
(197, 0, 26, 60, 1),
(198, 0, 25, 60, 1),
(199, 0, 28, 60, 1),
(200, 0, 26, 60, 1),
(201, 0, 25, 60, 1),
(202, 0, 28, 60, 1),
(203, 0, 26, 60, 1),
(204, 0, 25, 60, 1),
(205, 0, 28, 60, 1),
(206, 0, 26, 60, 1),
(207, 0, 25, 60, 1),
(208, 0, 28, 60, 1),
(209, 0, 26, 60, 1),
(210, 0, 25, 60, 1),
(211, 0, 28, 60, 1),
(212, 0, 26, 60, 1),
(213, 0, 25, 60, 1),
(214, 0, 28, 60, 1),
(215, 0, 26, 60, 1),
(216, 0, 25, 60, 1),
(217, 0, 28, 60, 1),
(218, 0, 26, 60, 1),
(219, 0, 25, 60, 1),
(220, 0, 28, 60, 1),
(221, 0, 26, 60, 1),
(222, 0, 25, 60, 1),
(223, 0, 28, 60, 1),
(224, 0, 26, 60, 1),
(225, 0, 25, 60, 1),
(226, 0, 28, 60, 1),
(227, 0, 26, 60, 1),
(228, 0, 25, 60, 1),
(229, 0, 28, 60, 1),
(230, 0, 26, 60, 1),
(231, 0, 25, 60, 1),
(232, 0, 28, 60, 1),
(233, 0, 26, 60, 1),
(234, 0, 25, 60, 1),
(235, 0, 28, 60, 1),
(236, 0, 26, 60, 1),
(237, 0, 25, 60, 1),
(238, 0, 28, 60, 1),
(239, 0, 26, 60, 1),
(240, 0, 25, 60, 1),
(241, 0, 28, 60, 1),
(242, 0, 26, 60, 1),
(243, 0, 25, 60, 1),
(244, 0, 28, 60, 1),
(245, 0, 26, 60, 1),
(246, 0, 25, 60, 1),
(247, 0, 28, 60, 1),
(248, 0, 26, 60, 1),
(249, 0, 25, 60, 1),
(250, 0, 28, 60, 1),
(251, 0, 26, 60, 1),
(252, 0, 25, 60, 1),
(253, 0, 28, 60, 1),
(254, 0, 26, 60, 1),
(255, 0, 25, 60, 1),
(256, 0, 28, 60, 1),
(257, 0, 26, 60, 1),
(258, 0, 25, 60, 1),
(259, 0, 28, 60, 1),
(260, 0, 26, 60, 1);

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
(429, 16, 22, '', '16802825341680010369Kevin.jpg', 1, 1, '2023-03-31', '12:08:54', '::1'),
(430, 58, 16, 'Hola', '', 0, 0, '2023-03-31', '15:23:19', '::1'),
(431, 58, 16, '', '1680294269puntual.jpg', 1, 0, '2023-03-31', '15:24:29', '::1'),
(432, 22, 16, 'Hola', '', 0, 0, '2023-04-01', '09:39:36', '::1'),
(433, 22, 16, 'Hola', '', 0, 0, '2023-04-01', '09:40:13', '::1'),
(434, 22, 16, '', '1680360024puntual.jpg', 1, 0, '2023-04-01', '09:40:24', '::1'),
(435, 22, 16, 'hey', '', 0, 0, '2023-04-03', '07:29:07', '::1'),
(436, 16, 25, 'Hola', '', 0, 0, '2023-04-03', '09:21:57', '::1'),
(437, 25, 28, 'Hola', '', 0, 1, '2023-04-03', '09:30:37', '::1'),
(438, 28, 27, 'Hey', '', 0, 1, '2023-04-03', '10:51:21', '172.16.3.80'),
(439, 25, 26, 'Hola', '', 0, 1, '2023-04-03', '11:41:00', '172.16.3.80'),
(440, 27, 26, 'Hola', '', 0, 1, '2023-04-03', '11:52:01', '172.16.3.80'),
(441, 27, 26, 'Hola', '', 0, 1, '2023-04-03', '12:29:35', '172.16.3.80'),
(442, 27, 26, 'Hey', '', 0, 1, '2023-04-03', '12:30:44', '172.16.3.80'),
(443, 27, 26, 'Hola', '', 0, 1, '2023-04-03', '12:33:49', '172.16.3.80'),
(444, 27, 26, 'Como', '', 0, 1, '2023-04-03', '12:33:54', '172.16.3.80'),
(445, 27, 26, 'Estas', '', 0, 1, '2023-04-03', '12:34:00', '172.16.3.80'),
(446, 25, 26, 'Cift', '', 0, 1, '2023-04-03', '12:39:32', '172.16.3.80'),
(447, 25, 26, 'Kgxix', '', 0, 1, '2023-04-03', '12:39:42', '172.16.3.80'),
(448, 27, 26, 'Hola', '', 0, 1, '2023-04-03', '12:42:35', '172.16.3.80'),
(449, 27, 26, 'Cómo vas?', '', 0, 1, '2023-04-03', '12:42:41', '172.16.3.80'),
(450, 25, 26, 'Jhoan', '', 0, 1, '2023-04-03', '12:47:48', '172.16.3.80'),
(451, 25, 26, 'Hola', '', 0, 1, '2023-04-03', '12:56:38', '172.16.3.80'),
(452, 25, 26, 'Hey', '', 0, 1, '2023-04-03', '12:56:43', '172.16.3.80'),
(453, 25, 26, 'Jaja', '', 0, 1, '2023-04-03', '12:56:52', '172.16.3.80'),
(454, 25, 26, 'Xd', '', 0, 1, '2023-04-03', '12:56:58', '172.16.3.80'),
(455, 25, 26, 'Jshshs', '', 0, 1, '2023-04-03', '12:57:03', '172.16.3.80'),
(456, 26, 25, 'sajkdha', '', 0, 1, '2023-04-03', '12:57:52', '::1'),
(457, 26, 25, 'jsdhf', '', 0, 1, '2023-04-03', '12:58:02', '::1'),
(458, 26, 25, 'jashdad', '', 0, 1, '2023-04-03', '12:58:05', '::1'),
(459, 26, 25, 'sjdfhskdf', '', 0, 1, '2023-04-03', '12:58:08', '::1'),
(460, 26, 25, 'jsdhf', '', 0, 1, '2023-04-03', '13:00:07', '::1'),
(461, 26, 25, 'sdjfh', '', 0, 1, '2023-04-03', '13:00:12', '::1'),
(462, 26, 27, 'sahasgd', '', 0, 1, '2023-04-03', '13:01:24', '::1'),
(463, 26, 27, 'ajsdh', '', 0, 1, '2023-04-03', '13:01:27', '::1'),
(464, 26, 27, 'klahsd', '', 0, 1, '2023-04-03', '13:01:31', '::1'),
(465, 26, 27, 'jkhakjdh', '', 0, 1, '2023-04-03', '13:01:34', '::1'),
(466, 25, 26, 'Kshshs', '', 0, 1, '2023-04-03', '13:10:50', '172.16.3.80'),
(467, 25, 26, 'Jshshs', '', 0, 1, '2023-04-03', '13:10:55', '172.16.3.80'),
(468, 25, 26, 'Jshshs', '', 0, 1, '2023-04-03', '13:11:07', '172.16.3.80'),
(469, 25, 26, 'Jsjs', '', 0, 1, '2023-04-03', '13:11:19', '172.16.3.80'),
(470, 26, 25, 'hey', '', 0, 1, '2023-04-03', '14:51:34', '::1'),
(471, 26, 25, '', '1680551505puntual.jpg', 1, 1, '2023-04-03', '14:51:45', '::1'),
(472, 28, 26, 'Hola', '', 0, 1, '2023-04-04', '08:25:17', '172.16.3.80'),
(473, 28, 26, 'Hola', '', 0, 1, '2023-04-04', '08:26:27', '172.16.3.80'),
(474, 28, 26, 'Hi', '', 0, 1, '2023-04-04', '08:28:42', '172.16.3.80'),
(475, 28, 26, '10', '', 0, 1, '2023-04-04', '08:28:49', '172.16.3.80'),
(476, 28, 26, 'Hola', '', 0, 1, '2023-04-04', '08:29:05', '172.16.3.80'),
(477, 28, 26, 'Hi', '', 0, 1, '2023-04-04', '08:29:49', '172.16.3.80'),
(478, 28, 26, 'Hola', '', 0, 1, '2023-04-04', '08:38:04', '172.16.3.80'),
(479, 28, 26, 'Hola', '', 0, 1, '2023-04-04', '08:38:25', '172.16.3.80'),
(480, 28, 26, 'Jshah', '', 0, 1, '2023-04-04', '08:42:35', '172.16.3.80'),
(481, 28, 26, 'Hola', '', 0, 1, '2023-04-04', '08:43:05', '172.16.3.80'),
(482, 28, 26, 'Kshshs', '', 0, 1, '2023-04-04', '08:43:09', '172.16.3.80'),
(483, 28, 26, 'Ksjs', '', 0, 1, '2023-04-04', '08:43:36', '172.16.3.80'),
(484, 28, 26, 'Ksjshs', '', 0, 1, '2023-04-04', '08:43:40', '172.16.3.80'),
(485, 27, 28, 'hey', '', 0, 1, '2023-04-04', '08:50:45', '::1'),
(486, 28, 26, 'Hey', '', 0, 1, '2023-04-04', '08:58:15', '172.16.3.80'),
(487, 28, 26, 'Jshhs', '', 0, 1, '2023-04-04', '08:58:23', '172.16.3.80'),
(488, 28, 26, 'Jshs', '', 0, 1, '2023-04-04', '08:58:31', '172.16.3.80'),
(489, 28, 27, 'Hola', '', 0, 1, '2023-04-05', '12:57:56', '::1'),
(490, 28, 27, '', '1680717486puntual.jpg', 1, 1, '2023-04-05', '12:58:06', '::1'),
(491, 27, 28, 'Hola', '', 0, 1, '2023-04-10', '11:22:07', '::1'),
(492, 27, 28, '', '16811437391680010369Kevin.jpg', 1, 1, '2023-04-10', '11:22:19', '::1');

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
(0, 58, 16, 'Hey', '', 0, 0, '2023-04-01', '09:39:43', '::1'),
(0, 58, 16, '', '1680359990puntual.jpg', 1, 0, '2023-04-01', '09:39:50', '::1'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-03', '11:49:19', '172.16.3.80'),
(0, 60, 25, 'hola', '', 0, 0, '2023-04-03', '11:49:46', '::1'),
(0, 60, 25, 'hjg', '', 0, 0, '2023-04-03', '11:50:53', '::1'),
(0, 61, 26, 'Hola', '', 0, 0, '2023-04-03', '11:52:38', '172.16.3.80'),
(0, 61, 26, 'Buenas', '', 0, 0, '2023-04-03', '11:52:47', '172.16.3.80'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-03', '12:00:51', '172.16.3.80'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-03', '12:13:33', '172.16.3.80'),
(0, 60, 26, 'Hey', '', 0, 0, '2023-04-03', '12:13:39', '172.16.3.80'),
(0, 61, 26, 'Hey', '', 0, 0, '2023-04-03', '12:30:32', '172.16.3.80'),
(0, 61, 26, 'Hi', '', 0, 0, '2023-04-03', '12:34:12', '172.16.3.80'),
(0, 61, 26, 'Zzzz', '', 0, 0, '2023-04-03', '12:34:18', '172.16.3.80'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-03', '12:47:15', '172.16.3.80'),
(0, 60, 26, 'Hey', '', 0, 0, '2023-04-03', '12:47:19', '172.16.3.80'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-03', '12:47:25', '172.16.3.80'),
(0, 60, 26, 'Uqhsga', '', 0, 0, '2023-04-03', '12:47:29', '172.16.3.80'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-03', '12:57:15', '172.16.3.80'),
(0, 60, 26, 'Hdgshs', '', 0, 0, '2023-04-03', '12:57:20', '172.16.3.80'),
(0, 60, 26, 'Jshshs', '', 0, 0, '2023-04-03', '12:57:25', '172.16.3.80'),
(0, 60, 25, 'jsjjs', '', 0, 0, '2023-04-03', '12:58:18', '::1'),
(0, 60, 25, 'fjsdhf', '', 0, 0, '2023-04-03', '12:58:20', '::1'),
(0, 60, 25, 'ksdjf', '', 0, 0, '2023-04-03', '12:58:28', '::1'),
(0, 60, 25, 'ksdjf', '', 0, 0, '2023-04-03', '12:58:32', '::1'),
(0, 60, 25, 'ajsdh', '', 0, 0, '2023-04-03', '12:59:55', '::1'),
(0, 60, 25, 'jdhf', '', 0, 0, '2023-04-03', '12:59:58', '::1'),
(0, 60, 26, 'Jaha', '', 0, 0, '2023-04-03', '13:12:17', '172.16.3.80'),
(0, 60, 26, 'Jshs', '', 0, 0, '2023-04-03', '13:12:22', '172.16.3.80'),
(0, 60, 26, 'Jaja', '', 0, 0, '2023-04-03', '13:12:36', '172.16.3.80'),
(0, 60, 28, 'jsadh', '', 0, 0, '2023-04-04', '08:47:01', '::1'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-04', '08:48:43', '172.16.3.80'),
(0, 60, 26, 'Jaha', '', 0, 0, '2023-04-04', '08:48:48', '172.16.3.80'),
(0, 60, 26, 'Hi', '', 0, 0, '2023-04-04', '08:48:58', '172.16.3.80'),
(0, 60, 26, 'Hola', '', 0, 0, '2023-04-04', '09:01:05', '172.16.3.80'),
(0, 60, 26, 'Yrkk', '', 0, 0, '2023-04-04', '09:02:20', '172.16.3.80');

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
(3, 'Sede Norte');

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

INSERT INTO `tickets` (`id_ticket`, `fecha_hora`, `ip_origen`, `id_empresa`, `id_grupo_proyecto`, `id_propietario_tck`, `id_area`, `id_etiqueta`, `descrip`, `estado`, `descrip_solucion`, `id_area_redireccion`, `f_h_cierre`, `ip_cierre`, `id_user_cierre`) VALUES
(55, '2023-04-12 11:03:50', '::1', 3, 7, 28, 21, 12, 'ok', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(56, '2023-04-12 11:20:41', '::1', 3, 7, 28, 21, 12, 'ok', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(57, '2023-04-12 11:23:27', '::1', 3, 7, 28, 21, 12, 'ok', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(58, '2023-04-12 11:26:30', '::1', 3, 7, 28, 21, 12, 'por favor', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(59, '2023-04-12 11:27:57', '::1', 3, 7, 28, 21, 12, 'please', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(60, '2023-04-12 11:28:53', '::1', 3, 7, 28, 21, 12, 'ok', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(61, '2023-04-12 11:47:50', '::1', 3, 7, 25, 20, 13, 'ok', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(62, '2023-04-12 11:49:55', '::1', 3, 7, 25, 21, 10, 'ok', 1, '', 0, '0000-00-00 00:00:00', '', 0),
(63, '2023-04-12 11:56:46', '::1', 3, 7, 28, 21, 12, 'otro mas', 1, '', 0, '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_redireccion`
--

CREATE TABLE `ticket_redireccion` (
  `id_redireccion` int(10) NOT NULL,
  `id_ticket` int(10) NOT NULL,
  `descrip_redirec` varchar(1000) NOT NULL,
  `area_redireccion` int(10) NOT NULL,
  `user_redireccion` int(10) NOT NULL,
  `f_h_redireccion` date NOT NULL,
  `estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_grupo` int(10) NOT NULL,
  `rol` int(5) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `n_user`, `l_user`, `tel_user`, `cedula`, `password`, `f_nacimiento`, `id_area`, `id_empresa`, `f_ingreso_empre`, `id_grupo`, `rol`, `img`, `status`) VALUES
(25, 'Usuario ', 'admin', '111', '111', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 21, 3, '1999-04-30', 7, 1, '1680531423puntual.jpg', 'Disponible'),
(26, 'Usuario ', 'privis', '222', '222', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 20, 6, '1999-04-30', 7, 2, '1680531472logo.jpeg', 'Desconectado'),
(27, 'Usuario ', 'regular', '333', '333', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 22, 6, '1999-04-30', 7, 3, '1680531512clab.jpeg', 'Desconectado'),
(28, 'Jhoan', 'Duarte', '999', '1069766798', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 21, 3, '1999-04-30', 7, 1, '1680532213img1.jpg', 'Disponible');

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
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id_etiqueta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos_chat`
--
ALTER TABLE `grupos_chat`
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `mensajes_grupos`
--
ALTER TABLE `mensajes_grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `ticket_redireccion`
--
ALTER TABLE `ticket_redireccion`
  MODIFY `id_redireccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
