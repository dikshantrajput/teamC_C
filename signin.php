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
    .donor-div{
        position:relative !important;
    }
    .donor-div h1{
        border-bottom:3px solid white;
    }
    .form{
        width:450px;
        background:white;
        box-shadow:0px 4px 8px rgba(0,0,0,0.4);
    }
    .form label,.form input{
        font-size:16px !important;
    }
    .head h3{
    }
    footer{
        position:absolute;
    }
    @media screen and (max-width:480px){
        *{
            font-size:15px;
        }
        .form{
            width:90%;
        }
        .donor-div h1{
            font-size:1.5em;
            border-bottom:2px solid white;
        }
    }
</style>

<?php

    if(isset($_POST["signin"])){
    
        
        if(isset($_POST['email']) && !empty($_POST["email"])){
            $email = $_POST["email"];
        }else{
            $emailerror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                        Please enter email address
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
        }


        if(isset($_POST['password']) && !empty($_POST["password"])){
            $password = $_POST["password"];
        }else{
            $passworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                        Please enter password
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
        }


        if(isset($email) && isset($password)){

            $selctquery = "select * from donors where email = '$email'";

            $query = mysqli_query($connection,$selctquery);
            
            if(mysqli_num_rows($query) > 0 ){

                while($row = mysqli_fetch_assoc($query)){
                    
                    $pass = password_verify($password,$row["password"]);
            
                    if($pass){
                        $successmessage = '<div class="alert alert-success alert-dismissible fade show " role="alert">
                                            Login successful
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';

                                        $doob = $row["dob"];
                                        $dob=explode('-',$doob);

                                        $_SESSION["date"] = $dob[0];
                                        $_SESSION["month"] = ($dob[1]);
                                        $_SESSION["year"] = ($dob[2]);

                                        $_SESSION["user_id"]=$row["id"];
                                        $_SESSION["mobile"]=$row["mobile"];
                                        $_SESSION["gender"]=$row["gender"];
                                        $_SESSION["name"]=$row["name"];
                                        $_SESSION["email"]=$row["email"];
                                        $_SESSION["blood"]=$row["blood_group"];
                                        $_SESSION["state"]=$row["state"];
                                        $_SESSION["save_life_data"]=$row["save_life_data"];


                                        header('location:profile.php');
                    }else{
                        $passwordnotmatcherror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                            Password is incorrect
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                    }

                }

            }else{
                $emailnotfounderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Please enter valid email address
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
            }

        }
        
        }

        


?>

<div class="container-fluid bg-danger text-center donor-div p-2 pb-3">
    <h1 class="d-inline text-white px-4  m-3">Sign In</h1>
</div>

<div class="container p-3 m-5 mx-auto form" >
    <div class="head text-center mb-3 " >
        <h3 class="text-center text-danger px-3 d-inline">Sign In</h3>
    </div>

    <?php if(isset($emailnotfounderror)){echo $emailnotfounderror;} ?>
    <?php if(isset($passwordnotmatcherror)){echo $passwordnotmatcherror;} ?>
    <?php if(isset($successmessage)){echo $successmessage;} ?>

    <form action="" method="post" >
        <label for="email" class="form-label" >Email:</label>
        <input type="email" class="form-control mb-2" value="<?php if(isset($_SESSION["user_id"])){echo $_SESSION["email"];} ?>" required name="email">
        <?php if(isset($emailerror)){echo $emailerror;} ?>

        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control mb-2" required name="password">
        <?php if(isset($passworderror)){echo $passworderror;} ?>

        <input type="submit" class=" form-control mt-4 mb-2 btn btn-outline-danger " name="signin" value="Sign In">
    </form>
</div>

<script>
    const home = document.querySelector(".home")
    const signin = document.querySelector(".signin")

    home.classList.remove("active")
    signin.classList.add("active")

</script>
<?php

    include "includes/footer.php";

?>