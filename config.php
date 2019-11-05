<?php
   $db = mysqli_connect('localhost', 'root', '', 'user-registration');
if (!$db) {
    die('Nuk mund te lidhet me serverin MySQL: ' . mysql_error());
}
?>