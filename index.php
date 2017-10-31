<?php  
  // This will not work if you have a secure website
  // We don't, so it's okay!
  $url = $_SERVER['HTTP_HOST'] . '/app';

  header("Location: http://" . $url);
  die();
?>