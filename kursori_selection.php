<?php
    // Starto Sesionin
    ob_start();
    session_start();
    include("check-vitiakademik.php");
    // Shiko nese useri eshte i kyqur. Nese jo, ridirekto ne login
    include ("verify_user.php");
    // if (!isset($_SESSION['vitiakademik']) || $_SESSION['vitiakademik'] == "1") {
    //     header("Location: index.php");
    // }
    
   $username = $_SESSION['username'];
  $sql = "SELECT * from kursori_members where username='$username'";
  $results = mysqli_query($db, $sql);
  if (mysqli_num_rows($results)==1){


  }
    else {
      header("Location: index.php");
      die();
    }
?>
<html>
<head>
  <title> Mesime </title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include("bootstrap_css.php");?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
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
  @media screen and (max-width:640px){
  .folder{
  width:90% !important;
  margin-left:0 !important;
  margin-right:0px !important;
}
.folder img{
  width:100% !important;
}
.max-width{
  margin-top: 50px !important;
}


  }
.bubble{
    margin-top: 150px;
  text-align: center;
  padding:20px; 
}

.folder{
width:300px;
height:350px;
display:inline-block;
background:white;
margin-left:10px;
margin-right:10px;
margin-top:20px;
border: 1.5px solid black;
/*transition:transform.3s;*/
transition: all .2s ease-in-out; 
overflow: hidden;
border-radius: 30px;
}
.folder:hover{
  
  
-webkit-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);

}
.folder a{
  text-decoration:none;
  color:black;
}
.folder a:hover{
  text-decoration:underline;
}
.folder-name{
  padding:20px;
}
.folder-photo{
  width:300px;
  height:280px;
}
  .max-width{
margin:auto;
text-align: center;
max-width: 1300px;
margin-top: 20px;
 }

</style>
<body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">

  <a class="navbar-brand" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici mesimet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id = "Kryefaqja">
        <a class="nav-link" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Kryefaqja </a>
      </li>
      <li class="nav-item dropdown">
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

<a class="nav-link active" href="lessons.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>



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
<br><br><br><br>
   <div style = "text-align:center; margin:auto;">
  <div class = "max-width">
  <div class = "folder">
  <a href = "kursori_kursi1.php"> <img src = "https://kursori.org/assets/img/course1.png" class = "folder-photo"/></a>
  <div class = "folder-name">
  <a href="kursori_kursi1.php" > Kursi 1 </a>
  </div>
  </div>
   <div class = "folder">
  <a href = "kursori_kursi2.php"> <img src = "https://kursori.org/assets/img/course2.png" class = "folder-photo"/></a>
  <div class = "folder-name">
  <a href="kursori_kursi2.php" > Kursi 2 </a>
  </div>
  </div>
 <div class = "folder">
  <a href = "kursori_kursi3.php"> <img src = "https://kursori.org/assets/img/course3.png" class = "folder-photo"/></a>
  <div class = "folder-name">
  <a href="kursori_kursi3.php" > Kursi 3 </a>
  </div>
  </div>

  
  <br><br><br>
</div>
</div>
<?php include("bootstrap_javascript.php");?>  
</body>
</html>
