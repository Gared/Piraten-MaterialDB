<?php
  // Mit Datenbank verbinden
  include 'db_connect.php';
  include 'models/teile.php';
  include 'models/lager.php';
?>
  
<!-- Formular mit Feldern und Dropdowns für die Einträge in die Bestandsliste -->
<form action="index.php" type="POST">
  <table>
    <thead>
      <tr><td>Teil ausw&auml;hlen</td><td>Anzahl</td><td>im Lager</td></tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <select name="teil" size="1">
        
          <?php
            // Laden aller Teile
            $teile = teilModel::getAllTeile();
            // Dropdown mit Einträgen Füllen
            foreach ($teile as $teil){
              echo "<option value=\"$teil->id\">$teil->bezeichnung</option>";
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
            // Laden aller Lager
            $lagerArr = lagerModel::getAllLager();
            // Dropdown mit Einträgen Füllen
            foreach ($lagerArr as $lager){
              echo "<option value=\"$lager->id\">$lager->ort</option>";
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
