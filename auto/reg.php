<?php include "header.php";?>
<div class="container text-center">
  <div class="row">
    <div class="col-lg-3 col-lg-offset-5  gr">
      <div class="bgc">
        <img src="image/root/boy.svg" alt="R" class="img-responsive center-block reg-img">
      </div>
      <h4>Регистрация</h4>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="h_reg">
      <input type="text" name="naming" placeholder="Название компании">
      <input type="text" name="telephone" placeholder="Телефон" id="phone">
      <input type="text" name="user_name" placeholder="Логин">
      <input type="password" name="password" placeholder="Пароль">
      <button type="submit" class="button r-button center-block" name="submit">Создать</button>
      </div>
    </div>
  </form>
</div>

<?php
if(isset($_POST['submit'])) {
  $link = mysqli_connect("localhost", "root", "", "autos");
  $naming = mysqli_real_escape_string($link, trim($_POST['naming']));
  $telephone = mysqli_real_escape_string($link, trim($_POST['telephone']));
  $user_name = mysqli_real_escape_string($link, trim($_POST['user_name']));
  $password = mysqli_real_escape_string($link, trim($_POST['password']));
  if(!empty($user_name) && !empty($password) && !empty($telephone)) {
    $query = "SELECT * FROM `lesson` WHERE user_name = '$user_name'";
    $data = mysqli_query($link, $query);
    if(mysqli_num_rows($data) == 0) {
      $query = "INSERT INTO `lesson` (user_name,password,naming,telephone) VALUES ('$user_name',SHA('$password'),'$naming','$telephone')";
    mysqli_query($link,$query);
    echo '<h4>ЕЕ</h4>';
    mysqli_close($link);
    exit();
    } else {
      echo "Такой логин используется";
    }
  }
}
 ?>

 <script src="js/script.js"></script>
