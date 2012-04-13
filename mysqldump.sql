-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 13. April 2012 um 23:05
-- Server Version: 5.0.51
-- PHP-Version: 5.2.6-1+lenny16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `material_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
  `ID` varchar(100) collate latin1_german1_ci NOT NULL,
  `pw_hash` varchar(32) collate latin1_german1_ci NOT NULL,
  `email` varchar(100) collate latin1_german1_ci NOT NULL,
  `rolle` int(11) NOT NULL,
  `name` varchar(100) collate latin1_german1_ci NOT NULL,
  `stammtisch_ID` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestand`
--

CREATE TABLE IF NOT EXISTS `bestand` (
  `ID` int(11) NOT NULL auto_increment,
  `teile_ID` int(11) NOT NULL,
  `lager_ID` int(11) NOT NULL,
  `datum` date NOT NULL,
  `anzahl` int(11) default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE IF NOT EXISTS `kategorien` (
  `ID` int(11) NOT NULL auto_increment,
  `bezeichnung` varchar(255) collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lager`
--

CREATE TABLE IF NOT EXISTS `lager` (
  `ID` int(11) NOT NULL auto_increment,
  `benutzer_ID` varchar(255) collate latin1_german1_ci NOT NULL,
  `adresse` varchar(255) collate latin1_german1_ci NOT NULL,
  `ort` varchar(255) collate latin1_german1_ci NOT NULL,
  `bemerkung` text collate latin1_german1_ci NOT NULL,
  `frei` tinyint(1) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachbestellung`
--

CREATE TABLE IF NOT EXISTS `nachbestellung` (
  `ID` int(11) NOT NULL default '0',
  `teile_ID` int(11) NOT NULL,
  `benutzer_ID` varchar(255) collate latin1_german1_ci NOT NULL,
  `datum` date NOT NULL,
  `anzahl` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stammtische`
--

CREATE TABLE IF NOT EXISTS `stammtische` (
  `ID` int(11) NOT NULL auto_increment,
  `ort` varchar(255) collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teile`
--

CREATE TABLE IF NOT EXISTS `teile` (
  `ID` int(11) NOT NULL auto_increment,
  `bezeichnung` varchar(255) collate latin1_german1_ci NOT NULL,
  `kategorie_ID` int(11) NOT NULL,
  `bild_url` varchar(1024) collate latin1_german1_ci NOT NULL,
  `web_url` varchar(1024) collate latin1_german1_ci NOT NULL,
  `beschreibung` text collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=3 ;
