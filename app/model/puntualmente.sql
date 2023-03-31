-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2023 a las 15:33:20
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
(1, 20, 'Una etiqueta', 10, '3'),
(2, 21, 'Otra etiqueta', 30, 'Horas'),
(3, 22, 'Otra etiqueta', 100, 'Dias'),
(4, 21, 'AJHHASGD', 34, 'Horas');

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
(53, 'Otro Grupo de tecnologia', 16),
(54, 'hdsjf', 16),
(55, 'Nuevo grupo', 16),
(56, 'jashd', 16);

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
(133, 53, 11, 'user'),
(134, 53, 16, 'admin'),
(135, 54, 11, 'user'),
(136, 54, 16, 'admin'),
(137, 55, 20, 'user'),
(138, 55, 19, 'user'),
(139, 55, 16, 'admin'),
(140, 56, 21, 'user'),
(141, 56, 16, 'admin');

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
(125, 391, 11, 54, 0),
(126, 391, 16, 54, 1),
(127, 399, 11, 53, 0),
(128, 399, 16, 53, 1),
(129, 403, 11, 53, 0),
(130, 403, 16, 53, 1),
(131, 405, 20, 55, 1),
(132, 405, 19, 55, 0),
(133, 405, 16, 55, 1),
(134, 407, 20, 55, 1),
(135, 407, 19, 55, 0),
(136, 407, 16, 55, 1),
(137, 408, 20, 55, 1),
(138, 408, 19, 55, 0),
(139, 408, 16, 55, 1),
(140, 409, 20, 55, 1),
(141, 409, 19, 55, 0),
(142, 409, 16, 55, 1),
(143, 412, 20, 55, 1),
(144, 412, 19, 55, 0),
(145, 412, 16, 55, 1),
(146, 416, 20, 55, 1),
(147, 416, 19, 55, 0),
(148, 416, 16, 55, 1),
(149, 418, 20, 55, 0),
(150, 418, 19, 55, 0),
(151, 418, 16, 55, 1),
(152, 419, 20, 55, 0),
(153, 419, 19, 55, 0),
(154, 419, 16, 55, 1),
(155, 420, 20, 55, 0),
(156, 420, 19, 55, 0),
(157, 420, 16, 55, 1),
(158, 421, 20, 55, 0),
(159, 421, 19, 55, 0),
(160, 421, 16, 55, 1);

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
(374, 16, 20, 'Hey', '', 0, 1, '2023-03-28', '12:03:40', '::1'),
(375, 16, 20, '', '16800230271678391699img1.jpg', 1, 1, '2023-03-28', '12:03:47', '::1'),
(376, 16, 21, 'Hey', '', 0, 1, '2023-03-28', '12:04:34', '::1'),
(377, 16, 21, '', '16800230821678382447img2.jpeg', 1, 1, '2023-03-28', '12:04:42', '::1'),
(378, 21, 16, 'Hola', '', 0, 1, '2023-03-28', '12:05:44', '::1'),
(379, 20, 16, 'Buenas', '', 0, 1, '2023-03-28', '12:05:52', '::1'),
(380, 16, 21, 'Hola', '', 0, 1, '2023-03-28', '12:10:10', '172.16.3.80'),
(381, 16, 21, 'Hola', '', 0, 1, '2023-03-28', '12:10:25', '172.16.3.80'),
(382, 16, 21, 'Hey', '', 0, 1, '2023-03-28', '12:10:37', '172.16.3.80'),
(383, 16, 21, 'Hi', '', 0, 1, '2023-03-28', '12:10:41', '172.16.3.80'),
(384, 16, 21, 'Jahaja', '', 0, 1, '2023-03-28', '12:11:11', '172.16.3.80'),
(385, 21, 16, '', '16801037041680010369Kevin.jpg', 1, 1, '2023-03-29', '10:28:24', '127.0.0.1'),
(386, 16, 11, 'Hey', '', 0, 1, '2023-03-29', '11:12:37', '172.16.3.80'),
(387, 11, 16, 'hi', '', 0, 1, '2023-03-29', '11:18:40', '::1'),
(388, 16, 11, 'B)', '', 0, 1, '2023-03-29', '12:07:23', '172.16.3.80'),
(389, 16, 11, 'Jshsjs', '', 0, 1, '2023-03-29', '12:07:35', '172.16.3.80'),
(390, 18, 16, '', '16801197301680010369Kevin.jpg', 1, 0, '2023-03-29', '14:55:30', '::1'),
(391, 54, 16, 'hsgda', '', 0, 0, '2023-03-30', '11:59:22', '::1'),
(392, 18, 16, 'ghdsf', '', 0, 0, '2023-03-30', '14:03:09', '::1'),
(393, 18, 16, '', '1680203003giftbox.png', 1, 0, '2023-03-30', '14:03:23', '::1'),
(394, 19, 16, 'Hola', '', 0, 0, '2023-03-30', '14:23:20', '::1'),
(395, 19, 16, 'hola', '', 0, 0, '2023-03-30', '14:25:11', '::1'),
(396, 19, 16, 'hasgd', '', 0, 0, '2023-03-30', '14:29:16', '::1'),
(397, 19, 16, 'ashdg', '', 0, 0, '2023-03-30', '14:30:03', '::1'),
(398, 19, 16, 'hdsgf', '', 0, 0, '2023-03-30', '14:30:20', '::1'),
(399, 53, 16, 'hsagd', '', 0, 0, '2023-03-30', '14:30:45', '::1'),
(400, 53, 16, '', '16802046551678977893clab.jpeg', 1, 0, '2023-03-30', '14:30:55', '::1'),
(401, 19, 16, '', '1680205099puntualico.png', 1, 0, '2023-03-30', '14:38:19', '::1'),
(402, 19, 16, 'hags', '', 0, 0, '2023-03-30', '14:38:27', '::1'),
(403, 53, 16, 'hgs', '', 0, 0, '2023-03-30', '14:38:39', '::1'),
(404, 53, 16, '', '1680205126puntualico.png', 1, 0, '2023-03-30', '14:38:46', '::1'),
(405, 55, 16, 'Hola', '', 0, 0, '2023-03-30', '15:45:39', '172.16.3.80'),
(406, 20, 16, 'Hola', '', 0, 1, '2023-03-30', '16:25:34', '172.16.3.80'),
(407, 55, 16, 'Hey', '', 0, 0, '2023-03-30', '16:26:15', '172.16.3.80'),
(408, 55, 16, 'Zz', '', 0, 0, '2023-03-30', '16:28:31', '172.16.3.80'),
(409, 55, 16, 'Ihyc', '', 0, 0, '2023-03-30', '16:29:22', '172.16.3.80'),
(410, 20, 16, 'Kgjg', '', 0, 1, '2023-03-30', '16:29:41', '172.16.3.80'),
(411, 20, 16, 'Kgxkg', '', 0, 1, '2023-03-30', '16:31:03', '172.16.3.80'),
(412, 55, 16, 'Tkcux', '', 0, 0, '2023-03-30', '16:31:17', '172.16.3.80'),
(413, 16, 21, 'Hola', '', 0, 1, '2023-03-30', '16:44:21', '172.16.3.80'),
(414, 21, 16, 'Hey', '', 0, 0, '2023-03-30', '16:45:03', '172.16.3.80'),
(415, 20, 16, 'Hey', '', 0, 0, '2023-03-30', '16:45:17', '172.16.3.80'),
(416, 55, 16, 'Jhoan', '', 0, 0, '2023-03-30', '16:45:29', '172.16.3.80'),
(417, 11, 20, 'hi', '', 0, 0, '2023-03-30', '16:45:52', '::1'),
(418, 55, 16, 'Hola', '', 0, 0, '2023-03-30', '16:46:01', '172.16.3.80'),
(419, 55, 16, 'Hey', '', 0, 0, '2023-03-30', '16:46:08', '172.16.3.80'),
(420, 55, 16, 'Que tal', '', 0, 0, '2023-03-30', '16:46:13', '172.16.3.80'),
(421, 55, 16, 'Buenas', '', 0, 0, '2023-03-30', '16:46:17', '172.16.3.80'),
(422, 20, 16, 'Jahag', '', 0, 0, '2023-03-30', '16:46:38', '172.16.3.80'),
(423, 20, 16, 'Jsgaha', '', 0, 0, '2023-03-30', '16:46:42', '172.16.3.80'),
(424, 20, 16, 'Hola', '', 0, 0, '2023-03-31', '08:06:45', '::1'),
(425, 21, 16, 'Hola', '', 0, 0, '2023-03-31', '08:27:09', '::1');

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
(11, 'Edward', 'Galindo', '3003551529', '123', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 1, 1, '1999-04-30', 1, 1, '1679055552img1.jpg', 'Disponible'),
(16, 'Jhoan', 'Duarte', '3214096428', '1069766798', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 19, 3, '1999-04-30', 6, 1, '1679089658giftbox.png', 'Disponible'),
(18, 'Andres ', 'Moreno', '987', '987', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 19, 2, '1999-04-30', 6, 1, '1679402634clab.jpeg', 'Disponible'),
(19, 'Pepito', 'Perez', '3003551529', '000', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 22, 6, '1999-04-30', 7, 1, '1679504329auth.jpeg', 'Disponible'),
(20, 'Usuario', 'Privis', '222', '222', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 22, 3, '1999-04-30', 7, 2, '1679665160logo.jpeg', 'Desconectado'),
(21, 'Usuario ', 'Regular', '333', '333', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 22, 6, '1999-04-30', 7, 3, '1679666819img1.jpg', 'Desconectado');

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
  MODIFY `id_etiqueta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos_chat`
--
ALTER TABLE `grupos_chat`
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `mensajes_grupos`
--
ALTER TABLE `mensajes_grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
