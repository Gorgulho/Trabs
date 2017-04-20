-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Abr-2017 às 10:19
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espetaculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `nome_evento` varchar(100) NOT NULL,
  `tipo_evento` varchar(100) NOT NULL,
  `data_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `validate` varchar(5) NOT NULL,
  `organizer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `nome_evento`, `tipo_evento`, `data_evento`, `hora_evento`, `validate`, `organizer_id`) VALUES
(10, 'Iberanime', 'Anime', '2020-09-19', '16:16:00', 'Nao', 2),
(11, 'Start Work', 'coisas', '2017-02-10', '11:10:00', 'Sim', 2),
(13, 'Coisas', 'Laranjas', '2017-02-10', '12:54:00', 'Sim', 1),
(14, 'E3', 'tipo', '2017-02-10', '12:55:00', 'Sim', 3),
(15, 'CakePHP', 'PHP', '2015-06-02', '01:10:00', 'Sim', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizers`
--

CREATE TABLE `organizers` (
  `id` int(11) NOT NULL,
  `nome_organizador` varchar(150) NOT NULL,
  `nome_empresa` varchar(150) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `organizers`
--

INSERT INTO `organizers` (`id`, `nome_organizador`, `nome_empresa`, `image`) VALUES
(1, 'Gonçalo Correia', 'DJCOMPANY', 'uploads/379f8f56-5a88-4038-9b3a-70edcf62ad78.jpg'),
(2, 'Telmo Antunes', 'HATTERCOMPANY', 'uploads/5ae0657b-0a30-4deb-a586-2488c82c730f.jpg'),
(3, 'João Soares', 'MEMECOMPANY', 'uploads/ebf5bff9-0c8d-498b-94da-66a5c4c86d1f.jpg'),
(4, 'Pedro Filipe', 'PRISISCOMPANY', 'uploads/a991ebb8-4462-4a91-8f86-328e907a2dc4.jpg'),
(5, 'Tiago Santos', 'MELANCIACOMPANY', 'uploads/284a7bb3-f08c-4adc-bbcc-fa5c78cec823.jpg'),
(6, 'André Cuco', 'CUCOCOMPANY', 'uploads/e65f3afe-b14d-477e-b0de-e3144b966a77.PNG'),
(13, 'Pedro Duarte', 'FISHCOMPANY', 'uploads/1edc5d17-b014-4259-9369-a8819796904d.jpg'),
(14, 'Miguel Sebastião', 'BONBISTCOMPANY', 'uploads/ca92aa5f-850b-4596-96b8-94e06a9e7aa8.jpg'),
(16, 'Mariana Sofia', 'PIKINITACOMPANY', 'uploads/ad4ac746-189a-477f-a2f9-418e2ce03867.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modifeid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modifeid`) VALUES
(1, 'Pedro', 'prisioneiro@gmail.com', '$2y$10$QqQbIiWXMZVDwXTum0c8oeMLhbFhzgXEbKqk17c.8lj/9to3Rb4v2', '2017-01-27 23:41:50', '2017-02-09 09:53:00'),
(2, 'Gorgulho', 'gorgulho.joao000@gmail.com', '$2y$10$qCi2ikF0Wte/QSlKv6zYF.ZfjLFDGDc8xEZWUi3FO13cl.3vbLZdi', '2017-01-28 00:40:26', '2017-02-09 09:53:00'),
(3, 'João Gorgulho', 'joao@gmail.com', '$2y$10$UPP98hC6Eg0hDVO5jt6mSeieEsVCmW3u.pyKGpS6GE36Q42EBEaRq', '2017-01-31 08:54:42', '2017-02-07 09:07:00'),
(4, 'Tiago Santos', 'tiago@tiago.com', '$2y$10$pS.odHchwv2WsgaJ51vvRuAytJqXm/9sVrYzTGUjYRbt/Atmo4aTO', '2017-01-31 09:02:44', NULL),
(5, 'João Soares', 'some@thing.yes', '$2y$10$GcQRfFwmuQAhj.5Q4ksOIeEbpctlvTo6zy1gr5QDSrr4naSSoLW9i', '2017-02-07 09:09:43', '2017-02-07 09:09:00'),
(6, 'Peixinho', 'pedro@peixinho.com', '$2y$10$13BPTMY886gNKr.5GbaUnuakwsLCIpmnHE8/0Zv9ud/J/DTaEB4PO', '2017-02-09 09:54:38', '2017-02-09 09:54:00'),
(7, 'Telmo', 'Telmo@hater.com', '$2y$10$5BsmUW8il.BhuiL/BVSDPOJi9sWDFZ44QGv6V1UFm/ACOPisGPUaa', '2017-02-09 09:55:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
