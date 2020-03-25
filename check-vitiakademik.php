 <link rel="icon" type="image/png" href="people.png" />
<?php
// lidhu me databaze
include("config.php");
    $username = $_SESSION['username'];
    $query= "SELECT * FROM users WHERE username = '$username'";
    $results = mysqli_query($db, $query);
    $row = $results->fetch_assoc();
    $_SESSION['notification'] = $row['notification'];
    $_SESSION['notification_uploads'] = $row['notification_uploads'];
    
    $query1 = "UPDATE users SET online = 1 where username = '$username'";
    mysqli_query($db, $query1);

          
		if ( $_SESSION['vitiakademik'] == "1") {
      echo '<style>#librat-viti2 { display:none;}</style>';
      echo '<style>#librat-viti3 { display:none;}</style>';
      echo '<style>#librat-viti3br { display:none;}</style>';
      echo '<style>#librat-viti2br { display:none;}</style>';
      echo '<style>#d-viti2 { display:none;}</style>';
      echo '<style>#d-viti2br { display:none;}</style>';
      echo '<style>#d-viti3 { display:none;}</style>';
      echo '<style>#d-viti3br { display:none;}</style>';
    }
      else if ( $_SESSION['vitiakademik'] == "2" ) {
      echo '<style>#librat-viti3br { display:none;}</style>';
      echo '<style>#librat-viti3 { display:none;}</style>';
      echo '<style>#d-viti1 { display:none;}</style>';
      echo '<style>#d-viti1br { display:none;}</style>';
      echo '<style>#d-viti3br { display:none;}</style>';
      echo '<style>#d-viti3 { display:none;}</style>';
    }
      else if ( $_SESSION['vitiakademik'] == "3" ) {

      echo '<style>#d-viti1 { display:none;}</style>';
      echo '<style>#d-viti1br { display:none;}</style>';
      echo '<style>#d-viti2br { display:none;}</style>';
      echo '<style>#d-viti2 { display:none;}</style>';
    }
    if ( $_SESSION['notification'] == "0") {
      echo '<style>#notification-counter{ display:none !important;}</style>';

    }
    if ($_SESSION['notification_uploads'] == "0"){
echo '<style>#notification-counter-uploads{ display:none !important;}</style>';
    }

?>
    
<div class="toast" data-autohide="false" style=" position: fixed;z-index: 999;top:90px; left:10px; width: 290px; font-family: 'SamsungSharpSans-Medium'; text-align: center;">
  <div class="toast-header">
    <img src="img/warning.png" style="width:30px;"/>
    <strong class="mr-auto">Kujdes</strong>
    <small class="text-muted">#amiciteam</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" id="close-alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
  </div>
  <div class="toast-body">
  KUJDES PO, PANIKË JO<br> <i> #RriNShpi</i>
  </div>
</div>