<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'includes/head.php' ?>
</head>
<body>
	<header><?php include 'includes/header.php' ?></header>
	<?php include 'includes/search.php' ?>
	<?php include 'includes/nav-mobile.php' ?>
	<section>
		<?php
		$title=$_GET['title'];
		$mail=$_GET['key'];
		$sql='SELECT * FROM records WHERE Title =? AND Email =?'; 
		$stmt = $conn->prepare($sql);
		if($stmt === false)
		{
			trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);	
		} 
		else{
			$stmt->bind_param('ss',$title,$mail);
			$stmt->execute();
			$stmt->store_result();
			$totalRows=$stmt->num_rows;
			if($stmt->num_rows==0){
				echo "No result found ".$stmt->num_rows;
			}
			else{
				$stmt->bind_result($title1,$username,$desc,$photo,$email,$price,$location,$contact,$category);
				while($stmt->fetch()){


					?>

					<div class="content-width adfull">
						<h1>Ad Details</h1>
						
						<p>
							<table>
							<tr>
							<td colspan="2">
								<p> <?php echo '<img class="ad-piclg" src="'. $photo. '" alt="img"></a>'; ?>
								</p>
							</td>
							</tr>
								<tr>
									<td>
										<label>Title:</label>
									</td>
									<td>
										<label><?php echo $title1 ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Posted by:</label>
									</td>
									<td>
										<label><?php echo $username ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Location:</label>
									</td>
									<td>
										<label><?php echo $location ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Category:</label>
									</td>
									<td>
										<label><?php echo $category ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Email Address:</label>
									</td>
									<td>
										<label><?php echo $email ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Contact#</label>
									</td>
									<td>
										<label><?php echo $contact ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Price:</label>
									</td>
									<td>
										<label><?php echo $price ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Description:</label>
									</td>
									<td>
										<label><?php echo $desc ?></label>
									</td>
								</tr>
							</table>
						</p>
					</div>
					<?php 

} //end of while loop

}
}
?>
</section>
<footer>
	<?php require 'includes/footer.php' ?>
</footer>
</body>
</html>