-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: dec. 20, 2020 la 05:20 PM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `ateza`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

CREATE TABLE `angajati` (
  `id_angajat` int(11) NOT NULL,
  `numele` varchar(50) NOT NULL,
  `telefon` int(3) NOT NULL,
  `salariu` double NOT NULL,
  `ziua_nastere` varchar(100) NOT NULL,
  `genul` varchar(50) NOT NULL,
  `sectiunea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `angajati`
--

INSERT INTO `angajati` (`id_angajat`, `numele`, `telefon`, `salariu`, `ziua_nastere`, `genul`, `sectiunea`) VALUES
(10, 'Drobot Sebastian', 60784123, 8990, '30.5.2000', 'M', 1),
(14, 'Stinca Ion', 69834534, 4789, '30.5.2000', 'M', 5),
(15, 'Cemortan Miron', 69346578, 2343, '12.4.1997', 'M', 4),
(16, 'Didic Victor', 60480334, 40000, '21.07.2000', 'M', 2),
(24, 'Laurentiu Pricop', 60987251, 13400, '04.10.2000', 'M', 5),
(26, 'Lungu Alexandru', 67456431, 9886, '03.09.1998', 'M', 2),
(27, 'Paiul Victoria', 68565637, 11000, '09.11.2001', 'F', 5),
(28, 'Eric Plesca', 69872345, 12322, '23.08.2001', 'M', 4),
(29, 'Cecan Rebeca', 69154285, 12200, '08.09.1999', 'F', 3),
(30, 'Nicolaes Irina', 60346981, 9870, '05.10.2002', 'F', 1),
(33, 'Cristian Pinzari', 60456923, 7800, '22.06.1990', 'M', 1),
(34, 'Marius Cazacu', 79456743, 10500, '19.10.2002', 'M', 6),
(36, 'Turcan Constantin', 79234521, 343, '12.10.1998', 'M', 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorii`
--

CREATE TABLE `categorii` (
  `id_categorii` int(11) NOT NULL,
  `id_sectiune` int(11) NOT NULL,
  `nume_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `categorii`
--

INSERT INTO `categorii` (`id_categorii`, `id_sectiune`, `nume_categorie`) VALUES
(1, 1, 'Tehnica de bucatarie'),
(2, 2, 'Climatizare'),
(3, 3, 'Ingrijire personala'),
(4, 4, 'Curatenie si uz casnic'),
(5, 5, 'Tehnica audio'),
(6, 6, 'Televizoare');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `firma`
--

CREATE TABLE `firma` (
  `id_producator` int(11) NOT NULL,
  `tara_producator` varchar(50) NOT NULL,
  `nume_firma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `firma`
--

INSERT INTO `firma` (`id_producator`, `tara_producator`, `nume_firma`) VALUES
(101, 'Corea', 'Samsung'),
(102, 'Germania', 'Philisps'),
(103, 'Slovenia', 'Gorenje'),
(104, 'Suedia', 'Electrolux'),
(105, 'Germania', 'Siemens'),
(106, 'Italia', 'Indesit'),
(107, 'Turcia', 'Arctic'),
(108, 'Germania', 'Bosch'),
(109, 'China', 'Xiaomi'),
(203, 'Franta', 'Saturn'),
(204, 'China', 'Maestro'),
(205, 'Italia', 'Lafe'),
(206, 'Corea', 'LG'),
(207, 'Japonia', 'Panasonic'),
(208, 'USA', 'JBL'),
(209, 'China', 'Sven'),
(213, 'China', 'Rikon');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `id_produs` int(11) NOT NULL,
  `denumirea` varchar(100) NOT NULL,
  `pretul` double NOT NULL,
  `nr_stoc` int(11) DEFAULT NULL,
  `id_prod` int(11) NOT NULL,
  `id_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id_produs`, `denumirea`, `pretul`, `nr_stoc`, `id_prod`, `id_categ`) VALUES
(16, 'Boxa portative', 2500, 3, 101, 5),
(17, 'Televizor QLED 4K', 120000, 3, 101, 6),
(18, 'Microunda', 700, 4, 104, 1),
(19, 'Ventilator', 450, 5, 102, 2),
(20, 'Perie de dinti electronica', 1200, 20, 109, 3),
(21, 'Aspirator', 2300, 6, 105, 4),
(22, 'Fier de calfat', 234.5, 5, 104, 4),
(23, 'Cantar de podea Maestro', 160, 10, 103, 4),
(24, 'Fierbator de apa', 177, 7, 203, 1),
(25, 'Prajitor de paine', 200, 4, 204, 1),
(26, 'Rasnita de cafea', 240, 10, 102, 1),
(27, 'Uscator de par', 320, 6, 205, 3),
(28, 'Fier de calcat', 400, 5, 108, 4),
(29, 'Cantar de bucatarie', 230, 7, 106, 1),
(30, 'Cuptor electric', 300, 3, 105, 1),
(31, 'Boiler cu apa calda', 600, 8, 106, 2),
(32, 'Conditioner', 800, 7, 107, 2),
(33, 'Sistem Home Cinema', 950, 7, 109, 5),
(34, 'Radio portativ', 150, 10, 207, 5),
(35, 'Radio SRP 50W', 2990, 8, 209, 5),
(36, 'Aparat de masaj', 280, 4, 205, 3),
(37, 'Trimer', 300, 10, 109, 3),
(39, 'Televizor FullHD', 8700, 8, 206, 6);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sectii`
--

CREATE TABLE `sectii` (
  `ID_sectie` int(11) NOT NULL,
  `nume_sectie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `sectii`
--

INSERT INTO `sectii` (`ID_sectie`, `nume_sectie`) VALUES
(1, 'Sectia Nr.1'),
(2, 'Sectia Nr.2'),
(3, 'Sectia Nr.3'),
(4, 'Sectia Nr.4'),
(5, 'Sectia Nr.5'),
(6, 'Sectia Nr.6');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`id_angajat`),
  ADD UNIQUE KEY `telefon` (`telefon`),
  ADD KEY `sectiunea` (`sectiunea`);

--
-- Indexuri pentru tabele `categorii`
--
ALTER TABLE `categorii`
  ADD PRIMARY KEY (`id_categorii`),
  ADD KEY `id_sectiune` (`id_sectiune`);

--
-- Indexuri pentru tabele `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id_producator`);

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id_produs`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_categ` (`id_categ`);

--
-- Indexuri pentru tabele `sectii`
--
ALTER TABLE `sectii`
  ADD PRIMARY KEY (`ID_sectie`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `angajati`
--
ALTER TABLE `angajati`
  MODIFY `id_angajat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pentru tabele `categorii`
--
ALTER TABLE `categorii`
  MODIFY `id_categorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `firma`
--
ALTER TABLE `firma`
  MODIFY `id_producator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `id_produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pentru tabele `sectii`
--
ALTER TABLE `sectii`
  MODIFY `ID_sectie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD CONSTRAINT `angajati_ibfk_1` FOREIGN KEY (`sectiunea`) REFERENCES `sectii` (`ID_sectie`);

--
-- Constrângeri pentru tabele `categorii`
--
ALTER TABLE `categorii`
  ADD CONSTRAINT `categorii_ibfk_1` FOREIGN KEY (`id_sectiune`) REFERENCES `sectii` (`ID_sectie`);

--
-- Constrângeri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `produse_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `firma` (`id_producator`),
  ADD CONSTRAINT `produse_ibfk_2` FOREIGN KEY (`id_categ`) REFERENCES `categorii` (`id_categorii`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
