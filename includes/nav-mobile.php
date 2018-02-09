<?php include 'includes/config.php'; ?>
<nav class="sm-only">
	<input type="button" id="btnHome"  onClick="location.href='index.php '" >
	<div class="dropDownCategories">
		<button onclick="dropDownC()" id="btnCategories" ></button>
		<div id="dropDownCategories" class="dropDown-contentC">
			<a href="category.php?c=Bike" class="nav-linkm"><img src="graphics/icons/bike-sm.png" class="navimg" alt="image">Bike</a>
		    <a href="category.php?c=Vehicle" class="nav-linkm"><img src="graphics/icons/car-sm.png" class="navimg" alt="image">Car</a>
		    <a href="category.php?c=Electronics" class="nav-linkm"><img src="graphics/icons/electronic-sm.png" class="navimg" alt="image">Electronics</a>
		    <a href="category.php?c=Mobile" class="nav-linkm"><img src="graphics/icons/mobile-sm.png" alt="image" class="navimg">Mobile</a>
		    <a href="category.php?c=Home" class="nav-linkm"><img src="graphics/icons/home-sm.png" class="navimg" alt="image">Home</a>
		    <a href="category.php?c=Furniture" class="nav-linkm"><img src="graphics/icons/sofa-sm.png" class="navimg" alt="image">Furniture</a>
		    <a href="category.php?c=Pet" class="nav-linkm"><img src="graphics/icons/pet-sm.png" class="navimg" alt="image">Pet</a>
		    <a href="category.php?c=Book" class="nav-linkm"><img src="graphics/icons/book-sm.png" class="navimg" alt="image">Book</a>
		</div>
	</div>



	<div class="dropDownOptions">
		<button onclick="dropDownO()" id="btnOptions"></button>
		<div id="dropDownOptions" class="dropDown-contentO">
				<?php 
		if(isset($_SESSION['loged'])){ 
			if($_SESSION['loged']=="Admin"){
				?>
				<a href="admin.php" class="linkheader-text"><img alt="icon" src="graphics/icons/settings.png" class="icon-default">Admin Panel </a>
			<?php }
			?>
			 <?php 
				echo '<a href="user-profile.php" class="linkheader-text"> <img alt="icon" src="graphics/icons/smile.png" class="icon-default"> '. $_SESSION['loged'].'</a>';
			if($_SESSION['loged']!="Admin"){ ?>
			
			
		<?php }  }
		else{ ?>
			<a href="sign-in.php" class="linkheader-text"><img alt="icon" src="graphics/icons/user.png" class="icon-default">Log In</a>
			
			<?php 
			} ?>
			<a href="sign-up.php"><img alt="icon" src="graphics/icons/register.png" class="icon-small">Register</a>
		<a href="edit-user-profile.php"><img alt="icon" src="graphics/icons/lock.png" class="icon-small">Privacy</a>
		<a href="user-profile.php"><img alt="icon" src="graphics/icons/settings.png" class="icon-small">Account Settings</a>
		<?php 
		if(isset($_SESSION['loged'])){  ?>
			 <a href="logout-action.php" class="linkheader-text"><img alt="icon" src="graphics/icons/logout.png" class="icon-default">Log Out </a>
			<?php }	?>
		</div>
	</div>
</nav>