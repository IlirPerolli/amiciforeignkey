<?php
    // Starto Sesionin
    ob_start();
  $success = array(); 
  $errors = array();
      include("config.php");
      include("server.php");


    include ("verify_user.php");
     include("check-vitiakademik.php");


?>
<?php
/* Abonimi paraprak me file 
$emriifajlit = $_SESSION['username'];
if (isset($_POST['abonohu'])){
$abonimi = $_POST['abonohu'];
$file = fopen("abonimet/$emriifajlit.txt", "w+") or die ("file not open");
$s = "Emaili: ".$abonimi."\n";
fputs($file, $s) or die("Data not write");
fclose($file);


} 
*/
 ?>
 <?php 
 if (isset($_POST['email'])){
  $username =$_SESSION['username'];
$email = $_POST['email'];

if (empty($email)) {
      array_push($errors, "Ju lutem shenoni emailin per t'u abonuar");
    }

    $querycheck = "SELECT * FROM subscribers WHERE email='$email'";
      $results = mysqli_query($db, $querycheck);

      if (mysqli_num_rows($results) >= 1) {
        array_push($errors, "Ky email eshte abonuar me pare");
    }



        if (count($errors) == 0) {

      $query = "INSERT INTO subscribers (username, email) 
            VALUES('$username', '$email')";
      mysqli_query($db, $query);

array_push($success, " <strong>Urime! </strong> Jeni abonuar me sukses.");
        }

 }

 ?>
<?php 
if(isset($_POST['unsubscribe'])){

  $username = $_SESSION['username'];
   $sql = "DELETE FROM subscribers WHERE username = '$username'";
   mysqli_query($db, $sql);
    
    array_push($success, "<strong>Urime! </strong>Jeni larguar nga abonimet me sukses.");
}
?>



<html>
<head>
  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
} //Mos u submit nese bohet refresh faqja
</script>

	<title> Kryefaqja </title>
    <?php include("bootstrap_css.php");?>
    <link rel="icon" type="image/png" href="people.png" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Refresh" content="600">
<link rel = "stylesheet" type = "text/css" href = "stili.css"/>
<link rel = "stylesheet" type = "text/css" href = "subscribe-stili.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<meta name="theme-color" content="#2f476d">
<meta name="msapplication-navbutton-color" content="#2f476d">
<meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> <!-- Skripta per chart -->
<script src="navi.js"></script>

<style>

body,html{
  margin:0;
  padding: 0;

}
@media screen and (max-width: 640px){
  .error p{
    width: 92% !important;
  }
}
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
/* Error mesazhi paraprak
.error-message{
      background-color: rgba(200, 231, 111, .8);
      padding:10px;
      display: none;
      z-index: 999;
      color:#496e16;
      font-size: 18px;
      margin-top: 78px;
      text-align: center;
      font-family: SamsungSharpSans-Medium;
     
}
#remove-error{
padding:10px;
font-size: 50px;
float:right;
line-height: 7px;
color:#cd1c07;
cursor: pointer;
}*/
.librat, .dosjet, .shoket, .profili, .subscribe{
 box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

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
.error p {
  width: 300px; 
  margin: 0px auto; 
  padding: 10px; 
  color: #a94442; 
  border-radius: 5px; 
  text-align: left;
  font-size: 13px;
  margin-top: 5px;
  margin-bottom: 10px;
     font-family: SamsungSharpSans-Bold;
}
.unsubscribe{
    border: 1px solid #dc3545;
    padding-left: 8px; 
    padding-right: 8px;
    background-color: #dc3545 !important;
    outline: none;
    height: 48px;
    color: white;
    font-family: SamsungSharpSans-Medium;
    font-size: 17px;
    border-radius: 4px;
    cursor: pointer;
}
.red-dot{
  width:10px; height: 10px; margin-bottom:10px;background: red; border-radius: 50%; display: inline-block;
}
</style>
</head>
<body>
<!--
Error mesazhi paraprak
   <div class = "error-message" id = "error-message"> <b>Njoftim:</b> Ju tani jeni t&euml; abonuar
<div id = "remove-error" onclick="removeError()"> &times; </div>
  </div>-->
  <?php /*
  if (isset($_POST['abonohu'])){
  echo "<script type='text/javascript'>document.getElementById('error-message').style.display = 'block'</script>";
}  */
?>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">

  <a class="navbar-brand" href="#" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici ballina</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" id = "Kryefaqja">
        <a class="nav-link" href="#" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Kryefaqja <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">
         Librat <div class="red-dot"></div>
        </a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="librat-viti1.php" id ="librat-viti1" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti I</a>
          
          <a class="dropdown-item" href="librat-viti2.php" id ="librat-viti2" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti II</a>
          <!--<div class="dropdown-divider"></div>-->
          <a class="dropdown-item" href="librat-viti3.php" id ="librat-viti3" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti III <span class="badge badge-secondary" style="margin-bottom: 10px;">E re</span></a>
          <a class="dropdown-item" href="librat-viti4.php" id ="librat-viti4" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti I (Master)</a>
            <a class="dropdown-item" href="librat-viti5.php" id ="librat-viti5" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti II (Master)</a>
        </div>
      </li>

     
  <a class="nav-link" href="files.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Dosjet  <span id = "notification-counter-uploads"> <?php echo $_SESSION['notification_uploads'] ?> </span> <span class="sr-only">(current)</span></a>
     

        <a class="nav-link" href="group.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Grupi <span id = "notification-counter"> <?php echo $_SESSION['notification'] ?> </span> <span class="sr-only">(current)</span></a>

        
      <a class="nav-link" href="lessons.php" style = "font-family: SamsungSharpSans-Bold; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>
      
      
     <?php         $username = $_SESSION['username'];
  $sql = "SELECT * from admins where username='$username'";
  $results = mysqli_query($db, $sql);

  $sql1 = "SELECT * from users where verification=0";
  $results1 = mysqli_query($db, $sql1);
  $number_of_new_users = mysqli_num_rows($results1);
  if (mysqli_num_rows($results)==1){
        
       echo' <a class="nav-link" href="admin.php" style = "font-family:SamsungSharpSans-Bold; font-size:20px;"> Admin '; 
       if ($number_of_new_users != 0){
        echo ' <span id = "notification-new-users">
'.$number_of_new_users.'</span>';
       }
      echo'</a>';
    }?>

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
    
    <?php echo($_SESSION['emri']. " ". $_SESSION['mbiemri']);?>
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

<div style="text-align:center">

<script src = "librat.js"></script>
<script>
function removeError(){
document.getElementById("error-message").style.display = "none";
}

</script>

<div class = "cover">
  <div style="text-align:center">
<div class = "titulli">
 amici <span class= "br"> <br> <br></span>   <div class="slidingVertical">
      <span class = "titulli-llogaria">llogaria</span>
      <span class = "titulli-librat">librat</span>
      <span class = "titulli-dosjet">dosjet</span>
      <span>grupi</span>
      <span>profili</span>
    </div>
  
</div>
</div>
</div>

<a href = "group.php" title = "amici grupi" style = "text-decoration: none">
<div class = "shoket">
  <div class = "max-width">
  <div class = "shoket-container" id = "shoket-text">
  <div class = "shoket-titulli">
        Bisedo<br>me<br>shoket
      </div>
  </div>
  <div class = "shoket-container" id = "shoket-foto">
  <img src = "img/group.jpg"/>
  </div>
</div>
</div>
</a>
<div class = "max-width">
<div class = "librat">
<div class = "librat-titulli">
    Libraria

  </div>
<img src = "img/library.jpg"/>
</div>
<a href="files.php" title = "amici dosjet" style = "text-decoration: none">
<div class = "dosjet">
  <div class = "dosjet-titulli">
    Shperndaj dosje

  </div>
<img src = "img/files.jpg"/>
</div>
</a>

</div>

<div class = "profili">
<div class = "max-width">

 <div class = "profili-container" id = "profili-text">
  <div class = "profili-titulli">
       Profili juaj
      </div>
      <div class="profili-redirect">
        Kliko <a href = "edit_profile.php" title="amici profili"> ketu</a> per te ndryshuar te dhenat tuaja.
      </div>
  </div>
   <div class = "profili-container">
<img src = "img/profile.jpg"/>
  </div>

</div>
</div>
 <?php
     $querycheck = "SELECT * FROM users WHERE gender=0";
      $results = mysqli_query($db, $querycheck);
      $femra = mysqli_num_rows($results);
      $querycheck1 = "SELECT * FROM users WHERE gender=1";
      $results1 = mysqli_query($db, $querycheck1);
      $meshkuj = mysqli_num_rows($results1);
      $_SESSION['meshkuj'] = $meshkuj;
      $_SESSION['femra'] = $femra;
      $totali = $meshkuj + $femra;
      $meshkujneperqindje = (100 * $meshkuj) / $totali;
      $femraneperqindje = (100 * $femra) / $totali;

      $_SESSION['meshkujneperqindje'] = $meshkujneperqindje;
      $_SESSION['femraneperqindje'] = $femraneperqindje;
  
    ?>
<div class = "charts-title">
Statistikat
</div>

<div class = "charts" id = "puzzlechart">
<img src="img/puzzle.png" class = "diagram-img"/>
<div class = "description-charts">
<?php echo 'Amici filloi punen ne gusht te vitit 2018.'; ?>
</div>
</div>

<div class = "charts">
<img src="img/diagram.png" class = "diagram-img"/>
<div class = "description-charts">
<?php echo 'Ne llogarine amici jane gjithsej ' . $totali . ' anetare.'; ?>
</div>
</div>

<div class = "charts">
  <canvas id="myChart"></canvas>
<div class = "description-charts">
<?php echo 'Nga te gjithe anetaret, '. round($femraneperqindje).'% jane femra ndersa '. round($meshkujneperqindje) . '% jane meshkuj.';?>
</div>
</div>

<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
   // Tipi i chartit
    type: 'doughnut',

   // Te dhenat e chartit
    data: {
        labels: ['Femra', 'Meshkuj'],
        datasets: [{
            backgroundColor: ['#9E9E9E','#343A40'],
            borderColor:['rgb(243, 243, 243)', 'rgb(243, 243, 243)'],
           data: [ <?php echo $_SESSION['femra']; ?>, <?php echo $_SESSION['meshkuj'];?>]
        }]
    },

    // Konfigurimi
    options: {}
});
</script>


<div class = "subscribe">
<div class = "max-width">
   <div class=  "subscribe-photo" id = "subscribe-mob">
<img src = "img/subscribers.jpg"/>
</div>
   <form action="#" method="POST"  style = "display: inline-block;">
  <div class=  "subscribe-text">
    <?php 
include('errors.php');?>
<h1 style = "font-size:45px">Abonohu edhe ti</h1>
<h2 style = "font-size:25px">Njoftohu i pari.</h1>
<br>
<?php 
$username = $_SESSION['username'];
$querycheck = "SELECT * FROM subscribers WHERE username='$username'";
      $results = mysqli_query($db, $querycheck);

      if (mysqli_num_rows($results) >= 1) {
        echo' <button type="submit" name="unsubscribe" class="unsubscribe">Hiq abonimin</button>';
    }
else{
?>
 <div class="email-box">
      <i class="fas fa-envelope"></i>
      <input class="tbox" type="email" name="email" value="<?php echo($_SESSION['email'])?> " placeholder="Shkruani emailin tuaj..." oninvalid="this.setCustomValidity('Ju lutem shkruani emailin')"
    oninput="this.setCustomValidity('')" maxlength="255" autocomplete="off" required>
      <button class="btn" type="submit" name="button">Abonohu</button>
    </div>
    <?php }?>

   

</div>
</form>



  <div class=  "subscribe-photo" id = "subscribe-pc">
<img src = "img/subscribers.jpg"/>
</div>



</div>

  </div>
<br>
       
<?php include("bootstrap_javascript.php");?>  
</body>
</html>
