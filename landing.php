<?php
if(!isset($_SESSION['ID'])){
session_start();
}
require 'header.php';
require 'nav.php';
?>
<style>
.landing {
  position: relative;

  height: 100vh;
}   
.landing-inner {
  color: #fff;
  height: 100%;
  width: 80%;
  margin: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.container {
  max-width: 1100px;
  margin: auto;
  overflow: hidden;
  padding: 0 2rem;
  margin-top: 6rem;
  margin-bottom: 3rem;
}

/* Text Styles*/
.x-large {
  font-size: 4rem;
  line-height: 1.2;
  margin-bottom: 1rem;
}

.large {
  font-size: 3rem;
  line-height: 1.2;
  margin-bottom: 1rem;
}

.lead {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.text-center {
  text-align: center;
}
.dark-overlay {
  background-color: rgba(0, 0, 0, 0.7);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
h1
{
    font-family: "Lobster" , "Cursive";
}

</style>
<section class="landing">
        <div class="dark-overlay">
          <div class="landing-inner">
          <h1 class="x-large">
          <i class="fas fa-brain   mr-1 "></i>

            FEEDIT </h1>
            <p class="lead">
              Create a your own profile/portfolio, join us to read and write<br> an outstanding atricles on our community
              
            </p>
            <div class="buttons">
              <?php if(!$_SESSION['ID']){
                echo '<a href="signUp.php" class="btn btn-primary">Signup</a>
                     <a href="login.php" class="btn btn-light">Login</a>';
              }?>
            </div>
            
          </div>
          
        </div>
 
 </section>

