-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2023 às 00:29
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecocloset`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_prod`
--

CREATE TABLE `cadastro_prod` (
  `idproduto` int(11) NOT NULL,
  `nome_prod` varchar(17) NOT NULL,
  `descricao_prod` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `path` varchar(100) NOT NULL,
  `nome_og_arq` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_usuario`
--

CREATE TABLE `cadastro_usuario` (
  `idusuario` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `CEP` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  ADD PRIMARY KEY (`idproduto`);

--
-- Índices para tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
