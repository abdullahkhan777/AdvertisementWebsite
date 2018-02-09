<?php 
include 'includes/config.php';
$email=$_POST['email'];
$password=$_POST['password'];

function sanitizeInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}

//sanitization
$email=sanitizeInput($email);
$password=sanitizeInput($password);

$status=false;
$remember=false;
if(isset($_POST["Remember"])){
	$remember=true;
	echo $remember;
}

 
$sql='SELECT * FROM users WHERE Email= ?'; 
$stmt = $conn->prepare($sql);
if($stmt === false)
	{ trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);
} 
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows==0){
	echo "No result found ".$stmt->num_rows;
	header("Location: sign-in.php?status=UNR");
}
else{

	$stmt->bind_result($id,$username,$email1,$phone,$city,$hpwd,$type);
	$stmt->fetch(); 
	$matched = password_verify($password, $hpwd); 
	if($matched){
		$status=true;
	}
	else{
		$status=false;
	}
//echo $id. ' ' .  $hpwd. "<br/>"; 

	$stmt->free_result();
	$stmt->close();
//
//echo "Last Inserted ID: " . $stmt->insert_id. "<br/>"; echo "Affected Rows: " . $stmt->affected_rows. "<br/>";
//$stmt->close();
	if($status){
		if ($remember) {
            /* Set cookie to last 1 year */
            setcookie('email',$email1, time()+60*60*24*365, '/');
            setcookie('password', $password, time()+60*60*24*365, '/');
        
        } else {
            /* Cookie expires when browser closes */
            setcookie('email',$email1, false, '/');
            setcookie('password', $password, false, '/');
        }
		$_SESSION['loged']=$username;
		$_SESSION['logEmail']=$email1;

		if($type==0){
			header("Location: admin.php?status=LI");
		}
		else{
			header("Location: index.php?status=LI");
		}
	}
	else{
		header("Location: sign-in.php?status=LIF");
	}
} 