document.addEventListener('DOMContentLoaded', function(){
    var selector_buttons = document.querySelector(".selector-buttons");
    var logout_btn = document.querySelector('#logout');

    // Logout button click event
    logout_btn.addEventListener('click', function(){
        window.location.href = 'logout.php';
    });

    // Selector buttons click events
    for (var element of selector_buttons.children){
        element.addEventListener('click', function(){
            handleButtonClick(this.id);
        });
    }

    // Function to handle button clicks
    function handleButtonClick(buttonId) {
        switch (buttonId) {
            case 'all':
            case 'SalesLead':
            case 'Support':
            case 'Assignedtome':
                // Perform actions for the respective buttons
                console.log(buttonId + ' button clicked');
                dashboardDisplayQuery(buttonId);
                break;
            default:
                console.log('Unknown button clicked');
        }
    }

    // Function to handle dashboard display query
    function dashboardDisplayQuery(selectorBtnId) {
        var queryStringData = {
            selector_button: selectorBtnId,
            // Add more parameters as needed
        };

        $.ajax({
            url: "selectorButtons.php",
            method: "GET",
            data: queryStringData,
            success: function(response) {
                // Display the response in the designated area
                $("#table").html(response);

                // Add click events to dashboard view rows
                dashboard_view_all = document.querySelectorAll(".dashboard_view");
                for (var row of dashboard_view_all) {
                    row.addEventListener('click', function(){
                        // Open a new window/tab with contacts.php
                        cusotomerViewQuery(this.id);
                    });
                }
            },
            error: function() {
                console.error("Error in GET request");
            }
        });
    }

    // Function to handle customer view query
    function cusotomerViewQuery(viewId) {
        var queryStringData1 = {
            view_id: viewId,
        };

        $.ajax({
            url: "contactsView.php",
            method: "GET",
            data: queryStringData1,
            success: function(data) {
                // Display the response in the designated area
                console.log("Data received:", data);

                // Open a new window/tab with contacts.php
                window.open('contacts.php', '_blank');
            },
            error: function() {
                console.error("Error in GET request");
            }
        });
    }
});

$(document).ready(function () {
    var switch_btn = $('#switch');
    switch_btn.on('click', function () {
        switch_btn.text("clicked");
    });
});
