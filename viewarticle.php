<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
require 'header.php';
require 'nav.php';
?>
<style>
  h1 {
    color: #fff;
    text-align: start;
    margin-left: 8px;
    font-family: 'Lobster' , 'sans-serif';

  }
  .title{
    font-family: 'Raleway' , 'sans-serif';


  }

  .border-l {
    font-size: 1.1em;
    border-left: 5px solid #8EE5EE;
    padding-left: 15px;   
     font-family: 'Montserrat' , 'sans-serif';

  }
  .of{
    position: relative;
    overflow: hidden;
  }
  .border-d {
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
  }
</style>

<div class="of">
<div class="container-fluid">
  <div class="row p-4">
    <div class="col-lg-12 ">
      <div class="container-fluid p-4 rounded mb-2" style="background: #121212;">
      <div class="row justify-content-between">
        <div class="col-m-6">
        <h1>your posts</h1>

        </div>
        
        
        
      
       
      </div>
      </div> 
     

      
      <?php 
      
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        require 'includes/dbh.inc.php';
        $result = $mysqli->query("select article.title , article.author ,  article.id , article.content  from article left join users on users.uid = article.uid WHERE users.uid = $id");
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '
                <div class="list-group text-dark">

                <a href="#" class=" list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between mb-2">
                <h3 class="title mb-1 h4">' . $row['title'] . ' by ' . $row['author'] . '</h3>
                <small>  </small>
                </div>
                <p class="mb-1 border-l">' .  substr($row['content'], 0, 300) . '</p>
                </a>              
                <div class="item p-4">
                <a class=" btn btn-secondary" href="article.php?id=' . $row['id'] . '">Show</a>
                <a class=" btn btn-info" href="addArticle.php?edit=' . $row['id'] . '&content='.$row['content'].'&title='.$row['title'].'">Edit</a>
                <a class=" btn btn-danger" href="viewarticle.php?delete=' . $row['id'] . '">Delete</a>
                </div>
                </div>
               
                ';
            }

        }else
        {
            
            echo '<a href="#" class=" list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between mb-2">
            <h3 class="title mb-1 h4"> Sorry there was a db error </h3>
            <small></small>
            </div>
            <p class="mb-1 border-l">Coldunt find what you\'re looking for</p>
            </a>           
        
            ';
        }
        
        
    }else if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      
      require 'includes/dbh.inc.php';
      if( $mysqli->query("delete from article where id = $id") === TRUE){

              
              echo '<div class="alert alert-danger mr-4" role="alert">
                post is deleted succesfuly
               <a href="viewarticle.php?id='.$_SESSION["ID"].'">go back</a>
               </div>';
          }
      }else{
        echo '<a href="#" class=" list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between mb-2">
        <h3 class="title mb-1 h4"> Sorry there was a server error </h3>
        <small></small>
        </div>
        <p class="mb-1 border-l">Coldunt find what you\'re looking for</p>
        </a>           
    
        ';
    }
    
      
      ?>
    
  
  </div>
</div>
<ul class="colorlib-bubbles">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>
</div>
<script src="js/core.js"></script>

<script src="js/animation.js"></script>

<?php
require('footer.php');
?>
