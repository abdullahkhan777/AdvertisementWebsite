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
	<br>
		<?php
		$keyword="%{$_GET['keyword']}%";
		
		$sql='SELECT * FROM records WHERE Title LIKE ?'; 
		$stmt = $conn->prepare($sql);
		if($stmt === false)
		{
			trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);	
		} 
		else{
			$stmt->bind_param('s',$keyword);
			$stmt->execute();
			$stmt->store_result();
			$totalRows=$stmt->num_rows;
			if($stmt->num_rows==0){
				?>
				<h1 class="pageheight content-width">&nbsp;&nbsp;&nbsp;&nbsp; No Match found..! </h1>
				<?php
			}
			else{
				$stmt->bind_result($title,$username,$desc,$photo,$email,$price,$location,$contact,$category);
				while($stmt->fetch()){
					?>
					<section class="content-width">  
						<div class="four-col border">
							<p>
								<?php echo '<a href="ad-details.php?title=' . $title.'&key='.$email .'"><img class="ad-pic" src="'. $photo. '" alt="img"></a>'; ?>
								<p>
									<label class="displayblocklabel"> Title:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title ?> </label>
								</p>
								<p>
									<label class="displayblocklabel">City:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $location ?></label>
								</p>
								<p>
									<label class="displayblocklabel">Price:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $price ?> </label>
								</p>
								<p>
									<input type="button" class="ad-details-btn" name="ad-details-btn" value="View details"  <?php echo 'onClick="location.href='.'\'ad-details.php?title=' . $title.'&key='.$email .'\' " >' ?>
								</p>
							</div>
						</section>
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