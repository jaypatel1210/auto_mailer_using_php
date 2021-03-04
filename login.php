<?php
	session_start();
	if (isset($_SESSION['login-email'])) {
		header('location: dashboard/');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Auto Mailer</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container" id="container">
	<div class="form-container sign-up-container">


		<form id="signupform" method="POST">

			<h1>Create Account</h1>
			<input type="text" placeholder="Name" name="signup-name" required/>
			<small class="danger"></small>

			<input type="email" placeholder="Email" name="signup-email" required/>
			<small class="danger"></small>

			<input type="password" placeholder="Password" name="signup-password" required/>
			<small class="danger" id="err3"></small>

			<input type="password" placeholder="Confirm Password" name="signup-confirm-password" required/>
			<small class="danger" id="err4"></small>
	
			<button type="submit">Sign Up</button>
			<small class="danger" id="err5"></small>
			<h5 class="success" id="successmsg"></h5>
		</form>


	</div>
	<div class="form-container sign-in-container">
		<form id="singinform" method="POST">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" name="signin-email" required/>
			<input type="password" placeholder="Password" name="signin-pass" required/>
			<a href="#">Forgot your password?</a>
			<button type="submit" id="signinbtn">Sign In</button>
			<h4 class="danger" id="signin-err"></h4>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () =>
        container.classList.add('right-panel-active'));

        signInButton.addEventListener('click', () =>
        container.classList.remove('right-panel-active'));
	</script>
	<script>
		$(document).ready(function () {
			$('#singinform').submit(function (e) { 
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "ajax/login",
					data: $("#singinform").serialize(),
					success: function (response) {
						console.log(response);
						if (response === 'ScC3s') {
							$('#signin-err').text('');
							location.href = 'dashboard/';
						} else if (response === '3Er2') {
							$('#signin-err').text('Not Registerd Email');
						} else {
							$('#signin-err').text('Wrong Email or Password');
						}
					},
				});
			});
			
			$('#signupform').submit(function (e) { 
				e.preventDefault();
				const data = $(this).serializeArray();
				if (data[2].value.length >= 7 && data[2].value.length <= 20) {
					$('#err3').text('');
					if (data[2].value === data[3].value) {
						$('#err4').text('');

						$.ajax({
							type: "POST",
							url: "ajax/signup",
							data: $(this).serialize(),
							success: function (response) {
								// console.log(response);
								if (response === 'SUCCESS') {
									$('#err5').text('');
									$('#signupform')[0].reset();
									$('#successmsg').text('Your Account Has Been Created');
									setTimeout(() => {
										$('#successmsg').text('');
									}, 15000);
								} else {
									$('#err5').text('Something Went Wrong!!! Try Again');
								}
							}
						});

					} else {
						$('#err4').text('Password Does Not Match');
					}
				} else {
					$('#err3').text('Min. 7 Char And Max. 20 Char');
				}
			});
		});
	</script>
</body>
</html>