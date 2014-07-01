-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `blog`
--
CREATE DATABASE `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `tblartigos`
--

INSERT INTO `tblartigos` (`idArtigos`, `idUsers`, `assunto`, `artigo`, `dtCriacao`, `dtAtualiza`) VALUES
(9, 1, 'Brasil x Mexico', '<p>0 X 0</p>', '2014-06-26 13:34:21', '2014-07-01 10:13:52'),
(10, 1, 'Brasil x Chile', '<p>&nbsp;1 Brasil x 1 Chile Tempo normal</p>\r\n<p>0 Brasil x 0 Chile Prorroga&ccedil;&atilde;o</p>\r\n<p>3 Brasil x 4 Chile P&ecirc;naltis</p>', '2014-07-01 10:14:32', '2014-07-01 10:16:53'),
(11, 1, 'Brasil x CamarÃµes', '<p>4 Brasil x 1 Camar&otilde;es</p>', '2014-07-01 10:17:35', '2014-07-01 10:17:35'),
(12, 1, 'Brasil x CrÃ³acia', '<p>3 Brasil x 1 Cr&oacute;acia</p>', '2014-07-01 10:18:08', '2014-07-01 10:18:08'),
(13, 2, 'Brasil x Col?mbia', '<p>Palpite:</p>\r\n<p>2 Brasil x 1 Col&ocirc;mbia</p>', '2014-07-01 10:27:14', '2014-07-01 10:30:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

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
(1, 'Rafael Lopes', 'admin', 'admin@localhost', 'dafd0d3d78ad893c92072177d4d0ee6eb716b6b9', '2014-05-15 10:11:01', '2014-07-01 10:25:29'),
(2, 'Palhaço Patati', 'patati', 'patati@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-15 11:18:57', '2014-05-15 11:18:57'),
(3, 'Palhaço Patatá', 'patata', 'patata@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-15 11:18:57', '2014-05-15 11:18:57'),
(4, 'Aula 33 Blog tabelas Artigos e Comentários', 'aula33', 'aula33@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2014-05-22 09:14:20', '2014-05-22 09:14:20');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tblartigos`
--
ALTER TABLE `tblartigos`
  ADD CONSTRAINT `tblartigos_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `tblusers` (`idUsers`);

--
-- Restrições para a tabela `tblcomentarios`
--
ALTER TABLE `tblcomentarios`
  ADD CONSTRAINT `tblcomentarios_ibfk_3` FOREIGN KEY (`idUsers`) REFERENCES `tblusers` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomentarios_ibfk_4` FOREIGN KEY (`idArtigos`) REFERENCES `tblartigos` (`idArtigos`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT USAGE ON *.* TO 'userbd'@'localhost' IDENTIFIED BY PASSWORD '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257';

GRANT ALL PRIVILEGES ON `blog`.* TO 'userbd'@'localhost';


