<?php
require "inc/lib.inc.php";
require "inc/config.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clearStr($_POST['name']);
    $address = clearStr($_POST['address']);
    $phone = clearStr($_POST['phone']);
    $email = clearStr($_POST['email']);
    $msg = clearStr($_POST['msg']);
    $date = time();
    addItemToList($name, $address, $phone, $email, $msg, $date);
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit;
}
?>

<h3>Оставьте заявку в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    ФИО: <br/><input type="text" name="name"/><br/>
    Адрес: <br/><input type="text" name="address"/><br/>
    Телефон: <br/><input type="text" name="phone"/><br/>
    Email: <br/><input type="text" name="email"/><br/>
    Сообщение: <br/><textarea name="msg"></textarea><br/>

    <br/>

    <input type="submit" name="send" value="Отправить"/>

</form>
