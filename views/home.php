<?php 
  if (isset($status) && $status === 200): 
   require_once __DIR__ . '/../views/success_message.php';
  endif;
  if (isset($status) && $status === 400):
   require_once __DIR__ . '/../views/error_message.php';
  endif; 
?> 
<h1>Welcome to <?php echo $name ?></h1>