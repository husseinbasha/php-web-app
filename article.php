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
$author_id = $row['uid'];

?>
<style>
    .footer{
        background: #121212;
    }
    .title{
      font-family: 'Oswald' , 'sans-serif';
      color:#121212;
      font-size: 3em;
      
    }
    p{
      font-family: 'Montserrat' , 'sans-serif';
    }

</style>
 <div class="container-fluid rounded p-5">

<div class="row">

  <!-- Post Content Column -->
  <div class="col-lg-8 bg-light rounded">
<!-- Title -->
    <h2 class="mt-4 title " ><?=$row['title']?></h2>
    
    
    <!-- Author -->
    <p class="lead">
      by
      <a href="userProfile?id=<?=$row['uid']?>"><?=$row['author']?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><?=$row['date_published']?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"><?=$row['content']?>

    <blockquote class="blockquote">
      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <footer class="blockquote-footer">Someone famous in
        <cite title="Source Title">Source Title</cite>
      </footer>
    </blockquote>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

    <hr>
    


    <!-- Comments Form -->
    <div class="card my-4">
      <h5 class="card-header">
        Write a comment....

      </h5>
      <div class="card-body">
        <form action="includes/addComment.inc.php" method = "post" >
          <div class="form-group">
            <textarea name="content" class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <?php
        /*****this get the comment using function in included/dhb.inc.php */
                $res = getCommentes($mysqli , 1);
                while($row = $res->fetch_assoc()){
                    
                
                

            ?> 
              <!-- Single Comment -->
              <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">commenter</h5>
                 <?=$row['content']?>
                      </div>
              </div>
              <?php
               }?>
</div>

  <!-- Sidebar Widgets Column -->
  <!--TODO
    1.show profile of author
    2.add profile picture
  -->
  
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="card-header">
         <h2> profile</h2>

        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Categories</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#">Web Design</a>
              </li>
              <li>
                <a href="#">HTML</a>
              </li>
              <li>
                <a href="#">Freebies</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#">JavaScript</a>
              </li>
              <li>
                <a href="#">CSS</a>
              </li>
              <li>
                <a href="#">Tutorials</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Side Widget -->
    <!-- <div class="card my-4">
      <h5 class="card-header">Side Widget</h5>
      <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
      </div>
    </div>
              -->
  </div> 

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 footer">
<div class="container">
  <p class="m-0 text-center text-white">Copyright 2020 &copy; <span style="font-family: lobster , cursive;">FEEDIT </span> </p>
</div>
<!-- /.container -->
</footer>
<?php
}
?>



