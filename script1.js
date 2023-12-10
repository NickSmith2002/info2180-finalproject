


document.addEventListener('DOMContentLoaded', function(){
    var  selector_buttons = document.querySelector(".selector-buttons");
    console.log(selector_buttons);

for ( var element of selector_buttons.children ){
    element.addEventListener('click',function(){

        handleButtonClick(this.id);



    });


   
}

function dashboardDisplayQuery(selectotBtn_id){
    var queryStringData = {
        selector_button: selectotBtn_id,
        // Add more parameters as needed
    };
    
    $.ajax({
        url: "selectorButtons.php", // Replace with your PHP script URL
        method: "GET",
        data: queryStringData, // Data to be sent as a query string
        // dataType: "json", // Specify the expected data type
        // success: function(data) {
        //     // Handle the successful response here
        //     console.log("Data received:", data);
        // },
        success: function(response) {
            // Display the response in the designated area
            $("#table").html(response);
        },
        error: function() {
            // Handle errors here
            console.error("Error in GET request");
        }

    });
}


function handleButtonClick(buttonId) {
    switch (buttonId) {
        case 'all':
            // Perform actions for the 'ALL' button
            console.log('ALL button clicked');
            dashboardDisplayQuery(buttonId);
            break;
        case 'SalesLead':
            // Perform actions for the 'Sales Lead' button
            console.log('Sales Lead button clicked');
            break;
        case 'Support':
            // Perform actions for the 'Support' button
            console.log('Support button clicked');
            break;
        case 'Assignedtome':
            // Perform actions for the 'Assigned to me' button
            console.log('Assigned to me button clicked');
            break;
        default:
            // Default action if the buttonId doesn't match any case
            console.log('Unknown button clicked');
    }
}
});

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


#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }