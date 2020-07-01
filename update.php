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
        font-size:16px;
    }
    .navbar{
        font-size:20px;
        position:fixed !important;
    }   
    body{
        background:#efefef;
    }
    .update-div,.delete-account{
        width:600px;
        background:white;
        box-shadow:0px 4px 8px rgba(0,0,0,0.3);
    }
    .change-password{
        width:600px;
        background:white;
        box-shadow:0px 4px 8px rgba(0,0,0,0.3);
    }
    footer{
        z-index:9999;
        position:relative;
        bottom:0;
    }

    @media screen and (max-width:480px){
        *{
            font-size:14px;
        }
        .update-div,.delete-account,.change-password{
            width:90%;
        }
        .update-div{
            padding:1em !important;
            margin:1em !important;
        }
    }
    
</style>




<div class="container-fluid  text-center donate-div p-5 pb-4">
    
</div>

<?php

$selectquery = "select email from donors";
$check = mysqli_query($connection,$selectquery);


    $name = $_SESSION["name"];
    $blood = strtoupper($_SESSION["blood"]);
    $gender = $_SESSION["gender"];
    $date = $_SESSION["date"];
    $year =  $_SESSION["year"];
    $month = $_SESSION["month"];
    $email = $_SESSION["email"];
    $mobile = $_SESSION["mobile"];
    $state = $_SESSION["state"];





    if(isset($_POST["update"])){

        
            //name

            if(isset($_POST["fullname"]) && !empty($_POST["fullname"])){
                if(preg_match('/^[A-Za-z\s]+/',$_POST["fullname"]))
                {
                    $name = $_POST["fullname"];
                    
                }else{
                    $namemessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                            Please enter valid name
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }

            }else{
                $nammessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                            Please enter name
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }

            //gender

            if(isset($_POST["gender"]) && !empty($_POST["gender"])){

                $gender = $_POST["gender"];
                

            }else{
                $gendermessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                            Please select gender
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }

            //date month year
            
           if(isset($_POST["date"]) && !empty($_POST["date"])){
                $date = $_POST["date"];
                
           }else{
                $dobmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                Please select dob
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
           }
           
           if(isset($_POST["month"]) && !empty($_POST["month"])){
                $month = $_POST["month"];
                
           }else{
                $dobmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                Please select dob
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
           }
           
           if(isset($_POST["year"]) && !empty($_POST["year"])){
                $year = $_POST["year"];
                
           }else{
                $dobmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                Please select dob
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
           }

           //contact number

           if(isset($_POST["mobile"]) && !empty($_POST["mobile"])){
                if(preg_match("/[0-9]{10,11}/",$_POST["mobile"])){
                    $mobile = $_POST["mobile"];
                }else{
                    $mobilemessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                Please enter correct mobile number 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                }
           }else{
                $mobilemessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                Please enter mobile number 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
           }

           //email


           
           if(isset($_POST["email"])  && !empty($_POST["email"])){

            $email = $_POST["email"];
            
            if(mysqli_num_rows($check)>0){
                while($row = mysqli_fetch_assoc($check)){
                    if($email==$row["email"]){
                        $emailmatch =true;
                        

                                
                    }else{
                        
                }
            }

            }else{
                    $emailmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Please enter email id
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
            }

            //blood group

            if(isset($_POST["blood"])  && !empty($_POST["blood"])){

                $blood = $_POST["blood"];
                
    
                }else{
                        $bloodmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                        Please select a blood group
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                }

           //state


           if(isset($_POST["state"])  && !empty($_POST["state"])){

                $state = $_POST["state"];
                

           }else{
                $statemessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                Please select a state
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
           }






        


        if(isset($name) && isset($email) && isset($blood) && isset($date) && isset($month) && isset($year) && isset($mobile) && isset($state)  ) {
            $dob = $date."-".$month."-".$year;
           
           

            
               
                $id=$_SESSION["user_id"];
               
                $insertquery = "update  donors set name='$name',blood_group='$blood',gender='$gender',email='$email',dob='$dob',mobile='$mobile',state='$state' where id='$id'";
                $check = mysqli_query($connection,$insertquery);

                if($check){
                    $successmessage = '<div class="alert alert-success alert-dismissible fade show " role="alert">
                                        Data updated successfully
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                }else{
                    $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                        Data not updated
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                }

           

            

        
            
        }else{
            $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Data not saved in db
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
        }
    }

    }

    //update password

    if(isset($_POST['changepassword'])){

        $currentpass = $_POST["currentpassword"];
        $newpass = $_POST["newpassword"];
        $newconfirmpass = $_POST["newconfirmpassword"];

        $id= $_SESSION["user_id"];
        $selectquery = "select * from donors where id='$id'";
        $query = mysqli_query($connection,$selectquery);

        if(mysqli_num_rows($query) > 0 ){

            while($row = mysqli_fetch_assoc($query)){

                $passworddb = $row["password"];
                $checkpass = password_verify($currentpass,$passworddb);

                if($checkpass){

                    if(isset($_POST["newpassword"])  && !empty($_POST["newpassword"]) && isset($_POST['newconfirmpassword'])){
            
                        if($newpass == $newconfirmpass){
                    
                    
                            $encryptednewpass = password_hash($newpass,PASSWORD_BCRYPT);
                    
                            $id = $_SESSION["user_id"];
                            $updatequery = "update donors set password='$encryptednewpass' where id='$id'" ;
                            $cquery = mysqli_query($connection,$updatequery);
                            if($updatequery){
                                $successpassmessage = '<div class="alert alert-success alert-dismissible fade show " role="alert">
                                                        Password changed successfully
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>';
                            }else{
                                $errorpassmessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                                        Password was not changed
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>';
                            }
                    
                        }else{
                            $confirmpasserror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                                        Password does\'t match
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>';
                        }
                    
                    }else{
                        $nullerror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                                        Please enter new password
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>';
                    }
                    

                }else{
                    $passworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Please insert correct password
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                }

            }
        }else{
            $passworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Incorrect password
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
        }
    

        
    }



    if(isset($_POST["dltsubmit"])){

        if(isset($_POST["dltpass"])  &&  !empty($_POST["dltpass"])){
            $dltpass = $_POST["dltpass"];
            $id = $_SESSION["user_id"];
            $slt = "select password from donors where id = '$id'";
            $q = mysqli_query($connection,$slt);
            
            if(mysqli_num_rows($q)>0){

                while($row = mysqli_fetch_assoc($q)){
                    $pmatch =password_verify($dltpass,$row["password"]) ;

                    if($pmatch){
                        $dltquery = "delete from donors where id ='$id'";
                        $query = mysqli_query($connection,$dltquery);

                        if($query){
                            header("location:logout.php");
                        }else{
                            $lastpassworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Could not delete account at this moment
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                        }
                    }else{
                        $lastpassworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Invalid password
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                    }
                }

            }else{
                $lastpassworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Enter correct password
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
            }

                


        }else{
            $dltpassworderror = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Please enter password
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
        }
        

    }
?>

<div class="conatiner update-div m-auto my-5 px-5 py-2 text-center">
<div class="title text-center my-3"><h3 style="" class="display-6 text-danger px-3 d-inline">Personal Details</h3></div>
<div class="form-group text-left mt-4">
<?php if(isset($successmessage)){echo $successmessage;}
      if(isset($errormessage)){echo $errormessage;}
?>
        <form action="" method="post">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control mb-2" name="fullname" placeholder="Full Name" value="<?php if(isset($name)){echo $name;}?>" required title="give a correct name" pattern="[A-Za-z\s]+">
            
            <?php if(isset($namemessage)){echo $namemessage;}?>

            <label class="form-label">Blood Group</label>
            <select class="form-select mb-2" name="blood" required>
                <option value="">--Blood Group--</option>
                <?php if(isset($blood)){echo '<option  selected>'.$blood.'</option>';}?>
                <option value="a+">A+</option>
                <option value="a-">A-</option>
                <option value="b+">B+</option>
                <option value="b-">B-</option>
                <option value="o-">O-</option>
                <option value="o+">O+</option>
                <option value="ab+">AB+</option>
                <option value="ab-">AB-</option>
            </select>
            <?php if(isset($bloodmessage)){echo $bloodmessage;}?>

            <label class="form-label">Gender</label><br>
                <input class="form-group" type="radio" id="inlineRadio1" value="male" name="gender" required  <?php if(isset($gender) == "male"){echo "checked";}?>>
                <label class="form-label" for="inlineRadio1">Male</label>
                <input class="form-group" type="radio" id="inlineRadio2" value="female" name="gender" <?php if(isset($gender) == "female"){echo "checked";}?>>
                <label class="form-label" for="inlineRadio2">Female</label>
                <br>
                <?php if(isset($gendermessage)){echo $gendermessage;}?>

            <div class="container-fluid p-0 m-0 mb-2">

            <label class="form-label">Date Of Birth:</label><br>
            <select class="form-select-inline date mb-2" name="date" required>
                <option value="">--Date--</option>
                <?php if(isset($date)){echo '<option  selected>'.$date.'</option>';}?>
                
            </select>

            <select class="form-select-inline mb-2 month" required name="month">
                <option value="">--Month--</option>
                <?php if(isset($month)){echo '<option  selected>'.$month.'</option>';}?>
                <option value="jan">Jan</option>
                <option value="feb">Feb</option>
                <option value="march">March</option>
                <option value="apr">Apr</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="aug">Aug</option>
                <option value="sep">Sep</option>
                <option value="oct">Oct</option>
                <option value="nov">Nov</option>
                <option value="dec">Dec</option>
            </select>
            <select class="form-select-inline mb-2 year" name="year" required>
                <option value="">--Year--</option>
                <?php if(isset($year)){echo '<option  selected>'.$year.'</option>';}?>
            </select>

            <?php if(isset($dobmessage)){echo $dobmessage;}?>
            </div>
            

            <label class="form-label">Email:</label>
            <input type="email" class="form-control mb-2" placeholder="Email" name="email" value = "<?php if(isset($email)){echo $email;}?>" required >
            <?php if(isset($emailmessage)){echo $emailmessage;}?>

            <label class="form-label">Contact No:</label>
            <input type="mobile" class="form-control mb-2" placeholder="Contact no..." name="mobile" value="<?php if(isset($mobile)){echo $mobile;}?>" pattern="[0-9]{10,11}" title="number shoulb be 10 characters long" required>
            <?php if(isset($mobilemessage)){echo $mobilemessage;}?>

            <label class="form-label">State:</label>
            <select class="form-select mb-2 state" required name="state">
                <option value="">--State--</option>
                <?php if(isset($state)){echo '<option  selected>'.strtoupper($state).'</option>';}?>
            </select>
            <?php if(isset($statemessage)){echo $statemessage;}?>

           
            <div class="button text-center m-4">
                <input type="submit" class="btn  btn-outline-danger" name="update" value="Update">
            </div>
            
        </form>
    </div>
</div>

<div class="change-password m-auto my-5 p-3 px-5">
    <div class="title text-center my-2"><h3 style="" class="display-6 text-danger px-3 d-inline">Change Password</h3></div>
    <div class="form-group">
    
    <?php if(isset($successpassmessage)){echo $successpassmessage;} 
          if(isset($errorpassmessage)){echo $errorpassmessage;}          
          ?>

        <form action="" method="post">
            <label class="form-label">Current Password:</label>
            <input type="password" class="form-control mb-2" name="currentpassword">
            <?php if(isset($passworderror)){echo $passworderror;}?> 
            <?php if(isset($errorpassmessage)){echo $errorpassmessage;}?>

            <label class="form-label">New Password:</label>
            <input type="password" class="form-control mb-2" pattern=".{6,}" name="newpassword" title="please fill greater than 6 characters">
            <?php if(isset($nullerror)){echo $nullerror;}?>
            
            <label class="form-label">Confirm Password:</label>
            <input type="password" class="form-control mb-2" name="newconfirmpassword">
            <?php  if(isset($confirmpasserror)){echo $confirmpasserror;}?>

            <div class="button text-center">
                <button type="submit" class="btn btn-danger my-2" name="changepassword">Change Password</button>
            </div>
            
        </form>
    </div>
</div>

<div class="delete-account m-auto my-5 p-3 px-5">
    <div class="title text-center my-2"><h3 style="" class="display-6 text-danger px-3 d-inline">Delete Account</h3></div>
    <div class="form-group">
        <form action="" method="post">
            <label class="form-label">Password:</label>
            <input type="password" class="form-control mb-2" name="dltpass">
            <?php if(isset($dltpassworderror)){echo $dltpassworderror;}?>
            <?php if(isset($lastpassworderror)){echo $lastpassworderror;}?>

            <div class="button text-center">
                <button type="submit" class="btn btn-danger my-2" name="dltsubmit">Delete</button>
            </div>
        </form>
    </div>
</div>


<script>
    const dropdown = document.querySelector(".da")
    const home = document.querySelector(".home")
    const date = document.querySelector(".date")
    const year = document.querySelector(".year")
    const states = document.querySelector(".state")

    home.classList.remove('active')
    dropdown.classList.add("active")

    for(let i=1;i<32;i++){
        const option = document.createElement("option")
        option.setAttribute("value",i)
        option.textContent=i
        date.append(option)
    }

    for(let i=80;i<100;i++){
        const option = document.createElement("option")
        option.setAttribute("value","19"+i)
        option.textContent="19"+i
        year.append(option)
    }

    for(let i=00;i<21;i++){
        const option = document.createElement("option")
        if(i<10){
            option.setAttribute("value","200"+i)
            option.textContent="200"+i
            year.append(option)
        }
        else{
            option.setAttribute("value","20"+i)
            option.textContent="20"+i
            year.append(option)
        }
        
    }

    
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

</script>


<?php
    include "includes/footer.php";
?>