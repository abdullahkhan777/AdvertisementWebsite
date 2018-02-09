<?php include 'includes/config.php'; 
if(isset($_SESSION['loged'])) {

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
	<section>
		<div class="content-width">
			<h1>Post an Ad</h1>
			<?php 
			if(isset($_GET['status'])) {
			if($_GET['status']=="IUF"){
			?>
			<p>Image upload failed!</p>
			<?php
		} 
		if($_GET['status']=="AP"){
		?>
		<p>Ad posted successfully!</p>
		<?php
	} if($_GET['status']=="NP"){
	?>
	<p>Failed to post: Ad Already exists, try again with different Title</p>
	<?php } 

}
?>
<div>
	<form method="post" action="ad-post-action.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>
					<label>Title</label>
				</td>
				<td>
					<input type="text" name="title" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Category</label>
				</td>
				<td>
					<select name="catselect">
						<option value="Vehicle">Vehicle</option>
						<option value="Bike">Bike</option>
						<option value="Electronics" selected="selected">Electronics</option>
						<option value="Mobile">Mobile</option>
						<option value="Home">Home</option>
						<option value="Furniture">Furniture</option>
						<option value="Pet">Pet</option>
						<option value="Book">Book</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Description</label>
				</td>
				<td>
					<textarea rows="4" cols="55" name="desc" required></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Price</label>
				</td>
				<td>
					<input type="number" name="price" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Upload Photo</label>
				</td>
				<td>
					<input type="file" name="userfile" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Contact#</label>
				</td>
				<td>
					<input type="text" id="contact#" name="contact" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Location</label>
				</td>
				<td>
					<select name="loc">
						<option value="Karachi">Karachi</option>
						<option value="Islamabad">Islamabad</option>
						<option value="Lahore">Lahore</option>
						<option value="Rawalpindi">Rawalpindi</option>
						<option value="Peshawar">Peshawar</option>
						<option value="Abbottabad">Abbottabad</option>
						<option value="Faislabad">Faislabad</option>
						<option value="Multan">Multan</option>
						<option value="Quetta">Quetta</option>
						<option value="Sialkot">Sialkot</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="button" name="btnpost" value="Post" class="btnPost" onclick="validatePost()">
					<input type="submit" name="btnpost1" value="Post1" class="btnPost" id="btnsubmitpost" hidden>
				</td>
			</tr>
		</table>
	</form>
</div>
</div>
</section>
<footer>
	<?php require 'includes/footer.php' ?>
</footer>
</body>
</html>
<?php }
else{
echo 'Access denied';
}
?>
