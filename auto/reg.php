<?php include "header.php"; include "database.php" ?>
<div class="container gr">
  <div class="row">
    <div class="col-lg-2 col-lg-offset-5">
    <form class="" action="reg/h_reg.php" method="post" id="h_reg">
      <input type="text" name="comp_name" id="comp_name" placeholder="Название компании">
      <input type="text" name="reg_numb" id="reg_numb" placeholder="Регистрационный номер">
      <input type="text" name="reg_telephone" id="reg_telephone" placeholder="Телефон">
      <input type="text" name="reg_login" id="reg_login" placeholder="Логин">
      <input type="password" name="reg_pass" id="reg_pass" placeholder="Пароль">
      <button type="submit" class="button r-button center-block" name="reg_submit" id="form_submit">Создать</button>
      </div>
    </div>
  </form>
</div>
