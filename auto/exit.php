<?php
unset($_COOKIE['user_id']);
unset($_COOKIE['user_name']);
setcookie('user_id', '', -1, '/');
setcookie('user_name', '', -1, '/');
$home_url = 'http://' . $_SERVER['HTTP_HOST'];
 header('Location: ' . $home_url);
?>
