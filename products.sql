SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `developer-test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `attribute` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `attribute`) VALUES
(1, 'JVC200123', 'name', '1.00', 'dvds', '700'),
(2, 'TR120555', 'name', '12.00', 'books', '1'),
(3, 'GGWP00070', 'War and pigs', '10.00', 'books', '2');
COMMIT;

