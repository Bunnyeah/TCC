-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14/08/2024 às 11:19
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
DROP DATABASE IF EXISTS `promel04`;
CREATE DATABASE IF NOT EXISTS `promel04` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `promel04`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_admin` int NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Senha` varchar(60) DEFAULT NULL,
  `Telefone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_cliente` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(60) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Telefone` varchar(11) DEFAULT NULL,
  `Senha` varchar(60) DEFAULT NULL,
  `Endereco` varchar(200) DEFAULT NULL,
  `Info` varchar(400) DEFAULT NULL,
  `fk_admin_ID` int DEFAULT NULL,
  PRIMARY KEY (`ID_cliente`),
  KEY `FK_cliente_2` (`fk_admin_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `ID_pedido` int NOT NULL,
  `Qtd_produtos` int DEFAULT NULL,
  `Valor_Total` decimal(8,2) DEFAULT NULL,
  `fk_cliente_ID` int DEFAULT NULL,
  `fk_admin_ID` int DEFAULT NULL,
  PRIMARY KEY (`ID_pedido`),
  KEY `FK_pedido_2` (`fk_cliente_ID`),
  KEY `FK_pedido_3` (`fk_admin_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `ID_produto` int NOT NULL,
  `Preco_Und` decimal(8,2) DEFAULT NULL,
  `Qtd_stock` int DEFAULT NULL,
  `Descricao` varchar(2000) DEFAULT NULL,
  `Nome_produto` varchar(60) DEFAULT NULL,
  `fk_admin_ID` int DEFAULT NULL,
  PRIMARY KEY (`ID_produto`),
  KEY `FK_produto_2` (`fk_admin_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_pedido_possui`
--

DROP TABLE IF EXISTS `produto_pedido_possui`;
CREATE TABLE IF NOT EXISTS `produto_pedido_possui` (
  `Produto_Pedido_ID` int NOT NULL,
  `Qtd_produtos` int DEFAULT NULL,
  `Sub_Total` decimal(8,2) DEFAULT NULL,
  `fk_produto_ID` int DEFAULT NULL,
  `fk_pedido_ID` int DEFAULT NULL,
  PRIMARY KEY (`Produto_Pedido_ID`),
  KEY `FK_produto_pedido_possui_2` (`fk_produto_ID`),
  KEY `FK_produto_pedido_possui_3` (`fk_pedido_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
