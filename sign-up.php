<?php 
include 'includes/config.php';
if(!isset($_SESSION["loged"])){ ?>
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
			<h1>Registration</h1>
			<h3>Create your account</h3>
			<form method="post" id="signupform" action="signup-action.php">
			<table>
			<tr>
				<td><label>UserName: </label></td>
				<td><input type="text" class="textfield"  id="textbox" placeholder="  Full Name" name="name" required="required"></td>
				</tr>
				<tr>
				<td><label>Email :&nbsp &nbsp &nbsp &nbsp  </label></td>
				<td><input type="Email" class="textfield"  id="textbox" placeholder=" for example: abc123@gmail.com" name="email" required="required"></td>
				</tr>
				<tr>
				<td><label>Contact#</label></td>
				<td><input type="text" class="textfield"  placeholder="Phone #" name="phone" id="su-contact#" required="required"></td>
				</tr>
				<tr>
				<td><label>City: &nbsp &nbsp  </label></td>
				<td><select name="city" class="textfield">
						<option value="Karachi">Karachi</option>
						<option value="Islamabad">Islamabad</option>
						<option value="Lahore">Lahore</option>
						<option value="Rawalpindi">Rawalpindi</option>
						<option value="Peshawar">Peshawar</option>
						<option value="Abbottabad">Abbottabad</option>
						<option value="Faislabad">Faislabad</option>
						<option value="Multan">Multan</option>
						<option value="Quetta">Quetta</option>
						<option value="Sialkot">Sialkot</option>
					</select>  </td>
				</tr>
				<tr><td>
				<label>Password:</label></td>
				<td><input type="Password" class="textfield" id="su-password" placeholder="password" name="password" required="required"></td></tr>
				<tr> <td>
				<label>Confirm Password:</label></td>
				<td><input type="Password" class="textfield"  id="su-passwordc" placeholder=" confirm password" required="required"></td></tr>
				<tr><td colspan="2">
				<input type="button" name="btnpost" value="sign up" class="submitbutton"" onclick="validatesignup()">  </
				<input type="submit" name="btnsignup" value="signup"  id="su-btnsubmit" hidden> </td> </tr>
				<tr><td colspan="2">
	 <p>Already Registered? &nbsp&nbsp&nbsp<a href="sign-in.php" id="signupLink">Sign-In</a> </p>
</td></tr>
				</table>
</form>
				<?php
				if(isset($_GET['status'])){
					if($_GET['status']=="SUF"){
						echo '<p>Failed: Someone is already registered to this email </p>';
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

<?php } else{
	echo '<p> You are Already registered..</p>';
	echo '<p> Logout and register another account? <a href="logout-action.php"> Clickhere </a> </p>'; 
}
?>