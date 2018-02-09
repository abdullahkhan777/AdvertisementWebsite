<?php 
include 'includes/config.php';
$ps="";
if(isset($_SESSION['loged'])){
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php require 'includes/head.php' ?>
	</head>
	<body>
		<header><?php include 'includes/header.php' ?></header>
		<?php include 'includes/search.php' ?>
		<?php include 'includes/nav-mobile.php' ?>
		<section class="content-width">
			<?php 
			$mail=$_SESSION['logEmail'];
			$status=false;

			$sql='SELECT * FROM users WHERE Email= ?'; 
			$stmt = $conn->prepare($sql);
			if($stmt === false)
				{ trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);
		} 
		$stmt->bind_param('s',$mail);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows==0){
			echo "Error..Please Refresh Page".$stmt->num_rows;
		}
		else{
			$stmt->bind_result($id,$username,$email,$phone,$city,$hpwd,$type);
			$stmt->fetch(); 
			$_SESSION['matchpswd']=$hpwd;
		} 
		if(!isset($_GET['pswd'])){


			?>
			<div>
				<h1>Edit Profile Settings</h1>
			</div>
			<?php if(isset($_GET['status'])){
				if($_GET['status']=="PF"){
					?>
					<p>Failed: Please enter your correct password to Modify you Profile</p>
					<?php
				}
				if($_GET['status']=="PSF"){
					?>
					<p>Failed: Some error occured..Try Again</p>
					<?php
				}
			}
			?>
			<form action="edit-user-Profile-action.php" method="post">
				<table>
					<tr>
						<td>
							<label> UserName:</label>
						</td>
						<td>
							<input type="text"  id="textbox" placeholder=<?php echo '"'.$username.'"' ?> name="name" required>
						</td>
					</tr>
					<tr>
						<td>
							<label>Email:</label>
						</td>
						<td>
							<input type="text"  id="textbox" placeholder=<?php echo '"'.$email.'"' ?> name="email" required>
						</td>
					</tr>
					<tr>
						<td>
							<label>Contact Number:</label>
						</td>
						<td>
							<input type="text"  id="textbox" placeholder=<?php echo '"'.$phone.'"' ?> name="phone" required>
						</td>
					</tr>
					<tr>
						<td>
							<label>City:</label>
						</td>
						<td>
							<select name="city">
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
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Current Password:</label>
						</td>
						<td>
							<input type="text"  id="textbox" placeholder="current Password #" name="cpass" required="required">
						</td>
					</tr>
					<tr>
						<td>
							<p>
								<input type="button" class="profile-btn" name="ad-details-btn" value="Go back" onClick="location.href='user-profile.php '" >
							</p>
						</td>
						<td>
							<p>
								<input type="submit" name="btnSubmitChanges" value="Confirm Changes" class="profile-btn" >
							</p>
						</td>
					</tr>



				</table>
			</form>
			<?php }
			else{ 
				if(isset($_GET['pswd'])){
					if($_GET['pswd']=="F"){
						?>
						<p>Failed: Current Password Incorrect !</p>
						<?php
					}
				}
				?>
				<div class="pageheight">
				<h1>Change your Password</h1>		
			<form action="changepass.php" method="post">

				<table>
					<tr>
						<td>
							<label> Current Password:</label>
						</td>
						<td>
						<input type="password"  id="textbox" placeholder="Current Password" name="currentPass" required>
						</td>
					</tr>
					<tr>
						<td>
							<label> New Password:</label>
						</td>
						<td>
							<input type="password"  id="textbox" placeholder="New Password" name="newPass" required>
						</td>
					</tr>
					<tr>
					<td>
							<p>
								<input type="button" class="profile-btn" name="ad-details-btn" value="Go back" onClick="location.href='user-profile.php '" >
							</p>
						</td>
						<td>
						<p>
							<input type="submit" name="btnSubmitChanges" value="Change" class="profile-btn" ></p>
						</td>
						
					</tr>
				</table>
			</form>
			</div>
			<?php

		}

		?>
	</section>
	<footer>
		<?php require 'includes/footer.php' ?>
	</footer>
</body>
</html>
<?php 
}

else{
	echo 'Sorry.. You are not logged in';
}
?>