<?php
    // Starto sesionin
    ob_start();
  
       include("server.php");
    // Shiko nese useri eshte i kyqur. Nese jo, ridirekto ne login
  include("check-vitiakademik.php");
 include ("verify_user.php");
    
?>
<?php 
 if (isset($_GET['fileerror'])){
   array_push($errors, "Foto ka nje madhesi te madhe");

 }
?>
<?php
// lidhu me databaze
include("config.php");
 //fshij komentin
$username = $_SESSION['username'];
$query1= "UPDATE users SET notification = '0' WHERE username = '$username'";
      mysqli_query($db, $query1);
      


   if (isset($_GET['remove-comment'])){

$number=$_GET['remove-comment'];
 $query100 = " SELECT users.username, userposts.uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$number'";
                                    $results100 = mysqli_query($db, $query100);
                                    $row100 = $results100->fetch_assoc();
if ($_SESSION['username'] == $row100['username']){
   $file = $row100['uploadedphoto'];
          $myFile = "userpostsUploads/$file";
unlink($myFile); 
  $sql = "DELETE from userposts where id='$number'";
    
      mysqli_query($db, $sql);
      $sql1 = "DELETE from userposts where replyingto='$number'";
      mysqli_query($db, $sql1);
      //proveeeee
      //$vitiakademik = $_SESSION['vitiakademik'];
      //$query1= "UPDATE users SET notification = notification - 1 WHERE academicyear = '$vitiakademik'";
      //mysqli_query($db, $query1);
      //endprove
      if (isset($_GET['page'])){
        $number = $_GET['page'];
       header('Location:group.php?page='.$number);
      
    }
    else if (isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
       header('Location:group.php?keyword='.$keyword);
      
    }
    else{
       header("Location:group.php");
    }
           
  }
else{
   header("Location:group.php");
}
          

   }
    //Shiko se a ka sortim dhe nese po atehere vendose me nje variabel
             if (isset($_GET['orderby'])){
              if (($_GET['orderby']!= "desc") && ($_GET['orderby']!="asc")){header("Location:group.php");die();}
              else{
                  $orderby = $_GET['orderby'];
              }
    }
    else {
      $orderby="DESC";
    }
           //user discussion
            $vitiakademik = $_SESSION['vitiakademik'];
            $query3 = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto is null ORDER BY id $orderby";


            $results3 = mysqli_query($db, $query3);

            $number_of_results = mysqli_num_rows($results3);
           //Defino se sa rezultate shfaqen
            $results_per_page=10;
            //Defino numrin e faqeve
            $number_of_pages=ceil($number_of_results/$results_per_page);
            if (!isset($_GET['page'])){
              $page=1;
            }
            else{
              $page=$_GET['page'];
              if (($page > $number_of_pages) || ($page < 1) ){
                header("Location:group.php");
              }
            }


            // page1, 12 results per page, limit 0,12
            // page2, 10 results per page, limit 10,12
            // page3, 10 results per page, limit 20,12
            $this_page_first_result = ($page-1)*$results_per_page;

            $query3 = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto is null ORDER BY id $orderby LIMIT ". $this_page_first_result.','.$results_per_page;
    $results3 = mysqli_query($db, $query3);

 if (mysqli_num_rows($results3) == 0) {
                 echo '<style>#postimet { display:block!important;}</style>';

             }
                
?>
<?php 
//Shiko a ka theme te zgjedhur perdoruesi

 $query = "SELECT * FROM group_themes WHERE username='$username'";

$results = mysqli_query($db, $query);
$row = $results->fetch_assoc();  

          if (mysqli_num_rows($results) == 1) {
            $theme = $row['theme'];
            $opacity = $row['opacity'];

            echo '<style>
            body {
  background:url("themes/'.$theme.'.jpg") no-repeat center center fixed !important;
  background-size: cover !important;
 -webkit-background-size: cover !important;
  -moz-background-size: cover !important;
  background-size: cover !important;
}
.postimet-container{
  background:url("themes/'.$theme.'.jpg") no-repeat center center fixed !important;
    background-size: cover !important;
 -webkit-background-size: cover !important;
  -moz-background-size: cover !important;
  background-size: cover !important;
    min-height: 100% !important;
opacity:'.$opacity.'!important;
}
  /* **** Per ios **** */
@media screen and (max-width:640px){
   body {
  background:url("themes/'.$theme.'.jpg") no-repeat center center !important;
  background-size: cover !important;
 -webkit-background-size: cover !important;
  -moz-background-size: cover !important;
  background-size: cover !important;
}

.postimet-container{
    background:url("themes/'.$theme.'.jpg") no-repeat center center !important;
    background-size: cover !important;
 -webkit-background-size: cover !important;
  -moz-background-size: cover !important;
  background-size: cover !important;
    min-height: 100% !important;
  opacity:'.$opacity.'!important;
}
}
    
  /* ******** */


#counter{
  color: white;
}
.search-term-display{
  color:white;
}
#dropdown-divider{
  display:none;
}




            </style>';
          }


?>

<?php 
//Zgjedhja e themes
if (isset($_GET['theme'])){
  $theme = $_GET['theme'];
  $opacity = $_GET['opacity'];

  if (($theme == 'forest') || ($theme == 'sunset')  || ($theme == 'mountain') || ($theme == 'pier') || ($theme == 'image1') || ($theme == 'image2') || ($theme == 'image3') || ($theme == 'image4') || ($theme == 'image5') || ($theme == 'image6')){
    if ($opacity >= 0.5 && $opacity <=1){
      $username = $_SESSION['username'];
      $query = "SELECT * FROM group_themes WHERE username='$username'";

$results = mysqli_query($db, $query);

          if (mysqli_num_rows($results) == 0) {
            $query1 = "INSERT INTO group_themes(username, theme, opacity) 
            VALUES('$username','$theme', '$opacity')";
      mysqli_query($db, $query1);
         header("Location:group.php");

          }
else{
    $sql = "UPDATE group_themes SET theme='$theme', opacity='$opacity' WHERE username='$username'";
    
      mysqli_query($db, $sql);
        header("Location:group.php");
}
  
    
  }}


  else{
    header("Location:group.php");
  }
}

?>
<?php 
//Fshirja e themes

if (isset($_GET['theme_remove'])){
  $username = $_SESSION['username'];
 $sql = "DELETE FROM group_themes WHERE username='$username'";
    
      mysqli_query($db, $sql);
        header("Location:group.php");

}
?>

<html>
<head>
  <?php 
  if (isset($_GET['keyword'])){
echo "<title>".$_GET['keyword']. " - Kerkimi ne amici". " </title>";
  }
  else {
    echo "<title>amici grupi</title>";
  }

  ?>
   <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
} //Mos u submit nese bohet refresh faqja
</script>
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
  <link rel = "stylesheet" type = "text/css" href = "group-stili.css"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
  <link rel = "stylesheet" type = "text/css" href = "stili.css">
  <script src="navi.js"></script>
  <style>
    @media screen and (max-width: 960px){
      .toast{
  margin-top: 60px !important;
}
#alert-group{
  width:100% !important;
  }
    }
    @media screen and (max-width:500px){

    .modal-theme-buttons{
  width: 100%;
}
.modal-footer .btn{
  margin-left: 0px !important;
  width:100% !important;
  margin-top: 5px !important;
}
.speech{
 
    right: 0 !important;
    margin-right:70px;
  
}
.custom-file-upload{
  right: 0 !important;
    margin-right:25px;
}
    }
    .speech{
      display: inline-block;
      cursor: pointer;
      position: absolute;
      margin-left: 350px;
      margin-top: 29px; 
      background: #E5E3E2;
      border-radius: 50%;
      padding:8px;

    }

  .speech img { width: 25px }
  .btn-light{
    background: transparent;
    border-color: transparent;
  }

  .administrator-icon{
    width:28px;
    margin-left: 5px;
    margin-bottom: 3px;
  }

 .pagination-wrapper{
margin: auto;
  overflow-x: auto;
  overflow-y: hidden;
  white-space: nowrap;
  width:90%;
 }
 .theme{
  width: 150px;
  margin-top: 20px;
  display: inline-block;
 }
 .theme-photo{
   height:140px;
   width:140px;
   border-radius: 20px; 
 }
 .theme-choice:hover {
  text-decoration: none;  
 }


.input-hidden {
  position: absolute;
  left: -9999px;
}

input[type=radio]:checked + label>img {
  border: 1px solid #fff;
  box-shadow: 0 0 1px 3px #57A9DC;
}

input[type=radio] + label>img {

  transition: 500ms all;

}
.replies-container, .hide_replies{
  display: none;
}
.hide_replies{
  margin-top: 20px;
}
.show_replies{
  display: block;
}
#alert-group{
  font-size: 15px;
  width:900px;
  margin:auto;
}
</style>


</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">

  <a class="navbar-brand" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici grupi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-inline my-2 my-lg-0" method="get" action="#" id="search_form_mobile" style="width:100%">
    <input type = "text" class="form-control mr-sm-12" style="width:100%" placeholder="Kerko Mesazhe" aria-label="Search" id= "search" name="keyword" autocomplete="off" onkeyup="searchfunction()"/>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-submit" disabled style="display: none">Kerko</button>
    </form>

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
       <a class="nav-link active" href="group.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Grupi <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="lessons.php" style = "font-family: SamsungSharpSans-Bold; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>
    </ul>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-light" id="theme_settings" title="Ndrysho Sfondin" data-toggle="modal" data-target="#theme_modal">
  <img src= "img/settings.png" style = "width:30px;"/>
</button>

<button type="button" class="btn btn-primary" title="Perdoruesit" data-toggle="modal" data-target="#exampleModalLong" id = "studentet-menu">
<img src="img/multiple-users-silhouette.png" style = "width:30px;" />
</button>
  <form class="form-inline my-2 my-lg-0" method="get" action="#" id="search_form_pc">
    <input type = "text" class="form-control mr-sm-2" placeholder="Kerko Mesazhe" aria-label="Search" id = "search1" name="keyword" autocomplete="off" onkeyup="searchfunction()"/>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-submit1" disabled>Kerko</button>
    </form>
     <ul class="navbar-nav mx-3" id="prova">
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

  <?php include("friends-list.php");?>
  <div style = "text-align:center; margin-top: 78px;">

<?php include("theme_selector.php");?>

<div class = "postimet-container">
<!--
<div class = "postimet-title">
  Diskuto me shoket
</div>
-->

<script type="text/javascript">
function success(){
var i=document.getElementById("abc");
if(i.value=="")
    {
    document.getElementById("abc2").disabled=true;
    }
else
    document.getElementById("abc2").disabled=false;}
function searchfunction(){
var i=document.getElementById("search");
var j=document.getElementById("search1");
if(i.value=="")
    {
    document.getElementById("search-submit").disabled=true;
    }
else
    document.getElementById("search-submit").disabled=false;
if(j.value=="")
    {
    document.getElementById("search-submit1").disabled=true;
    }
else
    document.getElementById("search-submit1").disabled=false;

}




</script>
<script type="text/javascript">
  
  function InvalidMsg(textbox) {
var characters = textbox.value.split('');
  if (characters.length>255){
      textbox.setCustomValidity('Ju lutem shenoni me pak se 255 Karaktere');
  }
    
    else if (textbox.value == '') {
        textbox.setCustomValidity('Ju lutem shkruani komentin');
    }
    else {
       textbox.setCustomValidity('');
    }
    return true;
}
</script>

<?php


  //Dergimi i komentit te ndryshuar

  if (isset($_GET['edit-comment'])){

$number=mysqli_real_escape_string($db, $_GET['edit-comment']);
$query100 = " SELECT users.username, Comments from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$number'";
                                    $results100 = mysqli_query($db, $query100);
                                    $row100 = $results100->fetch_assoc();
if ($_SESSION['username'] == $row100['username']){
  $comment = $row100['Comments'];
echo' <span class="br-for-editcomment-mobile"> <br> </span>
<div id = "edit-comment" style = "margin-top:110px">
<form class="was-validated" method= "post">
  <div class="mb-3" style = "width:90%; margin:auto;" > 
    <label for="validationTextarea">Ndrysho Komentin</label>
    <textarea class="form-control is-invalid" name = "edited-comment" rows="3" id="validationTextarea" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Ju lutem shenoni komentin per ta ndryshuar" required>'.$comment.'</textarea>
    <input name = "submit-edited-comment" type="submit" value="Ndrysho" style = "background:#28a745; border-color:#28a745; border-radius:.25rem; margin-top:10px;">
  </div>
  </form>
  </div>';
   if (isset($_POST['submit-edited-comment'])){
    $edited_comment = mysqli_real_escape_string($db, $_POST['edited-comment']);
   $edited_comment = trim($edited_comment);  
     if (ltrim($edited_comment, ' ') === '') {
header("Location:group.php");
    }
    
    else if (strpos($edited_comment, ' ') === 0) { //Nese fillon me hapesire (Alt 255)
    header("Location:group.php");
}
    
    else {
     $query = "UPDATE userposts SET Comments = '$edited_comment', edited=1 WHERE id='$number'";
                    mysqli_query($db, $query);
                    header("Location:group.php");
  }
  }
  }
else{
   header("Location:group.php");
}   
//Per te aplikuar javascriptin e bootstrapit qe te punojne butonat   
     include("bootstrap_javascript.php");
die();
   }


//


 //Shfaqja e postimeve me search

  if(isset($_GET['keyword'])){
    //Shiko nese ka sortim dhe nese po fute ne nje variabel
          if (isset($_GET['orderby'])){
              if (($_GET['orderby']!= "desc") && ($_GET['orderby']!="asc")){header("Location:group.php");die();}
              else{
                  $orderby = $_GET['orderby'];
              }
    }
    else {
      $orderby="DESC";
    }
    
    $vitiakademik = $_SESSION['vitiakademik'];
$search_term = mysqli_real_escape_string($db,$_GET['keyword']);
$search_term = trim($search_term);

//$search_term = preg_replace("#[^0-9a-z]#i", "", $search_term);
/*

  --------------- Searchi i meparshem ---------------
    $sql = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto is null AND Comments  LIKE '%$search_term%'
ORDER BY id DESC";
*/

    $sql_check_for_replies = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND Comments  LIKE '%$search_term%' ORDER BY id DESC"; // Shiko per komente dhe replya
    $query = mysqli_query($db, $sql_check_for_replies);
       $replyingtoarray=array(); // Krijo varg per replyat
    while(($row_check = $query->fetch_assoc()) !== null){ 
   
      if ($row_check['replyingto'] != null){ //Nese ka reply
        $replyingto = $row_check['replyingto']; // Merr replyn
            array_push($replyingtoarray,$replyingto); // Fute ate reply ne varg
      }
        }
  /*
   foreach ($replyingtoarray as $replies) {
     echo $replies."<br>";
   }

   Trego se reply-a cilit koment i perket
*/ 
/*
$sql = "SELECT * FROM userposts
WHERE academicyear='$vitiakademik' AND Name LIKE '%$search_term%' OR Surname LIKE '%$search_term%' OR Comments LIKE '%$search_term%'
ORDER BY id";
*/
   if (count($replyingtoarray)==0){ // Nese nuk ka replya
     $sql = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto is null AND Comments  LIKE '%$search_term%'
ORDER BY id $orderby";
   }
   else{ //Nese ka replya
    //Trego se pari komentet qe nuk i perkasin reply
     $sql = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto is null AND Comments  LIKE '%$search_term%' union 
";


$sql .= "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited, uploadedphoto from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND (";
foreach ($replyingtoarray as $replies) { // Itero rreth replyave
$sql .= "userposts.id='$replies' or ";

}
//Shto ato id ne stringun e sql

$sql = mb_substr($sql, 0, -4); // Fshirja e or-it te fundit ne foreach
$sql .= ") ORDER BY id $orderby"; // Radhiti prej komentit te fundit
//echo $sql;
   }



    $query = mysqli_query($db, $sql);
    $count = mysqli_num_rows($query);
   echo '<span id="search-br"><br> </span>';
    echo "<div class = 'results_container'>";
    echo "<div class='search-term-display' style = 'padding-top:20px'>Rezultatet e kerkimit per: ". htmlspecialchars($search_term). " | ".$count. " rezultate". "</div>";
    echo ' <select name="order" style="float:none; margin-bottom:17px;" onchange="location = this.value;">
    <option value="#" >Zgjedh renditjen</option>';
     if(isset($_GET['keyword'])){
                $keyword = $_GET['keyword'];
                 echo "<option value='group.php?keyword=".$keyword."&orderby=desc'>Postimet e reja</option>";
                 echo "<option value='group.php?keyword=".$keyword."&orderby=asc'>Postimet e vjetra</option>";
              }
              echo '
   </select>';
    echo'<div class="dropdown-divider" id="dropdown-divider"></div>'; 
    echo "</div>";
   // if((preg_match('/^\s+$/', $search_term)) == 1){
 //header("Location:group.php");
//}

    if (ltrim($search_term, ' ') === '') {
header("Location:group.php");
    }
if($count == 0) {
  echo '<style>#rezultatet { display:none;}</style>';
        echo '<div class = "rezultatet-error">';
        echo '<img src = "img/1f914.png" style = "width:40px"/>'; 
        echo '<br>';
        echo "Asnje postim i gjetur";
         echo '</div>'; 
    }
    else if(empty($search_term)){
      header("Location:group.php");
    }
    


    else{
    while(($row = $query->fetch_assoc()) !== null){ 

$row['Name'] = strtolower($row['Name']);
                         $row['Surname'] = strtolower($row['Surname']);
                         $row['Name'] = ucfirst($row['Name']);
                         $row['Surname'] = ucfirst($row['Surname']);
                         echo '<div class = "posts">'; 
                         echo' <div class = "datetime">';
                         echo $row['date'] . " | " . $row['time'];
                         if ($row['edited'] == 1){
                         echo' <span style = "color: #9E9E9E"> (E ndryshuar) </span> ';
                         }
                         echo'</div>';
if (($_SESSION['username']) == $row['username']){
                          
                         //  echo '<a href = "group.php?remove-comment='. $row3['id'].'"><img src = "1282956.png" class = "remove-comment" title = "Fshij Komentin"> </a>';
                            echo '<form action="#" method="post" style = "position:absolute; right:0">
                            <button name="delete-comment" title = "Fshij Komentin" type="submit" value="'. $row['id'].'" style = "padding: 0;border: none;background: none; cursor:pointer;position:absolute; right:0;">
                            <img src="img/1282956.png" class = "remove-comment"/>
                            </button>
                              </form>';
                     
                                if (isset($_POST['delete-comment'])){
                                  $value = $_POST['delete-comment'];
 $query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
              if(isset($_GET['keyword'])){
                $keyword = $_GET['keyword'];
                header('Location:group.php?keyword='.$keyword.'&remove-comment='. $value);
              }
              else{
                header('Location:group.php?remove-comment='. $value);
              }
                                

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                        }  
                        echo '<div class = "foto-container">'; 
                        echo '<img src = "user-photos/'. $row['userphotos'].'" class = "foto">'; 
                        echo '<br>';
                        echo '<div class = "emri">';
                        echo htmlspecialchars($row['Name']). " " . htmlspecialchars($row['Surname']);
                        $username = $row['username'];
                        $sql = "SELECT * from admins where username='$username'";
                        $results = mysqli_query($db, $sql);
                        if (mysqli_num_rows($results)==1){
         echo '<img src = "img/verify-icon.png" title="Administrator" alt="Administrator" class="administrator-icon" />';
    }
                        echo '</div>';
                        echo '</div>';
                        
                       echo '<div class = "pershkrimi" style = "text-align:left;">';
                        if ($row['uploadedphoto'] != null){
                           echo '<a href = "userpostsUploads/'. $row['uploadedphoto'].'" target="_blank" title="Kliko per ta zmadhuar"/><img src = "userpostsUploads/'. $row['uploadedphoto'].'" class= "uploadedphoto"/></a>'; 
                         echo '<br>';
                        }
                        
                         $row['Comments'] = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', '<a href="\0" target="_blank">\0</a>', htmlspecialchars($row['Comments']) ); 
                        // ne vend te \0 mund t'a bejme \4 per te shfaqur vetem pjesen kryesore te linkut
                        //(htmlspecialchars) Paraqit komentin si tekst e jo si kod te html
                        echo "<pre style = 'white-space: pre-wrap; white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap; word-wrap: break-word; font-family:SamsungSharpSans-Bold; font-size:20px; display:inline'>". $row['Comments']."</pre>";

                          //Ndrysho komentin
                         if (($_SESSION['username']) == $row['username']){
                          echo '<form action="#" method="post" style = "display:inline-block">
                       <button name="edit-comment" title = "Ndrysho" type="submit" class="btn btn-light" value="'. $row['id'].'" class = "edit-comment" style = "margin-left:10px;">
                            <img src = "img/edit.png" style = "width:20px"/> </button>

                             </form>';
                             if (isset($_POST['edit-comment'])){
                                  $value = $_POST['edit-comment'];
$query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                                header('Location:group.php?edit-comment='. $value);

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                         }
                        
                        //

                        echo '<div class="dropdown-divider"></div>';
                         echo '</div>';

                         $id = $row['id'];
                          include("get_replies.php");
                         $replies_count_check = "SELECT * FROM userposts WHERE replyingto='$id'";
      $results_replies_count = mysqli_query($db, $replies_count_check);

      $replies_count = mysqli_num_rows($results_replies_count);
                           if ($replies_count >1 ){
                          echo '<a href="javascript:;" style="font-size:15px;" onclick="show_replies('.$row['id'].')" class="show_replies" id="show_replies_button_'.$row['id'].'">Shfaq pergjigjet ('.$replies_count.')</a>';
                         
                         echo '<a href="javascript:;" style="font-size:15px;" onclick="hide_replies('.$row['id'].')" class="hide_replies" id="hide_replies_button_'.$row['id'].'">Fshih pergjigjet </a>';
                       }
                         echo '<div class="replies-container" id= "replies-container_'.$row['id'].'">';
                         //Shfaqja e replysave


                        $query1 = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto = '$id' ORDER BY id";
            $results1 = mysqli_query($db, $query1);

             



                        while(($row1 = $results1->fetch_assoc()) !== null){
  

                         $row1['Name'] = strtolower($row1['Name']);
                         $row1['Surname'] = strtolower($row1['Surname']);
                         $row1['Name'] = ucfirst($row1['Name']);
                         $row1['Surname'] = ucfirst($row1['Surname']);
                         echo '<div class = "posts" style = "background:#E7E8EA; margin-top:20px !important;">'; 
                         echo' <div class = "datetime">';
                         echo $row1['date'] . " | " . $row1['time'];
                         if ($row1['edited'] == 1){
                         echo' <span style = "color: #9E9E9E"> (E ndryshuar) </span> ';
                         }
                         echo'</div>';
                         if (($_SESSION['username']) == $row1['username']){
                          
                         //  echo '<a href = "group.php?remove-comment='. $row3['id'].'"><img src = "1282956.png" class = "remove-comment" title = "Fshij Komentin"> </a>';
                            echo '<form action="#" method="post" style = "position:absolute; right:0">
                            <button name="delete-comment" title = "Fshij Komentin" type="submit" value="'. $row1['id'].'" style = "padding: 0;border: none;background: none; cursor:pointer;position:absolute; right:0;">
                            <img src="img/1282956.png" class = "remove-comment"/>
                            </button>
                              </form>';
                                if (isset($_POST['delete-comment'])){
                                  $value = $_POST['delete-comment'];
 $query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                       if(isset($_GET['keyword'])){
                $keyword = $_GET['keyword'];
                header('Location:group.php?keyword='.$keyword.'&remove-comment='. $value);
              }
              else{
                header('Location:group.php?remove-comment='. $value);
              }

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                        }  

                       echo '<div class = "foto-container" style = "margin-left:0px; left:0; margin-right:350px;">'; 
                        echo '<img src = "user-photos/'. $row1['userphotos'].'" class = "foto" style = "width:50px; height:50px;margin-top:10px">'; 
                        echo '<br>';
                        echo '<div class = "emri" style = "font-size:23px;">';
                        echo htmlspecialchars($row1['Name']). " " . htmlspecialchars($row1['Surname']);
                        $username = $row1['username'];
                        $sql = "SELECT * from admins where username='$username'";
                        $results = mysqli_query($db, $sql);
                        if (mysqli_num_rows($results)==1){
         echo '<img src = "img/verify-icon.png" title="Administrator" alt="Administrator" class="administrator-icon" />';
    }
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class = "pershkrimi" style = "text-align:left; margin-left:85px; margin-right:120px;">';
                         $row1['Comments'] = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', '<a href="\0" target="_blank">\0</a>', htmlspecialchars($row1['Comments']) ); 
                        // ne vend te \0 mund t'a bejme \4 per te shfaqur vetem pjesen kryesore te linkut
                        //(htmlspecialchars) Paraqit komentin si tekst e jo si kod te html
                        echo "<pre style = 'white-space: pre-wrap; white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap; word-wrap: break-word; font-family:SamsungSharpSans-Bold; font-size:20px; display:inline'>". $row1['Comments']."</pre>";
                        
                          //Ndrysho komentin
                         if (($_SESSION['username']) == $row1['username']){
                          echo '<form action="#" method="post" style = "display:inline-block">
                       <button name="edit-comment" title = "Ndrysho" type="submit" class="btn btn-light" value="'. $row1['id'].'" class = "edit-comment" style = "margin-left:10px;">
                            <img src = "img/edit.png" style = "width:20px"/> </button>

                             </form>';
                             if (isset($_POST['edit-comment'])){
                                  $value = $_POST['edit-comment'];
 $query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                                header('Location:group.php?edit-comment='. $value);

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                         }
                        
                        //

                         echo '</div>';
      echo '</div>';
                        

}
echo '</div>';

//Shkruarja e pergjigjes

$query1 = "SELECT * FROM users WHERE username='$username'";
    $results1 = mysqli_query($db, $query1);
          $row1 = $results1->fetch_assoc();
 echo '<form action="#" method="post">';
 $loggedin_username =$_SESSION['username'];
          $querycheck2 = "SELECT * FROM users WHERE username='$loggedin_username'";
      $results2 = mysqli_query($db, $querycheck2);
          $row2 = $results2->fetch_assoc();
                         echo '<img src = "user-photos/'. $row2['userphotos'].'" class = "foto" id ="foto-reply" style = "margin-left:260px;height:50px; width:50px; margin-top:15px; ">';
                        echo '<input type = "text" name="reply" placeholder="Shkruaj nje pergjigje..." oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" autocomplete="off" style="margin-right:130px;"/>';
                  
                       echo' <button name="reply-submit" title = "Dergo" class = "reply" type="submit" value="'. $row['id'].'"/>';

                        echo '</form>';
                        if (isset($_POST['reply-submit'])){
                          $username = $_SESSION['username'];
                          //$reply = $_POST['reply'];
                          $reply = mysqli_real_escape_string($db, $_POST['reply']);
                          $replyid = $_POST['reply-submit'];
                         $query1 = "SELECT * FROM users WHERE username='$username'";
    $results1 = mysqli_query($db, $query1);
          $row = $results1->fetch_assoc();
          date_default_timezone_set("Europe/Tirane");
          $id_user = $row['id'];
    $date = date("d/m/Y");
    $time = date("H:i");
          if(preg_match('/^\s+$/', $reply) == 1){
header("Location:group.php");
die();
} 
if (strpos($reply, ' ') === 0) { //Nese fillon me hapesire (Alt 255)
    header("Location:group.php");
die();

}
else if (empty($reply)){
  header("Location:group.php");
die();
}
                          $query = "INSERT INTO userposts (Comments,date, time, replyingto, id_user) 
            VALUES('$reply','$date', '$time', '$replyid', '$id_user')";
      mysqli_query($db, $query);

      $query1= "UPDATE users SET notification = notification + 1 WHERE academicyear = '$vitiakademik'";
      mysqli_query($db, $query1);
    
      header('Location: #');
      die ();
                        }      













                        echo '</div>';

                   
    }
}
   echo '<div class = "rezultatet" id="rezultatet">'; 
echo "Fundi i rezultateve";
 echo '</div>';  
 }
 //Shfaqja e postimeve pa search

else{
                      echo '<span id="search-br"><br> </span>';
                       echo' <form action="#" method="post" enctype="multipart/form-data">';
                       echo '<div class = "speech">';
                      
echo '<img onclick="startDictation()" src="https://image.flaticon.com/icons/svg/60/60540.svg" data-toggle="tooltip" data-placement="top" title="Ne Perpunim" />';
echo'</div>';   
echo'
<label for="fileToUpload" class="custom-file-upload" id = "custom-file-upload" data-toggle="tooltip" data-placement="top" title="Ngarko fotografi" >
<img src = "img/tick.png" id ="success-photo"/>
    <img src = "img/gallery.png" id="gallery-icon"/>
</label>
<input name="fileToUpload" id="fileToUpload" type="file" accept="image/*"/>'; 
echo'<input type = "text" class = "diskutimi" name = "diskuto" placeholder = "Shkruaj mendimet tuaja... " oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" id="abc" autocomplete="off" onkeyup="success()"/>';

echo'<input type = "submit" class = "biseda" name = "user-discuss" value = "Dergo" id="abc2" disabled/>';
echo'<div class = "spinner">';
   echo'<div class="spinner-border" role="status" id = "loading">';
    echo'<span class="sr-only">Loading...</span>';
  echo'</div>';
  echo'</div>';
echo'<br>';
echo '<div class = "sort_container">';
echo'<div class = "counter" id = "counter">';
echo'<span id="wordCount">0</span><span id= "wordCount1">/255 Karaktere </span>';
echo'</div>';


echo ' <select name="order" onchange="location = this.value;">
    <option value="#" >Zgjedh renditjen</option>';

 if(isset($_GET['page'])){
                $page = $_GET['page'];
                 echo "<option value='group.php?page=".$page."&orderby=desc'>Postimet e reja</option>";
                 echo "<option value='group.php?page=".$page."&orderby=asc'>Postimet e vjetra</option>";
              }
              else{
 echo '
  <option value="?orderby=desc">Postimet e reja</option>
  <option value="?orderby=asc">Postimet e vjetra</option>';
              }
    echo '
  </select>';
echo '</div>';

include('errors.php');
echo'</form>';
echo'<div class="dropdown-divider" id="dropdown-divider"></div>'; 
echo'<div class="alert alert-secondary" id= "alert-group" role="alert">
 <img src="img/warning.png" style="width:28px;margin-bottom:1px;"/><strong style="color:red">Verejtje!</strong> Fyerjet dhe perdorimi i fjaleve banale jane rreptesisht te ndaluara dhe do te rezultojne me suspendim te menjehershem nga platforma!
</div><br>';
                         while(($row3 = $results3->fetch_assoc()) !== null){
                         


                         $row3['Name'] = strtolower($row3['Name']);
                         $row3['Surname'] = strtolower($row3['Surname']);
                         $row3['Name'] = ucfirst($row3['Name']);
                         $row3['Surname'] = ucfirst($row3['Surname']);
                         echo '<div class = "posts">'; 
                         echo' <div class = "datetime">';
                         echo $row3['date'] . " | " . $row3['time'];
                         if ($row3['edited'] == 1){
                         echo' <span style = "color: #9E9E9E"> (E ndryshuar) </span> ';
                         }
                         echo'</div>';
                         if (($_SESSION['username']) == $row3['username']){
                          
                         //  echo '<a href = "group.php?remove-comment='. $row3['id'].'"><img src = "1282956.png" class = "remove-comment" title = "Fshij Komentin"> </a>';

                            echo '<form action="#" method="post" style = "position:absolute; right:0">
                            <button name="delete-comment" title = "Fshij Komentin" type="submit" value="'. $row3['id'].'" style = "padding: 0;border: none;background: none; cursor:pointer;position:absolute; right:0;">
                            <img src="img/1282956.png" class = "remove-comment"/>
                            </button>
                              </form>';
                      
                                if (isset($_POST['delete-comment'])){
                                  $value = $_POST['delete-comment'];
 $query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                                 if(isset($_GET['page'])){
                $number = $_GET['page'];
                header('Location:group.php?page='.$number.'&remove-comment='. $value);
              }
              else{
                header('Location:group.php?remove-comment='. $value);
              }

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                        }  

                        echo '<div class = "foto-container">'; 
                        echo '<img src = "user-photos/'. $row3['userphotos'].'" class = "foto">'; 
                        echo '<br>';
                        echo '<div class = "emri">';
                        echo htmlspecialchars($row3['Name']). " " . htmlspecialchars($row3['Surname']);
                        $username = $row3['username'];
                        $sql = "SELECT * from admins where username='$username'";
                        $results = mysqli_query($db, $sql);
                        if (mysqli_num_rows($results)==1){
         echo '<img src = "img/verify-icon.png" title="Administrator" alt="Administrator" class="administrator-icon" />';
    }
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class = "pershkrimi" style = "text-align:left;">';
                        if ($row3['uploadedphoto'] != null){
                           echo '<a href = "userpostsUploads/'. $row3['uploadedphoto'].'" target="_blank" title="Kliko per ta zmadhuar"/><img src = "userpostsUploads/'. $row3['uploadedphoto'].'" class= "uploadedphoto"/></a>'; 
                         echo '<br>';
                        }
                        
                        $row3['Comments'] = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', '<a href="\0" target="_blank">\0</a>', htmlspecialchars($row3['Comments']) ); 
                        // ne vend te \0 mund t'a bejme \4 per te shfaqur vetem pjesen kryesore te linkut
                        //(htmlspecialchars) Paraqit komentin si tekst e jo si kod te html
                        echo "<pre style = 'white-space: pre-wrap; white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap; word-wrap: break-word; font-family:SamsungSharpSans-Bold; font-size:20px; display:inline'>". $row3['Comments']."</pre>";

                        //Ndrysho komentin
                         if (($_SESSION['username']) == $row3['username']){
                          echo '<form action="#" method="post" style = "display:inline-block">
                       <button name="edit-comment" title = "Ndrysho" type="submit" class="btn btn-light" value="'. $row3['id'].'" class = "edit-comment" style = "margin-left:10px;">
                            <img src = "img/edit.png" style = "width:20px"/> </button>

                             </form>';
                             if (isset($_POST['edit-comment'])){
                                  $value = $_POST['edit-comment'];
 $query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                                header('Location:group.php?edit-comment='. $value);

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                         }
                        
                        //
                        echo '<div class="dropdown-divider"></div>';
                         echo '</div>';
                          $id = $row3['id'];
                          include("get_replies.php");
                         $replies_count_check = "SELECT * FROM userposts WHERE replyingto='$id'";
      $results_replies_count = mysqli_query($db, $replies_count_check);

      $replies_count = mysqli_num_rows($results_replies_count);
                          if ($replies_count >1 ){
                          echo '<a href="javascript:;" style="font-size:15px;" onclick="show_replies('.$row3['id'].')" class="show_replies" id="show_replies_button_'.$row3['id'].'">Shfaq pergjigjet ('.$replies_count.')</a>';
                          echo '<a href="javascript:;" style="font-size:15px;" onclick="hide_replies('.$row3['id'].')" class="hide_replies" id="hide_replies_button_'.$row3['id'].'">Fshih pergjigjet </a>';
                        }
echo '<div class="replies-container" id= "replies-container_'.$row3['id'].'">';

//Shfaqja e Replysave
                        $query = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto = '$id' ORDER BY id";
            $results = mysqli_query($db, $query);






while(($row = $results->fetch_assoc()) !== null){
  

                         $row['Name'] = strtolower($row['Name']);
                         $row['Surname'] = strtolower($row['Surname']);
                         $row['Name'] = ucfirst($row['Name']);
                         $row['Surname'] = ucfirst($row['Surname']);
                         echo '<div class = "posts" style = "background:#E7E8EA; margin-top:20px !important;">'; 
                         echo' <div class = "datetime">';
                         echo $row['date'] . " | " . $row['time'];
                         if ($row['edited'] == 1){
                         echo' <span style = "color: #9E9E9E"> (E ndryshuar) </span> ';
                         }
                         echo'</div>';
                         if (($_SESSION['username']) == $row['username']){
                          
                         //  echo '<a href = "group.php?remove-comment='. $row3['id'].'"><img src = "1282956.png" class = "remove-comment" title = "Fshij Komentin"> </a>';

                            echo '<form action="#" method="post" style = "position:absolute; right:0">
                            <button name="delete-comment" title = "Fshij Komentin" type="submit" value="'. $row['id'].'" style = "padding: 0;border: none;background: none; cursor:pointer;position:absolute; right:0;">
                            <img src="img/1282956.png" class = "remove-comment"/>
                            </button>
                              </form>';
                      
                                if (isset($_POST['delete-comment'])){
                                  $value = $_POST['delete-comment'];
 $query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                               if(isset($_GET['page'])){
                $number = $_GET['page'];
                header('Location:group.php?page='.$number.'&remove-comment='. $value);
              }
              else{
                header('Location:group.php?remove-comment='. $value);
              }

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                        }  

                        echo '<div class = "foto-container" style = "margin-left:0px; left:0; margin-right:350px;">'; 
                        echo '<img src = "user-photos/'. $row['userphotos'].'" class = "foto" style = "width:50px; height:50px;margin-top:10px">'; 
                        echo '<br>';
                        echo '<div class = "emri" style = "font-size:23px;">';
                        echo htmlspecialchars($row['Name']). " " . htmlspecialchars($row['Surname']);
                        $username = $row['username'];
                        $sql1 = "SELECT * from admins where username='$username'";
                        $results1 = mysqli_query($db, $sql1);
                        if (mysqli_num_rows($results1)==1){
         echo '<img src = "img/verify-icon.png" title="Administrator" alt="Administrator" class="administrator-icon" />';
    }
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class = "pershkrimi" style = "text-align:left; margin-left:85px; margin-right:120px;">';
                       $row['Comments'] = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', '<a href="\0" target="_blank">\0</a>', htmlspecialchars($row['Comments']) ); 
                        // ne vend te \0 mund t'a bejme \4 per te shfaqur vetem pjesen kryesore te linkut
                        //(htmlspecialchars) Paraqit komentin si tekst e jo si kod te html
                        echo "<pre style = 'white-space: pre-wrap; white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap; word-wrap: break-word; font-family:SamsungSharpSans-Bold; font-size:20px; display:inline'>". $row['Comments']."</pre>";

                        //Ndrysho komentin
                         if (($_SESSION['username']) == $row['username']){
                          echo '<form action="#" method="post" style = "display:inline-block">
                       <button name="edit-comment" title = "Ndrysho" type="submit" class="btn btn-light" value="'. $row['id'].'" class = "edit-comment" style = "margin-left:10px;">
                            <img src = "img/edit.png" style = "width:20px"/> </button>

                             </form>';
                             if (isset($_POST['edit-comment'])){
                                  $value = $_POST['edit-comment'];
$query100 = " SELECT users.username from userposts inner join users on userposts.id_user = users.id WHERE userposts.id ='$value'";
                                    $results100 = mysqli_query($db, $query100);
                                       while(($row100 = $results100->fetch_assoc()) !== null){    
                                
           
            
            if ($_SESSION['username'] == $row100['username']){
                                header('Location:group.php?edit-comment='. $value);

                              }
                              else {
                                header('Location:group.php');
                              }}

                              }
                         }
                        
                        //
                         echo '</div>';
      echo '</div>';
                        

}                
echo '</div>';

//Shkruarja e pergjigjes

$query1 = "SELECT * FROM users WHERE username='$username'";
    $results1 = mysqli_query($db, $query1);
          $row1 = $results1->fetch_assoc();
          
           $loggedin_username =$_SESSION['username'];
          $querycheck2 = "SELECT * FROM users WHERE username='$loggedin_username'";
      $results2 = mysqli_query($db, $querycheck2);
          $row2 = $results2->fetch_assoc();
                     
                        echo '<form action="#" method="post">';
                         echo '<img src = "user-photos/'. $row2['userphotos'].'" class = "foto" id ="foto-reply" style = "margin-left:260px;height:50px; width:50px; margin-top:15px; ">';
                        echo '<input type = "text" name="reply" placeholder="Shkruaj nje pergjigje..." oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" autocomplete="off" style="margin-right:130px;"/>';
                  
                       echo' <button name="reply-submit" title = "Dergo" class = "reply" type="submit" value="'. $row3['id'].'"/>';

                        echo '</form>';
                     if (isset($_POST['reply-submit'])){
                          $username = $_SESSION['username'];
                          //$reply = $_POST['reply'];
                          $reply = mysqli_real_escape_string($db, $_POST['reply']);
                          $replyid = $_POST['reply-submit'];
                         $query1 = "SELECT * FROM users WHERE username='$username'";
    $results1 = mysqli_query($db, $query1);
          $row = $results1->fetch_assoc();
          date_default_timezone_set("Europe/Tirane");
            $id_user = $row['id'];
    $date = date("d/m/Y");
    $time = date("H:i");
     if(preg_match('/^\s+$/', $reply) == 1){
header("Location:group.php");
die();
} 
if (strpos($reply, ' ') === 0) { //Nese fillon me hapesire (Alt 255)
   header("Location:group.php");
die();
}
else if (empty($reply)){
  header("Location:group.php");
die();
}

                          $query = "INSERT INTO userposts (Comments,date, time, replyingto, id_user) 
            VALUES('$reply','$date', '$time', '$replyid', '$id_user')";

      mysqli_query($db, $query);



      $query1= "UPDATE users SET notification = notification + 1 WHERE academicyear = '$vitiakademik'";
      mysqli_query($db, $query1);
    
      header('Location: #');
      die ();
                        }   
                       
                        echo '</div>';
                      


                        
                        }
                        echo'<div id ="postimet">
                        Asnje postim nuk u gjet <br>
                        <img src = "img/flat-person-sleeping-bed_23-2148146864-removebg-preview.png"/>
                        </div>';
                      }
                      
                     
                         
?>

</div>

</div>
<!-- Shiko a eshte jashte kerkimi-->
<?php if (!isset($_GET['keyword'])) {?>
<!-- Numri i faqeve -->
<div class = "pagination-wrapper">
<nav aria-label="..." class="pagination">
  <ul class="pagination pagination-md justify-content-center" style=" margin: 0 auto !important;">
  <!-- 
  *********** Butoni Fillim ************-->
  <?php if (($page > 3) && ($number_of_pages > 5) ){ ?>
     <li class="page-item" id="first_last_buttons">
       <?php 
       if(isset($_GET['orderby'])){
          echo '<a class="page-link" href="?page=1&orderby='.$orderby.'" aria-label="First">';
       }
       else{
         echo '<a class="page-link" href="?page=1" aria-label="First">';
       }
      ?>
        <span aria-hidden="true">Fillim</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>

       <?php 
       if ($page>1){
        if(isset($_GET['orderby'])){
            $orderby = $_GET['orderby'];
  $para = $page-1;
          echo'<li class="page-item">';
          echo '<a class="page-link" href="?page='.$para.'&orderby='.$orderby.'" aria-label="Para">';
          }
          else{
            $para = $page-1;
          echo'<li class="page-item">';
          echo '<a class="page-link" href="?page='.$para.'" aria-label="Para">';
          }
         
       }
       else{
        if(isset($_GET['orderby'])){
            $orderby = $_GET['orderby'];
  $para = $page;
         echo'<li class="page-item disabled">';
          echo '<a class="page-link" href="?page='.$para.'&orderby='.$orderby.'" aria-label="Para">';
          }
          else{
             $para = $page;
         echo'<li class="page-item disabled">';
          echo '<a class="page-link" href="?page='.$para.'" aria-label="Para">';
          }
        
       }
      
      ?>
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Para</span>
      </a>
    </li>



<?php
/* 
***************** Before ****************
 // vendos faqet
                            for($pages=1; $pages<=$number_of_pages; $pages++){
                            //Shiko se mos ka sortim
                            if(isset($_GET['orderby'])){
                            $orderby = $_GET['orderby'];
                            if ($page==$pages){
                            echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
                            }
                            else{
                            echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
                            }
                            }
                            else{
                            if ($page==$pages){
                            echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
                            }
                            else{
                            echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
                            }
                            }
                            
                            
                            }
                            *****************************************

                            


*/





//Nese jemi ne faqen me e madhe se 3 atehere:
if ($page >3 && $page <=$number_of_pages){
  //Nese gjendemi ne faqen e parafundit
  if ($page== $number_of_pages-1){
//Nese jane gjithsej 5 faqe
if ($number_of_pages ==5){
  //Paraqiti te gjitha
 for ($pages=1; $pages<=$number_of_pages; $pages++){
       //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
      
    
    }
}

else{
  //Perndryshe paraqit ... anash dhe le vetem 2 faqe
    echo '<li class="page-item"><a class="page-link" style="color:#007bff;">...</a></li>';
    for ($pages=$page-3; $pages<=$page+1; $pages++){
       //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
      
    
      
    } 
  }



  }
  //Nese jemi ne faqen e fundit
  else if ($page== $number_of_pages){
    //Nese jane vetem 5 faqe mos paraqit ...
    if ($number_of_pages == 4){

    }
    else if ($number_of_pages == 5){

    }
    
    //Perndryshe paraqiti ...
    else{
    echo '<li class="page-item"><a class="page-link" style="color:#007bff;">...</a></li>';
    }
    //Nese jane vetem 4 faqe paraqiti 3 te parat
    if ($number_of_pages ==4){
    //Paraqit 4 faqe paraprake 
    for ($pages=$page-3 ; $pages<=$page; $pages++){
      //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
    } }
    //Nese jane 5 faqe paraqiti 4 te parat
    else{
    //Paraqit 4 faqe paraprake 
    for ($pages=$page-4 ; $pages<=$page; $pages++){
      //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
    } }




  } 
  //Nese jane me shume se 5 faqe dhe faqet gjinden ne midis te kushteve
    else{
      echo '<li class="page-item"><a class="page-link" style="color:#007bff;">...</a></li>';
    for ($pages=$page-2; $pages<=$page+2; $pages++){
       //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
      
    
    }
      //Nese vetem edhe 2 faqe mbeten krejt atehere mos i qit ...
     if ($page == $number_of_pages-2){
      
     }
     //Nese ka edhe me shume faqe te mbetura
     else{
       echo '<li class="page-item"><a class="page-link" style="color:#007bff;">...</a></li>';
     }
  }
}
 //Nese jemi me poshte se faqja 3
else{
  //Nese jane me shume se 5 faqe atehere paraqiti 5 te parat
  if ($number_of_pages>5){
     for ($pages=1; $pages<=5; $pages++){
      //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
      
    

    }
    echo '<li class="page-item"><a class="page-link" style="color:#007bff;">...</a></li>';
  }
  //Nese jane me pak se 5 faqe atehere paraqiti vetem ato qe jane 
  else{
   for ($pages=1; $pages<=$number_of_pages; $pages++){
       //Shiko se mos ka sortim
        if(isset($_GET['orderby'])){
                $orderby = $_GET['orderby'];
if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'&orderby='.$orderby.'">'. $pages .'</a></li>';
      }
              }
              else{
                if ($page==$pages){
         echo '<li class="page-item disabled" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
      else{
         echo '<li class="page-item" id="'.$pages.'"><a class="page-link" href="?page=' .$pages.'">'. $pages .'</a></li>';
      }
              }
      
    
    }

  }
}
?>
 
       <?php 
       if ($page<$number_of_pages){
          if(isset($_GET['orderby'])){
            $orderby = $_GET['orderby'];
 $pas = $page+1;
          echo'<li class="page-item">';
           echo '<a class="page-link" href="?page='.$pas.'&orderby='.$orderby.'" aria-label="Pas">';
          }
          else{
             $pas = $page+1;
          echo'<li class="page-item">';
           echo '<a class="page-link" href="?page='.$pas.'" aria-label="Pas">';
          }
        
       }
       else{
         if(isset($_GET['orderby'])){
            $orderby = $_GET['orderby'];

$pas = $page;
          echo'<li class="page-item disabled">';
          echo '<a class="page-link" href="?page='.$pas.'&orderby='.$orderby.'" aria-label="Pas">';
          }
          else{
            $pas = $page;
          echo'<li class="page-item disabled">';
          echo '<a class="page-link" href="?page='.$pas.'" aria-label="Pas">';
          }
         
       }
      
       ?>
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Pas</span>
      </a>
    </li>
    <!--
    *********** Butoni Fund ************-->
    <?php if (($page < $number_of_pages-2) && ($number_of_pages > 5) ){ ?>
     <li class="page-item" id="first_last_buttons">
      <?php 
       if(isset($_GET['orderby'])){
          echo '<a class="page-link" href="?page='.$number_of_pages.'&orderby='.$orderby.'" aria-label="Last">';
       }
       else{
         echo '<a class="page-link" href="?page='.$number_of_pages.'" aria-label="Last">';
       }
      ?>
     
        <span aria-hidden="true">Fund</span>
        <span class="sr-only">Last</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>
</div>
<br><br>
<!-- Perfundimi i numrit te faqeve -->

<?php 
 //Mbarimi i Shiko se a eshte jashte kerkimit...
} ?>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</div>


     <?php include("bootstrap_javascript.php");?>  
     <script>
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('abc').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit(); Emri i formes
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>
<script>
var myText = document.getElementById("abc");
var wordCount = document.getElementById("wordCount");

myText.addEventListener("keyup",function(){
  var characters = myText.value.split('');
  wordCount.innerText = characters.length;
  if (characters.length>255){
    document.getElementById("wordCount").style.color = "red";
  }
  else if (characters.length==0){
    document.getElementById("wordCount").style.color = "#212529";
  }
  else {
    document.getElementById("wordCount").style.color = "green";
  }
});
</script>
     <script type="text/javascript">
    $('#fileToUpload').on('change', function() {
 var numb = $(this)[0].files[0].size/1024/1024;
numb = numb.toFixed(2);
if(numb > 10){
window.location.href = "group.php?fileerror";
}
else if (numb>0){
  document.getElementById("success-photo").style.display="block";
document.getElementById("gallery-icon").style.display="none";
document.getElementById("custom-file-upload").style.background="#25AE88";
}
else{
document.getElementById("gallery-icon").style.display="block";
document.getElementById("success-photo").style.display="none";
}
        });

  </script>
    <script type="text/javascript">
 $(document).ready(function() {
    $("#abc2").click(function() {
  $('#loading').attr('style','display:inline-block !important');
    $('.spinner').attr('style','display:inline-block !important');
  //$('#loading').show();
  //$('#counter').hide(); 

    });
});
</script>
<script type="text/javascript">
  function show_replies(id){
   document.getElementById("replies-container_"+id).style.display="block";
   document.getElementById("show_replies_button_"+id).style.display="none";
   document.getElementById("hide_replies_button_"+id).style.display="block";
   document.getElementById("preview_reply_"+id).style.display="none";

  }
    function hide_replies(id){
   document.getElementById("replies-container_"+id).style.display="none";
   document.getElementById("show_replies_button_"+id).style.display="block";
    document.getElementById("hide_replies_button_"+id).style.display="none";
    document.getElementById("preview_reply_"+id).style.display="block";
  }

</script>               
</body>
</html>
