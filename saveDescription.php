<?php
require_once("config/config.php");
if(!empty($_POST["saveDescription"])){ //Onko painettu submit painiketta
    //Tallennetaan annetut arvot assosiatiiviseen taulukkoon
    $datat['description'] = $_POST['givenDescription'];
    echo ("Kuvaus Tallennettu");
        try{
            $stm = $DBH->prepare("update me_Person set description=:description where personID = $_SESSION[personID];");
            if($stm->execute($datat)){
                //Rekisteröityminen onnistui
                //annetut tiedot myös sessiotaulukkoon
                //$_SESSION['username'] = $datat['username'];
                //$_SESSION['email'] = $datat['email'];
                //$_SESSION['loggedIn'] = 'yes';
                $_SESSION['message'] = '<p class="successMessage">Kuvaus tallennettu</p>';
                redirect('member-edit.php');
            }else{
                $_SESSION['message'] = '<p class="errorMessage">Kuvauksen tallentaminen ei onnistu</p>';
                redirect('member-edit.php');
            } 
        }catch(PDOException $e){
            $_SESSION['message'] = "Tietokantaongelma"; //. $e.getMessage()");
            redirect('member.php');
        }
}
?>