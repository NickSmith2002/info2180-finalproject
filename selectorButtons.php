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

    if($selected_btn == 'all'){
        echo "<p>This is a test in selectorButtons.php</P>";
    }


    
}

?>