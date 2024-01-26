-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 19:33:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estancias1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`) VALUES
(1, 'Control Escolar'),
(2, 'Prácticas Profesionales'),
(3, 'Servicio Social'),
(4, 'Dirección'),
(5, 'Promocion Cultural y Deportiva'),
(6, 'Prefectura'),
(7, 'Orientación Educativa'),
(8, 'Cordinacion de Carreras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titular` varchar(100) NOT NULL,
  `fecha` varchar(11) NOT NULL,
  `descripcion` text NOT NULL,
  `cuerpo` text NOT NULL,
  `imagen1` varchar(50) NOT NULL,
  `imagen2` varchar(50) DEFAULT NULL,
  `imagen3` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titular`, `fecha`, `descripcion`, `cuerpo`, `imagen1`, `imagen2`, `imagen3`, `id_usuario`, `id_departamento`) VALUES
(6, 'Titular', '21/07/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi accumsan pharetra ullamcorper. Curabitur aliquam eleifend dolor, quis venenatis tellus laoreet ac. Quisque euismod velit arcu. Donec porttitor aliquet mauris sed pulvinar. Maecenas eu lacus et purus maximus sagittis. Sed fermentum sed arcu nec accumsan. Sed sed risus mollis, ultricies eros eget, imperdiet lectus. Duis nec est lacus. Fusce eu felis in ligula ullamcorper condimentum sit amet id lorem. Fusce tincidunt eleifend pretium. Maecenas quis posuere libero. Sed dictum, turpis rutrum ullamcorper ultricies, nulla ipsum euismod mauris, non ornare velit odio quis sapien. Praesent pulvinar hendrerit congue. Vivamus lacinia interdum tempor. Morbi euismod dolor ante, ut semper purus elementum imperdiet. Aenean velit mauris, molestie ac tellus et, egestas porttitor ex.\r\nIn consectetur nunc diam. Sed commodo scelerisque leo sed iaculis. Aliquam ornare nisi lacus, id tincidunt dui hendrerit sit amet. Nulla eleifend mollis ipsum, ut luctus ligula viverra et. Nam eget turpis orci. Sed lobortis, orci nec rutrum semper, leo nisi mollis turpis, quis faucibus enim libero ut nisi. Duis vehicula turpis vitae enim ultrices, sit amet molestie ipsum auctor. Etiam at lectus a massa sagittis posuere. Sed in tincidunt leo. Suspendisse felis felis, pharetra a ullamcorper nec, pharetra at leo. Aliquam egestas nunc nunc, vitae blandit mi sodales eu. Integer diam ligula, sagittis at arcu eu, vulputate feugiat ipsum. Nam facilisis ut quam vel lobortis. Nullam maximus condimentum urna. Donec congue, orci sit amet suscipit convallis, risus mauris aliquam mauris, ac rhoncus eros mi nec sapien.', 'public/imagenes/image 2.png', 'public/imagenes/image 3.png', 'public/imagenes/image 4.png', 2, 1),
(7, 'Titular', '21/07/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi accumsan pharetra ullamcorper. Curabitur aliquam eleifend dolor, quis venenatis tellus laoreet ac. Quisque euismod velit arcu. Donec porttitor aliquet mauris sed pulvinar. Maecenas eu lacus et purus maximus sagittis. Sed fermentum sed arcu nec accumsan. Sed sed risus mollis, ultricies eros eget, imperdiet lectus. Duis nec est lacus. Fusce eu felis in ligula ullamcorper condimentum sit amet id lorem. Fusce tincidunt eleifend pretium. Maecenas quis posuere libero. Sed dictum, turpis rutrum ullamcorper ultricies, nulla ipsum euismod mauris, non ornare velit odio quis sapien. Praesent pulvinar hendrerit congue. Vivamus lacinia interdum tempor. Morbi euismod dolor ante, ut semper purus elementum imperdiet. Aenean velit mauris, molestie ac tellus et, egestas porttitor ex.\r\nIn consectetur nunc diam. Sed commodo scelerisque leo sed iaculis. Aliquam ornare nisi lacus, id tincidunt dui hendrerit sit amet. Nulla eleifend mollis ipsum, ut luctus ligula viverra et. Nam eget turpis orci. Sed lobortis, orci nec rutrum semper, leo nisi mollis turpis, quis faucibus enim libero ut nisi. Duis vehicula turpis vitae enim ultrices, sit amet molestie ipsum auctor. Etiam at lectus a massa sagittis posuere. Sed in tincidunt leo. Suspendisse felis felis, pharetra a ullamcorper nec, pharetra at leo. Aliquam egestas nunc nunc, vitae blandit mi sodales eu. Integer diam ligula, sagittis at arcu eu, vulputate feugiat ipsum. Nam facilisis ut quam vel lobortis. Nullam maximus condimentum urna. Donec congue, orci sit amet suscipit convallis, risus mauris aliquam mauris, ac rhoncus eros mi nec sapien.', 'public/imagenes/image 2.png', 'public/imagenes/image 3.png', '', 4, 1),
(12, 'Titular', '21/07/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi accumsan pharetra ullamcorper. Curabitur aliquam eleifend dolor, quis venenatis tellus laoreet ac. Quisque euismod velit arcu. Donec porttitor aliquet mauris sed pulvinar. Maecenas eu lacus et purus maximus sagittis. Sed fermentum sed arcu nec accumsan. Sed sed risus mollis, ultricies eros eget, imperdiet lectus. Duis nec est lacus. Fusce eu felis in ligula ullamcorper condimentum sit amet id lorem. Fusce tincidunt eleifend pretium. Maecenas quis posuere libero. Sed dictum, turpis rutrum ullamcorper ultricies, nulla ipsum euismod mauris, non ornare velit odio quis sapien. Praesent pulvinar hendrerit congue. Vivamus lacinia interdum tempor. Morbi euismod dolor ante, ut semper purus elementum imperdiet. Aenean velit mauris, molestie ac tellus et, egestas porttitor ex.', 'public/imagenes/image 3.png', NULL, NULL, 2, 2),
(15, 'edgar', '21/07/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'public/imagenes/image 2.png', NULL, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(2, 'Usuario admin'),
(1, 'Usuario publicador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_paterno_usuario` varchar(50) NOT NULL,
  `apellido_matero_usuario` varchar(50) DEFAULT NULL,
  `contraseña_usuario` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `apellido_paterno_usuario`, `apellido_matero_usuario`, `contraseña_usuario`, `id_rol`, `id_departamento`) VALUES
(2, 'Edgar', 'Hernandez', NULL, 'edgar2511', 2, 1),
(4, 'Edgar2', 'Rodriguez', NULL, 'edgar2511', 1, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`),
  ADD KEY `rol_2` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
