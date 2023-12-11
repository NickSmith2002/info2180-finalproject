


document.addEventListener('DOMContentLoaded', function(){
    var  selector_buttons = document.querySelector(".selector-buttons");
    var logout_btn = document.querySelector('#logout');
    
    // console.log(selector_buttons);

    logout_btn.addEventListener('click',function(){
        window.location.href = 'logout.php';

    });

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
                dashboard_view_all = document.querySelectorAll(".dashboard_view");
                // console.log(dashboard_view_all);
                for (var row of dashboard_view_all) {
                    console.log(row.id);
                    row.addEventListener('click',function(){
                        // add login to view customer info
                        cusotomerViewQuery(this.id);

                    });
                    // break;
                }

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
                dashboardDisplayQuery(buttonId);
                break;
            case 'Support':
                // Perform actions for the 'Support' button
                console.log('Support button clicked');
                dashboardDisplayQuery(buttonId);
                break;
            case 'Assignedtome':
                // Perform actions for the 'Assigned to me' button
                console.log('Assigned to me button clicked');
                dashboardDisplayQuery(buttonId);
                break;
            default:
                // Default action if the buttonId doesn't match any case
                console.log('Unknown button clicked');
        }
    }

    function cusotomerViewQuery(view_id_) {
        console.log(view_id_);
        queryStringData1 = {
            view_id:view_id_,
        };
        $.ajax({
            url: "contactsView.php", // Replace with your PHP script URL
            method: "GET",
            data: queryStringData1, // Data to be sent as a query string
            // dataType: "json", // Specify the expected data type
            // success: function(data) {
            // //     // Handle the successful response here
            //     console.log("Data received:", data);
            // },
            success: function(data) {
                // Display the response in the designated area
                
                // for (var row of dashboard_view_all) {
                //     console.log(row.id);
                //     row.addEventListener('click',function(){
                //         // add login to view customer info
                //         cusotomerViewQuery(row.id);

                //     });

                // }
                
                
                console.log("Data received:", data);
                window.open('contacts.php','_blank');
                
                // $('#contact_name').text('Calvin Stephenson');

                
                
            },
            error: function() {
                // Handle errors here
                console.error("Error in GET request");
            }

        });
    }
});