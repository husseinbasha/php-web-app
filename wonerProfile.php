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
        $src="images/".$row['pic'];
    }
  
    
?>


<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/profileView.css">
</head>

<div class="container">
  <div class="box">
    <div class="card-header shadow">
      <div class="img">
        <div class="inner-img">
          <img src="<?php echo $src?>" alt="" class="img-profile">
        </div>
      </div>
      <div class="desc">
        <h3><?=$row['username']?></h3>
        <h5><?=$row['email']?></h5>
        <p><?=$row['bio']?></p>
      </div>
  
      <div class="buttons">
        <a href="viewarticle.php?id=<?=$row['uid']?>" class="btn mr-2 btn-primary">Articles</a>
        <a href="updateProfile.php" class="btn btn-bordered" >Update info</a>
        <a href="addArticle.php" class="btn mt-2 btn-bordered" >write an article</a>
      </div>
    </div>
</div>
</div>
<?php
}
function updateProfileImage($mysqli , $picture ,$id ){
    
  $filename = $_FILES[$picture]['name'];
  $filetmp = $_FILES[$picture]['tmp_name'];

  $folder = "images/";
  $ext = explode('.', $filename);
  $aext = strtolower(end($ext));
  $allowed = array('jpg' , 'jpeg' , 'png');
 if(in_array($ext[1] , $allowed)){
        
  try{
  
      move_uploaded_file($filetmp , $folder.'profile'.$id.$filename);
    

      
    
  }catch(Exception $ex){
      echo $ex;
  }
  $name= mysqli_real_escape_string($mysqli , 'profile'.$id.$filename);
  $query = "update users set pic = \"$name\" where uid = $id";
      if($mysqli->connect_error){
          die("Connection failed: " . $mysqli->connect_error);

      }
   $mysqli->query($query);
 }
}
?>
    <?php
require('footer.php');
?>
