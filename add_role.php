<?php
require_once 'db.php'; // подключаем БД
?>
<ul>
  <li><a href="/">Список пользоваталей</a></li>
  <li><a href="/add_user.php">Добавить пользователя</a></li>
</ul>
<form method="post" action="/add_role.php">
<label>Введите название роли:</label>
<input type="text" value="" name="rolename" placeholder="Введите название роли:"><br>
<button type="submit">Создать роль</button>
</form>
<?php
if (!empty($_POST['rolename'])){
$rolename= $_POST['rolename'];
$query ="INSERT INTO user_role SET rolename='".$rolename."'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Роль ";
    echo $rolename;
    echo " успешно создана.";
}else{
  echo "Произошла ошибка.";
}


mysqli_close($link);
}
?>
