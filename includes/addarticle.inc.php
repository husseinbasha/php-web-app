<?php
session_start();
if(isset($_SESSION['ID'])){
    $id = $_SESSION['ID'];

if(isset($_POST['submit'])){
    $title=$_POST['title'];
   
    $content=$_POST['article'];
    $author=$_SESSION['USERNAME'];
   
    
if(empty($title)||empty($article)){
    echo '<div class="alert alert-danger">All fileds are requierd!</div>';
}else{
    addArticle($mysqli, $id, $author, $title, $content);
    header('Location:article.php?inserted');
}
}
}else{
    header('Location: ../landing.php');
}
