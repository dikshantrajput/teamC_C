
<style>

    .navbar a{
      font-size:20px;
    }
    nav{
      z-index:99999;
    }
    @media only screen and (max-width:480px){
    .navbar-brand{
        margin-left:0 !important;
        
    }
} 

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed ;width:100%">
  <div class="container-fluid">
    <a class="navbar-brand ml-5" href="profile.php"><i class="fa fa-university mr-1 " style="font-size:0.87em;" aria-hidden="true"></i>Donate Blood</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-4" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0 mr-5">
        <li class="nav-item">
          <a class="nav-link active home" aria-current="page" href="profile.php">Home</a>
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
          <a class="nav-link about"  href="profile.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle da" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION["name"];?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item px-0 pl-2"  style="font-size:16px;" href="profile.php"><i class="fa fa-user-circle mr-1"></i>Profile</a></li>
            <li><a class="dropdown-item px-0 pl-2" style="font-size:16px;" href="update.php"><i class="fa fa-edit mr-1"></i>Update Profile</a></li>
            <li><a class="dropdown-item  px-0 pl-2" style="font-size:16px;" href="logout.php"><i class="fa fa-sign-out mr-1"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

