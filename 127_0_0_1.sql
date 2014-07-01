-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jun-2014 às 18:37
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
-- 

	create database blog;
	use blog;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblartigos`
--

CREATE TABLE IF NOT EXISTS `tblartigos` (
  `idArtigos` int(11) NOT NULL AUTO_INCREMENT,
  `idUsers` int(11) NOT NULL,
  `assunto` varchar(40) NOT NULL,
  `artigo` text NOT NULL,
  `dtCriacao` datetime NOT NULL,
  `dtAtualiza` datetime NOT NULL,
  PRIMARY KEY (`idArtigos`),
  KEY `idUsers` (`idUsers`),
  KEY `idUsers_2` (`idUsers`),
  KEY `idUsers_3` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tblartigos`
--

INSERT INTO `tblartigos` (`idArtigos`, `idUsers`, `assunto`, `artigo`, `dtCriacao`, `dtAtualiza`) VALUES
(7, 3, 'Foii?', '<p>:D</p>', '2014-05-29 09:49:05', '2014-06-26 13:35:51'),
(8, 4, 'Ixi', 'Bugou tudo', '2014-06-03 10:11:02', '2014-06-03 10:11:02'),
(9, 1, ':(', '<p>:(</p>', '2014-06-26 13:34:21', '2014-06-26 13:34:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcomentarios`
--

CREATE TABLE IF NOT EXISTS `tblcomentarios` (
  `idComentarios` int(11) NOT NULL AUTO_INCREMENT,
  `idUsers` int(11) NOT NULL,
  `idArtigos` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `dtCriacao` datetime NOT NULL,
  `dtAtualiza` datetime NOT NULL,
  PRIMARY KEY (`idComentarios`),
  KEY `idUsers` (`idUsers`,`idArtigos`),
  KEY `idUsers_2` (`idUsers`),
  KEY `idArtigos` (`idArtigos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `tblcomentarios`
--

INSERT INTO `tblcomentarios` (`idComentarios`, `idUsers`, `idArtigos`, `comentario`, `dtCriacao`, `dtAtualiza`) VALUES
(17, 2, 8, 'Ner', '2014-06-03 10:12:33', '2014-06-03 10:12:33'),
(18, 2, 7, 'Até agora não', '2014-06-03 10:12:52', '2014-06-03 10:12:52'),
(19, 1, 9, '<p>:)</p>\r\n<p>&nbsp;</p>', '2014-06-26 13:34:31', '2014-06-26 13:34:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(16) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `dtCriacao` datetime NOT NULL,
  `dtAtualiza` datetime NOT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de Usuários' AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tblusers`
--

INSERT INTO `tblusers` (`idUsers`, `nome`, `login`, `email`, `senha`, `dtCriacao`, `dtAtualiza`) VALUES
(0, 'Anonimus', '', '', '', '2014-05-29 08:42:28', '2014-05-29 08:42:28'),
(1, 'Administrador do Sistema', 'admin', 'admin@localhost', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-15 10:11:01', '0000-00-00 00:00:00'),
(2, 'Palhaço Patati', 'patati', 'patati@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-15 11:18:57', '2014-05-15 11:18:57'),
(3, 'Palhaço Patatá', 'patata', 'patata@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-15 11:18:57', '2014-05-15 11:18:57'),
(4, 'Aula 33 Blog tabelas Artigos e Comentários', 'aula33', 'aula33@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-22 09:14:20', '2014-05-22 09:14:20');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tblartigos`
--
ALTER TABLE `tblartigos`
  ADD CONSTRAINT `tblartigos_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `tblusers` (`idUsers`);

--
-- Limitadores para a tabela `tblcomentarios`
--
ALTER TABLE `tblcomentarios`
  ADD CONSTRAINT `tblcomentarios_ibfk_3` FOREIGN KEY (`idUsers`) REFERENCES `tblusers` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomentarios_ibfk_4` FOREIGN KEY (`idArtigos`) REFERENCES `tblartigos` (`idArtigos`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT USAGE ON *.* TO 'userbd'@'localhost' IDENTIFIED BY PASSWORD '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257';

GRANT ALL PRIVILEGES ON `blog`.* TO 'userbd'@'localhost';