<?
require_once "secure/session.inc.php";
require_once "secure/secure.inc.php";
if(isset($_GET['logout'])){
    logOut();
}
?><!DOCTYPE HTML>
<html>
<head>
    <title>Администрирование</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Администрирование заявок</h1>
<h3>Доступные действия:</h3>
<ul>
    <li><a href='applicationsList.php'>Просмотр готовых заявок</a></li>
    <li><a href='secure/create_user.php'>Добавить менеджера</a></li>
    <li><a href='index.php?logout'>Завершить сеанс</a></li>
</ul>
</body>
</html>
