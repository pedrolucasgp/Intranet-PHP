-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/11/2024 às 19:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intranetdb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `remetente` varchar(255) NOT NULL,
  `andamento` varchar(20) DEFAULT NULL,
  `responsavel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `motivo`, `descricao`, `remetente`, `andamento`, `responsavel`) VALUES
(20, 'Scanner da recepção não funciona.', 'Os arquivos não estão aparecendo na pasta do scanner.', 'luciana@teste.com', 'Finalizado', 'Pedro'),
(21, 'Esqueci a senha do sistema', 'Não estou conseguindo acessar o sistema, necessito de uma troca de senha', 'gisele@teste.com', 'Andamento', 'Gabriel'),
(22, 'Solicitação de toner', 'As impressões estão saindo com pouca tinta, precisa trocar o toner', 'leticia@teste.com', 'Finalizado', 'Thiago');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `condicao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `produto`, `quantidade`, `condicao`) VALUES
(1, 'Adaptador de Rede Lenovo', 2, 'Usado'),
(2, 'Adaptador SATA', 2, 'Usado'),
(6, 'Adaptador VGA para HDMI', 1, 'Usado'),
(7, 'Cabo de energia', 15, 'Usado'),
(8, 'Cabo de rede', 31, 'Usado'),
(9, 'Cabo de telefone', 30, 'Usado'),
(10, 'Cabo Displayport', 2, 'Usado'),
(11, 'Cabo HDMI', 2, 'Usado'),
(12, 'Cabo P2', 2, 'Usado'),
(13, 'Cabo para placa mãe', 1, 'Usado'),
(14, 'Cabo SFP', 7, 'Devolver'),
(15, 'Cabo VGA junto com de bolinha', 4, 'Usado'),
(16, 'Caixa com HDS do Hospital', 1, 'Devolver'),
(17, 'Caixa de ferramentas', 1, 'Usado'),
(18, 'Caixa de parafusos', 1, 'Usado'),
(19, 'Caixa de som Britania', 1, 'Usado'),
(20, 'Caixa de som Generica', 2, 'Novo'),
(21, 'Carregador Notebook Generico', 5, 'Usado'),
(22, 'Carregador Samsung', 2, 'Usado'),
(23, 'Celular Samsung', 2, 'Usado'),
(24, 'Conectores cabo de rede tomada', 10, 'Novo'),
(25, 'Desktop Lenovo', 1, 'Usado'),
(26, 'Filtro de linha', 2, 'Usado'),
(27, 'Firewall', 5, 'Usado'),
(28, 'Headset Intelbrass', 2, 'Novo'),
(29, 'Kit Mouse e Teclado Rise', 3, 'Novo'),
(30, 'KVM Switch 4 Portas Zonet', 1, 'Usado'),
(31, 'Memória RAM para Servidor', 4, 'Novo'),
(32, 'Monitor AOC', 4, 'Usado'),
(33, 'Mouse C3Tech', 3, 'Usado'),
(34, 'Mouse Dell', 2, 'Usado'),
(35, 'Mouse Generico', 1, 'Usado'),
(36, 'Mouse HP', 2, 'Usado'),
(37, 'Mouse HP', 1, 'Novo'),
(38, 'Mouse Lenovo', 3, 'Usado'),
(39, 'MSSD 64', 3, 'Novo'),
(40, 'Notebook Samsung', 1, 'Quebrado'),
(41, 'Passa fio', 1, 'Usado'),
(42, 'Pasta térmica 15g Implastec', 1, 'Usado'),
(43, 'SSD WD Green 240GB', 1, 'Novo'),
(44, 'Suporte gabinete', 1, 'Usado'),
(45, 'Teclado Dell', 1, 'Usado'),
(46, 'Teclado Generico', 1, 'Usado'),
(47, 'Teclado Lenovo', 1, 'Usado'),
(48, 'Telefone Felitron Caixa ', 3, 'Usado'),
(49, 'Telefone Intelbrass Caixa', 1, 'Usado'),
(50, 'Telefone Intelbrass com Headset', 1, 'Usado'),
(51, 'Telefone IP', 1, 'Usado'),
(52, 'Telefone Sem fio Intelbrass', 1, 'Novo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ramal` varchar(20) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `departamento`, `email`, `ramal`, `nome`, `senha`, `nivel`) VALUES
(1, 'Diretoria', 'cristina@teste.com', '216', 'Cristina', 'Cristina@2024', 'USER'),
(2, 'Diretoria', 'jorge@teste.com', '216', 'Jorge', 'Jorge@2024', 'USER'),
(3, 'Faturamento', 'ligia@teste.com', '203', 'Ligia', 'Ligia@2024', 'USER'),
(4, 'Faturamento', 'valeria@teste.com', '203', 'Valeria', 'Valeria@2024', 'USER'),
(5, 'Faturamento', 'fernanda@teste.com', '205', 'Fernanda', 'Fernanda@2024', 'USER'),
(6, 'Faturamento', 'karina@teste.com', '202', 'Karina', 'Karina@2024', 'USER'),
(7, 'Faturamento', 'jessica@teste.com', '201', 'Jessica', 'Jessica@2024', 'USER'),
(8, 'Faturamento', 'flavia@teste.com', '204', 'Flavia', 'Flavia@2024', 'USER'),
(9, 'Faturamento', 'fabiola@teste.com', '202', 'Fabiola', 'Fabiola@2024', 'USER'),
(11, 'Faturamento', 'ingrid@teste.com', '205', 'Ingrid', 'Ingrid@2024', 'USER'),
(12, 'Faturamento', 'daiana@teste.com', '204', 'Daiana', 'Daiana@2024', 'USER'),
(13, 'Auditoria', 'rafaela@teste.com', '214', 'Rafaela', 'Rafaela@2024', 'USER'),
(14, 'Auditoria', 'gracieli@teste.com', '214', 'Gracieli', 'Gracieli@2024', 'USER'),
(15, 'Auditoria', 'eloisa@teste.com', '214', 'Eloisa', 'Eloisa@2024', 'USER'),
(16, 'Auditoria', 'mirela@teste.com', '214', 'Mirela', 'Mirela@2024', 'USER'),
(17, 'Auditoria', 'tamires@teste.com', '214', 'Tamires', 'Tamires@2024', 'USER'),
(18, 'Tecnologia Da Informação', 'gabriel@teste.com', '206', 'Gabriel', 'Gabriel@2024', 'ADMIN'),
(19, 'Tecnologia Da Informação', 'thiago@teste.com', '206', 'Thiago', 'Thiago@2024', 'ADMIN'),
(20, 'Tecnologia Da Informação', 'pedro@teste.com', '206', 'Pedro', 'Pedro@2024', 'ADMIN'),
(21, 'Credenciamento', 'barbara@teste.com', '208', 'Barbara', 'Barbara@2024', 'USER'),
(22, 'Credenciamento', 'beatriz@teste.com', '208', 'Beatriz', 'Beatriz@2024', 'USER'),
(23, 'Credenciamento', 'ariane@teste.com', '209', 'Ariane', 'Ariane@2024', 'USER'),
(24, 'Credenciamento', 'aline@teste.com', '207', 'Aline', 'Aline@2024', 'USER'),
(25, 'Credenciamento', 'ricardo@teste.com', '208', 'Ricardo', 'Ricardo@2024', 'USER'),
(26, 'Credenciamento', 'tabata@teste.com', '209', 'Tabata', 'Tabata@2024', 'USER'),
(27, 'Credenciamento', 'andrea@teste.com', 'N/D', 'Andrea', 'Andrea@2024', 'USER'),
(28, 'Credenciamento', 'jessica@teste.com', '210', 'Jessica', 'Jessica@2024', 'USER'),
(29, 'Comercial Matão', 'simone@teste.com', '213', 'Simone', 'Simone@2024', 'USER'),
(30, 'Comercial Matão', 'monica@teste.com', '213', 'Monica', 'Monica@2024', 'USER'),
(31, 'Comercial Matão', 'carolina@teste.com', '213', 'Carolina', 'Carolina@2024', 'USER'),
(32, 'Relacionamento', 'samantha@teste.com', 'N/D', 'Samantha', 'Samantha@2024', 'USER'),
(33, 'Relacionamento', 'isabela@teste.com', 'N/D', 'Isabela', 'Isabela@2024', 'USER'),
(34, 'Comercial Araraquara', 'ligia@teste.com', 'N/D', 'Ligia', 'Ligia@2024', 'USER'),
(36, 'Comercial Itápolis', 'juliana@teste.com', 'N/D', 'Juliana', 'Juliana@2024', 'USER'),
(37, 'Recursos Humanos', 'paloma@teste.com', 'N/D', 'Paloma', 'Paloma@2024', 'USER'),
(39, 'Financeiro', 'ana@teste.com', '211', 'Ana', 'Ana@2024', 'USER'),
(41, 'Financeiro', 'elen@teste.com', '211', 'Elen', 'Elen@2024', 'USER'),
(42, 'Financeiro', 'aline@teste.com', '212', 'Aline', 'Aline@2024', 'USER'),
(43, 'Clínica', 'renata@teste.com', '219', 'Renata', 'Renata@2024', 'USER'),
(44, 'Clínica', 'giovana@teste.com', '218', 'Giovana', 'Giovana@2024', 'USER'),
(45, 'Recepção Matão', 'marly@teste.com', 'N/D', 'Marly', 'Marly@2024', 'USER'),
(46, 'Recepção Matão', 'ester@teste.com', 'N/D', 'Ester', 'Ester@2024', 'USER'),
(47, 'Recepção Matão', 'andreia@teste.com', 'N/D', 'Andreia', 'Andreia@2024', 'USER'),
(48, 'Recepção Matão', 'daniela@teste.com', 'N/D', 'Daniela', 'Daniela@2024', 'USER'),
(49, 'Recepção Matão', 'carina@teste.com', 'N/D', 'Carina', 'Carina@2024', 'USER'),
(50, 'Recepção Matão', 'fernanda@teste.com', 'N/D', 'Fernanda', 'Fernanda@2024', 'USER'),
(51, 'Recepção Matão', 'luciana@teste.com', 'N/D', 'Luciana', 'Luciana@2024', 'USER'),
(52, 'Protocolo', 'ana@teste.com', 'N/D', 'Ana', 'Ana@2024', 'USER'),
(53, 'Recepção Matão', 'amanda@teste.com', 'N/D', 'Amanda', 'Amanda@2024', 'USER'),
(54, 'Protocolo', 'ana@teste.com', 'N/D', 'Ana', 'Ana@2024', 'USER'),
(55, 'Fisioterapia', 'fisioterapia@teste.com', 'N/D', 'Fisioterapia', 'Fisioterapia@2024', 'USER'),
(56, 'CMI Centro de Autismo', 'ianca@teste.com', 'N/D', 'Ianca', 'Ianca@2024', 'USER'),
(57, 'Recepção Américo Brasiliense', 'bruna@teste.com', 'N/D', 'Bruna', 'Bruna@2024', 'USER'),
(58, 'Recepção Américo Brasiliense', 'carla@teste.com', 'N/D', 'Carla', 'Carla@2024', 'USER'),
(59, 'Recepção Araraquara', 'iara@teste.com', 'N/D', 'Iara', 'Iara@2024', 'USER'),
(60, 'Recepção Araraquara', 'laisa@teste.com', 'N/D', 'Laisa', 'Laisa@2024', 'USER'),
(61, 'Recepção Araraquara', 'jenifer@teste.com', 'N/D', 'Jenifer', 'Jenifer@2024', 'USER'),
(62, 'Recepção Araraquara', 'gisele@teste.com', 'N/D', 'Gisele', 'Gisele@2024', 'USER'),
(63, 'Recepção Itápolis', 'heigla@teste.com', 'N/D', 'Heigla', 'Heigla@2024', 'USER'),
(64, 'Recepção Itápolis', 'giovana@teste.com', 'N/D', 'Giovana', 'Giovana@2024', 'USER'),
(65, 'Recepção Lupo', 'camila@teste.com', 'N/D', 'Camila', 'Camila@2024', 'USER'),
(66, 'Recepção Lupo', 'kelly@teste.com', 'N/D', 'Kelly', 'Kelly@2024', 'USER'),
(67, 'Recepção Lupo', 'fabiana@teste.com', 'N/D', 'Fabiana', 'Fabiana@2024', 'USER'),
(68, 'Recepção Lupo', 'adriana@teste.com', 'N/D', 'Adriana', 'Adriana@2024', 'USER'),
(69, 'Recepção Tabatinga', 'glaucia@teste.com', 'N/D', 'Glaucia', 'Glaucia@2024', 'USER'),
(93, 'Auditoria', 'elessandra@teste.com', '214', 'Elessandra', 'Elessandra@2024', 'USER'),
(94, 'Financeiro', 'leticia@teste.com', '212', 'Leticia', 'Leticia@2024', 'USER');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
