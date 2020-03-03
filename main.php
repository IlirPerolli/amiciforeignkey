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
    <link rel="icon" type="image/png" href="people.png" />
    <meta name="theme-color" content="#2f476d">
    <meta property="og:image" content="img/avatar.jpg" />
    <meta name="description" content="Amici Llogaria, vendi per te biseduar dhe per te shkembyer dokumente me njeri tjetrin" />
    <meta name="keywords" content="amici, llogaria, amicillogaria, amici llogaria,krijo llogari, kyqu ne amici, bisedo" />
    <meta name="google-site-verification" content="BTzlSeSQ5eRBLSlE1PrhaaNGD474rk60IL-1DZ0PnFg" />
    <link rel = "stylesheet" href="index-stili.css">
    <link rel = "stylesheet" href="plugins/aos/aos.css">
    <meta name="msapplication-navbutton-color" content="#2f476d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <style>
    body{
    margin:0;
    padding:0;
    height: 100vh;
    }
    </style>
  </head>
  <body>
    <div id = "particles-js"><div class = "amici-teksti"> amici</div></div>
    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>
    <!--<img src = "512486-PIJP0A-449.jpg" class = "jingle-bell"/>-->
    <div style = "text-align:center">
      <div class = "max-width">
        <div class = "titulli"><h3> Llogaria amici</h3> <br><br><br></div>
        <div class = "foto1">
          <img src = "img/indexphoto.png"/>
          <!-- Foto paraprake <img src = "E9962BD5-9B1C-4232-A166-5475F93F46F3.png"/>-->
        </div>
        <div class = "shkrimi">
          <h3> Llogaria amici </h3><div class = "br"><br><br><br><br><br><br><br></div>
          <h2> Porta juaj <br>ne boten e komunikimit </h2><p> </p>
          <h4>Eksploroni &ccedil;fare mund te beni me nje llogari amici.</h4>
          <br><br><div class = "butonat"><div class="butoni" id = "create-account" style = "margin-right:80px">
            <a href="create-account.php">Krijo llogari</a>
          </div>
          <div class="butoni">
            <a href="login.php">Ky&ccedil;u tani</a>
          </div></div>
        </div>
        <div class = "foto" data-aos="fade-left">
          <img src = "img/indexphoto.png"/>
          <!-- Foto paraprake <img src = "E9962BD5-9B1C-4232-A166-5475F93F46F3.png"/>-->
          
        </div>
      </div>
    </div>
    <script src = "plugins/aos/aos.js"></script>
    <script type="plugins/aos/aos.js"></script>
    <script type = "text/javascript">
    AOS.init({
    duration:1500,
    });
    </script>
    <br><br>
    <div class = "footer">
      <span class='amici' style = "font-size: 20px;"> amici</span><span class = "team" style = "font-size: 20px;"> team <span style = "color:black;font-size: 20px;">&#9400; 2020 </span></span><!--<span class='amici' id = "amici1" style = "font-size: 20px;">Gjakova</span>-->
    </div>
    <div class = "amici1"> <span class='amici' style = "font-size:15px"> amici</span><span class = "team" style = "font-size:15px; "> team <span style = "color:black;">&#9400; 2020 </span></span><!--<span class='amici' id = "amici1" style = "font-size:15px;">Gjakova</span>--></div>
  </body>
</html>