<?php
   include 'const.php';

   // Session starten, wenn Daten mit POST übermittelt wurden
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      session_start();

      $post_userID = $_POST['userID'];
      $post_pw_hash = md5(md5($_POST['password'].SYSTEM_SALT));

      // Mit Datenbank verbinden
      include 'db_connect.php';

      include 'models/benutzer.php';

      $benutzer = benutzerModel::getBenutzerWithIDAndPassword($post_userID, $post_pw_hash);

      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);

      // Benutzername und Passwort werden überprüft
      if ($benutzer != null) {
         // Session-Variablen setzten
         $_SESSION['angemeldet'] = true;
         $_SESSION['userID'] = $post_userID;

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
      <title>Gesch&uuml;tzter Bereich</title>
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
