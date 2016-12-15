<?php
require_once("config/config.php");
//SSLon();
/*
*Näytetään rekisteröinti, kirjaudu tai kirjautuneen käyttäjätieto
*/
?>

<!DOCTYPE html>
<html>
<head>
<title>Metronder</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">
<meta charset="UTF-8">

</head>
    
<body>

    
<section>
    <a href ="logout.php"><img class="back" src="img/back.png"></a>
    <img class="logo" src="img/match_active.png">
    <h1>Metronder</h1>
</section>
    <?php
//Tultiinko tälle sivulle lomakkeen submit painikkeella?
if(!empty($_POST["gotoRegister"])){
    session_destroy(); //tuhoa sessio!
}else{echo($_SESSION['message']);}
?>
<form method="post" action="saveUser.php">
    <input type="text" name="givenUsername" placeholder="Käyttäjänimi">
    
    <input type="text" name="givenEmail" placeholder="Sähköposti">
    
    <input type="password" name="givenPw" placeholder="Salasana">
    <input type="password" name="givenPwAgain" placeholder="Toista salasana">

    <input class="button" type="submit" name="register" value="Rekisteröidy">
    </form>
    
<script>
var salasana = document.querySelector('input[name="givenPw"]');
var varmistus = document.querySelector('input[name="givenPwAgain"]');
var fillPattern = function(){
    varmistus.pattern = salasana.value;
}
salasana.addEventListener('keyup', fillPattern);
</script>

</body>
</html>