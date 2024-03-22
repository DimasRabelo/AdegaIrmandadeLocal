-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/03/2024 às 03:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adegairmandade`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblbanner`
--

CREATE TABLE `tblbanner` (
  `idBanner` int(11) NOT NULL,
  `nomeBanner` varchar(50) NOT NULL,
  `altBanner` varchar(50) NOT NULL,
  `fotoBanner` varchar(100) NOT NULL,
  `statusBanner` varchar(10) NOT NULL,
  `paginaDestino` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblbanner`
--

INSERT INTO `tblbanner` (`idBanner`, `nomeBanner`, `altBanner`, `fotoBanner`, `statusBanner`, `paginaDestino`) VALUES
(1, 'bannerbalde', 'banner/balde', 'banner/bannerbalde.png', '', 'PÁGINA-BEBIDAS/CERVEJAS'),
(2, 'bannerdestilado', 'banner/destilado', 'banner/bannerdestilado.png', 'ATIVO', 'PÁGINA-BEBIDAS/DESTILADOS'),
(4, 'bannertabacaria', 'banner/tabacaria ', 'banner/bannertabacaria.png', 'ATIVO', 'PÁGINA-TABACARIA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblcontato`
--

CREATE TABLE `tblcontato` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(50) NOT NULL,
  `emailContato` varchar(80) NOT NULL,
  `telefoneContato` varchar(14) NOT NULL,
  `mensagemContato` text NOT NULL,
  `dataContato` date NOT NULL DEFAULT curdate(),
  `statusContato` varchar(10) DEFAULT NULL,
  `horaContato` time NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblcontato`
--

INSERT INTO `tblcontato` (`idContato`, `nomeContato`, `emailContato`, `telefoneContato`, `mensagemContato`, `dataContato`, `statusContato`, `horaContato`) VALUES
(2, 'Dimas Aparecido Rabelo de Souza', 'dimas_ap_souza@yahoo.com.br', '11972495017', 'oi', '2023-11-06', 'RESPONDIDO', '21:53:03'),
(3, 'Dimas Aparecido Rabelo de Souza', 'imediato.2022@gmail.com', '11972495017', 'oi', '2023-11-06', 'ATIVO', '21:53:03'),
(4, 'Dimas Aparecido Rabelo de Souza', 'imediato.2022@gmail.com', '11972495017', 'oi', '2023-11-06', 'DESATIVADO', '21:53:03'),
(5, 'Dimas Aparecido Rabelo de Souza', 'imediato.2022@gmail.com', '11972495017', 'oi', '2023-11-06', 'ATIVO', '21:53:03'),
(6, 'Dimas Aparecido Rabelo de Souza', 'imediato.2022@gmail.com', '11972495017', 'oi', '2023-11-06', 'ATIVO', '21:53:03'),
(7, 'Dimas Aparecido Rabelo de Souza', 'sandramarquesmacedoni@Gmail.com', '11972495017', 'Moh Teste do disparo do email do site da Adega rsrs', '2023-11-06', 'ATIVO', '21:53:03'),
(8, 'Dimas Aparecido Rabelo de Souza', 'sandramarquesmacedoni@gmail.com', '11972495017', 'Mozinhooooooo', '2023-11-06', 'ATIVO', '21:58:24'),
(9, 'Dimas Aparecido Rabelo de Souza', 'sandramarquesmacedoni@gmail.com', '11972495017', 'moh', '2023-11-06', 'RESPONDIDO', '22:07:50'),
(10, 'Dimas Aparecido Rabelo de Souza', 'dimas.rabelosouza@gmail.com', '11972495017', 'didi', '2023-11-06', 'ATIVO', '22:08:33'),
(11, 'Dimas Aparecido Rabelo de Souza', 'dimas.rabelosouza@gmail.com', '11972495017', 'didi', '2023-11-06', 'ATIVO', '22:23:30'),
(12, 'Paula Marques ', 'paulamarques@yahoo.com.br ', '112233-4455 ', 'Olá tudo bem ', '2023-11-11', 'ATIVO ', '12:00:01'),
(13, 'Jose Paulo ', 'josepaulo@outlook.com ', '112345-9898 ', 'Gostaria de fazer uma visita ', '2023-11-02', 'ATIVO ', '16:15:35'),
(14, 'Eduardo Silva ', 'eduardosilva@gmail.com ', '114567-6547 ', 'Qual o Horário de funcionamento ', '2023-11-03', 'ATIVO ', '08:57:21'),
(15, 'Sandra Macedo ', 'sandramacedo@hotmail.com ', '116545-0702 ', 'O ambiente é tranquilo? ', '2023-11-04', 'ATIVO ', '10:00:11'),
(16, 'Lucimar Prado ', 'lucimarprado@gmail.com ', '113534-4532 ', 'Vocês vendem qualquer tipo de essência?', '2023-11-04', 'ATIVO ', '13:15:00'),
(17, 'Augusto Brasileiro ', 'augustobrasileiro@gmail.com ', '127867-2114 ', 'Terá transmissão do jogo do Corinthians? ', '2023-11-05', 'ATIVO ', '17:30:23'),
(18, 'Vanessa Silva ', 'vanessasilva@gmail.com ', '116644-9999 ', 'Posso montar meu Balde com qualquer tipo de cerveja? ', '2023-11-06', 'ATIVO ', '18:23:56'),
(19, 'Ronaldo Baptista ', 'ronaldobaptista@hotmail.com ', '114646-4444 ', 'Vocês vendem Online ou só presencial ', '2023-10-31', 'ATIVO ', '20:01:01'),
(20, 'Kennedy Bryan ', 'kennedybryan@bol.com ', '119955-3388 ', 'Sou representante da Ambev gostaria de Agendar uma visita. ', '2023-10-30', 'ATIVO ', '22:00:37'),
(21, 'Max Pires ', 'maxpires@gmail.com ', '118787-2829 ', 'Seu comércio fica próximo da Academia? ', '2023-10-28', 'ATIVO ', '23:41:38'),
(22, 'Dimas dimasrabelo', 'dimas_ap_souza@yahoo.com.br', '11972495017', 'teste', '2023-12-15', 'RESPONDIDO', '16:44:21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblestoque`
--

CREATE TABLE `tblestoque` (
  `idEstoque` int(11) NOT NULL,
  `nomeEstoque` varchar(100) DEFAULT NULL,
  `quantidadeEstoque` int(11) DEFAULT NULL,
  `dataCadastroEstoque` date DEFAULT curdate(),
  `dataAtualiEstoque` date DEFAULT curdate(),
  `statusEstoque` varchar(10) DEFAULT NULL,
  `horaEstoque` time DEFAULT curtime(),
  `idProduto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblestoque`
--

INSERT INTO `tblestoque` (`idEstoque`, `nomeEstoque`, `quantidadeEstoque`, `dataCadastroEstoque`, `dataAtualiEstoque`, `statusEstoque`, `horaEstoque`, `idProduto`) VALUES
(3, '', 900, '2023-12-21', '2023-10-01', 'ATIVO', '19:01:29', 1),
(4, '', 200, '2023-12-21', '2023-10-05', 'ATIVO', '19:01:29', 2),
(5, 'whiskis', 400, '2023-12-21', '2023-10-17', 'ATIVO', '19:01:29', 3),
(6, 'CERVEJAS', 800, '2023-12-21', '2023-10-23', 'ATIVO', '19:01:29', 4),
(7, '', 150, '2023-12-21', '2023-10-12', 'ATIVO', '19:01:29', 5),
(8, '', 750, '2023-12-21', '2023-10-01', 'ATIVO', '19:01:29', 6),
(9, '', 900, '2023-12-21', '2023-10-02', 'ATIVO', '19:01:29', 7),
(10, '', 600, '2023-12-21', '2023-10-18', 'ATIVO', '19:01:29', 8),
(11, '', 550, '2023-12-21', '2023-10-31', 'ATIVO', '19:01:29', 9),
(12, '', 300, '2023-12-21', '2023-10-22', 'DESATIVADO', '19:01:29', 10),
(13, 'Cervejas', 600, '2023-12-21', '2023-12-21', 'ATIVO', '21:55:04', 5),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblfuncionarios`
--

CREATE TABLE `tblfuncionarios` (
  `idFuncionario` int(11) NOT NULL,
  `nomeFuncionario` varchar(50) NOT NULL,
  `altFuncionario` varchar(50) NOT NULL,
  `cargoFuncionario` varchar(20) NOT NULL,
  `dataNascFuncionario` date NOT NULL,
  `emailFuncionario` varchar(80) NOT NULL,
  `senhaFuncionario` varchar(20) NOT NULL,
  `nivelFuncionario` varchar(15) NOT NULL,
  `dataAdmissaoFuncionario` date NOT NULL,
  `enderecoFuncionario` varchar(50) NOT NULL,
  `telFuncionario` varchar(15) NOT NULL,
  `cepFuncionario` varchar(10) NOT NULL,
  `statusFuncionario` varchar(10) NOT NULL,
  `fotoFuncionario` varchar(100) DEFAULT NULL,
  `linkFaceFuncionario` varchar(150) NOT NULL,
  `linkInstaFuncionario` varchar(150) NOT NULL,
  `linkWhatsFuncionario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblfuncionarios`
--

INSERT INTO `tblfuncionarios` (`idFuncionario`, `nomeFuncionario`, `altFuncionario`, `cargoFuncionario`, `dataNascFuncionario`, `emailFuncionario`, `senhaFuncionario`, `nivelFuncionario`, `dataAdmissaoFuncionario`, `enderecoFuncionario`, `telFuncionario`, `cepFuncionario`, `statusFuncionario`, `fotoFuncionario`, `linkFaceFuncionario`, `linkInstaFuncionario`, `linkWhatsFuncionario`) VALUES
(1, 'ALAN COELHO BUENo', 'Foto/Funcionario/Gerente', 'GERENTE JUNIOR', '1990-06-16', 'alanloop@gmail.com', '', 'ADMINISTRADOR', '2021-03-02', 'Rua: Antonio Pinto Ferreira Filho,10', '1199878-5678', '08121-005', 'ATIVO', 'funcionario/alan.png', 'https://www.facebook.com/allan.coelho.58?mibextid=ZbWKwL', '@alancoelho', '11911226677/whatsapp'),
(2, 'WAGNITON COELHO ', 'wagnitoncoelho', 'SUPERVISOR', '1992-06-10', 'wagnitoncoelho@gmail.com', 'senha345', 'ADMINISTRADOR', '2021-03-02', 'RUA: ALBUQUERQUE FREITAS-08', '(11)99777-6666', '08100-005', 'ATIVO', 'funcionario/wagniton.png', 'wagnitoncoelho/facebook.com', '@wagnitoncoelho', '11923457689/whatsapp'),
(4, 'ENZO GOUVEIA', 'Foto/Funcionario/ATENDENTE', 'AUXILIAR', '1995-05-12', 'enzogouvei@gmail.com', 'senhaABC', 'USUARIO', '2021-03-20', 'Rua: A - 24', '1198965-3232', '08123-010', 'ATIVO', 'funcionario/enzo.png', 'enzogouveia/facebook.com', '@enzogouveia', '11912875600/whatsapp'),
(9, 'RENATO OCELA', 'Foto/Funcionario/ajudante', 'AJUDANTE', '1989-05-02', 'renatoocela@gmail.com', 'senha#3F', 'USUARIO', '2021-03-02', 'Rua: Renata Agondi,10', '1199999-5577', '02122-105', 'ATIVO', 'funcionario/renato.png', 'renato/facebook.com', '@renato', '11999995577/whatsapp'),
(10, 'MARLENE RABELO', 'Foto/Funcionario/ajudante', 'AJUDANTE', '1985-12-05', 'marlenerabelo@gmail.com', 'senhaJLM', 'USUARIO', '2021-03-10', 'Rua: Chuva da Montanha,13', '1195889-6161', '09100-006', 'ATIVO', 'funcionario/marlene.png', 'marlenesouza/facebook.com', '@marlenesouza', '11958896161/whatsapp'),
(12, 'ARTUR ALVIM BUENO', 'arturalvimbueno', 'AJUDANTE', '1995-05-11', 'arturalvim@gmail.com', 'senha456', 'USUARIO', '2021-03-01', 'RUA: MANOEL TOBIAS,344', '(11)95012-3408', '03010-330', 'ATIVO', 'funcionario/arturalvim.png', 'arturalvim/facebook.com', '@arturalvim', '11950123408/whatsapp'),
(13, 'BENEOBENES SILVA', 'beneobenessilva', 'AJUDANTE', '1987-08-26', 'beneobenes@yahoo.com.br', 'senhaZ12', 'USUARIO', '2023-08-20', 'RUA: SOLDADO AUGUSTO,345', '(11)97634-4478', '04500-123', 'ATIVO', 'funcionario/beneodenes.png', 'beneobenes/facebook.com', '@beneobenes', '11976344478/whatsapp'),
(14, 'LUDMILA RIBEIRO', 'ludmilaribeiro', 'RECEPCIONISTA', '2006-04-14', 'ludmilaribeiro@gmail.com', 'senha980', 'USUARIO', '2021-03-01', 'RUA: PEDRO GIL,50', '(11)91122-8989', '03300-400', 'ATIVO', 'funcionario/ludmila.png', 'ludmilaribeiro/facebook.com', '@ludmilaribeiro', '11911228989/whatsapp'),
(15, 'EMILLY RIBEIRO', 'Foto/Funcionario/atendente', 'ATENDENTE', '2000-01-31', 'emillyribeiro@gmail.com', 'senhaKML', 'USUARIO', '2023-08-20', 'Rua: Tijuco Preto,45', '1193456-1111', '22331-010', 'ATIVO', 'funcionario/emillyribeiro.png', 'emillyribeiro/facebook.com', '@emilly', '11934561111/whatsapp'),
(16, 'GORETE MILAGRES', 'goretemilagres', 'GERENTE', '1978-06-20', 'gorete@gmail.com', 'senha2023', 'ADMINISTRADOR', '2023-11-19', 'RUA:CORAÇÃO PAULISTA', '(11)99999-6666', '08121-115', 'ATIVO', 'funcionario/gorete.png', 'goretemilagre/facebook.com', '@goretemilagre', '1199999-6666/whatsapp'),
(17, 'FERNANDA MELLO', '', 'Administradora', '1990-05-25', 'fernanda@bol.com', '', 'Usuario', '2023-12-12', 'Rua Diego Sande, 670', '(11) 99999-9999', '08121-005', 'ATIVO', 'funcionario/fernanda.png', '', '', ''),
(18, 'JOÃO ALVARES', '', 'atendente', '2001-09-15', 'joaolavares@gmail.com', '', 'Usuario', '2023-11-01', 'Rua bacardi, 34', '(11) 99999-0000', '08121-005', 'ATIVO', 'funcionario/joao-guilherme.png', '', '', ''),
(19, 'DIEGO DA COSTA SILVA', '', 'Gestor de Compras', '1985-07-01', 'diegocosta@gmail.com', '', 'Administrador', '2024-01-20', 'Rua Soldado Geraldo Augusto, 34', '(11) 96565-8989', '08121-005', 'ATIVO', 'funcionario/diego.png', '', '', ''),
(20, 'SESHOMARU YAKASHAKY', '', 'Gerente de Vendas', '1990-07-25', 'seshomaru@gmail.com', '', 'Administrador', '2024-01-21', 'Rua Bernadino Alves, 654', '(11) 97878-9594', '08234-666', 'ATIVO', 'funcionario/sesshomaru.png', '', '', ''),
(21, 'ZÉ DO CAIXÃO', '', 'Auxiliar de Limpeza', '1970-09-18', 'zecaixao@gmail.com', '', 'usuario', '2024-01-04', 'rua da morte , 1570', '(11) 99999-9999', '12345-678', 'ATIVO', 'funcionario/ze-do-caixao.webp', '', '', ''),
(22, 'DIMAS APARECIDO', 'dimasaparecido', 'AJUDANTE', '1987-05-25', 'dimas_ap_souza@yahoo.com.br', '123456', 'ADMINISTRADOR', '2024-03-05', 'RUA ANTONIO PINTO FERREIRA FILHO,34', '(11)97249-5017', '08121-005', 'ATIVO', 'funcionario/dimasaparecido.png', 'facebook/dimasrabelo', 'instagram/dimasrabelo', 'whatsapp/11972495017'),
(23, 'GABRIEL JESUS', 'gabrieljesus', 'JOGADOR', '1980-12-12', 'gabrieljesus@gmail.com', '123456', 'ADMINISTRADOR', '2024-02-11', 'RUA: A', '(11)99999-9999', '08111-000', 'ATIVO', 'funcionario/michaelcavalcante.png', 'facebook/gabrieljesus', 'instagram/gabrieljesus', 'whatsapp/1111111111'),
(24, 'RAMÓN VALDEZ', 'ramónvaldez', 'SÓCIO', '1924-09-02', 'seumadruga@gmail.com', '123456', 'ADMINISTRADOR', '2024-03-06', 'RUA CIDADE DO MÉXICO', '(11)98988-8888', '11111-111', 'DESATIVADO', 'funcionario/ramónvaldez.png', 'facebook/seumadruga', 'instagram/seumadruga', 'whatsapp/11989888888'),
(25, 'Silos Malfaio', '', 'lemista', '1970-02-23', 'silos@bol.com.br', '', 'Administrador', '2024-03-18', 'rua osama binlandem', '(11) 99999-9999', '08132-005', 'Seleciona ', 'funcionario/fotoUser.png', '', '', ''),
(26, 'clotilde', '', 'faxineira', '2000-12-12', 'clotilde@yahoo.com.br', '', 'Administrador', '2024-02-18', 'Rua Sapopemba, 2222', '(11) 99999-9999', '03245-000', 'ATIVO', 'funcionario/fotoUser.png', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblgaleria`
--

CREATE TABLE `tblgaleria` (
  `idGaleria` int(11) NOT NULL,
  `nomeGaleria` varchar(50) NOT NULL,
  `altGaleria` varchar(50) NOT NULL,
  `fotoGaleria` varchar(100) NOT NULL,
  `statusGaleria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblgaleria`
--

INSERT INTO `tblgaleria` (`idGaleria`, `nomeGaleria`, `altGaleria`, `fotoGaleria`, `statusGaleria`) VALUES
(1, 'GALERIA1', 'imagem Galeria1', 'galeria/imggaleria1-.png', 'ATIVO'),
(2, 'GALERIA2', 'imagem Galeria2', 'galeria/imggaleria2-.png', 'ATIVO'),
(3, 'GALERIA3', 'imagem Galeria3', 'galeria/imggaleria3-.png', 'ATIVO'),
(4, 'GALERIA4', 'imagem Galeria4', 'galeria/imggaleria4-.png', 'ATIVO'),
(5, 'GALERIA5', 'imagem Galeria5', 'galeria/imggaleria5-.png', 'ATIVO'),
(6, 'GALERIA6', 'imagem Galeria6', 'galeria/imggaleria6-.png', 'ATIVO'),
(7, 'GALERIA7', 'Imagem galeria7', 'galeria/imggaleria7-.png', 'ATIVO'),
(8, 'GALERIA8', 'Imagem galeria8', 'galeria/imggaleria8-.png', 'ATIVO'),
(9, 'GALERIA9', 'Imagem galeria9', 'galeria/imggaleria9-.png', 'ATIVO'),
(11, '', '', 'galeria/homer.png', 'ATIVO'),
(12, '', '', 'galeria/cervejas-gerais.jpg', 'DESATIVADO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblitensvendidos`
--

CREATE TABLE `tblitensvendidos` (
  `idItensVendido` int(11) NOT NULL,
  `valorUnitario` double(10,2) NOT NULL,
  `quantidadeVendida` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idVenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblitensvendidos`
--

INSERT INTO `tblitensvendidos` (`idItensVendido`, `valorUnitario`, `quantidadeVendida`, `idProduto`, `idVenda`) VALUES
(1, 3.00, 5, 1, 1),
(2, 5.00, 7, 2, 2),
(4, 80.00, 1, 4, 4),
(9, 4.00, 2, 9, 9),
(14, 5.00, 3, 10, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblprodutos`
--

CREATE TABLE `tblprodutos` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(255) DEFAULT NULL,
  `descricaoProduto` varchar(50) DEFAULT NULL,
  `categoriaProduto` varchar(50) DEFAULT NULL,
  `statusProduto` varchar(255) DEFAULT 'Ativo',
  `precoCompraProduto` double(10,2) DEFAULT NULL,
  `precoVendaProduto` double(10,2) DEFAULT NULL,
  `fornecedorProduto` varchar(20) DEFAULT NULL,
  `dataReceProduto` date DEFAULT curdate(),
  `horaProduto` time DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblprodutos`
--

INSERT INTO `tblprodutos` (`idProduto`, `nomeProduto`, `descricaoProduto`, `categoriaProduto`, `statusProduto`, `precoCompraProduto`, `precoVendaProduto`, `fornecedorProduto`, `dataReceProduto`, `horaProduto`) VALUES
(1, 'ORIGINAL269ML', 'CERVEJAS', 'ALCOOLICO', 'ATIVO', 1.00, 3.00, 'assaí', '2023-10-31', '12:03:00'),
(2, 'GATORADE500ML', 'Bebidas isotônicas ', 'NÃO ALCOÓLICO', 'ATIVO', 1.50, 3.00, 'Assaí', '2023-10-31', '18:06:40'),
(3, 'REDLABEL1LT', 'Bebidas Destilada', 'ALCOÓLICO', 'DESATIVADO', 50.00, 80.00, 'Assaí', '2023-10-31', '18:06:40'),
(4, 'COCACOLA2LT', 'Refrigerantes', 'NÃO ALCOÓLICO', 'ATIVO', 5.00, 10.00, 'Assaí', '2023-10-31', '18:06:40'),
(5, 'SPATEN269ML', 'Cervejas', 'ALCOÓLICO', 'ATIVO', 2.00, 3.00, 'Assaí', '2023-10-31', '18:06:40'),
(6, 'WHITEHORSE1LT', 'Bebidas Destilada', 'ALCOÓLICO', 'ATIVO', 45.00, 70.00, 'Assaí', '2023-10-20', '18:06:40'),
(7, 'CARVÃODECOCOZOMO', 'Narguilé', 'TABACARIA', 'ATIVO', 4.00, 6.00, 'Assaí', '2023-10-21', '18:06:40'),
(8, 'AMSTEL269ML', 'Cervejas', 'ALCOÓLICO', 'ATIVO', 2.00, 3.00, 'Assaí', '2023-10-25', '18:06:40'),
(9, 'FANTA350ML', 'Refrigerantes', 'NÃO ALCOÓLICO', 'ATIVO', 2.50, 4.00, 'Assaí', '2023-10-28', '18:06:40'),
(10, 'H2O500ML', 'REFRIGERANTES', 'NÃO ALCOÓLICO', 'ATIVO', 1.00, 3.00, 'assaí', '2023-10-15', '12:03:00'),
(11, 'JACK DANIELS', 'Whysky', 'ALCOOLICO', 'ATIVO', 80.00, 120.00, 'Assaí', '2023-12-21', '18:50:46'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'pepsi zero', 'Refrigerante ', 'NÃO ALCOÓLICO', '', 4.00, 8.00, 'atacadão', '2024-03-18', '15:54:01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `emailUsuario` varchar(80) NOT NULL,
  `senhaUsuario` varchar(20) NOT NULL,
  `statusUsuario` varchar(10) NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblusuarios`
--

INSERT INTO `tblusuarios` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `statusUsuario`, `fotoUsuario`) VALUES
(1, 'DIMAS APARECIDO ', 'dimas.rabelo@gmail.com', '1234', 'ATIVO', 'Usuario/dimas.png'),
(2, 'SANDRA MARQUES DE MACEDO', 'sandramarquesmacedo@gmail.com', '369852', 'ATIVO', 'Usuario/sandramarquesdemacedo.png'),
(3, 'RODOLFO LIRA', 'rodolfolira@yahoo.com.br', '123456', 'ATIVO', 'Usuario/rodolfolira.png'),
(15, 'Marli Marlei', 'marlimarlei@gmail.com', '12345', 'ATIVO', 'Usuario/fotoUsuario.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblvendas`
--

CREATE TABLE `tblvendas` (
  `idVenda` int(11) NOT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `dataVenda` date DEFAULT curdate(),
  `horaVenda` time DEFAULT NULL,
  `statusVenda` varchar(10) DEFAULT NULL,
  `valorTotalVenda` double(10,2) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblvendas`
--

INSERT INTO `tblvendas` (`idVenda`, `idFuncionario`, `dataVenda`, `horaVenda`, `statusVenda`, `valorTotalVenda`, `idProduto`) VALUES
(1, 1, '2023-11-01', '05:00:55', 'ATIVO', 15.00, 1),
(2, 2, '2023-11-01', '05:00:55', 'ATIVO', 80.00, 2),
(4, 4, '2023-11-03', '05:00:55', 'ATIVO', 120.00, 4),
(9, 9, '2023-11-05', '05:00:55', 'ATIVO', 70.00, 9),
(10, 10, '2023-11-06', '05:00:55', 'ATIVO', 24.00, 10),
(11, 4, '2024-02-22', '00:00:00', 'ATIVO', 10.00, 4),
(12, 20, '2024-02-22', '00:00:00', 'ATIVO', 40.00, 5),
(13, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vwprodutos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vwprodutos` (
`nomeProduto` varchar(255)
,`precoVendaProduto` double(10,2)
,`precoCompraProduto` double(10,2)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_produtos_vendidos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_produtos_vendidos` (
`nomeProduto` varchar(255)
,`precoVendaProduto` double(10,2)
,`total_vendido` double(19,2)
,`Unidades` double(17,0)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_qtdfuncionarios`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_qtdfuncionarios` (
`qtdFuncionarios` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_qtdprodutos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_qtdprodutos` (
`qtdProdutos` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_tblestoque`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_tblestoque` (
`idProduto` int(11)
,`nomeProduto` varchar(255)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_vendas_info`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_vendas_info` (
`idVenda` int(11)
,`Hora da Venda` time
,`Data da Venda` date
,`Valor Total da Venda` double(10,2)
,`Nome do Produto` varchar(255)
,`Nome do Funcionário` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura para view `vwprodutos`
--
DROP TABLE IF EXISTS `vwprodutos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwprodutos`  AS SELECT `tblprodutos`.`nomeProduto` AS `nomeProduto`, `tblprodutos`.`precoVendaProduto` AS `precoVendaProduto`, `tblprodutos`.`precoCompraProduto` AS `precoCompraProduto` FROM `tblprodutos` ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_produtos_vendidos`
--
DROP TABLE IF EXISTS `vw_produtos_vendidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_produtos_vendidos`  AS SELECT `p`.`nomeProduto` AS `nomeProduto`, `p`.`precoVendaProduto` AS `precoVendaProduto`, sum(`v`.`valorTotalVenda`) AS `total_vendido`, round(sum(`v`.`valorTotalVenda`) / `p`.`precoVendaProduto`,0) AS `Unidades` FROM (`tblvendas` `v` join `tblprodutos` `p` on(`v`.`idProduto` = `p`.`idProduto`)) GROUP BY `p`.`nomeProduto` ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_qtdfuncionarios`
--
DROP TABLE IF EXISTS `vw_qtdfuncionarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_qtdfuncionarios`  AS SELECT count(0) AS `qtdFuncionarios` FROM `tblfuncionarios` ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_qtdprodutos`
--
DROP TABLE IF EXISTS `vw_qtdprodutos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_qtdprodutos`  AS SELECT count(0) AS `qtdProdutos` FROM `tblprodutos` ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_tblestoque`
--
DROP TABLE IF EXISTS `vw_tblestoque`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_tblestoque`  AS SELECT `tp`.`idProduto` AS `idProduto`, `tp`.`nomeProduto` AS `nomeProduto` FROM (`tblestoque` `ts` join `tblprodutos` `tp` on(`ts`.`idProduto` = `tp`.`idProduto`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_vendas_info`
--
DROP TABLE IF EXISTS `vw_vendas_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vendas_info`  AS SELECT `v`.`idVenda` AS `idVenda`, `v`.`horaVenda` AS `Hora da Venda`, `v`.`dataVenda` AS `Data da Venda`, `v`.`valorTotalVenda` AS `Valor Total da Venda`, `p`.`nomeProduto` AS `Nome do Produto`, `f`.`nomeFuncionario` AS `Nome do Funcionário` FROM ((`tblvendas` `v` join `tblprodutos` `p` on(`v`.`idProduto` = `p`.`idProduto`)) join `tblfuncionarios` `f` on(`v`.`idFuncionario` = `f`.`idFuncionario`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Índices de tabela `tblcontato`
--
ALTER TABLE `tblcontato`
  ADD PRIMARY KEY (`idContato`);

--
-- Índices de tabela `tblestoque`
--
ALTER TABLE `tblestoque`
  ADD PRIMARY KEY (`idEstoque`),
  ADD KEY `estoqueProduto` (`idProduto`);

--
-- Índices de tabela `tblfuncionarios`
--
ALTER TABLE `tblfuncionarios`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices de tabela `tblgaleria`
--
ALTER TABLE `tblgaleria`
  ADD PRIMARY KEY (`idGaleria`);

--
-- Índices de tabela `tblitensvendidos`
--
ALTER TABLE `tblitensvendidos`
  ADD PRIMARY KEY (`idItensVendido`),
  ADD KEY `vendidosProdutos` (`idProduto`),
  ADD KEY `vendidosVendas` (`idVenda`);

--
-- Índices de tabela `tblprodutos`
--
ALTER TABLE `tblprodutos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `tblvendas`
--
ALTER TABLE `tblvendas`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `vendasFuncionario` (`idFuncionario`),
  ADD KEY `vendasProduto` (`idProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tblcontato`
--
ALTER TABLE `tblcontato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tblestoque`
--
ALTER TABLE `tblestoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tblfuncionarios`
--
ALTER TABLE `tblfuncionarios`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tblgaleria`
--
ALTER TABLE `tblgaleria`
  MODIFY `idGaleria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tblitensvendidos`
--
ALTER TABLE `tblitensvendidos`
  MODIFY `idItensVendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tblprodutos`
--
ALTER TABLE `tblprodutos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tblvendas`
--
ALTER TABLE `tblvendas`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblestoque`
--
ALTER TABLE `tblestoque`
  ADD CONSTRAINT `estoqueProduto` FOREIGN KEY (`idProduto`) REFERENCES `tblprodutos` (`idProduto`);

--
-- Restrições para tabelas `tblitensvendidos`
--
ALTER TABLE `tblitensvendidos`
  ADD CONSTRAINT `vendidosProdutos` FOREIGN KEY (`idProduto`) REFERENCES `tblprodutos` (`idProduto`),
  ADD CONSTRAINT `vendidosVendas` FOREIGN KEY (`idVenda`) REFERENCES `tblvendas` (`idVenda`);

--
-- Restrições para tabelas `tblvendas`
--
ALTER TABLE `tblvendas`
  ADD CONSTRAINT `vendasFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `tblfuncionarios` (`idFuncionario`),
  ADD CONSTRAINT `vendasProduto` FOREIGN KEY (`idProduto`) REFERENCES `tblprodutos` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
