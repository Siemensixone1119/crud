<?php
/** @var yii\web\View $this */
$this->title = 'Регистрация';
?>

<h1>Регистрация</h1>

<form method="post" action="<?= \yii\helpers\Url::to(['user/register']) ?>">
  <label>
    Имя:
    <input type="text" name="name" required>
  </label>
  <br><br>
  <label>
    Email:
    <input type="email" name="email" required>
  </label>
  <br><br>
  <button type="submit">Зарегистрироваться</button>
</form>