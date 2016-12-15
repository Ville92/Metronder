<?php
require_once("config/config.php");

$description = "";
//KUVAUKSEN LISÄYS KONTAKTILLE
        $rivi2["personID"];
        $pID = $rivi2["personID"];
        $kysely3 = $DBH->prepare("SELECT description from me_Person where personID = $_SESSION[personID];");
        $kysely3->execute();
        $rivi3 = $kysely3->fetch();
        $rivi3["description"];
        $description = $rivi3["description"];

        echo $description;
?>