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
<?php 
if (isset($_GET['add_user'])){
  $id = $_GET['add_user'];
  $sql = "SELECT * from users where id='$id'";
  $results = mysqli_query($db, $sql);
  $row = $results -> fetch_assoc();
  $name = $row['Name'];
  $surname = $row['Surname'];
  $username = $row['username'];
  $sql1 = "SELECT * from kursori_members where username='$username'";
  $results1 = mysqli_query($db, $sql1);
  if (mysqli_num_rows($results1)==1){
    header("Location:kursori_members.php");
  }
  else{


$query = "INSERT INTO kursori_members (id, Name, Surname, username) 
            VALUES('$id', '$name', '$surname', '$username')";
      mysqli_query($db, $query);
      header("Location:kursori_members.php");
}}
if (isset($_GET['remove_user'])){
  if ((($_SESSION['username']) == "ilirperolli")/* || (($_SESSION['username']) == "arianitjaka") || (($_SESSION['username']) == "K")*/ ) {

  $id = $_GET['remove_user'];
  $sql = "DELETE from kursori_members where id='$id'";
  mysqli_query($db, $sql);
  header("Location: kursori_members.php");
}
else{
   header("Location: kursori_members.php");
}
}

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
  @media screen and (max-width: 900px){
    .posts .foto {

      margin-left: 5px !important;
    }
    .pershkrimi{
      margin-left: 30px !important;
margin-right: 30px !important;
    }
    .foto-container{
      width:100% !important;
      margin-left:0px !important;
    }
    .posts{
      width:100%!important;

    }
    .opsionet{
      width:90% !important;
     
      margin-top:15px !important;
    }
    .verifikim-i-refuzuar{
      width:100% !important;
      margin-top: 10px !important;
     
      margin-left:0px !important;
     

    }
    .verifikim-i-aprovuar{
      width:100% !important;
       margin-right:0px !important;

    }

  }
  @media screen and (max-width: 550px){
    #search{
      width:70% !important;
      margin-right: 10px;
    }
     .emri{
    
      font-size: 27px !important;
      text-indent: 0px !important;
     
    }
    .foto{
      margin-right:15px !important;
    }
    .postimet-container input[type=text]{
      width:90% !important;
    }
    .postimet-container input[type=submit]{
      margin-top:5px;
    }
    .posts .foto {

      margin-left: 5px !important;
    }
    .pershkrimi{
      margin-left: 30px !important;
margin-right: 30px !important;
    }
    .expand{
      width: 98% !important;
    }
    .foto-container{
      width:100% !important;
      margin-left:0px !important;
    }
    .posts{
      width:100%!important;

    }
  }
  @media screen and (max-width: 300px){
    #postimet img{
      width: 100% !important;
     margin-top: -15px !important;

    }
  }
  body,html{
    margin:0;
    padding: 0;
    font-family: 'SamsungSharpSans-Medium';
  }

body {
  background: rgb(243, 243, 243);
}
.postimet-title{
   background: #2f3542;
   color:white;
   padding: 20px;
   font-size: 35px;
  font-family:SamsungSharpSans-Bold;
}
.postimet-container{
 
   font-size: 35px;
  font-family:SamsungSharpSans-Bold;
  background: rgb(243, 243, 243);

}
.posts .foto {
  width:70px;
  height:70px;
  border-radius: 50%;
  margin-top: 5px;
}
.posts{
  margin:auto;
 
 background: white;
 width:900px;
 border-radius: 30px;
 margin-bottom: 20px;
 padding-bottom:10px;
 padding-top:10px;
}
.foto-container{
  display: inline-block;
  
}
.pershkrimi{
 margin: 0 auto;
    text-align: center;
  font-size: 20px;
 max-width: 900px;
 word-wrap: break-word;
margin-left:10px; 
margin-right: 10px;
 border-radius: 20px;



}
.postimet-container input[type=text]{
  font-size: 20px;
  border:none;
  border-radius: 0px;
  border-bottom:1px solid black;
  margin-top: 15px;
  outline: none;
  width:390px;
  background: rgb(243, 243, 243);
}
.postimet-container input[type=submit]{
  clear:left;
  color:white;
  font-size:22px;
  text-decoration:none;
  text-align:center;
  border:none;
  display: inline-block;
  cursor: pointer;
  background:#2f3542;
  padding:4px 20px;
  border-radius: 6px;
}
.expand{
  height: 50px;
    font-size: 25px;
    color: #333333;
  font-family: 'SamsungSharpSans-Bold';
    font-weight: 100;
    cursor: pointer;
    border-radius: 5px;
    border:2px solid #333333;
    outline: none;
    background: white;
    -webkit-appearance: none;
-moz-appearance: none;
appearance: none;
margin: auto;
margin-bottom: 3px;
width:250px;
display: inline-block;

}
.foto-container{
  
  overflow: auto;
  width:500px;
  margin-bottom: 10px;
  text-align: left;
  margin-left: 100px;


}
.posts .foto {
margin-right:10px;
float:left;


  }
.emri{
margin-top:-35px;
}
#postimet{
  color:#343a40;
  font-size: 25px;
  display:none;
  margin-top: 40px;
  margin-bottom: 40px;
}
#postimet img{
  width: 300px;
  margin-top: -50px;
}
.verifikim-i-aprovuar{
  width: 170px;

    z-index: 1;

    background-color: green;
    overflow-x: hidden;
margin:auto;
border-radius: 5px;
display: inline-block;
margin-right:5px;
}
.verifikim-i-aprovuar a {
    padding: 2px 4px 2px 12px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
      font-family: 'SamsungSharpSans-Bold';
    font-weight: 100;
    margin:0;
    text-align:center;
}
.verifikim-i-aprovuar:hover{
  background: #379941;
}
.verifikim-i-refuzuar{
  width: 170px; 

    z-index: 1; 

    background-color: #dc3545; 
    overflow-x: hidden; 
margin:auto;
border-radius: 5px;
display: inline-block;
margin-left:5px;
}
.verifikim-i-refuzuar a {
    padding: 2px 4px 2px 12px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
      font-family: 'SamsungSharpSans-Bold';
    font-weight: 100;
    margin:0;
    text-align:center;
}
.verifikim-i-refuzuar:hover{
  background: #ff3f51;
}
.opsionet{
  margin:auto;
  width:350px;
  margin-top:20px;
}
.rezultatet{
  color:red;
  font-size:20px;
  margin-top:10px;
  margin-bottom: 13px;
}
.rezultatet-error{
color: red;
font-size: 25px;
margin-bottom: 20px;
}
.search-term-display{
font-size: 25px;
margin-bottom: 10px;
margin-top:30px;}
.biseda{
  margin-left:10px !important;}
  .max-width{
    overflow: auto;
  }
  .table-row{
cursor:pointer;
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
           <a class="dropdown-item" href="librat-viti4.php" id ="librat-viti4" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti I (Master)</a>
            <a class="dropdown-item" href="librat-viti5.php" id ="librat-viti5" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti II (Master)</a>
        </div>
      </li>
      <a class="nav-link" href="files.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Dosjet  <span id = "notification-counter-uploads"> <?php echo $_SESSION['notification_uploads'] ?> </span> <span class="sr-only">(current)</span></a>
       <a class="nav-link" href="group.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Grupi <span id = "notification-counter"> <?php echo $_SESSION['notification'] ?> </span> <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="lessons.php" style = "font-family: SamsungSharpSans-Bold; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>
       <a class="nav-link" href="admin.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Admin </a>
       <a class="nav-link active" href="kursori_members.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Kursori <span class="sr-only">(current)</span></a>
    </ul>
    <?php
    $anetaret = "SELECT * FROM users WHERE verification='1'";
    $anetaret_results = mysqli_query($db, $anetaret);
    $anetaret_count = mysqli_num_rows($anetaret_results);
    ?>
<form class="form-inline my-2 my-lg-0" method="get" action="#">
    <input type = "text" class="form-control mr-sm-2" placeholder="Kerko <?php echo $anetaret_count;?> studente" aria-label="Search" id = "search" name="keyword" autocomplete="off" onkeyup="searchfunction()"/>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-submit" disabled>Kerko</button>
    </form>
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
<div class = "postimet-container">
  <?php


  if(isset($_GET['keyword'])){
   
$search_term = mysqli_real_escape_string($db,$_GET['keyword']);
$search_term = trim($search_term);
//$search_term = preg_replace("#[^0-9a-z]#i", "", $search_term);


if(strpos($search_term, " ") !== false){ // Nese permban hapesire

    $pieces = explode(" ", $search_term);

$piece1 = $pieces[0];
$piece2 =  $pieces[1];
  $sql = "SELECT * FROM users
WHERE verification = '1' AND Name LIKE '%$piece1%' AND Surname LIKE '%$piece2%'
ORDER BY id DESC";


}else{

     $sql = "SELECT * FROM users
WHERE verification = '1' AND Name LIKE '%$search_term%' OR Surname LIKE '%$search_term%' AND verification = '1'
ORDER BY id DESC";

}
  

//$sql = "SELECT * FROM userposts
//WHERE academicyear='$vitiakademik' AND Name LIKE '%$search_term%' OR Surname LIKE '%$search_term%' OR Comments LIKE '%$search_term%'
//ORDER BY id";



    $query = mysqli_query($db, $sql);
    $count = mysqli_num_rows($query);
    echo "<div class='search-term-display'>Rezultatet e kerkimit per: ". htmlspecialchars($search_term). " | ".$count. " rezultate". "</div>";
    echo'<div class="dropdown-divider"></div>'; 
   // if((preg_match('/^\s+$/', $search_term)) == 1){
 //header("Location:group.php");
//}

    if (ltrim($search_term, ' ') === '') {
header("Location:kursori_members.php");
    }
if($count == 0) {
  echo '<style>#rezultatet { display:none;}</style>';
 echo '<style>#postimet { display:none !important;}</style>'; 
        echo '<div class = "rezultatet-error">'; 
        echo "Asnje anetare i gjetur";
         echo '</div>';

    }
    else if(empty($search_term)){
      header("Location:kursori_members.php");
    }
    


    else{
    while(($row = $query->fetch_assoc()) !== null){
       echo '<style>#postimet { display:none !important;}</style>'; 
                         $row['Name'] = strtoupper($row['Name']);
                          $row['Surname'] = strtoupper($row['Surname']);
                        echo '<div class = "posts">'; 
                        echo '<div class = "foto-container">'; 
                        echo '<img src = "user-photos/'. $row['userphotos'].'" class = "foto">'; 
                        echo '<br>';
                        echo '<div class = "emri">';
                        echo htmlspecialchars($row['Name'])." ". htmlspecialchars($row['Surname']);
                        echo '</div>';
                        echo '</div>';
                        echo '<div class = "pershkrimi" style = "text-align:left; ">';
                        echo "Username: ".htmlspecialchars($row['username'])."<br>";
                        echo "Emaili: ".htmlspecialchars($row['email'])."<br>";
                        echo "Data e lindjes: ".htmlspecialchars($row['age'])."<br>";
                        echo "Viti Akademik: ".htmlspecialchars($row['academicyear'])."<br>";
                        echo '<div class = "opsionet" style = "text-align:center">';
                        $username = $row['username'];

                        //Shiko mos eshte anetare i kursorit
                        $sql = "SELECT * from kursori_members where username='$username'";
                        $results = mysqli_query($db, $sql);
                        if (mysqli_num_rows($results)==0){

                        
                        echo '<div class = "verifikim-i-aprovuar" style = "background:#28a745" >';
                        echo '<a href = "kursori_members.php?add_user='. $row['id'].'" style = "color:white">Shto </a>';
                        echo '</div>';
                       }
                        //Shiko mos eshte anetare i kursorit
                        $sql1 = "SELECT * from kursori_members where username='$username'";
                        $results1 = mysqli_query($db, $sql1);
                        if (mysqli_num_rows($results1)==1){
                        echo '<div class = "verifikim-i-refuzuar" >';
                        echo '<a href = "kursori_members.php?remove_user='. $row['id'].'">Fshij </a>';
                        echo '</div>';
                        }
                        echo'</div>';
                        echo '</div>';
                        echo '</div>';
                        }
}
   echo '<div class = "rezultatet" id="rezultatet">'; 
echo "Fundi i rezultateve";
 echo '</div>';  
 }                       
?>
<?php 

?>


</div>
<br><br>
<h3> Anetaret e Kursorit </h3>
<div class = "max-width">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Emri</th>
      <th scope="col">Mbiemri</th>
      <th scope="col">Opsionet</th>
      

    </tr>
  </thead>
  <tbody>
    <?php 
    $querycheck = "SELECT * from kursori_members order by Name ASC";
    $results = mysqli_query($db, $querycheck);
    while(($row = $results->fetch_assoc()) !== null){
      echo'<tr class="table-row" data-href="?keyword='.$row['Name']."+".$row['Surname'].'">
      <th scope="row">'.$row['id'].'</th>
      <td>'.htmlspecialchars($row['username']).'</td>
      <td>'.htmlspecialchars($row['Name']).'</td>
      <td>'.htmlspecialchars($row['Surname']).'</td>
       <td><a href=?remove_user='.$row['id'].'> Fshij </a></td>
     
    </tr>
';
    }
    ?>  
  </tbody>
</table>
</div>
</div>
<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
<?php include("bootstrap_javascript.php");?>  
</body>
</html>
