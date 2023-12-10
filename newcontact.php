<?php
echo '
<!-- New Contact Form -->
<section name="New Contact">
	<div id="db-newcontact-header" class="dbdiv-header">
		<h2>New Contact</h2>
	</div>
	<form id="newcontactform">

		<div class="flex-block">
			<label>Title</label>
			<select>
				<option>Mr</option>
				<option>Mrs</option>
				<option>Ms</option>
				<option>Dr</option>
			</select>
		</div>

		<div class="splittwo">
			<div class="inline-flex">
				<label>First Name</label>
				<input type="text" placeholder="John">
			</div>

			<div class="inline-flex">
				<label>Last Name</label>
				<input type="text" placeholder="Doe">
			</div>
		</div>

		<div class="splittwo">
			<div class="inline-flex">
				<label>Email</label>
				<input type="text" placeholder="something@example.com">
			</div>
			<div class="inline-flex">
				<label>Telephone</label>
				<input type="text" placeholder="(123)456-7890">
			</div>
		</div>

		<div class="splittwo">
			<div class="inline-flex">
				<label>Company</label>
				<input type="text" placeholder="Example Ltd.">
			</div>

			<div class="inline-flex">
				<label>Type</label>
				<select>
					<option>Sales Lead</option>
				</select>
			</div>
		</div>

		<div class="flex-block">
			<label>Assigned To</label>
			<select>
				<option>Me</option>
			</select>
		</div>

		<input type="button" value="Save" id="savenewcontact">
</section>
'
?>