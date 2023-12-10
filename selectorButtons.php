<?php
$host       = 'localhost';
$db         = 'dolphin_crm';
$username   = 'dolphin_crm_user';
$password   = 'password123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}





if (isset($_GET['selector_button'])){

    
    $selected_btn = $_GET['selector_button'];
    echo "<table id ='customers'";
    echo "<thead>";
        echo "<tr>";
            echo "<th>". "Table Heading"."<th>";
            echo "<th>". "Table Heading"."<th>";
            // echo "<th>". "Table Heading"."<th>";
            
        echo "<tr>";
    echo "</thead>";

    if($selected_btn == 'all'){
        echo "<p>This is a test in selectorButtons.php</P>";
        // Query to select all data from your_table_name
        $query = "SELECT * FROM Contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // Fetch all rows as associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            echo "<tr>".$row['title']." " .$row['firstname']."</tr>";
            echo "<tr>".$row['lastname']."</tr>";
        }
    }


    echo "</table>";
    
}

?>