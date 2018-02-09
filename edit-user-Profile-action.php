<?php 
include 'includes/config.php';
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$city=$_POST['city'];
$cpass=$_POST['cpass'];
$log=$_SESSION['logEmail'];
$hpwd=$_SESSION['matchpswd'];
$matched = password_verify($cpass, $hpwd); 


function sanitizeInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
//data sanitization

$cpass=sanitizeInput($cpass);
$name=sanitizeInput($name);
$phone=sanitizeInput($phone);
$email=sanitizeInput($email);
$city=sanitizeInput($city);


if($matched){


	$sql="UPDATE users SET UserName=?, Email=?, Phone=?, City=? WHERE Email=?";
	$stmt = $conn->prepare($sql); 
	if($stmt === false) 
		{ trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
}
$stmt->bind_param('ssiss',$name,$email,$phone,$city,$log); 
if($stmt->execute()){
	header('Refresh: 5; URL=logout-action.php');
	echo "Profile Updated !  Redirecting..";
	?>
	</br>
	<?php
	echo "Logging you out.. Please log in again to continue";
}
else{
	echo "Alert: Failed to Update Profile";
}

$stmt->close(); 
}
else{
	header('Location: edit-user-Profile.php?status=PF');
}
?>