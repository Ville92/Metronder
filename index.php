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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.1/fetch.min.js"></script>
</head>
    
<body>
<img class="logo" src="img/match_active.png">
<h1>Metronder</h1>

<?php

    echo($_SESSION['message']);
//LOGIN
//Tultiinko tälle sivulle lomakkeen submit painikkeella?
if(isset($_POST['login'])){
    //Onnistuuko kirjautuminen
    //Jos ok, saadaan käyttäjän kaikki tiedot
    $user = login($_POST["givenEmail"], $_POST["givenPw"], $DBH);
    if($user){ //Löydettiinkö
        //Talletetaan hänen tiedot sessiomuuttujiin
        $_SESSION['loggedIn'] = "yes";
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['description'] = $user->description;
        $_SESSION['personID'] = $user->personID;
        unset($_SESSION['message']);
        redirect("match.php");
    }
    else{
        $_SESSION['message'] = '<p class="errorMessage">Väärä salasana tai email</p>';
    }
}

?>
    
<form method="post">
    <input type="text" name="givenEmail" placeholder="Sähköposti"/>

    <input type="password" name="givenPw" placeholder="Salasana"/>

    <input class="button" type="submit" name="login" value="Kirjaudu">
</form>

<form method="post" action="register.php">
    <h4>Eikö sinulla ole vielä tunnusta?</h4>
    <input class="button" type="submit" name="gotoRegister" value="Rekisteröidy">
</form>
</body>
</html>
