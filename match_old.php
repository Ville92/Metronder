<?php
require_once("config/config.php");
require_once("functions/functions.php");
SSLon();
?>
<!DOCTYPE html>
<html>
<head>
<title>Metronder</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">
<meta charset="UTF-8">

</head>
    
<body id="match">
    <section>
        <div id="showInfo" type="button" onclick="document.getElementById('dark').style.display='inline'; document.getElementById('dark').style.position='absolute'; document.getElementById('dark').style.left='0'; document.getElementById('shine').style.display='none'; document.getElementById('shine2').style.display='inline-block'; document.getElementById('showInfo').style.display='none'; document.getElementById('hideInfo').style.display='block'"></div>

        <div id="hideInfo" type="button" onclick="document.getElementById('shine').style.display='inline-block'; document.getElementById('hideInfo').style.display='none'; document.getElementById('showInfo').style.display='inline-block'; document.getElementById('dark').style.display='none'; document.getElementById('shine2').style.display='none'"></div>

        <article class="image">
            <div id="shine"></div>
            <div id="shine2"></div>
        <div id="dark">
            <article class="infobox">
                <h2 class="infoHeader">Kuvaus</h2>
                <p class="infoText"><?php include_once("includes/creatingDescription.php"); ?></p>
            </article>
        </div>
        </article>
    </section>

    <article class="control">
        <div class="no"></div>
        <div class="user">
            <img src="img/crown.png">
            <h2 class="name"><?php echo($_SESSION['username']); ?></h2>
        </div>
        <div class="yes"></div>
    </article>
    <div type="button" value="Hide text" onclick="document.getElementById('dark').style.display='none'; document.getElementById('shine').style.display='block'"></div>
    <div type="button" value="Show text" onclick="document.getElementById('dark').style.display='block'; document.getElementById('shine').style.display='none'"></div>


    
<?php include("footer.php"); ?>
    

</body>
</html>