<?php

// produces list of contextual error messages

if (count($errors) > 0) : ?>
  <div class="errorclass">

  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
