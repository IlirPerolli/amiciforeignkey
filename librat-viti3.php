<?php
    // Starto Sesionin
    ob_start();
    session_start();
    include("check-vitiakademik.php");
    // Shiko nese useri eshte i kyqur. Nese jo, ridirekto ne login
    include ("verify_user.php");
    if (!isset($_SESSION['vitiakademik']) || $_SESSION['vitiakademik'] == "1") {
        header("Location: index.php");
    }
	 if (!isset($_SESSION['vitiakademik']) || $_SESSION['vitiakademik'] == "2") {
        header("Location: index.php");
    }
?>
<html>
<head>
  <title> Librat - VITI 3 </title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include("bootstrap_css.php");?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
 <link rel="icon" type="image/png" href="people.png" />
  <meta name="theme-color" content="#2f476d">
  <meta http-equiv="Refresh" content="600">
  <meta name="msapplication-navbutton-color" content="#2f476d">
  <link rel = "stylesheet" type = "text/css" href = "nav-stili.css"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
  <link rel = "stylesheet" type = "text/css" href = "stili.css">
  <link rel = "stylesheet" type = "text/css" href = "librat-stili.css">
  <script src="navi.js"></script>
  <style>
  @font-face {
    font-family: 'SamsungSharpSans-Medium';
    src: url('fonti-medium/SamsungSharpSans-Medium.eot');
    src: url('fonti-medium/SamsungSharpSans-Medium.woff2') format('woff2'),
         url('fonti-medium/SamsungSharpSans-Medium.woff') format('woff'),
         url('fonti-medium/SamsungSharpSans-Medium.ttf') format('truetype'),
         url('fonti-medium/SamsungSharpSans-Medium.svg#SamsungSharpSans-Medium') format('svg'),
         url('fonti-medium/SamsungSharpSans-Medium.eot?#iefix') format('embedded-opentype');
    font-weight: normal;
    font-style: normal;
  }
  body,html{
    margin:0;
    padding: 0;
    font-family: 'SamsungSharpSans-Medium';
  }
   body{
    margin: 0;
    padding: 0;

    background: rgb(243, 243, 243);
}
</style>
<body>
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">

  <a class="navbar-brand" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici libraria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id = "Kryefaqja">
        <a class="nav-link" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Kryefaqja </a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">
         Librat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="librat-viti1.php" id ="librat-viti1" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti I</a>
          <a class="dropdown-item" href="librat-viti2.php" id ="librat-viti2" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti II</a>
          <!--<div class="dropdown-divider"></div>-->
          <a class="dropdown-item" href="librat-viti3.php" id ="librat-viti3" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti III</a>
           <a class="dropdown-item" href="librat-viti4.php" id ="librat-viti4" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti I (Master)</a>
            <a class="dropdown-item" href="librat-viti5.php" id ="librat-viti5" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti II (Master)</a>
        </div>
      </li>
      <a class="nav-link" href="files.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Dosjet  <span id = "notification-counter-uploads"> <?php echo $_SESSION['notification_uploads'] ?> </span> <span class="sr-only">(current)</span></a>
       <a class="nav-link" href="group.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Grupi <span id="notification-counter"> <?php echo $_SESSION['notification'] ?> </span> <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="lessons.php" style = "font-family: SamsungSharpSans-Bold; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>
    </ul>

     <ul class="navbar-nav mx-3">
    <li class="nav-item dropdown">
        <a class="navbar-brand dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">
        <?php
          $username =$_SESSION['username'];
          $querycheck1 = "SELECT * FROM users WHERE username='$username'";
      $results1 = mysqli_query($db, $querycheck1);
        if (mysqli_num_rows($results1) == 1) {
          $row = $results1->fetch_assoc();
        echo '<img src="user-photos/'.$row['userphotos'].'" width="30" height="30" style = "margin-top:-3px; border-radius:50%" class="d-inline-block align-top" alt="">';
    }

          ?> 
    <?php echo($_SESSION['emri']. " " . $_SESSION['mbiemri']);?>
  </a>
     <div class = "shkyqja" style = "margin-right: 150px;">
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <a class="dropdown-item" href="edit_profile.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Edito Profilin</a>  
          <div class="dropdown-divider"></div>   
       <a class="dropdown-item" href="logout.php" id = "logout" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Shkyqu</a>
        </div></div>
      </li>
    </ul>
  </div>
</nav>
  <br><br><br>
   <br><br><br>
  <div class = "max-width">
 <!-- Fillimi i shfaqjes se librave -->
<?php 
$querycheck = "SELECT * FROM books WHERE academicyear=3 order by id asc ";
      $results = mysqli_query($db, $querycheck);
      while(($row = $results->fetch_assoc()) !== null){ 
        echo '<div class = "download-container">';
        
        echo '<a href = "'.$row['link'].'"> <img src = "books/'.$row['photo'] .'" class = "download-container-photo"/> </a>';
        echo '<div class = "download-link">';
         echo '<a href = "'.$row['link'].'">'.$row['Name'].'  </a>';
         echo '</div>';
         echo '</div>';
      }

      ?>
  


<!--Mbarimi i shfaqjes se librave --> 
  </div>
  <br><br><br>
  
</div>
<?php include("bootstrap_javascript.php");?>  
</body>
</html>
