<?php

require 'dbh.inc.php';
if (isset($_GET['sort'])) {
    setcookie('sort', $_GET['sort'], time() * 8500, '/', '', 0);
}
if (isset($_GET['pageno'])) {
    $pagenumber = $_GET['pageno'];
} else {
    $pagenumber = 1;
}
$no_of_records_per_page = 5;
$page = ($pagenumber - 1) * $no_of_records_per_page;

if (isset($_POST['submit'])) {
    
    $key = $_POST['key'];
    $res_data = getArticleSearch($mysqli, $key);
    if($res_data->num_rows   == 0){
        echo '<a href="#" class=" list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between mb-2">
        <h3 class="title mb-1 h4"> Sorry </h3>
        <small></small>
        </div>
        <p class="mb-1 border-l">Coldunt find what you\'re looking for</p>
        </a>              

        ';
        exit();
    }else{
    while ($row = $res_data->fetch_assoc()) {

        $time = time_elapsed_string($row['date_published']);
        echo '<a href="#" class=" list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between mb-2">
              <h3 class="title mb-1 h4">' . $row['title'] . ' by ' . $row['author'] . '</h3>
              <small> ' . $time . '</small>
              </div>
              <p class="mb-1 border-l">' .  substr($row['content'], 0, 300) . '</p>
              </a>              
              <div class="container-flex w-100 justify-content-between mb-2">
    
              <a class="nav-link bg-white border-d border border-white " href="article.php?id=' . $row['id'] . '">read more...</a></div>
              ';
    }

        
    }}
else{

$result = getArticlesCount($mysqli);

$total_rows = $result->fetch_assoc()['COUNT(*)'];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$res_data = getArticlePage($mysqli, $page, $no_of_records_per_page);

while ($row = $res_data->fetch_assoc()) {

    $time = time_elapsed_string($row['date_published']);
    echo '<a href="#" class=" list-group-item list-group-item-action border-top rounded-top border-bottom-0 flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between mb-2">
          <h3 class="title mb-1 h4">' . $row['title'] . ' by ' . $row['author'] . '</h3>
          <small> ' . $time . '</small>
          </div>
          <p class="mb-1 border-l">' .  substr($row['content'], 0, 300) . '</p>
          </a>              
          <div class="container-flex w-100 justify-content-between mb-2">

          <a class="nav-link bg-white border-d border border-white " href="article.php?id=' . $row['id'] . '">read more...</a></div>
          ';
}
if ($pagenumber <= 1) {
    $disabled1 = 'disabled';
} else {

    $disabled1 = '';
}
if ($pagenumber >= $total_pages) {
    $disabled2 = 'disabled';
} else {
    $disabled2 = ' ';
}

?>
<nav aria-label="Page navigation example ">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php echo $disabled1 ?>">
            <a class="page-link" href="<?php if ($pagenumber <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pagenumber - 1);
                                        } ?> "><i class="fas fa-arrow-left    "></i></a></li>
        <?php
        if ($total_pages > 3) {
            for ($i = 0; $i < $total_pages; $i++) {
                echo '<li class="page-item <?php echo $disabled1 ?>">
        <a class="page-link" href="?pageno=' . ($i + 1) . '">' . ($i + 1) . '
        </a></li>';
            }
        }
        ?>

        <li class="page-item <?php echo $disabled2 ?>">
            <a class="page-link" href="<?php if ($pagenumber >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pagenumber + 1);
                                        } ?> "><i class="fas fa-arrow-right    "></i></a></li>
    </ul>
</nav>
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
?>