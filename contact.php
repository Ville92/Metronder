<?php session_start();
//Muista käynnistää sessio aina ennen kuin aloitat sivulle kirjoittamisen
require_once("config/config.php");
?>

<!DOCTYPE html5>
<html>
<head>
<title>Metronder</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">
<meta charset="UTF-8">

</head>
    
<body id="contact">
<main class="content">
    <?php include_once("includes/creating_contact.php"); ?>
</main>
<?php include("footer.php"); ?>

</body>
</html>