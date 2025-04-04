<?php
session_start();

$request = $_GET['page'] ?? 'login';

switch ($request) {
    case 'login':
        include 'controllers/login_controller.php';
        break;
    case 'infractions':
        include 'controllers/infraction_controller.php';
        break;
    case 'admin':
        include 'controllers/admin_controller.php';
        break;
    default:
        include 'controllers/login_controller.php';
        break;
}
?>
