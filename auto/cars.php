<?php include "database.php";
  include "functions/functions.php";
  $id = $_GET[id];
 ?>
    <?php include "header.php";
          include "modal.php" ?>

    <?php
    $result1 = mysql_query("SELECT * FROM auto WHERE auto_id= $id",$link);
      if (mysql_num_rows($result1) > 0) {
          $row1 = mysql_fetch_array($result1);
        do {
        echo '
      <div class="container auto-head">
        <div class="row">
          <div class="col-lg-2 text-right"><h2>'.$row1["mark"].'</h2></div>
          <div class="col-lg-2"><h2 class="year">'.$row1["cost"].' BYN</h2></div>
        </div>
      </div>

      <div class="container gr">
        <div class="row">
          <div class="col-lg-6">
            <img src="image/'.$row1["auto_photo"].'" alt="tesla.png" class="img-responsive img-center">
          </div>
          <div class="col-lg-5">
            <h2 class="c-h2">'.$row1["mark"].' '.$row1["model"].'</h2>
            <p class="mt">'.$row1["type_engine"].', '.$row1["transmission"].', '.$row1["type_body"].'</p>
            <ul class="dops mt">
              <li>'.$row1["options_id"].'</li>
            </ul>
            <p class="mt">'.$row1["discription"].'</p>
            <button class="button a-button" data-toggle="modal" data-target="#myModal">Заказать</button>
          </div>
        </div>
      </div> ';
        }
          while ($row1 = mysql_fetch_array($result1));
        }
     ?>

      <!-- Large modal -->
      <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
      <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
      <h4 class="modal-title">Заявка на аренду авто</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="name" placeholder="Фамилия">
        <input type="text" name="name" placeholder="Отчество">
        <input type="text" name="name" placeholder="Номер мобильного">
        <input type="text" name="name" placeholder="Электронный адрес">
        <input type="file" name="file" id="file" class="inputfile" />
        <label for="file">Фото водительских прав</label>
      </div>
      <div class="modal-footer"><button class="button m-button center-block">Заказать</button></div>
      </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
