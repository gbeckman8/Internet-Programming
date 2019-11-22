<!doctype html>
<html>

<head>
	<link rel='stylesheet' href='Grayson_css.css'>
	<title> Student's Hangout </title>
	<script type='text/javascript'>
		function sec() {
			var email = document.f1.e1.value;
			var password = document.f1.p1.value;


			if (email.length == 0 || password.length == 0) {

				if (email.length == 0) {
					s1.innerHTML = "<font color='red'>Field is Required</font>";

				}


				if (password.length == 0) {
					s2.innerHTML = "<font color='red'>Field is Required</font>";

				}
			} else if (email.length > 50 || password.length > 50) {

				if (email.length > 50) {
					s3.innerHTML = "<font color='red'>Characters should be less than 50 </font>";

				}

				if (password.length > 50) {
					s4.innerHTML = "<font color='red'>Characters should be less than 50 </font>";

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
				<td>
					<div class="vertical-menu">
						<a href='home.php'> Home </a>
						<a href='secure_signup.php'>Sign-up </a>
						<a href='contact-us.html'>Contact-Us </a>
						<a href='about-us.html'>About-us </a>
					</div>
				</td>

				<td>
					<form method='POST' name='f1' action='user_page.php'>
						<table>
							<tr>
								<td> Email:- </td>
								<td> <input type='email' name='e1' maxlength='50'> </td>
								<td> <span id='s1'> </span> </td>
								<td> <span id='s3'> </span> </td>
							</tr>

							<tr>
								<td> Password:- </td>
								<td> <input type='password' name='p1' maxlength='50'> </td>
								<td> <span id='s2'> </span> </td>
								<td> <span id='s4'> </span> </td>
							</tr>

							<tr>
								<td> </td>
								<td> <input type='hidden' name='h1' value='holla'> </td>
							</tr>

							<tr>
								<td align='center'> <br> <input type='button' value='Login' name='s1' onclick='sec()'> </td>
								<td align='center'> <br> OR <a href='secure_signup.php'>Sign-up</a></td>
							</tr>
						</table>
					</form>
				</td>

			</tr>
		</table>

		<footer align='center'>
			&copy; All rights Reserved https://github.com/abhn/simple-php-mysql-project.
		</footer>
	</body>
</div>

</html>