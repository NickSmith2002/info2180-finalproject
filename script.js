


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