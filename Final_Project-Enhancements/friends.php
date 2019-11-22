<!doctype html>
<html>

<head>
	<link rel='stylesheet' href='Grayson_css.css'>
	<title> Student's Hangout </title>
	<script type='text/javascript'>
		function sec() {
			var f_search = document.f1.search.value;
			if (f_search == 0) {
				s1.innerHTML = "<font color='red'>Field is Required</font>";
			} else if (f_search > 50) {
				s2.innerHTML = "<font color='red'>Characters should be less than 50 </font>";
			} else {
				document.f1.submit();
			}

		}
	</script>
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

		<tr align='center'>
			<td colspan='5'>
				<form method='POST' name='f1' action='search_friends.php'>
					<table>
						<tr>
							<td> Search Friend:- </td>
							<td> <input type='text' name='search' maxlength='50'> </td>
							<td> <span id='s1'> </span> </td>
							<td> <span id='s2'> </span> </td>
						</tr>
						<tr>
							<td colspan='4' align='center'> <br> <input type='button' value='Search' onclick='sec()'> </td>
						</tr>
					</table>
				</form>
			</td>
		</tr>



		<?php
		include 'mysql.php';

		if (isset($_SESSION["user_id"])) {
			$id = $_SESSION["user_id"];
			$query = "select friend_name,friend_id from friends where receiver_id=" . $id . " and status=0 and comp=0";
			if ($resid) {
				$result = MySQLi_Query($resid, $query);
				if ($result == true) {
					$f = 1;
					while (($rows = MySQLi_Fetch_Row($result)) == True) {
						$f++;
						if ($f == 2) {
							echo "<tr align='center'> <td colspan='5'>Friend Requests:-</td> </tr>";
						}
						echo "<tr align='center'> <td colspan='5'>" . $rows[0] . ", wants to be your friend! <form method='POST' action='access.php'>
							<input type='hidden' name='header1' value='" . $rows[1] . "'>
							<input type='submit' name='accp' value='Accept'> &nbsp;&nbsp;&nbsp; <input type='submit' name='decl' value='Decline'>
							</form></td> </tr>";
					}
				}

				if ($f < 2) {
					echo "<tr align='center'> <td colspan='5'><font color='lightblue'> No Friend Requests!</font> </td> </tr>";
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

</html>