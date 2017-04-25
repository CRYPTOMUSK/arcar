<?php include "database.php";
  $id = $_GET[id];
 ?>
    <?php include "header.php"; ?>

    <?php
    $result1 = mysql_query("SELECT * FROM cars WHERE auto_id= $id",$link);
      if (mysql_num_rows($result1) > 0) {
          $row1 = mysql_fetch_array($result1);
        do {
        echo '
      <div class="container auto-head">
        <div class="row">
          <div class="col-lg-3 text-right"><h2>'.$row1["mark"].' '.$row1["model"].'</h2></div>
          <div class="col-lg-2"><h2 class="year">'.$row1["cost"].' BYN</h2></div>
        </div>
      </div>

      <div class="container gr">
        <div class="row">
          <div class="col-lg-6 auto-prev">
            <img src="image/'.$row1["auto_photo"].'" alt="tesla.png" class="img-responsive img-center">
          </div>
          <div class="col-lg-5 list">
            <ul class="list-group auto-inf">
              <li>Привод: '.$row1["drive_unit"].'</li>
              <li>Тип кузова: '.$row1["type_body"].'</li>
              <li>Год выпуска: '.$row1["year"].'</li>
              <li>Тип двигателя: '.$row1["type_engine"].'</li>
              <li>Тип КПП: '.$row1["transmission"].'</li>
              <li class="discr">'.$row1["discription"].'</li>
            </ul>
            <button class="button a-button"><a href="ticket.php?id='.$row1["auto_id"].'">Заказать</a></buttom>
          </div>
        </div>
      </div> ';
        }
          while ($row1 = mysql_fetch_array($result1));
        }
     ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>