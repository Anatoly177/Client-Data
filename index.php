<?php

require_once __DIR__ . '/other/data.php';
require_once __DIR__ . '/other/functions.php';

if (isset($_POST['add'])) {  // если нажата кнопка "Добавить"
    $fields = load($fields);
    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];
    if ($errors = validate($fields)) {   // вызов функции вылидации
        echo $errors;
    } else {         // если ошибок нет - заносим информацию в БД 
        $mysql = new mysqli("localhost", "mysql", "", "oborot"); //подключение к mySQL
        $mysql->query("INSERT INTO `clientdata` (`name`, `surename`, `phone`, `comment`) VALUES ('$name', '$surename', '$phone', '$comment')");
        $mysql->close();
      }
 } elseif (isset($_POST['show'])) { // // если нажата кнопка "Показать"
  $mysql = new mysqli("localhost", "mysql", "", "oborot"); //подключение к mySQL
  $result = $mysql->query("SELECT * FROM `clientdata` ORDER BY `name` ASC, `surename` ASC"); // запрос на выборку
  while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
  {
    $cell2 =  "<td>" . $row['name'] . "</td>";
    $cell3 =  "<td>" . $row['surename'] . "</td>";
    $cell4 =  "<td>" . $row['phone'] . "</td>";
    $cell5 =  "<td>" . $row['comment'] . "</td>";
    $table .= "<tr> $cell2 $cell3 $cell4 $cell5 </tr>";
    }                                                         // выводим на экран весь список в виде таблицы
    echo "<table class='table table-bordered table-striped'> 
    <thead>
      <tr>
        <th scope='col'>Имя</th>
        <th scope='col'>Фамилия</th>
        <th scope='col'>Телефон</th>
        <th scope='col'>Комментарий</th>
      </tr>
    </thead>
    <tbody>
    $table
      </tbody>
  </table>";
    $mysql->close();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oborotTask</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <form method="POST">
            
  <div class="form-group">
  <p><label for="name" class="form-label">Имя</label>
    <img src="image/sign-question-icon_34359.png" width="3%" alt="Вопрос" title="значение  обязательно для заполнения, должно быть больше 2ух символов, может содержать буквы и тире, максимальная длина 150 символов"></p>
    <input name="name" type="text" class="form-control" id="name"><br>


  <div class="form-group">
    <p><label for="surename" class="form-label">Фамилия</label>
    <img src="image/sign-question-icon_34359.png" width="3%" alt="Вопрос" title="значение  обязательно для заполнения, должно быть больше 2ух символов, может содержать буквы и тире, максимальная длина 150 символов"></p>
    <input name="surename" type="text" class="form-control" id="surename"><br>


  <div class="form-group">
    <p><label for="phone" class="form-label">Мобильный телефон</label>
    <img src="image/sign-question-icon_34359.png" width="3%" alt="Вопрос" title="значение обязательно для заполнения, должно быть больше или равно 10 символам, должно состоять только из цифр"></p>
    <input name="phone" type="text" class="form-control" id="phone"><br>


  <div class="form-group">
    <p><label for="comment" class="form-label">Комментарий</label>
    <img src="image/sign-question-icon_34359.png" width="3%" alt="Вопрос" title="может содержать произвольное кол-во символов"></p>
    <input name="comment" type="text" class="form-control" id="comment"><br>
 
  </div>
  <button name="add" type="submit" class="btn btn-primary">Добавить</button>
  <button name="show" type="submit" class="btn btn-primary">Показать</button>
 </div>
</form>
        </div>
    </div>
</div>
</body>
</html>