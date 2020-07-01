<?php

session_start();
include "includes/header.php";
include "loginnav.php";
include "includes/db.php";

if(isset($_SESSION["user_id"])){

}else{
    header('location:index.php');
}

?>
<style>
    *{
        font-size:18px;
    }
.navbar{
    font-size:20px;
    position:relative !important;
    z-index:0;
}   
body{
    background:#efefef;
}
footer{
    position:absolute;
    bottom:0;
}
</style>

<div class="container-fluid p-5 text-center">
    <h3 class="d-inline">Welcome</h3>&emsp;<h1 class="d-inline display-6"><?php echo $_SESSION["name"];?></h1>
    <p class="mt-1">Here you can manage and update your profile</p>

    <div class="modal" tabindex="-1" id="mymodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Confirm it!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure that you donated blood.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  <form action="" method="post"><button type="submit" class="btn btn-primary" name="confirm">Yes</button></form>
                </div>
              </div>
            </div>
          </div>
    <?php

        if(isset($_POST["confirm"])){

          $currentdate = date_create();
          $currentdate = date_format($currentdate,'Y-m-d');
          $id = $_SESSION["user_id"];

          $updatequery = "update donors set save_life_data = '$currentdate' where id = '$id'";

          $query = mysqli_query($connection,$updatequery);

          if($query){
            $_SESSION["save_life_data"] = $currentdate;
            

          }else{
            
          }
        }

        $savedate = $_SESSION["save_life_data"];
        
    
        if(isset($_SESSION["save_life_data"]) != NULL){
             
           

                
                $end = date_create();
                $diff = date_diff(date_create($savedate),$end);

                $diffmonth = $diff->m;

                if($diffmonth >= 3){
                    
                    echo '<button type="subimt" class="btn btn-danger" data-target="#mymodal" data-toggle="modal" name="savedbtn">Saved A Life</button>';
                }else{
                    
                    echo   '<div class="alert alert-success alert-dismissible fade show " role="alert">
                                <strong>Congratulations</strong> you have donated blood . Now you can donate blood after 3 months.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                }
            
        }else{
            echo '<button type="subimt" class="btn btn-danger" data-target="#mymodal" data-toggle="modal" name="savedbtn">Saved A Life</button>';
        }
           
    ?>

    
</div>


<script>
      const dropdown = document.querySelector(".da")
      const home = document.querySelector(".home")

      home.classList.remove('active')
      dropdown.classList.add("active")
</script>

<?php
    include "includes/footer.php";
?>