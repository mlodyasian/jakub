<?php
require('class/User.user class.php');
echo "<pre>";
$db = new mysqli('localhost', 'root', '', 'loginform' );
$user = new User("Kowalski", "tajneHasło");
$user->login();
?>