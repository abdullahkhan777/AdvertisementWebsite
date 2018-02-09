<?php 
include 'includes/config.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$city=$_POST['city'];

function sanitizeInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

// data sanitization
$name=sanitizeInput($name);
$email=sanitizeInput($email);
$phone=sanitizeInput($phone);
$password=sanitizeInput($password);
$city=sanitizeInput($city);


$type=1;
$status=false;

$sql='INSERT INTO users (UserName, Email, Phone, City, Password, Type) VALUES (?,?,?,?,?,?)'; 
$stmt = $conn->prepare($sql);
if($stmt === false) { 
	trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
}
$hpwd=password_hash($password, PASSWORD_DEFAULT); 
$stmt->bind_param('sssssi',$name,$email,$phone,$city,$hpwd,$type);
if($stmt->execute()){
	$status=true;
}
else{
	$status=false;
}

//echo "Row inserted successfully<br/>"; echo "Last Inserted ID: " . $stmt->insert_id. "<br/>"; echo "Affected Rows: " . $stmt->affected_rows. "<br/>";
$stmt->close();
if($status){
	$_SESSION['loged']=$name;
	$_SESSION['logEmail']=$email;
	header("Location: index.php?status=SU");
}
if(!$status){
	header("Location: sign-up.php?status=SUF");// Get associative array
}
