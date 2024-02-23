-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jan-2024 às 12:45
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `minhagestao_banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `is_admin` enum('1','0') DEFAULT NULL COMMENT '1: ADMIN, 0: NÃO É ADMIN',
  `is_active` enum('1','0') DEFAULT NULL COMMENT '1: sim, 0: não',
  `key_admin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `id_usuario`, `is_admin`, `is_active`, `key_admin`) VALUES
(1, 3, '1', '1', 'WxGpDUkLWeOAGkxknpAd'),
(33, 4, '1', '1', 'SkYRMXMjFXnblNurktQtatwAqM'),
(34, 137, '1', '1', 'qEpzoXqzayOAuNENwABpKzKHjz'),
(36, 140, '1', '1', 'TYUnAiTTzzwULXnyJyyxgiseRj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_agendada` varchar(12) DEFAULT NULL,
  `hora` varchar(6) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `titulo`, `id_cliente`, `id_usuario`, `data_agendada`, `hora`, `descricao`) VALUES
(58, ' PLANOS E IDEIAS PARA RECURSOS DO SISTEMA', 98, 3, '2023-08-28', '18:44', '1 - Parceiros e Fornecedores: Gerenciar relacionamentos com parceiros de negócios e fornecedores, incluindo informações de contato, contratos e histórico de transações.<br />\r\n<br />\r\n2 -  Estoque e Inventário: Um módulo de gestão de estoque pode ajudar a controlar a entrada e saída de produtos, níveis de estoque, reabastecimento automático e previsão de demanda.<br />\r\n<br />\r\n3 - Finanças e Contabilidade: Isso engloba o rastreamento de receitas, despesas, balanços patrimoniais, fluxo de caixa, faturamento e gerenciamento de contas a pagar e a receber.<br />\r\n<br />\r\n4 - Logística e Cadeia de Suprimentos: Gerenciamento do fluxo de produtos desde a fabricação até a entrega ao cliente, incluindo rastreamento de remessas e coordenação com fornecedores.<br />\r\n<br />\r\n5 - Projetos e Tarefas: Um módulo de gerenciamento de projetos pode auxiliar na atribuição de tarefas, rastreamento de prazos, alocação de recursos e colaboração entre equipes.'),
(84, '', 157, 61, '', '', ''),
(85, 'Dar o cú', 160, 79, '2023-12-12', '07:24', 'Lembrete para ir tomar no cú de manhã cedo.'),
(86, 'dedada no toba', 163, 84, '2005-03-12', '00:07', 'azulmarelo'),
(88, '', 164, 81, '', '', ''),
(89, 'TORRES GEMEAS', 165, 86, '2001-09-11', '08:40', 'VC SABE OQ FAZER'),
(90, ' Pegar num sei oq', 166, 4, '2023-10-10', '10:30', '3eofesvflarw.afdxfbsgeafpwçs.\\'),
(99, 'teste', 182, 146, '2023-12-12', '12:30', 'sads');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `codigo_categoria` varchar(100) NOT NULL COMMENT 'cod ex: 100',
  `id_usuario` int(11) NOT NULL,
  `hora_registro` time NOT NULL,
  `data_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `codigo_categoria`, `id_usuario`, `hora_registro`, `data_registro`) VALUES
(26, 'Forró', '010592042', 140, '04:36:05', '2023-10-15'),
(31, 'Celulares', '072929451', 135, '00:07:29', '2023-10-20'),
(37, 'Famoso', '970468793', 182, '19:46:19', '2023-10-20'),
(45, 'Comida', '283516811', 137, '23:40:51', '2023-11-01'),
(67, 'aaaa', '711968452', 140, '16:40:58', '2023-11-14'),
(74, 'Cerveja', '340346582', 428, '21:26:47', '2023-11-16'),
(76, 'Comida', '870633911', 207, '02:51:52', '2023-11-21'),
(80, 'desculpa ', '047389464', 207, '04:55:27', '2023-12-04'),
(81, 'SENAI', '500315987', 207, '04:55:49', '2023-12-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(100) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cep` varchar(100) NOT NULL,
  `logadouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `uf` varchar(6) DEFAULT NULL,
  `hora` time NOT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `id_usuario`, `nome`, `cpf`, `endereco`, `email`, `telefone`, `cep`, `logadouro`, `bairro`, `localidade`, `uf`, `hora`, `data_cadastro`) VALUES
(98, 3, 'Kerlon', '', 'Av. fodase', 'kerlo@gmail.com', '27 8 8888-8889', '0', '', '', '', '', '00:00:00', '0000-00-00'),
(142, 26, 'raquiado', '', '', '', '', '0', '', '', '', '', '10:05:44', '2023-08-09'),
(143, 26, 'andre', '', '', '', '', '0', '', '', '', '', '13:50:42', '2023-08-09'),
(150, 3, 'bauri', '', 'Quintino Bocaiúva', 'sadasdasd@gmail.com', '27 9 9999-9999', '0', '', '', '', 'ES', '19:30:40', '2023-08-24'),
(155, 3, 'kerlon ', '', 'Quintino Bocaiúva', 'kerlon1111@gmail.com', '27 9 9999-9999', '0', '', '', '', 'AM', '21:38:13', '2023-09-06'),
(156, 3, 'Dylan', '', 'Quintino Bocaiúva', 'Dylan@gmail.com', '27 9 9999-9999', '0', '', '', '', 'ES', '01:26:48', '2023-09-11'),
(157, 61, 'kerlon ', '', 'Quintino Bocaiúva', 'kerlon1111@gmail.com', '27 9 9999-9999', '0', '', '', '', 'PE', '14:55:54', '2023-09-14'),
(160, 79, 'Kerlon Fernandes', '', 'B. B Sightseeing (Street View): 35.102075, -107.137649', 'pou20145@gmail.com', '11 4 0028-9220', '0', '', '', '', '', '22:27:42', '2023-09-19'),
(161, 3, 'andre', '', 'Av Jones Dos Santos Neves', 'kejdjak@gmail.com', '27 9 9999-9999', '0', '', '', '', 'DF', '22:36:52', '2023-09-19'),
(163, 84, 'ashuashua', '', 'casa do krl', 'ashuashua@zipcode.com.br', '27 9 9226-6837', '0', '', '', '', 'MA', '23:07:13', '2023-09-19'),
(164, 81, 'jublau', '', 'Av Jones Dos Santos Neves', 'kaskas@gmail.com', '27 9 9999-9999', '0', '', '', '', '', '23:44:30', '2023-09-19'),
(165, 86, 'George W. Bush', '', 'casa bramca', 'bush@whitehouse.com', '', '0', '', '', '', 'RO', '20:04:16', '2023-09-25'),
(166, 4, 'gabriel', '', '', 'pereiradasilvapeido@gmail.con', '', '0', '', '', '', 'AL', '20:18:50', '2023-09-25'),
(182, 146, 'Joaquin da silva ', '', '123', '', '12 3 4212-1212', '', '', '', '', 'RS', '00:51:58', '2023-10-29'),
(183, 146, 'Kerlo', '', '', '', '', '', '', '', '', '', '01:19:22', '2023-10-29'),
(228, 140, 'Maconha', '202.624.443-20', 'avenida jose tozzi 1433,centro, loja hinode', 'ashuashua@zipcode.com.br', '27 9 9226-6837', '29930245', 'avenida jose tozzi 1433,centro, loja hinode', 'Centro', 'São Mateus', 'SC', '08:34:05', '2024-01-03'),
(230, NULL, 'Kerlon e yuna', '123.456.789-10', 'Av. fodaseoegdpkssç', 'k@y.co', '27 9 9999-9999', '29930-047', 'Rua Adilson Passos', 'Centro', 'São Mateus', 'ES', '12:16:58', '2023-12-24'),
(231, NULL, 'hhvu', '', '', '', '', '', '', '', '', '', '12:18:26', '2023-12-24'),
(232, NULL, 'njvhm', '', '', '', '', '', '', '', '', '', '12:20:48', '2023-12-24'),
(233, NULL, 'jkk', '', '', '', '', '', '', '', '', '', '12:21:06', '2023-12-24'),
(279, 207, 'af gdsafgrdghadsasdfdsaf', '', '', '', '', '', '', '', '', '', '16:48:54', '2024-01-02'),
(288, 207, 'fdsdsffdsfdsfdsdsf', '123.456.789-10', 'av. fodase', 'k@g.co', '27 9 912521235', '29930-047', 'av. fodase', 'Centro', 'São Mateus', 'ES', '08:19:12', '2024-01-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `codigo_compra` varchar(28) DEFAULT NULL,
  `data_compra` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desconto_orcamento`
--

CREATE TABLE `desconto_orcamento` (
  `id` int(11) NOT NULL,
  `id_orcamento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo_desconto` varchar(100) DEFAULT NULL,
  `descricao_desconto` text DEFAULT NULL,
  `valor_desconto` int(11) DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `data_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `desconto_orcamento`
--

INSERT INTO `desconto_orcamento` (`id`, `id_orcamento`, `id_usuario`, `titulo_desconto`, `descricao_desconto`, `valor_desconto`, `hora_registro`, `data_registro`) VALUES
(1, 41, 207, 'teste orcamento view', 'aaa', 100, '09:40:25', '2023-11-21'),
(2, 40, 207, 'teste desconto rs', 'teste', 10, '15:04:44', '2023-11-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestao_financeira`
--

CREATE TABLE `gestao_financeira` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL COMMENT '1 = entrada, 2 = saída',
  `data_cadastro` date DEFAULT NULL,
  `hora_cadastro` time DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `data_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gestao_financeira`
--

INSERT INTO `gestao_financeira` (`id`, `id_usuario`, `tipo`, `data_cadastro`, `hora_cadastro`, `valor`, `descricao`, `categoria`, `data_registro`, `hora_registro`) VALUES
(175, 86, 'Entrada', '2023-09-25', '20:19:45', 3000000.00, '', 'Moradia', '2023-09-25', '20:19:45'),
(176, 86, 'Saída', '2023-09-25', '20:20:13', 2999999.00, '', 'Moradia', '2023-09-25', '20:20:13'),
(189, 3, 'Entrada', '2023-10-06', '15:33:07', 10.00, 'ola', 'Moradia', '2023-10-06', '15:33:07'),
(198, 3, 'Entrada', '2023-10-06', '17:22:56', 10.00, '', 'Moradia', '2023-10-06', '17:22:56'),
(211, 3, 'Entrada', '2023-10-06', '19:18:11', 837.98, 'putero', '', '2023-10-06', '19:18:11'),
(212, 4, 'Entrada', '2023-10-07', '21:47:49', 10.00, 'app', 'Moradia', '2023-10-06', '21:47:49'),
(253, 137, 'Entrada', '2023-10-28', '03:36:27', 317.67, 'Meu saldo atual', '', '2023-10-28', '03:36:27'),
(257, 137, 'Saída', '2023-10-28', '20:56:42', 95.00, 'comemo uma pizza sinistra de portuguesa slk ', '', '2023-10-28', '20:56:42'),
(259, 137, 'Saída', '2023-10-29', '17:01:23', 20.00, 'sorvete', '', '2023-10-30', '17:01:23'),
(260, 137, 'Saída', '2023-10-30', '13:59:29', 56.40, 'padaria', '', '2023-10-31', '13:59:29'),
(261, 212, 'Entrada', '2023-11-02', '21:16:18', 1000.00, '', '', '2023-11-01', '21:16:18'),
(262, 212, 'Saída', '2023-11-02', '21:16:30', 100.00, '', '', '2023-11-01', '21:16:30'),
(265, 137, 'Saída', '2023-11-01', '23:46:03', 94.91, 'compras no mercado', '', '2023-11-01', '23:46:03'),
(266, 137, 'Entrada', '2023-11-02', '23:47:23', 0.37, '', '', '2023-11-01', '23:47:23'),
(268, 137, 'Saída', '2023-11-07', '01:27:53', 50.50, '', '', '2023-11-07', '01:27:53'),
(269, 137, 'Saída', '2023-11-07', '01:34:52', 0.23, '', '', '2023-11-07', '01:34:52'),
(303, 137, 'Entrada', '2023-11-14', '11:19:49', 400.00, '', '', '2023-11-18', '11:19:49'),
(304, 137, 'Saída', '2023-11-14', '11:21:02', 100.00, '', '', '2023-11-18', '11:21:02'),
(305, 137, 'Entrada', '2023-11-18', '11:21:20', 6.00, '', '', '2023-11-18', '11:21:20'),
(307, 137, 'Saída', '2023-11-17', '11:22:55', 277.68, 'mercado', '', '2023-11-18', '11:22:55'),
(309, 436, 'Entrada', '2023-11-21', '00:39:02', 87.00, 'Apontador de lapiseira', '', '2023-11-21', '00:39:02'),
(310, 436, 'Saída', '2023-11-20', '00:41:21', 652.50, 'Compra de 15 apontadores de lápiseira, por 45,5 reais cada. (Falimos ????????????)', '', '2023-11-21', '00:41:21'),
(318, 207, 'Entrada', '2023-11-27', '06:08:43', 200.00, '', '', '2023-11-27', '06:08:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenscompra`
--

CREATE TABLE `itenscompra` (
  `id` int(11) NOT NULL,
  `compra_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo_orcamento` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `valor_orcamento` decimal(10,2) NOT NULL,
  `orcamento_code` varchar(20) NOT NULL,
  `data_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `id_usuario`, `titulo_orcamento`, `descricao`, `valor_orcamento`, `orcamento_code`, `data_registro`, `hora_registro`) VALUES
(36, 207, 'Teste Orçamento', 'teste', 1000.00, 'XsgVzbXsz1F', '2023-11-20', '22:51:30'),
(37, 207, 'aaa', 'aaa1', 1.00, 'OlKuPmZsM3J', '2023-11-20', '23:46:46'),
(38, 207, '123r4ty', 'aaa', 99999999.99, 'P3Fj4SxJrIG', '2023-11-21', '00:19:50'),
(39, 207, 'MERCADO ', 'COMPRAS NO MERCADO', 300.00, 'w9mqvIKQKuA', '2023-11-21', '02:33:46'),
(40, 207, 'Teste 1', 'Teste', 300.00, 'mO2QKvxkk5Q', '2023-11-21', '02:55:32'),
(41, 140, 'MACO NHAJ', 'AAA', 1.00, 'L92qUo7sXEN', '2023-11-21', '08:47:14'),
(42, 137, 'test', 'aqqaa', 100.00, 's0SZjrJ2VGQ', '2023-11-21', '11:34:18'),
(43, 140, 'Compras ', 'para as compras da casa', 1000.00, '3kQIbaIyFM9', '2023-11-22', '22:11:43'),
(44, 450, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'hahaha', 1212.00, 'mZ3aHqtDnMi', '2023-11-26', '16:11:10'),
(45, 140, 'compras do mercado', '!!!', 1000.00, 'UsUzb1jKthN', '2023-11-28', '19:20:34'),
(46, 137, 'Kerlon', 'blablabla\n', 12.00, 'LvNk956zeS0', '2023-12-04', '04:22:18'),
(47, 207, 'dsvad', 'asds', 12.00, 'itPLZIFNfDB', '2023-12-19', '01:12:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_produto` varchar(28) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `qtd_no_estoque` int(11) NOT NULL,
  `imagem_produto` varchar(200) NOT NULL,
  `id_code_prod` int(11) NOT NULL,
  `numero_tipo` int(11) NOT NULL COMMENT 'padrao tipo: 100 > ',
  `hora_registro` time NOT NULL,
  `data_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `id_usuario`, `codigo_produto`, `nome`, `descricao`, `preco`, `categoria`, `qtd_no_estoque`, `imagem_produto`, `id_code_prod`, `numero_tipo`, `hora_registro`, `data_registro`) VALUES
(27, 3, '7272385887712257496104', 'Prato', 'é um prato massa ????', 9.99, 100, 0, '', 0, 0, '21:23:46', '2023-09-05'),
(28, 3, '0189059329611258910184', 'Reparador de pontas', 'Ajuda a tratar as pontas rígidas e ferradas ', 79.90, 100, 0, '', 0, 0, '01:24:01', '2023-09-11'),
(31, 80, '2275222700263930597316', 'Skol', 'Cerveja ', 10.00, 0, 0, '', 0, 0, '22:13:26', '2023-09-19'),
(32, 3, '9763261870320642419155', 'André Monechi', 'PRODUTO RARO PARA A VENDA DE ÓRGÃOS ', 1.99, 100, 0, '', 0, 0, '22:14:57', '2023-09-19'),
(33, 80, '4633398256848235641691', '', 'Pastel ', 6.00, 100, 0, '', 0, 0, '22:15:12', '2023-09-19'),
(34, 79, '3048760878823381891983', 'Pênis de Borracha Ventosa Vibrador 16cm 4cm Pinto Rola Grande', 'O Pênis Com Vibrador Externo, Ventosa e Saco 16cm x 4cm Pele Realístico Adão e Eva é extremamente semelhante a um pênis humano no que se refere a textura, a flexibilidade e aparência. Possui um vibrador externo multivelocidade acionado por controle remoto', 69.00, 100, 0, '', 0, 0, '23:00:30', '2023-09-19'),
(35, 84, '0571630774413617493339', 'cogumelo do capiroto', 'numa folha amarela', 19918837.99, 0, 0, '', 0, 0, '23:09:06', '2023-09-19'),
(36, 84, '7581954723905377056940', 'asguy', 'iuahsn', 19.99, 0, 0, '', 0, 0, '23:10:46', '2023-09-19'),
(38, 3, '7324652311711926349760', 'Criança africana', '', 2.00, 100, 0, '', 0, 0, '13:31:25', '2023-09-20'),
(54, 4, '9787138902285714024213', 'kkkkkkkkk CONSEGUI PAE', 'RSRS', 12.00, 100, 10, '', 0, 0, '14:43:43', '2023-10-06'),
(56, 3, '2828383623246904122117', 'Cadastro celular', 'Olá ', 12.00, 100, 3, '', 0, 0, '15:14:15', '2023-10-06'),
(60, 4, '5787585138106648118406', 'maryjuanna', 'aopdjoos', 12.00, 100, 3, '', 0, 0, '17:03:50', '2023-10-06'),
(96, 135, '6123939713557174976618', 'celula', 'sem vergonha', 12.00, 72929451, 2, '1697817813_celulalkkkkk.jpg', 0, 0, '13:03:33', '2023-10-20'),
(97, 135, '6042351622235371886591', 'sda', 'sadsadasda', 12.00, 72929451, 13, '', 0, 0, '13:25:45', '2023-10-20'),
(107, 182, '9734971696309772010335', 'Vampeta', 'Você conhece esse rapaz ?', 1.00, 970468793, 1, '1697842009_imagem_2023-10-20_194644566.png', 0, 0, '19:46:49', '2023-10-20'),
(130, 137, '0356686105642365814367', 'Prato de comida', 'comida boa ', 15.00, 283516811, 1, '1698892882_IMG_20231101_204656_799.webp', 0, 0, '23:41:22', '2023-11-01'),
(150, 428, '2455518731481008496320', 'Cerveja Skol', 'Skol Latinha', 6.18, 340346582, 120, '1700181336_Cerveja-Pilsen-Skol-Lata-473ml.png', 0, 0, '21:35:36', '2023-11-16'),
(156, 207, '3482584631652718678551', 'Suco de avamc', 'Coco', 0.00, 870633911, 1, '1700546035_17005460025507513863916326725920.jpg', 0, 0, '02:53:55', '2023-11-21'),
(157, 140, '6963195059298860082855', 'AAAAAI', 'UIUI', 0.00, 10592042, 1, '1700567208_IMG_20220206_135259.jpg', 0, 0, '08:46:48', '2023-11-21'),
(159, 207, '4837242218793217061307', 'kkkkk', 'kkk', 0.00, 870633911, 1, '1701676417_IMG_20230509_142922.jpg', 0, 0, '04:53:37', '2023-12-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `uf` varchar(4) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `profile_pic` varchar(350) NOT NULL,
  `key_user` varchar(25) NOT NULL,
  `chave_recuperacao` varchar(25) NOT NULL,
  `hora` time NOT NULL,
  `data_acesso` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `sobrenome`, `endereco`, `telefone`, `uf`, `senha`, `profile_pic`, `key_user`, `chave_recuperacao`, `hora`, `data_acesso`) VALUES
(135, 'test13@gmail.com', 'kerlon', '', '', '', '', '$2y$10$9p.Rii51Y3GFI9BV1s0hhOukFqFeYG9f.WZUp9U3XOCqeAFOg5wtO', '', 'ZSfIeJtsgrjUZiaHAHLXsBNJC', '0938970547069012', '03:56:56', '2023-10-08'),
(137, 'batatrap@gmail.com', 'Kerlon Fernandes', '', 'qasa', '27 9 9824-8692', 'ES', '$2y$10$rTBeblwZ1xl0UPIk2XpHbOOtkQoVPLHvvVTsVzv5noloAVJAnL3iy', '', 'XoIqemInpVnDZWWZQAjsFIxJU', '5466728564892891', '15:41:24', '2023-10-08'),
(140, 'admin', 'admin', '', '', '', '', '$2y$10$p3Wmv3nUOIOCw75/P69J1erdzK8aTy.F.QUiixh/BK4VSb80wB462', '', 'HGudsOgblHPOXRZHRlJeUqbjM', '8531533203391032', '04:28:22', '2023-10-15'),
(147, 'joaozinhogameplays@gmail.com', 'jopiroquinha3000safadao30cm', '', '', '', '', '$2y$10$Um0EbZZUlBlH09GLwMG9gOLfQVdXWwKfqhsFupqVNcVSq7r5uqBkW', '', 'hpIHqrQQhxAVxVPTjcsMGLlSR', '5764938979803650', '19:35:49', '2023-10-20'),
(182, 'teste123@gmail.com', 'kerlon', '', '', '', '', '$2y$10$4IfGNaL6CUS4YEew/ml7aeVaWTWENozw833jfWjbyBk0g.lli1I4C', '', 'FkpbUuPVxVJqyKYrajNZmmnyM', '9608980990926901', '19:40:51', '2023-10-20'),
(190, 'jobson@gmail.com', 'teste', '', '', '', '', '$2y$10$h4PZriaoyduORNIgKwTmEeiNubl603PP9ICg8ps0WjOQTAcPtCFXa', '', 'xLYHilakoQpiuYDKthDDVIdix', '7956591862753843', '14:44:31', '2023-10-29'),
(207, 'kerlon1221@gmail.com', 'ADMIN', '', '', '', '', '$2y$10$mbzv3Xpa5E2F.6hBx.DdYuzUVikRySnBArtJyMO7lHPeJa.XmR/Ge', '', 'LgxXPkMiDWWaEmTexnwYNwaDY', '4975764145020355', '14:50:48', '2023-10-31'),
(375, 'mfmarfernandes@gmail.com', 'Marciano Fernandes', '', '', '', '', '$2y$10$n4hsFI/MYjKW1ACINdgD7ueLvcFtnJA/s7ELezMAoR/m8U08QxuEO', '', 'KIbYZBRoVWgejUCuJODdiHVtY', '9895595892140154', '21:06:18', '2023-11-16'),
(428, 'fernandesmarciano258@gmail.com', 'Marciano ', '', '', '', '', '$2y$10$OXioLFLDybHlykxeUNy3Z./qgKCF7t9aPldGwCsUTREC3wj93CAvS', '', 'sEhgPzkQAeIsGMiYyRevmbyrj', '4304033339756864', '21:07:20', '2023-11-16'),
(436, 'batata@batata.com', 'Batata', '', '', '', '', '$2y$10$2JNoeuVuaSPL7BjFxZYQmeXbJ4vap3DccGUy.4WTr7pSFrqq8a0zG', '', 'GfJUcZoxpXVVOtUBvSMVTagQH', '0660412615722139', '00:25:23', '2023-11-21'),
(450, 'teste@g.co', 'test', '', '', '', '', '$2y$10$ZyU8Z2uyCQQPXXvJOu4UROWnizFsF.Xpp/omW.lxyezfp65PHcDay', '', 'NWdzwlXjhcCTvXWWmUnMFASfh', '2719921276023035', '16:10:14', '2023-11-26'),
(455, 'KErlon', 'aaa', '', '', '', '', '$2y$10$DHaFUUr8NDZbjp/eaTFz6OWekbaGJGSn7jFsRdwoXVvvBypJX4ftW', '', 'MaIiUqVhiktawkptmmOztZZtd', '0455648082467927', '19:21:06', '2023-11-28');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_usuarios` (`id_usuario`);

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `desconto_orcamento`
--
ALTER TABLE `desconto_orcamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orcamento` (`id_orcamento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `gestao_financeira`
--
ALTER TABLE `gestao_financeira`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`);

--
-- Índices para tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desconto_orcamento`
--
ALTER TABLE `desconto_orcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `gestao_financeira`
--
ALTER TABLE `gestao_financeira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT de tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_admin_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `desconto_orcamento`
--
ALTER TABLE `desconto_orcamento`
  ADD CONSTRAINT `desconto_orcamento_ibfk_1` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id`),
  ADD CONSTRAINT `desconto_orcamento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `gestao_financeira`
--
ALTER TABLE `gestao_financeira`
  ADD CONSTRAINT `gestao_financeira_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `itenscompra`
--
ALTER TABLE `itenscompra`
  ADD CONSTRAINT `itenscompra_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`);

--
-- Limitadores para a tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD CONSTRAINT `orcamentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
