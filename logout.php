<?php
   session_start();
	// lidhu me databaze
	include("config.php");
    $username = $_SESSION['username'];
    $_SESSION['loggedIn'] = false;
    $_SESSION['loading'] = false;
    $query = "UPDATE users SET online = 0 where username = '$username'";
    mysqli_query($db, $query);
    header("Location: main.php");
?>
