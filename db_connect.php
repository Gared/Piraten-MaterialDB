<?php
  // Hier die Datenbank-Daten eintragen
  $db_host = 'localhost';
  $db_user = 'material_db';
  $db_pass = '';
  $db_name = 'material_db';
  
  $link = mysql_connect($db_host, $db_user, $db_pass);
  if (!$link) {
    die('Verbindung schlug fehl: ' . mysql_error());
  }

  mysql_select_db($db_name);
?>
