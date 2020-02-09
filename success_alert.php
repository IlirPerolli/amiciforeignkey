<?php  if (count($success) > 0) : ?>

		<?php foreach ($success as $success1) : ?>
			
<div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $success1 ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

		<?php endforeach ?>
	
<?php  endif ?>


  
  