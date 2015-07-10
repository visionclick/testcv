-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2015 a las 13:06:45
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `testcv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publicado` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_noticias`
--

CREATE TABLE IF NOT EXISTS `comentarios_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario_id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `identificador` varchar(32) NOT NULL,
  `ancho` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `tamano` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `ruta`, `nombre`, `identificador`, `ancho`, `alto`, `tamano`) VALUES
(1, 'fotos/nueva_1.jpg', '', '1', 420, 280, 34),
(2, 'fotos/cusos.jpg', 'cusos', '', 420, 280, 34),
(3, 'fotos/marketing.jpg', 'marketing', '', 420, 280, 34),
(4, 'fotos/usuarios/colegio-don-juan-diaz.jpg', 'colegio-don-juan-diaz', '', 150, 150, 11),
(5, 'fotos/usuarios/rafa-campos.jpg', 'rafa-campos', '', 420, 280, 34),
(6, 'fotos/nueva_6.jpg', '', '', 280, 187, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_noticias`
--

CREATE TABLE IF NOT EXISTS `fotos_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `fotos_noticias`
--

INSERT INTO `fotos_noticias` (`id`, `foto_id`, `noticia_id`) VALUES
(2, 6, 1),
(3, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_usuariosnoticias`
--

CREATE TABLE IF NOT EXISTS `fotos_usuariosnoticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_id` int(11) NOT NULL,
  `usuarionoticia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `fotos_usuariosnoticias`
--

INSERT INTO `fotos_usuariosnoticias` (`id`, `foto_id`, `usuarionoticia_id`) VALUES
(1, 4, 1),
(2, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `mensaje` text NOT NULL,
  `ip` varchar(32) NOT NULL,
  `useragent` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `created`, `mensaje`, `ip`, `useragent`) VALUES
(0, '2015-07-09 11:02:35', 'Acceso correcto de admin al panel de control.', '192.168.1.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36'),
(0, '2015-07-10 06:35:36', 'Acceso correcto de admin al panel de control.', '192.168.1.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36'),
(0, '2015-07-10 11:04:40', 'Acceso correcto de admin al panel de control.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destacada` tinyint(1) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `titular` varchar(300) NOT NULL,
  `texto` text NOT NULL,
  `identificador` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `destacada`, `autor`, `fecha`, `titular`, `texto`, `identificador`) VALUES
(1, 1, '0', '2015-07-10', 'Mi titular 1', '<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>\n\n<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>\n\n<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>\n', ''),
(2, 0, '0', '2015-07-03', 'Nuevo Titular', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum rerum perspiciatis expedita laudantium, animi tempore distinctio alias ducimus quo, autem beatae dolorem laboriosam quia accusamus reiciendis. Aspernatur accusantium labore similique.&nbsp;&nbsp; &nbsp;</p>\n', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_usuariosnoticias`
--

CREATE TABLE IF NOT EXISTS `noticias_usuariosnoticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_id` int(11) NOT NULL,
  `usuarionoticia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias_usuariosnoticias`
--

INSERT INTO `noticias_usuariosnoticias` (`id`, `noticia_id`, `usuarionoticia_id`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilegio` text CHARACTER SET latin1 NOT NULL,
  `identificador` varchar(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identificador` (`identificador`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `privilegio`, `identificador`) VALUES
(1, 'Acceso a edición de textos.', 'textos'),
(2, 'Edición en linea', 'edicion_online'),
(3, 'Creacion de páginas', 'creacion_pagina'),
(4, 'Eliminar un texto', 'eliminar_texto'),
(5, 'Eliminar una pagina.', 'eliminar_pagina'),
(6, 'Sección de usuarios', 'usuarios'),
(7, 'Creacion de usuario', 'creacion_usuario'),
(8, 'Eliminar un usuario', 'eliminar_usuario'),
(9, 'Configuración de la página', 'configuracion'),
(10, 'Creción de Productos', 'creacion_producto'),
(11, 'Creción de Categoria', 'creacion_categoria'),
(12, 'Sección de Productos', 'productos'),
(13, 'Eliminar una categoria', 'eliminar_categoria'),
(14, 'Crear una caracteristica', 'creacion_caracteristica'),
(15, 'Eliminar una caracteristica', 'eliminar_caracteristica'),
(16, 'Eliminar producto', 'eliminar_producto'),
(17, 'Crear una noticia', 'crear_noticia'),
(18, 'Eliminar noticia', 'Eliminar_noticia'),
(19, 'Creacion de Noticias', 'noticias'),
(20, 'idioma producto', 'idioma_producto'),
(21, 'packs', 'packs'),
(22, 'videos', 'videos'),
(23, 'archivos', 'archivos'),
(24, 'ofertas', 'ofertas'),
(25, 'categoriaofertas', 'categoriaofertas'),
(26, 'fototexto', 'fototexto'),
(27, 'categoriasguias', 'categoriasguias'),
(28, 'guias', 'guias'),
(29, 'seopaginas', 'seopaginas'),
(30, 'identificadorTexto', 'identificadorTexto'),
(31, 'textoPrincipal', 'textoPrincipal'),
(32, 'orden_texto', 'orden_texto'),
(33, 'categorias_paginas', 'categorias_paginas'),
(34, 'identificador-Slider', 'identificador-Slider'),
(35, 'orden-slider', 'orden-slider'),
(36, 'textos-slider', 'textos-slider'),
(37, 'crear-texto', 'crear-texto'),
(38, 'eliminar-foto-comun', 'eliminar-foto-comun'),
(40, 'archivotexto', 'archivotexto'),
(41, 'template_paginas', 'template_paginas'),
(42, 'vista_paginas', 'vista_paginas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios_usuarios`
--

CREATE TABLE IF NOT EXISTS `privilegios_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `privilegio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`,`privilegio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=972 ;

--
-- Volcado de datos para la tabla `privilegios_usuarios`
--

INSERT INTO `privilegios_usuarios` (`id`, `usuario_id`, `privilegio_id`) VALUES
(945, 1, 15),
(946, 1, 16),
(943, 1, 13),
(944, 1, 14),
(939, 1, 9),
(940, 1, 10),
(941, 1, 11),
(942, 1, 12),
(949, 1, 19),
(948, 1, 18),
(950, 1, 20),
(947, 1, 17),
(951, 1, 21),
(952, 1, 22),
(953, 1, 23),
(954, 1, 24),
(955, 1, 25),
(956, 1, 26),
(957, 1, 27),
(958, 1, 28),
(959, 1, 29),
(938, 1, 8),
(960, 1, 30),
(961, 1, 31),
(937, 1, 7),
(962, 1, 32),
(936, 1, 6),
(934, 1, 4),
(935, 1, 5),
(963, 1, 33),
(964, 1, 34),
(965, 1, 35),
(933, 1, 3),
(932, 1, 2),
(966, 1, 36),
(931, 1, 1),
(967, 1, 37),
(968, 1, 38),
(969, 1, 40),
(970, 1, 41),
(971, 1, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `extra`) VALUES
(1, 'admin', 'mrpCT7c/rzDf2', 'josecarlos@visionclick.es', 'Cuenta por defecto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosnoticias`
--

CREATE TABLE IF NOT EXISTS `usuariosnoticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuariosnoticias`
--

INSERT INTO `usuariosnoticias` (`id`, `nombre`, `description`, `email`) VALUES
(1, 'Juan Diaz', '<p>Profesora de .. para los alumnos de ...</p>\n', ''),
(2, 'Rafa Campos', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit tempore optio quae expedita maiores error repellendus ipsam, accusamus necessitatibus voluptas molestiae ipsum quas ducimus? Perspiciatis, sapiente temporibus vitae ex tempore</p>\n\n<p>&nbsp;</p>\n', ''),
(3, 'Test CV', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
