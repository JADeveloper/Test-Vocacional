-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2021 at 02:47 AM
-- Server version: 10.3.24-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u175650555_alex`
--

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `carrera` varchar(45) NOT NULL COMMENT 'Carrera a cursar',
  `link` text DEFAULT NULL COMMENT 'Link para página de la carrera',
  `activo` tinyint(1) NOT NULL DEFAULT 1 COMMENT '(1=Activo,0=Inactivo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id`, `carrera`, `link`, `activo`) VALUES
(1, 'COMPUTACION E INFORMÁTICA', 'http://www.iestpffaa.edu.pe/Carrera/Index/1/1', 1),
(2, 'CONSTRUCCIÓN CIVIL', 'http://www.iestpffaa.edu.pe/Carrera/Index/2/1', 1),
(3, 'ELECTRÓNICA INDUSTRIAL', 'http://www.iestpffaa.edu.pe/Carrera/Index/3/1', 1),
(4, 'MECÁNICA AUTOMOTRIZ', 'http://www.iestpffaa.edu.pe/Carrera/Index/4/1', 1),
(5, 'MECÁNICA DE PRODUCCIÓN', 'http://www.iestpffaa.edu.pe/Carrera/Index/5/1', 1),
(6, 'MANTENIMIENTO DE MAQUINARIAS', 'http://www.iestpffaa.edu.pe/Carrera/Index/6/1', 1),
(7, 'ADMINISTRACIÓN DE RECURSOS FORESTALES', 'http://www.iestpffaa.edu.pe/Carrera/Index/7/1', 1),
(8, 'ADMINISTRACIÓN HOTELERA', 'http://www.iestpffaa.edu.pe/Carrera/Index/8/1', 1),
(9, 'ANÁLISIS DE SISTEMAS', 'http://www.iestpffaa.edu.pe/Carrera/Index/9/1', 1),
(10, 'EXPLOTACIÓN MINERA', 'http://www.iestpffaa.edu.pe/Carrera/Index/10/1', 1),
(11, 'INDUSTRIAS ALIMENTARIAS', 'http://www.iestpffaa.edu.pe/Carrera/Index/11/1', 1),
(12, 'TOPOGRAFÍA', 'http://www.iestpffaa.edu.pe/Carrera/Index/12/1', 1),
(13, 'Ingenieria Especial', 'https://es.wikipedia.org/wiki/Ingenier%C3%ADa_aeroespacial', 1);

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL COMMENT 'Identificador',
  `carrera_id` int(11) DEFAULT NULL COMMENT 'Referencia a Carreras',
  `aptitud` text DEFAULT NULL COMMENT 'Aptitud',
  `pregunta` text DEFAULT NULL COMMENT 'Pregunta del test',
  `alternativa1` text DEFAULT NULL COMMENT 'Alternativa #1',
  `alternativa2` text DEFAULT NULL COMMENT 'Alternativa #2',
  `alternativa3` text DEFAULT NULL COMMENT 'Alternativa #3',
  `alternativa4` text DEFAULT NULL COMMENT 'Alternativa #4',
  `eliminada` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Eliminada(0=No,1=Si)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`id`, `carrera_id`, `aptitud`, `pregunta`, `alternativa1`, `alternativa2`, `alternativa3`, `alternativa4`, `eliminada`) VALUES
(1, 1, 'REALISTA', '¿Cuál de las siguientes asignaturas o materias te gusta más?', 'Español y Literatura', 'Matemáticas', 'Artes (música, pintura, dibujo, teatro, etc.)', 'Desarrollo Humano (valores, ética, filosofía, formación cívica)', 0),
(2, 2, 'REALISTA', '¿Cuál de las siguientes asignaturas o materias se te hace más difícil?', 'Español y Literatura', 'Física, Biología o Química', 'Metodología de la Investigación', 'Computación y Multimedia', 0),
(3, 3, 'REALISTA', '¿En cuál de las siguientes opciones necesitas ayuda?', 'Solucionar problemas personales', 'Mejorar los hábitos de estudio', 'Conocer sobre mecanismos de financiamiento o becas para estudiar', 'Artes (música, pintura, dibujo, teatro, etc.)', 0),
(4, 4, 'REALISTA', 'Selecciona una aptitud que te gustaria desarrollar', 'Inclinación a la lectura y al estudio', 'Hablar frente a un grupo', 'Honestidad, integridad, respeto a las normas', 'Dinamismo, entusiasmo', 0),
(5, 5, 'REALISTA', 'Selecciona una aptitud que tienes bien desarrollada', 'Organizar y dirigir actividades', 'Capacidad numérica', 'Aptitudes musicales, buen oido', 'Analizar para encontrar soluciones a problemas o situaciones', 0),
(6, 6, 'REALISTA', 'Te identificas más con:', 'Me gusta darle mantenimiento a los aparatos.', 'Trabajar como asistente social.', 'Trabajar en la mina', 'Ninguna de las anteriores', 0),
(7, 7, 'REALISTA', 'Te identificas más con:', 'Encontrar alternativas de solución ante un problema.', ' Ser asesor contable en una empresa reconocida', 'Me gusta el hacer maquetas.', 'Trabajar en una fundación orientada a personas marginadas.', 0),
(8, 8, 'REALISTA', 'Te identificas más con:', 'Investigar la historia y distintas culturas del ser humano.', 'Hacer que las cosas ocurran.', 'La poesía y la oratoria.', 'Ninguna de las anteriores', 0),
(9, 9, 'REALISTA', 'Te identificas más con:', 'Organizar un plan de distribución y venta de un gran almacén.', ' Me gusta hacer dibujos en programas de diseño en la computadora.', 'Ser extrovertido y conocer gente nueva.', 'Trabajar en oficina', 0),
(10, 10, 'REALISTA', 'Te identificas más con:', 'Encontrar explicaciones ante cada hecho o acontecimiento.', 'Asegurarme que mi equipo de trabajo tenga claras sus tareas.', 'Ir de excursión y ver monumentos.', 'Ninguna de las anteriores', 0),
(11, 11, 'REALISTA', 'Te identificas más con:', ' Me gusta salir de excursión al campo.', 'Las profesiones que se orientan a ayudar a otros.', 'Las ideas estructuradas y detalladas.', 'Saber qué comprar, negociar el precio adecuado y luego vender.', 0),
(12, 12, 'REALISTA', 'Te identificas más con:', 'Comunicarme con claridad y buena dicción.', 'Ser parte de los recursos humanos de una empresa.', 'Me gusta criar y cuidar animales.', 'Vincular conocimientos curriculares a la vida diaria de los alumnos.', 0),
(13, 1, 'INVESTIGACIÓN', 'Selecciona un valor que consideras más importante al pensar en un trabajo.', 'Esfuerzo', 'Honestidad', 'Tolerancia', 'Solidaridad', 0),
(14, 2, 'INVESTIGACIÓN', 'Selecciona una competencia que tienes mas desarrollada', 'Trabajo en Equipo', 'Confianza y seguridad', 'Perseverancia', 'Automotivación', 0),
(15, 3, 'INVESTIGACIÓN', 'Qué tanto te identifícas con: Ventas, gestión, persuación, comercialización, motivar, dirigir a otros, habilidad verbal', 'Mucho ', 'Poco ', 'A veces', 'Nada', 0),
(16, 4, 'INVESTIGACIÓN', 'Qué tanto te identifícas con: Procedimientos, sistemas, organización, informáticas, números, análisis de datos, finanzas', 'Mucho', 'Poco', 'A veces', 'Nada', 0),
(17, 5, 'INVESTIGACIÓN', 'Qué tanto te identifícas con: Pruebas, problemas abstractos, matemática, investigar, escribir, analizar, laboratorios', 'Mucho', 'Poco', 'A veces', 'Nada', 0),
(18, 6, 'INVESTIGACIÓN', 'Qué tanto te identificas con: Equipo, uso de herramientas, construir, reparar, Ingeniosidad mecánica, destreza, coordinación física', 'Mucho', 'Poco', 'A veces', 'Nada', 0),
(19, 7, 'INVESTIGACIÓN', 'Qué tanto te identifícas con: Enseñanza, capacidad verbal, cuidado de personas, asesoramiento, capacitación, escuchar.', 'Mucho', 'Poco', 'A veces', 'Nada', 0),
(20, 8, 'INVESTIGACIÓN', 'Qué tanto te identifícas con: Componer, actuar, escribir, crear arte visual, la creatividad, música, la expresión artística.', 'Mucho', 'Poco', 'A veces', 'Nada', 0),
(21, 9, 'INVESTIGACIÓN', 'Me ha resultado fácil entablar diálogos entre personas conflictivas.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(22, 10, 'INVESTIGACIÓN', 'Soy perseverante y constante en la consecución de mis metas. ', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(23, 11, 'INVESTIGACIÓN', 'Huyo de todo lo espiritual, porque me da aburrimiento.', 'Siempre', 'Casi Siempre', 'Rara vez', 'Nunca', 0),
(24, 12, 'INVESTIGACIÓN', 'Olvido poner las cosas en su sitio', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(25, 1, 'ARTISTA', 'Me considero una personas competente de enfrentar con calma, sensibilidad y de manera proactiva las manifestaciones emocionales de otras personas.', 'Siempre', 'Casi Siempre', 'Rara vez', 'Nunca', 0),
(26, 2, 'ARTISTA', 'Me considero una persona de muchas amistades.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(27, 3, 'ARTISTA', 'Prefiero estar sola que con gente.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(28, 4, 'ARTISTA', 'Puedo analizar la situación para tomar decisiones bajo presión, si así se presenta, y mi decisión usualmente es la correcta.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(29, 5, 'ARTISTA', 'Planifico y hago uso de la agenda.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(30, 6, 'ARTISTA', 'Me involucro en actividades de acción social y beneficiencia.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(31, 7, 'ARTISTA', 'Regularmente, otros se sienten inspirados y alentados después de hablar conmigo.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(32, 8, 'ARTISTA', 'Es difícil reconciliarme, tengo resentimientos persistentes', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(33, 9, 'ARTISTA', 'Cuando me comparo con otras personas, hay algunas cosas que envidio de ellas, sintiéndome algo inferior. ', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(34, 10, 'ARTISTA', 'Entró en pánico con facilidad ante cualquier situación.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(35, 11, 'ARTISTA', 'Cambio a menudo de amigos, sin razón dejó de ver a una persona que antes frecuentaba.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(36, 12, 'ARTISTA', 'Considero que los trajes oscuros son elegantes.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(37, 1, 'SOCIAL', 'Estoy preparado para asumir un trabajo difícil.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(38, 2, 'SOCIAL', 'Espero que otros me enseñen los caminos a seguir.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(39, 3, 'SOCIAL', 'He perdido interés en aspectos de mi vida que antes solía ser importantes para mí.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(40, 4, 'SOCIAL', 'Me gusta ver las formas en las nubes', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(41, 5, 'SOCIAL', 'Para un viaje o paseo hago equipajes minuciosos, estudias el itinerario, haces previsión para posibles accidentes.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(42, 6, 'SOCIAL', 'Disfruto con plenitud del tiempo y me alcanza para realizar lo que quiero.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(43, 7, 'SOCIAL', 'Lo espontáneo es un elemento esencial en mi vida.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(44, 8, 'SOCIAL', 'Suelo transformar los problemas en derrotas personales.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(45, 9, 'SOCIAL', 'Me resulta fácil hacer nuevas amistades.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(46, 10, 'SOCIAL', 'Soy capaz de pedir ayuda a las personas que más quiero', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(47, 11, 'SOCIAL', 'Puedo hacer que la mayoría vaya conmigo sin mucha dificultad', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(48, 12, 'SOCIAL', 'Cuando alguien del equipo completó una tarea, checas lo que hizo para asegurarte que lo hizo correctamente.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(49, 1, 'EMPRENDEDOR', 'Soy decidido en las cosas que hago en mi vida', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(50, 2, 'EMPRENDEDOR', 'Tengo habilidad para vender.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(51, 3, 'EMPRENDEDOR', 'Al unir un equipo de trabajo, busco enfocar su objetivo y obtener confianza.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(52, 4, 'EMPRENDEDOR', 'Es difícil terminar lo que empiezo, sobre todo los proyectos personales. ', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(53, 5, 'EMPRENDEDOR', 'Me encanta aprender cosas nuevas ', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(54, 6, 'EMPRENDEDOR', 'Soy una persona que se adapta ante cualquier cambio y circunstancia.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(55, 7, 'EMPRENDEDOR', 'Pido consejo cuando se requiere para tomar decisiones.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(56, 8, 'EMPRENDEDOR', 'Trabajo fácilmente con personas y grupos diversos.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(57, 9, 'EMPRENDEDOR', 'Cuando veo alguna necesidad propongo alguna iniciativa.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(58, 10, 'EMPRENDEDOR', 'Soy exitoso en las relaciones interpersonales.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(59, 11, 'EMPRENDEDOR', 'Cuando estoy molesto expreso mis sentimientos sin ofender a los demás.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0),
(60, 12, 'EMPRENDEDOR', 'Soy lo contrario a una persona conformista.', 'Siempre', 'Casi siempre', 'Rara vez', 'Nunca', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prueba`
--

CREATE TABLE `prueba` (
  `id` bigint(20) NOT NULL COMMENT 'Identificador',
  `usuario` int(11) DEFAULT NULL COMMENT 'Usuario',
  `fecha` date DEFAULT NULL COMMENT 'Fecha en la que realizo el test',
  `pregunta` int(11) DEFAULT NULL COMMENT 'Pregunta',
  `alternativa` int(11) DEFAULT NULL COMMENT 'Alternativa',
  `carrera_id` int(11) DEFAULT NULL COMMENT 'Carrera ',
  `anulado` tinyint(1) DEFAULT 0 COMMENT 'Anulado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prueba`
--

INSERT INTO `prueba` (`id`, `usuario`, `fecha`, `pregunta`, `alternativa`, `carrera_id`, `anulado`) VALUES
(1, 11, '2020-11-28', 1, 2, 1, 0),
(2, 11, '2020-11-28', 2, 2, 2, 0),
(3, 11, '2020-11-28', 3, 2, 3, 0),
(4, 11, '2020-11-28', 4, 2, 4, 0),
(5, 11, '2020-11-28', 5, 2, 5, 0),
(6, 11, '2020-11-28', 6, 2, 6, 0),
(7, 11, '2020-11-28', 7, 2, 7, 0),
(8, 11, '2020-11-28', 8, 3, 8, 0),
(9, 11, '2020-11-28', 9, 4, 9, 0),
(10, 11, '2020-11-28', 10, 3, 10, 0),
(11, 11, '2020-11-28', 11, 2, 11, 0),
(12, 11, '2020-11-28', 12, 2, 12, 0),
(13, 11, '2020-11-28', 13, 1, 1, 0),
(14, 11, '2020-11-28', 14, 2, 2, 0),
(15, 11, '2020-11-28', 15, 3, 3, 0),
(16, 11, '2020-11-28', 16, 2, 4, 0),
(17, 11, '2020-11-28', 17, 2, 5, 0),
(18, 11, '2020-11-28', 18, 2, 6, 0),
(19, 11, '2020-11-28', 19, 3, 7, 0),
(20, 11, '2020-11-28', 20, 3, 8, 0),
(21, 11, '2020-11-28', 21, 2, 9, 0),
(22, 11, '2020-11-28', 22, 3, 10, 0),
(23, 11, '2020-11-28', 23, 2, 11, 0),
(24, 11, '2020-11-28', 24, 3, 12, 0),
(25, 11, '2020-11-28', 25, 2, 1, 0),
(26, 11, '2020-11-28', 26, 2, 2, 0),
(27, 11, '2020-11-28', 27, 2, 3, 0),
(28, 11, '2020-11-28', 28, 2, 4, 0),
(29, 11, '2020-11-28', 29, 1, 5, 0),
(30, 11, '2020-11-28', 30, 2, 6, 0),
(31, 11, '2020-11-28', 31, 3, 7, 0),
(32, 11, '2020-11-28', 32, 3, 8, 0),
(33, 11, '2020-11-28', 33, 3, 9, 0),
(34, 11, '2020-11-28', 34, 2, 10, 0),
(35, 11, '2020-11-28', 35, 3, 11, 0),
(36, 11, '2020-11-28', 36, 2, 12, 0),
(37, 11, '2020-11-28', 37, 3, 1, 0),
(38, 11, '2020-11-28', 38, 2, 2, 0),
(39, 11, '2020-11-28', 39, 3, 3, 0),
(40, 11, '2020-11-28', 40, 2, 4, 0),
(41, 11, '2020-11-28', 41, 2, 5, 0),
(42, 11, '2020-11-28', 42, 3, 6, 0),
(43, 11, '2020-11-28', 43, 2, 7, 0),
(44, 11, '2020-11-28', 44, 1, 8, 0),
(45, 11, '2020-11-28', 45, 3, 9, 0),
(46, 11, '2020-11-28', 46, 3, 10, 0),
(47, 11, '2020-11-28', 47, 2, 11, 0),
(48, 11, '2020-11-28', 48, 1, 12, 0),
(49, 11, '2020-11-28', 49, 2, 1, 0),
(50, 11, '2020-11-28', 50, 2, 2, 0),
(51, 11, '2020-11-28', 51, 3, 3, 0),
(52, 11, '2020-11-28', 52, 2, 4, 0),
(53, 11, '2020-11-28', 53, 3, 5, 0),
(54, 11, '2020-11-28', 54, 2, 6, 0),
(55, 11, '2020-11-28', 55, 2, 7, 0),
(56, 11, '2020-11-28', 56, 2, 8, 0),
(57, 11, '2020-11-28', 57, 2, 9, 0),
(58, 11, '2020-11-28', 58, 1, 10, 0),
(59, 11, '2020-11-28', 59, 2, 11, 0),
(60, 11, '2020-11-28', 60, 3, 12, 0),
(61, 11, '2020-11-28', NULL, 3, 1, 0),
(62, 7, '2020-11-28', 1, 1, 1, 0),
(63, 7, '2020-11-28', 2, 3, 2, 0),
(64, 7, '2020-11-28', 3, 1, 3, 0),
(65, 7, '2020-11-28', 4, 2, 4, 0),
(66, 7, '2020-11-28', 5, 3, 5, 0),
(67, 7, '2020-11-28', 6, 2, 6, 0),
(68, 7, '2020-11-28', 7, 3, 7, 0),
(69, 7, '2020-11-28', 8, 3, 8, 0),
(70, 7, '2020-11-28', 9, 2, 9, 0),
(71, 7, '2020-11-28', 10, 3, 10, 0),
(72, 7, '2020-11-28', 11, 4, 11, 0),
(73, 7, '2020-11-28', 12, 3, 12, 0),
(74, 7, '2020-11-28', 13, 1, 1, 0),
(75, 7, '2020-11-28', 14, 3, 2, 0),
(76, 7, '2020-11-28', 15, 2, 3, 0),
(77, 7, '2020-11-28', 16, 3, 4, 0),
(78, 7, '2020-11-28', 17, 3, 5, 0),
(79, 7, '2020-11-28', 18, 1, 6, 0),
(80, 7, '2020-11-28', 19, 4, 7, 0),
(81, 7, '2020-11-28', 20, 2, 8, 0),
(82, 7, '2020-11-28', 21, 2, 9, 0),
(83, 7, '2020-11-28', 22, 1, 10, 0),
(84, 7, '2020-11-28', 23, 4, 11, 0),
(85, 7, '2020-11-28', 24, 2, 12, 0),
(86, 7, '2020-11-28', 25, 3, 1, 0),
(87, 7, '2020-11-28', 26, 2, 2, 0),
(88, 7, '2020-11-28', 27, 3, 3, 0),
(89, 7, '2020-11-28', 28, 4, 4, 0),
(90, 7, '2020-11-28', 29, 2, 5, 0),
(91, 7, '2020-11-28', 30, 3, 6, 0),
(92, 7, '2020-11-28', 31, 3, 7, 0),
(93, 7, '2020-11-28', 32, 2, 8, 0),
(94, 7, '2020-11-28', 33, 3, 9, 0),
(95, 7, '2020-11-28', 34, 2, 10, 0),
(96, 7, '2020-11-28', 35, 2, 11, 0),
(97, 7, '2020-11-28', 36, 3, 12, 0),
(98, 7, '2020-11-28', 37, 2, 1, 0),
(99, 7, '2020-11-28', 38, 1, 2, 0),
(100, 7, '2020-11-28', 39, 2, 3, 0),
(101, 7, '2020-11-28', 40, 3, 4, 0),
(102, 7, '2020-11-28', 41, 2, 5, 0),
(103, 7, '2020-11-28', 42, 2, 6, 0),
(104, 7, '2020-11-28', 43, 2, 7, 0),
(105, 7, '2020-11-28', 44, 1, 8, 0),
(106, 7, '2020-11-28', 45, 2, 9, 0),
(107, 7, '2020-11-28', 46, 4, 10, 0),
(108, 7, '2020-11-28', 47, 2, 11, 0),
(109, 7, '2020-11-28', 48, 2, 12, 0),
(110, 7, '2020-11-28', 49, 2, 1, 0),
(111, 7, '2020-11-28', 50, 3, 2, 0),
(112, 7, '2020-11-28', 51, 3, 3, 0),
(113, 7, '2020-11-28', 52, 2, 4, 0),
(114, 7, '2020-11-28', 53, 3, 5, 0),
(115, 7, '2020-11-28', 54, 2, 6, 0),
(116, 7, '2020-11-28', 55, 3, 7, 0),
(117, 7, '2020-11-28', 56, 2, 8, 0),
(118, 7, '2020-11-28', 57, 3, 9, 0),
(119, 7, '2020-11-28', 58, 4, 10, 0),
(120, 7, '2020-11-28', 59, 2, 11, 0),
(121, 7, '2020-11-28', 60, 3, 12, 0),
(122, 7, '2020-11-28', NULL, 3, 1, 0),
(123, 9, '2020-11-28', 1, 2, 1, 0),
(124, 9, '2020-11-28', 2, 3, 2, 0),
(125, 9, '2020-11-28', 3, 2, 3, 0),
(126, 9, '2020-11-28', 4, 2, 4, 0),
(127, 9, '2020-11-28', 5, 2, 5, 0),
(128, 9, '2020-11-28', 6, 3, 6, 0),
(129, 9, '2020-11-28', 7, 4, 7, 0),
(130, 9, '2020-11-28', 8, 3, 8, 0),
(131, 9, '2020-11-28', 9, 3, 9, 0),
(132, 9, '2020-11-28', 10, 4, 10, 0),
(133, 9, '2020-11-28', 11, 3, 11, 0),
(134, 9, '2020-11-28', 12, 2, 12, 0),
(135, 9, '2020-11-28', 13, 3, 1, 0),
(136, 9, '2020-11-28', 14, 3, 2, 0),
(137, 9, '2020-11-28', 15, 2, 3, 0),
(138, 9, '2020-11-28', 16, 3, 4, 0),
(139, 9, '2020-11-28', 17, 3, 5, 0),
(140, 9, '2020-11-28', 18, 2, 6, 0),
(141, 9, '2020-11-28', 19, 3, 7, 0),
(142, 9, '2020-11-28', 20, 2, 8, 0),
(143, 9, '2020-11-28', 21, 2, 9, 0),
(144, 9, '2020-11-28', 22, 3, 10, 0),
(145, 9, '2020-11-28', 23, 3, 11, 0),
(146, 9, '2020-11-28', 24, 3, 12, 0),
(147, 9, '2020-11-28', 25, 4, 1, 0),
(148, 9, '2020-11-28', 26, 3, 2, 0),
(149, 9, '2020-11-28', 27, 2, 3, 0),
(150, 9, '2020-11-28', 28, 3, 4, 0),
(151, 9, '2020-11-28', 29, 2, 5, 0),
(152, 9, '2020-11-28', 30, 3, 6, 0),
(153, 9, '2020-11-28', 31, 2, 7, 0),
(154, 9, '2020-11-28', 32, 3, 8, 0),
(155, 9, '2020-11-28', 33, 4, 9, 0),
(156, 9, '2020-11-28', 34, 2, 10, 0),
(157, 9, '2020-11-28', 35, 3, 11, 0),
(158, 9, '2020-11-28', 36, 2, 12, 0),
(159, 9, '2020-11-28', 37, 2, 1, 0),
(160, 9, '2020-11-28', 38, 2, 2, 0),
(161, 9, '2020-11-28', 39, 3, 3, 0),
(162, 9, '2020-11-28', 40, 2, 4, 0),
(163, 9, '2020-11-28', 41, 3, 5, 0),
(164, 9, '2020-11-28', 42, 4, 6, 0),
(165, 9, '2020-11-28', 43, 2, 7, 0),
(166, 9, '2020-11-28', 44, 2, 8, 0),
(167, 9, '2020-11-28', 45, 3, 9, 0),
(168, 9, '2020-11-28', 46, 2, 10, 0),
(169, 9, '2020-11-28', 47, 4, 11, 0),
(170, 9, '2020-11-28', 48, 2, 12, 0),
(171, 9, '2020-11-28', 49, 2, 1, 0),
(172, 9, '2020-11-28', 50, 2, 2, 0),
(173, 9, '2020-11-28', 51, 3, 3, 0),
(174, 9, '2020-11-28', 52, 2, 4, 0),
(175, 9, '2020-11-28', 53, 4, 5, 0),
(176, 9, '2020-11-28', 54, 2, 6, 0),
(177, 9, '2020-11-28', 55, 4, 7, 0),
(178, 9, '2020-11-28', 56, 3, 8, 0),
(179, 9, '2020-11-28', 57, 2, 9, 0),
(180, 9, '2020-11-28', 58, 4, 10, 0),
(181, 9, '2020-11-28', 59, 3, 11, 0),
(182, 9, '2020-11-28', 60, 2, 12, 0),
(183, 12, '2021-02-24', 1, 2, 1, 0),
(184, 12, '2021-02-24', 13, 3, 1, 0),
(185, 12, '2021-02-24', 25, 2, 1, 0),
(186, 12, '2021-02-24', 37, 3, 1, 0),
(187, 12, '2021-02-24', 49, 2, 1, 0),
(188, 12, '2021-02-24', 2, 3, 2, 0),
(189, 12, '2021-02-24', 14, 2, 2, 0),
(190, 12, '2021-02-24', 26, 2, 2, 0),
(191, 12, '2021-02-24', 38, 2, 2, 0),
(192, 12, '2021-02-24', 50, 2, 2, 0),
(193, 12, '2021-02-24', 3, 3, 3, 0),
(194, 12, '2021-02-24', 15, 3, 3, 0),
(195, 12, '2021-02-24', 27, 3, 3, 0),
(196, 12, '2021-02-24', 39, 2, 3, 0),
(197, 12, '2021-02-24', 51, 2, 3, 0),
(198, 12, '2021-02-24', 4, 2, 4, 0),
(199, 12, '2021-02-24', 16, 2, 4, 0),
(200, 12, '2021-02-24', 28, 2, 4, 0),
(201, 12, '2021-02-24', 40, 2, 4, 0),
(202, 12, '2021-02-24', 52, 2, 4, 0),
(203, 12, '2021-02-24', 5, 2, 5, 0),
(204, 12, '2021-02-24', 17, 2, 5, 0),
(205, 12, '2021-02-24', 29, 2, 5, 0),
(206, 12, '2021-02-24', 41, 2, 5, 0),
(207, 12, '2021-02-24', 53, 3, 5, 0),
(208, 12, '2021-02-24', 6, 3, 6, 0),
(209, 12, '2021-02-24', 18, 2, 6, 0),
(210, 12, '2021-02-24', 30, 1, 6, 0),
(211, 12, '2021-02-24', 42, 1, 6, 0),
(212, 12, '2021-02-24', 54, 2, 6, 0),
(213, 12, '2021-02-24', 7, 1, 7, 0),
(214, 12, '2021-02-24', 19, 1, 7, 0),
(215, 12, '2021-02-24', 31, 2, 7, 0),
(216, 12, '2021-02-24', 43, 2, 7, 0),
(217, 12, '2021-02-24', 55, 2, 7, 0),
(218, 12, '2021-02-24', 8, 1, 8, 0),
(219, 12, '2021-02-24', 20, 1, 8, 0),
(220, 12, '2021-02-24', 32, 1, 8, 0),
(221, 12, '2021-02-24', 44, 2, 8, 0),
(222, 12, '2021-02-24', 56, 2, 8, 0),
(223, 12, '2021-02-24', 9, 1, 9, 0),
(224, 12, '2021-02-24', 21, 2, 9, 0),
(225, 12, '2021-02-24', 33, 1, 9, 0),
(226, 12, '2021-02-24', 45, 2, 9, 0),
(227, 12, '2021-02-24', 57, 2, 9, 0),
(228, 12, '2021-02-24', 10, 3, 10, 0),
(229, 12, '2021-02-24', 22, 3, 10, 0),
(230, 12, '2021-02-24', 34, 2, 10, 0),
(231, 12, '2021-02-24', 46, 2, 10, 0),
(232, 12, '2021-02-24', 58, 2, 10, 0),
(233, 12, '2021-02-24', 11, 2, 11, 0),
(234, 12, '2021-02-24', 23, 2, 11, 0),
(235, 12, '2021-02-24', 35, 2, 11, 0),
(236, 12, '2021-02-24', 47, 3, 11, 0),
(237, 12, '2021-02-24', 59, 3, 11, 0),
(238, 12, '2021-02-24', 12, 3, 12, 0),
(239, 12, '2021-02-24', 24, 3, 12, 0),
(240, 12, '2021-02-24', 36, 3, 12, 0),
(241, 12, '2021-02-24', 48, 3, 12, 0),
(242, 12, '2021-02-24', 60, 3, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recoaptitudes`
--

CREATE TABLE `recoaptitudes` (
  `id` int(11) NOT NULL COMMENT 'Identificación',
  `usuario` int(11) DEFAULT NULL COMMENT 'Usuario',
  `aptitud` varchar(45) DEFAULT NULL COMMENT 'Aptitud',
  `suma` int(11) DEFAULT NULL COMMENT 'Suma',
  `porcentaje` decimal(10,2) DEFAULT NULL COMMENT 'Porcentaje'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recoaptitudes`
--

INSERT INTO `recoaptitudes` (`id`, `usuario`, `aptitud`, `suma`, `porcentaje`) VALUES
(6, 11, 'REALISTA', 31, '58.13'),
(7, 11, 'INVESTIGACIÓN', 28, '52.50'),
(8, 11, 'ARTISTICA', 28, '50.63'),
(9, 11, 'SOCIAL', 27, '50.63'),
(10, 11, 'EMPRENDEDOR', 26, '48.75'),
(11, 7, 'REALISTA', 33, '61.88'),
(12, 7, 'INVESTIGACIÓN', 28, '52.50'),
(13, 7, 'ARTISTICA', 28, '60.00'),
(14, 7, 'SOCIAL', 25, '46.88'),
(15, 7, 'EMPRENDEDOR', 32, '60.00'),
(16, 9, 'REALISTA', 33, '61.88'),
(17, 9, 'INVESTIGACIÓN', 32, '60.00'),
(18, 9, 'ARTISTICA', 32, '61.88'),
(19, 9, 'SOCIAL', 31, '58.13'),
(20, 9, 'EMPRENDEDOR', 33, '61.88'),
(21, 12, 'REALISTA', 26, '48.75'),
(22, 12, 'INVESTIGACIÓN', 26, '48.75'),
(23, 12, 'ARTISTICA', 26, '43.13'),
(24, 12, 'SOCIAL', 26, '48.75'),
(25, 12, 'EMPRENDEDOR', 27, '50.63');

-- --------------------------------------------------------

--
-- Table structure for table `recocarreras`
--

CREATE TABLE `recocarreras` (
  `id` int(11) NOT NULL COMMENT 'Identificacion de la recomendacion',
  `usuario` int(11) DEFAULT NULL COMMENT 'Usuario',
  `carrera` int(11) DEFAULT NULL COMMENT 'Carrera',
  `preguntas` varchar(45) DEFAULT NULL COMMENT 'Preguntas',
  `suma` int(11) DEFAULT NULL COMMENT 'Suma',
  `porcentaje` decimal(10,2) DEFAULT NULL COMMENT 'Porcentaje'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recocarreras`
--

INSERT INTO `recocarreras` (`id`, `usuario`, `carrera`, `preguntas`, `suma`, `porcentaje`) VALUES
(13, 11, 1, NULL, 13, '52.00'),
(14, 11, 2, NULL, 10, '40.00'),
(15, 11, 3, NULL, 13, '52.00'),
(16, 11, 4, NULL, 10, '40.00'),
(17, 11, 5, NULL, 10, '40.00'),
(18, 11, 6, NULL, 11, '44.00'),
(19, 11, 7, NULL, 12, '48.00'),
(20, 11, 8, NULL, 12, '48.00'),
(21, 11, 9, NULL, 14, '56.00'),
(22, 11, 10, NULL, 12, '48.00'),
(23, 11, 11, NULL, 11, '44.00'),
(24, 11, 12, NULL, 11, '44.00'),
(25, 7, 1, NULL, 12, '48.00'),
(26, 7, 2, NULL, 12, '48.00'),
(27, 7, 3, NULL, 11, '44.00'),
(28, 7, 4, NULL, 14, '56.00'),
(29, 7, 5, NULL, 13, '52.00'),
(30, 7, 6, NULL, 10, '40.00'),
(31, 7, 7, NULL, 15, '60.00'),
(32, 7, 8, NULL, 10, '40.00'),
(33, 7, 9, NULL, 12, '48.00'),
(34, 7, 10, NULL, 14, '56.00'),
(35, 7, 11, NULL, 14, '56.00'),
(36, 7, 12, NULL, 13, '52.00'),
(37, 9, 1, NULL, 13, '52.00'),
(38, 9, 2, NULL, 13, '52.00'),
(39, 9, 3, NULL, 12, '48.00'),
(40, 9, 4, NULL, 12, '48.00'),
(41, 9, 5, NULL, 14, '56.00'),
(42, 9, 6, NULL, 14, '56.00'),
(43, 9, 7, NULL, 15, '60.00'),
(44, 9, 8, NULL, 13, '52.00'),
(45, 9, 9, NULL, 14, '56.00'),
(46, 9, 10, NULL, 15, '60.00'),
(47, 9, 11, NULL, 16, '64.00'),
(48, 9, 12, NULL, 11, '44.00'),
(49, 12, 1, NULL, 12, '48.00'),
(50, 12, 1, NULL, 11, '44.00'),
(51, 12, 1, NULL, 13, '52.00'),
(52, 12, 1, NULL, 10, '40.00'),
(53, 12, 1, NULL, 11, '44.00'),
(54, 12, 2, NULL, 9, '36.00'),
(55, 12, 2, NULL, 8, '32.00'),
(56, 12, 2, NULL, 7, '28.00'),
(57, 12, 2, NULL, 8, '32.00'),
(58, 12, 2, NULL, 12, '48.00'),
(59, 12, 3, NULL, 12, '48.00'),
(60, 12, 3, NULL, 15, '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 NOT NULL,
  `usuario` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text CHARACTER SET utf8 DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `correo` text COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Correo',
  `celular` text COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Celular',
  `instituto` text COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Instituto Educativo',
  `fecnac` date DEFAULT NULL COMMENT 'Fecha de Nacimiento',
  `metas` text COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Metas a corto plazo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`, `correo`, `celular`, `instituto`, `fecnac`, `metas`) VALUES
(2, 'Admin Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auZLihpx1t.3iT0AZAfiVeMMbH.UseuRS', 'Administrador', '', 1, '2021-02-24 22:23:06', '2021-02-25 03:23:06', NULL, NULL, NULL, NULL, NULL),
(4, 'Usuario', 'elecom', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', NULL, 1, '2019-11-26 16:46:40', '2021-02-24 03:00:53', NULL, NULL, NULL, NULL, NULL),
(5, 'Usuario 1', 'usuario1', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', NULL, 1, '2019-11-25 17:48:37', '2019-11-25 22:48:37', NULL, NULL, NULL, NULL, NULL),
(6, 'Usuario', 'elecom2', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', '', 1, '2020-11-25 14:34:03', '2021-02-24 03:01:01', NULL, NULL, NULL, NULL, NULL),
(7, 'Usuario', 'elecom3', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', 'vistas/img/usuarios/elecom3/267.jpg', 1, '2020-11-28 14:55:20', '2021-02-24 03:01:05', NULL, NULL, NULL, NULL, NULL),
(8, 'Usuario', 'elecom4', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', NULL, 1, '2019-11-26 16:36:15', '2021-02-24 03:01:09', NULL, NULL, NULL, NULL, NULL),
(9, 'Usuario', 'elecom2020', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', '', 1, '2020-11-28 15:13:52', '2021-02-24 03:01:12', 'dacostaelecom@gmail.com', '5804246091437', 'LUZ', '1982-06-23', NULL),
(10, 'Usuario', 'pedro2020', '$2a$07$asxx54ahjppf45sd87a5auH5i0ioG24/QB1wt98ZeCGytAOq.EvUe', 'Usuario', NULL, 1, '2020-08-30 14:05:00', '2021-02-24 03:01:16', NULL, NULL, NULL, NULL, NULL),
(11, 'Usuario', 'elecom2021', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', NULL, 1, '2020-11-28 14:45:08', '2021-02-24 03:01:20', NULL, NULL, NULL, NULL, NULL),
(12, 'Emersson Mendoza', 'emersson2021', '$2a$07$asxx54ahjppf45sd87a5auZLihpx1t.3iT0AZAfiVeMMbH.UseuRS', 'Usuario', 'vistas/img/usuarios/emersson2021/110.png', 1, '2021-02-24 22:19:50', '2021-02-25 03:19:50', 'emersson.mendoza.g@uni.pe', '+51 958425493 ', 'UNIVERSIDAD NACIONAL DE INGENIERA', '1993-03-08', '<p>INGENIERO DE SISTEMAS</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_carreras` (`carrera_id`);

--
-- Indexes for table `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`,`fecha`,`pregunta`) USING BTREE,
  ADD KEY `fk_pruebas_preguntas` (`pregunta`),
  ADD KEY `fk_pruebas_carreras` (`carrera_id`);

--
-- Indexes for table `recoaptitudes`
--
ALTER TABLE `recoaptitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_usuario` (`usuario`) USING BTREE;

--
-- Indexes for table `recocarreras`
--
ALTER TABLE `recocarreras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_usuario_recocarrera` (`usuario`),
  ADD KEY `fk_recocarreras_carreras` (`carrera`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Identificador', AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `recoaptitudes`
--
ALTER TABLE `recoaptitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificación', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `recocarreras`
--
ALTER TABLE `recocarreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de la recomendacion', AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_carreras` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `prueba`
--
ALTER TABLE `prueba`
  ADD CONSTRAINT `fk_pruebas_carreras` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pruebas_preguntas` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pruebas_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `recoaptitudes`
--
ALTER TABLE `recoaptitudes`
  ADD CONSTRAINT `fk_recoaptitudes_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recocarreras`
--
ALTER TABLE `recocarreras`
  ADD CONSTRAINT `fk_recocarreras_carreras` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recocarreras_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
