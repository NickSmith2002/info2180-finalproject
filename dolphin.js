$(document).ready(function() {
	if ($.trim($("#login-div").html())) {
		console.log("login div is ready");
		$("#login-button").click(function() {
			let loginemail = $("#login-email").val();
			let loginpassword = $("#login-password").val();
			$.post("login.php",
			{
				login_email: loginemail,
				login_password: loginpassword
			},
			function(data,status) {
				console.log("Data: " + data + "\nStatus: " + status);
				if (data == "USERNAME_ERROR") {
					$("#login-error").html("Invalid Username")
				}
				else if (data == "PASSWORD_ERROR") {
					$("#login-error").html("Incorrect Password")
				}
				else {
					$("#login-error").empty();
					$("#login-div").hide();
					$("#db-div").append(data);
					menuInteract();
				}
			});
		});
	}
	function menuInteract() {
		$("aside li").click(function() {
			selection = $(this).text();
			if (selection != $("#db-div section").attr("name")) {
				$.post("navmenu.php",
				{
					menu_selection: selection
				},
				function(data, status) {
					console.log("Data: " + data + "\nStatus: " + status);
					if (data == "ERROR") {
						alert("ERROR!");
					}
					else if (data == "log out") {
						$("#db-div").empty();
						$("#login-div").show();
					}
					else {
						$("#db-div section").remove();
						$("#db-div").append(data);
						switch(selection) {
							case "Home":
								homelogic();
								break;
							case "New Contact":
								newcontactlogic();
								break;
							case "Users":
								userlogic();
								break;
							
						}
					}
				});
			}
		});
	}
	function homelogic() {
		$("#db-home-header input").click(function() {
			
		});
		$("#filter input['type=button']").click(function() {
			
		});
		$("#db-home-table input['value=View']").click(function() {
			
		});
	}
	function newcontactlogic() {
		$("#savenewcontact").click(function() {
			console.log("Button Clicked!");
			$.post("contactlogic.php",
			{
				first_name: $("#first_name").val(),
				last_name: $("#last_name").val(),
				title: $("#title").val(),
				email: $("#email").val(),
				phone: $("#phone").val(),
				company: $("#company").val(),
				type: $("#type").val(),
			},

			function(data,status){
				console.log("Data: " + data + "\nStatus: " + status);

			});
		});
	}
	function userlogic() {
		$("#add_user").click(function() {
			console.log("hey");
			$.post("newuser.php",
			{
				loginemail1: loginemail1,
				loginpassword1: loginpassword1
			},
			function(data, status) {
				console.log("Data: " + data + "\nStatus: " + status);
				$("#db-div").append(data);
				$("#newusersave").click(function() {

					console.log("BOO");
					$.post("adduserlogic.php",
						{
					
							loginemail1: $("#email").val(),
							loginpassword1: $("#password").val(),
							fname: $("#fname").val(),
							lname: $("#lname").val()
						},
						function(data, status) {
							console.log("Data: " + data + "\nStatus: " + status);})
				
				
				});
			})
		});
	}
	
	
});