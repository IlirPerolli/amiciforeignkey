<?php
      $db = mysqli_connect('localhost', 'root', '', 'user-registration');
if (!$db) {
    die('<p> Kerkojme falje, ka ndodhur nje gabim. Beni refresh faqen per te vazhduar.</p>' . mysql_error());//Nese nuk lidhet me db
}
?>