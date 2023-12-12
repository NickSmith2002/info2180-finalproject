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
        $('#createBtn').text('+ New Contact');
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
    var add_user = $('#adduser');
    var createBtn = $('#createBtn');
    var home_ = $('#home');
    var userlist_btn = $('#userlist');

    switch_btn.on('click', function () {
        switch_btn.text("clicked");
        queryStringData = {
            switch_to : switch_btn.text() 
        }
        
        $.ajax({
            url: "contactsView.php",
            method: "GET",
            data: queryStringData,
            success: function(response) {
                // Display the response in the designated area
                switch_btn.text("Switch to " + response.newType);
            },
            error: function() {
                console.error("Error in GET request");
            }
        });
    });


    createBtn.on('click', function () {
        if ($('#createBtn').text() == "+ Add User"){
            window.location.href = 'new_user.php';
        }
        else{
            window.location.href = 'new_contact.php';
        }
        
    });

    home_.on('click', function () {
        window.location.href ='dashboard.php';

    });

    add_user.on('click', function () {
        window.location.href ='new_contact.php';

    });

    userlist_btn.on('click', function () {
        var add_btn = $('#createBtn').text();
        queryStringData = {
            userlist_ : 'clicked' 
        }
        $.ajax({
            url: "selectorButtons.php",
            method: "GET",
            data: queryStringData,
            success: function(response) {
                // Display the response in the designated area
                $("#table").html(response);
               if(add_btn == '+ Add User'){
                
            }else{
                $('#createBtn').text('+ Add User');
            }

            
            },
            error: function() {
                console.error("Error in GET request");
            }
        });
    });


    var add_Newcontact = $('#savebtn');

    add_Newcontact.on('click', function (event) {
        event.preventDefault();
        queryStringData = {
            title_ : $('#title').val(),
            f_name: $('#fname').val(),
            l_name: $('#lname').val(),
            email_: $('#email').val(),
            company_: $('#company').val(),
            assigned_to_: $('#assigned').val(),
            tel: $('#tel').val(),
            type_: $('#type').val()

        }
        
      
        
        console.log(queryStringData);
        
        $.ajax({
            url: "add_cusomerLogic.php",
            method: "POST",
            data: queryStringData,
            success: function(response) {
                // Display the response in the designated area
                // switch_btn.text("Switch to " + response.newType);
            },
            error: function() {
                console.error("Error in GET request");
            }
        });
    });


});
