<!-- This page is used to delete Users and Ads Only From Database -->

<?php include 'includes/config.php'; 
if(isset($_SESSION['loged'])){
	if($_SESSION['loged']=="Admin") {

// to delete record ..................

		if(isset($_GET['title'])){
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
					header("Location: admin.php");
				}
				else{
					header("Location: admin.php");
				}

			}
		}// end of record delete if statement

		else{
			$mail=$_GET['key'];
			$sql='DELETE FROM users WHERE Email =?'; 

			$stmt = $conn->prepare($sql);
			if($stmt === false)
			{ 
				trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);	
			} 
			else{
				$stmt->bind_param('s',$mail);
				if($stmt->execute()){
					header("Location: admin.php");
				}
				else{
					header("Location: admin.php");
				}

			}
		}

	}
}
?>