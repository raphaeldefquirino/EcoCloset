-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2023 às 20:56
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
  `descricao_prod` varchar(255) NOT NULL,
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
(36, 'Camisa do marcão', 'aletaria', 35.00, 'Kids', 'Macacão', 'Pouco usado', 'uploads/65429f5800061.jpg', 'conjunto-barcelona.jpg', 1),
(37, 'Kit 2 macacões', 'kit 2 macacão carte\'s 6-9m  novo com etiqueta', 179.99, 'Kids', 'Macacão', 'Novo', 'uploads/6542a0693f0c2.jpg', 'macacão.jpg', 1),
(38, 'Boneco do stich', 'personagem stitch em pelúcia antialérgico, super fofo', 80.00, 'Kids', 'Acessório', 'Pouco', 'uploads/6542a2fa6b749.jpg', 'stich.jpg', 1),
(42, 'Sapatinho do Mickey Mouse', 'tamanho 23. usado poucas x , possui marcas de uso no Mickey do pé esqu', 35.90, 'Kids', 'Calçado', 'Usado', 'uploads/6542aa64ecd84.jpg', 'tenis-mickey.jpg', 1),
(43, 'Vestido vermelho', 'vestido infantil vermelho marca colorittá tamanho 4', 20.00, 'Kids', 'Vestido', 'Pouco', 'uploads/6542ab92430df.png', 'vestido infantil.png', 1),
(44, 'Macacão Jeans', 'jardineira jeans infantil usada, sem detalhes! com lindos bordados.', 50.00, 'Kids', 'Macacão', 'Pouco', 'uploads/6542ad2899ca4.jpg', 'macacao jeans.jpg', 1),
(45, 'Legging', 'Kit com duas calças legging, usado algumas vezes porém em perfeito est', 20.00, 'Kids', 'Legging', 'Usado', 'uploads/6542ad87b63cc.jpg', 'calças-legging.jpg', 1),
(46, 'jaqueta the north face', 'modelo do outono de 2022. jaqueta original, vendida e entregue pela the north face. trouxe dos eua. estilo ícone da marca, 700 fill goose down. usada, muito bem conservada porém apresenta algumas manchas na parte inferior das costas. tenho outros modelos ', 1000.00, 'Masculina', 'Blusa', 'Pouco usado', 'uploads/6548187395e0c.jpg', 'jaqueta-thenorth.jpg', 4),
(47, 'Calça Jeans', 'calça jeans claro marca: clock house destroyed cor: azul claro botão e ilhós timbrados tamanho: 40 44cm cintura x 110cm comprimento quadril 53cm barra original', 90.00, 'Masculina', 'Calça', 'Usado', 'uploads/6548194043d1b.jpg', 'calca-jeans.jpg', 4),
(48, 'Shorts azul', 'shorts em ótimo estado de conservação sem detalhes, sem averias  original  shorts com forro de mesh na,parte interna possui cordas na cintura  tamanho m comprimento 50cm cintura 82cm (com elastico e corda na cintura)', 25.00, 'Masculina', 'Shorts', 'Usado', 'uploads/6548199218e0f.jpg', 'shorts-adidas.jpg', 4),
(49, 'shoulder bag vans', 'moderna e cheia de estilo é essa shoulder bag vans. possui alças reguláveis para melhor ajuste, conforto e praticidade, permitindo maior liberdade dos movimentos no transporte. além disso, o logo da marca em destaque garante sua qualidade em todos os deta', 149.99, 'Masculina', 'Acessório', 'Pouco Usado', 'uploads/654819eddd4f5.jpg', 'sholder-vans.jpg', 4),
(51, 'jaqueta louis vuitton', 'jaqueta louis vuitton, coleção 2021, inspirada em james baldwin, novíssimo', 5350.00, 'Masculina', 'Blusa', 'Pouco Usado', 'uploads/65481b90c065a.jpg', 'blusa-lv.jpg', 4),
(52, 'camiseta champions', 'camiseta champions, escrita em alto relevo. pouco utilizada.', 49.99, 'Masculina', 'Camisa', 'Pouco Usado', 'uploads/65481be5e7f4b.jpg', 'camisa-champions.jpg', 4),
(53, 'óculos de sol ray ban', 'gênero: unissex modelo: rb4108 material da armação: acetato material da lente: vidro  medidas(mm) : - largura da lente 50mm - ponte 22mm  produto acompanha: caixa, case protetora, flanela para limpeza e flyer da marca  produto novo disponível à pronta ent', 130.00, 'Masculina', 'Acessório', 'Novo', 'uploads/65481c3f6d05d.jpg', 'oculos-rb.jpg', 4),
(54, 'camisa listrada topman', 'camisa listrada vermelho/preto/azul/branco da marca topman, confeccionada em 100% viscose. usada, ótimo estado de conservação, sem manchas ou defeitos. tamanho g, comprimento [cintura a barra] 72 cm, largura [cintura] 56 cm e manga [ombro a punho] 23 cm.', 100.00, 'Masculina', 'Camisa', 'Pouco Usado', 'uploads/65481c7b56bc7.jpg', 'camisa-listradas.jpg', 4),
(55, 'Camisa do Vasco', '- camisa vasco - ano: 23/24 - modelo: torcedor - tamanho: do p ao g - prazo de entrega: 15 a 25 dias - importada da tailândia', 300.00, 'Masculina', 'Camisa', 'Novo', 'uploads/65481d17a6427.jpg', 'camisa-vascao.jpg', 4),
(56, 'nike impact 3', 'original usado 1 vez 10/10 com box tamanho 42 brasil 10 us', 559.99, 'Masculina', 'Calçado', 'Novo', 'uploads/65481d48752e2.jpg', 'nikao.jpg', 4),
(57, 'bermuda moletom nike', 'bermuda nike original com uma pequena manchinha comprimento 38 cintura 85 com elástico', 85.00, 'Masculina', 'Shorts', 'Pouco Usado', 'uploads/65481d7b6beaf.jpg', 'bermuda-nike.jpg', 4),
(58, 'porta cartão dior', 'porta cartão dior - muito bem conservado', 90.00, 'Masculina', 'Acessório', 'Pouco Usado', 'uploads/65481daa5eb19.jpg', 'carteira.jpg', 4),
(59, 'Blusa da zara', 'blusa estampa floral zara tam p tecido algodão, mangas bufante, decote coração na frente, zíper invisível na lateral, peça linda impecável sem detalhes ou marcas de uso, cor viva medida busto 84cm comprimento da altura do colo a barra 37cm', 59.99, 'Feminina', 'Blusa', 'Pouco Usado', 'uploads/65481e277439c.jpg', 'blusa-zara.jpg', 4),
(60, 'Vestido estampado', 'Vestido curto  - closet collection estampado.', 120.00, 'Feminina', 'Vestido', 'Pouco Usado', 'uploads/65481e7719c99.jpg', 'vestido-estampado.jpg', 4),
(61, 'Vestido de onçinha', 'vestido estampado de oncinha, em tule com elastano, forro curto, lastex logo abaixo do busto, mangas bufantes com detalhe de lastex. medidas: busto - 40cm (sem esticar); decote - 15cm; lastex abaixo do busto - 32cm (sem esticar) e 56cm (esticado); quadril', 50.00, 'Feminina', 'Vestido', '', 'uploads/65481ee5cc8f7.jpg', 'vestido-oncinha.jpg', 4),
(62, 'Salto preto moleca', 'sapato de salto com tira ajustável no peito do pé, cor preta, tamanho 34', 90.00, 'Feminina', 'Calçado', 'Usado', 'uploads/65481f1300efa.jpg', 'salto.jpg', 4),
(63, 'Moletom da bilabong', 'casaco original em moletom, quente e confortável. já duas pequenas manchas de tinta nas costas ( ver fotos). cor vermelho ferrugem tamanho 16 anos medidas comprimento 60 cm largura 50 cm mangas 60 cm', 70.00, 'Feminina', 'Blusa', '', 'uploads/65481f41c2b9e.jpg', 'moletom-bilabong.jpg', 4),
(64, 'bolsa red flamingo', 'bolsa marrom tamanho médio 3 repartições', 20.00, 'Feminina', 'Acessório', 'Usado', 'uploads/65481f6ce22cf.jpg', 'bolsa-marrom.jpg', 4),
(65, 'mochila arezzo em couro', 'mochila grande de couro preta. tem formato estruturado, alça de mão e duas alças reguláveis atrás. fecho em zíper com puxador e bolso frontal. aposta prática e versátil, é espaçosa e perfeita para produções do dia a dia!  marca: arezzo material: couro leg', 800.00, 'Feminina', 'Acessório', 'Pouco Usado', 'uploads/65481f9fba27e.jpg', 'mochila-cara.jpg', 4),
(66, 'Vestido de fruta farm', 'lindo vestido vento de fruta. tamanho m . farm', 120.00, 'Feminina', 'Vestido', 'Novo', 'uploads/65481fd734581.jpg', 'vestido-fruta.jpg', 4),
(67, 'cropped manguinha', 'cropped de manga comprida, na cor marrom claro ou doce de leite, com duas tiras de amarração, decote v. ele é um tecido super molinho e confortável. está em perfeito estado', 90.00, 'Feminina', 'Cropped', 'Pouco Usado', 'uploads/65482023a1ff1.jpg', 'cropped-manguinha.jpg', 4),
(68, 'blusa e bermuda', 'blusa estampada , veste m bermuda branca , veste m ambos ser avarias', 100.00, 'Feminina', 'Conjunto', 'Novo', 'uploads/6548204cb722e.jpg', 'conjunto.jpg', 4),
(69, 'Calça Jeans', 'pensa na fofurice dessa calça momm', 20.00, 'Feminina', 'Calça', 'Pouco Usado', 'uploads/65482080f0576.jpg', 'jeans-gme.jpg', 4),
(70, 'Short Jeans', 'short jeans cintura alta tam 42 pouco uso (estado de novo) marca yesica (c&a)', 40.00, 'Feminina', 'Calça', 'Usado', 'uploads/654820b7dd7d3.jpg', 'short-jeans.jpg', 4),
(71, 'conjunto infantil menino', 'conjunto camiseta e bermuda infantil menino novo marca malwee 100% algodão . tamanho 6 anos !!! acompanha caixa personalizada com sede e brinde fini', 110.00, 'Kids', 'Conjunto', 'Novo', 'uploads/6548213bd9084.jpg', 'conjunto-infan.jpg', 1),
(72, 'galocha infantil rosa', 'bota infantil galocha de borracha rosa bebê , forrada por dentro, da pucca tam 30', 30.00, 'Kids', 'Calçado', 'Pouco Usado', 'uploads/6548215db50c8.jpg', 'galocha.jpg', 1),
(73, 'mochila skip hop', 'mochilinha skip hop, ela guia mas está em a coleira. bem conservada e sem avaria', 150.00, 'Kids', 'Acessório', 'Pouco Usado', 'uploads/6548217def40d.jpg', 'mochila-skip.jpg', 1),
(74, 'vestido branco batizado i', 'vestido ideal para batizados, festas, dama de honra está em ótimo estado de conservação tamanho g', 40.00, 'Kids', 'Vestido', 'Usado', 'uploads/654821a5c43f1.jpg', 'vesitdo-infan.jpg', 1),
(75, 'bermuda jeans', 'shorts infantil bermuda jeans preto esverdeado tam 14 novo otimo estado tecido de qualidade', 20.00, 'Kids', 'Shorts', 'Usado', 'uploads/654821dc848a7.jpg', 'bermuda-jeasn.jpg', 1);

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
  `path_user` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`idusuario`, `email`, `senha`, `nome`, `sobrenome`, `telefone`, `path_user`) VALUES
(1, 'rapha@gmail.com', 'raphael@123', 'Raphael', 'de França Quirino', '(11) 98670-0022', 'uploads/foto-user-exe.png'),
(2, 'arthur@gmail.com', 'arthur@123', 'Arthur', 'Bergamaço Alves', '(11)  98967033', 'uploads/foto-user-exe.png'),
(3, 'adm@gmail.com', 'adm123adm', 'adm', 'adm', '(11)90909090', 'uploads/foto-user-exe.png'),
(4, 'nicolas@gmail.com', '123', 'Nicolas', 'de Lima', '(11) 989898989', 'uploads/foto-user-exe.png');

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

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`idendereco`, `nome_end`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `idusuario`) VALUES
(1, 'Minha casa', '09561-085', 'São José do Rio Preto', 'Águas Claras', 'Av. Dos Guararapis', '2000', 'Bloco C', 1),
(4, 'Trabalho', '09054-101', 'São Leopoldo', 'Surupá do Norte', 'Rua do Kennedy', '2000', 'Ap 21', 1);

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
(81, 1, 'carrinho', 48),
(85, 1, 'carrinho', 73),
(86, 1, 'carrinho', 57);

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
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
