<?php

include "header.php";

?>

<style>
  .navbar a{
    font-size:20px !important;
  }
  
@media only screen and (max-width:480px){
    .navbar-brand{
        margin-left:0 !important;
        
    }
} 
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light " style="position:fixed ;width:100%;z-index:999">
  <div class="container-fluid">
    <a class="navbar-brand ml-4 text-danger" href="#"><i class="fa fa-university mr-1 " style="font-size:0.87em;" aria-hidden="true"></i>Donate Blood</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-4" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0" >
        <li class="nav-item">
          <a class="nav-link active home" aria-current="page" href="index.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link donate" href="donate.php">Donate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link donors" href="donors.php">Donors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link search" href="search.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link signin" href="signin.php">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link about" href="index.php">About Us</a>
        </li>
          
      </ul>
    
    </div>
  </div>
</nav>