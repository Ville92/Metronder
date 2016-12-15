<?php session_start();
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
<script src="js/jquery-3.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.1/fetch.min.js"></script>
</head>
    
<body id="chat">
    <section class="top_bar">
        <a href ="contact.php"><img class="back" src="img/back.png"></a>
        <div style="background-image: url('<?php include_once('includes/creatingChatImage.php'); ?>')" class="member_image"></div>
    
        <section class="chat_area"></section>
        <?php //include_once("creatingChat.php");?>
    </section>
    <form action="saveChat.php" method="post" class="send_section">
        <input type="text" name="sent_message" placeholder="Kirjoita viesti" class="chat_bar">
        <input class="send_button" type="submit" name="sendMessage" value="Lähetä">
    </form>

<script>
//TO SCROLL THE CHAT DOWN
    var $cont = $('.chat_area');
	$cont[0].scrollTop = $cont[0].scrollHeight;

	$('.inp').keyup(function(e) {
    	if (e.keyCode == 13) {
        	$cont.append('<p>' + $(this).val() + '</p>');
        	$cont[0].scrollTop = $cont[0].scrollHeight;
        	$(this).val('');
    }
})
.focus();
    </script>
<script src="chat.js"></script>

<script>
//CHATIN AUTOSCROLL ALAS
var $cont = $('.chat_area');
$cont[0].scrollTop = $cont[0].scrollHeight;

$('.inp').keyup(function(e) {
    if (e.keyCode == 13) {
        $cont.append('<p>' + $(this).val() + '</p>');
        $cont[0].scrollTop = $cont[0].scrollHeight;
    }
})
.focus();</script>
    
<?php include("footer.php"); ?>

</body>
</html>