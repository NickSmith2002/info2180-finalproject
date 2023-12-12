<?php
include 'conns.php';

if (
    isset(
        
        $_POST['f_name_user'],
        $_POST['l_name_user'],
        $_POST['email_user'],
        $_POST['password_user'],
        $_POST['role_user']
    )
) {
    // Your database connection code (assuming $conn is your PDO connection)

    $fname = $_POST['f_name_user'];
    $lname = $_POST['l_name_user'];
    $email = $_POST['email_user'];
    $password = password_hash($_POST['password_user'], PASSWORD_DEFAULT); // Hash the password
    $role = $_POST['role_user'];

    // Your SQL query to insert a new user
    $query = "INSERT INTO Users (firstname, lastname, password, email, role, created_at) 
              VALUES (:fname, :lname, :password, :email, :role, NOW())";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
        // User successfully inserted
        echo json_encode(['status' => 'success', 'message' => 'User created successfully.']);
    } else {
        // Error in execution
        echo json_encode(['status' => 'error', 'message' => 'Error creating user.']);
    }
} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

?>