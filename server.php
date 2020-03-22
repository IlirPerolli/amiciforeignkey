<?php 
	ob_start();
	session_start();
	// variable declaration

	$username = "";
	$email    = "";
	$errors = array();
	$success = array(); 
	$_SESSION['success'] = "";

	// lidhu me databaze
include("config.php");
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$privatekey = "6LcyX4QUAAAAAAbcsSA0IgoUdRVJy0_T0QWIRJ_H";

		$response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
		
		$data = json_decode($response);

		// merr te dhenat nga forma
		$emri = mysqli_real_escape_string($db, $_POST['emri']);
		$mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
		$mosha = mysqli_real_escape_string($db, $_POST['mosha']);
		$viti = mysqli_real_escape_string($db, $_POST['viti']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$usermale = "defaultmale.png";
		$userfemale = "defaultfemale.png";
		date_default_timezone_set("Europe/Tirane");
		$date = date("d/m/Y");
		

		// validimi i formes: sigurohu qe forma eshte plotesuar korrektesisht
		if (empty($emri)) { array_push($errors, "Ju lutem plotesoni emrin"); }
		if (strlen($emri) > 50){array_push($errors, "Ju lutem shenoni me pak se 50 karaktere tek emri"); }
		if (preg_match('~[0-9]+~', $emri)) {array_push($errors, "Emri nuk duhet te permbaje numra"); }
		if (strpos($emri,'>') !== false){array_push($errors, "Emri nuk mund te permbaje '>'"); }
		if (strpos($emri,'&') !== false){array_push($errors, "Emri nuk mund te permbaje '&'"); }
		if (strpos($emri,'=') !== false){array_push($errors, "Emri nuk mund te permbaje '='"); }
		if (strpos($emri,"'") !== false){array_push($errors, "Emri nuk mund te permbaje '"); }
		if (strpos($emri,'`') !== false){array_push($errors, "Emri nuk mund te permbaje '`'"); }
		if (empty($mbiemri)) { array_push($errors, "Ju lutem plotesoni mbiemrin"); }
		if (strlen($mbiemri) > 50){array_push($errors, "Ju lutem shenoni me pak se 50 karaktere tek mbiemri"); }
		if (preg_match('~[0-9]+~', $mbiemri)) {array_push($errors, "Mbiemri nuk duhet te permbaje numra"); }
		if (strpos($mbiemri,'>') !== false){array_push($errors, "Mbiemri nuk mund te permbaje '>'"); }
		if (strpos($mbiemri,'&') !== false){array_push($errors, "Mbiemri nuk mund te permbaje '&'"); }
		if (strpos($mbiemri,'=') !== false){array_push($errors, "Mbiemri nuk mund te permbaje '='"); }
		if (strpos($mbiemri,"'") !== false){array_push($errors, "Mbiemri nuk mund te permbaje '"); }
		if (strpos($mbiemri,'`') !== false){array_push($errors, "Mbiemri nuk mund te permbaje '`'"); }
		if (empty($mosha)) { array_push($errors, "Ju lutem zgjedhni daten e lindjes"); }
		if (($gender) == -1){array_push($errors, "Ju lutem zgjedhni gjinine"); }
		if (($viti) == -1) { array_push($errors, "Ju lutem zgjedhni vitin akademik"); }
		if (empty($email)) { array_push($errors, "Ju lutem plotesoni emailin"); }
		if (strlen($email) > 255){array_push($errors, "Ju lutem shenoni me pak se 255 karaktere tek emaili"); }
		if (empty($username)) { array_push($errors, "Ju lutem plotesoni perdoruesin"); }
		if (strlen($username) > 255){ array_push($errors, "Ju lutem shenoni me pak se 255 karaktere tek perdoruesi"); }
		if (preg_match('/\s/',$username)) { array_push($errors, "Username permban hapesire");}
		if (empty($password_1)) { array_push($errors, "Ju lutem plotesoni fjalekalimin"); }
	    if (strlen($password_1) < 8){array_push($errors, "Ju lutem shenoni me shume se 8 karaktere te fjalekalimit"); }
		if (strlen($password_1) > 255){array_push($errors, "Ju lutem shenoni me pak se 255 karaktere tek fjalekalimi"); }
		if (strpos($username,'>') !== false){array_push($errors, "Username nuk mund te permbaje '>'"); }
		if (strpos($username,'&') !== false){array_push($errors, "Username nuk mund te permbaje '&'"); }
		if (strpos($username,'=') !== false){array_push($errors, "Username nuk mund te permbaje '='"); }
		if (strpos($username,"'") !== false){array_push($errors, "Username nuk mund te permbaje '"); }
		if (strpos($username,'`') !== false){array_push($errors, "Username nuk mund te permbaje '`'"); }
		if ($password_1 != $password_2) {
			array_push($errors, "Fjalekalimet nuk pershtaten");
		}
			$querycheck = "SELECT * FROM users WHERE username='$username'";
			$results1 = mysqli_query($db, $querycheck);

			if (mysqli_num_rows($results1) >= 1) {
				array_push($errors, "Ky perdorues ekziston");
		}
			$querycheck1 = "SELECT * FROM users WHERE email='$email'";
			$results2 = mysqli_query($db, $querycheck1);

			if (mysqli_num_rows($results2) >= 1) {
				array_push($errors, "Ky email shfrytezohet nga nje perdorues tjeter");
		}
			// regjistro perdoruesin nese nuk ka ndonje error ne forme
			if (count($errors) == 0) {
				if (isset($data->success) AND $data->success==true){ 
			
		
		//$password = md5($password_1);//enkripto passwordin para se te regjistrosh ne databaze
			$password = password_hash($password_1, PASSWORD_DEFAULT);
			
			//konverto usernamin ne shkonja te vogla
			$username = strtolower($username);
			$emri = strtolower($emri);
			$emri = ucfirst($emri);
			$mbiemri = strtolower($mbiemri);
			$mbiemri = ucfirst($mbiemri);
			$email = strtolower($email);
			
			if ($gender == 0){

			$query = "INSERT INTO users (username, email, password, Name, Surname, age, academicyear, gender, userphotos, joined) 
					  VALUES('$username', '$email', '$password', '$emri','$mbiemri' ,'$mosha', '$viti', '$gender', '$userfemale', '$date')";
			mysqli_query($db, $query);
		}
		else if ($gender == 1){
				$query = "INSERT INTO users (username, email, password, Name, Surname, age, academicyear, gender, userphotos, joined) 
					  VALUES('$username', '$email', '$password', '$emri', '$mbiemri', '$mosha', '$viti', '$gender', '$usermale', '$date')";
			mysqli_query($db, $query);


		}
			$_SESSION['emri'] = $emri;
			$_SESSION['mbiemri'] = $mbiemri;
			$_SESSION['email'] = $email;
			$_SESSION['viti']=$viti;
			$_SESSION['username'] = $username;
			$_SESSION['mosha'] = $mosha;
			$_SESSION['hapja'] = true;
			/*include("mail.php");
			$name = $emri." ".$mbiemri;
			unapproved_account_mail($email, $name,$viti,$username);	*/
			header('location: success.php');
		}
		else {
		array_push($errors, "Ju lutem konfirmoni që nuk jeni 'robot' ");
	}

	}
	else {
		array_push($errors, "Ju lutem konfirmoni që nuk jeni 'robot' ");
	}
	
	
	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		
		
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);


		if (empty($username)) {
			array_push($errors, "Ju lutem shenoni perdoruesin");
		}
		if (empty($password)) {
			array_push($errors, "Ju lutem shkruani fjalekalimin");
		}
		if (strlen($password) < 8){array_push($errors, "Ju lutem shenoni me shume se 8 karaktere"); }
		
		$querycheck1 = "SELECT * FROM users WHERE username='$username'";
			$results2 = mysqli_query($db, $querycheck1);

			if (mysqli_num_rows($results2) == 0) {
				array_push($errors, "Ky perdorues nuk ekziston");
		}

		if (count($errors) == 0) {

			// ************************** Me mbaj mend ************************** //
		/*		if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }*/
	// ************************** Mbarimi i me mbaj mend ************************** //			
			$query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);
					$row = $results->fetch_assoc();	

					$password = password_verify($password, $row['password']);
			if ($password == 1 && $row['verification'] == 1 ) {
				//htmlspecialchars per tu siguruar qe perdoruesi nuk ka shkruar kode html dhe te ekzekutohen
				$_SESSION['loading'] = true;
				$_SESSION['loggedIn'] = true;
			    $_SESSION['vitiakademik'] = htmlspecialchars($row["academicyear"]);
			    $_SESSION['emri'] = htmlspecialchars($row["Name"]);
			    $_SESSION['mbiemri'] = htmlspecialchars($row['Surname']);
 			    $_SESSION['username'] = htmlspecialchars($row['username']);
			    $_SESSION['emri'] = strtoupper($_SESSION['emri']);
			    $_SESSION['mbiemri'] = strtoupper($_SESSION['mbiemri']);
			    $_SESSION['photo'] = $row["userphotos"];
			    $_SESSION['email'] = htmlspecialchars($row["email"]);
			    $_SESSION['password'] = $row['password'];
			    //Mos lejo te shihen komentet nga te tjeret ne posts_controller.php
			    $_SESSION['authenticated'] = false;
			    // setcookie ("loggedin",true,time()+ (10 * 365 * 24 * 60 * 60));  
				header('Location: loading.php');
				exit();
			}
		
			else if ($password == 1 && $row['verification'] == 0){
				array_push($errors, "Llogaria eshte ne verifikim!");
			}
			else if ($password == 1 && $row['verification'] == 2){
				array_push($errors, "Kerkojme falje, perkohesisht llogaria juaj eshte suspenduar :(");
			}
			else {
				array_push($errors, "Keni shënuar fjalëkalimin gabim!");
			}

			}
			}


	// UPDATE COLUMNS IN DATABASE
	if (isset($_POST['preferences'])) {
		$emri = mysqli_real_escape_string($db, $_POST['emri']);
		$mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$emri1 = $_SESSION['emri'];
		$username1 = $_SESSION['username'];	
		$query1 = "SELECT * FROM users WHERE username='$username1'";

$results1 = mysqli_query($db, $query1);
					$row = $results1->fetch_assoc();	
					$password = password_verify($_POST['password_1'], $row['password']);
		
		$emri = strtolower($emri);
		$emri = ucfirst($emri);
		$mbiemri = strtolower($mbiemri);
		$mbiemri = ucfirst($mbiemri);
	
	


		if (empty($emri)) { array_push($errors, "Ju lutem plotesoni emrin"); }
		if (strlen($emri) > 50){array_push($errors, "Ju lutem shenoni me pak se 50 karaktere tek emri"); }
		if (preg_match('~[0-9]+~', $emri)) {array_push($errors, "Emri nuk duhet te permbaje numra"); }
		if (empty($mbiemri)) { array_push($errors, "Ju lutem plotesoni mbiemrin"); }
		if (strlen($mbiemri) > 50){array_push($errors, "Ju lutem shenoni me pak se 50 karaktere tek mbiemri"); }
		if (preg_match('~[0-9]+~', $mbiemri)) {array_push($errors, "Mbiemri nuk duhet te permbaje numra"); }
		if (empty($age)) { array_push($errors, "Ju lutem zgjedhni daten e lindjes"); }
		if (empty($email)) { array_push($errors, "Ju lutem plotesoni emailin"); }
		if (strlen($email) > 255){array_push($errors, "Ju lutem shenoni me pak se 255 karaktere tek emaili"); }
		
		$emailcheck = "SELECT * FROM users WHERE email='$email' and username != '$username1'";
			$results_email_check = mysqli_query($db, $emailcheck);

			if (mysqli_num_rows($results_email_check) >= 1) {
				array_push($errors, "Ky email shfrytezohet nga nje perdorues tjeter");
		}
		if ($password != 1){
			array_push($errors, "Keni shënuar Fjalekalimin e tanishem gabim!");
			echo '<style>#fjalekalimi { color:#FA3B4B;}</style>';
		}

		if (count($errors) == 0) {
			$password = password_verify($_POST['password_1'], $row['password']);
		
			
		$sql = "UPDATE users SET Name='$emri', Surname='$mbiemri', age='$age', email='$email' WHERE username='$username1'";
		
			mysqli_query($db, $sql);

			
			header('Location: logout.php');
		}
		
		

	}

	// CHANGE PASSWORD IN DATABASE
	if (isset($_POST['update_password'])) {
		
		$username1 = $_SESSION['username'];	

		$query1 = "SELECT * FROM users WHERE username='$username1'";

$results1 = mysqli_query($db, $query1);
					$row = $results1->fetch_assoc();	
					$password = password_verify($_POST['password_1'], $row['password']);

					if ($password != 1){
			array_push($errors, "Keni shënuar Fjalekalimin e vjeter gabim!");
		}

		if (strlen($_POST['password']) <8 && strlen($_POST['password'])!=0 ){
	array_push($errors, "Ju lutem shenoni 8 e me shume karaktere te fjalekalimit!");
}
if (strlen($_POST['password']) >255 ){
	array_push($errors, "Ju lutem shenoni me pak se 255 karaktere tek fjalekalimi i ri!");
}
	if (($_POST['password']) != ($_POST['password_2'])) {
			array_push($errors, "Fjalekalimet nuk pershtaten");
		}

		if (count($errors) == 0) {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "UPDATE users SET password='$password' WHERE username='$username1'";
		
			mysqli_query($db, $sql);
			
			header('Location: logout.php');
			die();
		}
	}

	// Fshij Llogarine
	if (isset($_POST['deleteacc'])) {
		$username = $_SESSION['username'];
		$emri1 = $_SESSION['emri'];
		$query1 = "SELECT * FROM users WHERE username='$username'";
		$results1 = mysqli_query($db, $query1);
					$row = $results1->fetch_assoc();
					$password = password_verify($_POST['password_1'], $row['password']);	
					if ($password != 1){
			array_push($errors, "Keni shënuar Fjalekalimin e tanishem gabim!");
		}
		if (strlen($_POST['password_1']) <8){
			array_push($errors, "Ju lutem shenoni 8 e me shume karaktere te fjalekalimit!");
		}
		if (count($errors) == 0) {
			$id_user = $row['id'];
		$sql3 = "SELECT * FROM userfiles WHERE id_user= '$id_user'";
		$results = mysqli_query($db, $sql3);
        while(($row = $results->fetch_assoc()) !== null){
        	$file = $row['file'];
          $myFile = "user-files/$file";
unlink($myFile); 
        }
        $sql4 = "SELECT * FROM users WHERE username = '$username'";
		$results = mysqli_query($db, $sql4);
        $row = $results1->fetch_assoc();
       	$photo = $row['userphotos'];
        //Fshij Foton
        if (($photo != "defaultfemale.png") && ($photo != "defaultmale.png")) {
     $phototobedeleted = "user-photos/$photo";
    unlink($phototobedeleted); 
}		
//Fshij filet e ketij folderi nga anetaret e tjere
        $sql8 = "SELECT * FROM folders WHERE id_user = '$id_user'";
		$results = mysqli_query($db, $sql8);
        while(($row = $results->fetch_assoc()) !== null){
        	$id_folder = $row['id'];
        	$sql = "DELETE FROM folder_uploads WHERE id_folder = '$id_folder'";
		mysqli_query($db, $sql);
        }
        //
        //Fshij filet e ketij folderi per usernamin
        $sql7 = "DELETE FROM folder_uploads WHERE id_user = '$id_user'";
		mysqli_query($db, $sql7);
		//Fshij folderin
		$sql6 = "DELETE FROM folders WHERE id_user = '$id_user'";
		mysqli_query($db, $sql6);
		   //Fshij perdoruesin, postimet dhe filet dhe folderat
        //Fshij perdoruesin, postimet dhe filet

		//Fshij Replyat
		 $sql5 = "SELECT * FROM userposts WHERE id_user= '$id_user'";
    $results = mysqli_query($db, $sql5);
        while(($row = $results->fetch_assoc()) !== null){
          $id = $row['id'];
          $sql = "DELETE from userposts where replyingto='$id'";
      mysqli_query($db, $sql);
        }
        //Fshij fotot e ngarkuara ne grup
          $sql9 = "SELECT * FROM userposts WHERE id_user = '$id_user'";
    $results = mysqli_query($db, $sql9);
        while(($row = $results->fetch_assoc()) !== null){
              $file = $row['uploadedphoto'];
          	  $myFile = "userpostsUploads/$file";
			  unlink($myFile); 
    
      	  
        }

       
		$sql1 = "DELETE FROM userposts WHERE id_user= '$id_user'";
		mysqli_query($db, $sql1);

		$sql2 = "DELETE FROM userfiles WHERE id_user= '$id_user'";
		mysqli_query($db, $sql2);



		$sql = "DELETE FROM users WHERE username = '$username'";
		mysqli_query($db, $sql);

		
			header('Location: logout.php');
			die();
}
	}

// Bisedo
if (isset($_POST['user-discuss'])) {
	
	
	$username = $_SESSION['username'];
	$biseda = mysqli_real_escape_string($db, $_POST['diskuto']);
	 if(preg_match('/^\s+$/', $biseda) == 1){
array_push($errors, "Komenti permban hapesira!");
}
if (strpos($biseda, ' ') === 0) { //Nese fillon me hapesire (Alt 255)
    array_push($errors, "Komenti permban hapesira!");
}
/*
if (strpos($biseda,'qija') !== false || strpos($biseda,'nonen') !== false || strpos($biseda,'kar') !== false || strpos($biseda,'mut') !== false || strpos($biseda,'pis') !== false || strpos($biseda,'qi') !== false || strpos($biseda,'q*') !== false || strpos($biseda,'m*t') !== false || strpos($biseda,'nanen') !== false ) {
  array_push($errors, "Pse bre pe shan!");
}*/



$query1 = "SELECT * FROM users WHERE username='$username'";
		$results1 = mysqli_query($db, $query1);
					$row = $results1->fetch_assoc();
					date_default_timezone_set("Europe/Tirane");
		$date = date("d/m/Y");
		$time = date("H:i");
		 $id_user = $row['id'];
		$vitiakademik = $_SESSION['vitiakademik'];
		if (strlen($biseda) > 255){
			array_push($errors, "Ju lutem shenoni me pak se 255 karaktere!");
		}
		$target_dir = "userpostsUploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if (file_exists($target_file)) {
array_push($errors, "Ekziston nje foto tjeter me emer te njejte");

}
if ($_FILES["fileToUpload"]["size"] > 8000000) { //8MB
    array_push($errors, "Kjo foto eshte e madhe");
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    array_push($errors, "Gabim. Vetem filet jpg, png dhe jpeg lejohen");
}
if (strpos($target_file,'Snapchat') !== false) {
	 $target_file=  $target_dir ."amici_".$_SESSION['username'] . "_" . generateRandomString() ."." . $imageFileType;


}
else if (strpos($target_file,'snapchat') !== false) {

    $target_file=  $target_dir ."amici_".$_SESSION['username'] . "_" . generateRandomString() ."." . $imageFileType;

}
if ($_FILES["fileToUpload"]["size"] == 0) { //8MB

	array_splice($errors, 0); //Hiq elementet nga pozita 0
		 if(preg_match('/^\s+$/', $biseda) == 1){
array_push($errors, "Komenti permban hapesira!");
}
if (strpos($biseda, ' ') === 0) { //Nese fillon me hapesire (Alt 255)
    array_push($errors, "Komenti permban hapesira!");
}
/*
if (strpos($biseda,'qija') !== false || strpos($biseda,'nonen') !== false || strpos($biseda,'kar') !== false || strpos($biseda,'mut') !== false || strpos($biseda,'pis') !== false || strpos($biseda,'qi') !== false || strpos($biseda,'q*') !== false || strpos($biseda,'m*t') !== false || strpos($biseda,'nanen') !== false ) {
  array_push($errors, "Pse bre pe shan!");
}*/
		if (count($errors) == 0) {
				
			$query = "INSERT INTO userposts (Comments,date, time, id_user) 
            VALUES('$biseda', '$date', '$time', '$id_user')";
			mysqli_query($db, $query);


			$query1= "UPDATE users SET notification = notification + 1 WHERE academicyear = '$vitiakademik'";
			mysqli_query($db, $query1);
			header('Location: #');
		}

}


		else{
			if (count($errors) == 0) {
				 compressImage($_FILES['fileToUpload']['tmp_name'],$target_file,60);

$target_file1 = explode("userpostsUploads/", $target_file);

$target_file1 = $target_file1[1];
			$query = "INSERT INTO userposts (Comments,date, time, id_user,uploadedphoto) 
            VALUES('$biseda', '$date', '$time', '$id_user', '$target_file1')";
			mysqli_query($db, $query);


			$query1= "UPDATE users SET notification = notification + 1 WHERE academicyear = '$vitiakademik'";
			mysqli_query($db, $query1);
			header('Location: #');
		}
		}
	
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}

if (isset($_POST['submit_email'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $sql = "SELECT * from users where email='$email'";
  $results = mysqli_query($db, $sql);
  if (mysqli_num_rows($results) == 1){
    $token = generateRandomString();
      include("mail.php");
  reset_password($email,$token);
     $sql1 = "UPDATE users set token = '$token', tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) where email='$email'";
  $results = mysqli_query($db, $sql1);
  array_push($success,"Ju lutem kontrolloni emailin ne spam, per rikthimin e fjalekalimit");
  }
  else{
    array_push($errors, "Ky email nuk ekziston");
  }
}
if (isset($_POST['reset_password'])){
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	$email = mysqli_real_escape_string($db, $_GET['email']);
	$token =  mysqli_real_escape_string($db, $_GET['token']);
      $sql = "SELECT * from users where email='$email' and token='$token' and token<>'' and  tokenExpire > NOW()";
      $results = mysqli_query($db, $sql);
      if (mysqli_num_rows($results)==1){
      	if ($password != $password1) {
			array_push($errors, "Fjalekalimet nuk pershtaten");
		}
		if (strlen($_POST['password']) <8 && strlen($_POST['password'])!=0 ){
	array_push($errors, "Ju lutem shenoni 8 e me shume karaktere te fjalekalimit te ri!");
}
if (strlen($_POST['password']) >255 ){
	array_push($errors, "Ju lutem shenoni me pak se 255 karaktere tek fjalekalimi i ri!");
}
if (empty($password)) { array_push($errors, "Ju lutem plotesoni fjalekalimin"); }

		if (count($errors)==0){
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$sql = "UPDATE users SET password='$password', token='' WHERE email='$email'";
		
			mysqli_query($db, $sql);
			header("Location:login.php");
			die();

		}

      }
      else{
      	header("Location:forgot_password.php");
      }
}
?>




