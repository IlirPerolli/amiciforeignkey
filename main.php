
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
    <title> Llogaria amici </title>
    <?php include("bootstrap_css.php");?>
    <link rel="icon" type="image/png" href="people.png" />
    <meta name="theme-color" content="#2f476d">
    <meta property="og:image" content="img/avatar.jpg" />
    <meta name="description" content="Amici Llogaria, vendi per te biseduar dhe per te shkembyer dokumente me njeri tjetrin" />
    <meta name="keywords" content="amici, llogaria, amicillogaria, amici llogaria,krijo llogari, kyqu ne amici, bisedo" />
    <meta name="google-site-verification" content="BTzlSeSQ5eRBLSlE1PrhaaNGD474rk60IL-1DZ0PnFg" />
    <link rel = "stylesheet" href="index-stili.css">
    <meta name="msapplication-navbutton-color" content="#2f476d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <style type="text/css">
    *{
      padding:0;
      margin:0;
      font-family: SamsungSharpSans-Bold;
    }
    body{
      background: #F3F3F3;
    }
 

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="main.php">amici llogaria</a>
  <ul class="navbar-nav mr-auto">
   
    </ul>
  <a href="create-account.php" class="btn button-navbar" >Regjistrohu</a>
<a href="login.php" class="btn button-navbar" >Kyçu</a>

</nav>
<br>
<div class="container-ballina">
  <div class="ballina-pjesa1">
    <div class="pjesa1-container">
      <img src="img/macbook-amici.png"/>
<h1>Platform&euml; inovative p&euml;r student&euml; </h1>
<br>
<a href="create-account.php" class="btn btn-light button-mobile" id="button-ballina" >Regjistrohu</a>
<a href="login.php" class="btn btn-light button-mobile" id="button-ballina">Kyçu</a>

</div>
  </div>
  <div class="ballina-pjesa2">
    <img src="img/macbook-amici.png"/>
  </div>
</div>

<div class="container-ballina-part2">
<div class="first-column">
   <img src="img/amici-main.png"/>
</div>
<div class="second-column">
  <div class="second-column-container">
<h1> Çfar&euml; &euml;sht&euml; amici?</h1>
<p> Amici &euml;sht&euml; nj&euml; platform&euml; e cila u mund&euml;son p&euml;rdoruesve (kryesisht student), t&euml; ken&euml; çasje n&euml;: libra, ligj&euml;rata, t&euml; shk&euml;mbejn&euml; dokumente, t&euml; bashk&euml;bisedojn&euml; si dhe t&euml; ken&euml; qasje n&euml; m&euml;sime.</p>
<br>
<p> Akoma nuk keni llogari amici?</p>
<a href="create-account.php" class="btn btn-light button-pc" id="button-ballina" >Regjistrohu tani</a>

</div>
</div>
</div>
<br>

 <div class = "footer">
      <span class='amici' style = "font-size: 20px;"> amici</span><span class = "team" style = "font-size: 20px;"> team <span style = "color:black;font-size: 20px;">&#9400; 2020 </span></span><!--<span class='amici' id = "amici1" style = "font-size: 20px;">Gjakova</span>-->
    </div>
    <div class = "amici1"> <span class='amici' style = "font-size:15px"> amici</span><span class = "team" style = "font-size:15px; "> team <span style = "color:black;">&#9400; 2020 </span></span><!--<span class='amici' id = "amici1" style = "font-size:15px;">Gjakova</span>--></div>
   
     <?php include("bootstrap_javascript.php");?>
</body>
</html>