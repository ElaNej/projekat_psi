-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2015 at 07:44 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodsadrzi`
--

CREATE TABLE IF NOT EXISTS `proizvodsadrzi` (
  `idProizvod` int(11) NOT NULL,
  `idSirovina` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zahtevnabavka`
--

CREATE TABLE IF NOT EXISTS `zahtevnabavka` (
  `idZahtevNab` int(11) NOT NULL AUTO_INCREMENT,
  `idZahtevProiz` int(11) NOT NULL,
  `datumKreiranja` date NOT NULL,
  `datumNabavke` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`idZahtevNab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zahtevnabavkasadrzi`
--

CREATE TABLE IF NOT EXISTS `zahtevnabavkasadrzi` (
  `idZahtev` int(11) NOT NULL,
  `idSirovina` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zahtevproizvodnja`
--

CREATE TABLE IF NOT EXISTS `zahtevproizvodnja` (
  `idZahtev` int(11) NOT NULL AUTO_INCREMENT,
  `idProizvod` int(11) NOT NULL,
  `datum` date NOT NULL,
  `kolicina` int(11) NOT NULL,
  PRIMARY KEY (`idZahtev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zahtevproizvodsadrzi`
--

CREATE TABLE IF NOT EXISTS `zahtevproizvodsadrzi` (
  `idZahtev` int(11) NOT NULL,
  `idSirovina` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `rezervisano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
