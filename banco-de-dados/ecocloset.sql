-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jun-2023 às 04:57
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
  `descricao_prod` varchar(70) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `path` varchar(100) NOT NULL,
  `nome_og_arq` varchar(70) NOT NULL,
  `id_usu` int(11) NOT NULL
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
-- Extraindo dados da tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`idusuario`, `email`, `senha`, `nome`, `telefone`, `CEP`) VALUES
(1, 'rapha@gmail.com', '123', 'Raphael', '11900000000', ''),
(2, 'arthur@gmail.com', '123', 'Arthut Bergamaço', '11777777777', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `id_usu` (`id_usu`);

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
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  ADD CONSTRAINT `cadastro_prod_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `cadastro_usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
