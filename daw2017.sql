-- Suazo Leonardo Ezequiel
-- DAW 2017 - UNPSJB
-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2017 a las 15:09:39
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE SCHEMA IF NOT EXISTS `i6000723_tenis`;
USE `i6000723_tenis`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `daw2017`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE IF NOT EXISTS `cancha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ubicacion` int(11) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `superficie` int(11) DEFAULT NULL,
  `disponibilidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ubicacion_cancha_idx` (`ubicacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`id`, `nombre`, `ubicacion`, `capacidad`, `superficie`, `disponibilidad`) VALUES
(1, 'Lawn Tennis Club', 1, 5500, 250, '18 a 23hs'),
(2, 'El Abierto Club de Tenis', 1, 6000, 350, '8 a 17hs'),
(3, 'Club Belgrano', 1, 3000, 240, '8 a 21hs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='	' AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Buenos Aires'),
(2, 'Monaco'),
(3, 'Basilea'),
(4, 'Hamburgo'),
(5, 'Wiener Neustadt'),
(6, 'Medugorje'),
(7, 'Haskovo'),
(8, 'Lausana'),
(9, 'Rocourt'),
(10, 'Lincoln'),
(11, 'Gijón'),
(12, 'Tandil'),
(13, 'Belgrado'),
(14, 'San Francisco'),
(15, 'Johannesburgo'),
(16, 'Le Mans'),
(17, 'San Pablo'),
(18, 'Glasgow'),
(19, 'Greensboro'),
(20, 'Grande-Synthe'),
(21, 'Valasske'),
(22, 'Castellón de la plana'),
(23, 'Canbella'),
(24, 'Lisboa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `archivo` varchar(254) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_archivo_idx` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `fecha`, `archivo`, `tipo`) VALUES
(1, '2017-11-10 00:00:00', '1.mp4', 2),
(2, '2017-11-10 00:00:00', '3.png', 1),
(3, '2017-11-10 00:00:00', '4.jpg', 1),
(4, '2017-11-10 00:00:00', '2.mp4', 2),
(5, '2017-11-10 00:00:00', '5.jpg', 1),
(6, '2017-11-10 00:00:00', '6.jpg', 1),
(7, '2017-11-10 00:00:00', '7.jpg', 1),
(8, NULL, '8.jpg', 1),
(9, NULL, '9.jpg', 1),
(10, NULL, '10.jpg', 1),
(11, NULL, '11.jpg', 1),
(12, NULL, '12.jpg', 1),
(13, NULL, '13.jpg', 1),
(14, NULL, '14.jpg', 1),
(15, NULL, '15.jpg', 1),
(16, NULL, '16.jpg', 1),
(17, NULL, '17.jpg', 1),
(18, NULL, '18.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_partido`
--

CREATE TABLE IF NOT EXISTS `contenido_partido` (
  `partido` int(11) NOT NULL,
  `contenido` int(11) NOT NULL,
  PRIMARY KEY (`partido`,`contenido`),
  KEY `fk_contenido_multimedia_idx` (`contenido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido_partido`
--

INSERT INTO `contenido_partido` (`partido`, `contenido`) VALUES
(1, 1),
(1, 2),
(1, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(2, 8),
(2, 9),
(3, 10),
(3, 11),
(5, 12),
(5, 13),
(5, 14),
(6, 15),
(6, 16),
(7, 17),
(7, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_partido`
--

CREATE TABLE IF NOT EXISTS `estado_partido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estado_partido`
--

INSERT INTO `estado_partido` (`id`, `nombre`) VALUES
(1, 'En juego'),
(2, 'Finalizado'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juez`
--

CREATE TABLE IF NOT EXISTS `juez` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `nacimiento` datetime DEFAULT NULL,
  `ciudad_nacimiento` int(11) DEFAULT NULL,
  `pais_nacimiento` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudad_nacimiento_juez_idx` (`ciudad_nacimiento`),
  KEY `fk_pais_nacimiento_juez_idx` (`pais_nacimiento`),
  KEY `fk_tipo_juez_idx` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `juez`
--

INSERT INTO `juez` (`id`, `nombre`, `apellido`, `nacimiento`, `ciudad_nacimiento`, `pais_nacimiento`, `tipo`) VALUES
(1, 'Juan Pablo', 'Perez', '1976-10-21 00:00:00', 12, 13, 1),
(2, 'Albert', 'Wiliams', '1966-05-05 00:00:00', 16, 82, 1),
(3, 'Robert', 'Anderson', '1960-09-21 00:00:00', 16, 82, 1),
(4, 'Marly', 'Rain', '1975-10-01 00:00:00', 3, 208, 2),
(5, 'Joan Pablo', 'Reus', '1961-03-02 00:00:00', 17, 33, 2),
(6, 'Jake', 'Garner ', '1977-05-15 00:00:00', 10, 75, 1),
(7, 'Carlos', 'Ramos', '1967-05-15 00:00:00', 24, 177, 1),
(8, 'John', 'Williams', '1963-05-15 00:00:00', 14, 75, 2),
(9, 'Stella', 'Robert', '1960-05-15 00:00:00', 18, 180, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juez_partido`
--

CREATE TABLE IF NOT EXISTS `juez_partido` (
  `juez` int(11) NOT NULL,
  `partido` int(11) NOT NULL,
  PRIMARY KEY (`juez`,`partido`),
  KEY `fk_partido_juez_idx` (`partido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juez_partido`
--

INSERT INTO `juez_partido` (`juez`, `partido`) VALUES
(1, 1),
(5, 1),
(9, 1),
(4, 2),
(8, 2),
(9, 2),
(6, 3),
(9, 3),
(3, 4),
(5, 4),
(8, 4),
(3, 5),
(5, 5),
(8, 5),
(2, 6),
(4, 6),
(9, 6),
(1, 7),
(8, 7),
(9, 7),
(4, 8),
(5, 8),
(7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `nacimiento` datetime DEFAULT NULL,
  `ciudad_nacimiento` int(11) DEFAULT NULL,
  `pais_nacimiento` int(11) DEFAULT NULL,
  `raking_actual` int(11) DEFAULT NULL,
  `preclasificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudad_nacimiento_jugador_idx` (`ciudad_nacimiento`),
  KEY `fk_pais_nacimiento_jugador_idx` (`pais_nacimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `apellido`, `nacimiento`, `ciudad_nacimiento`, `pais_nacimiento`, `raking_actual`, `preclasificacion`) VALUES
(1, 'Rafael', 'Nadal', '1986-06-03 00:00:00', 2, 73, 1, 1),
(2, 'Roger', 'Federer', '1981-08-08 00:00:00', 3, 208, 2, 2),
(3, 'Alexander', 'Zverev', '1997-04-20 00:00:00', 4, 4, 3, 3),
(4, 'Dominic', 'Thiem', '1993-09-03 00:00:00', 5, 17, 4, 4),
(5, 'Marin', 'Cilic', '1988-09-28 00:00:00', 6, 30, 5, 5),
(6, 'Grigor', 'Dimitrov', '1991-05-16 00:00:00', 7, 35, 6, 6),
(7, 'Stan', 'Wawrinka', '1985-03-28 00:00:00', 8, 208, 7, 7),
(8, 'David', 'Goffin', '1990-12-07 00:00:00', 9, 24, 8, 8),
(9, 'Jack', 'Sock', '1992-09-24 00:00:00', 10, 75, 9, 9),
(10, 'Pablo', 'Carreño', '1991-06-12 00:00:00', 11, 73, 10, 10),
(11, 'Juan Martín', 'Del Potro', '1988-09-23 00:00:00', 12, 13, 11, 11),
(12, 'Novak', 'Djokovic', '1987-05-22 00:00:00', 13, 197, 12, 12),
(13, 'Sam', 'Querrey', '1987-10-07 00:00:00', 14, 75, 13, 13),
(14, 'Kevin', 'Anderson', '1986-05-18 00:00:00', 15, 205, 14, 14),
(15, 'Jo-Wilfried', 'Tsonga', '1985-04-17 00:00:00', 16, 82, 15, 15),
(16, 'Andy', 'Murray', '1987-05-12 00:00:00', 18, 180, 16, 16),
(17, 'John', 'Isner', '1985-04-26 00:00:00', 19, 75, 17, 17),
(18, 'Lucas', 'Pouille', '1994-02-23 00:00:00', 20, 82, 18, 18),
(19, 'Tomas', 'Berdych', '1985-09-17 00:00:00', 21, 45, 19, 19),
(20, 'Roberto', 'Bautista', '1988-04-14 00:00:00', 22, 73, 20, 20),
(21, 'Nick', 'Kyrgios', '1995-04-27 00:00:00', 23, 16, 21, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `iso`, `nombre`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `jugador_uno` int(11) DEFAULT NULL,
  `jugador_dos` int(11) DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  `instancia` int(11) DEFAULT NULL,
  `cancha` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jugador_uno_idx` (`jugador_uno`),
  KEY `fk_jugador_dos_idx` (`jugador_dos`),
  KEY `fk_instancia_partido_idx` (`instancia`),
  KEY `fk_cancha_partido_idx` (`cancha`),
  KEY `fk_estado_partido_idx` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `fecha`, `jugador_uno`, `jugador_dos`, `resultado`, `instancia`, `cancha`, `estado`) VALUES
(1, '2017-11-11 12:30:00', 2, 11, '6-6-5,7-4-3', 3, 1, 1),
(2, '2017-11-11 12:31:00', 1, 21, '6-6-5,7-4-3', 3, 3, 1),
(3, '2017-11-11 12:29:00', 4, 5, '6-6-5,7-4-3', 3, 2, 1),
(4, '2017-11-08 15:30:00', 11, 12, '6-6-5,7-4-3', 4, 1, 2),
(5, '2017-11-03 19:00:00', 8, 11, '6-6-5,7-4-3', 5, 2, 2),
(6, '2017-11-03 19:00:00', 3, 19, '6-6-5,7-4-3', 5, 3, 2),
(7, '2017-11-03 19:00:00', 6, 16, '6-6-5,7-4-3', 5, 2, 2),
(8, '2017-11-03 19:00:00', 9, 7, '6-6-5,7-4-3', 5, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contenido`
--

CREATE TABLE IF NOT EXISTS `tipo_contenido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_contenido`
--

INSERT INTO `tipo_contenido` (`id`, `nombre`) VALUES
(1, 'Imagen'),
(2, 'Video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_instancia`
--

CREATE TABLE IF NOT EXISTS `tipo_instancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_instancia`
--

INSERT INTO `tipo_instancia` (`id`, `nombre`) VALUES
(1, 'Final'),
(2, 'Semifinal'),
(3, 'Cuartos'),
(4, 'Octavos'),
(5, 'Ronda 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_juez`
--

CREATE TABLE IF NOT EXISTS `tipo_juez` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_juez`
--

INSERT INTO `tipo_juez` (`id`, `nombre`) VALUES
(1, 'Principal'),
(2, 'Linea');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD CONSTRAINT `fk_ubicacion_cancha` FOREIGN KEY (`ubicacion`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `fk_tipo_archivo` FOREIGN KEY (`tipo`) REFERENCES `tipo_contenido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contenido_partido`
--
ALTER TABLE `contenido_partido`
  ADD CONSTRAINT `fk_contenido_multimedia` FOREIGN KEY (`contenido`) REFERENCES `contenido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_multimedia` FOREIGN KEY (`partido`) REFERENCES `partido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `juez`
--
ALTER TABLE `juez`
  ADD CONSTRAINT `fk_ciudad_nacimiento_juez` FOREIGN KEY (`ciudad_nacimiento`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pais_nacimiento_juez` FOREIGN KEY (`pais_nacimiento`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_juez` FOREIGN KEY (`tipo`) REFERENCES `tipo_juez` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `juez_partido`
--
ALTER TABLE `juez_partido`
  ADD CONSTRAINT `fk_juez_partido` FOREIGN KEY (`juez`) REFERENCES `juez` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_juez` FOREIGN KEY (`partido`) REFERENCES `partido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `fk_ciudad_nacimiento_jugador` FOREIGN KEY (`ciudad_nacimiento`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pais_nacimiento_jugador` FOREIGN KEY (`pais_nacimiento`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `fk_cancha_partido` FOREIGN KEY (`cancha`) REFERENCES `cancha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estado_partido` FOREIGN KEY (`estado`) REFERENCES `estado_partido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instancia_partido` FOREIGN KEY (`instancia`) REFERENCES `tipo_instancia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jugador_dos_partido` FOREIGN KEY (`jugador_dos`) REFERENCES `jugador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jugador_uno_partido` FOREIGN KEY (`jugador_uno`) REFERENCES `jugador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
