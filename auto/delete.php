<?php include "database.php";?>
<?php
if (!isset($_COOKIE['user_id']))
{
  header("Location: login.php");
} else {
  $id = $_GET['id'];
  $query = ("DELETE FROM cars WHERE auto_id = '$id'") or die(mysql_error());

  if(mysql_query($query)) {
    header("Location: login.php");
  } else {
    echo "error";
  }
}
?>

<?php
if (!isset($_COOKIE['user_id']))
{
  header("Location: login.php");
} else {
  $id = $_GET['id'];
  $query = ("DELETE FROM ticket WHERE ticket_id = '$id'") or die(mysql_error());

  if(mysql_query($query)) {
    header("Location: login.php");
  } else {
    echo "error";
  }
}
?>
