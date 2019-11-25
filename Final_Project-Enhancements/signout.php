<!doctype html>
<html>

<head>
	<link rel='stylesheet' href='Grayson_css.css'>
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
					<div class="vertical-menu-long">
						<?php Session_start();
						if (isset($_SESSION["user_id"])) {
							echo "<a href='user_page.php'>";
						} else {
							echo "<a href='home.php'>";
						} ?>Home </a>
						<a href='send_message.php'>Send Message </a>
						<a href='inbox.php'>Inbox (Only Recent Message) </a>
						<a href='view_profile.php'>View Profile </a>
						<a href='signout.php'>Signout </a>
					</div>
				</td>
			</tr>

			<?php
			Session_start();
			if (isset($_SESSION["user_id"])) {
				session_unset();
				session_destroy();

				//echo "<tr align='center'> <td colspan='5'> <font color='green'> Logged out Successfully! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";
				if (isset($_SESSION['user_id'])) { } else {
					Header("Location: home.php");
				}
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