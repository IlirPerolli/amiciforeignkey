<?php 
	$success = array(); 
	$errors = array(); 
		// lidhu me databaze
include("config.php");
if(isset($_POST['raporti_submit'])){
		$username = $_SESSION['username'];
			    $emri = strtolower($_SESSION['emri']);
			    $mbiemri = strtolower($_SESSION['mbiemri']);
			     $emri = ucfirst($emri);
			    $mbiemri = ucfirst($mbiemri);
			    
 			    $username = $_SESSION['username'];
			    $email = $_SESSION['email'];
			 	date_default_timezone_set("Europe/Tirane");
				$date = date("d/m/Y");
				$time = date("H:i");
				$komenti = mysqli_real_escape_string($db, $_POST['comment']);

if (isset($_POST['report_radio'])){
	$selected = $_POST['report_radio'];
	//Nese eshte publike
	if ($selected == "show"){
		

			

		if (empty($komenti)) {
			array_push($errors, "Ju lutem shenoni pershkrimin e problemit");
			
		}



				if (count($errors) == 0) {

			$query = "INSERT INTO bug_reports (username, Name, Surname, email, comment, date, time) 
					  VALUES('$username', '$emri', '$mbiemri', '$email','$komenti' , '$date' , '$time')";
			mysqli_query($db, $query);

array_push($success, " <strong>Ju Faleminderit per bashkepunimin! </strong> Do mundohemi t'a zgjidhim sa me shpejte problemin.");
				}


	}
//Nese eshte private
	else if ($selected == "hide"){
		
		if (empty($komenti)) {
			array_push($errors, "Ju lutem shenoni pershkrimin e problemit");
			
		}
		$anonim="Anonim";
		

				if (count($errors) == 0) {

			$query = "INSERT INTO bug_reports (username, Name, Surname, email, comment, date, time) 
					  VALUES('$anonim', '$anonim', '$anonim', '$anonim','$komenti' , '$date' , '$time')";
			mysqli_query($db, $query);

array_push($success, "<strong>Ju Faleminderit per bashkepunimin! </strong> Do mundohemi t'a zgjidhim sa me shpejte problemin.");
				}
	}
	//Nese nuk eshte as publike as private pra e ka ndru vleren e radio buttonit
	else{
		array_push($errors, "Ju lutem zgjedhni opsionin me larte");
	}

}
	//Nese nuk zgjedhet asnje radio button
	else{
			array_push($errors, "Ju lutem zgjedhni opsionin me larte");
	
	
	}


}

?>