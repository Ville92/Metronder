<?php
require_once('config/config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Metronder</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">
<meta charset="UTF-8">


</head>
    
<body id="settings">
    
<?php
if($_SESSION['loggedIn'] == "yes"){
    ?>
    <a href="logout.php"><input class="button" type="submit" name="logout" value="Kirjaudu ulos">
    </a>
    <?php
}else{redirect("index.php");
?>

<?php
}
?>
    
<section>
<h1>Tietoa meistä</h1>
<article class="infobox_member">
        <p>Ville Aho, Nicholas Leva ja Mikael Hertell</p>
</article>
</section>
    
<?php include("footer.php"); ?>

</body>
</html>