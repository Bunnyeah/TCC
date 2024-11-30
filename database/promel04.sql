-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Nov-2024 às 18:02
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

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
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(200) DEFAULT NULL,
  `Senha` varchar(60) DEFAULT NULL,
  `Telefone` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
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
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `qtd_estrela`, `comentario`, `created`, `modified`) VALUES
(1, 5, NULL, '2024-11-24 18:21:37', NULL),
(2, 1, NULL, '2024-11-24 18:21:43', NULL),
(3, 1, NULL, '2024-11-24 18:22:12', NULL),
(4, 4, 'fvgdgdf', '2024-11-24 18:36:30', NULL),
(5, 5, '', '2024-11-24 19:37:43', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
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
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_ID` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`categoria_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_ID`, `Nome`) VALUES
(4, 'Fitoterápicos'),
(5, 'coisa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_ID`, `Email`, `Senha`, `Nome`, `Telefone`, `Info`) VALUES
(1, 'adm@adm.com', '$2y$10$tQi2AEz5xyaSWdo1FO/D6.lK4WlwamqjIIelZia3LU4dPE8FXn8CW', 'Alex', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedido_ID` int NOT NULL AUTO_INCREMENT,
  `Qtd_produtos` int DEFAULT NULL,
  `Valor_Total` int DEFAULT NULL,
  `fk_cliente_ID` int DEFAULT NULL,
  `fk_Admin_ID` int DEFAULT NULL,
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
  `fk_Admin_ID` int DEFAULT NULL,
  `fk_categoria_ID` int DEFAULT NULL,
  KEY `FK_possui_1` (`fk_Admin_ID`),
  KEY `FK_possui_2` (`fk_categoria_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_ID`, `Preco_Und`, `Qtd_stock`, `Qnt_vend`, `Status_prdt`, `Descricao`, `Nome_produto`, `imagem`, `imagem2`, `fk_categoria_ID`) VALUES
(8, 8, 83478123, NULL, NULL, '2433r2w', 'oi', '674b52e4aaa8e.jpg', '674b52e4ac0a1.jpeg', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pedido_possui`
--

DROP TABLE IF EXISTS `produto_pedido_possui`;
CREATE TABLE IF NOT EXISTS `produto_pedido_possui` (
  `Produto_Pedido_ID` int NOT NULL AUTO_INCREMENT,
  `fk_produto_ID` int DEFAULT NULL,
  `fk_Pedido_ID` int DEFAULT NULL,
  PRIMARY KEY (`Produto_Pedido_ID`),
  KEY `FK_Produto_Pedido_possui_2` (`fk_produto_ID`),
  KEY `FK_Produto_Pedido_possui_3` (`fk_Pedido_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
