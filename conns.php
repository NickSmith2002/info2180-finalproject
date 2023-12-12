<?php
    session_start();
    // $role = $_SESSION['role']; 
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
    ?>