<?php session_start();
require_once("config/config.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Metronder</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">
<meta charset="UTF-8">

</head>
    
<body id="member">
    
<a href="member-edit.php"><div style="background-image: url('<?php include_once('includes/creatingMemberImage.php'); ?>')" class="member_image"></div></a>
<section>
<h1>Kuvaus</h1>
<article class="infobox_member">
<p><?php include_once("includes/creatingDescription.php"); ?></p>
</article>
<a href="member-edit.php"><input class="button" type="submit" name="edit" value="Muokkaa"></a>
</section>
    
<?php include("footer.php"); ?>

</body>
</html>