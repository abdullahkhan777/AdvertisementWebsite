<?php include 'includes/config.php'; ?>
<div class="content-width">
	<a href="index.php"><h1 id="logo">Adhub</h1></a>
	<div class="submit-ad">
		<input type="button" name="buttonpost" value="Submit an Ad" class="postbutton" onClick="location.href='sign-in.php?msg=SP'" >
	</div>
	<div id="header-links">
		<?php 
		if(isset($_SESSION['loged'])){ 
			if($_SESSION['loged']=="Admin"){
				?>
				<a href="admin.php" class="linkheader-text"><img alt="icon" src="graphics/icons/settings.png" class="icon-default">Admin Panel </a>&nbsp;
			<?php }
			?>
			<a href="logout-action.php" class="linkheader-text"><img alt="icon" src="graphics/icons/logout.png" class="icon-default">Log Out </a>&nbsp; <?php 
				echo '<a href="user-profile.php" class="linkheader-text"> <img alt="icon" src="graphics/icons/smile.png" class="icon-default"> '. $_SESSION['loged'].'</a>';
			if($_SESSION['loged']!="Admin"){ ?>
			<input type="button" name="buttonpost" value="Submit an Ad" class="postbutton" onClick="location.href='ad-post.php'" >
		<?php }  }
		else{ ?>
			<a href="sign-in.php" class="linkheader-text"><img alt="icon" src="graphics/icons/user.png" class="icon-default">MyAccount</a>&nbsp;
			
			<?php 
				if(!isset($_SESSION["loged"])){
			?>
			<input type="button" name="buttonpost" value="Submit an Ad" class="postbutton" onClick="location.href='sign-in.php?msg=SP'" >
			<?php } ?>
		</div>

	</div>
	<?php 
/* 
<div id="Welcome-msg">
		<?php 
		if(isset($_SESSION['loged'])){
			
		}
		?>
	</div>

*/
}
		?>
