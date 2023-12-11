document.addEventListener('DOMContentLoaded',function(){
    // code to implement the login.html page
    console.log("connected to login_button.js");

    var login_btn = document.querySelector('#login-button');
    

    login_btn.addEventListener('click',function(event){
        var email_input = $('#login-email').val() ;
        var password_input = $('#login-password').val() ;
        event.preventDefault();
        loginQuery(email_input,password_input);
    });  

    function loginQuery(login_email,login_password){
        var queryStringData = {
            login_btn_email:login_email,
            login_btn_password:login_password,
            // Add more parameters as needed
        };
       
        
        $.ajax({
            url: "login_button.php", // Replace with your PHP script URL
            method: "POST",
            data: queryStringData, // Data to be sent as a query string
            success: function(response) {
                // Display the response in the designated area
                console.log(response); 
                if (response == "success") {
                    window.location.href = 'dashboard.php';
                }else{
                    $('#login-error').html(response);
                }
            },
            error: function() {
                // Handle errors here
                console.error("Error in GET request");
            }
    
        });
    }


});

