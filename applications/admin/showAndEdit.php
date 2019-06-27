<?php
require "../inc/lib.inc.php";
require "../inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Просмотр заявки</title>
    <meta charset="utf-8">
</head>
<body>
<? $id = abs((int)$_GET['id']);
if ($id) {
    $client = getItem($id);
    ?>
    <hr>
    <p><b>Клиент</b>:<?= $client["name"] ?> </p>
    <p><b>Адрес</b>: <?= $client["address"] ?></p>
    <p><b>Телефон</b>:<?= $client["phone"] ?> </p>
    <p><b>Email</b>: <?= $client["email"] ?></p>
    <p><b>Дата размещения заявки</b>: <?= date("d-m-Y H:i", $client["datetime"]) ?></p>
    <p><b>Сообщение от клиента</b>: <?= $client["msg"] ?></p>
    <?

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['name']) $name = clearStr($_POST['name']); else $name = $client["name"];
    if ($_POST['address']) $address = clearStr($_POST['address']); else $address = $client["address"];
    if ($_POST['phone']) $phone = clearStr($_POST['phone']); else $phone = $client["phone"];
    if ($_POST['email']) $email = clearStr($_POST['email']); else $email = $client["email"];
    if ($_POST['msg']) $msg = clearStr($_POST['msg']); else $msg = $client["msg"];
    $date = $client["datetime"];
    editItem($name, $address, $phone, $email, $msg, $date, $id);

    echo "Заявка изменена! <a href='applicationsList.php'>Вернуться к списку заявок";
    exit;
}
?>

<h3>Редактирование</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    ФИО: <br/><input type="text" name="name"/><br/>
    Адрес: <br/><input type="text" name="address"/><br/>
    Телефон: <br/><input type="text" name="phone"/><br/>
    Email: <br/><input type="text" name="email"/><br/>
    Сообщение: <br/><textarea name="msg"></textarea><br/>

    <br/>

    <input type="submit" name="send" value="Сохранить изменения"/>

</form>

</body>
</html>
