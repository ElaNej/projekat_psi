-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 07:10 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `herbappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `idKor` int(11) NOT NULL AUTO_INCREMENT,
  `korisnickoIme` varchar(20) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kategorija` varchar(20) NOT NULL,
  `zvanje` varchar(30) NOT NULL,
  `brTel` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idKor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKor`, `korisnickoIme`, `ime`, `prezime`, `lozinka`, `email`, `kategorija`, `zvanje`, `brTel`, `status`) VALUES
(1, 'miki', 'Milan', 'Milanovic', 'miki123', '', 'zapProizvodnja', '', '', 1),
(2, 'pera', 'Petar', 'Peric', 'pera123', '', 'zapNabavka', '', '', 1),
(3, 'zika', 'Zivan', 'Zivanovic', 'zika123', '', 'zapMagacin', '', '', 1),
(4, 'admin', '', '', 'admin123', '', 'admin', '', '', 1),
(5, 'proba', '', '', 'proba123', '', 'zapProizvodnja', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE IF NOT EXISTS `proizvod` (
  `idProizvoda` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) NOT NULL,
  `neto` varchar(30) NOT NULL,
  `serBr` varchar(30) NOT NULL,
  `kolicinaMagacin` int(11) NOT NULL,
  PRIMARY KEY (`idProizvoda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`idProizvoda`, `naziv`, `neto`, `serBr`, `kolicinaMagacin`) VALUES
(1, 'prvi proizvod', '250 g', '1111', 12),
(3, 'drugi proizvod', '40g', '4324', 10),
(4, 'treci proizvod', '100g', '333', 12);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodsadrzi`
--

CREATE TABLE IF NOT EXISTS `proizvodsadrzi` (
  `idProizvod` int(11) NOT NULL,
  `idSirovina` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodsadrzi`
--

INSERT INTO `proizvodsadrzi` (`idProizvod`, `idSirovina`, `kolicina`) VALUES
(1, 1, 100),
(1, 2, 200),
(1, 3, 150),
(3, 3, 200),
(3, 4, 150),
(3, 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `regzahtev`
--

CREATE TABLE IF NOT EXISTS `regzahtev` (
  `idZahtev` int(11) NOT NULL AUTO_INCREMENT,
  `idKorisnik` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`idZahtev`),
  KEY `idZahtev` (`idZahtev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sirovina`
--

CREATE TABLE IF NOT EXISTS `sirovina` (
  `idSirovine` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) NOT NULL,
  `serBr` varchar(30) NOT NULL,
  `vremePristiz` int(11) NOT NULL,
  `jedinica` varchar(20) NOT NULL,
  `magacinUk` int(11) NOT NULL,
  `magacinRez` int(11) NOT NULL,
  PRIMARY KEY (`idSirovine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sirovina`
--

INSERT INTO `sirovina` (`idSirovine`, `naziv`, `serBr`, `vremePristiz`, `jedinica`, `magacinUk`, `magacinRez`) VALUES
(1, 'nana', '12345', 11, 'g', 475, 475),
(2, 'biljcica', '7657', 3, 'g', 950, 950),
(3, 'gel', '4343', 4, 'g', 350, 350),
(4, 'wolfsbane', '3213', 4, 'g', 400, 350),
(5, 'koren', '534', 3, 'g', 400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `zahtevproizvodnja`
--

CREATE TABLE IF NOT EXISTS `zahtevproizvodnja` (
  `idZahtev` int(11) NOT NULL AUTO_INCREMENT,
  `idProizvod` int(11) NOT NULL,
  `datum` date NOT NULL,
  `kolicina` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`idZahtev`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `zahtevproizvodnja`
--

INSERT INTO `zahtevproizvodnja` (`idZahtev`, `idProizvod`, `datum`, `kolicina`, `status`) VALUES
(2, 1, '2015-05-13', 1, 'incomplete'),
(4, 1, '2015-05-20', 2, 'incomplete'),
(5, 1, '2015-05-30', 1, 'incomplete'),
(6, 1, '2015-05-26', 1, 'rejected'),
(8, 3, '2015-05-31', 2, 'complete'),
(9, 1, '2015-05-29', 2, 'complete'),
(10, 1, '2015-05-30', 1, 'complete'),
(11, 1, '2015-06-07', 1, 'rejected'),
(12, 1, '2015-06-03', 1, 'rejected'),
(15, 1, '2015-06-03', 1, 'reserved'),
(16, 1, '2015-06-02', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `zahtevsirovina`
--

CREATE TABLE IF NOT EXISTS `zahtevsirovina` (
  `idZahtevProiz` int(11) NOT NULL,
  `idZahtevSirov` int(11) NOT NULL,
  `datumKreiranja` date NOT NULL,
  `datumComplete` date NOT NULL,
  `kolicina` int(11) NOT NULL,
  `rezervisano` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zahtevsirovina`
--

INSERT INTO `zahtevsirovina` (`idZahtevProiz`, `idZahtevSirov`, `datumKreiranja`, `datumComplete`, `kolicina`, `rezervisano`, `status`) VALUES
(2, 1, '2015-05-13', '2015-05-13', 0, 0, 'rejected'),
(2, 2, '2015-05-13', '2015-05-13', 0, 0, 'rejected'),
(2, 3, '2015-05-13', '2015-05-13', 0, 0, 'rejected'),
(4, 1, '2015-05-13', '2015-05-13', 200, 200, 'complete'),
(4, 2, '2015-05-13', '2015-05-26', 400, 400, 'reserved'),
(4, 3, '2015-05-13', '2015-05-13', 300, 300, 'complete'),
(10, 1, '2015-05-26', '2015-05-26', 100, 100, 'reserved'),
(10, 2, '2015-05-26', '2015-05-26', 200, 200, 'reserved'),
(10, 3, '2015-05-26', '2015-05-26', 150, 150, 'reserved'),
(-1, 1, '2015-05-26', '2015-05-26', 100, 100, 'reserved'),
(-1, 2, '2015-05-26', '2015-05-26', 100, 100, 'reserved'),
(11, 1, '2015-05-26', '2015-06-07', 0, 0, 'rejected'),
(11, 2, '2015-05-26', '2015-06-07', 0, 0, 'rejected'),
(11, 3, '2015-05-26', '2015-06-07', 0, 0, 'rejected'),
(16, 1, '2015-05-26', '2015-06-02', 100, 25, 'approved'),
(16, 2, '2015-05-26', '2015-06-02', 200, 50, 'approved'),
(16, 3, '2015-05-26', '2015-06-02', 150, 50, 'approved');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
