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
<?php include("bootstrap_css.php");?>
 <link rel="icon" type="image/png" href="people.png" />
<meta name="description" content="Amici Llogaria, vendi per te biseduar dhe per te shkembyer dokumente me njeri tjetrin" />
<meta name="keywords" content="amici, llogaria, amicillogaria, amici llogaria, krijo llogari, kyqu ne amici, bisedo" />
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
.avatar{
  margin-right: 45px;
}
@media screen and (max-width: 640px){
  .avatar{
  margin-right: 0px !important;
}
}
</style>
</head>

<body>


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
        $username =  mysqli_real_escape_string($db, $_POST['username']);
        
       $query = "SELECT * FROM users WHERE username='$username'";
      $results = mysqli_query($db, $query);
          $row = $results->fetch_assoc(); 
        if (mysqli_num_rows($results) > 0){
          echo' <img src = "user-photos/'.$row['userphotos'].'" class = "avatar-user"/><br>';
        }
        else {
          echo '<img src = "img/avatar.jpg" class = "avatar"/><br><br>';
        }
      

      }
      else{
        echo '<img src = "img/avatar.jpg" class = "avatar"/><br><br>';
      }
      ?>
<!-- <img src = "img/avatar.jpg" class = "avatar"/><br><br> -->

      
  
          <p id = "perdoruesi">Perdoruesi:</p>
          <input type = "text" autofocus value ="<?php if(isset($_POST['username'])){echo htmlspecialchars($_POST['username']);}?>" class = "emri" name = "username" id = "username"  placeholder = "Shkruani P&euml;rdoruesin" onkeydown = "if (event.keyCode == 13)
                                  document.getElementById('btnLogin').click()" oninvalid="InvalidUsername(this);" oninput="InvalidUsername(this);" autocomplete="off" required>
          <p id = "fjalekalimi">Fjalekalimi:</p>
          <input type = "password" name = "password" id = "password" placeholder = "Shkruani Fjal&euml;kalimin" onkeydown = "if (event.keyCode == 13)
          document.getElementById('btnLogin').click()" oninvalid="InvalidPassword(this);" oninput="InvalidPassword(this);" autocomplete="off" required />
          <input type = "submit" id = "btnLogin" name="login_user" value = "Qasja">
       
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">
    <label class="custom-control-label" for="defaultUnchecked">Shfaq Fjal&euml;kalimin</label>
</div>
        <div class = "account" style = "margin-top: 10px;">
        <a href= "forgot_password.php">Keni harruar fjalekalimin?</a>
      </div>
        <div class = "account" style = "margin-top: 10px;">
        Nuk keni llogari? <a href= "create-account.php">Regjistrohu</a>
      </div>
     
     <?php include('errors.php'); ?>

        </form>
</div>
<br><br>

 <?php include("bootstrap_javascript.php");?>  
      <script type="text/javascript">
  var cw = $('.avatar-user').width();
$('.avatar-user').css({
    'height': cw + 'px'
});
</script>   
</body>
</html>
