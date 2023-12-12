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
        <link rel='stylesheet' href='adduser.css'>
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

                    <section class='link'>
                        <img src='./images/users.png' alt=''>
                        <button id='userlist'><i class='fa fa-user-circle-o' aria-hidden='true'></i>Users</button>
                    </section> 

                    <section class='link'>
                        <img src='./images/logout.png' alt=''>
                        <button id='logout'><i class='fa fa-sign-out' aria-hidden='true'></i>Logout</button>
                    </section> 
                </aside>
    
                
    
                <div id = 'show'>
                    <main>
    
                            <h2>New User</h2>
    
                            <div class = 'new-user'>
                                
                                <form action="new_user.php" action="get">
    
                                    <div class = 'user-info' id = 'firstname'>
                                        <label for = 'fname'>First Name</label><br>
                                        <input type = 'text' id = 'fname_user' name = 'fname' placeholder= 'Jane'>
                                    </div>
    
                                    <div class = 'user-info' id = 'lastname'>
                                        <label for = 'lname'>Last Name</label><br>
                                        <input type = 'text' id = 'lname_user' name = 'lname' placeholder= 'Doe'>
                                    </div>
    
                                    <div class = 'user-info' id = 'email'>
                                        <label for = 'email'>Email</label><br>
                                        <input type = 'email' id = 'email_user' name = 'email' placeholder= 'something@example.com'>
                                    </div>
    
                                    <div class='user-info' id='password'>
                                        <label for='password'>Password</label><br>
                                        <!-- pattern='^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' -->
                                        <input type='password' id='passwordInput_user' name='password'  title='Password must be at least 8 characters long and include at least one letter and one number.' required>
                                        <!-- The pattern attribute contains the regular expression -->
                                    </div>
    
                                    <div class = 'user-info' id = 'role'>
                                        <label for = 'role'>Role</label><br>
                                        <select id = 'role_user' name = 'role'>
                                            <option value = 'Member'>Member</option>
                                            <option value = 'Admin'>Admin</option>
                                        </select>
                                    </div>
                                    
                                    <div class = 'savediv'>
                                        <div class = 'save'>
                                            <button id = 'savebtn_NewUser' type= 'submit'>Save</button>
                                        </div>
                                    </div>
    
                                </form>
                            </div>
    
                    </main>
                </div>
        </div>
        </body>
    </html>;