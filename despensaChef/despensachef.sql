-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2023 às 22:51
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
-- Banco de dados: `despensachef`
--
CREATE DATABASE IF NOT EXISTS `despensachef` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `despensachef`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `despensa`
--

CREATE TABLE `despensa` (
  `IDusuario` int(11) NOT NULL,
  `IDingrediente` int(11) NOT NULL,
  `Qtd` int(11) DEFAULT NULL,
  `UniMedida` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `despensa`
--

INSERT INTO `despensa` (`IDusuario`, `IDingrediente`, `Qtd`, `UniMedida`) VALUES(1, 2, 1, '200g');
INSERT INTO `despensa` (`IDusuario`, `IDingrediente`, `Qtd`, `UniMedida`) VALUES(1, 5, 1, '200g');
INSERT INTO `despensa` (`IDusuario`, `IDingrediente`, `Qtd`, `UniMedida`) VALUES(1, 8, 1, '500g');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `IDingrediente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `UniMed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingredientes`
--

INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(2, 'Macarrão Penne', 1, '500g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(3, 'Salsicha', 1, '100g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(4, 'Macarrão', 1, '500g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(5, 'Creme de Leite', 1, '200g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(6, 'Ovo', 1, '60g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(7, 'Sal', 1, '100g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(8, 'Peito de Frango', 1, '500g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(9, 'Margarina', 1, '500g');
INSERT INTO `ingredientes` (`IDingrediente`, `Nome`, `Quantidade`, `UniMed`) VALUES(10, 'Miojo', 1, '80g');

-- --------------------------------------------------------

--
-- Estrutura para tabela `listadecompras`
--

CREATE TABLE `listadecompras` (
  `IDLista` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `IDingrediente` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `DataCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `IDreceita` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `tempoPrep` int(11) NOT NULL,
  `modoPrep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`IDreceita`, `titulo`, `descricao`, `tempoPrep`, `modoPrep`) VALUES(17, 'macarrão penne ao molho branco (4 porções)', '250 gramas de macarrão penne; 2 colheres (sopa) de manteiga; 2 colheres (sopa) de farinha de trigo; ½ caixa de creme de leite; 2 xícaras de leite; ½ colher (sopa) de azeite de oliva; ½ cebola picada; 150 gramas de presunto picado; 150 gramas de ervilha fresca; parmesão a gosto; sal a gosto; noz moscada a gosto', 20, '1- cozinhe o macarrão, já com sal, por 10 minutos. 2- refogue a cebola no azeite de oliva e na manteiga. 3- acrescente a farinha de trigo e mexa bem por, aproximadamente, dois minutos, em fogo baixo. 4- acrescente o leite e bata o molho com o fuê. 5- coloque o creme de leite, misture e tempere com o sal, com a noz moscada e a pimenta do reino. 6- por fim, coloque a ervilha, o parmesão ralado e o presunto. misture e desligue o fogo. 7-escorra a massa e misture no molho.');
INSERT INTO `receitas` (`IDreceita`, `titulo`, `descricao`, `tempoPrep`, `modoPrep`) VALUES(18, 'strogonoff de frango (10 porções)', '3 peitos de frango cortados em cubos; sal a gosto; 1 cebola picada; 1 colher de manteiga; 1/3 copo de mostarda; 1 copo de creme de leite; 1 dente de alho picado; pimenta-do-reino a gosto; 2 colheres (sopa) de maionese; 1/2 copo de ketchup; 1 copo de cogumelos; batata palha a gosto.', 60, '1- em uma panela, misture o frango, o alho, a maionese, o sal e a pimenta. 2- em uma frigideira grande, derreta a manteiga e doure a cebola. 3- junte o frango temperado até que esteja dourado. 4- adicione os cogumelos, o ketchup e a mostarda. 5- incorpore o creme de leite e retire do fogo antes de ferver.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita_ingrediente`
--

CREATE TABLE `receita_ingrediente` (
  `IDingrediente` int(11) NOT NULL,
  `IDreceita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receita_ingrediente`
--

INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(2, 17);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(5, 17);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(5, 18);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(7, 17);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(7, 18);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(8, 18);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(9, 17);
INSERT INTO `receita_ingrediente` (`IDingrediente`, `IDreceita`) VALUES(9, 18);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `Nome`, `Email`, `Senha`) VALUES(1, 'user', 'user@example.com', 's_user');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `despensa`
--
ALTER TABLE `despensa`
  ADD PRIMARY KEY (`IDusuario`,`IDingrediente`),
  ADD KEY `IDingrediente` (`IDingrediente`);

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`IDingrediente`);

--
-- Índices de tabela `listadecompras`
--
ALTER TABLE `listadecompras`
  ADD PRIMARY KEY (`IDLista`),
  ADD KEY `IDingrediente` (`IDingrediente`),
  ADD KEY `listadecompras_ibfk_1` (`IDusuario`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`IDreceita`);

--
-- Índices de tabela `receita_ingrediente`
--
ALTER TABLE `receita_ingrediente`
  ADD PRIMARY KEY (`IDingrediente`,`IDreceita`),
  ADD KEY `IDreceita` (`IDreceita`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `IDingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `listadecompras`
--
ALTER TABLE `listadecompras`
  MODIFY `IDLista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `IDreceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `despensa`
--
ALTER TABLE `despensa`
  ADD CONSTRAINT `despensa_ibfk_1` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`),
  ADD CONSTRAINT `despensa_ibfk_2` FOREIGN KEY (`IDingrediente`) REFERENCES `ingredientes` (`IDingrediente`);

--
-- Restrições para tabelas `listadecompras`
--
ALTER TABLE `listadecompras`
  ADD CONSTRAINT `listadecompras_ibfk_1` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`),
  ADD CONSTRAINT `listadecompras_ibfk_2` FOREIGN KEY (`IDingrediente`) REFERENCES `ingredientes` (`IDingrediente`);

--
-- Restrições para tabelas `receita_ingrediente`
--
ALTER TABLE `receita_ingrediente`
  ADD CONSTRAINT `receita_ingrediente_ibfk_1` FOREIGN KEY (`IDingrediente`) REFERENCES `ingredientes` (`IDingrediente`),
  ADD CONSTRAINT `receita_ingrediente_ibfk_2` FOREIGN KEY (`IDreceita`) REFERENCES `receitas` (`IDreceita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
