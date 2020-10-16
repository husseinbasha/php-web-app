<?php
session_start();
require 'header.php';
require 'nav.php';
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
<div></div>

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
    <p><?=time_elapsed_string( $row['date_published'])?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="showcase.jpg" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"><?=$row['content']?>

    

    
    <hr>
    


    <!-- Comments Form -->
   
   
    
        <!-- /*****this get the comment using function in included/dhb.inc.php */
            //     $res = getCommentes($mysqli , 1);
            //     while($row = $res->fetch_assoc()){ -->
                    
                
                

            
              <!-- Single Comment -->
              <!-- <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">commenter</h5>
                 <?=$row['content']?>
                      </div>
              </div> -->
              
</div>

  <!-- Sidebar Widgets Column -->
  <!--TODO
    1.show profile of author
    2.add profile picture
  -->
  
  <div class="col-md-4">
  

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

<!-- /.container -->
</footer>
<?php
}
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
require('footer.php');
?>