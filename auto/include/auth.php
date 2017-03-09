<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../database.php");

    $login = $_POST['reg_login'];
    $pass = md5(($_POST['reg_pass']));
    $pass = strrev($pass);
    $pass = strtolower("11roman".$pass."mudak00");

    if ($_POST["rememberme"] == "yes") {

    }

    $result = mysql_query("SELECT * FROM reg_user WHERE login='$login' AND pass='$pass'",$link);
    if (mysql_num_rows($result) > 0) {
      $row = mysql_fetch_array($result);
      session_start();
      $_SESSION['auth'] = 'yes_auth';
      $_SESSION['auth_pass'] = $row["reg_pass"];
      $_SESSION['auth_login'] = $row["reg_login"];
      $_SESSION['auth_name'] = $row["comp_name"];
      $_SESSION['auth_numb'] = $row["reg_numb"];
      $_SESSION['auth_telephone'] = $row["reg_telephone"];
      echo "yes_auth";
    } else {
      echo "no_auth";
    }
  }
 ?>
