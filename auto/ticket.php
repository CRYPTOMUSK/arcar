
<?php include "header.php";
$id = $_GET[id];
?>

<div class="container text-center">
  <div class="row">
    <div class="col-lg-3 col-lg-offset-5  gr">
      <div class="bgc">
        <img src="image/root/boy.svg" alt="R" class="img-responsive center-block reg-img">
      </div>
      <h4>Заказ</h4>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="h_reg">
      <input type="text" name="name" placeholder="Имя" required="">
      <input type="text" name="surname" placeholder="Фамилия" id="phone" required="">
      <input type="text" name="mname" placeholder="Отчестство" required="">
      <input type="text" name="tel" placeholder="Телефон" id="tTelephone" required="">
      <input type="hidden" name="auto_id" value="<?php echo $id;?>">
      <input type="text" name="email" placeholder="Почта" required="">
      <input type="file" name="scan" id="scan" class="acceptFile" accept=".jpg,.png">
      <button type="submit" class="button r-button center-block" name="v_submit">Создать</button>
  </form>


<?php
if(isset($_POST['v_submit'])) {
  $link = mysqli_connect("localhost", "root", "", "autos");
  $name = mysqli_real_escape_string($link, trim($_POST['name']));
  $sname = mysqli_real_escape_string($link, trim($_POST['surname']));
  $mname = mysqli_real_escape_string($link, trim($_POST['mname']));
  $tel = mysqli_real_escape_string($link, trim($_POST['tel']));
  $autoID = mysqli_real_escape_string($link, trim($_POST['auto_id']));
  $ml = mysqli_real_escape_string($link, trim($_POST['email']));
  $path = 'image/'; // директория для загрузки
  $ext = array_pop(explode('.',$_FILES['scan']['name'])); // расширение
  $new_name = time().'.'.$ext; // новое имя с расширением
  $full_path = $path.$new_name; // полный путь с новым именем и расширением

  if($_FILES['scan']['error'] == 0){
      if(move_uploaded_file($_FILES['scan']['tmp_name'], $full_path)){
        $file = "INSERT INTO ticket (scan) VALUES $new_name";
      } else {
        echo '<h4 class="log-error text-center">Ошибка IMG</h4>';
      }
  }
    $query = "SELECT * FROM ticket WHERE tel = '$tel'";
    $data = mysqli_query($link, $query);
    if(mysqli_num_rows($data) == 0) {
      $query = "INSERT INTO `ticket` (name,surname,mname,tel,auto_id,email,scan) VALUES ('$name','$sname','$mname','$tel','$autoID','$ml','$new_name')";
    mysqli_query($link,$query);
    var_dump($query);
    var_dump($auID);
    echo '<h4 class="ticket_ok text-center">Ожидайте ответа на e-mail</h4>';
    mysqli_close($link);
    exit();
    } else {
      echo '<h4 class="log-error text-center">Номер используется</h4>';
  }
}
 ?>

    </div>
  </div>
</div>