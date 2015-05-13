-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 03:50 PM
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
  `e-mail` varchar(40) NOT NULL,
  `kategorija` varchar(20) NOT NULL,
  `zvanje` varchar(30) NOT NULL,
  `brTel` varchar(20) NOT NULL,
  PRIMARY KEY (`idKor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKor`, `korisnickoIme`, `ime`, `prezime`, `lozinka`, `e-mail`, `kategorija`, `zvanje`, `brTel`) VALUES
(1, 'miki', '', '', 'miki123', '', 'zapProizvodnja', '', ''),
(2, 'pera', '', '', 'pera123', '', 'zapNabavka', '', ''),
(3, 'zika', '', '', 'zika123', '', 'zapMagacin', '', ''),
(4, 'admin', '', '', 'admin123', '', 'admin', '', '');

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
(1, 3, 150);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sirovina`
--

INSERT INTO `sirovina` (`idSirovine`, `naziv`, `serBr`, `vremePristiz`, `jedinica`, `magacinUk`, `magacinRez`) VALUES
(1, 'nana', '56464', 11, 'g', 3000, 2000),
(2, 'biljcica', '7657', 3, 'g', 500, 500),
(3, 'gel', '4343', 4, 'g', 1000, 650);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `zahtevproizvodnja`
--

INSERT INTO `zahtevproizvodnja` (`idZahtev`, `idProizvod`, `datum`, `kolicina`, `status`) VALUES
(2, 1, '2015-05-13', 1, 'complete'),
(4, 1, '2015-05-20', 2, 'incomplete');

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
(2, 1, '2015-05-13', '2015-05-13', 100, 100, 'complete'),
(2, 2, '2015-05-13', '2015-05-13', 200, 200, 'complete'),
(2, 3, '2015-05-13', '2015-05-13', 150, 150, 'complete'),
(4, 1, '2015-05-13', '2015-05-13', 200, 200, 'complete'),
(4, 2, '2015-05-13', '2015-05-13', 400, 200, 'pending'),
(4, 3, '2015-05-13', '2015-05-13', 300, 300, 'complete');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
