<?php
//Muista käynnistää sessio aina ennen kuin aloitat sivulle kirjoittamisen
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
    
<?php
    echo($_SESSION['message']);
        //Talletetaan hänen tiedot sessiomuuttujiin
        $_SESSION['description'] = $user->description;
        unset($_SESSION['message']);

?>
    
<section class="top_bar">
    <a href ="member.php"><img class="back" src="img/back.png"></a>
    <article style="background-image: url('<?php include_once('includes/creatingMemberImage.php'); ?>')" class="edit_picture"></article>
    <article class="image_selector"></article>
    <article class="add_image"></article>
</section>


<form action="upload.php" method="post" enctype="multipart/form-data">
    <input class="fileUpload" type="file" value="Valitse tiedosto" name="fileToUpload" id="fileToUpload">
    <input class="fileUpload" type="submit" value="Lataa kuva" name="submit">
</form>
    
    <?php echo $_SESSION['description'];?>
    
<section>
    <form method="post" action="saveDescription.php">
        <textarea name="givenDescription" class="edit_infobox_member"><?php include_once("includes/creatingDescription.php"); ?></textarea>
        <a href="member-edit.php">
            <input class="button" type="submit" name="saveDescription" value="Tallenna">
        </a>
    </form>
</section>


    
<?php include("footer.php"); ?>

</body>
</html>