-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2018 às 23:46
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_usuario`, `data`) VALUES
(1, 1, '2018-11-04 15:53:28'),
(2, 11, '2018-11-26 00:14:36'),
(3, 11, '2018-11-26 00:19:53'),
(4, 11, '2018-11-26 00:19:58'),
(5, 11, '2018-11-26 00:20:03'),
(6, 11, '2018-11-26 00:20:10'),
(7, 11, '2018-11-26 00:26:12'),
(8, 11, '2018-11-26 00:28:43'),
(9, 11, '2018-11-26 00:34:22'),
(10, 11, '2018-11-26 00:40:43'),
(11, 11, '2018-11-26 00:40:46'),
(12, 11, '2018-11-26 00:40:48'),
(13, 11, '2018-11-26 00:45:31'),
(14, 11, '2018-11-26 00:45:41'),
(15, 11, '2018-11-26 00:46:01'),
(16, 11, '2018-11-26 00:46:29'),
(17, 11, '2018-11-26 00:50:16'),
(18, 11, '2018-11-26 00:51:09'),
(19, 11, '2018-11-26 00:52:52'),
(20, 11, '2018-11-26 00:53:16'),
(21, 11, '2018-11-26 01:02:40'),
(22, 11, '2018-11-26 01:57:27'),
(23, 11, '2018-11-26 18:16:22'),
(24, 11, '2018-11-26 18:18:56'),
(25, 11, '2018-11-26 18:19:18'),
(28, 16, '2018-11-26 19:54:49'),
(29, 17, '2018-11-26 20:00:29'),
(30, 17, '2018-11-26 20:09:10'),
(31, 16, '2018-11-26 20:13:44'),
(32, 16, '2018-11-26 20:13:51'),
(33, 19, '2018-11-26 20:23:24'),
(34, 20, '2018-11-26 20:29:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_item`
--

CREATE TABLE `pedido_item` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido_item`
--

INSERT INTO `pedido_item` (`id`, `id_pedido`, `id_produto`, `quantidade`) VALUES
(1, 1, 2, 1),
(7, 16, 1, 1),
(8, 17, 1, 1),
(9, 18, 1, 1),
(10, 19, 1, 1),
(11, 20, 1, 1),
(12, 21, 2, 1),
(13, 22, 4, 1),
(14, 23, 3, 1),
(15, 24, 1, 1),
(16, 25, 99, 1),
(19, 28, 2, 1),
(20, 29, 2, 1),
(21, 30, 3, 1),
(22, 31, 2, 1),
(23, 32, 3, 1),
(24, 33, 101, 1),
(25, 34, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `quantidade`) VALUES
(1, 'Estatua Inca', 'AmaldiÃ§oada por volta de 100 a.c', 7500, 10),
(2, 'Cadeira Flutuante amaldiçoada', '2 Portas segundo dono.', 3000, 1),
(3, 'Voodoo-Dool possuido', 'Vermelho, 4 Portas, 1.6, ', 1600, 1),
(4, 'São Cipriano', 'Livro basico de entendimento Alem-Fisico', 15000, 10),
(99, 'Kit Invocação', 'Kit completo para seu ritual. O kit contem:\r\n- 3 tunicas : 1 vermelha, 2 pretas.\r\n- Tomo  de invocação: Goetia.\r\n- Selos: 3 sortidos dos 72.\r\n- Idolos: 3 idolos dos 3 selos sortidos.\r\n- 2KG de sal grosso especial.\r\n- 10 velas: 5 pretas e 5 vermelhas.\r\n- M', 2500, 10),
(101, 'a', 'a', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `administrador` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `email`, `administrador`) VALUES
(1, 'Geison', '1cc39ffd758234422e1f75beadfc5fb2', 'g@g.com', b'0'),
(4, 'root', '202cb962ac59075b964b07152d234b70', 'root@root.com', b'1'),
(7, 'cliente', '202cb962ac59075b964b07152d234b70', 'cliente1@c.com', b'0'),
(8, 'aaaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aa@aa.com', b'0'),
(9, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b@b.com', b'0'),
(10, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b@b.com', b'0'),
(11, 'theo', '202cb962ac59075b964b07152d234b70', 'theo@theo.com', b'0'),
(13, 'luca', 'ff377aff39a9345a9cca803fb5c5c081', 'l@l.com', b'0'),
(14, 'a', '47bce5c74f589f4867dbd57e9ca9f808', 'a@a.com', b'0'),
(15, 'c', '08f8e0260c64418510cefb2b06eee5cd', 'c@c.com', b'0'),
(16, 'd', '77963b7a931377ad4ab5ad6a9cd718aa', 'd@d.com', b'0'),
(17, 'e', 'd2f2297d6e829cd3493aa7de4416a18f', 'e@e.com', b'0'),
(18, 'ok', '444bcb3a3fcf8389296c49467f27e1d6', 'ok@ko.com', b'0'),
(19, 'ok', '202cb962ac59075b964b07152d234b70', 'ok@ko.com', b'0'),
(20, 'as', 'f970e2767d0cfe75876ea857f92e319b', 'as@a.com', b'0'),
(21, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a@a.com', b'0'),
(22, 'f', '8fa14cdd754f91cc6554c9e71929cce7', 'f@f.com', b'0'),
(23, 'g', 'b2f5ff47436671b6e533d8dc3614845d', 'g@g.com', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usarioid` (`id_usuario`);

--
-- Indexes for table `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkpedito_id` (`id_pedido`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pedido_item`
--
ALTER TABLE `pedido_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `usarioid` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD CONSTRAINT `fkpedito_id` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
