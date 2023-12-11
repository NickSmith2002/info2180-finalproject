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

    if (isset($_GET['view_id'])) {
        $query = "SELECT 
                    contacts.*,
                    CONCAT(users_created.firstname, ' ', users_created.lastname) AS created_by_name,
                    CONCAT(users_assigned.firstname, ' ', users_assigned.lastname) AS assigned_to_name
                  FROM contacts
                  LEFT JOIN users AS users_created ON contacts.created_by = users_created.id
                  LEFT JOIN users AS users_assigned ON contacts.assigned_to = users_assigned.id
                  WHERE contacts.id = :view_id";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':view_id', $_GET['view_id']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            // Populate session variables
            $_SESSION['cx_name'] = $result['title'] . ' ' . $result['firstname'] . ' ' . $result['lastname'];
            $_SESSION['cx_email'] = $result['email'];
            $_SESSION['cx_tel'] = $result['telephone'];
            $_SESSION['cx_company'] = $result['company'];
            $_SESSION['created_at'] = date('F j, Y', strtotime($result['created_at']));
            $_SESSION['updated_at'] = date('F j, Y', strtotime($result['updated_at']));
            $_SESSION['created_by'] = $result['created_by_name'];
            $_SESSION['cx_assigned'] = $result['assigned_to_name'];
        }
        $query2 = "SELECT 
                    *,
                    CONCAT(user_create.firstname,' ', user_create.lastname) AS created_by_
                    FROM notes
                    
                    -- LEFT JOIN contacts ON contacts.id = :view_id
                    LEFT JOIN users AS user_create ON notes.created_by = user_create.id
                    WHERE notes.contact_id = :view_id ";

        $stmt2 = $conn->prepare($query2);
        $stmt2->bindParam(':view_id', $_GET['view_id']);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $r = json_encode($result2);
        echo $r;
        $_SESSION['notes'] = $r;
    }


    
    
    ?>

