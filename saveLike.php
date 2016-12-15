<?php
require_once("config/config.php");

$datat['ID'] = $_SESSION['personID'];
        

if(!empty($_POST["yes"])){ //Onko painettu submit painiketta
    //Tallennetaan kantaan $DBH
    //TARKISTETAAN ONKO KYSEISELLÄ PARILLA JO OLEMASSA CHAT
       $kysely = $DBH->prepare("SELECT keskusteluID from me_chat where kayttaja1 = $_POST[yes] and kayttaja2 = $_SESSION[personID];");
        $kysely->execute();
        $rivi = $kysely->fetch();
        $rivi["keskusteluID"];
        $chatID = $rivi["keskusteluID"];
        echo $chatID;
        try{
            $stm = $DBH->prepare("update me_Likes set likerID$_SESSION[personID] = $_SESSION[personID] where personID = $_POST[yes];");
            
            if($stm->execute($datat)){
                echo $_SESSION[personID];
                if($chatID == null){
                	echo ('lol');
            		$kysely2 = $DBH->prepare("INSERT INTO me_chat (kayttaja1,kayttaja2) VALUES ($_SESSION[personID],$_POST[yes]);");
            		$kysely2->execute();
            	}else{}
                redirect('match.php');
            }else{
                redirect('match.php');
            } 
        }catch(PDOException $e){
            $_SESSION['message'] = "Tietokantaongelma"; //. $e.getMessage()");
            redirect('match.php');
        }
}

if(!empty($_POST["no"])){ //Onko painettu submit painiketta
    //Tallennetaan kantaan $DBH
        try{
            $stm = $DBH->prepare("update me_Dislikes set dislikerID$_SESSION[personID] = $_SESSION[personID] where personID = $_POST[no];");
            if($stm->execute($datat)){
                redirect('match.php');
            }else{
                redirect('match.php');
            } 
        }catch(PDOException $e){
            $_SESSION['message'] = "Tietokantaongelma"; //. $e.getMessage()");
            redirect('match.php');
        }
}


/*
if(){
INSERT INTO me_chat (kayttaja1,kayttaja2) VALUES ();
}else{}
*/
?>