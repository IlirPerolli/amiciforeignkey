<?php 
include("config.php");
    $errors = array();
    ob_start();

if (isset($_POST['files'])){





ini_set('upload_max_filesize', '4M');
$username = $_SESSION['username'];
  $query1 = "SELECT * FROM users WHERE username='$username'";
    $results1 = mysqli_query($db, $query1);
          $row = $results1->fetch_assoc();
          date_default_timezone_set("Europe/Tirane");
    $date = date("d/m/Y");
    $time = date("H:i");
     $id_user = $row['id'];
$vitiakademik = $_SESSION['vitiakademik'];
$file = $_FILES["file"];
$filename = $file["name"];




if ($_FILES['file']['size'] ==0) { //Opsionale (te hiqet nese paraqit bug)
   array_push($errors, "Ju lutem ngarkoni nje dokument");
}
// **************** Shiko nese nuk ka uploaduar dhe nese jo mos e rrit countin ne databaze ************************
else if (file_exists("user-files/".$filename)) {
array_push($errors, "Ekziston nje dokument tjeter me emer te njejte");

}

else if ($_FILES['file']['size'] > 20000000) { //20MB
   array_push($errors, "Dokumenti ka nje madhesi te madhe");
}
if (strpos($filename,'Snapchat') !== false) {
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
   $filename= "amici_".$_SESSION['username'] . "_" . generateRandomString() ."." . $imageFileType;
  

}
else if (strpos($filename,'snapchat') !== false) {
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
   $filename= "amici_".$_SESSION['username'] . "_" . generateRandomString() ."." . $imageFileType;

}


if (count($errors) == 0){
move_uploaded_file($file["tmp_name"], "user-files/".$filename);
//$filename = mysqli_real_escape_string($db, $file["name"]); // To prevent SQL Injection

$query = "INSERT INTO userfiles (file,date, time, id_user) 
            VALUES('$filename','$date', '$time', '$id_user')";
      mysqli_query($db, $query);
$query1= "UPDATE users SET notification_uploads = notification_uploads + 1 WHERE academicyear = '$vitiakademik'";
      mysqli_query($db, $query1);
       header("Location:files.php");

}}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>