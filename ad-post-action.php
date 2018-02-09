<?php
include 'includes/config.php';
$title=$_POST['title'];
$category=$_POST['catselect'];
$desc=$_POST['desc'];
$price=$_POST['price'];
$contact=$_POST['contact'];
$loc=$_POST['loc'];
$status=false;
$imgUploaded=0;
$upload_dir="graphics/uploads/";
function sanitizeInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}

//user input sanitization
$title=sanitizeInput($title);
$category=sanitizeInput($category);
$desc=sanitizeInput($desc);
$price=sanitizeInput($price);
$contact=sanitizeInput($contact);
$loc=sanitizeInput($loc);


$username;
if(isset($_SESSION['loged'])){
	$username=$_SESSION['loged'];
	$email=$_SESSION['logEmail'];
}
$sql='INSERT INTO records (Title, UserName, Description, Photo,  Email, Price, Location, Contact, Category) VALUES (?,?,?,?,?,?,?,?,?)'; 
$stmt = $conn->prepare($sql);
if($stmt === false) { 
	trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
}
if ((($_FILES["userfile"]["type"] == "image/jpeg") || ($_FILES["userfile"]["type"] == "image/pjpeg") || ($_FILES["userfile"]["type"] == "image/png"))  && ($_FILES["userfile"]["size"] < 5000000)) {
	if($_FILES['userfile']['error']>0){
		echo 'Error while uploading';
	}
	else{
		$imgUploaded=1;
		$name=explode('.', $_FILES['userfile']['name']); 
		$ext=end($name);
		$filename=microtime(true).'.'.$ext;
		$tmp_name = $_FILES['userfile']['tmp_name'];
		if(move_uploaded_file($tmp_name, $upload_dir.$filename)){
			$imgUploaded=1;
			$upload_dir=$upload_dir.$filename;
		}
		echo $upload_dir;
	}
}
else{
	echo "Invalid file type, could not upload !";
}
$stmt->bind_param('sssssisss',$title,$username,$desc,$upload_dir,$email, $price, $loc,$contact,$category);

if($imgUploaded==0){ 
	header("Location: ad-post.php?status=IUF");	
}

else{
	if($stmt->execute()) {
		$status=true;
	}
	else{
		echo "sasda";
		$status=false;
	}
	if($status) {
		header("Location: ad-post.php?status=AP");	
	}
	else{
		header("Location: ad-post.php?status=NP");	
	}
}