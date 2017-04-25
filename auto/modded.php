<?php include "header.php";?>


<?php if(empty($_COOKIE['user_name'])) {
  header("Location: login.php");
  } else { ?>
<div class="container gr modded">
  <div class="row">
    <h3 class="text-center">Добавление записи</h3>
    <div class="col-lg-4 col-lg-offset-4">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" id="h_modded">
      <div class="input_sm">
        <input type="text" name="mark" placeholder="Марка авто" required="">
        <input type="text" name="model" placeholder="Модель" required="">
      </div>
      <div class="input_lg">
        <input type="text" name="cost" placeholder="Цена за сутки" required="">
      </div>
      <div class="input_sm">
        <select name="type_body" placeholder="Тип кузова">
           <option name="type_body[]" value="Седан">Седан</option>
           <option name="type_body[]" value="Купе">Купе</option>
           <option name="type_body[]" value="Хэтчбек">Хэтчбек</option>
           <option name="type_body[]" value="Внедорожник">Внедорожник</option>
           <option name="type_body[]" value="Универсал">Универсал</option>
       </select>
       <select name="transmission">
          <option name="transmission[]" value="МКПП">МКПП</option>
          <option name="transmission[]" value="АКПП">АКПП</option>
      </select>
      </div>
      <div class="input_lg">
        <input type="text" name="year" placeholder="Год" required="">
      </div>
      <div class="input_sm">
        <select name="type_engine">
           <option name="type_engine[]" value="Бензин">Бензин</option>
           <option name="type_engine[]" value="Дизель">Дизель</option>
           <option name="type_engine[]" value="Газ">Газ</option>
           <option name="type_engine[]" value="Электро">Электро</option>
       </select>
        <select name="drive_unit">
           <option name="drive_unit[]" value="Задний">Задний</option>
           <option name="drive_unit[]" value="Полный">Полный</option>
           <option name="drive_unit[]" value="Передний">Передний</option>
       </select>
      </div>
      <div class="input_lg">
        <input type="text" name="color" placeholder="Цвет">
        <input type="text" name="options_id" placeholder="Функции">
        <textarea name="discription" placeholder="Описание"></textarea>
      </div>
      <input type="file" name="myfile" id="myfile" class="acceptFile" accept=".jpg,.png">
      <button type="submit" class="button r-button center-block" name="m-submit">Создать</button>
  </form>
      </div>
    </div>
  </div>
  <?php } ?>

<?php
if(isset($_POST['m-submit'])) {
  $link = mysqli_connect("localhost", "root", "", "autos");
  $mark = mysqli_real_escape_string($link, trim($_POST['mark']));
  $model = mysqli_real_escape_string($link, trim($_POST['model']));
  $cost = mysqli_real_escape_string($link, trim($_POST['cost']));
  $body = mysqli_real_escape_string($link, trim($_POST['type_body']));
  $year = mysqli_real_escape_string($link, trim($_POST['year']));
  $engine = mysqli_real_escape_string($link, trim($_POST['type_engine']));
  $transmission = mysqli_real_escape_string($link, trim($_POST['transmission']));
  $unit = mysqli_real_escape_string($link, trim($_POST['drive_unit']));
  $option = mysqli_real_escape_string($link, trim($_POST['options_id']));
  $color = mysqli_real_escape_string($link, trim($_POST['color']));
  $discription = mysqli_real_escape_string($link, trim($_POST['discription']));
  $path = 'image/'; // директория для загрузки
  $ext = array_pop(explode('.',$_FILES['myfile']['name'])); // расширение
  $new_name = time().'.'.$ext; // новое имя с расширением
  $full_path = $path.$new_name; // полный путь с новым именем и расширением

  if($_FILES['myfile']['error'] == 0){
      if(move_uploaded_file($_FILES['myfile']['tmp_name'], $full_path)){
        $file = "INSERT INTO cars (auto_photo) VALUES $new_name";
          // Если файл успешно загружен, то вносим в БД (надеюсь, что вы знаете как)
          // Можно сохранить $full_path (полный путь) или просто имя файла - $new_name
      } else {
        echo "Не удалозь загрузить изображение";
      }
  }

  $query = "SELECT * FROM `cars` WHERE model = '$model'";
  $data = mysqli_query($link, $query);
    if(mysqli_num_rows($data) == 0) {
      $query = "INSERT INTO cars (mark,model,cost,type_body,year,type_engine,transmission,drive_unit,color,options_id,discription,auto_photo) VALUES ('$mark','$model','$cost','$body','$year','$engine','$transmission','$unit','$color','$option','$discription','$new_name')";
      var_dump($query);
    mysqli_query($link,$query);
    echo '<h4 class="text-center alert alert-info">Запись успешно добавлена</h4>';
    mysqli_close($link);
    exit();
    } else {
      echo "<h4 class='text-center'>Заполните все поля!</h4>";
    }
  }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
