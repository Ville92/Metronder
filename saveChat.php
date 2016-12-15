<?php
require_once("config/config.php");
$pID = $_POST['givenChatter'];
$datat['ID'] = $_SESSION['personID'];
$message = $_POST['sent_message'];
if(!empty($_POST["sendMessage"])){ //Onko painettu submit painiketta
    //Tallennetaan kantaan $DBH
    
    
        try{
            $stm = $DBH->prepare("INSERT INTO me_messages (teksti,keskusteluID,kayttaja) VALUES ('$message', '$_SESSION[keskustelu]', '$_SESSION[personID]');");

            if($stm->execute($datat)){
                redirect('chat.php');
                //echo $_SESSION['keskustelu'];
            }else{
                redirect('chat.php');
            } 
        }catch(PDOException $e){
            $_SESSION['message'] = "Tietokantaongelma"; //. $e.getMessage()");
            redirect('chat.php');
        }
}
?>


