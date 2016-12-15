<?php
require_once("config/config.php");
$kysely1 = $DBH->prepare("SELECT COUNT(*) FROM me_Person");
$kysely1->execute();
$contactsAmount = $kysely1->fetch();

//TULOSTETAAN MATCHIT
for($i = 0; $i<$contactsAmount["COUNT(*)"]; $i++){
    $username = "";
$kysely2 = $DBH->prepare("SELECT personID from me_Person");
$kysely2->execute();
}
//KÄYTTÄJÄNIMEN LISÄYS KONTAKTILLE
while ($rivi2 = $kysely2->fetch()) {
        $rivi2["personID"];
        $pID = $rivi2["personID"];
        $kysely3 = $DBH->prepare("SELECT username from me_Person where personID = '$pID'");
        $kysely3->execute();
        $rivi3 = $kysely3->fetch();
        $rivi3["username"];
        $username = $rivi3["username"];
        
        //KUVAUKSEN LISÄYS KONTAKTILLE
        $kysely5 = $DBH->prepare("SELECT description from me_Person where personID = '$pID'");
        $kysely5->execute();
        $rivi5 = $kysely5->fetch();
        $rivi5["description"];
        $description = $rivi5["description"];
    
        //KUVAN LISÄYS KONTAKTILLE
        $kysely4 = $DBH->prepare("SELECT path from me_Images where personID = '$pID'");
        $kysely4->execute();
        $rivi4 = $kysely4->fetch();
        $rivi4["path"];
        $imagePath = $rivi4["path"];
        
        //LIKEN JA DISLIKEN TESTAUS
        $kysely6 = $DBH->prepare("SELECT likerID$_SESSION[personID] from me_Likes where personID = $pID");
        $kysely6->execute();
        $rivi6 = $kysely6->fetch();
        $rivi6["likerID$_SESSION[personID]"];
        $liked = $rivi6["likerID$_SESSION[personID]"];
    
        $kysely7 = $DBH->prepare("SELECT dislikerID$_SESSION[personID] from me_Dislikes where personID = $pID");
        $kysely7->execute();
        $rivi7 = $kysely7->fetch();
        $rivi7["dislikerID$_SESSION[personID]"];
        $disliked = $rivi7["dislikerID$_SESSION[personID]"];
    
    
        if($liked != $_SESSION['personID'] && $disliked != $_SESSION['personID'] && $pID != $_SESSION['personID']){
        echo '
        <article style="background-image: url('.$imagePath.');" class="image">
            <div id="dark">
                <article class="infobox">
                    <h2 class="infoHeader">Kuvaus</h2>
                    <p class="infoText">'.$description.'</p>
                </article>
            </div>
        </article>
        <form class="control" method="post" action="saveLike.php">
            <input name="no" value="'.$pID.'" type="submit" class="no"></div>
            <div class="user">
                <img src="img/crown.png">
                <h2 class="name">'.$username.'</h2>
            </div>
            <input name="yes" value="'.$pID.'" type="submit" class="yes"></div>
        </form>';
        }
        else{}
}echo ('<p class="errorMessage">Ei enempää käyttäjiä!</p>');                                                                                                    
?>