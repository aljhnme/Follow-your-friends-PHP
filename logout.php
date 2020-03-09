<?php
 session_start();
 session_destroy();

 if ($_SESSION['user_id'] == '') 
 {
 	header('location:register.php');
 }

?>