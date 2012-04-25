<?php
// Persistenzklasse der Betandsliste
class bestandListe {
    var $bild_url, $bezeichnung, $kategorie, $anzahl, $ort, $datum;

    function getColumnNames() {
        return array("bild_url", "bezeichnung", "kategorie", "anzahl", "ort", "datum");
    }
}

class bestandListeModel {

    // Gibt ein Array mit allen Bestandslisten zurueck
    static function getAllBestandListe() {
        $query="SELECT teile.bild_url, teile.bezeichnung, kategorien.bezeichnung as kategorie, bestand.anzahl, lager.ort, bestand.datum
                FROM bestand, teile, kategorien, lager
                WHERE bestand.teile_ID = teile.ID
                AND teile.kategorie_ID = kategorien.ID
                AND bestand.lager_ID = lager.ID
                ORDER BY kategorie ASC, teile.bezeichnung ASC";

        $result = mysql_query($query);

        $result_array = array();
        while($row = mysql_fetch_object($result)) {
            $bestandListe = new bestandListe();
            $bestandListe->bild_url  = $row->bild_url;
            $bestandListe->bezeichnung = $row->bezeichnung;
            $bestandListe->kategorie = $row->kategorie;
            $bestandListe->anzahl = $row->anzahl;
            $bestandListe->ort = $row->ort;
            $bestandListe->datum = $row->datum;

            $result_array[] = $bestandListe;
        }
        return $result_array;
    }
}
?>
