<?php
error_reporting(E_ALL);
require_once("config/config.php");
//CHATIN HAKU
$pID = $_POST['givenChatter'];
$data["k1"] = $_SESSION['personID'];
$data["k2"] = $_SESSION['personID2'];
$kysely1 = $DBH->prepare("select * from me_chat WHERE kayttaja1 = :k1 and kayttaja2 = :k2 or kayttaja1 = :k2 and kayttaja2 = :k1;");
$kysely1->execute($data);
$rivi1 = $kysely1->fetch();
        
$kysely2 = $DBH->prepare("select keskusteluID from me_chat WHERE kayttaja1 = :k1 and kayttaja2 = :k2 or kayttaja1 = :k2 and kayttaja2 = :k1;");
$kysely2->execute($data);
$rivi2 = $kysely2->fetch();
        $rivi2["keskusteluID"];
        $_SESSION['keskustelu'] = $rivi2["keskusteluID"];

$data2["kID"] = $_SESSION['keskustelu'];
       $kysely = $DBH->prepare("select * from me_messages JOIN me_chat ON me_chat.keskusteluID=me_messages.keskusteluID WHERE me_chat.keskusteluID = :kID;");
      $kysely->execute($data2);
$kysely->setFetchMode(PDO::FETCH_OBJ);
 $viestit = array();
while($viesti = $kysely->fetch()){
$viestit[] = $viesti;
}
echo json_encode($viestit);
//echo('Käyttäjä1 on:'.$data["k1"]);
//echo('Käyttäjä2 on:'.$data["k2"]);
//echo('Keskustelu id on:'.$data2["kID"]);

//print_r($data);

?>
