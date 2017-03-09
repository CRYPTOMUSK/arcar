<?php

  $db_host          = 'localhost';
  $db_user          = 'root';
  $db_pass          = '';
  $db_databse       = 'autos';

  $link = mysql_connect($db_host,$db_user,$db_pass);

  mysql_select_db ($db_databse, $link) or die ("Типа ошибка - " .mysql_error());
  mysql_query ("SET names UTF-8");

 ?>
