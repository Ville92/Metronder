<?php
require_once("config/config.php");

if(!empty($_POST["register"])){ //Onko painettu submit painiketta
    //Tallennetaan annetut arvot assosiatiiviseen taulukkoon
    $datat['username'] = $_POST['givenUsername'];
    $datat['email'] = $_POST['givenEmail'];
    $datat['password'] = hash(sha256, $_POST["givenPw"]."123");  //123 on suola
    //$datat['password'] = md5($datat['password'].'123');  //123 on suola
    echo ("Tallennus");
    //Tallennetaan kantaan $DBH
    //Onko email oikeanlainen: tarkistus palvelimella PHP:n avulla
    if(filter_var($datat['email'], FILTER_VALIDATE_EMAIL)) {
        //PUUTTUU: katso lab note 4. User account sivu 8
        //Onko annettu email jo käytössä
        $data['email'] = $datat['email'];
        $STH = $DBH->prepare("SELECT * FROM me_Person WHERE email=:email");
	$STH->execute($data);
	$row = $STH->fetch();  //Löytyiko sama email osoite?
	if($STH->rowCount() == 0){ //Jos ei niin rekisteröidään
        try{
            $stm = $DBH->prepare("INSERT INTO me_Person (username, email, pword) VALUES(:username, :email, :password);");
            
            if($stm->execute($datat)){
                //Rekisteröityminen onnistui
                //annetut tiedot myös sessiotaulukkoon
                //$_SESSION['username'] = $datat['username'];
                //$_SESSION['email'] = $datat['email'];
                //$_SESSION['loggedIn'] = 'yes';
                $_SESSION['message'] = '<p class="successMessage">Ok - Voit kirjautua</p>';
                echo("Rekisteröityminen ok");
                //personID:n haku tietokannasta
                $kysely3 = $DBH->prepare("SELECT personID from me_Person where email = '$_POST[givenEmail]'");
                $kysely3->execute();
                $rivi3 = $kysely3->fetch();
                $rivi3["personID"];
                $pID = $rivi3["personID"];
                //personID:n laittaminen me_Likes ja me_Dislikes ja me_Images tauluihin
                //likerID:n ja dislikerID: lisääminen likes ja dislikes tauluihin
                $kysely2 = $DBH->prepare("insert into me_Likes (personID) values ('$pID');insert into me_Dislikes (personID) values ('$pID');alter table me_Likes add likerID$pID int(6);alter table me_Dislikes add dislikerID$pID int(6);insert into me_Images (personID) values ('$pID');");
                $kysely2->execute();
                redirect('index.php');

            }else{
                $_SESSION['message'] = '<p class="errorMessage">Rekisteröityminen ei onnistu</p>';
                redirect('index.php');
            } 
        }
        catch(PDOException $e){
            $_SESSION['message'] = '<p class="errorMessage">Tietokantaongelma</h1>'; //. $e.getMessage()");
            redirect('index.php');
        }
    }
        else{
        $_SESSION['message'] = '<p class="errorMessage">Sähköposti on jo käytössä</h1>'; //. $e.getMessage()");
        redirect('register.php');
        }
    }
else{
    //Annettu email hylättiin palvelimella
    $_SESSION['message'] = '<p class="errorMessage">Väärä email</h1>';
    echo($_SESSION['message']);
    redirect('register.php');
    }
}
?>