<?php
  // Mit Datenbank verbinden
  include 'db_connect.php';
  
  // MySQL-Abfrage
  $query="SELECT teile.bild_url, teile.bezeichnung, kategorien.bezeichnung as kategorie, bestand.anzahl, lager.ort, bestand.datum
          FROM bestand, teile, kategorien, lager
          WHERE bestand.teile_ID = teile.ID
          AND teile.kategorie_ID = kategorien.ID
          AND bestand.lager_ID = lager.ID
          ORDER BY kategorie ASC, teile.bezeichnung ASC";
  
  $result = mysql_query($query);
  
  // Erzeugen der Tabelle
  echo '<table class="materialliste">';
  echo '<thead><tr><td>Bild</td><td>Bezeichnung</td><td>Kategorie</td><td>Anzahl</td><td>Lagert in</td><td>Eingetragen am</td></tr></thead>';
  echo '<tbody>';
  
  // Zeilenweise Ausgabe der Daten
  while($row = mysql_fetch_object($result)){
    echo "<tr><td><img src=\"$row->bild_url\" alt=\"$row->bezeichnung\" /></td><td> $row->bezeichnung </td><td> $row->kategorie </td><td> $row->anzahl </td><td> $row->ort </td><td> $row->datum </td></tr> \n";

  }

  echo '</tbody>';
  echo '</table>';
  
  
  mysql_close($link);
?>
