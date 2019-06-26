<?php
require "../inc/lib.inc.php";
require "../inc/config.inc.php";
$clients = selectItems();
if ($clients === false) {
    echo "Error!";
    exit;
}
if (!count($clients)) {
    echo "Empty!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Список заявок</title>
</head>
<body>
<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    Фильтр по ФИО: <br/><input type="text" name="name"/><br/>
    Фильтр по адресу: <br/><input type="text" name="address"/><br/>
    <br/>

    <input type="submit" name="send" value="Посмотреть"/>

</form>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>ФИО</th>
        <th>Адрес</th>
        <th>Телефон</th>
        <th>E-mail</th>
        <th>Дата и время</th>
        <th>Посмотреть и редактировать</th>
    </tr>
    <?php

    if ($_POST['name']) $isName = 1;
    if ($_POST['address']) $isAddress = 1;

    foreach ($clients as $client) {
        if (!$isName) $_POST['name'] = $client['name'];
        if (!$isAddress) $_POST['address'] = $client['address'];
        if (stristr($client['name'], $_POST['name']) and
            stristr($client['address'], $_POST['address'])) {
            ?>
            <tr>
                <td><?= $client['name'] ?></td>
                <td><?= $client['address'] ?></td>
                <td><?= $client['phone'] ?></td>
                <td><?= $client['email'] ?></td>
                <td><?= date("d-m-Y H:i:s", $client['datetime']) ?></td>
                <td><a href="showAndEdit.php?id=<?=
                    $client['id'] ?>">Посмотреть и редактировать</td>
            </tr>
            <?
        }
    }


    ?>
</table>
<?="<a href='index.php'>Вернуться к администрированию";?>
</body>
</html>
