<?
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: /applications/admin/secure/login.php?ref='.
        $_SERVER['REQUEST_URI']);
    exit;
}