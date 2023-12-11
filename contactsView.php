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
    
    // if(!isset($_SESSION['role'])){
    //     // true;
    //     header("Location: login.html");
    //     session_destroy();
    //     exit;
        
    // }
    // else{
    //     true;
    // }
    // const socket = new WebSocket('ws://localhost:5500/ws');

    if(isset($_GET['view_id']) ) {

        $query = "SELECT * FROM contacts WHERE contacts.id = :view_id" ;
      
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':view_id', $_GET['view_id']);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        $jsonData = json_encode($results);
        // Send the JSON response to the JavaScript
        echo $jsonData;

        if (count($results) == 1 ){
            $row =$results[0];
            $create_at = new DateTime($row['created_at']);
            $updated_at = new DateTime($row['updated_at']);
            $_SESSION['cx_name'] = $row['title'].' '.$row['firstname'].' '.$row['lastname'];
            $_SESSION['cx_email'] = $row['email'];
            $_SESSION['cx_tel'] = $row['telephone'];
            $_SESSION['cx_company'] = $row['company'];
            $_SESSION['created_at'] = $create_at->format('F j, Y');
            $_SESSION['updated_at'] = $updated_at->format('F j, Y');
            
            // working on ...
            $query2 = "SELECT users.firstname, users.lastname 
                FROM users 
                JOIN contacts ON contacts.created_by = users.id 
                WHERE contacts.id = :view_id"; 

                $stmt2 = $conn->prepare($query2);
                $stmt2->bindParam(':view_id', $_GET['view_id']);
                $stmt2->execute();
                $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                $jsonData2 = json_encode($results2);
            //Send the JSON response to the JavaScript
                echo $jsonData2;
                $row2 = $results2[0];
                $_SESSION['created_by'] = $row2['firstname'].' '.$row2['lastname'];
                

            // $_SESSION['created_by'] = $row['created_by'];
            // working on ...
            $query3 = "SELECT users.firstname, users.lastname, contacts.assigned_to 
                FROM users 
                JOIN contacts ON contacts.assigned_to = users.id 
                WHERE contacts.id = :view_id"; 

                $stmt3 = $conn->prepare($query3);
                $stmt3->bindParam(':view_id', $_GET['view_id']);
                $stmt3->execute();
                $results3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                $jsonData3 = json_encode($results3);
            // Send the JSON response to the JavaScript
                echo $jsonData3;
                $row3 = $results3[0];
                $_SESSION['cx_assigned'] = $row3['firstname'].' '.$row3['lastname'];
        }
        // header('Location: contacts.php');
        // exit;



    }
    
    ?>

