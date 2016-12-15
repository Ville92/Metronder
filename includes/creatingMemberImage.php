<?php
require_once("config/config.php");

//KUVAN LISÄYS MEMBERILLE
        $kysely3 = $DBH->prepare("SELECT path from me_Images where personID = $_SESSION[personID];");
        $kysely3->execute();
        $rivi3 = $kysely3->fetch();
        $rivi3["path"];
        $image = $rivi3["path"];

        echo $image;
?>