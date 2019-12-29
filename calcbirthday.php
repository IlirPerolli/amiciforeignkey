<?php include("config.php");
session_start();
ob_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap DatePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <input id="datepicker" width="270" />
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
    </script>
</body>
</html>

<?php
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = "12/17/1984";
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  echo "Age is:" . $age;
?>

<?php 
 $bithdayDate = "07/20/1999";
$date = new DateTime($bithdayDate);
 $now = new DateTime();
 $interval = $now->diff($date);
 echo $interval->y;
?>
<br><br>
<?php
$username = $_SESSION['username'];
$sql = "SELECT * from users where username='$username'";
$results = mysqli_query($db,$sql);
$row = $results->fetch_assoc();
$userbirthday = substr($row['age'], 0,5);
echo $userbirthday;
echo "<br>";
date_default_timezone_set("Europe/Tirane");
    $actualdate = date("m/d");
    echo $actualdate;
if ($userbirthday == $actualdate){
  echo "YAAAAAAAAAAAY";
}
else{
  echo "EH";
}



 ?>
 