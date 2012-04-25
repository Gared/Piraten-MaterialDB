<?php
// Persistenzklasse des Lagers
class lager {
    var $id, $benutzer_id, $adresse, $ort, $bemerkung;

    function getColumnNames() {
        return array("id", "benutzer_id", "adresse", "ort", "bemerkung");
    }

    function save() {
        return $this->writeToDB();
    }

    function update() {
        return $this->writeToDB(FALSE);
    }

    private function writeToDB($new = TRUE) {
        $benutzer_id = mysql_real_escape_string($this->benutzer_id);
        $adresse = mysql_real_escape_string($this->adresse);
        $ort = mysql_real_escape_string($this->ort);
        $bemerkung = mysql_real_escape_string($this->bemerkung);
        if ($new) {
            $query="INSERT INTO lager (benutzer_ID, adresse, ort, bemerkung) VALUES ('$benutzer_id', '$adresse', '$ort', '$bemerkung')";
        } else {
            $query="UPDATE bestand SET benutzer_ID = '$benutzer_id', adresse = '$adresse', ort = '$ort', bemerkung = '$bemerkung' WHERE ID = '$this->id'";
        }
        return mysql_query($query);
    }
}

class lagerModel {

    // Gibt ein Array mit allen Bestaenden zurueck
    static function getAllLager() {
        $query="SELECT ID, benutzer_ID, adresse, ort, bemerkung FROM lager";

        $result = mysql_query($query);

        $result_array = array();
        while($row = mysql_fetch_object($result)) {
            $lager = new lager();
            $lager->id  = $row->ID;
            $lager->beutzer_id = $row->benutzer_ID;
            $lager->adresse = $row->adresse;
            $lager->ort = $row->ort;
            $lager->bemerkung = $row->bemerkung;

            $result_array[] = $lager;
        }
        return $result_array;
    }
}
?>
