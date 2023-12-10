<?php
session_start();

$host = 'localhost';
$dbusername = 'project2_user';
$dbpassword = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbusername, $dbpassword);

if (isset($_POST['menu_selection']) and isset($_SESSION['userrole'])) {
	if ($_POST['menu_selection'] == 'Home') {
		include 'home.php';
	}
	elseif ($_POST['menu_selection'] == 'New Contact') {
		include 'newcontact.php';
	}
	elseif ($_POST['menu_selection'] == 'Users' and $_SESSION['userrole'] == 'Admin') {
		include 'users.php';
	}
	elseif ($_POST['menu_selection'] == 'Logout') {
		session_unset();
		session_destroy();
		echo 'log out';
	}
	else {
		echo 'ERROR';
	}
}
else {echo 'ERROR';}

$conn = null;
?>