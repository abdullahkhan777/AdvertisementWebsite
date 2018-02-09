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
		} 
		?>
		<div>
			<h1>Profile Settings</h1>
		</div>
		<table>
			<tr>
				<td>
					<label>UserName:</label>
				</td>
				<td>
					<label><?php echo $username ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Email:</label>
				</td>
				<td>
					<label><?php echo $email ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Contact Number:</label>
				</td>
				<td>
					<label><?php echo $phone ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>City:</label>
				</td>
				<td>
					<label><?php echo $city ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Password:</label>
				</td>
				<td>
					<label>***********</label>
				</td>
			</tr>
			<tr>
			<td>
					<p>
<input type="button" class="profile-btn" name="ad-details-btn" value="Change Password"  <?php echo 'onClick="location.href='.'\'edit-user-Profile.php?pswd=' . $ps.'&key='.$email .'\' " >' ?> 
</p>
				</td>
				<td>
				<?php  if($_SESSION['loged']!="Admin"){ ?>
					<p>
<input type="button" class="profile-btn" name="ad-details-btn" value="Edit Profile"  <?php echo 'onClick="location.href='.'\'edit-user-Profile.php?key='.$email .'\' " >' ?> 
</p>
				</td>
				
			</tr>
			<tr>
				<td colspan="2">
				
					<p>
<input type="button" class="ad-details-btn" name="ad-details-btn" value="View my Ads"  <?php echo 'onClick="location.href='.'\'user-ads.php?title=' . $ps.'&key='.$email .'\' " >' ?> 
</p>
<?php } ?>
				</td>
				
			</tr>
			<tr>

		</table>
		
	</section>
	<footer>
		<?php require 'includes/footer.php' ?>
	</footer>
</body>
</html>
<?php } 
else{
	echo 'Sorry.. You are not logged in';
}
?>