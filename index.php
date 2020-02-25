<?php
require_once 'db.php'; // подключаем БД
$query ="select user.id, user.username, user_role.rolename from user INNER JOIN user_role on user.role_id = user_role.id";
$users = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
?>

<ul>
  <li><a href="/add_role.php">Добавить роль</a></li>
  <li><a href="/add_user.php">Добавить пользователя</a></li>
</ul>
<table align="center" width="100%" border="1">
  <tr>
    <th>
    id
  </th>
    <th>
    Имя пользователя
  </th>
    <th>
    Роль
  </th>
  </tr>
  <?php
  foreach ($users as $user) {
  ?>
	<tr>
		<td>
	<?php echo $user[id];?>
		</td>
		<td>
		<?php echo $user[username];?>
		</td>
    <td>
			<?php echo $user[rolename];?>
		</td>
	</tr>
  <?php
}
?>
</table>
