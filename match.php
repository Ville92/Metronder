<?php
require_once("config/config.php");
require_once("functions/functions.php");
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
<section class="match">
    <div id="showInfo" type="button" onclick="document.getElementById('dark').style.display='inline'; document.getElementById('dark').style.position='absolute'; document.getElementById('dark').style.left='0'; document.getElementById('showInfo').style.display='none'; document.getElementById('hideInfo').style.display='block'"></div>

    <div id="hideInfo" type="button" onclick="document.getElementById('hideInfo').style.display='none'; document.getElementById('showInfo').style.display='inline-block'; document.getElementById('dark').style.display='none';"></div>
    
    <div type="button" value="Hide text" onclick="document.getElementById('dark').style.display='none'; document.getElementById('shine').style.display='block'"></div>
    <div type="button" value="Show text" onclick="document.getElementById('dark').style.display='block'; document.getElementById('shine').style.display='none'"></div>
        <?php include_once("includes/creatingMatch.php"); ?>
    </section>


    
<?php include("footer.php"); ?>
    

</body>
</html>