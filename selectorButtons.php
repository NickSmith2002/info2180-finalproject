<?php
$host       = 'localhost';
$db         = 'dolphin_crm';
$username   = 'dolphin_crm_user';
$password   = 'password123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}





if (isset($_GET['selector_button'])){

    
    $selected_btn = $_GET['selector_button'];
    // echo "<table id ='customers'";
    // echo "<thead>";
    //     echo "<tr>";
    //         echo "<th>". "Table Heading"."<th>";
    //         echo "<th>". "Table Heading"."<th>";
    //         // echo "<th>". "Table Heading"."<th>";
            
    //     echo "<tr>";
    // echo "</thead>";
    // echo '<p> The slected button is :  '.$selected_btn </p>`;
    // echo "knadfkjndfkjsdnfkjsdnfskjdfn";

    if($selected_btn == 'all'){
        // echo "<p>This is a test in selectorButtons.php</P>";
        // Query to select all data from your_table_name
        $query = "SELECT * FROM Contacts";
    } elseif ($selected_btn == 'SalesLead')  {
        // add code 
        $query =   "SELECT *
                    FROM Contacts
                    WHERE Contacts.type = 'SALES LEAD';";
                    // echo 'SalesLead';
        
    }
    elseif ($selected_btn == 'Support')  {
        // add code 
        $query =   "SELECT *
                    FROM Contacts
                    WHERE Contacts.type = 'SUPPORT';";
    }
    elseif ($selected_btn == 'Assignedtome')  {
        // add code 
        echo `<p>Assignedtome</p>`;
    }


    
        $stmt = $conn->prepare($query);
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
			echo '<td> <a href = "#"> view </a> </td>';
			echo '</tr>';
		}

		echo '</table>';
    
    }


?>