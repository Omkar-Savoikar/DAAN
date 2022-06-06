<?php
   session_start();
   unset($_SESSION['userid']);
   if(session_destroy()) {
      header("location: index.php");
   }
?>