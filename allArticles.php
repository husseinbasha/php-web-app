 <?php
 if(!isset($_SESSION['id'])){
   session_start();
 }
require 'header.php';
require 'nav.php';
?>
<style>
    h1{
        color:#fff; 
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-align: start;
    }
    .border-l{
      font-size: 1em;
      border-left: 5px solid #8EE5EE;
      padding-left: 15px;
    }
    .border-d{
      border-bottom-left-radius:5px;
      border-bottom-right-radius:5px;
    }
</style>


<div class="container-fluid">
<div class="row p-4">
<div class="col-lg-9 ">
    <div class= "container-fluid rounded p-4" style="background: #141414;"> 
       <h1>This week articles</h1> 
    </div>
<div class="list-group">
    <?php
        require 'includes/dbh.inc.php';

        $res = getArticles($mysqli);
        while($row = $res->fetch_assoc()){
          $time = strtotime($row['date_published']);
            echo '<a href="#" class=" mt-3 list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <!-- title -->
              <h3 class="mb-1 h3">'.$row['title'].' | ' .$row['author'].'</h3>
          <!--date_published-->    <small> '.date('d/m/y',$time).'</small>
            </div>
            <p class="mb-1 border-l"><span style="">'.substr($row['content'], 0 , 300).'</span></p>
          </a>    <small class="text-muted border-d bg-white"><a class="nav-link bg-white border-d border border-white ml-2" href="article.php?id='.$row['id'].'">read more...</a></small>
          ';
        }
        

    ?>  
  
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
  </a>
  <div class="continer-fluid bg-light ">
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>
</div>
</div>
<div class="col">
    <div class="card">
        <div class="card-header">
          <h2>TOPICS</h2>
        </div>
        <div class="card-body">
            adcontent    
        </div>
    </div>
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
</div>



</div>
</div>