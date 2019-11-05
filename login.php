<?php include('server.php');
    $error = "";

    // Shiko nese jane kyqur, nese po ridirektoje ne index
   if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
     $error = "success";
     header('Location: index.php');
     exit();
   }
 ?>

<html>

<head>
      <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
} //Mos u submit nese bohet refresh faqja
</script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="icon" type="image/png" href="people.png" />
<meta name="description" content="Amici Llogaria, vendi per te biseduar dhe per te shkembyer dokumente me njeri tjetrin" />
<meta name="keywords" content="amici, llogaria, amicillogaria, amici llogaria, ilir, krijo llogari, kyqu ne amici, bisedo, ilir perolli" />
<meta name="google-site-verification" content="BTzlSeSQ5eRBLSlE1PrhaaNGD474rk60IL-1DZ0PnFg" />
<link rel = "stylesheet" type = "text/css" href = "login-stili.css">
  <meta name="theme-color" content="#2f476d">
<meta name="msapplication-navbutton-color" content="#2f476d">
<meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<title> &Ccedil;asja - amici llogaria </title>
<style type="text/css">
  .contact-form input[type="text"],
.contact-form input[type="password"]
{
    border: 1px solid grey;
    padding-left: 8px; 
    padding-right: 8px;
    background-color: #ffffff;
    outline: none;
    height: 48px;
    color: #454545;
    font-size: 17px;
    border-radius: 4px;
    border: 1px solid #EBEBEB;

}.contact-form input[type="text"]:focus{
   border: 1px solid rgb(0, 132, 137);
}
.contact-form input[type="password"]:focus{
   border: 1px solid rgb(0, 132, 137);
}
</style>
</head>

<body>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    function InvalidUsername(textbox) {
var characters = textbox.value.split('');
    if (textbox.value == '') {
        textbox.setCustomValidity('Ju lutem shenoni perdoruesin');
         document.getElementById("perdoruesi").style.color="#de071c";
        document.getElementById("username").setAttribute('style', 'border:1px solid #de071c !important');
    document.getElementById("username").style.backgroundColor = "#fef0f0";
        }
    else {
       textbox.setCustomValidity('');
        document.getElementById("perdoruesi").style.color="black";
        document.getElementById("username").style.border = "1px solid #EBEBEB";
        document.getElementById("username").style.backgroundColor = "#ffffff";
    }
    return true;
}
</script>
  <script type="text/javascript">
  function InvalidPassword(textbox) {
var characters = textbox.value.split('');
  if (characters.length<8 && characters.length!=0){
      textbox.setCustomValidity('Ju lutem shenoni 8 e me shume karaktere');
       document.getElementById("fjalekalimi").style.color="black";
       document.getElementById("password").style.border = "1px solid #EBEBEB";
        document.getElementById("password").style.backgroundColor = "#ffffff";
  }
    else if (textbox.value == '') {
        textbox.setCustomValidity('Ju lutem shenoni fjalekalimin');
         document.getElementById("fjalekalimi").style.color="#de071c";
        
        document.getElementById("password").setAttribute('style', 'border:1px solid #de071c !important');
    document.getElementById("password").style.backgroundColor = "#fef0f0";
        }
    else {
       textbox.setCustomValidity('');
        document.getElementById("fjalekalimi").style.color="black";
        document.getElementById("password").style.border = "1px solid #EBEBEB";
        document.getElementById("password").style.backgroundColor = "#ffffff";
    }
    return true;
}

</script>
  <div class = "titulli"><span style = "color:black"> amici  </span><span style = "  color:#9E9E9E;" >&ccedil;asja </span></div>
  <div class="contact-form">
<form name = "frmInfo" action="#" method="post"><br>
   <?php if (isset($_POST['login_user'])){
        $username = $_POST['username'];
       $query = "SELECT * FROM users WHERE username='$username'";
      $results = mysqli_query($db, $query);
          $row = $results->fetch_assoc(); 
        if (mysqli_num_rows($results) > 0){
          echo' <img src = "user-photos/'.$row['userphotos'].'" class = "avatar-user"/><br>';
        }
        else {
          echo '<img src = "img/logo.jpg" class = "avatar"/><br><br>';
        }
      

      }
      else{
        echo '<img src = "img/logo.jpg" class = "avatar"/><br><br>';
      }
      ?>
<!-- <img src = "img/avatar.jpg" class = "avatar"/><br><br> -->

      
  
          <p id = "perdoruesi">Perdoruesi:</p>
          <input type = "text" autofocus value ="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" class = "emri" name = "username" id = "username"  placeholder = "Shkruani P&euml;rdoruesin" onkeydown = "if (event.keyCode == 13)
                                  document.getElementById('btnLogin').click()" oninvalid="InvalidUsername(this);" oninput="InvalidUsername(this);" required>
          <p id = "fjalekalimi">Fjalekalimi:</p>
          <input type = "password" name = "password" id = "password" placeholder = "Shkruani Fjal&euml;kalimin" onkeydown = "if (event.keyCode == 13)
          document.getElementById('btnLogin').click()" oninvalid="InvalidPassword(this);" oninput="InvalidPassword(this);" required />
          <input type = "submit" id = "btnLogin" name="login_user" value = "&Ccedil;asja">
       
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">
    <label class="custom-control-label" for="defaultUnchecked">Shfaq Fjal&euml;kalimin</label>
</div>
        <div class = "account" style = "margin-top: 10px;">
        Nuk keni llogari? <a href= "create-account.php">Regjistrohu</a>
      </div>
     
     <?php include('errors.php'); ?>

        </form>
</div>
<br><br>
     <script type="text/javascript">
  var cw = $('.avatar-user').width();
$('.avatar-user').css({
    'height': cw + 'px'
});
</script>
</body>
</html>
