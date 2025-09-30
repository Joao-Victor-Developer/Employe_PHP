-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Set-2025 às 00:09
-- Versão do servidor: 5.6.13
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `func_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `employe_db`
--

CREATE TABLE `employe_db` (
  `n_registro` char(12) NOT NULL DEFAULT '',
  `name_employe` varchar(40) DEFAULT NULL,
  `emission_date` date DEFAULT NULL,
  `position` varchar(40) NOT NULL,
  `qtd_sal` decimal(10,2) NOT NULL,
  `qtd_bruto` decimal(10,2) NOT NULL,
  `inss` decimal(10,2) DEFAULT NULL,
  `sal_liq` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `employe_db`
--
ALTER TABLE `employe_db`
  ADD PRIMARY KEY (`n_registro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
