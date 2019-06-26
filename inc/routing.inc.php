<?php
switch ($id) {
    case 'contact':
        include 'inc/contact.inc.php';
        break;
    case 'gbook':
        include 'inc/gbook.inc.php';
        break;
    default:
        include 'inc/index.inc.php';
}
