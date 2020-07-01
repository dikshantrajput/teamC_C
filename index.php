<?php
    include "includes/header.php";
    include "includes/navigation.php"
?>    

<style>
.sec-1{
    background-color: red;
    height:100vh;
    width:100%;
    background: url("images/bg.jpg") no-repeat center center/cover ;
    background-position: 0 20%;
    position: relative;
}

.sec-1::before{
    content:"";
    height:100%;
    width:100%;
    position:absolute;
    top:0;
    left:0;
    background-color: rgba(0,0,0,0.6);
    z-index:0;
}


.sec-1 > *{
    z-index:9;
}
.sec-1 .title{
    position:absolute;
    color:white;
    top:50%;
    left:50%;
    width:100%;
    transform:translate(-50%,-50%);
}

.search-heading h2{
    display: inline;
    border-bottom:4px solid white;
}

.form{
    font-size:16px;
}

.form .option{
    
    height:200px;
}
.form select{
    width:200px;
    font-size:16px;
}

.form option{
    font-size:16px;
}

.sec-2 .heading h1{
    display:inline;
    border-bottom:3px solid white;
}
.sec-2 .life-saver a{
    text-decoration: none;
    border-radius:50px;
    padding:0.8em 2em;
    color:red;
    background-color: white;
    border:1px solid red;
    transition: 0.2s ;
}
.sec-2 .life-saver a:hover{
    box-shadow:0px 4px 8px rgba(0,0,0,0.8);
}

@media screen and (max-width:480px){
    .sec-1{
        background-color: red;
        height:100vh;
        width:100%;
        background: url("images/bg.jpg") no-repeat center center/cover ;
        background-position: 7% 20%;
        position: relative;
    }

    .heading h1{
        font-size:1.2em;
    }
    .heading p{
        font-size:0.8em;
    }
    .search-heading{
        margin:2em !important;
    }
    .search-heading h2{
        font-size:1em;
        border-bottom:2px solid white;
    }
    .form select{
        width:150px !important;
        font-size:12px;
        margin:0 !important;
    }
    .search-btn{
        font-size:0.8em;
    }
    .sec-2{
        padding:1em !important;
    }
    .sec-2 .heading{
        margin-bottom:1em !important;
    }
    .sec-2 .heading h1{
        font-size:1.2em;
        padding:0 !important;
    }
    .content{
        text-align:justify !important;
        padding:0 !important;
    }
    .sec-3{
        padding:2em 0 !important;
    }
    .cardd{
        padding:0 0.5em !important;
        margin:0 !important;
    }
    .cardd .card-text p{
        font-size:16px !important;
    }
}
</style>

    <section class="sec-1 container-fluid">
        <div class="title text-center">
            <div class="heading mb-4">
                <h1>Donate Blood, Save Life...</h1>
                <p class="text-secondary">Donate Blood and help others</p>
            </div>

            <div class="search-heading my-5">
                <h2>Search The Donors</h2>
            </div>

            <div class="form ">
                <form action="search.php" method="get" class="form-group">
                    <select class="form-select d-inline mx-4 states " name="state" style="width:200px;">
                        <option value="">--select--</option>
                    </select>
                    <select class="form-select d-inline mx-4" name="blood">
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
                    <input type="submit" class="btn btn-danger mt-4 search-btn" name="search" value="Search">
                </form>
            </div>
        </div>
    </section>

    <section class="sec-2 p-4 bg-danger text-white">
        <div class="heading mb-5 text-center ">
            <h1 class=" pb-1 px-5">Donate The Blood</h1>
        </div>
        <div class="container content text-center mb-5">
            <p style="font-size:16px" >Lorem ipsum dolor, ibus a consequuntur sed, perferendis laboriosam quod soluta consequatur corrupti pariatur maxime, numquam tenetur ullam, officiis impedit aspernatur. Fuga natus dolores sunt illum eveniet in est atque quae optio? Est alias iste repellendus sunt voluptas quibusdam neque, esse, veritatis officia laborum omnis minus, numquam placeat deleniti! Ex saepe, velit odio, eaque placeat fugiat enim perferendis in deleniti sapiente soluta reprehenderit dolore, dolores nulla vero numquam. Accusamus magnam placeat totam minus quos vel, vitae impedit, quasi est similique, voluptatem ipsa earum aliquam? Ad doloremque neque rerum officiis facere tenetur, obcaecati in explicabo dignissimos! Atque.</p>
        </div>
        <div class="life-saver text-center mb-4">
            <a href="donate.php" style="text-danger my-5">Become a life saver!</a>
        </div>
    </section>


    <section class="sec-3 text-center p-5">
        <div class="row container-fluid text-center g-3 pl-5 cardd">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title py-3">
                        <h3>Our Vision</h3>
                    </div>
                    <div class="card-img">
                        <img src="images/1.jpg" alt="vision" class="img-fluid" style="height:200px;width:250px">
                    </div>
                    <div class="card-text text-left p-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit expedita eos error repudiandae quasi alias qui distinctio, quidem quo quam ipsum repellat culpa atque nihil vel, minima eaque ad deleniti.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title py-3">
                        <h3>Our Goal</h3>
                    </div>
                    <div class="card-img">
                        <img src="images/3.jpg" alt="vision" class="img-fluid" style="height:200px;">
                    </div>
                    <div class="card-text text-left p-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae magnam necessitatibus et ipsam maxime nulla, modi aut quibusdam, est nisi nam exercitationem optio error porro sapiente officia qui illo eos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title py-3">
                        <h3>Our Mission</h3>
                    </div>
                    <div class="card-img">
                        <img src="images/2.jpg" alt="vision" class="img-fluid" style="height:200px;">
                    </div>
                    <div class="card-text text-left p-3">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga est molestias quo magnam deserunt error tempora provident illum similique corporis atque harum non magni nesciunt placeat ullam iure, praesentium rem?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    </script>
<?php
    include "includes/footer.php";
?>