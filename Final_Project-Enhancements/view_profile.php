<!doctype html>
<html>

<head>
	<link rel='stylesheet' href='Grayson_css.css'>
	<script src="Grayson_Javascript.js">
	</script>
	<title> Student's Hangout </title>
</head>

<div class="container">

	<body>
		<!--Logo-->
		<img src='images/logo.png' height='65%' width='100%'>
		<!--Nav_Tabs-->
		<table width='100%'>
			<tr>
				<td valign='top'>
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn">Menu</button>
						<div id="myDropdown" class="dropdown-content">
							<a href='send_message.php'>Send Message </a>
							<a href='inbox.php'>Inbox (Only Recent Message) </a>
							<a href='view_profile.php'>View Profile </a>
							<a href='signout.php'>Signout </a>
						</div>
					</div>
				</td>
			</tr>

			<?php
			//Session_start();
			if (isset($_SESSION["user_id"])) {
				echo "<tr> <td colspan='5' align='center'> <table align='center'>
							<tr  align='center'>
								<td align='right'>Name:- </td> <td align='left'>" . $_SESSION["name"] . " </td> </tr> 
								<tr align='center'>
									<td align='right'>Email:- </td> <td align='left'>" . $_SESSION["email"] . " </td> </tr>
									<tr align='center'>
										<td align='right'>Gender:- </td> <td align='left'>" . $_SESSION["gender"] . "</td> </tr>
										<tr align='center'>
											<td align='right'>Age:- </td> <td align='left'>" . $_SESSION["age"] . "  </td> </tr>
											<tr align='center'>
												<td align='right'>Password:- </td> <td align='left'>" . $_SESSION["password"] . "  </td> </tr> </table> </td> </tr>";
			} else {
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";
			}

			?>

		</table>
		<footer align='center'>
			&copy; All rights Reserved https://github.com/abhn/simple-php-mysql-project.
		</footer>
	</body>
</div>

</html>