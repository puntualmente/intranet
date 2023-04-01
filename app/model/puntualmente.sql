-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2023 a las 06:28:23
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `n_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos_chat`
--

INSERT INTO `grupos_chat` (`id_grupo`, `n_grupo`, `propietario`) VALUES
(58, 'Hola', 16),
(59, 'ok', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_integrante`
--

CREATE TABLE `grupo_integrante` (
  `id` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `tipo_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_integrante`
--

INSERT INTO `grupo_integrante` (`id`, `id_grupo`, `id_usuario`, `tipo_user`) VALUES
(144, 58, 22, 'user'),
(145, 58, 23, 'user'),
(146, 58, 16, 'admin'),
(147, 59, 24, 'user'),
(148, 59, 16, 'admin');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes_grupos`
--

INSERT INTO `mensajes_grupos` (`id`, `id_msg`, `id_persona`, `id_grupo`, `estado`) VALUES
(163, 429, 22, 58, 0),
(164, 429, 23, 58, 0),
(165, 429, 16, 58, 1),
(166, 0, 22, 58, 0),
(167, 0, 23, 58, 0),
(168, 0, 16, 58, 1),
(169, 0, 22, 58, 0),
(170, 0, 23, 58, 0),
(171, 0, 16, 58, 1),
(172, 0, 22, 58, 0),
(173, 0, 23, 58, 0),
(174, 0, 16, 58, 1),
(175, 0, 22, 58, 0),
(176, 0, 23, 58, 0),
(177, 0, 16, 58, 1),
(178, 0, 22, 58, 0),
(179, 0, 23, 58, 0),
(180, 0, 16, 58, 1),
(181, 0, 22, 58, 0),
(182, 0, 23, 58, 0),
(183, 0, 16, 58, 1),
(184, 7, 22, 58, 0),
(185, 7, 23, 58, 0),
(186, 7, 16, 58, 1),
(187, 8, 22, 58, 0),
(188, 8, 23, 58, 0),
(189, 8, 16, 58, 1),
(190, 9, 22, 58, 0),
(191, 9, 23, 58, 0),
(192, 9, 16, 58, 1),
(193, 11, 22, 58, 0),
(194, 11, 23, 58, 0),
(195, 11, 16, 58, 1),
(196, 12, 24, 59, 1),
(197, 12, 16, 59, 1),
(198, 13, 24, 59, 1),
(199, 13, 16, 59, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`, `estado`, `fecha`, `hora`, `ip`) VALUES
(429, 58, 16, 'Hola', '', 0, 0, '2023-03-31', '22:11:26', '::1'),
(430, 58, 16, '', '1680318693auth.jpeg', 1, 0, '2023-03-31', '22:11:33', '::1'),
(431, 22, 16, 'Hola', '', 0, 0, '2023-03-31', '22:15:46', '::1'),
(432, 22, 16, 'Hola', '', 0, 0, '2023-03-31', '22:19:45', '::1'),
(433, 22, 16, '<zsa', '', 0, 0, '2023-03-31', '22:24:25', '::1'),
(434, 22, 16, 'Hola', '', 0, 0, '2023-03-31', '22:31:37', '::1'),
(435, 22, 16, 'buenas', '', 0, 0, '2023-03-31', '22:31:41', '::1'),
(436, 22, 16, 'jadh', '', 0, 0, '2023-03-31', '22:42:51', '::1'),
(437, 22, 16, '<sdhg', '', 0, 0, '2023-03-31', '22:43:32', '::1'),
(438, 22, 16, 'sjdh', '', 0, 0, '2023-03-31', '22:43:44', '::1'),
(439, 58, 16, '', '1680320780auth.jpeg', 1, 0, '2023-03-31', '22:46:20', '::1'),
(440, 22, 16, '', '1680320797auth.jpeg', 1, 0, '2023-03-31', '22:46:37', '::1'),
(441, 58, 16, '', '1680320811logo.jpeg', 1, 0, '2023-03-31', '22:46:51', '::1'),
(442, 22, 16, 'hola', '', 0, 0, '2023-03-31', '22:50:07', '::1'),
(443, 22, 16, '', '1680321016logo.jpeg', 1, 0, '2023-03-31', '22:50:16', '::1'),
(444, 16, 24, 'Hola', '', 0, 1, '2023-03-31', '22:53:17', '192.168.101.5'),
(445, 24, 16, 'hey', '', 0, 1, '2023-03-31', '22:53:28', '::1'),
(446, 24, 16, 'hi', '', 0, 1, '2023-03-31', '22:54:02', '::1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages_grupos`
--

INSERT INTO `messages_grupos` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`, `estado`, `fecha`, `hora`, `ip`) VALUES
(1, 58, 16, 'Buenas', '', 0, 0, '2023-03-31', '22:15:57', '::1'),
(2, 58, 16, 'sadjdas', '', 0, 0, '2023-03-31', '22:16:04', '::1'),
(3, 58, 16, 'sad', '', 0, 0, '2023-03-31', '22:19:53', '::1'),
(4, 58, 16, 'sdfsd', '', 0, 0, '2023-03-31', '22:24:17', '::1'),
(5, 58, 16, 'dsf', '', 0, 0, '2023-03-31', '22:32:28', '::1'),
(6, 58, 16, 'sdf', '', 0, 0, '2023-03-31', '22:32:33', '::1'),
(7, 58, 16, 'sad', '', 0, 0, '2023-03-31', '22:37:22', '::1'),
(8, 58, 16, 'sdf', '', 0, 0, '2023-03-31', '22:41:59', '::1'),
(9, 58, 16, 'hola', '', 0, 0, '2023-03-31', '22:42:42', '::1'),
(10, 58, 16, '', '1680320997auth.jpeg', 1, 0, '2023-03-31', '22:49:57', '::1'),
(11, 58, 16, 'wrap', '', 0, 0, '2023-03-31', '22:50:26', '::1'),
(12, 59, 24, 'Hola', '', 0, 0, '2023-03-31', '22:59:15', '192.168.101.5'),
(13, 59, 16, 'hey', '', 0, 0, '2023-03-31', '22:59:30', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(10) NOT NULL,
  `n_sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `descrip` varchar(500) NOT NULL,
  `estado` int(3) NOT NULL,
  `redireccion` tinyint(1) NOT NULL,
  `id_area_redireccion` int(10) NOT NULL,
  `f_h_cierre` datetime NOT NULL,
  `ip_cierre` int(15) NOT NULL,
  `id_user_cierre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `n_user`, `l_user`, `tel_user`, `cedula`, `password`, `f_nacimiento`, `id_area`, `id_empresa`, `f_ingreso_empre`, `id_grupo`, `rol`, `img`, `status`) VALUES
(16, 'Jhoan', 'Duarte', '3214096428', '1069766798', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 19, 3, '1999-04-30', 6, 1, '1679089658giftbox.png', 'Disponible'),
(22, 'user', 'admin', '111', '111', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 20, 6, '1999-04-30', 7, 1, '1680318554logo.jpeg', 'Desconectado'),
(23, 'user', 'privis', '222', '222', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 21, 3, '1999-04-30', 7, 2, '1680318593auth.jpeg', 'Desconectado'),
(24, 'user', 'regular', '333', '333', 'c93ccd78b2076528346216b3b2f701e6', '1999-04-30', 22, 3, '1999-04-30', 7, 3, '1680318644imagen.jpg', 'Disponible');

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
-- Indices de la tabla `messages_grupos`
--
ALTER TABLE `messages_grupos`
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
  MODIFY `id_etiqueta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos_chat`
--
ALTER TABLE `grupos_chat`
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de la tabla `mensajes_grupos`
--
ALTER TABLE `mensajes_grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT de la tabla `messages_grupos`
--
ALTER TABLE `messages_grupos`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
