<?php
// Persistenzklasse der Teile
class teil {
    var $id, $bezeichnung, $kategorie_id, $bild_url, $web_url, $beschreibung;

    function getColumnNames() {
        return array("id", "bezeichnung", "kategorie_id", "bild_url", "web_url", "beschreibung");
    }

    function save() {
        return $this->writeToDB();
    }

    function update() {
        return $this->writeToDB(FALSE);
    }

    private function writeToDB($new = TRUE) {
        $bezeichnung = mysql_real_escape_string($this->bezeichnung);
        $kategorie_id = mysql_real_escape_string($this->kategorie_id);
        $bild_url = mysql_real_escape_string($this->bild_url);
        $web_url = mysql_real_escape_string($this->web_url);
        $beschreibung = mysql_real_escape_string($this->beschreibung);
        if ($new) {
            $query="INSERT INTO teile (bezeichnung, kategorie_id, bild_url, web_url, beschreibung) VALUES ('$bezeichnung', '$kategorie_id', '$bild_url', '$web_url', '$beschreibung')";
        } else {
            $query="UPDATE teile SET bezeichnung = '$bezeichnung', kategorie_id = '$kategorie_id', bild_url = '$bild_url', web_url = '$web_url', beschreibung = '$beschreibung' WHERE ID = '$this->id'";
        }
        return mysql_query($query);
    }
}

class teilModel {

    // Gibt ein Array mit allen Bestaenden zurueck
    static function getAllTeile() {
        $query="SELECT ID, bezeichnung, kategorie_id, bild_url, web_url, beschreibung FROM teile";

        $result = mysql_query($query);

        $result_array = array();
        while($row = mysql_fetch_object($result)) {
            $teil = new teil();
            $teil->id  = $row->ID;
            $teil->bezeichnung = $row->bezeichnung;
            $teil->kategorie_id = $row->kategorie_id;
            $teil->bild_url = $row->bild_url;
            $teil->web_url = $row->web_url;
            $teil->beschreibung = $row->beschreibung;

            $result_array[] = $teil;
        }
        return $result_array;
    }
}
?>
