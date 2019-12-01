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
					</div>
				</td>

				<td> </td>
				<td valign='top' , align='right'>
					<div class="vertical-menu">
						<a href='update_status.php'> Status Update </a>
						<a href='friends.php'>Friends </a>
						<a href='friend_list.php'>Friend List</a>
					</div>
				</td>
			</tr>

			<?php
			include 'mysql.php';

			//Session_start();
			if (isset($_SESSION["user_id"])) {
				$id = $_SESSION["user_id"];
				$query = "select * from messages where receiver_id=" . $id . " order by id desc";
				if ($resid) {
					$result = MySQLi_Query($resid, $query);
					$data = MySQLi_Fetch_Row($result);
					if ($data) {
						$query = "select name,email from students where id=" . $data[1] . "";
						$sender = MySQLi_Query($resid, $query);
						$sender = MySQLi_Fetch_Row($sender);
						//if($data) {

						echo "<tr align='center'> <td colspan='5'> <table cellpadding='4' cellspacing='5' width='100%' style='table-layout:fixed'> <col width='100%'> ";
						echo "<td>From:- <font color='blue'>" . $sender[0] . " </font> [" . $sender[1] . "] </td> </tr>";
						echo "<tr> <td style='word-wrap:break-word'>Message:-" . $data[3] . "</td> </tr>";
						echo "</table> </td> </tr>";
					} else {
						echo "<tr align='center'> <td colspan='5'> <font color='black'> No Messages! </font> </td> </tr>";
					}
					MySQLi_Close($resid);
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