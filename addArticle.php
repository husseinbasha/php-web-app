<?php 
require 'header.php';
require 'nav.php';
require ('includes/dbh.inc.php');




?>


<div class="article-add container"><!--Container-->
  
  <div class="article-form">
      <br>
      <h1 class="mb-3 article-forest-text text-center"><i class="fas fa-newspaper"></i></h1> 
      <form action="" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-4 font-weight-normal article-forest-text text-center">Create a New Article</h1>
      <div class="form-group">
          <label for="topic">Article Title:</label>
          <input class="form-control" type="text" name="title" placeholder="article topic" required autofocus>
      </div>
      <label for="image">Image:</label>
      <div class="input-group">
          <div class="input-group-prepend mb-3">
              <span class="input-group-text">Upload</span>
          </div>
          <div class="custom-file">
              <input type="file" id="article-image" name="image" accept="image/*">
              <label class="custom-file-label" for="image">Choose image</label>
          </div>
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
          <label for="article">Article:</label>
          <textarea class="form-control" rows="8" type="text" name="article" placeholder="article" required ></textarea>
      </div>
      <div class="form-group">
          <button class="btn btn-lg article-btn-light btn-block" name="submit">Submit</button>
      </div>
      </form>
  </div>
  
</div><!--container -->