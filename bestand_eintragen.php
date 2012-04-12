<?php
  // Mit Datenbank verbinden
  include 'db_connect.php';
?>
  
<!-- Formular mit Feldern und Dropdowns für die Einträge in die Bestandsliste -->
<form action="index.php" type="POST">
  <table>
    <thead>
      <tr><td>Teil auswählen</td><td>Anzahl</td><td>im Lager</td></tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <select name="teil" size="1">
        
          <?php
            // MySQL-Abfrage
            $query="SELECT * FROM teile";
        
            $result = mysql_query($query);
            // Dropdown mit Einträgen Füllen
            while($row = mysql_fetch_object($result)){
              echo "<option value=\"$row->ID\">$row->bezeichnung</option>";

            }
          ?>

          </select>
        </td>
        <td>
          <input name="anzahl" type="text" maxlength="20" />
        </td>
        <td>
          <select name="lager" size="1">
        
          <?php
            // MySQL-Abfrage
            $query="SELECT * FROM lager";
        
            $result = mysql_query($query);
            // Dropdown mit Einträgen Füllen
            while($row = mysql_fetch_object($result)){
              echo "<option value=\"$row->ID\">$row->ort</option>";

            }
          ?>

          </select>
        </td>
        <td>
          <button type="submit">Abschicken</button>
        </td>
      </tr>
    </tbody>
  </table>

</form>
  
<?php mysql_close($link); ?>
