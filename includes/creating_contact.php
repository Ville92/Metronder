<?php

$kysely1 = $DBH->prepare("SELECT COUNT(*) FROM me_Person");
$kysely1->execute();
$contactsAmount = $kysely1->fetch();

//TULOSTETAAN KONTAKTIT
for($i = 0; $i<$contactsAmount["COUNT(*)"]; $i++){
    $username = "";
$kysely2 = $DBH->prepare("SELECT personID from me_Person");
$kysely2->execute();
}

echo '<form action="saveContact.php" method="post">';
//KÄYTTÄJÄNIMEN LISÄYS KONTAKTILLE
while ($rivi2 = $kysely2->fetch()) {
        $rivi2["personID"];
        $pID = $rivi2["personID"];
        $_SESSION['personID2'] = $pID;
    
        $kysely3 = $DBH->prepare("SELECT username from me_Person where personID = '$pID'");
        $kysely3->execute();
        $rivi3 = $kysely3->fetch();
        $rivi3["username"];
        $username = $rivi3["username"];
        
        //KUVAN LISÄYS KONTAKTILLE
        $kysely4 = $DBH->prepare("SELECT path from me_Images where personID = '$pID'");
        $kysely4->execute();
        $rivi4 = $kysely4->fetch();
        $rivi4["path"];
        $imagePath = $rivi4["path"];
    
        //LIKERIN HAKU
        $kysely5 = $DBH->prepare("SELECT likerID$_SESSION[personID] from me_Likes where personID = '$pID'");
        $kysely5->execute();
        $rivi5 = $kysely5->fetch();
        $rivi5["likerID$_SESSION[personID]"];
        $likerPerson = $rivi5["likerID$_SESSION[personID]"];
    
        $kysely6 = $DBH->prepare("SELECT likerID$pID from me_Likes where personID = '$_SESSION[personID]'");
        $kysely6->execute();
        $rivi6 = $kysely6->fetch();
        $rivi6["likerID$pID"];
        $likerPerson2 = $rivi6["likerID$pID"];
        
        if($likerPerson != null && $likerPerson2 != null){
            echo '<input class="setChatter" name="givenChatter" type="submit" value="'.$pID.'"><article class="contact_user"><div class="contact_picture" style="background-image:url('.$imagePath.');"></div></div><h1 class="contact_name">'.$username.'</h1></article></input>';
        }
}
echo '</form>';
?>