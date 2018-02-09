<?php include 'includes/config.php';
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
		$sql='SELECT * FROM records WHERE Email =?'; 
		$stmt = $conn->prepare($sql);
		if($stmt === false)
		{
			trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);	
		} 
		else{
			$stmt->bind_param('s',$mail);
			$stmt->execute();
			$stmt->store_result();
			$totalRows=$stmt->num_rows;
			?>
			<h1>Your Ad Details</h1>
			<h2>Total Number of Ads: 
			<?php echo "$totalRows"; ?> </h2> <?php
			if($stmt->num_rows==0){
				echo "No result found ".$stmt->num_rows;
			}
			else{
				$stmt->bind_result($title1,$username,$desc,$photo,$email,$price,$location,$contact,$category);
				while($stmt->fetch()){


					?>
					
					<div class="four-col border">
<p>
<?php echo '<a href="ad-details.php?title=' . $title1.'&key='.$email .'"><img class="ad-pic" src="'. $photo. '" alt="img"></a>'; ?>
<p>
	<label class="displayblocklabel"> Title:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title1 ?> </label>
</p>
<p>
	<label class="displayblocklabel">City:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $location ?></label>
</p>
<p>
	<label class="displayblocklabel">Price:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $price ?> </label>
</p>
<p>
<input type="button" class="ad-details-btn" name="ad-details-btn" value="Remove"  <?php echo 'onClick="location.href='.'\'ad-remove.php?title=' . $title1.'&key='.$email .'\' " >' ?> 
<input type="button" class="ad-details-btn" name="ad-details-btn" value="View details"  <?php echo 'onClick="location.href='.'\'ad-details.php?title=' . $title1.'&key='.$email .'\' " >' ?> 
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

<?php }
else{
	echo "Access Denied";
}