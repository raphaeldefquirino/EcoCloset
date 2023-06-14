-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2023 às 04:10
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
  `nome_prod` varchar(25) NOT NULL,
  `descricao_prod` varchar(70) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `path` varchar(100) NOT NULL,
  `nome_og_arq` varchar(70) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastro_prod`
--

INSERT INTO `cadastro_prod` (`idproduto`, `nome_prod`, `descricao_prod`, `quantidade`, `valor`, `telefone`, `categoria`, `path`, `nome_og_arq`, `id_usu`) VALUES
(1, 'Camiseta básica', 'Camiseta de algodão de manga curta, cor branca, tamanho M.', 1, 29.99, '11888888888', 'Masculina', 'uploads/648912c30a3f1.jpg', 'camisa-preta-1.jpg', 1),
(2, 'Calça jeans', 'Calça jeans reta, lavagem clara, tamanho 32.', 1, 99.99, '11888888888', 'Masculina', 'uploads/64891330ea0ae.jpg', 'calca-jeans-masculina.jpg', 1),
(3, 'Moletom com capuz', 'Moletom com capuz, cor preto, bolso canguru, tamanho M.', 1, 69.99, '11888888888', 'Masculina', 'uploads/648913933faa8.jpg', 'moletom-masculino.jpg', 1),
(4, 'Camisa esportiva', 'Camiseta de poliéster, tamanho G.', 1, 39.99, '11986700022', '', 'uploads/64891410ba1e1.jpg', 'camisa-do-milan.jpg', 1),
(5, 'Camisa do Corinth', 'Camisa do timão, dri-fit, pouco usada, super confortável, ótima para e', 1, 150.99, '11888888888', 'Masculina', 'uploads/6489144d80863.jpg', 'camisa-corinthians-masculina.jpg', 1),
(6, 'Corta vento', 'Corta vento estilo e perfeito para aquele rolê com os amigos', 1, 75.50, '11888888888', 'Masculina', 'uploads/648914933c226.jpg', 'corta-vento.jpg', 1),
(7, 'Meia da nike', 'Meia importada, cano alto e macia', 1, 50.00, '11888888888', 'Masculina', 'uploads/6489150b0b778.jpg', 'meia-nike.jpg', 1),
(8, 'Camisa do Inter de Milão', 'Camisa do ineter de milão importada original', 1, 249.99, '11888888888', 'Masculina', 'uploads/648915690d242.jpg', 'camisa-do-milan.jpg', 1),
(9, 'Jaqueta puffer', 'Jaqueta puffer preta estilosa', 1, 300.00, '11777777777', 'Masculina', 'uploads/648915e4ddc53.jpg', 'bobojaco.jpg', 1),
(12, 'Corta vento', 'Corta vento rosa, impermeável lindo e veste super bem', 1, 449.99, '11888888888', 'Feminina', 'uploads/6489177e289ea.jpg', 'corta-vento-femino.jpg', 1),
(15, 'Jaqueta', 'Jaqueta verde muito linda', 1, 150.99, '11999999999', 'Feminina', 'uploads/6489192cebe5b.png', 'jaqueta-feminan-verde.png', 1),
(16, 'Vestido floral', 'Vestido estampado floral, alças finas, tamanho M.', 1, 79.99, '11777777777', 'Feminina', 'uploads/648919dcd61d4.jpg', 'floral.jpg', 1),
(17, 'Blusa de renda', 'Blusa de renda, cor branca, manga curta, tamanho P.', 0, 59.99, '11888888888', 'Feminina', 'uploads/64891a44e2d86.jpg', 'renda.jpg', 1),
(18, 'Saia plissada', 'Saia plissada, cor preta, comprimento midi, tamanho M.', 1, 150.99, '11888888888', 'Feminina', 'uploads/64891a7bee38d.jpg', 'plissada.jpg', 1),
(19, 'Vestido de festa', 'Vestido longo de festa, cor preto, decote em ligeiro, tamanho P.', 1, 449.99, '11888888888', 'Feminina', 'uploads/64891acf268bb.jpg', 'festa.jpg', 1),
(20, 'Blusa de seda', 'Blusa de seda, estampa de poá, manga longa, tamanho G.', 1, 29.99, '11888888888', 'Feminina', 'uploads/64891b1782fa1.jpg', 'seda.jpg', 1),
(21, 'Macacão pantacourt', '119.99', 1, 300.00, '11777777777', 'Feminina', 'uploads/64891b5116eb3.jpg', 'pantacourt.jpg', 1);

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
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
