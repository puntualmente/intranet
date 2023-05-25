-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2023 a las 23:54:43
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
-- Base de datos: `kpuntuak9_info_users`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_persona`
--

CREATE TABLE `archivos_persona` (
  `id` int(10) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombre_archivo` varchar(200) NOT NULL,
  `nombre_carpeta` varchar(200) NOT NULL,
  `tipo_archivo` varchar(100) NOT NULL,
  `f_subido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos_persona`
--

INSERT INTO `archivos_persona` (`id`, `cedula`, `nombre_archivo`, `nombre_carpeta`, `tipo_archivo`, `f_subido`) VALUES
(1, '5023059', 'HOJADEVIDA_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'HOJADEVIDA', '2023-05-25 21:05:00'),
(2, '5023059', 'DOCUMENTODEIDENTIDAD_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'DOCUMENTODEIDENTIDAD', '2023-05-25 21:05:00'),
(3, '5023059', 'ANTECEDENTEPOLICIA_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'ANTECEDENTEPOLICIA', '2023-05-25 21:05:00'),
(4, '5023059', 'ANTECEDENTEPROCURADURIA_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'ANTECEDENTEPROCURADURIA', '2023-05-25 21:05:00'),
(5, '5023059', 'CERTIFICADOSACADEMICOS_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'CERTIFICADOSACADEMICOS', '2023-05-25 21:05:00'),
(6, '5023059', 'CERTIFICADOSACADEMICOS_AbisagBetsabetMoraMartinez1', 'AbisagBetsabetMoraMartinez', 'CERTIFICADOSACADEMICOS', '2023-05-25 21:05:00'),
(7, '5023059', 'CERTIFICADOSLABORALES_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'pdftest.pdf', '2023-05-25 21:05:00'),
(8, '5023059', 'CERTIFICADOSLABORALES_AbisagBetsabetMoraMartinez1', 'AbisagBetsabetMoraMartinez', 'pdftest2.pdf', '2023-05-25 21:05:00'),
(9, '5023059', 'CERTIFICADOEPS_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'CERTIFICADOEPS', '2023-05-25 21:05:00'),
(10, '5023059', 'CERTIFICADOCUENTABANCARIA_AbisagBetsabetMoraMartinez', 'AbisagBetsabetMoraMartinez', 'CERTIFICADOCUENTABANCARIA', '2023-05-25 21:05:00'),
(11, '1069766798', 'HOJADEVIDA_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'HOJADEVIDA', '2023-05-25 21:05:58'),
(12, '1069766798', 'DOCUMENTODEIDENTIDAD_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'DOCUMENTODEIDENTIDAD', '2023-05-25 21:05:58'),
(13, '1069766798', 'ANTECEDENTEPOLICIA_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'ANTECEDENTEPOLICIA', '2023-05-25 21:05:58'),
(14, '1069766798', 'ANTECEDENTEPROCURADURIA_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'ANTECEDENTEPROCURADURIA', '2023-05-25 21:05:58'),
(15, '1069766798', 'CERTIFICADOSACADEMICOS_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'CERTIFICADOSACADEMICOS', '2023-05-25 21:05:58'),
(16, '1069766798', 'CERTIFICADOSACADEMICOS_JhoanManuelDuarteVillalobos1', 'JhoanManuelDuarteVillalobos', 'CERTIFICADOSACADEMICOS', '2023-05-25 21:05:58'),
(17, '1069766798', 'CERTIFICADOSLABORALES_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'pdftest.pdf', '2023-05-25 21:05:58'),
(18, '1069766798', 'CERTIFICADOSLABORALES_JhoanManuelDuarteVillalobos1', 'JhoanManuelDuarteVillalobos', 'pdftest2.pdf', '2023-05-25 21:05:58'),
(19, '1069766798', 'CERTIFICADOEPS_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'CERTIFICADOEPS', '2023-05-25 21:05:58'),
(20, '1069766798', 'CERTIFICADOCUENTABANCARIA_JhoanManuelDuarteVillalobos', 'JhoanManuelDuarteVillalobos', 'CERTIFICADOCUENTABANCARIA', '2023-05-25 21:05:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exp_laboral_persona`
--

CREATE TABLE `exp_laboral_persona` (
  `id` int(10) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `empresa` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `funciones` varchar(1000) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_ac_persona`
--

CREATE TABLE `formacion_ac_persona` (
  `id` int(10) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `institucion` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(10) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `idiomas` varchar(200) NOT NULL,
  `Aptitudes-habili` varchar(500) NOT NULL,
  `conoci_informa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `cedula`, `celular`, `correo`, `direccion`, `idiomas`, `Aptitudes-habili`, `conoci_informa`) VALUES
(1, 'JHOAN', '112', '21312', 'johan@jhoan.com', 'as', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referen_persona`
--

CREATE TABLE `referen_persona` (
  `id` int(10) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombre_ref` varchar(100) NOT NULL,
  `celular_ref` varchar(15) NOT NULL,
  `parentesco` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos_persona`
--
ALTER TABLE `archivos_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exp_laboral_persona`
--
ALTER TABLE `exp_laboral_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formacion_ac_persona`
--
ALTER TABLE `formacion_ac_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referen_persona`
--
ALTER TABLE `referen_persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos_persona`
--
ALTER TABLE `archivos_persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `exp_laboral_persona`
--
ALTER TABLE `exp_laboral_persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formacion_ac_persona`
--
ALTER TABLE `formacion_ac_persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `referen_persona`
--
ALTER TABLE `referen_persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
