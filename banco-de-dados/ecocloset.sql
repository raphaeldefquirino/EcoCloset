-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/11/2023 às 02:48
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

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
(5, 'Camisa do cortinas', 'Camisa mt loka do cortinas', 120.00, 'Feminina', '', 'Usado', 'uploads/6489144d80863.jpg', 'camisa-corinthians-masculina.jpg', 1),
(6, 'Corta vento', 'Corta vento estilo e perfeito para aquele rolê com os amigos', 75.50, 'Masculina', 'Jaqueta', 'Novo', 'uploads/648914933c226.jpg', 'corta-vento.jpg', 1),
(7, 'Meia da nike', 'Meia importada, cano alto e macia', 50.00, 'Masculina', '', '', 'uploads/6489150b0b778.jpg', 'meia-nike.jpg', 1),
(8, 'Camisa do Inter de Milão', 'Camisa do ineter de milão importada original', 249.99, 'Masculina', '', '', 'uploads/648915690d242.jpg', 'camisa-do-milan.jpg', 1),
(16, 'Vestido floral', 'Vestido estampado floral, alças finas, tamanho M.', 79.99, 'Feminina', '', '', 'uploads/648919dcd61d4.jpg', 'floral.jpg', 1),
(17, 'Blusa de renda', 'Blusa de renda, cor branca, manga curta, tamanho P.', 59.99, 'Feminina', '', '', 'uploads/64891a44e2d86.jpg', 'renda.jpg', 1),
(18, 'Saia plissada', 'Saia plissada, cor preta, comprimento midi, tamanho M.', 150.99, 'Feminina', '', '', 'uploads/64891a7bee38d.jpg', 'plissada.jpg', 1),
(19, 'Vestido de festa', 'Vestido longo de festa, cor preto, decote em ligeiro, tamanho P.', 449.99, 'Feminina', '', '', 'uploads/64891acf268bb.jpg', 'festa.jpg', 1),
(21, 'Macacão pantacourt', 'Macacão pantacourt, cor preta, alças ajustáveis, tamanho M.', 300.00, 'Feminina', '', '', 'uploads/64891b5116eb3.jpg', 'pantacourt.jpg', 1),
(23, 'Body de vaquinha', 'Body estilo vaquinha super fofo e confortável', 70.00, 'Kids', 'Macacão', 'Usado', 'uploads/6514ad06cfa72.jpg', 'bodyvaquinha.jpg', 1),
(28, 'teset', 'teste', 50.00, 'Masculina', 'Calça', 'Pouco usado', 'uploads/6531699d57995.png', 'Captura de Tela (1).png', 2),
(29, 'teste', 'teste', 899.00, 'Feminina', 'Calça', 'Usado', 'uploads/65316fd761082.jpg', 'pexels-ray-piedra-1464625.jpg', 1),
(30, 'teste', 'teset', 75.00, 'Feminina', 'Calça', 'Usado', 'uploads/6531700d70743.jpg', 'pexels-ray-piedra-1464625.jpg', 1),
(35, 'teste', '432', 432.00, 'Masculina', 'Shorts', 'Novo', 'uploads/6542608ca7c6b.png', 'Captura de Tela (1).png', 4),
(36, 'Conjunto do barcelona', 'conjunto infantil Barcelona, usado apenas 2x composição do tecido: 100', 500.00, 'Kids', 'Camisa', 'Pouco usado', 'uploads/65429f5800061.jpg', 'conjunto-barcelona.jpg', 1),
(37, 'Kit 2 macacões', 'kit 2 macacão carte\'s 6-9m  novo com etiqueta', 179.99, 'Kids', 'Macacão', 'Novo', 'uploads/6542a0693f0c2.jpg', 'macacão.jpg', 1),
(38, 'Boneco do stich', 'personagem stitch em pelúcia antialérgico, super fofo', 80.00, 'Kids', 'Acessório', 'Pouco', 'uploads/6542a2fa6b749.jpg', 'stich.jpg', 1),
(42, 'Sapatinho do Mickey Mouse', 'tamanho 23. usado poucas x , possui marcas de uso no Mickey do pé esqu', 35.90, 'Kids', 'Calçado', 'Usado', 'uploads/6542aa64ecd84.jpg', 'tenis-mickey.jpg', 1),
(43, 'Vestido vermelho', 'vestido infantil vermelho marca colorittá tamanho 4', 20.00, 'Kids', 'Vestido', 'Pouco', 'uploads/6542ab92430df.png', 'vestido infantil.png', 1),
(44, 'Macacão Jeans', 'jardineira jeans infantil usada, sem detalhes! com lindos bordados.', 50.00, 'Kids', 'Macacão', 'Pouco', 'uploads/6542ad2899ca4.jpg', 'macacao jeans.jpg', 1),
(45, 'Legging', 'Kit com duas calças legging, usado algumas vezes porém em perfeito est', 20.00, 'Kids', 'Legging', 'Usado', 'uploads/6542ad87b63cc.jpg', 'calças-legging.jpg', 1);

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
  `complemento` varchar(25) NOT NULL,
  `path_user` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`idusuario`, `email`, `senha`, `nome`, `sobrenome`, `telefone`, `CEP`, `endereco`, `complemento`, `path_user`) VALUES
(1, 'rapha@gmail.com', '123', 'Raphael', 'de França Quirino', '(11)98670022', '05445-020', 'Rua do sobe e desce, Número 2000, Santa Paula, São', 'Ap 530, Bloco A', 'uploads/65428335c6247.jpg'),
(2, 'arthur@gmail.com', '123', 'Arthur', 'Bergamaço Alves', '(11)  98967033', '04303-150', 'Rua dos Guararapes, Vila Formosa, São Paulo, Númer', 'Casa 3', 'uploads/6531695eec41a.png'),
(3, 'kaue@gmail.com', '123', 'Kaue', 'Fedido', '45909', '48946549', 'rua', 'casa 2', ''),
(4, 'nicolas@gmail.com', '123', 'Nicolas', 'de Lima', '(11) 989898989', '09560-010', 'Rua do gurarapis', 'Barraco 2', 'uploads/foto-user-exe.png'),
(5, 'gil@gmail.com', '123', 'Gil', 'Gil', '(11)8998898', '06590-040', 'Rua do sobe e desce', 'Ap 2', 'uploads/foto-user-exe.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `idendereco` int(11) NOT NULL,
  `nome_end` varchar(35) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `cidade` varchar(55) NOT NULL,
  `bairro` varchar(55) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(35) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `idusuario`, `status`, `idproduto`) VALUES
(58, 1, 'carrinho', 7),
(62, 0, 'carrinho', 23),
(67, 5, 'carrinho', 36);

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
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`idendereco`);

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
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
