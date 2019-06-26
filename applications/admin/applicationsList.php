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
    <title>Каталог товаров</title>
</head>
<body>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th><a href="applicationsList.php">ФИО</th>
        <th>Дата</th>
        <th>Время</th>
        <th>Посмотреть</th>
        <th>Редактировать</th>
    </tr>
    <?php

    foreach ($clients as $client) {
        ?>
        <tr>
            <td><?= $client['name'] ?></td>
            <td><?= date("d-m-Y", $client['datetime']) ?></td>
            <td><?= date("H:i", $client['datetime']) ?></td>
            <td><a href="show.php?id=<?=
                $client['id'] ?>">Посмотреть</td>
            <td><a href="edit.php?id=<?=
                $client['id'] ?>">Редактировать</td>
        </tr>
        <?
    }
    ?>
</table>
</body>
</html>
