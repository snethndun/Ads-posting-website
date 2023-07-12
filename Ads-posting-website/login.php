<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Needs</title>
</head>
<body>
    <?php 

        if(isset($_POST['submit'])){
            require './database.php';

            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            if(empty($user_name) || empty($password)){
                header("Location: ./login.php?error=emptyfields");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_name = ?";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ./login.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $user_name);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if($row = mysqli_fetch_assoc($result)){
                        $passCheck = password_verify($password, $row['password']);

                        if($passCheck == false) {
                            header("Location: ./login.php?error=wrongpassword");
                            exit();
                        } elseif ($passCheck == true) {
                           session_start();
                            //session should be in evey page
                            $_SESSION['sessionId'] = $row['user_id'];
                            $_SESSION['sessionUser'] = $row["user_name"];
                            header("Location: ./profile.php");
                            exit();
                        } else {
                            header("Location: ./login.php?error=wrongpassword");
                            exit();
                        }
                    } else {
                        header("Location: ./login.php?error=nouser");
                        exit();
                    }
                }
            }

        } else {
            
        }
    ?>

    <section class="login">
        <div class="login-left">
            <a href="./index.php"><img src="./images/back-btn.png" alt="back-button" class="login-back-btn"></a>
    
            <h1>LOGIN TO POST YOUR AD</h1>
    
            <img src="./images/login.png" alt="login page image">
        </div>
    
        <div class="login-right">
            <a href="./index.php"><img src="./images/back-btn.png" alt="back-button" class="login-back-btn-2"></a>

            <h2>Login</h2>
    
            <form action="login.php" name="login" method="post">
                <p>Username</p>
                <input type="text" name="user_name">
    
                <p>Password</p>
                <input type="password" name="password">

                <br>
                <button type="submit" name="submit">Login</button>
            </form>
    
            <p>If you dont have an account <a href="signup.php">Sign Up</a></p>
            
        </div>    
    </section>

    <style>
        <?php
            include './styles.css';
            include './responsive.css';
        ?>
    </style>
    
</body>
</html>