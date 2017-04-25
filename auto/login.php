<?php
$dbc = mysqli_connect("localhost", "root", "", "autos");
if(!isset($_COOKIE['user_id'])) {
  if(isset($_POST['submit'])) {
      $user_names = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
      if(!empty($user_names) && !empty($user_password)) {
        $query = "SELECT user_id, user_name FROM lesson WHERE user_name = '$user_names' AND password = SHA ('$user_password')";
        $data = mysqli_query($dbc,$query);
        if (mysqli_num_rows($data) == 1) {
          $row = mysqli_fetch_assoc($data);
          setcookie('user_id',$row['user_id'], time() + (60*60*24*30));
          setcookie('user_name',$row['user_name'], time() + (60*60*24*30));
          $modded = '/login.php';
           header('Location: ' . $modded);
        } else {
          $er =  '<div class="log-error text-center">Неверный логин или пароль</div>';
        }
      }
  }
}
 ?>
 <?php include "header.php"; include "database.php";?>
 <?php if(empty($_COOKIE['user_name'])) { ?>
 <div class="container gr">
   <div class="row">
     <div class="bgc">
       <img src="image/root/boy.svg" alt="R" class="img-responsive center-block reg-img">
     </div>
     <h2 class="text-center">Добро пожаловать!</h2>
     <h5 class="p-mb">Нет аккаунта? <a href="reg.php">Создайте его</a></h5>
     <div class="col-lg-4 col-lg-offset-4">
      <form method="POST" id="h_reg" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input type="text" name="user_name" placeholder="Логин" required="">
          <input type="password" name="password" placeholder="Пароль" required="">
          <button class="button l-button center-block" name="submit">Войти</button>
        <?php echo $er ?>
      </form>
  <?php } else { ?>

    <div class="container gr">
      <div class="row">
        <div class="gr-a">
          <a href="modded.php"> Добавить запись</a>
          <a href="exit.php">Выход</a>
        </div>
        <ul class="nav nav-tabs">
          <li><a data-target="#auto" data-toggle="tab">Автомобили</a></li>
          <li><a data-target="#ticket" data-toggle="tab">Заказы</a></li>
        </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="auto">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Марка</th>
            <th>Модель</th>
            <th>Цена</th>
            <th>Тип кузова</th>
            <th>Год</th>
            <th>Тип двигателя</th>
            <th>КПП</th>
            <th>Привод</th>
            <th>Цвет</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php $result = mysql_query("SELECT * FROM cars",$link);
        if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_array($result);
          do {
         echo '
          <tr>
            <td>'.$row["mark"].'  </td>
            <td>'.$row["model"].'</td>
            <td>'.$row["cost"].'</td>
            <td>'.$row["type_body"].'</td>
            <td>'.$row["year"].'</td>
            <td>'.$row["type_engine"].'</td>
            <td>'.$row["transmission"].'</td>
            <td>'.$row["drive_unit"].'</td>
            <td>'.$row["color"].'</td>
            <td><a class="delete-button" href="delete.php?id='.$row['auto_id'].'"><span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>';
      }
        while ($row = mysql_fetch_array($result));
    }
      ?>
    </tbody>
    </table>
  </div>

    <div class="tab-pane" id="ticket">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Имя</th>
          <th>Фамилия</th>
          <th>Отчество</th>
          <th>Телефон</th>
          <th>Автомобиль</th>
          <th>Электронный адрес</th>
          <th>Документы</th>
        </tr>
      </thead>
      <tbody>
      <?php $result = mysql_query("SELECT * FROM ticket",$link);
      if (mysql_num_rows($result) > 0) {
      $ticket = mysql_fetch_array($result);
        do {
       echo '
        <tr>
          <td>'.$ticket["name"].'  </td>
          <td>'.$ticket["surname"].'</td>
          <td>'.$ticket["mname"].'</td>
          <td>'.$ticket["tel"].'</td>
          <td>'.$ticket["auto_id"].'</td>
          <td>'.$ticket["email"].'</td>
          <td><img src="image/'.$ticket["scan"].'"></td>
          <td><a class="edit-button" href="edit.php?id='.$ticket['ticket_id'].'""><span class="glyphicon-envelope glyphicon glyphicon-ok"></span></a></td>
          <td><a class="delete-button" href="delete.php?id='.$ticket['ticket_id'].'"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>';
    }
      while ($ticket = mysql_fetch_array($result));
  }
    ?>
  </tbody>
  </table>
</div>
  </div>
</div>
</div>
    </div>
  </div>
  <?php
  } ?>
  </div>
  </div>


  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
