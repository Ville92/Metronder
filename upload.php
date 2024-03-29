<?php
require_once("config/config.php");
?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Tiedosto ei ole kuva!.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Tiedosto on jo olemassa.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000000) {
    echo "Liian iso tiedostokoko!";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Virheellinen tiedostomuoto! Vain JPG, JPEG, PNG & GIF tiedostot ovat sallittuja.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $name = basename( $_FILES["fileToUpload"]["name"]);
        //KUVAN LISÄYS
        $rivi2["personID"];
        $pID = $rivi2["personID"];
        $kysely3 = $DBH->prepare("update me_Images set path = 'http://10.114.32.111/Metronder/uploads/$name' where personID = $_SESSION[personID];");
        $kysely3->execute();
        redirect("member-edit.php");
        
    } else {
        echo "Kuvan latauksessa oli virhe!";
    }
}
?>
