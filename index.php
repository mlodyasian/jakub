<?php
require('class/User.class.php');
echo "<pre>";
$db = new mysqli('localhost', 'root', '', 'user');
$user = new User("dowalski","taj3neHasło");
$user->login();
if($user->isAuth()) {
    echo "Użytkownik zalogowany poprawnie";
} else {
    echo "Błąd logowania";
}
?>