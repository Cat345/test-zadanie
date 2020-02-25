<?php
require_once 'db.php'; // подключаем БД
$query ="select * from `user_role`";
$roles = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
?>
<ul>
  <li><a href="/">Список пользователей</a></li>
  <li><a href="/add_role.php">Добавить роль</a></li>
</ul>
<form method="post" action="/add_user.php">
<label>Введите имя пользователя:</label>
<input type="text" value="" name="username" placeholder="Введите имя пользователя:"><br>
<select name="role_id">
<?php
foreach ($roles as $role) {
  echo"<option value='".$role[id]."'>".$role[rolename]."</option>";
}
?>
<select><br>
<button type="submit">Создать пользователя</button>
</form>
<?php
if ((!empty($_POST['username']))&&(!empty($_POST['role_id']))){
$username= $_POST['username'];
$role_id= $_POST['role_id'];
$query2 ="INSERT INTO user SET username='".$username."', role_id='".$role_id."'";
$result = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));
if($result)
{
    echo "Пользователь ";
    echo $username;
    echo " успешно создан.";
} else{
  echo "Произошла ошибка.";
}
mysqli_close($link);
}

?>
