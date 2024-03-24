-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/03/2024 às 17:11
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `magic_shop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_history` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_order` date NOT NULL,
  `last_order_value` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `order_history`, `last_order`, `last_order_value`) VALUES
(25, 'Elena das Sombras', 'elena@sombras.com', '', '2023-01-25', 0),
(24, 'Darius, o Sábio', '', 'Cristal Encantado', '2023-03-10', 200),
(23, '', 'carlos@magia.com', 'Livro dos Encantamentos; Capa da Invisibilidade', '0000-00-00', 0),
(22, 'Bianca Feiticeira', 'bianca@feiticeiro.com', 'Poção de Cura', '2023-02-20', 85),
(21, 'Alex Magus', 'alex@magia.com', 'Varinha Mágica', '2023-01-15', 120),
(26, 'Fábio Luminoso', 'fabio@luz.com', 'Poção de Cura; Varinha Mágica', '2023-02-15', 150),
(27, 'Gisela da Terra', 'gisela@terra.com', 'Sementes Mágicas', '2023-03-05', 60),
(28, 'Hector Vento Veloz', 'hector@vento.com', 'Elixir de Velocidade', '0000-00-00', 100),
(29, 'Irina Flamejante', 'irina@fogo.com', 'Orbe do Fogo', '2023-02-28', 95),
(30, 'João', 'joao@magia.com', 'Mapa Estelar', '2023-01-05', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mails`
--

DROP TABLE IF EXISTS `mails`;
CREATE TABLE IF NOT EXISTS `mails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `mails`
--

INSERT INTO `mails` (`id`, `subject`, `content`, `destination`, `date`) VALUES
(2, 'Teste', 'Omg, this is a test', 'claudiopimentel1508@gmail.com', '2024-03-23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `orders`
--

INSERT INTO `orders` (`id`, `shop_id`, `shop_name`, `location`, `product`, `quantity`) VALUES
(20, 5, 'Vulcões Adormecidos', 'Ilhas de Fogo', 'Lava Encantada', 20),
(19, 4, 'Cavernas Submersas', 'Mundo Aquático de Neptar', 'Pérolas de Energia', 40),
(18, 3, 'Deserto dos Ventos', 'Planeta Kaitos', 'Areia Mágica', 70),
(17, 2, 'Floresta Encantada', 'Reino de Elyria', 'Poções de Juventude', 30),
(16, 1, 'Torre de Cristal', 'Planeta Zirak', 'Cristais Místicos', 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
