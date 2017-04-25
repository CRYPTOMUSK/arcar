<?php include "database.php";
      include "header.php";

      $sort = $_GET["sort"];
      $search = ($_GET["q"]);

      switch ($sort) {
        case 'cost-asc';
        $sort = 'cost ASC';
        $sort_name = 'Бюджетные';
        break;

        case 'cost-desc';
        $sort = 'cost DESC';
        $sort_name = 'Дорогие';
        break;

        case 'news';
        $sort = 'year DESC';
        $sort_name = 'Новые';
        break;

        default:
        $sort = 'auto_id DESC';
        $sort_name = 'default';
        break;
      }
      ?>

      <div class="container auto">
        <div class="row">
          <div class="col-lg-8">
        <?php
          $result = mysql_query("SELECT * FROM cars WHERE mark LIKE '%$search%'",$link);
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
          } else {
            echo '<div class="error">По Вашему запросу ничего не найдено</div>';
          }
         ?>
       </div>

       <div class="col-lg-4 settings">
         <div class="settings-block">
             <form action="search.php?=" method="GET">
             <input type="text" class="form-control" placeholder="Поиск по авто" id="input-search" name="q">
             </form>
               <a href="index.php?sort=cost-asc">От бюджетных</a>
               <a href="index.php?sort=cost-desc">От дорогих</a>
               <a href="index.php?sort=news">Новые авто</a>
           </div>
           </div>
       </div>
     </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/auth.js"></script>
  </body>
</html>
