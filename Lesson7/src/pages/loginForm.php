<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['operation'] === 'register') {
			$privSession->Register($users, $_POST, $salt);
		}
		else if ($_POST['operation'] === 'login') {
			$privSession->Authentificate($users, $_POST, $salt);
		}

		header('Location: /');
		exit;
	}
?>

<link rel="stylesheet" href="loginStyle.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
	  rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	  crossorigin="anonymous">
<div id="container">
	<div class="tabs">
		<div class="tab tab-link current" data-tab="tab-1">Login</div>
		<div class="tab tab-link" data-tab="tab-2">Register</div>
	</div>
	<form method="post" class="tab-content current login" action="" id="tab-1">
		<div class="form-div">
			<div class="input-area">
				<input class="input" name="username" type="text" placeholder="Username"/>
				<div class="input-icon fa fa-user"></div>
			</div>
		</div>
		<div class="form-div">
			<div class="input-area">
				<input class="input" name="password" type="password" placeholder="Password"/>
				<div class="fa fa-lock input-icon"></div>
			</div>
		</div>
		<div class="form-footer">
			<button> <span>Forgot Password</span><span class="fa fa-question"></span></button>
			<button type="submit" name="operation" value="login"> <span>Login</span><span class="fa fa-sign-in"></span></button>
		</div>
	</form>
	<form method="post" class="tab-content register" action="" id="tab-2">
		<div class="form-div">
			<div class="input-area">
				<input class="input" name="username" type="text" placeholder="Username"/>
				<div class="input-icon fa fa-user"></div>
			</div>
		</div>
		<div class="form-div">
			<div class="input-area">
				<input class="input" name="email" type="email" placeholder="Email"/>
				<div class="input-icon fa fa-envelope"></div>
			</div>
		</div>
		<div class="form-div">
			<div class="input-area">
				<input class="input" name="password" type="password" placeholder="Password"/>
				<div class="input-icon fa fa-lock"></div>
			</div>
		</div>
		<div class="form-footer">
			<button type="submit" name="operation" value="register"> <span>Register</span><span class="fa fa-user-plus"></span></button>
		</div>
	</form>
</div>

<script src="loginForm.js"></script>