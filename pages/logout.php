<?php
//unset data entry 
unset($_COOKIE['username']);
unset($_COOKIE['email']); 
setcookie('username', null, -1, '/'); 
setcookie('email', null, -1, '/'); 

//unset score & lives
session_start();
session_destroy();

header("Location: ../index.php");
?>