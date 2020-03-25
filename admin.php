<?php
    // Starto sesionin
    ob_start();
  
       include("server.php");
    // Shiko nese useri eshte i kyqur. Nese jo, ridirekto ne login
  include("check-vitiakademik.php");
    include ("verify_user.php");
   // if (($_SESSION['username']) != "ilirperolli") {
     //   header("Location: index.php");
    //}
        $username = $_SESSION['username'];
  $sql = "SELECT * from admins where username='$username'";
  $results = mysqli_query($db, $sql);
  if (mysqli_num_rows($results)==1){


  }
    else {
      header("Location: index.php");
      die();
    }
    
?>
<?php
   // lidhu me databaze
include("config.php");  

?>

<html>
<head>
  <title> amici admin </title>
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

body {
  background: rgb(243, 243, 243);
}

  @media screen and (max-width:640px){
  .categories{
  width:90% !important;
  margin-left:0 !important;
  margin-right:0px !important;
}
.categories img{
  width:100% !important;
}
  .max-width{

margin-top: 40px !important;
 }

  }

.categories{
width:350px;
height:400px;
display:inline-block;
background:white;
margin-left:10px;
margin-right:10px;
margin-top:20px;
border: 1.5px solid black;
/*transition:transform.3s;*/
transition: all .2s ease-in-out; 
border-radius: 30px;
position: relative;

}
.categories:hover{
  
  
-webkit-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);

}
.categories img{
  width:100%;
  border-radius: 28px 28px 0px 0px; /* Mos mu pa hapsirat e bardha kur t lakohet foto */
}
.categories a{
  text-decoration:none;
  color:black;
}
.categories a:hover{
  text-decoration:underline;
}
.category-name{
  padding:20px;
}
.categories-photo{
  width:350px;
  height:320px;
}
  .max-width{
margin:auto;
text-align: center;
max-width: 1300px;
margin-top: 20px;
 }
.notification{
position: absolute;
width: 30px;
height: 30px;
line-height: 30px;
border-radius: 50%;
background: white;
color: black;

font-size: 16px;
  z-index: 999 !important;
  top: 0;
  right: 0;
  margin-top: -7px;
  margin-right: -8px;
    font-family: 'SamsungSharpSans-Medium';
-webkit-box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.75);
box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.75);
}
  </style>

</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">

  <a class="navbar-brand" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici admin</a>
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
        </div>
      </li>
      <a class="nav-link" href="files.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Dosjet  <span id = "notification-counter-uploads"> <?php echo $_SESSION['notification_uploads'] ?> </span> <span class="sr-only">(current)</span></a>
       <a class="nav-link" href="group.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Grupi <span id = "notification-counter"> <?php echo $_SESSION['notification'] ?> </span> <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="lessons.php" style = "font-family: SamsungSharpSans-Bold; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>
       <a class="nav-link active" href="admin.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Admin <span class="sr-only">(current)</span></a>
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
  <script type="text/javascript">
function searchfunction(){
var i=document.getElementById("search");
if(i.value=="")
    {
    document.getElementById("search-submit").disabled=true;
    }
else
    document.getElementById("search-submit").disabled=false;}




</script>
  <div style = "text-align:center">
    <div class = "max-width">


  <div class = "categories">
  <a href = "users.php"> <img src = "img/people-avatars-community-group_24908-29265.jpg" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="users.php" > Perdoruesit </a>
    <div class="notification">
    <?php 
    $sql = "SELECT * from users where verification =1 or verification = 0";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
    echo $count;
    ?>
  </div>
  </div>
  </div>

  <div class = "categories">
   <a href = "suspended-users.php"><img src = "img/boss-confuses-choose-check-mark-cross-mark-approval-rejection_8073-282.jpg" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="suspended-users.php" > Suspendimet </a>
    <div class="notification">
    <?php 
    $sql = "SELECT * from users where verification = 2";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
    echo $count;
    ?>
  </div>
  </div>
  </div>
  <div class = "categories">
  <a href = "books.php"> <img src = "img/books-stack-realistic_1284-4735.jpg" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="books.php" > Librat </a>
    <div class="notification">
    <?php 
   echo getUserActivity($db, "books");
    ?>
  </div>
  </div>
  </div>
   <div class = "categories">
  <a href = "posts_controller.php"> <img src = "img/photo-discuss.jpg" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="posts_controller.php" > Postimet </a>
    <div class="notification">
    <?php 
   echo getUserActivity($db, "userposts");
    ?>
  </div>
  </div>
  </div>
  <div class = "categories">
  <a href = "kursori.php"> <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx0_KvDyVMJF6nWS3UQvooKtKqyCUj9I50F_Uy5JwWW8px4T7f" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="kursori.php" > Kursori </a>
  </div>
  </div>
    <div class = "categories">
  <a href = "kursori_members.php"> <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx0_KvDyVMJF6nWS3UQvooKtKqyCUj9I50F_Uy5JwWW8px4T7f" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="kursori_members.php" >Anetaret e Kursorit </a>
  <div class="notification">
     <?php 
   echo getUserActivity($db, "kursori_members");
    ?>
  </div>
  </div>
  </div>
    <div class = "categories">
  <a href = "subscribers.php"> <img src = "https://pngimage.net/wp-content/uploads/2018/05/comunity-png-4.png" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="subscribers.php" >Abonimet </a>
   <div class="notification">
  <?php 
   echo getUserActivity($db, "subscribers");
    ?>
  </div>
  </div>
  </div>  
  <div class = "categories">
  <a href = "reported_bugs.php"> <img src = "https://www.techbooky.com/wp-content/uploads/2017/07/computer-bug-850x479.jpg" class = "categories-photo"/></a>
  <div class = "category-name">
  <a href="reported_bugs.php" >Raportimet e Problemeve </a>
  <div class="notification">
    <?php 
   echo getUserActivity($db, "bug_reports");
    ?>
  </div>
  </div>
  </div>





</div>
</div>

<br>
    <?php 
function getUserActivity($db, $table){
   $sql = "SELECT * from $table";
    $results = mysqli_query($db, $sql);
    $count = mysqli_num_rows($results);
    return $count;
}
    ?>
<?php include("bootstrap_javascript.php");?>  
</body>
</html>
