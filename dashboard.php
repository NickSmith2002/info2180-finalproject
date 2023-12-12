<?php // adding login script
    session_start();
    // $role = $_SESSION['role']; 
    
    if(!isset($_SESSION['role'] )){
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
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <title>dashboard</title>
        <!--link rel='stylesheet' href='dolphin.css'-->
        <link rel='stylesheet' href='dashboard.css'>
        <link rel='stylesheet' href='selectorButtons.css'>
        <!-- <script type='module' src='scripts/main.js'></script> -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type='text/javascript' src='script.js'></script>

    </head>
    
    <body>
        <header>
            <div id="header-div">
                <a href="index.html">
                    <div id="home-click">
                        <img id="dolphin-logo" src="images/dolphin.png" />
                        <h1>Dolphin CRM</h1>
                    </div>
                </a>
            </div>
        </header>

        <div class="container">
                <aside>
                    <section class='link'>
                        <img src='./images/home.png' alt=''>
                        <button id='home'><i class='fa fa-home' aria-hidden='true'></i>Home</button>
                    </section>

                    <section class='link'>
                        <img src='./images/contact.png' alt=''>
                        <button id='adduser'><i class='fa fa-users' aria-hidden='true'></i>New Contact</button>
                    </section> 

                    <?php 
                    if (isset($_SESSION['role'])) {
                    if ($_SESSION['role']=="Admin") {
                    echo '<section id ="admin_only" class="link">
                        <img src="./images/users.png" alt= "">
                        <button id="userlist"><i class="fa fa-user-circle-o" aria-hidden"true"></i>Users</button>
                    </section> ';}}
                    ?>

                    <section class='link'>
                        <img src='./images/logout.png' alt=''>
                        <button id='logout'><i class='fa fa-sign-out' aria-hidden='true'></i>Logout</button>
                        
                        <!-- <a href="#">THis </a> -->
                    </section> 
                </aside>
    
                
    
                    <div id = 'show'>
                    <main>
    
                    <div class='page-top'>
                        <h2>Dashboard</h2>
    
                        <div>
                            <button id='createBtn'><?php if (isset($_SESSION['add_userOR_contact_btn'])) {echo '+ Add User';}else{echo '+ New Contact';} ?></button>
                        </div>
                    </div>
    
                    <div class='selectors'>
                        <p>Filter By: </p>
    
                        <div class='selector-buttons'>
                            <button id='all' class='filterBtn'>ALL</button>
                            <button id='SalesLead' class='filterBtn'>Sales Lead</button>
                            <button id='Support' class='filterBtn'>Support</button>
                            <button id='Assignedtome' class='filterBtn'>Assigned to me</button>

                        </div>
                    </div>

                    <div id = 'table'></div>
                    </div>
                </main>
            </div>
        </div>
        </body>
    </html>;