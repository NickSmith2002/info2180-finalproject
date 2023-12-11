<?php

session_start(); // Start the session at the beginning

$host       = 'localhost';
$db         = 'dolphin_crm';
$username   = 'dolphin_crm_user';
$password   = 'password123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



if (isset($_POST['login_btn_email']) && isset($_POST['login_btn_password'])) {
    $login_email = $_POST['login_btn_email'];
    $login_password = $_POST['login_btn_password'];


    $query = "SELECT * FROM users WHERE email = :login_email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':login_email', $login_email);
    $stmt->execute();

    // Fetch all rows as associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$results){
        echo "<p> Login failed </p>";
        exit;
    }

    foreach ($results as $row) {
        // code here to check for the member
        if ($row['email'] === $login_email && $row['password'] === $login_password) {
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_firstname'] = $row['firstname'];
            $_SESSION['user_lastname'] = $row['lastname'];
            echo "success";
            // break;
            exit;
        }
    }
    echo "<p> Login failed </p>";
    // $_SESSION['role'] = 'failed';
    // session_destroy();
}

?>
