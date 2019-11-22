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

				<td> </td>
				<td valign='top' , align='right'>
					<div class="vertical-menu">
						<a href='update_status.php'> Status Update </a>
						<a href='friends.php'>Friends </a>
						<a href='friend_list.php'>Friend List</a>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan='4' align='center'> Your Friends:- </td>
			</tr>
			</table>
			<table align='center'>
			<?php
			$user_id = $_SESSION["user_id"];
			include 'mysql.php';
			if ($resid) {


				$count = MySQLi_Query($resid, "select frnd_two_id from are_friends where frnd_one_id = $user_id union select frnd_one_id from are_friends where frnd_two_id = $user_id");


				echo "
				<tr> <th> Name: </th> <th align='left'> Email: </th> <th align='right'> Gender: </th> </tr>";

				while (($rows = MySQLi_Fetch_Row($count)) == True) {

					$query = "select name,email,gender from students where id = $rows[0] ";
					$result = MySQLi_Query($resid, $query);

					if ($result) {

						while (($rows = MySQLi_Fetch_Row($result)) == True) {

							echo "<tr align='center'>";
							echo "<td align='center'> $rows[0] </td> <td align='center'> $rows[1] </td> <td align='center'> $rows[2] </td>";
							echo "</tr>";
						}
					}
				}
			}
			?>
			</table>
		
		<footer align='center'>
			&copy; All rights Reserved https://github.com/abhn/simple-php-mysql-project.
		</footer>
	</body>

</html>