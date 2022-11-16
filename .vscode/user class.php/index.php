<?php
require('class/User.class.php');
echo "<pre>";
$db = new mysqli('localhost', 'root', '', 'loginForm');
$user = new User("dowalski","taj3neHasło");
//$user->register();
$user->login();
if($user->isAuth()) {
    echo "Użytkownik zalogowany poprawnie";
} else {
    echo "Błąd logowania";
}
?>