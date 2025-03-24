-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14/12/2024 às 17:13
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `promel04`
--
CREATE DATABASE IF NOT EXISTS `promel04` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `promel04`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id_avaliacao` int NOT NULL AUTO_INCREMENT,
  `qtd_estrela` int NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `qtd_estrela`, `comentario`, `created`, `modified`) VALUES
(1, 5, NULL, '2024-11-24 18:21:37', NULL),
(2, 1, NULL, '2024-11-24 18:21:43', NULL),
(3, 1, NULL, '2024-11-24 18:22:12', NULL),
(4, 4, 'fvgdgdf', '2024-11-24 18:36:30', NULL),
(5, 5, '', '2024-11-24 19:37:43', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `carrinho_ID` int NOT NULL AUTO_INCREMENT,
  `fk_cliente_ID` int DEFAULT NULL,
  `fk_produto_ID` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  PRIMARY KEY (`carrinho_ID`),
  KEY `fk_cliente_ID` (`fk_cliente_ID`),
  KEY `fk_produto_ID` (`fk_produto_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_ID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`categoria_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`categoria_ID`, `Nome`) VALUES
(4, 'Fitoterápicos'),
(5, 'coisa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(200) DEFAULT NULL,
  `Senha` varchar(60) DEFAULT NULL,
  `Nome` varchar(60) DEFAULT NULL,
  `Telefone` varchar(60) DEFAULT NULL,
  `Info` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cliente_ID`),
  UNIQUE KEY `UC_Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cliente_ID`, `Email`, `Senha`, `Nome`, `Telefone`, `Info`) VALUES
(1, 'alexpromel@gmail.com', '$2y$10$tQi2AEz5xyaSWdo1FO/D6.lK4WlwamqjIIelZia3LU4dPE8FXn8CW', 'Alex', NULL, NULL),
(2, 'vitor3@gmail.com', '$2y$10$aYaY3owARm3WeF8HI4hVWuYczeoFbJP9C6nmoVBjUQxj69CrTaTt2', 'vitor', NULL, NULL),
(4, 'JoaoM@gmail.com', '$2y$10$oNfB8zt3aiSpscPA3RWh0.Di4fuyMZIyTLhPMHC5JBcQPAuM4roz2', 'Joao Mendez', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `produto_ID` int NOT NULL AUTO_INCREMENT,
  `Preco_Und` int DEFAULT NULL,
  `Qtd_stock` int DEFAULT NULL,
  `Qnt_vend` int DEFAULT NULL,
  `Status_prdt` varchar(60) DEFAULT NULL,
  `Descricao` varchar(2000) DEFAULT NULL,
  `Nome_produto` varchar(60) DEFAULT NULL,
  `imagem` varchar(60) DEFAULT NULL,
  `imagem2` varchar(60) NOT NULL,
  `fk_categoria_ID` int DEFAULT NULL,
  PRIMARY KEY (`produto_ID`),
  KEY `FK_produto_3` (`fk_categoria_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`produto_ID`, `Preco_Und`, `Qtd_stock`, `Qnt_vend`, `Status_prdt`, `Descricao`, `Nome_produto`, `imagem`, `imagem2`, `fk_categoria_ID`) VALUES
(10, 22, 5, NULL, NULL, 'Alcachofra com Berinjela', 'Alcachofra com Berinjela', '674d0ee544020.jpeg', '674d0ee54433c.jpg', 4),
(11, 150, 14, NULL, NULL, 'Cura Tudo', 'Cura Tudo', '674d0f735c2b0.jpeg', '674d0f735d5a6.jpg', 4),
(12, 130, 12, NULL, NULL, 'Erva Baleeira', 'Erva Baleeira', '674d10fdb654d.jpeg', '674d10fdb6900.jpg', 4),
(13, 100, 80, NULL, NULL, 'Extrato', 'Ansie', '674d118605dbc.png', '674d118606b62.jpg', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
