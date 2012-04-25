<?php
// Persistenzklasse des Bestandes
class bestand {
    var $id, $teile_id, $lager_id, $datum, $anzahl;

    function getColumnNames() {
        return array("id", "teile_id", "lager_id", "datum", "anzahl");
    }

    function save() {
        return $this->writeToDB();
    }

    function update() {
        return $this->writeToDB(FALSE);
    }

    private function writeToDB($new = TRUE) {
        $teile_id = mysql_real_escape_string($this->teile_id);
        $lager_id = mysql_real_escape_string($this->lager_id);
        $datum = mysql_real_escape_string($this->datum);
        $anzahl = mysql_real_escape_string($this->anzahl);
        if ($new) {
            $query="INSERT INTO bestand (teile_ID, lager_ID, datum, anzahl) VALUES ('$teile_id', '$lager_id', '$datum', '$anzahl')";
        } else {
            $query="UPDATE bestand SET teile_ID = '$teile_id', lager_ID = '$lager_id', datum = '$datum', anzahl = '$anzahl' WHERE ID = '$this->id'";
        }
        return mysql_query($query);
    }
}

class bestandModel {

    // Gibt ein Array mit allen Bestaenden zurueck
    static function getAllBestaende() {
        $query="SELECT ID, teile_ID, lager_ID, datum, anzahl FROM bestand";

        $result = mysql_query($query);

        $result_array = array();
        while($row = mysql_fetch_object($result)) {
            $bestand = new bestand();
            $bestand->id  = $row->ID;
            $bestand->teile_id = $row->teile_ID;
            $bestand->lager_id = $row->lager_ID;
            $bestand->datum = $row->datum;
            $bestand->anzahl = $row->anzahl;

            $result_array[] = $bestand;
        }
        return $result_array;
    }
}
?>
