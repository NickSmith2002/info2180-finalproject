<?php
session_start();

//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
$host = 'localhost';
$dbusername = 'project2_user';
$dbpassword = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbusername, $dbpassword);

if(isset($_POST['login_email'])) {
	$password = filter_var($_POST['login_password'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);
	$query = "SELECT * FROM Users WHERE Users.email = '{$email}'";
	$stmt = $conn->query($query);
	$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
	
	if (sizeof($results) == 1) {
		if ($results[0]['password'] == $password) {
			$_SESSION['userid'] = $results[0]['id'];
			$_SESSION['userfirstname'] = $results[0]['firstname'];
			$_SESSION['userlastname'] = $results[0]['lastname'];
			$_SESSION['userpassword'] = $results[0]['password'];
			$_SESSION['useremail'] = $results[0]['email'];
			$_SESSION['userrole'] = $results[0]['role'];
			include 'sidebar.php';
			include 'home.php';
		}
		else {
			echo 'PASSWORD_ERROR';
		}
	}
	else {
		echo 'USERNAME_ERROR';
	}
}

$conn = null;

?>