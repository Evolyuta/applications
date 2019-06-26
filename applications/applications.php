<?php
/* Основные настройки */


const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = "";
const DB_NAME = 'applications';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

function clearStr($data)
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clearStr($_POST['name']);
    $address = clearStr($_POST['address']);
    $phone = clearStr($_POST['phone']);
    $email = clearStr($_POST['email']);
    $msg = clearStr($_POST['msg']);
    $date = abs((int)(time()));

    $sql = 'INSERT INTO applications (name, address, phone, email, msg, datetime) VALUES (?,?,?,?,?,?)';

    if (!$stmt = mysqli_prepare($link, $sql)) return false;
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $address, $phone, $email, $msg, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
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

    <input type="submit" name="send" value="Отправить!"/>

</form>

