<?php
require_once 'auth_session.php';
?>
<?php
$id = $_GET['id'];
require('db.php');

$query = " DELETE FROM `Users` WHERE user_id = '$id'";
$result = mysqli_query($con, $query) or die(mysql_error());
header("Location: admin_dashboard.php");
?>