<?php

class customTable {

    var $header, $values, $tableClass, $layout;

    // Konstruktor der Tabelle
    // Paramter $class: CSS-Klasse der Tabelle
    function __construct($class) {
        $this->tableClass = $class;
    }

    // Setzen der Spaltenueberschriften
    // Paramter $header: array('Spalte 1', 'Spalte 2')
    function set_header($header) {
        $this->header = $header;
    }

    // Setzen des Tabelleninhaltes
    // Paramter $content: array($persistenzobjekt1, $persistenzobjekt2)
    function set_values($content) {
        $this->values = $content;
    }

    // Darstellung der Spalten
    // Parameter $layout: "01101i"
    // 0 = ausblenden
    // 1 = normal
    // i = Bild
    function set_column_layout($layout) {
        $this->layout = $layout;
    }

    // Hinzufuegen einer Zeile in der Tabelle
    // Paramter $row: $persistenzobjekt
    function add_row($row) {
        $this->values[] = $row;
    }

    // Generiere die Tabelle und zeige sie an
    function show() {
        // Generiere Tabellenkopf
        echo '<table class="'.$this->tableClass.'">';
        echo '<thead><tr>';

        foreach ($this->header as $head) {
            echo '<td>'.$head.'</td>';
        }
        echo '</tr></thead><tbody>';
  
        // Zeilenweise Ausgabe der Daten
        foreach ($this->values as $row) {
            echo "<tr>";
            $i = 0;
            // Durchlaufe alle Spaltennamen
            foreach ($row->getColumnNames() as $columnName) {
                // Pruefe welchen Status die aktuelle Spalte bekommt
                switch ($this->layout[$i]) {
                    // ausblenden
                    case 0: 
                        continue;
                        break;
                    // normale Darstellung
                    case 1:
                    case null:
                        echo "<td>".$row->$columnName."</td>";
                        break;
                    case "i":
                        echo "<td><img src\"".$row->$columnName."\"/></td>";
                        break;
                }
                $i++;
            }
            echo "</tr> \n";
        }

        echo '</tbody>';
        echo '</table>';
    }

}

?>
