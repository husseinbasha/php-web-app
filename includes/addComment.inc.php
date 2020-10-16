<?php
require 'dbh.inc.php';

if(isset($_SESSION['ID'])){
    $id = $_SESSION['ID'];
    $username = $_SESSION['USERNAME'];
    if(isset($_POST['submit']))
    {
        $content = $_POST['content'];
        if(empty($content)){
            header("Location: ../article?error=empty-fields");
            exit();
        }else{
            if($_GET['id']){
                $article_id = $_GET['id'];
                $res = addComment($mysqli , $id , $article_id , $content);
                if($res){
                    header('Location: article.php?comment-submitted');
                    exit();
                }else{
                    header('Location: article.php?error=db-error');
                }
            }
        }
    }  
    
}else{
    header("Location: ../article?isUser=false");
    exit();
}