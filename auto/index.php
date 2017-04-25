<?php include "database.php";
      include "header.php";
      $sort = $_GET["sort"];
      $filter = $_GET["filter"];

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

    switch ($filter) {
      case 'hatchback':
        $filter = 'type_body = "Хэтчбек"';
        $filter_name = 'Хэтчбек';
        break;

      case 'sedan':
        $filter = 'type_body = "Седан"';
        $filter_name = 'Седан';
        break;

      case 'offroad':
        $filter = 'type_body = "Внедорожник"';
        $filter_name = 'Внедорожник';
        break;

      case 'universal':
        $filter = 'type_body = "Универсал"';
        $filter_name = 'Универсал';
        break;

      case 'kupe':
        $filter = 'type_body = "Купе"';
        $filter_name = 'Купе';
        break;

      default:
        $filter = 'auto_id';
        $filter_name = 'default';
        break;
    }
      ?>

      <div class="container auto">
        <div class="row">
          <div class="col-lg-9">
        <?php
          $result = mysql_query("SELECT * FROM cars WHERE $filter ORDER BY $sort",$link);
          if (mysql_num_rows($result) > 0) {
            $row = mysql_fetch_array($result);
            do {
              echo '
              <div class="col-lg-12 crd">
              <div class="card">
              <div class="col-lg-4"><img src="image/'.$row["auto_photo"].'" alt="car" class="img-responsive center-block"></div>
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

         <div class="col-lg-3 settings">
           <div class="settings-block">
               <form action="search.php?=" method="GET">
               <input type="text" class="form-control" placeholder="Поиск по авто" id="input-search" name="q">
               </form>
               <div class="sorting">
                <a href="index.php?sort=cost-asc"><span class="glyphicon glyphicon-menu-down"></span>От бюджетных</a>
                <a href="index.php?sort=cost-desc"><span class="glyphicon glyphicon-menu-up"></span>От дорогих</a>
                <a href="index.php?sort=news"><span class="glyphicon glyphicon-flash"></span>Новые авто</a>
              </div>
              <div class="filter">
                <div class="dropdown">
                  <a class="tb dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-right"></span>Тип кузова</a>
                    <ul class="dropdown-menu">
                      <li><a href="index.php?filter=hatchback" class="tb"><span class="glyphicon glyphicon-menu-right"></span>Хэтчбек</a></li>
                      <li><a href="index.php?filter=sedan" class="tb"><span class="glyphicon glyphicon-menu-right"></span>Седан</a></li>
                      <li><a href="index.php?filter=offroad" class="tb"><span class="glyphicon glyphicon-menu-right"></span>Внедорожник</a></li>
                      <li><a href="index.php?filter=universal" class="tb"><span class="glyphicon glyphicon-menu-right"></span>Универсал</a></li>
                      <li><a href="index.php?filter=kupe" class="tb"><span class="glyphicon glyphicon-menu-right"></span>Купе</a></li>
                    </ul>
                  </div>
             </div>
             </div>
       </div>
     </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/auth.js"></script>
  </body>
</html>
