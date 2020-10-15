<?php          
session_start();
require 'header.php';
require 'nav.php';
require 'includes/dbh.inc.php';
$id=$_SESSION['ID'];
$res=getUserWithID($mysqli, $id);
while($row=$res->fetch_assoc()){
    if($row['pic']==NULL){
        $src="https://api.adorable.io/avatars/285/abott@adorable.png";
    }else{
        $src="includes/images/".$row['pic'];
    }

?>


<head>
<meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/profileView.css">
</head>

<div class="container">
  <div class="box">
    <div class="card-header">
      <div class="img">
        <div class="inner-img">
          <img src=<?=$src?> alt="" class="img-profile">
        </div>
      </div>
      <div class="desc">
        <h3><?=$row['username']?></h3>
        <h5><?=$row['email']?></h5>
        <p><?=$row['bio']?></p>
      </div>
  
      <div class="buttons">
        <a href="article.php?id=<?=$row['uid']?>" class="btn btn-primary">Articles</a>
        <a href="updateProfile.php" class="btn btn-bordered" >Update info</a>
      </div>
    </div>
</div>
  <?php
    }
    ?>  