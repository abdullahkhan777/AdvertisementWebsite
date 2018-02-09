<?php include 'includes/config.php'; 

$title=$_GET['title'];
$mail=$_GET['key'];
		$sql='DELETE FROM records WHERE Title =? AND Email =?'; 
 
$stmt = $conn->prepare($sql);
if($stmt === false)
{ 
	trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);	
} 
else{
	$stmt->bind_param('ss',$title,$mail);
	if($stmt->execute()){
		header("Location: user-ads.php");
	}
	else{
		header("Location: user-ads.php");
	}

}
	?>