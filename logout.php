<?php 
require('init.php');
require('userClass.php');  
$user = new User($db);  
$user->logout();

header('Location: index.php');
 
?> 