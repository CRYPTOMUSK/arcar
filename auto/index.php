<?php include "database.php";
      include "functions/functions.php";
      include "header.php";
      include "modal.php" ?>

      <div class="container auto">
        <div class="row">
          <div class="col-lg-8">
        <?php
          $result = mysql_query("SELECT * FROM auto",$link);
          if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);
            do {
              echo '
              <div class="col-lg-12">
              <div class="card">
              <div class="col-lg-4"><img src="image/'.$row["auto_photo"].'" alt="car"></div>
              <div class="col-lg-4">
                <div class="card-info">
                  <h3>'.$row["mark"].' '.$row["model"].'</h3>
                  <ul class="list-group">
                    <li>Привод: '.$row["drive_unit"].'</li>
                    <li>Тип кузова: '.$row["type_body"].'</li>
                    <li>Год выпуска: '.$row["year"].'</li>
                    <li>Тип двигателя: '.$row["type_engine"].'</li>
                    <li>Тип КПП: '.$row["transmission"].'</li>
                  </ul>
                  <p>Отзывов: 0</p>
                </div>
              </div>
              <div class="col-lg-4 cost">
                <h3>от '.$row["cost"].' BYN</h3>
                <span class="gray">до 90 BYN</span>
              </div>
              <button class="button c-button pull-right"><a href="cars.php?id='.$row["auto_id"].'">Подробнее</a></button>
            </div>
            </div>
            ';
            }
              while ($row = mysql_fetch_array($result));
          }
         ?>
       </div>

         <div class="col-lg-4 settings">
           <div class="settings-block">
             <form name="form" action="" method="post">
               <h3>Цена в BYN</h3>
               <input type="text" placeholder="от 0 BYN" name="price_start">
               <input type="text" placeholder="до 1000 BYN" name="price_end">
               <?php
   function addWhere($where, $add, $and = true) {
     if ($where) {
       if ($and) $where .= " AND $add";
       else $where .= " OR $add";
     }
     else $where = $add;
     return $where;
   }
      if (!empty($_POST["filter"])) {
     $where = "";
     if ($_POST["price_start"]) $where = addWhere($where, "cost >= '".htmlspecialchars($_POST["price_start"]))."'";
     if ($_POST["price_end"]) $where = addWhere($where, "cost <= '".htmlspecialchars($_POST["price_end"]))."'";
     $result = "SELECT * FROM auto";
     if ($where) $result .= " WHERE $where";
     echo $result;
   }
   var_dump($result);
   print_r($_POST);
      ?>
             </div>
             <div class="settings-block md">
               <h3>Характеристики</h3>
               <input type="text" placeholder="Марка">
               <select class="" name="">
                 <option value="">'.$row["mark"].'</option>
               </select>
               <select class="" name="">

               </select>
               <select class="" name="">

               </select>
             </div>
             <div class="settings-block">
               <h3>Год выпуска</h3>
               <input type="text" placeholder="от 1984 г.">
               <input type="text" placeholder="до 2014 г.">
             </div>
             <div class="settings-block">
               <h3>Тип двигателя</h3>
               <div class="col-lg-6">
                 <input id="check1" type="checkbox" name="check" value="check1">
       	        <label for="check1">Бензин</label>
                 <br>
                 <input id="check2" type="checkbox" name="check" value="check1">
       	        <label for="check2">Газовый</label>
               </div>
               <div class="col-lg-6">
                 <input id="check3" type="checkbox" name="check" value="check1">
       	        <label for="check3">Дизель</label>
                 <br>
                 <input id="check4" type="checkbox" name="check" value="check1">
       	        <label for="check4">Электро</label>
               </div>
             </div>
             <div class="settings-block kpp">
               <h3>Тип КПП</h3>
               <div class="col-lg-6">
                 <input id="check5" type="checkbox" name="check" value="check1">
       	        <label for="check5">МКПП</label>
               </div>
               <div class="col-lg-6">
                 <input id="check6" type="checkbox" name="check" value="check1">
       	        <label for="check6">АКПП</label>
               </div>
           </div>
           <div class="settings-blok">
             <button class="button s-button" type="submit" name="filter">Подобрать авто</button>
           </div>
        </form>
       </div>
     </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/auth.js"></script>
  </body>
</html>
