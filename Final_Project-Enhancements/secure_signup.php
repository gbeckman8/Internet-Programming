<!doctype html>
<html>

<head>
	<link rel='stylesheet' href='Grayson_css.css'>
	<title> Student's Hangout </title>
	<script type='text/javascript'>
		function sec() {
			var name = document.f1.n1.value;
			var email = document.f1.e1.value;
			var age = document.f1.a1.value;
			var password = document.f1.p1.value;


			if (name.length == 0 || email.length == 0 || age.length == 0 || password.length == 0) {

				if (name.length == 0) {
					s1.innerHTML = "<font color='red'>Field is Required</font>";

				}

				if (email.length == 0) {
					s2.innerHTML = "<font color='red'>Field is Required</font>";

				}

				if (age.length == 0) {
					s3.innerHTML = "<font color='red'>Field is Required</font>";

				}

				if (password.length == 0) {
					s4.innerHTML = "<font color='red'>Field is Required</font>";

				}
			} else if (name.length > 50 || email.length > 50 || password.length > 50) {

				if (name.length > 50) {
					s5.innerHTML = "<font color='red'>Characters should be less than 50 </font>";

				}

				if (email.length > 50) {
					s6.innerHTML = "<font color='red'>Characters should be less than 50 </font>";

				}

				if (password.length > 50) {
					s7.innerHTML = "<font color='red'>Characters should be less than 50 </font>";

				}
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
		<!--1350x160-->
		<!--Nav_Tabs-->
		<table width='100%'>
			<tr>
				<td valign = 'top'>
					<div class="vertical-menu">
						<a href='home.php'> Home </a>
						<a href='login.php'>Login </a>
						<a href='contact-us.html'>Contact-Us </a>
						<a href='about-us.html'>About-us </a>
					</div>
				</td>

				<td>
					<form method='POST' name='f1' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
						<table>
							<tr>
								<td> Name:- </td>
								<td> <input type='text' name='n1' maxlength='50'> </td>
								<td> <span id='s1'> </span> </td>
								<td> <span id='s5'> </span> </td>
							</tr>
							<tr>
								<td> Email:- </td>
								<td> <input type='email' name='e1' maxlength='50'> </td>
								<td> <span id='s2'> </span> </td>
								<td> <span id='s6'> </span> </td>
							</tr>
							<tr>
								<td> Age:- </td>
								<td> <input type='number' name='a1' min='18' max='27'> </td>
								<td> <span id='s3'> </span> </td>
							</tr>
							<tr>
								<td> Gender:- </td>
								<td> <select name='g1'>
										<option value='M'>Male
										<option value='F'>Female
									</select> </td>
							<tr>
								<td> Password:- </td>
								<td> <input type='password' name='p1' maxlength='50'> </td>
								<td> <span id='s4'> </span> </td>
								<td> <span id='s7'> </span> </td>
							</tr>

							<tr>
								<td align='center'> <br> <input type='button' value='Sign-up' name='s1' onclick='sec()'> </td>
								<td align='center'> <br> OR <a href='login.php'>Login</a></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>

		<?php
		include 'mysql.php';

		$name = $email = $age = $gender = $password = $count = $count_id = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			function sec($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			$name = sec($_POST["n1"]);
			$email = sec($_POST["e1"]);
			$age = sec($_POST["a1"]);
			$gender = sec($_POST["g1"]);
			$password = sec($_POST["p1"]);

			//$query="INSERT INTO studs VALUES('$name','$email',$age);";
			//MySQL Magic :D
			//Getting Resource ID
			if ($resid) {
				$check_email = MySQLi_Query($resid, "select name from students where email='" . $email . "'");
				$r_email = MySQLi_Fetch_Row($check_email);

				if ($r_email) {
					echo "<tr align='center'> <td colspan='5'> <font color='red'> Email already Registered, Registration Failed!  </font>  </td> </tr>";
				} else {
					$count = MySQLi_Query($resid, "select (max(id)+1) as count  from students");
					$count_id = MySQLi_Fetch_Assoc($count);
					if ($count_id["count"]) {
						$query = "insert into students values (" . $count_id["count"] . ",'$name','$email',$age,'$gender','$password')";
					} else {
						$query = "insert into students values (1,'$name','$email',$age,'$gender','$password')";
					}
					$res = MySQLi_Query($resid, $query);
					if ($res) {
						echo "<tr align='center'> <td colspan='5'> <font color='green'> Registration Successful! </font> You may login now from here:- <a href='login.php'>Login</a></td> </tr>";
					} else {
						echo "<tr align='center'> <td colspan='5'> <font color='red'> Registration Failed! </font> </td> </tr>";
					}
				}
				MySQLi_Close($resid);
			}
		}
		?>
		</table>
		<footer align='center'>
			&copy; All rights Reserved https://github.com/abhn/simple-php-mysql-project.
		</footer>
	</body>
</div>

</html>