<?php include 'includes/config.php'; 

$title="";$username="";$desc="";$photo="";$email="";
$price="";$location="";$contact="";$category="";
$sql="SELECT * FROM records"; 
$rs=$conn->query($sql); 
if($rs=== false) {
 trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR);
  } 
  else 
  { 
$rs->data_seek(0);
$link='\'';


//echo $rs->num_rows;
//$row = $rs->fetch_row();

while($row = $rs->fetch_row()){
	$title=$row['0'];
	$username=$row['1'];
	$desc=$row['2'];
	$photo=$row['3'];
	$email=$row['4'];
	$price=$row['5'];
	$location=$row['6'];
	$contact=$row['7'];
	$category=$row['8'];
	
	
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
<input type="button" class="ad-details-btn" name="ad-details-btn" value="View details"  <?php echo 'onClick="location.href='.'\'ad-details.php?title=' . $title.'&key='.$email .'\' " > </p>' ?> 
</div>
</section>
<?php
}
}
?>