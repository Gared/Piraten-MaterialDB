<?php include 'auth.php' ?>
<?php include 'functions.php'; ?>

<!DOCTYPE html>

<html>
  <head>
    <title>Materialverwaltung</title>
    <link rel="stylesheet" type="text/css" media="all" href="./style.css" />
  </head>
  <body>
    <div id="header">
      <div id="nav_bar">
        <a href="./?p=1">Gesamtbestand</a> | <a href="./?p=2">Bestand eintragen</a>
      </div>
      <div id="logout_menu">
        angemeldet als <?php echo $_SESSION['userID']; ?> | <a href="./logout.php">abmelden</a>
      </div>
    </div>
    <div id="main">
    <?php
    
      // Auswahl der anzuzeigenden Seite
      $plink = $_GET['p'];
    
      switch ($plink) {
        case 1:
          include 'bestand_auflisten.php';
          break;
        case 2:
          include 'bestand_eintragen.php';
          break;
      }
    ?>
    </div>
  </body>
</html>
