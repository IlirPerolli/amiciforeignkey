<?php
    // Starto Sesionin
    ob_start();
  
      include("server.php");


include ("verify_user.php");
     include("check-vitiakademik.php");

?>
<?php
$emriifajlit = $_SESSION['username'];
if (isset($_POST['deleteacc'])){
$abonimi = $_POST['abonohu'];
$file = fopen("DeleteAccountComments/$emriifajlit.txt", "w+") or die ("file not open");
$s = "Komenti: ".$abonimi."\n";
fputs($file, $s) or die("Data not write");
fclose($file);


}

 ?>
 <?php 


  // lidhu me databaze
include("config.php");
$emri = $_SESSION['emri'];
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE Name='$emri' AND username='$username'";
$results = mysqli_query($db, $query);
          $row = $results->fetch_assoc(); 
        

     

 ?>


<html>
<head>

	  <?php 

$emri = $_SESSION['emri'];
$mbiemri = $_SESSION['mbiemri'];
$emri = strtolower($emri);
$mbiemri = strtolower($mbiemri);
$emri = ucfirst($emri);
$mbiemri = ucfirst($mbiemri);
echo "<title>".$emri. " ". $mbiemri. " - Preferencat". " </title>";
  
  ?>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
} //Mos u submit nese bohet refresh faqja
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <link rel="icon" type="image/png" href="people.png" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Refresh" content="600">
<link rel = "stylesheet" type = "text/css" href = "stili.css"/>
<link rel = "stylesheet" type = "text/css" href = "nav-stili.css"/>
<link rel = "stylesheet" type = "text/css" href = "subscribe-stili.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<meta name="theme-color" content="#2f476d">
<meta name="msapplication-navbutton-color" content="#2f476d">
<meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<script src="navi.js"></script>

<style>

body,html{
  margin:0;
  padding: 0;

}
 *{
   margin: 0;
   padding: 0;
   font-family:SamsungSharpSans-Bold;
 }
.contact-form
 {
     margin:auto;
     width: 400px;
     height:auto;
     padding: 20px 40px;
     box-sizing: border-box;
     background: white;
     -webkit-box-shadow: 0px 10px 13px -7px #000000, 0px 8px 25px 10px rgba(0,0,0,0.25);
     box-shadow: 0px 10px 13px -7px #000000, 0px 8px 25px 10px rgba(0,0,0,0.25);
     border-radius: 20px;
     margin-top:100px;

 }
  @media screen and (max-width:640px){
.avatar{
  width: 250px !important;
}
  }
  @media screen and (max-width:400px){
.avatar{
  width: 100% !important;
}
  }

 @media screen and (max-width:959px){
 .contact-form{
 width:95% !important;

 }
}.contact-form h2 {
    margin: 0;
    padding: 0 0 20px;
    color: black;
    font-family: 'SamsungSharpSans-Bold';
      font-weight: 200;
      font-size: 35px;
      margin:0;
    text-align: center;
    text-transform: uppercase;

}
.contact-form p
{
    margin: 0;
    padding: 0;
    font-family: 'SamsungSharpSans-Bold';
      font-weight: 200;
      color: white;
      font-size: 23px;
      margin:0;
    color: black;
    text-align: left;
}
.avatar{
  width:250px;
  /* height:250px;*/
  border-radius: 50%;
display: block;
margin: 0 auto;
}
.contact-form input
{
    width: 100%;
    margin-bottom: 20px;

}
.contact-form input[type="text"],
.contact-form input[type="password"],.contact-form input[type="email"],.contact-form input[type="number"]
{
  border: 1px solid grey;
    padding-left: 8px; 
    padding-right: 8px;
    background-color: #ffffff !important;
    outline: none;
    height: 48px;
    color: #454545;
    font-size: 17px;
    border-radius: 4px;
    border: 1px solid #EBEBEB;


}

.contact-form input[type="text"]:focus{
   border: 1px solid rgb(0, 132, 137);
}
.contact-form input[type="password"]:focus{
   border: 1px solid rgb(0, 132, 137);
}
.contact-form input[type="number"]:focus{
   border: 1px solid rgb(0, 132, 137);
}
.contact-form input[type="email"]:focus{
  border: 1px solid rgb(0, 132, 137);
}
.contact-form input[type="submit"] {
    height: 50px;
    font-size: 25px;
    color: #333333;
    display: block;
  font-family: 'SamsungSharpSans-Bold';
    font-weight: 100;
    cursor: pointer;
    border-radius: 5px;
    border:2px solid #333333;
    outline: none;
    background: white;
    margin-top: 7%;
}
.contact-form input[type="submit"]:hover {
background: #e9e9e9;
}
h1{
 position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: SamsungSharpSans-Medium;
    font-size: 50px;
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
.error p {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
  font-size: 13px;
  margin-top: 5px;
}
.contact-form a {
   
    font-size: 25px;
    color: #333333;
    display: block;
  font-family: 'SamsungSharpSans-Bold';
    font-weight: 100;
    cursor: pointer;
    border-radius: 5px;
    border:2px solid #333333;
    outline: none;
    background: white;
    margin-top: 7%;
    padding:5px;
}
.contact-form a:hover {
background: #e9e9e9;
text-decoration: none;
}
#fshi-llogarine{
   height: 50px;
    font-size: 25px;
    color: #333333;
    display: block;
  font-family: 'SamsungSharpSans-Bold';
    font-weight: 100;
    cursor: pointer;
    border-radius: 5px;
    border:2px solid #333333;
    outline: none;
    background: white;
    margin-top: 7%;
}
#fshi-llogarine:hover{
  background: #e9e9e9;
}

</style>
</head>
<body>

  
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">

  <a class="navbar-brand" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici profili</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" id = "Kryefaqja">
        <a class="nav-link" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Kryefaqja</a>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div style="text-align:center"/>
  <div class = "contact-form">
    <form action="#" class = "deleteacc" method="POST">
      <?php
                        echo '<img src = "user-photos/'. $row['userphotos'] . '" class = "avatar"/>';
                         ?><br>
                         <script type="text/javascript">
  var cw = $('.avatar').width();
$('.avatar').css({
    'height': cw + 'px'
});
</script>
    <h2>Fshij Llogarine</h2>


  <p>Fjalekalimi</p>
  <input name="password_1" type="password" placeholder="Shkruani Fjalekalimin e Tanishem" oninvalid = "this.setCustomValidity('Ju lutem shenoni fjalekalimin')"  oninput="this.setCustomValidity('')" value ="<?php if(isset($_POST['password_1'])){echo $_POST['password_1'];}?>" required />
    <p style = "font-size: 17px;">Arsyeja e fshirjes (Opcionale)</p>
    <textarea class="form-control" rows="5" id="comment" name="abonohu"> </textarea>
    <input type="button" value="Fshij Llogarine" data-toggle="modal" data-target="#exampleModalCenter"  id = "fshi-llogarine">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">A jeni të sigurtë?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style = "text-align: left">
        Na vjen keq duke ju parë që ju shkoni!<br>
        Me këtë veprim ju do të fshini llogarinë përgjithmonë!
        <p style = "font-size: 20px;"><b>Ju lutemi vini re:</b></p>Fshirja e llogarisë suaj dhe të dhënat personale janë të përhershme dhe nuk mund të zhbëhen. Amici nuk do të jetë në gjendje të rikuperojë llogarinë tuaj pasi të dhënat të jenë fshirë. Gjithashtu me këtë veprim do të fshihen të gjitha në lidhje me ju duke përfshirë: postimet në grup dhe në dosje, folderat, videot, foto e profilit.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"  style = "height:40px;">Mbyll</button>
        <button type="submit" class="btn btn-danger" name="deleteacc" style = "height:40px; background: #dc3545;" >Fshij Llogarine</button>
      </div>
    </div>
  </div>
</div>

  <?php include('errors.php'); ?>
     </form>

</div>

</div>
<br>
<script type="text/javascript">
$('.deleteacc').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        $('#fshi-llogarine').click();
        return false;
    }
});
</script>
</body>
</html>