<?php
// Persistenzklasse des Benutzers
class benutzer {
    var $id, $pw_hash, $email, $rolle, $name, $stammtisch_id;

    function getColumnNames() {
        return array("id", "pw_hash", "email", "rolle", "name");
    }
}

class benutzerModel {

    // Gibt ein Array mit allen Benutzern zurueck
    static function getAllBenutzer() {
        $query="SELECT ID, pw_hash, email, rolle, name FROM benutzer";

        $result = mysql_query($query);

        $result_array = array();
        while($row = mysql_fetch_object($result)) {
            $benutzer = new benutzer();
            $benutzer->id  = $row->ID;
            $benutzer->pw_hash = $row->pw_hash;
            $benutzer->email = $row->email;
            $benutzer->rolle = $row->rolle;
            $benutzer->name = $row->name;

            $result_array[] = $benutzer;
        }
        return $result_array;
    }

    static function getBenutzerWithIDAndPassword($userID, $userPw) {
        $userID = mysql_real_escape_string($userID);
        $userPw = mysql_real_escape_string($userPw);
        $query="SELECT ID, pw_hash, email, rolle, name FROM benutzer WHERE ID = '$userID' and pw_hash = '$userPw'";

        $result = mysql_query($query);
        $row = mysql_fetch_object($result);

        $benutzer = null;
        if ($row) {
            $benutzer = new benutzer();
            $benutzer->id  = $row->ID;
            $benutzer->pw_hash = $row->pw_hash;
            $benutzer->email = $row->email;
            $benutzer->rolle = $row->rolle;
            $benutzer->name = $row->name;
        }

        return $benutzer;
    }
}
?>
