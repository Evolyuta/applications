<?php

function clearStr($data)
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

function addItemToList($name, $address, $phone, $email, $msg, $date)
{
    global $link;
    $sql = 'INSERT INTO applications (name, address, phone, email, msg, datetime) VALUES (?,?,?,?,?,?)';

    if (!$stmt = mysqli_prepare($link, $sql)) return false;
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $address, $phone, $email, $msg, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function selectItems()
{
    global $link;
    $sql = 'SELECT id, name, datetime FROM applications';

    if (!$result = mysqli_query($link, $sql)) return false;
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items;
}
