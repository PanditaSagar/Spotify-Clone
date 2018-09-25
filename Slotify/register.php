<?php 
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);


include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name){
	if(isset($_POST[$name])){
		echo $_POST[$name];
	}
}


 ?>

<html>
<head>
	<title>Welcome to Slotify!</title>
</head>
<body>
 <div id="inputContainer">
	<form id="loginForm" action="register.php" method="POST">
		<h2>Login to your account</h2>
		<p>
			<label for="loginUsername">Username</label>
			<input id="loginUsername" type="text" placeholder="eg.bartSimpson"required name="loginUsername">
		</p>
		<p>
			<label for="loginPassword">Password</label>
			<input id="loginPassword" type="password"required name="loginPassword">
		</p>
		<button type="submit" name="loginButton">Login</button>

	</form>
<form id="registerForm" action="index.php" method="POST">
		<h2>Create your free account</h2>
		<p>
			<?php echo $account->getError(Constants::$usernameCharacters); ?>
			<label for="username">Username</label>
			<input id="username" type="text" placeholder="eg.bartSimpson"required name="username" value="<?php getInputValue('username') ?>">
		</p>
        <p>
        	<?php echo $account->getError(Constants::$firstNameCharacters) ?>
			<label for="firstName">FirstName</label>
			<input id="firstName" type="text" placeholder="eg.bartSimpson"required name="firstName" value="<?php getInputValue('firstName') ?>">
		</p>
		<p>
			<?php echo $account->getError(Constants::$lastNameCharacters) ?>
			<label for="lastName">LastName</label>
			<input id="lastName" type="text" placeholder="eg.bartSimpson"required name="lastName" value="<?php getInputValue('lastName') ?>">
		</p>
		<p>
			<?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
			<label for="email">Email</label>
			<input id="email" type="text" placeholder="eg.bartSimpson"required name="email" value="<?php getInputValue('email') ?>">
		</p>
		<p>
			<label for="email2">Confirm email</label>
			<input id="email2" type="text" placeholder="eg.bartSimpson"required name="email2">
		</p>

<p>			
			<?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
			<label for="password">Password</label>
			<input id="password" type="password"required name="password">
		</p>
		<p>
			<label for="password2">Confirm Password
			</label>
			<input id="password2" type="password"required name="password2">
		</p>
		<button type="submit" name="registerButton">Signup</button>

	</form>




 </div>
</body>
</html>