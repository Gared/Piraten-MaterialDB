<?php
   include 'const.php';

   // Session starten, wenn Daten mit POST übermittelt wurden
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      session_start();

      $post_userID = $_POST['userID'];
      $post_pw_hash = md5(md5($_POST['password'].SYSTEM_SALT));

      // Mit Datenbank verbinden
      include 'db_connect.php';

      // MySQL-Abfrage direkt nach übermitteltem Benutzername filtern. Erspart eine Schleife
      $query="SELECT ID, pw_hash FROM benutzer WHERE ID = '$post_userID'";

      $result = mysql_query($query);
      $row = mysql_fetch_object($result);
      $db_userID  = $row->ID;
      $db_pw_hash = $row->pw_hash;
      $db_pw_salt = $row->pw_salt;

      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);

      // Benutzername und Passwort werden überprüft
      if ($post_userID == $db_userID && $post_pw_hash == $db_pw_hash) {
         // Session-Variablen setzten
         $_SESSION['angemeldet'] = true;
         $_SESSION['userID'] = $db_userID;

         // Weiterleitung zur geschützten Startseite
         if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
            if (php_sapi_name() == 'cgi') {
               header('Status: 303 See Other');
            }
            else {
               header('HTTP/1.1 303 See Other');
            }
         }
         header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
         exit;
      }
   }
?>
<!DOCTYPE html>
<html>
   <link rel="stylesheet" type="text/css" media="all" href="./style.css" />
   <head>
      <title>Geschützter Bereich</title>
   </head>
   <body>
      Demoinstanz - Login mit "demo" / "demo"
      <div id="login_box">
         <form action="login.php" method="post">
            Username:
            <input type="text" name="userID" /><br />
            Passwort:
            <input type="password" name="password" /><br />
            <input type="submit" value="Anmelden" />
         </form>
      </div>
   </body>
</html>
