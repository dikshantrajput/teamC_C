<?php
    include "includes/header.php";
    include "includes/db.php";

    session_start();
    
    if(isset($_SESSION["user_id"]) ){
        include "loginnav.php";
        
    }else{
        include "includes/navigation.php";
        
    }
?>

<style>
    *{
        font-size:16px;
    }
    body{
        background:#efefef;
    }
    .navbar{
      position:relative !important;  
    }
    .navbar a {
        font-size:20px;
    }
    .donor-div{
        position:relative !important;
    }
    .donor-div h1{
        border-bottom:3px solid white;
    }
    footer{
        
    }
    .donors-div{
        max-width:300px;
        background:white;
        box-shadow:0px 4px 8px rgba(0,0,0,0.2);
    }
    .donors-div span{
        display:block;
    }
</style>

<div class="container-fluid bg-danger text-center donor-div p-3 ">
    <h1 class="d-inline text-white px-4  m-3">Donors</h1>
</div>


<div class="container-fluid p-5">
    <div class="row">
        
<?php

$selectquery = "select * from donors";
$query = mysqli_query($connection,$selectquery);

if(mysqli_num_rows($query) > 0){

    while($row = mysqli_fetch_assoc($query)){

        if($row["save_life_data"] == NULL){

        
            echo '<div class="col-md-3 p-4 donors-div m-2" >
                    <span class="text-danger text-capitalize" style="font-size:20px;">'.$row["name"].'</span>
                    <span class="">'.$row["blood_group"].'</span>
                    <span class="">'.$row["state"].'</span>
                    <span class="">'.$row["gender"].'</span>
                    <span class="">'.$row["email"].'</span>
                    <span class="">'.$row["mobile"].'</span>
                </div>';

        }else{
                
                $savedate = $row["save_life_data"];
                                
                $end = date_create();
                
                $diff = date_diff(date_create($savedate),$end);

                $diffmonth = $diff->m;

                if($diffmonth >= 3){

                    echo '<div class="col-md-3 p-4 donors-div m-2" >
                    <span class="text-danger text-capitalize" style="font-size:20px;">'.$row["name"].'</span>
                    <span class="">'.$row["blood_group"].'</span>
                    <span class="">'.$row["state"].'</span>
                    <span class="">'.$row["gender"].'</span>
                    <span class="">'.$row["email"].'</span>
                    <span class="">'.$row["mobile"].'</span>
                </div>';

                }else{
                    echo '<div class="col-md-3 p-4 donors-div m-2" >
                    <span class="text-danger text-capitalize" style="font-size:20px;">'.$row["name"].'</span>
                    <span class="">'.$row["blood_group"].'</span>
                    <span class="">'.$row["state"].'</span>
                    <span class="">'.$row["gender"].'</span>
                    <b><span class="text-danger text-capitalize text-center" style="font-size:22px;color:red;">Donated</span></b>
            </div>';
                }

        }
    }

}else{
    $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                No Donors currently available
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
}

?>        
    </div>
</div>

<?php if(isset($errormessage)){
              
            echo '<style>.footer{position:absolute;bottom:0;}</style>';
        }
?>

<script>
    const donors = document.querySelector(".donors")
    const home = document.querySelector(".home")

    home.classList.remove("active")
    donors.classList.add("active")

</script>
<?php

    include "includes/footer.php";

?>