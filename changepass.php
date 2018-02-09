<?php 
include 'includes/config.php';
$email=$_SESSION['logEmail'];
$cpass=$_POST['currentPass'];
$newpass=$_POST['newPass'];


function sanitizeInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//input sanitization

$newpass=sanitizeInput($newpass);
$cpass=sanitizeInput($cpass);


if(isset($_SESSION['loged'])){
	$hpwd=$_SESSION['matchpswd'];
	$matched = password_verify($cpass, $hpwd); 
	if($matched){
		$sql="UPDATE users SET Password=? WHERE Email=?";
		$stmt = $conn->prepare($sql); 
		if($stmt === false) 
			{ trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
	}
	$newhpwd=password_hash($newpass, PASSWORD_DEFAULT); 
	$stmt->bind_param('ss',$newhpwd,$email); 
	if($stmt->execute()){
		header('Refresh: 5; URL=user-profile.php');
		echo "Password Successfully Changed!  Redirecting..";
	}
	else{
		echo "Alert: Failed to Change Password";
	}

	$stmt->close(); 
}
else{
	header('Location: edit-user-Profile.php?pswd=F');
}

}
else{
	echo 'Error 404, Page Not Found';
}
?>