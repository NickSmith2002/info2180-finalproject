<?php
include 'conns.php';


if (isset($_GET['selector_button'])){

    
    $selected_btn = $_GET['selector_button'];

    if($selected_btn == 'all'){
        // echo "<p>This is a test in selectorButtons.php</P>";
        // Query to select all data from your_table_name
        $query = "SELECT * FROM Contacts";
        $stmt = $conn->prepare($query);

    } elseif ($selected_btn == 'SalesLead')  {
        // add code 
        $query =   "SELECT *
                    FROM Contacts
                    WHERE Contacts.type = 'SALES LEAD';";
                    // echo 'SalesLead';

        $stmt = $conn->prepare($query);
        
    }
    elseif ($selected_btn == 'Support')  {
        // add code 
        $query =   "SELECT *
                    FROM Contacts
                    WHERE Contacts.type = 'SUPPORT';";
        $stmt = $conn->prepare($query);
    }
    elseif ($selected_btn == 'Assignedtome')  {
        // add code 
        $query = "SELECT contacts.title, contacts.email,contacts.firstname, contacts.lastname, contacts.company, contacts.type, contacts.id FROM contacts JOIN users ON contacts.assigned_to = users.id WHERE users.email = :user_email";
        $stmt = $conn->prepare($query);

        // Bind the session email value to the parameter
        $stmt->bindParam(':user_email', $_SESSION['email']);
        
    }


        
        
        $stmt->execute();

        // Fetch all rows as associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '
        <table id="customers">
		<th>Name</th>
		<th>Email</th>
		<th>Company</th>
		<th>Type</th>
        <th></th>
		';
		
		// echo var_dump($results);
		foreach($results as $row){
			echo '<tr>';
			echo '<td>'.$row["title"]." ".$row["firstname"]." ".$row["lastname"]."</td>";
			echo '<td>'.$row["email"].'</td>';
			echo '<td>'.$row["company"].'</td>';
			echo '<td>'.$row["type"].'</td>';
			echo '<td> <p class = "dashboard_view" id = '.$row['id'].' > view </p> </td>';
			echo '</tr>';
		}
        
        unset($_SESSION['add_userOR_contact_btn']);
		
    
    } elseif(isset($_GET['userlist_'])){
        $query = "SELECT * FROM users";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        echo '
        <table id="customers">
		<th>Name</th>
		<th>Email</th>
		<th>Role</th>
		<th>Created</th>
       
		';
        foreach($results as $row){
			echo '<tr>';
			echo '<td>'.$row["firstname"]." ".$row["lastname"]."</td>";
			echo '<td>'.$row["email"].'</td>';
			echo '<td>'.$row["role"].'</td>';
			echo '<td>'.$row["created_at"].'</td>';
			
			echo '</tr>';
		}
        $_SESSION['add_userOR_contact_btn'] = "+ User";

      
    }


?>