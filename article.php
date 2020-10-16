<?php
session_start();
require '/header.php';
require '/nav.php';
require 'includes/dbh.inc.php';
if($_GET['id']){
$result = getArticle($mysqli , $_GET['id']);
}else{
  header("Location: landing.php");
}
while($row = $result->fetch_assoc()){
$author = $row['author'];
$author_id = $row['uid'];}

?>
<div></div>

<?php
require('footer.php');
?>