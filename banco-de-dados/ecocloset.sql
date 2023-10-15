-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/10/2023 às 22:49
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `cadastro_prod`
--

CREATE TABLE `cadastro_prod` (
  `idproduto` int(11) NOT NULL,
  `nome_prod` varchar(25) NOT NULL,
  `descricao_prod` varchar(70) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `subcategoria` varchar(25) NOT NULL,
  `condicao` varchar(30) NOT NULL,
  `path` varchar(100) NOT NULL,
  `nome_og_arq` varchar(70) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_prod`
--

INSERT INTO `cadastro_prod` (`idproduto`, `nome_prod`, `descricao_prod`, `valor`, `categoria`, `subcategoria`, `condicao`, `path`, `nome_og_arq`, `id_usu`) VALUES
(1, 'Camiseta básica', 'Camiseta de algodão de manga curta, cor branca, tamanho M.', 29.99, 'Masculina', '', '', 'uploads/648912c30a3f1.jpg', 'camisa-preta-1.jpg', 1),
(4, 'Camisa esportiva', 'Camiseta de poliéster, tamanho G.', 39.99, '', '', '', 'uploads/64891410ba1e1.jpg', 'camisa-do-milan.jpg', 1),
(5, 'Camisa do Corinth', 'Camisa do timão, dri-fit, pouco usada, super confortável, ótima para e', 150.99, 'Masculina', '', '', 'uploads/6489144d80863.jpg', 'camisa-corinthians-masculina.jpg', 1),
(6, 'Corta vento', 'Corta vento estilo e perfeito para aquele rolê com os amigos', 75.50, 'Masculina', '', '', 'uploads/648914933c226.jpg', 'corta-vento.jpg', 1),
(7, 'Meia da nike', 'Meia importada, cano alto e macia', 50.00, 'Masculina', '', '', 'uploads/6489150b0b778.jpg', 'meia-nike.jpg', 1),
(8, 'Camisa do Inter de Milão', 'Camisa do ineter de milão importada original', 249.99, 'Masculina', '', '', 'uploads/648915690d242.jpg', 'camisa-do-milan.jpg', 1),
(12, 'Corta vento', 'Corta vento rosa, impermeável lindo e veste super bem', 449.99, 'Feminina', '', '', 'uploads/6489177e289ea.jpg', 'corta-vento-femino.jpg', 1),
(15, 'Jaqueta', 'Jaqueta verde muito linda', 150.99, 'Feminina', '', '', 'uploads/6489192cebe5b.png', 'jaqueta-feminan-verde.png', 1),
(16, 'Vestido floral', 'Vestido estampado floral, alças finas, tamanho M.', 79.99, 'Feminina', '', '', 'uploads/648919dcd61d4.jpg', 'floral.jpg', 1),
(17, 'Blusa de renda', 'Blusa de renda, cor branca, manga curta, tamanho P.', 59.99, 'Feminina', '', '', 'uploads/64891a44e2d86.jpg', 'renda.jpg', 1),
(18, 'Saia plissada', 'Saia plissada, cor preta, comprimento midi, tamanho M.', 150.99, 'Feminina', '', '', 'uploads/64891a7bee38d.jpg', 'plissada.jpg', 1),
(19, 'Vestido de festa', 'Vestido longo de festa, cor preto, decote em ligeiro, tamanho P.', 449.99, 'Feminina', '', '', 'uploads/64891acf268bb.jpg', 'festa.jpg', 1),
(20, 'Blusa de seda', 'Blusa de seda, estampa de poá, manga longa, tamanho G.', 29.99, 'Feminina', '', '', 'uploads/64891b1782fa1.jpg', 'seda.jpg', 1),
(21, 'Macacão pantacourt', 'Macacão pantacourt, cor preta, alças ajustáveis, tamanho M.', 300.00, 'Feminina', '', '', 'uploads/64891b5116eb3.jpg', 'pantacourt.jpg', 1),
(23, 'Body de vaquiinha', 'Body de vaquinh muito fofo e confortavel', 79.99, 'Kids', 'camisa', 'Novo', 'uploads/6514ad06cfa72.jpg', 'bodyvaquinha.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_usuario`
--

CREATE TABLE `cadastro_usuario` (
  `idusuario` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `complemento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`idusuario`, `email`, `senha`, `nome`, `sobrenome`, `telefone`, `CEP`, `endereco`, `complemento`) VALUES
(1, 'raphina@gmail.com', '123', 'Rapel', 'Quirinin', '(11)42245249', '0754390-1', 'Rua do sobre e desc e ', 'casa 1 '),
(2, 'arthur@gmail.com', '123', 'Arthut Bergamaço', '', '11777777777', '', '', ''),
(3, 'kaue@gmail.com', '123', 'Kaue', 'Fedido', '45909', '48946549', 'rua', 'casa 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Índices de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cadastro_prod`
--
ALTER TABLE `cadastro_prod`
  ADD CONSTRAINT `cadastro_prod_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `cadastro_usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
