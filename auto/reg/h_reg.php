<?php
  session_start();

  include("../database.php");
  include("../functions/functions.php");

    $error = array ();

    $login = $_POST['reg_login'];
    $pass = $_POST['reg_pass'];
    $comp_name = $_POST['comp_name'];
    $reg_numb = $_POST['reg_numb'];
    $reg_telephone = $_POST['reg_telephone'];

    var_dump($login,$pass,$comp_name,$reg_numb,$reg_telephone);

    if (strlen($login) <= 5) {
      $error[] = "Логин должен быть больше 5 символов";
    } else {
      $result = mysql_query("SELECT login FROM reg_user WHERE login = '$login'",$link);
    }

    if (strlen($pass) <= 8) $error[] = "Придумайте пароль более 8 символов";

    if (count($error)) {
      echo implode('<br />',$error);
    } else {
      $pass = md5($pass);
      $pass = strrev($pass);
      $pass = "11roman".$pass."mudak00";

      mysql_query("INSERT INTO reg_user (reg_login,reg_pass,comp_name,reg_numb,reg_telephone) VALUES (
        '".$login."',
        '".$pass."',
        '".$comp_name."',
        '".$reg_numb."',
        '".$reg_telephone."')",$link);

        echo 'true';
    }
 ?>
