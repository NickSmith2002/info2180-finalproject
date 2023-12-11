<!-- <?php // adding login script
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
       if ($_SESSION['role']  && $_SESSION['cx_name'] ){

       }else{
        header("Location: dashboard.php");
        exit;
       }
    }

?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="contact.css" type="text/css" rel="stylesheet" />
	<!-- <script src="schema.js" type="text/javascript"></script> -->
    
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
                <h2 id = "contact_name"><?=$_SESSION['cx_name']?></h2>
                <p>Created on <?=$_SESSION['created_at']?> by <?=$_SESSION['created_by']?> </p>
                <p>Updated on <?=$_SESSION['updated_at']?></p>
            </div>
            <div class="btn">
                <button id="assign">Assign to me</button>
                <button id="switch">Switch to Sales Lead</button>
            </div>
            <div class="section" id="display-info">
                <div class="column">
                    <label for="email">Email</label>
                    <p> <?=$_SESSION['cx_email']?> </p>
                    <input type="email" id="email" name="email" placeholder=""/> 
                </div>
                <div class="column">
                    <label for="tel">Telephone</label>
                    <p> <?=$_SESSION['cx_tel']?> </p>
                    <input type="tel" id="tel" name="tel" placeholder=""/> 
                </div>
                <div class="column">
                    <label for="company">Company</label>
                    <p> <?=$_SESSION['cx_company']?> </p>
                    <input type="text" id="company" name="company" placeholder=""/> 
                </div>
                <div class="column">
                    <label for="assigned">Assigned To</label>
                    <p> <?=$_SESSION['cx_assigned']?> </p>
                    <input type="text" id="assigned" name="assigned" placeholder=""/> 
                </div>
            </div>
            <div class="section" id="note-section">
                <h4>Notes</h4>
                <hr>
                <?php 
                $notes = json_decode($_SESSION['notes'], true);
                
                foreach ($notes as $row) {
                    echo '<h4>'.$row['created_by_']. '</h4>';
                    echo '<p>'.$row['comment'].'</p>';
                    echo '<p class="date">'.date('F j, Y', strtotime($row['created_at'])).'</p>';
                
             
                }
                 
                ?>
                <h4>Add a note about <?= explode(" ", $_SESSION['cx_name'])[1] ?></h4>
                <textarea id="text" name="text">Enter details here...</textarea>
                <button id="add-note">Add Note</button>
            </div>
            
        </main> 
    </div>
    <script src="script.js" type="text/javascript"></script>
</body>
</html>