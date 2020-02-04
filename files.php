<?php
// Starto sesionin
ob_start();
session_start();
include ("verify_user.php");
// Shiko nese useri eshte i kyqur. Nese jo, ridirekto ne login
include("check-vitiakademik.php");
// lidhu me databaze
include("config.php");
include("files-upload.php");
$username = $_SESSION['username'];
$query= "UPDATE users SET notification_uploads = '0' WHERE username = '$username'";
mysqli_query($db, $query);
?>
<?php
if (isset($_GET['fileerror'])){
array_push($errors, "Dokumenti ka nje madhesi te madhe");
}
?>
<?php
if (isset($_GET['remove-file'])){
$number=$_GET['remove-file'];
$query100 = " SELECT users.username from userfiles inner join users on userfiles.id_user = users.id WHERE userfiles.id ='$number'";
$results100 = mysqli_query($db, $query100);
$row100 = $results100->fetch_assoc();
if ($_SESSION['username'] == $row100['username']){
$query = "SELECT * FROM userfiles WHERE id='$number'";
$results = mysqli_query($db, $query);
$row = $results->fetch_assoc();
$file = $row['file'];
$myFile = "user-files/$file";
unlink($myFile);
//unlink($myFile) or die(Header("Location:files.php"));
$sql = "DELETE from userfiles where id='$number'";
mysqli_query($db, $sql);
header("Location:files.php");
}
else{
header("Location:files.php");
}
}
?>
<html>
  <head>
    <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    } //Mos u submit nese bohet refresh faqja
    </script>
    <?php
    if (isset($_GET['keyword'])){
    echo "<title>".$_GET['keyword']. " - Kerkimi ne amici". " </title>";
    }
    else {
    echo "<title>amici dosjet</title>";
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="icon" type="image/png" href="people.png" />
    <meta name="theme-color" content="#2f476d">
    <meta http-equiv="Refresh" content="600">
    <meta name="msapplication-navbutton-color" content="#2f476d">
    <link rel = "stylesheet" type = "text/css" href = "nav-stili.css"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#2f476d">
    <link rel = "stylesheet" type = "text/css" href = "stili.css">
    <link rel = "stylesheet" type = "text/css" href = "files-stili.css">
    <script src="navi.js"></script>
    <style>
    </style>
  </head>
  <body>
    <script type = "text/javascript">
    window.pressed = function(){
    var a = document.getElementById('aa');
    if(a.value == "")
    {
    fileLabel.innerHTML = "Choose file";
    }
    else
    {
    var theSplit = a.value.split('\\');
    fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
    };
    </script>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark  bg-dark">
      <a class="navbar-brand" href="index.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:35px;">amici dosjet</a>
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
              <a class="dropdown-item" href="librat-viti3.php" id ="librat-viti3" style = "font-family: 'SamsungSharpSans-Bold'; font-size:17px;">Librat Viti III</a>
            </div>
          </li>
          <a class="nav-link active" href="files.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Dosjet <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="group.php" style = "font-family: 'SamsungSharpSans-Bold'; font-size:20px;">Grupi <span id = "notification-counter"> <?php echo $_SESSION['notification'] ?> </span> <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="lessons.php" style = "font-family: SamsungSharpSans-Bold; font-size:20px;">Mesimet   <span class="sr-only">(current)</span></a>
        </ul>
        <button type="button" class="btn btn-primary" title="Perdoruesit" data-toggle="modal" data-target="#exampleModalLong" id = "studentet-menu">
        <img src="img/multiple-users-silhouette.png" width="30px;" />
        </button>
        <form class="form-inline my-2 my-lg-0" method="get" action="#">
          <input type = "text" class="form-control mr-sm-2" placeholder="Kerko Dokumente" aria-label="Search" id = "search" name="keyword" autocomplete="off" onkeyup="searchfunction()"/>
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
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <br><br><br><br><br><span class = "br-mob"><br></span>
      <div style = "text-align:center">
        <div class = "container">
          <br>
          <form method="POST" enctype="multipart/form-data" action="#" class = "forma-bootstrap">
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" value="Browse" name="file" id="inputGroupFile03">
                <label class="custom-file-label" for="inputGroupFile03">Zgjedh nje Dokument (Max: 8MB)</label>
              </div>
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" name = "files" id="btnFiles" type="submit">Ngarko</button>
              </div>
            </div>
          </form>
          <form method="POST" enctype="multipart/form-data" action="#" class = "forma-default">
            <div class = "file-container">
              <div class = "fajli"><input type='file' id="aa" value="Browse" name="file" onchange="pressed()"><label id="fileLabel">Zgjedh nje Dokument (Max: 8MB)</label></div>
              <input type="submit" name="files" id="btnFiles1" value="Ngarko">
            </div>
          </form>
          <!-- Ridirekto nese file e kalon madhesine e caktuar -->
          <script type="text/javascript">
          $('#inputGroupFile03').on('change', function() {
          var numb = $(this)[0].files[0].size/1024/1024;
          numb = numb.toFixed(2);
          if(numb > 10){
          window.location.href = "files.php?fileerror";
          }
          });
          </script>
          <script type="text/javascript">
          $('#aa').on('change', function() {
          var numb = $(this)[0].files[0].size/1024/1024;
          numb = numb.toFixed(2);
          if(numb > 10){
          window.location.href = "files.php?fileerror";
          }
          });
          </script>
          <div class="spinner-border" role="status" id = "loading" style="width: 4rem; height: 4rem;">
            <span class="sr-only">Loading...</span>
          </div>
          <script>
          $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
          });
          </script>
          <?php if (!isset($_GET['keyword'])){?>
          <div class = "sort_container">
            <select name="order" onchange="location = this.value;">
              <option value="#" >Zgjedh renditjen</option>
              <?php
              if(isset($_GET['page'])){
              $page = $_GET['page'];
              echo "<option value='files.php?page=".$page."&orderby=desc'>Postimet e reja</option>";
              echo "<option value='files.php?page=".$page."&orderby=asc'>Postimet e vjetra</option>";
              }
              else{
              echo '
              <option value="?orderby=desc">Postimet e reja</option>
              <option value="?orderby=asc">Postimet e vjetra</option>';
              }?>
            </select>
          </div>
          <br><br>
          <?php
          }?>
          <?php
          include('errors.php');
          echo '<br>';
          if (isset($_GET['orderby'])){
          $orderby = $_GET['orderby'];
          }
          else {
          $orderby="DESC";
          }
          $vitiakademik = $_SESSION['vitiakademik'];
          $query = "SELECT userfiles.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, file, time,date from userfiles inner join users on userfiles.id_user = users.id WHERE academicyear='$vitiakademik' ORDER BY id $orderby";
          $results = mysqli_query($db, $query);
          $number_of_results = mysqli_num_rows($results);
          //Defino se sa rezultate shfaqen
          $results_per_page=12;
          //Defino numrin e faqeve
          $number_of_pages=ceil($number_of_results/$results_per_page);
          if (!isset($_GET['page'])){
          $page=1;
          }
          else{
          $page=$_GET['page'];
          if (($page > $number_of_pages) || ($page < 1) ){
          header("Location:files.php");
          }
          }
          
          // page1, 12 results per page, limit 0,12
          // page2, 10 results per page, limit 10,12
          // page3, 10 results per page, limit 20,12
          $this_page_first_result = ($page-1)*$results_per_page;
          $query = "SELECT userfiles.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, file, time,date from userfiles inner join users on userfiles.id_user = users.id WHERE academicyear='$vitiakademik' ORDER BY id $orderby LIMIT ". $this_page_first_result.','.$results_per_page;
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) == 0 ){
          echo "<br>";
          echo "<p style = 'color:#343a40;'> Nuk u gjet asnje dokument </p>";
          
          }
          //Kerkimi me search
          if(isset($_GET['keyword'])){
          //Shiko nese ka sortim dhe nese po fute ne nje variabel
          if (isset($_GET['orderby'])){
          $orderby = $_GET['orderby'];
          }
          else {
          $orderby="DESC";
          }
          $vitiakademik = $_SESSION['vitiakademik'];
          $search_term = $_GET['keyword'];
          $search_term = trim($search_term);
          $sql = "SELECT userfiles.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, file, time,date from userfiles inner join users on userfiles.id_user = users.id WHERE academicyear='$vitiakademik' and file LIKE '%$search_term%' ORDER BY id $orderby";
          $results = mysqli_query($db, $sql);
          $count = mysqli_num_rows($results);
          echo "<div class='search-term-display'>Rezultatet e kerkimit per: ". $search_term. " | ".$count. " rezultate". "</div>";
          echo '<div class = "sort_in_results">';
            echo ' <select name="order" onchange="location = this.value;">
              <option value="#" >Zgjedh renditjen</option>';
              if(isset($_GET['keyword'])){
              $keyword = $_GET['keyword'];
              echo "<option value='files.php?keyword=".$keyword."&orderby=desc'>Postimet e reja</option>";
              echo "<option value='files.php?keyword=".$keyword."&orderby=asc'>Postimet e vjetra</option>";
              }
              echo '
            </select>';
          echo '</div>';
          echo'<div class="dropdown-divider"></div>';
          // if((preg_match('/^\s+$/', $search_term)) == 1){
          //header("Location:group.php");
          //}
          if (ltrim($search_term, ' ') === '') {
          header("Location:files.php");
          }
          if($count == 0) {
          echo '<br>';
          echo '<style>#rezultatet { display:none;}</style>';
          echo '<div class = "rezultatet-error">';
            echo '<img src = "img/1f914.png" style = "width:40px"/>';
            echo '<br>';
            echo "Asnje postim i gjetur";
          echo '</div>';
          }
          else if(empty($search_term)){
          header("Location:files.php");
          }
          
          else{
          echo '<div class= "entire-download-container">';
            while(($row = $results->fetch_assoc()) !== null){
            echo '<div class = "download-container">';
              echo '<div class = "download-name" title = "'.$row['file'] .' " data-toggle="modal" data-target="#modal_'.$row['id'].'">';
                if (strlen($row['file']) > 46){
                
                $file_name = $row['file'];
                $file_name = substr($file_name, 0, 44);
                $file_name = $file_name . " ...";
                echo $file_name;
                }
                else {
                echo $row['file'];
                }
              echo "</div>";
              if (strpos($row['file'],'.jpg') !== false || strpos($row['file'],'.JPG') !== false || strpos($row['file'],'.JPEG') !== false || strpos($row['file'],'.jpeg') !== false || strpos($row['file'],'.png') !== false || strpos($row['file'],'.PNG') !== false ) {
              echo '<img src = "user-files-logos/576bf2589ce70.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.docx') !== false){
              echo '<img src = "user-files-logos/word.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.pdf') !== false){
              echo '<img src = "user-files-logos/pdf.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.pptx') !== false){
              echo '<img src = "user-files-logos/powerpoint.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.apk') !== false){
              echo '<img src = "user-files-logos/apk.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.xlsx') !== false){
              echo '<img src = "user-files-logos/excel.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.txt') !== false){
              echo '<img src = "user-files-logos/txt.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.html') !== false){
              echo '<img src = "user-files-logos/html.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.php') !== false){
              echo '<img src = "user-files-logos/php.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.ipa') !== false){
              echo '<img src = "user-files-logos/ipa.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.py') !== false){
              echo '<img src = "user-files-logos/py.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.css') !== false){
              echo '<img src = "user-files-logos/css.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.gif') !== false){
              echo '<img src = "user-files-logos/gif.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.rar') !== false){
              echo '<img src = "user-files-logos/rar.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.zip') !== false){
              echo '<img src = "user-files-logos/zip.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.mp3') !== false){
              echo '<img src = "https://image.flaticon.com/icons/svg/148/148724.svg" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.mp4') !== false){
              echo '<img src = "user-files-logos/mp4.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.to') !== false){
              echo '<img src = "user-files-logos/UTorrent_(logo).png" class = "download-photo"/>';
              }
              else {
              echo '<img src = "https://image.flaticon.com/icons/svg/148/148947.svg?fbclid=IwAR1qMT-iyh6nQNlIyVNu4VaFEiLQoRa4FUZD5iv8xM5ZjL3h_nYbFTi-y_k" class = "download-photo"/>';
              }
              
              echo "<div class = 'download-content'>";
                echo '<div class = "date-time">';
                  echo $row['date'];
                echo '</div>';
                
                
                echo '<button type="button" title = "Info" class="btn btn-light" data-toggle="modal" data-target="#modal_'.$row['id'].'" style = "display:inline-block">
                <img src= "user-files-logos/more.png" style = "width:20px;"/>
                </button>';
                
              echo '</div>';
              
            echo '</div>';
            //Modal Fade
            echo '<div class="modal fade" id="modal_'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
              echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                echo '<div class="modal-content">';
                  echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="exampleModalCenterTitle">Rreth Dokumentit</h5>';
                    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                  echo '</div>';
                  echo '<div class="modal-body">';
                    echo 'Emri i dokumentit: ' . $row['file'];
                    echo '<br>';
                    echo 'Ngarkuesi: ' . $row['Name']. " " . $row['Surname'];
                    echo '<br>';
                    echo 'Data: ' . $row['date'];
                    echo '<br>';
                    echo 'Ora: ' . $row['time'];
                  echo '</div>';
                  
                  echo '<div class="modal-footer">';
                    echo '<form action="#" method="post" id = "download-form">';
                      echo ' <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbyll </button>';
                      if (strpos($row['file'],'.jpg') !== false || strpos($row['file'],'.JPG') !== false || strpos($row['file'],'.JPEG') !== false || strpos($row['file'],'.jpeg') !== false || strpos($row['file'],'.png') !== false || strpos($row['file'],'.PNG') !== false || strpos($row['file'],'.pdf') !== false || strpos($row['file'],'.txt') !== false || strpos($row['file'],'.mp3') !== false || strpos($row['file'],'.mp4') !== false ) {
                      if (strpos($row['file'],'.mp3') !== false || strpos($row['file'],'.mp4') !== false){
                      echo '<a href="user-files/'.$row['file'].'" target="_blank" class="btn btn-warning" title="Luaje pa e shkarkuar" id = "view-button">Luaje</a>';
                      }
                      else{
                      echo '<a href="user-files/'.$row['file'].'" target="_blank" class="btn btn-warning" title="Shiko pa e shkarkuar" id = "view-button">Shiko</a>';
                      }
                      
                      }
                      echo '<a class="btn btn-light" id = "download" role="button" href="user-files/'.$row['file'].'"
                        download>
                        Shkarko
                      </a>';
                      
                      if (($_SESSION['username']) == $row['username']){
                      echo '<button type="submit" name="delete-file" class="btn btn-danger" id = "delete-button" value="'. $row['id'].'">Fshij</button>';
                      
                      }
                    echo '</form>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            //
            if (isset($_POST['delete-file'])){
            $value = $_POST['delete-file'];
            $query100 = "SELECT users.username from userfiles inner join users on userfiles.id_user = users.id WHERE userfiles.id ='$value'";
            $results100 = mysqli_query($db, $query100);
            while(($row100 = $results100->fetch_assoc()) !== null){
            
            
            
            if ($_SESSION['username'] == $row100['username']){
            header('Location:files.php?remove-file='. $value);
            }
            else {
            header('Location:files.php');
            }}
            }
            } // End of while
          echo'</div>';
          echo "<br><br>";
          echo '<div class = "rezultatet" id="rezultatet">';
            echo "Fundi i rezultateve";
          echo '</div>';
          }//End of else
          }//End of keyword
          //Shfaqja e postimeve pa search
          else{
          echo '<div class= "entire-download-container">';
            while(($row = $results->fetch_assoc()) !== null){
            
            echo '<div class = "download-container">';
              echo '<div class = "download-name" title = "'.$row['file'] .' " data-toggle="modal" data-target="#modal_'.$row['id'].'">';
                if (strlen($row['file']) > 46){
                
                $file_name = $row['file'];
                $file_name = substr($file_name, 0, 44);
                $file_name = $file_name . " ...";
                echo $file_name;
                }
                else {
                echo $row['file'];
                }
              echo "</div>";
              if (strpos($row['file'],'.jpg') !== false || strpos($row['file'],'.JPG') !== false || strpos($row['file'],'.JPEG') !== false || strpos($row['file'],'.jpeg') !== false || strpos($row['file'],'.png') !== false || strpos($row['file'],'.PNG') !== false ) {
              echo '<img src = "user-files-logos/576bf2589ce70.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.docx') !== false){
              echo '<img src = "user-files-logos/word.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.pdf') !== false){
              echo '<img src = "user-files-logos/pdf.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.pptx') !== false){
              echo '<img src = "user-files-logos/powerpoint.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.apk') !== false){
              echo '<img src = "user-files-logos/apk.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.xlsx') !== false){
              echo '<img src = "user-files-logos/excel.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.txt') !== false){
              echo '<img src = "user-files-logos/txt.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.html') !== false){
              echo '<img src = "user-files-logos/html.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.php') !== false){
              echo '<img src = "user-files-logos/php.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.ipa') !== false){
              echo '<img src = "user-files-logos/ipa.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.py') !== false){
              echo '<img src = "user-files-logos/py.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.css') !== false){
              echo '<img src = "user-files-logos/css.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.gif') !== false){
              echo '<img src = "user-files-logos/gif.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.rar') !== false){
              echo '<img src = "user-files-logos/rar.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.zip') !== false){
              echo '<img src = "user-files-logos/zip.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.mp3') !== false){
              echo '<img src = "https://image.flaticon.com/icons/svg/148/148724.svg" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.mp4') !== false){
              echo '<img src = "user-files-logos/mp4.png" class = "download-photo"/>';
              }
              else if (strpos($row['file'],'.to') !== false){
              echo '<img src = "user-files-logos/UTorrent_(logo).png" class = "download-photo"/>';
              }
              else {
              echo '<img src = "https://image.flaticon.com/icons/svg/148/148947.svg?fbclid=IwAR1qMT-iyh6nQNlIyVNu4VaFEiLQoRa4FUZD5iv8xM5ZjL3h_nYbFTi-y_k" class = "download-photo"/>';
              }
              
              echo "<div class = 'download-content'>";
                echo '<div class = "date-time">';
                  echo $row['date'];
                echo '</div>';
                
                
                echo '<button type="button" title = "Info" class="btn btn-light" data-toggle="modal" data-target="#modal_'.$row['id'].'" style = "display:inline-block">
                <img src= "user-files-logos/more.png" style = "width:20px;"/>
                </button>';
                
              echo '</div>';
              
            echo '</div>';
            //Modal Fade
            echo '<div class="modal fade" id="modal_'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
              echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                echo '<div class="modal-content">';
                  echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="exampleModalCenterTitle">Rreth Dokumentit</h5>';
                    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                  echo '</div>';
                  echo '<div class="modal-body">';
                    echo 'Emri i dokumentit: ' . $row['file'];
                    echo '<br>';
                    echo 'Ngarkuesi: ' . $row['Name']. " " . $row['Surname'];
                    echo '<br>';
                    echo 'Data: ' . $row['date'];
                    echo '<br>';
                    echo 'Ora: ' . $row['time'];
                  echo '</div>';
                  
                  echo '<div class="modal-footer">';
                    echo '<form action="#" method="post" id = "download-form">';
                      echo ' <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbyll </button>';
                      if (strpos($row['file'],'.jpg') !== false || strpos($row['file'],'.JPG') !== false || strpos($row['file'],'.JPEG') !== false || strpos($row['file'],'.jpeg') !== false || strpos($row['file'],'.png') !== false || strpos($row['file'],'.PNG') !== false || strpos($row['file'],'.pdf') !== false || strpos($row['file'],'.txt') !== false || strpos($row['file'],'.mp3') !== false || strpos($row['file'],'.mp4') !== false ) {
                      if (strpos($row['file'],'.mp3') !== false || strpos($row['file'],'.mp4') !== false){
                      echo '<a href="user-files/'.$row['file'].'" target="_blank" class="btn btn-warning" title="Luaje pa e shkarkuar" id = "view-button">Luaje</a>';
                      }
                      else{
                      echo '<a href="user-files/'.$row['file'].'" target="_blank" class="btn btn-warning" title="Shiko pa e shkarkuar" id = "view-button">Shiko</a>';
                      }
                      
                      }
                      echo '<a class="btn btn-light" id = "download" role="button" href="user-files/'.$row['file'].'"
                        download>
                        Shkarko
                      </a>';
                      
                      if (($_SESSION['username']) == $row['username']){
                      echo '<button type="submit" name="delete-file" class="btn btn-danger" id = "delete-button" value="'. $row['id'].'">Fshij</button>';
                      
                      }
                    echo '</form>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            //
            if (isset($_POST['delete-file'])){
            $value = $_POST['delete-file'];
            $query100 = "SELECT users.username from userfiles inner join users on userfiles.id_user = users.id WHERE userfiles.id ='$value'";
            $results100 = mysqli_query($db, $query100);
            while(($row100 = $results100->fetch_assoc()) !== null){
            
            
            
            if ($_SESSION['username'] == $row100['username']){
            header('Location:files.php?remove-file='. $value);
            }
            else {
            header('Location:files.php');
            }}
            }
            
            } // End of while
          echo '</div>';
          
          }//End of else
          ?>
          <!--
          <div class = "download-container">
            <div class = "download-name">
              dokumenti dokumenti dokumenti dokumenti
            </div>
            <img src = "https://icdn8.digitaltrends.com/image/jupiters-colourful-palette-1280x1280.jpg" class = "download-photo"/>
            <div class = "download-content">
              <div class = "date-time"> 12/08/2019</div>
              <div class = "view-download">
                <a target="_blank" href="https://icdn8.digitaltrends.com/image/jupiters-colourful-palette-1280x1280.jpg" title = "Shiko kete foto"><img src= "https://image.flaticon.com/icons/svg/1666/1666578.svg?fbclid=IwAR0okj2yL_ZMrTHyXcZJhI-ov8YlcxqasJlamnJSJAwMIG7atHAjb4J7RQo"/></a>
                <img src="https://image.flaticon.com/icons/svg/130/130991.svg?fbclid=IwAR2PhKG3auj9zFLAM7HkFK93cwIkr6qJE_MVcRsEKnYttlgIO1IADL7tdiM">
              </div>
            </div>
          </div>
          -->
          <?php
          //Shiko se a eshte jashte kerkimit...
          if (!isset($_GET['keyword'])){
          ?>
          <br>
          <br><br>
          <!-- Numri i faqeve -->
          <div class = "pagination-wrapper">
            <nav aria-label="..." class="pagination">
              <ul class="pagination pagination-md justify-content-center" style=" margin: 0 auto !important;">
                
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
                                      </ul>
                                    </nav>
                                  </div>
                                  <br><br>
                                  <!-- Perfundimi i numrit te faqeve -->
                                </div>
                                <?php
                                //Mbarimi i Shiko se a eshte jashte kerkimit...
                                }?>
                                <script type="text/javascript">
                                var cw = $('.download-photo').width();
                                $('.download-photo').css({
                                'height': cw + 'px'
                                });
                                </script>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                $("#btnFiles").click(function() {
                                $(this).html(
                                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Duke ngarkuar...`
                                );
                                //$('#loading').show();
                                });
                                });
                                </script>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                $("#btnFiles1").click(function() {
                                $('#loading').show();
                                $('#btnFiles1').hide();
                                });
                                });
                                </script>
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
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Studentet</h5>
                                        <form action="#" method="post" style="height:10px;">
                                          <!-- Button trigger modal -->
                                          <button type="submit" class="btn btn-light" id="reset_online" name="reset_online" title="Rifresko" >
                                          <img src= "img/reset-icon.png" style = "width:30px; margin-top: -6px; margin-left: 5px;"/>
                                          </button>
                                        </form>
                                        <?php
                                        if (isset($_POST['reset_online'])){
                                        $sql = "UPDATE users set online=0";
                                        mysqli_query($db,$sql);
                                        header("Location:files.php");
                                        }
                                        ?>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <span style = "color:green; font-size:20px" >Online</span>
                                        <br><br>
                                        <!-- ONLINE -->
                                        <ul class="list-unstyled">
                                          <?php
                                          $vitiakademik = $_SESSION['vitiakademik'];
                                          $query = "SELECT * FROM users WHERE online='1' and academicyear = $vitiakademik ORDER by Name asc";
                                          $results = mysqli_query($db, $query);
                                          while(($row = $results->fetch_assoc()) !== null){
                                          echo '
                                          <li class="media">
                                            <img class="mr-3" src="user-photos/'.$row['userphotos'].'" style = "width:50px; height:50px" alt="'.$row['Name']." ".$row['Surname'].'">
                                            <div class="media-body">';
                                              echo '<h5 class="mt-0 mb-1">'.$row['Name']." ".$row['Surname'].'';
                                              $username = $row['username'];
                                              $sql = "SELECT * from admins where username='$username'";
                                              $results1 = mysqli_query($db, $sql);
                                              if (mysqli_num_rows($results1)==1){
                                              echo '<img src = "img/verify-icon.png" title="Administrator" alt="Administrator" class="administrator-icon" style = "width:20px; margin-bottom:1px"/>';
                                              }
                                              echo' </h5>';
                                              
                                              if (mysqli_num_rows($results1)==1){
                                              echo 'Administrator';
                                              }
                                              
                                              else{
                                              echo 'Student';
                                              }
                                              
                                              echo'
                                            </div>
                                          </li>
                                          <br>';
                                          }
                                          ?>
                                        </ul>
                                        <!-- END OF ONLINE -->
                                        <!-- OFFLINE -->
                                        <span style = "color:grey; font-size:20px" >Offline</span>
                                        <br><br>
                                        
                                        <ul class="list-unstyled">
                                          <?php
                                          $vitiakademik = $_SESSION['vitiakademik'];
                                          $query = "SELECT * FROM users WHERE online='0' and academicyear = $vitiakademik ORDER by Name asc";
                                          $results = mysqli_query($db, $query);
                                          while(($row = $results->fetch_assoc()) !== null){
                                          echo '
                                          <li class="media">
                                            <img class="mr-3" src="user-photos/'.$row['userphotos'].'" style = "width:50px; height:50px" alt="'.$row['Name']." ".$row['Surname'].'">
                                            <div class="media-body">';
                                              echo '<h5 class="mt-0 mb-1">'.$row['Name']." ".$row['Surname'].'';
                                              $username = $row['username'];
                                              $sql = "SELECT * from admins where username='$username'";
                                              $results1 = mysqli_query($db, $sql);
                                              if (mysqli_num_rows($results1)==1){
                                              echo '<img src = "img/verify-icon.png" title="Administrator" alt="Administrator" class="administrator-icon" style = "width:20px; margin-bottom:1px;"/>';
                                              }
                                              echo' </h5>';
                                              
                                              if (mysqli_num_rows($results1)==1){
                                              echo 'Administrator';
                                              }
                                              
                                              else{
                                              echo 'Student';
                                              }
                                              
                                              echo'
                                            </div>
                                          </li>
                                          <br>';
                                          }
                                          ?>
                                        </ul>
                                        <!-- END OF OFFLINE -->
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbyll</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </body>
                            </html>