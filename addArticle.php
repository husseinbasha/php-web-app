<?php 
require 'header.php';
require 'nav.php';
?>

<div class="article-add container"><!--Container-->
  
  <div class="article-form">
      <br>
      <h1 class="mb-3 article-forest-text text-center"><i class="fas fa-newspaper"></i></h1> 
      <form action="/events" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-4 font-weight-normal article-forest-text text-center">Create a New Article</h1>
      <div class="form-group">
          <label for="name">Article Topic:</label>
          <input class="form-control" type="text" name="name" placeholder="articleTopic" required autofocus>
      </div>
      <!-- <div class="form-group">
          <label for="date">Date of publish:</label>
          <input class="form-control" type="text" name="date" placeholder="date" required>
      </div>
      <div class="form-group">
          <label for="time">Time of publish:</label>
          <input class="form-control" type="text" name="time" placeholder="time" required>
      </div> -->
      <div class="form-group">
          <label for="description">Article:</label>
          <textarea class="form-control" rows="5" type="text" name="article" placeholder="description"></textarea>
      </div>
      <div class="form-group">
          <button class="btn btn-lg article-btn-light btn-block" name="submit">Submit</button>
      </div>
      </form>
  </div>
  
</div><!--container -->