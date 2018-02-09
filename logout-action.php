<?php
include 'includes/config.php';
unset($_SESSION['loged']);
unset($_SESSION['legemail']);
header("Location: index.php");
?>