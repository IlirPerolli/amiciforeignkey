
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Studentet</h5>
              <?php 

 $username = $_SESSION['username'];
  $sql = "SELECT * from admins where username='$username'";
  $results = mysqli_query($db, $sql);
  if (mysqli_num_rows($results)==1){
          ?>
        <form action="#" method="post" style="height:10px;">
    
           <!-- Button trigger modal -->
    <button type="submit" class="btn btn-light" id="reset_online" name="reset_online" title="Rifresko" >
  <img src= "img/reset-icon.png" style = "width:30px; margin-top: -6px; margin-left: 5px;"/>
</button>

        </form>
        <?php }?>
        <?php 
          if (isset($_POST['reset_online'])){
            $sql = "UPDATE users set online=0";
            mysqli_query($db,$sql);
            header("Location:group.php");
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
                                            <img class="mr-3 rounded-circle" src="user-photos/'.$row['userphotos'].'" style = "width:50px; height:50px" alt="'.htmlspecialchars($row['Name'])." ".htmlspecialchars($row['Surname']).'">
                                            <div class="media-body">';
                                              echo '<h5 class="mt-0 mb-1">'.htmlspecialchars($row['Name'])." ".htmlspecialchars($row['Surname']).'';
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
                                            <img class="mr-3 rounded-circle" src="user-photos/'.$row['userphotos'].'" style = "width:50px; height:50px" alt="'.htmlspecialchars($row['Name'])." ".htmlspecialchars($row['Surname']).'">
                                            <div class="media-body">';
                                              echo '<h5 class="mt-0 mb-1">'.htmlspecialchars($row['Name'])." ".htmlspecialchars($row['Surname']).'';
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