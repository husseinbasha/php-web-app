<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/updateProfile.css">
</head>
<body>
<?php          
session_start();
require 'header.php';
require 'nav.php';
require 'includes/dbh.inc.php';
if(!isset($_SESSION['ID'])){
    header('Location : landing.php');
}
//var_dump( $_SESSION['ID']);
$id = $_SESSION['ID'];
if (isset($_POST['update'])) {

    $username = trim($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $bio=$mysqli->real_escape_string($_POST['bio']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
   // $picture=$mysqli->real_escape_string($_POST['picture']);

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: updateProfile.php?error=not-valid-username-or-email");
        exit();
    } else if ($password !== $password2) {
        header("Location: updateProfile.php?error=passwords-no-match");
        exit();
    }else{        
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE `users` SET `name`='$username',`username`='$username',`email`='$email',`bio`='$bio', `password`='$passwordHash' WHERE uid=$id";
        $mysqli->query($sql);
        updateProfileImage($mysqli , "picture" ,$id );

        // 3) Result
		if($mysqli->affected_rows > 0)
		{
                header("Location: updateProfile.php?infoUpdated=success");
                exit();
		}
        else
        {
			echo 'Could not insert your data. Error was '.$mysqli->error;
            // 5) Close
            $mysqli->close();
            unset($mysqli);
        }
            
    }
}else{
$select = "select * from users where uid = $id";

if($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);

}
$res = $mysqli->query($select);
if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
    if($row['pic']==NULL){
        $src="https://api.adorable.io/avatars/285/abott@adorable.png";
    }else{
        $src="images/".$row['pic'];
    }

?>



<div>
    <div class="container">
         <div class=" row justify-content-center p-2  rounded mt-4 " >
         <div class="col-md-4 mr-2">      
                <div class="portlet light profile-sidebar-portlet bordered">
                    <div class="profile-userpic">
                        <img src=<?=$src?> class="img-responsive" alt="" width = "250px" height="250px">> </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"><?=$row['username']?> </div>
                        <div class="profile-usertitle-job"><?=$row['bio']?></div>
                    </div>

                </div>
        
        </div>
         <div class="col-md-6"> 
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase"> Update Your Info</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div>
                        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <form form action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label for="inputName" class="lbl" >User Name</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Name"name="username" value="<?=$row['username']?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1" class="lbl" >Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"name="email"value="<?=$row['email']?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputBio" class="lbl" >Bio</label>
                                        <textarea class="form-control bio" id="" placeholder="Your bio" name="bio" value="<?=$row['bio']?>" required></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1" class="lbl">New Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1" class="lbl">Re-type</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password2" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputFile" class="lbl">File input</label>
                                        <input type="file" id="exampleInputFile" name="picture">
                                      </div>
                                      <button type="submit" class="btn btn-secondary subBtn" name="update">Update</button>
                                    </form>
                                
                        
                        </div>
                    </div>
                </div>
        
        </div>
        </div>


    </div>
</div>

<?php
}}}



function updateProfileImage($mysqli , $picture ,$id ){
    
    $filename = $_FILES[$picture]['name'];
    $filetmp = $_FILES[$picture]['tmp_name'];
    

    $folder = "images/";
    $ext = explode('.', $filename);
    $aext = strtolower(end($ext));
    $allowed = array('jpg' , 'jpeg' , 'png');
   if(in_array($ext[1] , $allowed)){
          
    try{
        move_uploaded_file($filetmp , $folder.$filename);

    }catch(Exception $ex){
        echo $ex;
    }
    $name= mysqli_real_escape_string($mysqli , $filename);
    $query = "update users set pic = \"$name\" where uid = $id";
        if($mysqli->connect_error){
            die("Connection failed: " . $mysqli->connect_error);

        }
        if( $mysqli->query($query) === TRUE )
        { 
            return true;
        }else{
            echo $mysqli->error;
        }
   }  
}
?>
<?php
require('footer.php');
?>
