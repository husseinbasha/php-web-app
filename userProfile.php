<?php          
session_start();
require 'includes/dbh.inc.php';

$id=$_SESSION['ID'];
$authId=$_REQUEST['id']; // Get it from articles authers

if($id==$authId){
    require 'wonerProfile.php';
}else{
    require 'publicProfile.php';
}
?>
 