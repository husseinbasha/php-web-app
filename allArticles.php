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
    <div class="col-lg-9 ">
      <div class="container-fluid p-4 rounded mb-2" style="background: #121212;">
      <div class="row justify-content-between">
        <div class="col-m-6">
        <h1>Top posts</h1>

        </div>
        <div class="col-m-6 ">
            <form class="form mt-1" action="" method="post"> 
            
            <div class="input-group ">
          
            <input class="form-control bg-light " name="key" type="text" placeholder="Search">
            <div class="input-group-btn bg-dark">
            <button class="btn btn-dark  "  name = "submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></i>
            </button>
            </div>
            </div>
            </form>
        </div>
        </div>
        <div class="row mt-3 text-white">
          <div class="col-sm-">

        
          </div>
          
        </div>
      
       
      </div>
      <?php 
      if(isset($_POST['submit'])){
        include_once 'includes/articles.inc.php' ;

      }else{
        include_once 'includes/articles.inc.php' ;

      }
      
      ?>
    </div>
  <div class="col">
   <div class="card title">
        <div class="card-header">
          <h2>Sort by <i class="ml-3 fa fa-sort text-dark" aria-hidden="true"></i></h2>
        </div>
        <div class="card-body">
          <form action="">
            <button class="btn">
                    Notification <span class="badge badge-primary">Date</span>
            </button>
          </form>
        </div>
      </div>
      <div class="card my-4 title">
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
    </div>
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
</body>
</html>