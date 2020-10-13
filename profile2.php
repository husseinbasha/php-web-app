<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php          
session_start();
require 'header.php';
require 'nav.php';
// var_dump($_COOKIE['id']);
$id = $_SESSION['ID'];
require 'includes/dbh.inc.php';
if (isset($_POST['update'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
    
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: profile2.php?error=not-valid-username-or-email");
        exit();
    } else if ($password !== $password2) {
        header("Location: profile2.php?error=passwords-no-match&username=" . $username . "&email=" . $email);
        exit();
    }else{
        $sql = "UPDATE `users` SET `name`=?, `username`=?,`email`=?,`password=? WHERE `uid`=$id";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: profile2.php?error=sqlerror&username=" . $username . "&email=" . $email);
            exit();
        } else {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            mysqli_stmt_bind_param($stmt, "ssss", $username, $username, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: profile2.php?infoUpdated=success");
            exit();
        }
    }
}else{
$select = "select * from users where uid =$id";

if($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);

}
$res = $mysqli->query($select);
if($res->num_rows > 0){
    while($row = $res->fetch_assoc()){
    
    
?>



<div>
    <div class="container">
         <div class=" row justify-content-center p-2  rounded mt-4 " >
         <div class="col-md-4 mr-2">      
                <div class="portlet light profile-sidebar-portlet bordered">
                    <div class="profile-userpic">
                        <img src="https://api.adorable.io/avatars/285/abott@adorable.png" class="img-responsive" alt=""> </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"><?=$row['username']?> </div>
                        <div class="profile-usertitle-job"> Developer </div>
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
                                    <form form action="" method="post">
                                      <div class="form-group">
                                        <label for="inputName" class="lbl" >User Name</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Name"name="username" value="<?=$row['username']?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1" class="lbl" >Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"name="email"value="<?=$row['email']?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1" class="lbl">New Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1" class="lbl">Re-type</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password2" name="Password2">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputFile" class="lbl">File input</label>
                                        <input type="file" id="exampleInputFile">
                                      </div>
                                      <button type="submit" class="btn btn-secondary subBtn" name="update">Submit</button>
                                    </form>
                                
                        
                        </div>
                    </div>
                </div>
        
        </div>
        </div>


    </div>
</div>

<?php

}

}else{
    echo ' No user';
}
}
?>
</body>
</html>
