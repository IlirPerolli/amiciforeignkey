 <?php
 $query1 = "SELECT userposts.id, users.Name, users.Surname, users.age, users.academicyear, users.username, users.userphotos, Comments, date, time, replyingto, edited from userposts inner join users on userposts.id_user = users.id WHERE academicyear='$vitiakademik' AND replyingto = '$id' ORDER BY id desc limit 1";
            $results1 = mysqli_query($db, $query1);

             



                        while(($row1 = $results1->fetch_assoc()) !== null){
  

                         $row1['Name'] = strtolower($row1['Name']);
                         $row1['Surname'] = strtolower($row1['Surname']);
                         $row1['Name'] = ucfirst($row1['Name']);
                         $row1['Surname'] = ucfirst($row1['Surname']);
                         echo '<div class = "posts" style = "background:#E7E8EA; margin-top:20px !important;" id="preview_reply_'.$id.'">'; 
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
?>