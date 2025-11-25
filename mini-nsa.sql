-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2025 às 00:48
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mini-nsa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `ano_matricula` varchar(15) NOT NULL,
  `curso` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `sobrenome`, `sexo`, `ano_matricula`, `curso`) VALUES
(22, '22', '22', 'masculino', '222', '22'),
(2222, '2222', '222', 'masculino', '222', '2222'),
(2223, '2222', 'sdasdad', 'masculino', 'sss', 's'),
(2224, '2222', 'sdasdad', 'masculino', 'sss', 's'),
(2225, 'ANderson silva', 'silva', 'Outro', '1999', 'MC'),
(2226, 'ANderson silva', 'silva', 'Masculino', '1999', 'MC'),
(2227, 'Tamo tamo tamo tamo tamo', 'nigger', 'Masculino', '2500', 'MC'),
(2228, 'asdasd', '23asda', 'Masculino', '23232', 'MC');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
