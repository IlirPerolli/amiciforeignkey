<!-- Modal -->
<div class="modal fade" id="theme_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zgjedh Sfondin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="#" method="post" id="theme-form">


  <div class="theme">
  <input type="radio" name="theme" id="mountain" class="input-hidden" value="mountain"  />
<label for="mountain">
  <img src="themes/mountain.jpg" class="theme-photo" />
</label>
</div>

  <div class="theme">
<input type="radio" name="theme" id="forest" class="input-hidden" value="forest"/>
<label for="forest">
     <img src="themes/forest.jpg" class="theme-photo" />
</label>
</div>
  <div class="theme">
<input type="radio" name="theme" id="sunset" class="input-hidden" value="sunset"/>
<label for="sunset">
     <img src="themes/sunset.jpg" class="theme-photo" />
</label>
</div>
  <div class="theme">
<input type="radio" name="theme" id="pier" class="input-hidden" value="pier"/>
<label for="pier">
     <img src="themes/pier.jpg" class="theme-photo" />
</label>
</div>
  <div class="theme">
<input type="radio" name="theme" id="image1" class="input-hidden" value="image1"/>
<label for="image1">
     <img src="themes/image1.jpg" class="theme-photo" />
</label>
</div>

 <div class="theme">
<input type="radio" name="theme" id="image2" class="input-hidden" value="image2"/>
<label for="image2">
     <img src="themes/image2.jpg" class="theme-photo" />
</label>
</div>
 <div class="theme">
<input type="radio" name="theme" id="image3" class="input-hidden" value="image3"/>
<label for="image3">
     <img src="themes/image3.jpg" class="theme-photo" />
</label>
</div>
 <div class="theme">
<input type="radio" name="theme" id="image4" class="input-hidden" value="image4"/>
<label for="image4">
     <img src="themes/image4.jpg" class="theme-photo" />
</label>
</div>
 <div class="theme">
<input type="radio" name="theme" id="image5" class="input-hidden" value="image5"/>
<label for="image5">
     <img src="themes/image5.jpg" class="theme-photo" />
</label>
</div>
 <div class="theme">
<input type="radio" name="theme" id="image6" class="input-hidden" value="image6"/>
<label for="image6">
     <img src="themes/image6.jpg" class="theme-photo" />
</label>
</div>

   <br><br>

<label for="customRange1">Zgjedh dukshmerine</label>
<input type="range" min="0.5" max="1" name="opacity" step="0.01" class="custom-range" id="customRange1" onchange='document.getElementById("opacityvalue").innerText = document.getElementById("customRange1").value;'>

<span id= "opacity">Dukshmeria </span><span id="opacityvalue">0.75</span>


      </div>
      <div class="modal-footer">
        <div class="modal-theme-buttons">
        <button type="button" class="btn btn-secondary" id="theme_dismiss" data-dismiss="modal">Mbyll</button>
  <button type="submit" class="btn btn-success" id="theme_apply" name="theme_apply"> Ruaj Ndryshimet</button>
      

       
        <?php
        $username = $_SESSION['username'];
        $query = "SELECT * FROM group_themes WHERE username='$username'";

$results = mysqli_query($db, $query);
 

          if (mysqli_num_rows($results) == 1) {

         ?>
          <button type="button" class="btn btn-danger" id="theme_remove" onclick="window.location.href='?theme_remove'">Hiq sfondin</button>
<?php }
          ?>
              </form>
        </div>
        
             <?php 
if(isset($_POST['theme_apply'])){
  $theme = $_POST['theme'];
    $opacity = $_POST['opacity'];
  if (empty($theme)){
    header("Location:group.php");
    die();
  }
   if ($opacity >= 0.5 && $opacity <=1){
  header("Location:?theme=".$theme."&opacity=".$opacity);
   }
   else{
    header("Location: group.php");
   }


}
?>

      </div>
    </div>
  </div>
</div>