-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Out-2024 às 11:29
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(200) DEFAULT NULL,
  `Senha` varchar(60) DEFAULT NULL,
  `Telefone` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `carrinho_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fk_cliente_ID` int(11) DEFAULT NULL,
  `fk_produto_ID` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`carrinho_ID`),
  KEY `fk_cliente_ID` (`fk_cliente_ID`),
  KEY `fk_produto_ID` (`fk_produto_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(60) DEFAULT NULL,
  `Cor_Caixa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoria_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(200) DEFAULT NULL,
  `Senha` varchar(60) DEFAULT NULL,
  `Nome` varchar(60) DEFAULT NULL,
  `Telefone` varchar(60) DEFAULT NULL,
  `Info` varchar(200) DEFAULT NULL,
  `Rua` varchar(300) DEFAULT NULL,
  `Cidade` varchar(100) DEFAULT NULL,
  `Estado` varchar(100) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `fk_Admin_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cliente_ID`),
  KEY `FK_cliente_2` (`fk_Admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_ID`, `Email`, `Senha`, `Nome`, `Telefone`, `Info`, `Rua`, `Cidade`, `Estado`, `endereco`, `fk_Admin_ID`) VALUES
(1, 'adm@adm.com', '$2y$10$VC5d9O1O7CidUt0m8yreHOYklPPMkCTz5FXfPELY/97mNi.cpkZBe', 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'vitor@gmail.com', '$2y$10$5wXVIX.H0HvkN4SL0EssX.TW9a4FDVcSX.8Dd2LqzKmSci3T5XiRu', 'Vitor', '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedido_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Qtd_produtos` int(11) DEFAULT NULL,
  `Valor_Total` int(11) DEFAULT NULL,
  `fk_cliente_ID` int(11) DEFAULT NULL,
  `fk_Admin_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`pedido_ID`),
  KEY `FK_Pedido_2` (`fk_cliente_ID`),
  KEY `FK_Pedido_3` (`fk_Admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`pedido_ID`, `Qtd_produtos`, `Valor_Total`, `fk_cliente_ID`, `fk_Admin_ID`) VALUES
(2, 2, 200, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui`
--

DROP TABLE IF EXISTS `possui`;
CREATE TABLE IF NOT EXISTS `possui` (
  `fk_Admin_ID` int(11) DEFAULT NULL,
  `fk_categoria_ID` int(11) DEFAULT NULL,
  KEY `FK_possui_1` (`fk_Admin_ID`),
  KEY `FK_possui_2` (`fk_categoria_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `produto_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Preco_Und` int(11) DEFAULT NULL,
  `Qtd_stock` int(11) DEFAULT NULL,
  `Qnt_vend` int(11) DEFAULT NULL,
  `Status_prdt` varchar(60) DEFAULT NULL,
  `Descricao` varchar(2000) DEFAULT NULL,
  `Nome_produto` varchar(60) DEFAULT NULL,
  `imagem` varchar(60) DEFAULT NULL,
  `fk_Admin_ID` int(11) DEFAULT NULL,
  `fk_categoria_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`produto_ID`),
  KEY `FK_produto_2` (`fk_Admin_ID`),
  KEY `FK_produto_3` (`fk_categoria_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_ID`, `Preco_Und`, `Qtd_stock`, `Qnt_vend`, `Status_prdt`, `Descricao`, `Nome_produto`, `imagem`, `fk_Admin_ID`, `fk_categoria_ID`) VALUES
(14, 30, 80, NULL, NULL, 'Reduz enxaqueca.', 'Bio enxaqueca', '671784a84fdcf.png', NULL, NULL),
(15, 80, 6, NULL, NULL, 'Bom para dores corporais.', 'Cura Tudo', '671784d098833.jpeg', NULL, NULL),
(16, 50, 10, NULL, NULL, 'Rico em vitaminas.', 'Alcachofra com Berinjela', '6717850a67b5c.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pedido_possui`
--

DROP TABLE IF EXISTS `produto_pedido_possui`;
CREATE TABLE IF NOT EXISTS `produto_pedido_possui` (
  `Produto_Pedido_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fk_produto_ID` int(11) DEFAULT NULL,
  `fk_Pedido_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Produto_Pedido_ID`),
  KEY `FK_Produto_Pedido_possui_2` (`fk_produto_ID`),
  KEY `FK_Produto_Pedido_possui_3` (`fk_Pedido_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
