<?php
session_start();

$regex_password = "/(?=^.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$/";
$host = 'localhost';
$dbusername = 'project2_user';
$dbpassword = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbusername, $dbpassword);

if (isset($_POST['posting'])) {
	if ($_SESSION['userrole'] == 'Admin') {
		echo '
		<!-- Add User -->
			<section>
				<div id="db-newuser-header" class="dbdiv-header">
					<h2>New User</h2>
				</div>

				<form id="newuserform"
					action="http://localhost/phpmyadmin/index.php?route=/table/structure&db=dolphin_crm&table=users">

					<div class="splittwo">
						<div class="inline-flex">
							<label for="fname">First Name</label>
							<input type="text" id="fname" name="fname" placeholder="Jane">
						</div>

						<div class="inline-flex">
							<label for="lname">Last Name</label>
							<input type="text" id="lname" name="lname" placeholder="Doe">
						</div>
					</div>

					<div class="splittwo">
						<div class="inline-flex">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" placeholder="something@example.com">
						</div>

						<div class="inline-flex">
							<label for="password">Password</label>
							<input type="text" id="password" name="password">
						</div>
					</div>


					<form id="role"
						action="http://localhost/phpmyadmin/index.php?route=/table/structure&db=dolphin_crm&table=users">
						<select name="role">
							<option value="member">Member</option>
						</select>


						<input type="button" id="newusersave" value="Save">


					</form>
				</form>
			</section>
		'
	}
	else {
		echo "NO PERMISSION";
	}
}
else {
	echo "ERROR";
}
?>