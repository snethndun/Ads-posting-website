<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/044a9fd88a.js" crossorigin="anonymous"></script>
    <title>Needs</title>
</head>
<body>
    
    <?php
        include './components/navbar.php';
    ?>

    <section>
        <?php 
            include './database.php';
            if(!isset($_SESSION)){
                session_start();
            }
            $sessionID = $_SESSION['sessionId'];

            $sql = "SELECT * FROM users WHERE user_id = $sessionID";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $email = $row['user_email'];
            $name = $row['user_name'];

             echo   "<div class='left' id='left'>
                    <button class='user-close' id='user-close'>
                        <img src='./images/close.png' alt='close-icon'>
                    </button>
                    <div class='left-top'>
                        <img src='https://media.istockphoto.com/id/1316420668/vector/user-icon-human-person-symbol-social-profile-icon-avatar-login-sign-web-user-symbol.jpg?s=612x612&w=0&k=20&c=AhqW2ssX8EeI2IYFm6-ASQ7rfeBWfrFFV4E87SaFhJE=' alt='profile-image' class='image'>
                        <h2 class='h2-type1'>$name</h2>
                        <p class='p-type2'>$email</p>
                    </div>
                    <div class='left-mid'>
                        <h3 class='h3-type2'>Your ads</h3>
                    </div>
                    <div class='left-bottom'>
                        <h3><span><a href='./Functions/logout.php'>Log out</a></span></h3>
                    </div>
                </div>";
        ?>
        <div class="right">
            <button class="user-toggle" id="user-toggle">
                <img src="./images/burger.png" alt="">
            </button>

            <div class="right-top">
                <h1 class="h1-type2">Your ads</h1>
                <button class="btn-type1"><a href="create-ad.php">Create an ad</a></button>
            </div>
            <div class="right-bottom">
                <?php
                    include './components/adCard.php';
                ?>

                <!-- <div class="card">
                    <div class="card-left"></div>
                    <div class="card-mid">
                        <h3 class="h3-type1">AD TITLE</h3>
                        <p class="p-type1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate aliquam blanditiis, deleniti quisquam dignissimos maiores corrupti. Rerum iure obcaecati, nihil expedita perspiciatis ex optio tempora esse placeat repudiandae corrupti earum rem velit! Autem, nemo deserunt.</p>
                        <div class="card-mid-bottom">
                            <a href="" class="a-type1"><i class="fa-solid fa-location-dot"></i> Location</a>
                            <a href="" class="a-type1">Category</a>
                        </div>
                    </div>
                    <div class="card-right">
                        <div class="card-right-top">
                            <button class="btn-type1">Edit</button>
                            <button class="btn-type2">Delete</button>
                        </div>
                        <p class="p-type2">16/12/2022</p>
                    </div>
                </div> -->
                
            </div>
        </div>
    </section>

    <script src="script.js"></script>

    <style>
        <?php
            include './stylesp.css';
            include './nav.css';
        ?>
    </style>

    <script>
        var togglebtn = document.getElementById('user-toggle');
        var left = document.getElementById('left');
        var closebtn = document.getElementById('user-close');

        togglebtn.addEventListener('click', () => {
            left.style.transform = 'translateX(0%)';
        })

        closebtn.addEventListener('click', () => {
            left.style.transform = 'translateX(-100%)';
        })
    </script>
</body>
</html>