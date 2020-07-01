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
    .navbar{
      position:relative !important;  
    }
    .nav-link a{
        font-size:20px;
    }
    .donor-div{
        position:relative !important;
    }
    .donor-div h1{
        border-bottom:3px solid white;
    }
    footer{
        position:absolute;
        bottom:0;
    }
    .form select{
        font-size:16px;
        width:300px;
    }
    .donors-div{
        max-width:290px;
        background:white;
        box-shadow:0px 4px 8px rgba(0,0,0,0.2);
    }
    .donors-div span{
        display:block;
    }
    @media screen and (max-width:480px){
        .form select{
            width:200px !important;
        }
        .states{
            margin-bottom:1em;
        }
        .centera{
            padding:2em !important;
        }
    }
</style>
<div class="search-heading my-5 text-center text-danger">
                <h2>Search The Donors</h2>
            </div>

            <div class="form d-inline text-center ">
                <form action="" method="get" class="form-group">
                    <select class="form-select d-inline mx-4 states" name="state" >
                        <option value="" selected>--select--</option>
                        <?php if(isset($_GET["state"])){echo '<option value="'.$_GET["state"].'" selected>'.strtoupper($_GET["state"]).'</option>';}?>
                    </select>
                    <select class="form-select d-inline mx-4" name="blood">
                    <?php if(isset($_GET["blood"])){echo '<option value="'.$_GET["blood"].'" selected>'.strtoupper($_GET["blood"]).'</option>';}?>
                        <option value="">--blood group--</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o-">O-</option>
                        <option value="o+">O+</option>
                        <option value="ab+">AB+</option>
                        <option value="ab-">AB-</option>
                    </select><br>
                    <input type="submit" class="btn btn-outline-danger mt-4" name="search" value="Search">
                    
                </form>
            </div>
            


            <div class="container-fluid p-5 centera">
                <div class="row">
            <?php
            
            if( isset($_GET["state"]) && !empty($_GET["state"]) && isset($_GET["blood"]) && !empty($_GET["blood"])){
                $state = $_GET["state"];
                $blood = $_GET["blood"];
                
                if(isset($_GET["search"])){
                                        
                    $selectquery = "select * from donors where state='$state' and blood_group='$blood'";
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
                                    echo '<style>.footer{position:unset;}</style>';

                            }else{
                                echo '<div class="col-md-3 p-4 donors-div m-2" >
                                        <span class="text-danger text-capitalize" style="font-size:20px;">'.$row["name"].'</span>
                                        <span class="">'.$row["blood_group"].'</span>
                                        <span class="">'.$row["state"].'</span>
                                        <span class="">'.$row["gender"].'</span>
                                        <b><span class="text-danger text-capitalize text-center" style="font-size:22px;color:red;">Donated</span></b>
                                </div>';
                                echo '<style>.footer{position:unset;}</style>';
                            }
                        }

                    }else{
                        
                        $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                            No Donors available
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                        
                    }
                }
            
            }
            
            ?>
            
            </div>
            
        </div>
        <?php if(isset($errormessage)){
            echo $errormessage;  
            echo '<style>.footer{position:absolute;bottom:0;}</style>';
        }
        
        ?>

<script>

        const states = document.querySelector(".states")
        console.log(states)

        async function getStates(){

            const state = await fetch("states.json");

            const data = await state.json()

            for(let i=0;i<data.length;i++){
                const option = document.createElement("option")
                option.setAttribute("value",data[i]["name"])
                option.textContent=(data[i]['name']).toUpperCase()
                states.append(option)
            }
        }

        getStates();

    const search = document.querySelector(".search")
    const home = document.querySelector(".home")

    home.classList.remove("active")
    search.classList.add("active")
</script>
<?php
    include "includes/footer.php";
?>
