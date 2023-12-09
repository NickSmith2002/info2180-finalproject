<?php
$host = 'localhost';
$dbusername = 'project2_user';
$dbpassword = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbusername, $dbpassword);
$query = "SELECT * FROM Contacts";
// $query = "SELECT * FROM Users";
$stmt = $conn->query($query);
$results = $stmt->fetchALL(PDO::FETCH_ASSOC);

echo '
<!-- Dashboard Home -->
<section name="Home">
	<div id="db-home-header" class="dbdiv-header">
		<h2>Dashboard</h2>
		<input type="button" name="addcontact" value="+	Add Contact">
	</div>

	<div id="filter">
		<div id="stickypatch">
			<!-- Div makes filter.png stick to All -->
			<img src="images/filter.png" class="sideicon" alt="Filter Icon">
			<input type="button" value="All">
		</div>

		<input type="button" value="Sales Leads">
		<input type="button" value="Support">
		<input type="button" value="Assigned to me">
	</div>

	<table id="db-home-table">
		<th>Name</th>
		<th>Email</th>
		<th>Company</th>
		<th>Type</th>
		<th></th>';
		
		// echo var_dump($results);
		foreach($results as $row){
			echo '<tr>';
			echo '<td>'.$row["title"]." ".$row["firstname"]." ".$row["lastname"]."</td>";
			echo '<td>'.$row["email"].'</td>';
			echo '<td>'.$row["company"].'</td>';
			echo '<td>'.$row["contact_type"].'</td>';
			echo '<td><input type="button" value="View"></td>';
			echo '</tr>';
		}

		echo '</table>
</section>
'
?>