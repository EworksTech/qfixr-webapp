-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `qfixr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `andamento`
--

CREATE TABLE IF NOT EXISTS `andamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chamado` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `descricao` tinytext NOT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE IF NOT EXISTS `chamados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_tecnico` int(11) DEFAULT NULL,
  `id_servico` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `descricao` tinytext NOT NULL,
  `agendar` tinytext,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `checkin_em` datetime DEFAULT NULL,
  `criado_em` datetime NOT NULL,
  `finalizado_em` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `id_cliente`, `id_tecnico`, `id_servico`, `id_dispositivo`, `descricao`, `agendar`, `latitude`, `longitude`, `checkin_em`, `criado_em`, `finalizado_em`) VALUES
(1, 1, NULL, 1, 1, 'Computador esquenta muito e desliga sozinho, varias vezes ao dia.', NULL, NULL, NULL, NULL, '2013-08-01 19:10:42', NULL),
(3, 1, NULL, 1, 1, 'internet nao funciona ou quando funciona é muito lenta', '', NULL, NULL, NULL, '2013-07-31 18:55:08', NULL),
(4, 5, NULL, 1, 2, 'Note book nao liga quando o dia está quente', '', NULL, NULL, NULL, '2013-07-31 20:08:53', NULL),
(5, 6, NULL, 2, 4, 'Internet nao funciona', '', NULL, NULL, NULL, '2013-08-02 00:18:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `telefone` tinytext NOT NULL,
  `email` tinytext,
  `rua` tinytext NOT NULL,
  `numero` tinytext NOT NULL,
  `bairro` tinytext NOT NULL,
  `cidade` tinytext NOT NULL,
  `cep` tinytext NOT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `email`, `rua`, `numero`, `bairro`, `cidade`, `cep`, `criado_em`) VALUES
(1, 'Cesar Mascarenhas', '12 9123-1090', 'cesarmascarenhas@gmail.com', 'Filadelfo Santos Reis', '293', 'Vila dos Comerciários I', 'Guaratinguetá', '12509-710', '0000-00-00 00:00:00'),
(5, 'Luciana Mascarenhas', '12 91642829', 'lumaluc@me.com', 'Filadelfo Santos Reis', '293', 'Vila dos Comerciários I', 'Guaratinguetá', '12509-710', '2013-07-31 15:46:05'),
(6, 'Luana Mascarenhas', '12 91642829', 'luana@gmail.com', 'Rui da Costa Maia', '7', 'Parque São Francisco', 'Guaratinguetá', '12509-150', '2013-08-02 00:18:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dispositivos`
--

CREATE TABLE IF NOT EXISTS `dispositivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `nome`) VALUES
(1, 'Computador'),
(2, 'Notebook'),
(3, 'Impressora'),
(4, 'Roteador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`) VALUES
(1, 'Manutenção em Hardware'),
(2, 'Manutenção em Rede');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnicos`
--

CREATE TABLE IF NOT EXISTS `tecnicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nome`, `user`, `password`) VALUES
(1, 'Cesar Mascarenhas', 'cesarmasc', '123456'),
(2, 'Lucas Augusto', 'lucas', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'admin', '40847951488f9395f242f30ed27cdc47');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
