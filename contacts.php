<?php // adding login script
    session_start();
    // $role = $_SESSION['role']; 
    
    if(!isset($_SESSION['role'])){
        // true;
        header("Location: login.html");
        session_destroy();
        exit;
        
    }
    else{
       true;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="contact.css" type="text/css" rel="stylesheet" />
	<script src="schema.js" type="text/javascript"></script>
    <title>Contact Details</title>
</head>
<body>
    <div class="container">
        <header>
            <img src="images/dolphin.png" alt="picture of dolphin"/>
            <h1>Dolphin CRM</h1>
        </header>
        <div class="menu">
            <aside>
                <section class='link'>
                    <img src='./images/home.png' alt=''>
                    <button id='home'><i class='fa fa-home' aria-hidden='true'></i>Home</button>
                </section>

                <section class='link'>
                    <img src='./images/contact.png' alt=''>
                    <button id='adduser'><i class='fa fa-users' aria-hidden='true'></i>New Contact</button>
                </section> 

                <section class='link'>
                    <img src='./images/users.png' alt=''>
                    <button id='userlist'><i class='fa fa-user-circle-o' aria-hidden='true'></i>Users</button>
                </section> 

                <section class='link'>
                    <img src='./images/logout.png' alt=''>
                    <button id='logout'><i class='fa fa-sign-out' aria-hidden='true'></i>Logout</button>
                </section> 
            </aside>

        </div>
        <main>
            <div class="info">
                <img class="contact-img" src="images/uicon.png" alt="pic of icon"/>
                <h2>Mr. Michael Scott</h2>
                <p>Created on November 9, 2022 by David Wallace</p>
                <p>Updated on Novemeber 13, 2022</p>
            </div>
            <div class="btn">
                <button id="assign">Assign to me</button>
                <button id="switch">Switch to Sales Lead</button>
            </div>
            <div class="section" id="display-info">
                <div class="column">
                    <label for="email">Email</label>
                    <p> something </p>
                    <input type="email" id="email" name="email" placeholder=""/> 
                </div>
                <div class="column">
                    <label for="tel">Telephone</label>
                    <p> something </p>
                    <input type="tel" id="tel" name="tel" placeholder=""/> 
                </div>
                <div class="column">
                    <label for="company">Company</label>
                    <p> something </p>
                    <input type="text" id="company" name="company" placeholder=""/> 
                </div>
                <div class="column">
                    <label for="assigned">Assigned To</label>
                    <p> something </p>
                    <input type="text" id="assigned" name="assigned" placeholder=""/> 
                </div>
            </div>
            <div class="section" id="note-section">
                <h4>Notes</h4>
                <hr>
                <h4>Jane Doe</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec laoreet nisl. 
                    Mauris in mi efficitur, lobortis nibh ut, lobortis nisl. Curabitur volutpat nisi diam, 
                    eget tincidunt nibh accumsan ut. Nullam euismod ornare quam ut consectetur. Integer 
                    luctus purus metus, aliquam cursus erat elementum non. In et dui in diam porttitor vestibulum. 
                    Vivamus in laoreet justo, nec commodo elit.</p>
                <p class="date">November 10, 2022 at 4pm</p>
                <h4>John Doe</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec laoreet nisl. 
                    Mauris in mi efficitur, lobortis nibh ut, lobortis nisl. Curabitur volutpat nisi diam, 
                    eget tincidunt nibh accumsan ut. Nullam euismod ornare quam ut consectetur. Integer 
                    luctus purus metus, aliquam cursus erat elementum non. In et dui in diam porttitor vestibulum. 
                    Vivamus in laoreet justo, nec commodo elit.</p>
                <p class="date">November 10, 2022 at 4pm</p>
                <h4>John Doe</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec laoreet nisl. 
                    Mauris in mi efficitur, lobortis nibh ut, lobortis nisl. Curabitur volutpat nisi diam, 
                    eget tincidunt nibh accumsan ut. Nullam euismod ornare quam ut consectetur. Integer 
                    luctus purus metus, aliquam cursus erat elementum non. In et dui in diam porttitor vestibulum. 
                    Vivamus in laoreet justo, nec commodo elit.</p>
                <p class="date">November 10, 2022 at 4pm</p>
                <h4>Add a note about Michael</h4>
                <textarea id="text" name="text">Enter details here...</textarea>
                <button id="add-note">Add Note</button>
            </div>
        </main> 
    </div>
    
</body>
</html>