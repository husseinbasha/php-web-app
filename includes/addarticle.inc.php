<?php
session_start();

require 'dbh.inc.php';
if(isset($_SESSION['ID']) || isset($_COOKIE['uid'])){

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    
    $content=$_POST['article'];
    $author=$_SESSION['USERNAME'];
    $userid = $_SESSION['ID'];

    
if(empty($title)|| empty($content)){
    echo '<div class="alert alert-danger">All fileds are requierd!</div>';
}else{
    $id= addArticle($mysqli, $userid, $author, $title, $content);
    if(is_int($id)){
    header('Location: ../article.php?id='.$id);
    }else{

    }

}
}
}else{
    header('Location: ../landing.php');
}
