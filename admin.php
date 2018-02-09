<?php 
include 'includes/config.php';
if(isset($_SESSION['loged'])){
	if($_SESSION['loged']=="Admin") {
		
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<?php require 'includes/head.php' ?>
		</head>
		<body>
			<header><?php include 'includes/header.php'?></header>
			<?php include 'includes/search.php' ?>
		<?php include 'includes/nav-mobile.php' ?>
		</div>

<!-- Users Table  section ------------------------------------------ -->


		<section>
			<?php 
			$totalUsers="";
			$sql='SELECT * FROM users WHERE Type = ?'; 
			$stmt = $conn->prepare($sql);
			if($stmt === false){
				trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);
			} 
			else{
				$bit=1;
				$stmt->bind_param('i',$bit);
				$stmt->execute();
				$stmt->store_result();
				$totalUsers=$stmt->num_rows;
				if($stmt->num_rows==0){
					echo "No result found ".$stmt->num_rows;
			//header("Location: sign-in.php?status=UNR");
				}
				$stmt->bind_result($id,$username,$email,$phone,$city,$hpwd,$type); ?>
				
				<h1>Admin Panel</h1>
				<div>
					<h2>Total Users Registered: <?php echo $totalUsers ?> </h2>
					<table border="1">
						<tr>
							<th>
								<h3> ID</h3>
							</td>
							<th>
								<h3> UserName</h3>
							</th>
							<th>
								<h3> Email</h3>
							</th>
							<th>
								<h3> Phone</h3>
							</th>
							<th>
								<h3> City</h3>
							</th>
							<th>
								<h3> Options</h3>
							</th>
						</tr>
						<?php while($stmt->fetch()){ 
							?>
							<tr>
								<td>
								
									<label> <?php echo $id ?></label>
								</td>
								<td>
									<label><?php echo $username ?></label>
								</td>
								<td>
									<label> <?php echo $email ?> </label>
								</td>
								<td>
									<label> <?php echo $phone ?> </label>
								</td>
								<td>
									<label> <?php echo $city ?> </label>
								</td>
								<td>
									<input type="button"  name="ad-details-btn" value="Remove"  <?php echo 'onClick="location.href='.'\'admin-action.php?key='.$email .'\' " >' ?> 
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</section>


<!-- Ads Table  section ------------------------------------------ -->


<section>
			<?php 
			
			$totalAds="";
			$sql='SELECT * FROM records'; 
			$stmt = $conn->prepare($sql);
			if($stmt === false){
				trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);
			} 
			else{
				
				$stmt->execute();
				$stmt->store_result();
				$totalAds=$stmt->num_rows;
				if($stmt->num_rows==0){
					echo "No result found ".$stmt->num_rows;
			//header("Location: sign-in.php?status=UNR");
				}
				$stmt->bind_result($title,$username,$desc,$photo,$email,$price,$location,$contact,$category); ?>
				
				
				<div>
					<h2>Total Ads: <?php echo $totalAds ?> </h2>
					<table border="1">
						<tr>
							<th>
								<h3> Title</h3>
							</td>
							<th>
								<h3> UserName</h3>
							</th>
							<th>
								<h3> Description</h3>
							</th>
							<th>
								<h3> Photo</h3>
							</th>
							<th>
								<h3> Email</h3>
							</th>
							<th>
								<h3> Price</h3>
							</th>
							<th>
								<h3> Location</h3>
							</th>
							<th>
								<h3> Contact</h3>
							</th>
							<th>
								<h3> Category </h3>
							</th>
							<th>
								<h3> Options</h3>
							</th>
						</tr>
						<?php while($stmt->fetch()){ 
							?>
							<tr>
								<td>
								
									<label> <?php echo $title ?></label>
								</td>
								<td>
									<label><?php echo $username ?></label>
								</td>
								<td>
									<label> <?php echo $desc ?> </label>
								</td>
								<td>
									<label> <?php echo $photo ?> </label>
								</td>
								<td>
									<label> <?php echo $email ?> </label>
								</td>
								<td>
									<label> <?php echo $price ?> </label>
								</td>
								<td>
									<label> <?php echo $location ?> </label>
								</td>
								<td>
									<label> <?php echo $contact ?> </label>
								</td>
								<td>
									<label> <?php echo $category ?> </label>
								</td>
								<td>
									<input type="button"  name="ad-details-btn" value="Remove"  <?php echo 'onClick="location.href='.'\'admin-action.php?title=' . $title.'&key='.$email .'\' " >' ?> 
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</section>




				<footer>
					<?php require 'includes/footer.php' ?>
				</footer>
			</body>
			</html>
			<?php 
		}
	} 
}
} ?> 
