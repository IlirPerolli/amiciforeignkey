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
    <meta name="keywords" content="amici, llogaria, amicillogaria, amici llogaria, krijo llogari, kyqu ne amici, bisedo" />
    <meta name="google-site-verification" content="BTzlSeSQ5eRBLSlE1PrhaaNGD474rk60IL-1DZ0PnFg" />
    <link rel = "stylesheet" type = "text/css" href = "login-stili.css">
    <meta name="theme-color" content="#2f476d">
    <meta name="msapplication-navbutton-color" content="#2f476d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title> Rikthe fjalekalimin - amici llogaria </title>
    <style type="text/css">
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
    .contact-form input[type="text"],
    .contact-form input[type="password"],
    .contact-form input[type="email"]
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
    .contact-form input[type="email"]:focus{
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
    <?php include('success_alert.php'); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class = "titulli"><span style = "color:black"> amici  </span><span style = "  color:#9E9E9E;" >rikthimi </span></div>
    <div class="contact-form">
      <?php
      if (isset($_GET['email']) && isset($_GET['token'])){
      $email = mysqli_real_escape_string($db, $_GET['email']);
      $token = mysqli_real_escape_string($db,$_GET['token']);
      $sql = "SELECT * from users where email='$email' and token='$token' and token<>'' and  tokenExpire > NOW()";
      $results = mysqli_query($db, $sql);
      if (mysqli_num_rows($results)==1){
      ?>
      <form name = "frmInfo" action="#" method="post"><br>
        <img src = "img/avatar.jpg" class = "avatar"/><br><br>
        <p id = "fjalekalimi">Fjalekalimi:</p>
        <input type = "password" name = "password" id = "password" placeholder = "Shkruani fjal&euml;kalimin e ri" onkeydown = "if (event.keyCode == 13)
        document.getElementById('btnReset').click()"  autocomplete="off" oninvalid="this.setCustomValidity('Ju lutem shkruani fjalekalimin'); document.getElementById('fjalekalimi').style.color='#FA3B4B'"
        oninput="this.setCustomValidity(''); document.getElementById('fjalekalimi').style.color='black'" maxlength="255" autofocus required />
        <p id = "fjalekalimi1">Rishkruaj fjalekalimin:</p>
        <input type = "password" name = "password1" id = "password" placeholder = "Rishkruani fjal&euml;kalimin e ri" onkeydown = "if (event.keyCode == 13)
        document.getElementById('btnReset').click()" autocomplete="off" oninvalid="this.setCustomValidity('Ju lutem rishkruani fjalekalimin'); document.getElementById('fjalekalimi1').style.color='#FA3B4B'"
        oninput="this.setCustomValidity(''); document.getElementById('fjalekalimi1').style.color='black'" maxlength="255" required />
        <input type = "submit" id = "btnReset" name="reset_password" value = "Rikthe fjalekalimin">
        <?php include('errors.php'); ?>
      </form><?php }  else{ //Nese nuk e ka tokenin valid
      echo "Linku ka skaduar. Klikoni <a href='forgot_password.php' style='color:blue; font-size:15px;'>ketu</a> per te gjeneruar nje link te ri.";
      }
      }//Perfundimi i shkruarjes se fjalekalimave
      else{?>
      <form name = "frmInfo" action="#" method="post"><br>
        <img src = "img/avatar.jpg" class = "avatar"/><br><br>
        <p id = "email">Email:</p>
        <input type = "email" name = "email" id = "email" placeholder = "Shkruani emailin" onkeydown = "if (event.keyCode == 13)
        document.getElementById('btnEmail').click()" oninvalid="this.setCustomValidity('Ju lutem shkruani emailin'); document.getElementById('email').style.color='#FA3B4B'"
        oninput="this.setCustomValidity(''); document.getElementById('email').style.color='black'"  autocomplete="off" autofocus required />
        <input type = "submit" id = "btnEmail" name="submit_email" value = "Rikthe fjalekalimin">
        <?php include('errors.php'); ?>
      </form>
      <?php }?>
    </div>
    <br><br>
    <script type="text/javascript">
    var cw = $('.avatar-user').width();
    $('.avatar-user').css({
    'height': cw + 'px'
    });
    </script>
    <?php
    ?>
  </body>
</html>