<?php
include 'conns.php';

if (
    isset(
        $_POST['title_'],
        $_POST['f_name'],
        $_POST['l_name'],
        $_POST['email_'],
        $_POST['company_'],
        $_POST['assigned_to_'],
        $_POST['tel'],
        $_POST['type_']
    )
) {
    // Your database connection code (assuming $conn is your PDO connection)

    $title = $_POST['title_'];
    $firstname = $_POST['f_name'];
    $lastname = $_POST['l_name'];
    $email = $_POST['email_'];
    $telephone = $_POST['tel'];
    $company = $_POST['company_'];
    $type = $_POST['type_'];
    $assigned_to = 2;//$_POST['assigned_to_'];
    $created_by = $_SESSION['id']; // Assuming a default value for created_by, change as needed

    $created_at = date('Y-m-d H:i:s');
    $updated_at = $created_at;

    // SQL query with prepared statement
    $query = "INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at)
              VALUES (:title, :firstname, :lastname, :email, :telephone, :company, :type, :assigned_to, :created_by, :created_at, :updated_at)";

    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':assigned_to', $assigned_to);
    $stmt->bindParam(':created_by', $created_by);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->bindParam(':updated_at', $updated_at);

    // Execute the query
    $stmt->execute();

    // Optionally, you can check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        echo "Contact inserted successfully!";
    } else {
        echo "Error inserting contact.";
    }
}


?>