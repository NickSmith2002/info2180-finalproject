<?php 
// session_start(); 
include 'loadAdminAssign.php';
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



            <!-- <section class='link'>
                <img src='./images/users.png' alt=''>
                <button id='userlist'><i class='fa fa-user-circle-o' aria-hidden='true'></i>Users</button>
            </section> -->

            <?php 
            // session_start();
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role']=="Admin") {
                        echo '<section id ="admin_only" class="link">
                            <img src="./images/users.png" alt= "">
                            <button id="userlist"><i class="fa fa-user-circle-o" aria-hidden"true"></i>Users</button>
                        </section> ';
                    }
                }
            ?>

            

            <section class='link'>
                <img src='./images/logout.png' alt=''>
                <button id='logout'><i class='fa fa-sign-out' aria-hidden='true'></i>Logout</button>
            </section>
        </aside>



        <div id='show'>
            <main>

                <h2>New Contact</h2>

                <div class="new-contact">

                    <form action="new_contact.php" action="get">

                        <div class="contact-info" id='titleci'>
                            <label for="title">Title</label>
                            <select name="title" id="title">
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                                <option value="None">None</option>
                            </select>
                        </div>

                        <div class="contact-info" id='firstnameci'>
                            <label for="fname">First Name</label><br>
                            <input id="fname" type="text" name="fname" placeholder="Jane" />
                        </div>

                        <div class="contact-info" id='lastnameci'>
                            <label for="lname">Last Name</label><br>
                            <input id="lname" type="text" name="lname" placeholder="Doe" />
                        </div>

                        <div class="contact-info" id='emailci'>
                            <label for="email">Email</label><br>
                            <input id="email" type="email" name="email" placeholder="something@example.com" />
                        </div>

                        <div class="contact-info" id='telephoneci'>
                            <label for="tel">Telephone</label><br>
                            <input id="tel" type="tel" name="tel" placeholder="123-456-7890" />
                        </div>

                        <div class="contact-info" id='companyci'>
                            <label for="company">Company</label><br>
                            <input id="company" type="text" name="company" />
                        </div>

                        <div class="contact-info" id='typeci'>
                            <label for="type">Type</label><br>
                            <select name="type" id="type">
                                <option value="Sales Lead">Sales Lead</option>
                                <option value="Support">Support</option>
                            </select>
                        </div>
                        
                        <div>
                        
                        
                        </div>

                        <div class="contact-info" id='assignedci'>
                            <label for="assigned">Assigned To</label><br>
                            <select name="assigned" id="assigned">
                            <?php
                                session_start();
                                
                                foreach ($_SESSION['admin_view_users'] as $key => $value) {
                                    echo '<option value="' . $key . '">' . $key. '</option>';
                                    
                                }
                                
                                 ?>
                                <!-- <option value="rand()">Andy Bernard</option>
                                <option value="rand()">Jen Levinson</option>
                                <option value="rand()">Michael Scott</option>
                                <option value="rand()">David Wallace</option> -->
                            </select>
                        </div>

                        <div class='savediv'>
                            <div class='save'>
                                <button id='savebtn' type='submit'>Save</button>
                            </div>
                        </div>

                    </form>
                </div>

            </main>
        </div>
    </div>
</body>

</html>;