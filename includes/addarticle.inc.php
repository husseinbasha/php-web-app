<?php
require'dbh.inc.php';
session_start();
if(isset($_SESSION['ID'])){

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    
    $content=$_POST['article'];
    $author=$_SESSION['USERNAME'];
    $userid = $_SESSION['ID'];

    
if(empty($title)|| empty($content)){
    echo '<div class="alert alert-danger">All fileds are requierd!</div>';
}else{
    addArticle($mysqli, $userid, $author, $title, $content);
    $result = getArticle($mysqli , $id);
    header('Location:../allArticles.php');
}
}
}else{
    header('Location: ../landing.php');
}
