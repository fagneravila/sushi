-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Fev-2020 às 05:26
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdsushi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcaixa`
--

CREATE TABLE `tbcaixa` (
  `idtbcaixa` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `idtbtipopagamento` int(11) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbendereco`
--

CREATE TABLE `tbendereco` (
  `idtbendereco` int(10) UNSIGNED NOT NULL,
  `idtbpessoa` int(10) UNSIGNED NOT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfone`
--

CREATE TABLE `tbfone` (
  `idtbfone` int(10) UNSIGNED NOT NULL,
  `idtbtipotelefone` int(10) UNSIGNED NOT NULL,
  `idtbpessoa` int(10) UNSIGNED NOT NULL,
  `numero` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncao`
--

CREATE TABLE `tbfuncao` (
  `idtbfuncao` int(10) UNSIGNED NOT NULL,
  `idtbpessoa` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbfuncao`
--

INSERT INTO `tbfuncao` (`idtbfuncao`, `idtbpessoa`, `descricao`) VALUES
(1, 1, 'Caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmesa`
--

CREATE TABLE `tbmesa` (
  `idtbmesa` int(10) UNSIGNED NOT NULL,
  `idtbsituacaomesa` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmesa`
--

INSERT INTO `tbmesa` (`idtbmesa`, `idtbsituacaomesa`, `descricao`) VALUES
(1, 2, '   Mesa 01'),
(2, 2, ' Mesa 02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idtbpedido` int(10) UNSIGNED NOT NULL,
  `idtbstatus` int(10) UNSIGNED NOT NULL,
  `idtbproduto` int(10) UNSIGNED NOT NULL,
  `idtbmesa` int(10) UNSIGNED NOT NULL,
  `idtbusuario` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `quantidade` int(10) UNSIGNED DEFAULT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpedido`
--

INSERT INTO `tbpedido` (`idtbpedido`, `idtbstatus`, `idtbproduto`, `idtbmesa`, `idtbusuario`, `descricao`, `quantidade`, `data`) VALUES
(1, 1, 3, 1, 1, 'teste', 3, '2020-02-17 00:00:00'),
(2, 6, 3, 1, 1, NULL, 5, '0000-00-00 00:00:00'),
(3, 6, 5, 1, 1, NULL, 5, '2020-02-17 00:00:00'),
(4, 6, 6, 1, 1, NULL, 3, '2020-02-16 00:00:00'),
(5, 6, 3, 2, 1, NULL, 4, '2020-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpessoa`
--

CREATE TABLE `tbpessoa` (
  `idtbpessoa` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpessoa`
--

INSERT INTO `tbpessoa` (`idtbpessoa`, `nome`, `cpf`) VALUES
(1, 'Fagner', '80908098989808');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idtbproduto` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idtbproduto`, `descricao`, `valor`) VALUES
(3, 'pao', '3.02'),
(5, 'bolo', '40.00'),
(6, 'refti', '5.00'),
(8, 'arroz', '10.00'),
(9, 'feijao', NULL),
(10, 'macarrao', '20.00'),
(11, 'miojo', '10.00'),
(12, 'sorvete', '22.00'),
(13, 'cchurrasco', '50.00'),
(14, 'prancha', '12.00'),
(15, 'prancha', '14.00'),
(16, 'genin', '24.14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsituacaomesa`
--

CREATE TABLE `tbsituacaomesa` (
  `idtbsituacaomesa` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbsituacaomesa`
--

INSERT INTO `tbsituacaomesa` (`idtbsituacaomesa`, `descricao`) VALUES
(1, 'Livre'),
(2, 'Ocupada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatus`
--

CREATE TABLE `tbstatus` (
  `idtbstatus` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbstatus`
--

INSERT INTO `tbstatus` (`idtbstatus`, `descricao`) VALUES
(1, 'Entregue'),
(2, 'Cozinha'),
(3, 'Fechado'),
(4, 'Cancelado'),
(5, 'Feito'),
(6, 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipopagamento`
--

CREATE TABLE `tbtipopagamento` (
  `idtbtipopagamento` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbtipopagamento`
--

INSERT INTO `tbtipopagamento` (`idtbtipopagamento`, `descricao`) VALUES
(1, 'Cartão'),
(2, 'Dinheiro'),
(3, 'Cartão Credito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipotelefone`
--

CREATE TABLE `tbtipotelefone` (
  `idtbtipotelefone` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbtipotelefone`
--

INSERT INTO `tbtipotelefone` (`idtbtipotelefone`, `descricao`) VALUES
(1, 'Celular'),
(2, 'Residencial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idtbusuario` int(10) UNSIGNED NOT NULL,
  `idtbpessoa` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ativo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idtbusuario`, `idtbpessoa`, `usuario`, `senha`, `ativo`) VALUES
(1, 1, 'fagner', '202cb962ac59075b964b07152d234b70', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbendereco`
--
ALTER TABLE `tbendereco`
  ADD PRIMARY KEY (`idtbendereco`);

--
-- Índices para tabela `tbfone`
--
ALTER TABLE `tbfone`
  ADD PRIMARY KEY (`idtbfone`);

--
-- Índices para tabela `tbfuncao`
--
ALTER TABLE `tbfuncao`
  ADD PRIMARY KEY (`idtbfuncao`);

--
-- Índices para tabela `tbmesa`
--
ALTER TABLE `tbmesa`
  ADD PRIMARY KEY (`idtbmesa`);

--
-- Índices para tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idtbpedido`);

--
-- Índices para tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  ADD PRIMARY KEY (`idtbpessoa`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idtbproduto`);

--
-- Índices para tabela `tbsituacaomesa`
--
ALTER TABLE `tbsituacaomesa`
  ADD PRIMARY KEY (`idtbsituacaomesa`);

--
-- Índices para tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`idtbstatus`);

--
-- Índices para tabela `tbtipopagamento`
--
ALTER TABLE `tbtipopagamento`
  ADD PRIMARY KEY (`idtbtipopagamento`);

--
-- Índices para tabela `tbtipotelefone`
--
ALTER TABLE `tbtipotelefone`
  ADD PRIMARY KEY (`idtbtipotelefone`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idtbusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbendereco`
--
ALTER TABLE `tbendereco`
  MODIFY `idtbendereco` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbfone`
--
ALTER TABLE `tbfone`
  MODIFY `idtbfone` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbfuncao`
--
ALTER TABLE `tbfuncao`
  MODIFY `idtbfuncao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbmesa`
--
ALTER TABLE `tbmesa`
  MODIFY `idtbmesa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idtbpedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbpessoa`
--
ALTER TABLE `tbpessoa`
  MODIFY `idtbpessoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idtbproduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbsituacaomesa`
--
ALTER TABLE `tbsituacaomesa`
  MODIFY `idtbsituacaomesa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  MODIFY `idtbstatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbtipopagamento`
--
ALTER TABLE `tbtipopagamento`
  MODIFY `idtbtipopagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbtipotelefone`
--
ALTER TABLE `tbtipotelefone`
  MODIFY `idtbtipotelefone` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idtbusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
