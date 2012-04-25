<?php
  // Mit Datenbank verbinden
  include 'db_connect.php';
  include 'models/bestandListe.php';
  
  // Holen aller Bestandslisten
  $bestandListe = bestandListeModel::getAllBestandListe();

  // Erstellen einer neuen Tabelle
  $table = new customTable('materialliste');
  // Setzen der Tabellenheader
  $table->set_header(array('Bild', 'Bezeichnung', 'Kategorie', 'Anzahl', 'Lagert in', 'Eingetragen am'));
  // Setzen der Zeilen der Tabelle
  $table->set_values($bestandListe);
  // Setzen der Spaltenanzeige
  $table->set_column_layout('111111');
  // Generiere und zeichne Tabelle
  $table->show();
  
  mysql_close($link);
?>
