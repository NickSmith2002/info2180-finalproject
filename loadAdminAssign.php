<?php 

// session_start(); // Start the session at the beginning

include 'conns.php';

    $query = "SELECT * FROM users" ;
    // WHERE email = :login_email;
    $stmt = $conn->prepare($query);
    // $stmt->bindParam(':login_email', $login_email);
    $stmt->execute();

    // Fetch all rows as associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$results){
        
        exit;
    }
    $_SESSION['admin_view_users'] = [];
    foreach ($results as $row) {
       
        $_SESSION['admin_view_users'][$row['firstname'] . ' ' . $row['lastname']] = $row['id'];
    }

    if (isset($_SESSION['role'] )) {
        
        if ($_SESSION['role'] == "Member"){
            unset($_SESSION['admin_view_users']);
            $full_name = $_SESSION['user_firstname'].' '.$_SESSION['user_lastname'];
            $_SESSION['admin_view_users'] = [$full_name => $_SESSION['id']];
        } elseif($_SESSION['role'] != "Admin"){
            unset($_SESSION['admin_view_users']);
        }
    }

    if (!isset($_SESSION['role'])){
        session_destroy();
        exit;

    }
   ?>

