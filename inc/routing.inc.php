<?php
switch ($id) {
    case 'contact':
        include 'inc/contact.inc.php';
        break;
    case 'gbook':
        include 'applications/applications.php';
        break;
    default:
        include 'inc/index.inc.php';
}
