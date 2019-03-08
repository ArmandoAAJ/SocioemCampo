-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Fev-2019 às 12:41
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socio`
--
CREATE DATABASE IF NOT EXISTS `socio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `socio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `areas` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`id`, `areas`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'B2'),
(5, 'C1'),
(6, 'C2'),
(7, 'D1'),
(8, 'D2'),
(9, 'E1'),
(10, 'E2'),
(11, 'F1'),
(12, 'F2'),
(13, 'G1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `checkin`
--

DROP TABLE IF EXISTS `checkin`;
CREATE TABLE IF NOT EXISTS `checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(255) NOT NULL,
  `id_cadastroCompeticao` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `checkin`
--

INSERT INTO `checkin` (`id`, `id_Usuario`, `id_cadastroCompeticao`, `area`, `id_area`) VALUES
(106, 2, 3, 'A1', 1),
(40, 40, 3, 'A3', 3),
(67, 41, 3, 'A2', 2),
(68, 41, 1, 'A1', 1),
(104, 2, 1, 'A3', 3),
(70, 40, 1, 'A2', 2),
(113, 10, 3, 'F1', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `checkin_registros`
--

DROP TABLE IF EXISTS `checkin_registros`;
CREATE TABLE IF NOT EXISTS `checkin_registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(11) NOT NULL,
  `id_Cadastro_Competicao` int(11) NOT NULL,
  `id_Area` int(11) NOT NULL,
  `efetua_Checkin` varchar(200) NOT NULL,
  `cancela_Checkin` varchar(200) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `checkin_registros`
--

INSERT INTO `checkin_registros` (`id`, `id_Usuario`, `id_Cadastro_Competicao`, `id_Area`, `efetua_Checkin`, `cancela_Checkin`, `data`) VALUES
(1, 2, 3, 1, 'SIM', '-', '2019-01-07 20:08:00'),
(2, 2, 3, 1, 'SIM', '-', '2019-01-07 20:09:00'),
(3, 2, 3, 1, 'SIM', '-', '2019-01-07 20:09:00'),
(4, 2, 3, 1, 'SIM', '-', '2019-01-07 20:10:00'),
(5, 2, 3, 1, 'SIM', '-', '2019-01-07 20:10:00'),
(6, 2, 3, 1, 'SIM', '-', '2019-01-07 20:10:00'),
(7, 2, 3, 1, 'SIM', '-', '2019-01-07 20:10:00'),
(8, 2, 3, 1, 'SIM', '-', '2019-01-07 20:11:00'),
(9, 2, 3, 1, 'SIM', '-', '2019-01-07 20:12:00'),
(10, 2, 3, 1, 'SIM', '-', '2019-01-07 20:12:00'),
(11, 2, 3, 1, 'SIM', '-', '2019-01-07 20:13:28'),
(12, 2, 3, 1, 'SIM', '-', '2019-01-07 20:14:20'),
(13, 2, 3, 1, '-', 'SIM', '2019-01-07 20:17:08'),
(14, 2, 3, 1, 'SIM', '-', '2019-01-07 20:17:33'),
(15, 2, 3, 1, '-', 'SIM', '2019-01-07 20:17:39'),
(16, 2, 3, 1, 'SIM', '-', '2019-01-07 20:29:37'),
(17, 2, 1, 3, 'SIM', '-', '2019-01-07 20:29:39'),
(18, 2, 3, 1, '-', 'SIM', '2019-01-08 10:42:11'),
(19, 2, 3, 1, 'SIM', '-', '2019-01-08 10:42:13'),
(20, 2, 3, 1, '-', 'SIM', '2019-01-08 15:18:36'),
(21, 2, 3, 1, 'SIM', '-', '2019-01-08 15:18:41'),
(22, 2, 1, 3, '-', 'SIM', '2019-01-08 15:18:50'),
(23, 2, 1, 3, 'SIM', '-', '2019-01-08 15:18:53'),
(24, 2, 3, 1, '-', 'SIM', '2019-01-10 15:04:33'),
(25, 2, 1, 3, '-', 'SIM', '2019-01-10 15:04:37'),
(26, 2, 3, 1, 'SIM', '-', '2019-01-10 15:08:09'),
(27, 2, 1, 3, 'SIM', '-', '2019-01-10 15:14:39'),
(28, 2, 3, 1, '-', 'SIM', '2019-01-10 16:03:42'),
(29, 2, 3, 1, 'SIM', '-', '2019-01-10 16:03:46'),
(30, 2, 3, 1, '-', 'SIM', '2019-01-30 11:17:06'),
(31, 2, 3, 1, 'SIM', '-', '2019-01-30 11:17:07'),
(32, 10, 3, 6, 'SIM', '-', '2019-02-22 09:37:03'),
(33, 10, 3, 6, '-', 'SIM', '2019-02-22 09:39:49'),
(34, 10, 3, 10, 'SIM', '-', '2019-02-22 09:39:52'),
(35, 10, 3, 10, '-', 'SIM', '2019-02-22 09:39:54'),
(36, 10, 3, 11, 'SIM', '-', '2019-02-22 09:39:55'),
(37, 10, 3, 11, '-', 'SIM', '2019-02-22 09:39:57'),
(38, 10, 3, 4, 'SIM', '-', '2019-02-22 09:39:58'),
(39, 10, 3, 4, '-', 'SIM', '2019-02-22 09:40:00'),
(40, 10, 3, 4, 'SIM', '-', '2019-02-22 09:40:00'),
(41, 10, 3, 4, '-', 'SIM', '2019-02-22 09:40:02'),
(42, 10, 3, 13, 'SIM', '-', '2019-02-22 09:40:03'),
(43, 10, 3, 13, '-', 'SIM', '2019-02-22 09:40:05'),
(44, 10, 3, 11, 'SIM', '-', '2019-02-22 09:40:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

DROP TABLE IF EXISTS `classificacao`;
CREATE TABLE IF NOT EXISTS `classificacao` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(255) NOT NULL,
  `id_CadastroCompeticao` int(255) NOT NULL,
  `id_Evento` int(255) NOT NULL,
  `valorEvento` int(255) NOT NULL,
  `id_area` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`id`, `id_Usuario`, `id_CadastroCompeticao`, `id_Evento`, `valorEvento`, `id_area`, `area`) VALUES
(3, 40, 1, 6, 3, 2, 'A2'),
(2, 41, 1, 2, 8, 1, 'A1'),
(1, 2, 1, 1, 10, 3, 'A3'),
(4, 2, 3, 10, -2, 1, 'A1'),
(5, 40, 3, 1, 10, 3, 'A3'),
(6, 41, 3, 1, 10, 2, 'A2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `competicao`
--

DROP TABLE IF EXISTS `competicao`;
CREATE TABLE IF NOT EXISTS `competicao` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `datahorainicio` datetime NOT NULL,
  `datahorafim` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `competicao`
--

INSERT INTO `competicao` (`id`, `nome`, `datahorainicio`, `datahorafim`) VALUES
(1, 'CHAPECOENSE - ACF X GRÊMIO - FBPA', '2018-01-19 00:00:00', '2019-01-31 00:00:00'),
(2, 'CHAPECOENSE - ACF X FIGUEIRENSE - FFC', '2017-12-05 10:00:00', '2017-12-05 11:00:00'),
(3, 'CHAPECOENSE - ACF X AVAÍ - AFC', '2017-12-24 00:00:00', '2019-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEvento` varchar(60) NOT NULL,
  `valorEvento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nomEvento`, `valorEvento`) VALUES
(1, 'GOL CAMPO DEFESA', 10),
(2, 'GOL CÍRCULO CENTRAL', 8),
(3, 'GOL OLÍMPICO', 6),
(4, 'GOL INTERMEDIÁRIA ATAQUE', 5),
(5, 'GOL GRANDE ÁREA', 4),
(6, 'GOL PEQUENA ÁREA', 3),
(7, 'GOL DE FALTA', 2),
(8, 'GOL PENÂLTI', 1),
(9, 'GOL CONTRA ', -3),
(10, 'CARTÃO VERMELHO', -2),
(11, 'CARTÃO AMARELO', -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `id_usuario`, `data`) VALUES
(1, 2, '2019-01-07 19:42:36'),
(2, 2, '2019-01-07 17:45:15'),
(3, 1, '2019-01-07 17:48:24'),
(4, 1, '2019-01-07 17:48:57'),
(5, 1, '2019-01-07 19:35:02'),
(6, 2, '2019-01-07 19:35:56'),
(7, 2, '2019-01-07 19:36:21'),
(8, 2, '2019-01-07 19:36:39'),
(9, 1, '2019-01-07 19:38:22'),
(10, 2, '2019-01-07 19:38:47'),
(11, 1, '2019-01-07 19:44:33'),
(12, 2, '2019-01-07 19:45:19'),
(13, 2, '2019-01-07 19:45:32'),
(14, 2, '2019-01-07 19:47:17'),
(15, 2, '2019-01-07 19:48:35'),
(16, 2, '2019-01-07 19:53:06'),
(17, 2, '2019-01-07 20:05:14'),
(18, 2, '2019-01-07 20:18:21'),
(19, 2, '2019-01-07 20:34:48'),
(20, 2, '2019-01-07 20:49:29'),
(21, 2, '2019-01-07 20:59:11'),
(22, 2, '2019-01-07 20:59:23'),
(23, 2, '2019-01-07 21:12:37'),
(24, 2, '2019-01-08 10:04:58'),
(25, 2, '2019-01-08 10:05:44'),
(26, 2, '2019-01-08 10:13:09'),
(27, 2, '2019-01-08 10:43:56'),
(28, 2, '2019-01-08 15:18:21'),
(29, 2, '2019-01-08 15:32:38'),
(30, 2, '2019-01-08 19:14:05'),
(31, 2, '2019-01-08 19:14:59'),
(32, 2, '2019-01-09 14:10:41'),
(33, 2, '2019-01-09 14:14:44'),
(34, 2, '2019-01-09 14:51:01'),
(35, 2, '2019-01-09 16:58:05'),
(36, 2, '2019-01-09 17:18:06'),
(37, 2, '2019-01-09 17:18:41'),
(38, 2, '2019-01-09 18:25:56'),
(39, 2, '2019-01-09 18:27:56'),
(40, 2, '2019-01-09 20:49:43'),
(41, 2, '2019-01-09 21:43:43'),
(42, 2, '2019-01-09 23:01:02'),
(43, 2, '2019-01-09 23:20:42'),
(44, 2, '2019-01-10 00:22:59'),
(45, 2, '2019-01-10 15:02:32'),
(46, 2, '2019-01-10 15:55:31'),
(47, 2, '2019-01-10 15:57:26'),
(48, 2, '2019-01-10 15:57:53'),
(49, 2, '2019-01-10 15:58:06'),
(50, 2, '2019-01-10 15:58:35'),
(51, 2, '2019-01-10 16:21:36'),
(52, 2, '2019-01-10 18:28:52'),
(53, 2, '2019-01-10 18:33:08'),
(54, 2, '2019-01-11 11:20:03'),
(55, 2, '2019-01-11 12:51:46'),
(56, 2, '2019-01-12 19:22:39'),
(57, 2, '2019-01-12 21:02:50'),
(58, 2, '2019-01-12 21:38:52'),
(59, 2, '2019-01-12 22:14:02'),
(60, 2, '2019-01-30 11:10:01'),
(61, 2, '2019-01-31 22:26:53'),
(62, 10, '2019-02-22 09:34:45'),
(63, 10, '2019-02-22 09:37:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `numCarterinha` int(255) NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT '1',
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `usuario`, `numCarterinha`, `nivel`, `ativo`) VALUES
(40, 'Pedro Santos', 'pedro@pedro.com', '12345678900', 1, 1, 1),
(2, 'Armando Arlan Joergensen', 'armando@armando.com', '10351293965', 121212, 1, 1),
(41, 'Mario Silva', 'mariosilva@mario.com', '99988877700', 2, 1, 1),
(10, 'Visitante', 'visitante@visitante.com', '11122233301', 123456, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
