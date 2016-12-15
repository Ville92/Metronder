<?php
require_once("config/config.php");
$pID = $_POST['givenChatter'];

//KUVAN LISÄYS KONTAKTILLE
        $kysely4 = $DBH->prepare("SELECT path from me_Images where personID = '$pID'");
        $kysely4->execute();
        $rivi4 = $kysely4->fetch();
        $rivi4["path"];
        $imagePath = $rivi4["path"];

//CHATIN HAKU
        $kysely5 = $DBH->prepare("SELECT
    chat, chatID, GROUP_CONCAT(chat) AS chat
FROM
    me_Pair
WHERE senderID = $pID or senderID = $_SESSION[personID] and recieverID = $_SESSION[personID] or recieverID = $pID
GROUP BY
    senderID");
        $kysely5->execute();
        $rivi5 = $kysely5->fetch();
        $rivi5["chat"];
        $chat = $rivi5["chat"];
echo '<div style="background-image: url('.$imagePath.')" class="chat_image"></div>';
echo('<div class="braker">');
echo ('<p class="message" id="message_sent">');
echo str_replace(',', '</p></div><div class="braker"><p class="message" id="message_sent">', $rivi5['chat'].'</p></div>');

/*if(!empty($_POST["givenChatter"])){ //Onko painettu submit painiketta
    //Tallennetaan kantaan $DBH
    echo '<div style="background-image: url('.$imagePath.')" class="chat_image"></div>';
    echo '<p class="message" id="message_sent">'.$pID.$_SESSION['personID'].'</p><br>';
    echo '<p class="message" id="message_recived">'.$chat.'</p><br>';
}
else{}*/

/*
require_once("config/config.php");
$pID = $_POST['givenChatter'];

//KUVAN LISÄYS KONTAKTILLE
        $kysely4 = $DBH->prepare("SELECT path from me_Images where personID = '$pID'");
        $kysely4->execute();
        $rivi4 = $kysely4->fetch();
        $rivi4["path"];
        $imagePath = $rivi4["path"];

//CHATIN HAKU
        $kysely5 = $DBH->prepare("select chat from me_Pair where senderID = $pID and recieverID = $_SESSION[personID]");
        $kysely5->execute();
        $rivi5 = $kysely5->fetch();
        $rivi5["chat"];
        $chat = $rivi5["chat"];     

if(!empty($_POST["givenChatter"])){ //Onko painettu submit painiketta
    //Tallennetaan kantaan $DBH
    echo '<div style="background-image: url('.$imagePath.')" class="chat_image"></div>';
    echo '<p class="message" id="message_sent">'.$pID.$_SESSION['personID'].'</p><br>';
    echo '<p class="message" id="message_recived">'.$chat.'</p><br>';
}
else{}

*/
?>

