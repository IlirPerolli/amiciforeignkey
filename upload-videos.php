<?php 
ob_start();
include("config.php");
if (isset($_POST['upload-video'])){
    //$emri = mysqli_real_escape_string($db, $_POST['emri']);
	$linku = mysqli_real_escape_string($db, $_POST['linku']);
    $username = $_SESSION['username'];
    $query = "SELECT * from users WHERE username = '$username'";
    $results = mysqli_query($db,$query);
    $row = $results->fetch_assoc();
    $id_user = $row['id'];
    $number = $_GET['folder'];
	$youtubeID = getYouTubeVideoId($linku);
    if (!$youtubeID){//Nese futet tekst e jo link
        header("Location:lessons.php?folder=".$number);
        die();
        }

   //$emri = explode(' - YouTube',explode('</title>',explode('<title>',file_get_contents("https://www.youtube.com/watch?v=$youtubeID"))[1])[0])[0];
   $emri = explode(' - YouTube',explode('">',explode('<meta name="title" content="',file_get_contents("https://www.youtube.com/watch?v=$youtubeID"))[1])[0])[0];
   if (empty($emri)){//Nese ajo id nuk pershtatet fare
    header("Location:lessons.php?folder=".$number);
        die();
   }

   if (strlen($youtubeID)>11){//Nese id eshte mire po e tejkalon gjatesine e ID
    $youtubeID = substr($youtubeID, 0,11);
   }
$photo = 'https://img.youtube.com/vi/' . $youtubeID . '/hqdefault.jpg';

  if (empty($linku)){array_push($errors, "Ju lutem shenoni linkun"); }
  
date_default_timezone_set("Europe/Tirane");
        $date = date("d/m/Y");
        $time = date("H:i");
if (count($errors) == 0) {   
  $query = "INSERT INTO folder_uploads (upload_name, Link, photo,date,time, id_folder, id_user) 
					  VALUES('$emri', '$linku', '$photo','$date','$time', '$number','$id_user' )";
			mysqli_query($db, $query);
			header("Location:lessons.php?folder=".$number);
 }
}
function getYouTubeVideoId($pageVideUrl) {
    $link = $pageVideUrl;
    $video_id = explode("?v=", $link);
    if (!isset($video_id[1])) {
        $video_id = explode("youtu.be/", $link);
    }
    $youtubeID = $video_id[1];
    if (empty($video_id[1])) $video_id = explode("/v/", $link);
    $video_id = explode("&", $video_id[1]);
    $youtubeVideoID = $video_id[0];
    //Kur ka sekonda
    $youtubeVideoID = explode("?t", $youtubeVideoID);
    $youtubeVideoID = $youtubeVideoID[0];
    //
    if ($youtubeVideoID) {
        return $youtubeVideoID;
    } else {
        return false;
    }
}
?>