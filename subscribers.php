<?php
    // Starto sesionin
    ob_start();
  $success = array(); 
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
<?php 
if (isset($_GET['remove'])){

  $id = $_GET['remove'];
   $sql = "DELETE FROM subscribers WHERE id= '$id'";
    mysqli_query($db, $sql);
    
    array_push($success, "Abonuesi u fshi me sukses");
  
}

?>


<html>

<head>

  <title> amici admin </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
} //Mos u submit nese bohet refresh faqja
</script>
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

  .max-width{
    overflow: auto;
  }
  .table-row{
cursor:pointer;
}
h3{
  font-family: SamsungSharpSans-Medium;
}
.table-striped{
  font-family: SamsungSharpSans-Medium;
}
.alert-success{
font-family: SamsungSharpSans-Medium;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 99999;
  text-align:center;
  border-radius: 0px !important;

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
       <a class="nav-link" href="admin.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Admin </a>
       <a class="nav-link active" href="reported_bugs.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Raportimet <span class="sr-only">(current)</span></a>
    </ul>
    <?php
    $anetaret = "SELECT * FROM users WHERE verification='1'";
    $anetaret_results = mysqli_query($db, $anetaret);
    $anetaret_count = mysqli_num_rows($anetaret_results);
    ?>

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
  <?php include('success_alert.php'); ?>
   
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

<br><br>
<h3> Abonimet </h3>
<div class = "max-width">
  <form action="#" method="post">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Opsionet</th>

      

    </tr>
  </thead>
  <tbody>
    <?php 
    $querycheck = "SELECT * from subscribers order by id DESC";
    $results = mysqli_query($db, $querycheck);
    while(($row = $results->fetch_assoc()) !== null){
      echo'<tr class="table-row">
      <th scope="row">'.$row['id'].'</th>
      <td>'.$row['username'].'</td>
      <td>'.$row['email'].'</td>
      <td><a href=?remove='.$row['id'].'> Fshij </a></td>
     
    </tr>
';
    }
    ?>  
  </tbody>
</table>
</form>
</div>
<?php include("bootstrap_javascript.php");?>  
</body>
</html>
