<?php

    include "includes/header.php";
    include "includes/navigation.php";
    include "includes/db.php";
?>

<?php


//select email
  
$selectquery = "select email from donors";
$check = mysqli_query($connection,$selectquery);

//validation

    
    if(isset($_POST["signup"])){

        if(isset($_POST["term"])){
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
                        $emailmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Email already exists
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';

                                
                    }
                }

            }else{
                $email = $_POST["email"];
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


            //password

            if(isset($_POST["password"]) ){

                if(strlen($_POST["password"]) >=6)
                {
                    $password = password_hash($_POST["password"],PASSWORD_BCRYPT);

                    if(isset($_POST["cpassword"])){

                        $cpassword = $_POST["cpassword"];

                        if($_POST['password'] === $_POST["cpassword"]){
                            
                            $password_match = true;

                        }else{
                            
                            $cpasswordmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                                Password doesn\'t match
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>';
                        }

                    }else{
                        $cpasswordmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                            Please enter confirm password field
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                    }
                    
                    
                }else{
                    $passwordmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                            Please enter valid password
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }

            }else{
                $passwordmessage='<div class="alert alert-danger alert-dismissible fade show " role="alert">
                            Please enter password
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }




        }else{
            $termmessage='<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                        Please agree with terms and conditions
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }


        if(isset($name) && isset($email) && isset($blood) && isset($date) && isset($month) && isset($year) && isset($mobile) && isset($state) && isset($password) ) {
            $dob = $date."-".$month."-".$year;
           
           if(isset($emailmatch) == true){
                $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Data not saved in database
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
           }else{

            if(isset($password_match)){
               
                
                $insertquery = "insert into donors(name,blood_group,gender,email,dob,mobile,state,password) values('$name','$blood','$gender','$email','$dob','$mobile','$state','$password')";
                $check = mysqli_query($connection,$insertquery);

                if($check){
                    $successmessage = '<div class="alert alert-success alert-dismissible fade show " role="alert">
                                        Data inserted in database successfully
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                    header('location:signin.php');
                }else{
                    $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                        Data not saved in database
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
            
        }else{
            $errormessage = '<div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    Data not saved in db
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
        }
    }

    

?>

<style>
    *{
        font-size:16px;
    }
    .navbar{
        position:relative !important;
        font-size:20px !important; 
    }
    .nav-link,.navbar-brand{
        font-size:20px;
    }
    body{
        background:#efefef; 
    }
    .donate-div{
        height:15vh;
    }
    .donate-div h1{
        border-bottom:3px solid white;
    }

    .signup-div{
        margin:0 auto;
        width:550px;
        background:white;
        box-shadow:0px 4px 8px rgba(0,0,0,0.4); 
    }

    .signup-div h3{
        border-bottom:3px solid rgba(255,0,0,0.7);
    }

    @media screen and (max-width:550px){
        *{
            font-size:14px !important;
        }
        .donate-div h1{
            font-size:2.5em !important;
        }
        .signup-div{
            width:90%;
            margin:1em !important;
        }
    }

</style>

<div class="container-fluid bg-danger text-center donate-div pt-3">
    <h1 class="d-inline text-white px-4  m-5">Donate</h1>
</div>
<?php if(isset($errormessage)){echo $errormessage;}
      if(isset($successmessage)){echo $successmessage;}?>

<div class="conatiner signup-div my-4 p-3 text-center">
    <h3 class="text-danger px-3 d-inline pb-1 ">Sign Up</h3>

    <?php if(isset($termmessage)){echo $termmessage;}?>
    <div class="form-group text-left mt-4">
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
                <input class="form-group" type="radio" id="inlineRadio1" value="male" name="gender"  <?php if(isset($gender) && $gender == "male"){echo "checked";}?>>
                <label class="form-label" for="inlineRadio1">Male</label>
                <input class="form-group" type="radio" id="inlineRadio2" value="female" name="gender" <?php if(isset($gender) && $gender == "female"){echo "checked";}?>>
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
            <input type="email" class="form-control mb-2" placeholder="Email" name="email" required  value = "<?php if(isset($email)){echo $email;}?>">
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

            <label class="form-label">Password:</label>
            <input type="password" class="form-control mb-2" placeholder="Password" name="password" required pattern=".{6,}" title="please fill greater than 6 characters">
            <?php if(isset($passwordmessage)){echo $passwordmessage;}?>

            <label class="form-label">Confirm Password:</label>
            <input type="password" class="form-control mb-2" placeholder="Confirm Password" name="cpassword" required>
            <?php if(isset($cpasswordmessage)){echo $cpasswordmessage;}?>

            <input type="checkbox" <?php if(isset($_POST['term'])){echo 'checked';}?> required name="term" title="please accept this before going further">
            <label><b>I agree to donate my blood and show my name, email, contact no in donor's list</b></label>

            <div class="button text-center m-2">
                <input type="submit" class="btn  btn-outline-danger" name="signup" value="Signup">
            </div>
            
        </form>
    </div>
    
</div>

<script>
    const home = document.querySelector(".home")
    const donor = document.querySelector(".donate")
    const date = document.querySelector(".date")
    const year = document.querySelector(".year")
    const states = document.querySelector(".state")


    home.classList.remove("active")
    donor.classList.add("active")

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