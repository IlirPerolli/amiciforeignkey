<?php 
ob_start();
include("config.php");
if (isset($_POST['submit-lesson'])){
	$emri = mysqli_real_escape_string($db, $_POST['emri']);
	$linku = mysqli_real_escape_string($db, $_POST['linku']);
	$course = mysqli_real_escape_string($db, $_POST['course']);
	$week = mysqli_real_escape_string($db, $_POST['week']);
	$youtubeID = getYouTubeVideoId($linku);
$photo = 'https://img.youtube.com/vi/' . $youtubeID . '/hqdefault.jpg';
if (empty($emri)){array_push($errors, "Ju lutem shenoni emrin"); }

  if (empty($linku)){array_push($errors, "Ju lutem shenoni linkun"); }
  if (($course) == -1){array_push($errors, "Ju lutem zgjedhni kursin"); }
    if (($week) == -1){array_push($errors, "Ju lutem zgjedhni javen e kursit"); }

if (count($errors) == 0) {   
  $query = "INSERT INTO kursori (Name, link, photo, course, week) 
					  VALUES('$emri', '$linku', '$photo', '$course', '$week')";
			mysqli_query($db, $query);
			header("Location:kursori.php");
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