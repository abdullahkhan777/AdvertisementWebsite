<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'includes/head.php' ?>
</head>
<body>
	<header> <?php include 'includes/header.php' ?>
	<link rel="stylesheet" type="text/css" href="css/blur.css">
	</header>
	<div class="searchbar blur">
		<?php include 'includes/search.php' ?>
	</div>
	<?php include 'includes/nav-mobile.php' ?>
	<section class="content-width form">
	<div class="form-content">
			<h1>Login to Adhub</h1>

<h3>Provide Email and Password to login</h3>
<form method="post" action="signin-action.php">
<table>
<tr>
<td>
<label>Email :&nbsp &nbsp &nbsp &nbsp  </label> </td>
<td>
<input type="Email"  id="textbox" class="textfield" placeholder=" for example: abc123@gmail.com" name="email"
<?php if(isset($_COOKIE["email"]))
			{
				echo "value='".$_COOKIE["email"]."'";
			}
 ?> 
 required></td>
</tr>
<tr>
<td><label>Password:</label></td>
<td>
<input type="Password"  class="textfield" id="textbox" placeholder="password" name="password" <?php if(isset($_COOKIE["password"]))
			{
				echo "value='".$_COOKIE["password"]."'";
			}
 ?> required></td>
</tr>
<tr>
<td>
<label>Remember Me</label>
<input type="checkbox" name="Remember" value="1">
</td>
<td><input type="submit" name="next" class="submitbutton" id="submitbutton" value="Log In" ></td>
</tr>
<tr><td colspan="2">
	 <p>Dont hava an Account? &nbsp&nbsp&nbsp<a href="sign-up.php" id="signupLink">Sign-Up</a> </p>
</td></tr>
</table>

</form>
<?php
if(isset($_GET['status'])){
	if($_GET['status']=="LIF"){
		echo '<p>Failed: Incorrect Email or Password </p>';
	}
	else if($_GET['status']=="UNR"){
		echo '<p>Alert: No User is registered to this Email</p>';
	}
}
?>
</div>
	</section>
	<footer class="blur">
		<?php require 'includes/footer.php' ?>
	</footer>
</body>
</html>