<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
            include './styles.css';
            include './responsive.css';
        ?>
    </style>
    <title>Needs</title>
</head>
<body>
    <section class="login">
        <div class="login-left">
            <a href="index.php"><img src="./images/back-btn.png" alt="back-button" class="login-back-btn"></a>
    
            <h1>CREATE AN ACCOUNT TO POST YOUR AD</h1>
    
            <img src="./images/signup.png" alt="signup page image">
        </div>

        <?php 

            if(isset($_POST['submit'])){

                require './database.php';

                $user_name = $_POST['username'];
                $user_email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPass = $_POST['confirmPassword'];

                if (empty($user_name) || empty($password) || empty($confirmPass)){
                    header("Location: ./signup.php?error=emptyfields");
                    exit();
                } else if($password !== $confirmPass){
                    header("Location: ./signup.php?error=passwordsdoesnotmatch");
                    exit();
                } else {
                    $sql = "SELECT user_name FROM users WHERE user_name = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ./signup.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $user_name);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $rowCount = mysqli_stmt_num_rows($stmt);

                        if($rowCount > 0) {
                            header("Location: ./signup.php?error=usernametaken");
                            exit();
                        } else {
                            $sql = "INSERT INTO users (user_name, user_email, password) VALUES (? , ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                session_start();
                                //session should be in evey page
                                $_SESSION['sessionId'] = $row['user_id'];
                                $_SESSION['sessionUser'] = $row["user_name"];
                                header("Location: ./signup.php?error=sqlerro");
                                exit();
                            } else {
                                header("Location: ./profile.php?success=registered");
                                $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                                mysqli_stmt_bind_param($stmt, "sss", $user_name, $user_email, $hashedPass);
                                mysqli_stmt_execute($stmt);
                                
                                exit();
                            }
                        }
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);

            }

        ?>
    
        <div class="login-right">
            <a href="./index.php"><img src="./images/back-btn.png" alt="back-button" class="login-back-btn-2"></a>

            <h2>Sign Up</h2>
    
            <form action="signup.php" name="signup" method="post">
                <p>Name</p>
                <input type="text" name="username">

                <p>Email</p>
                <input type="email" name="email">
    
                <p>Password</p>
                <input type="password" name="password">

                <p>Re-enter Password</p>
                <input type="password" name="confirmPassword">

                <br>
                <button type="submit" name=submit>Sign Up</button>
            </form>
    
            <p>If you already have an account <a href="login.php">Login</a></p>
            
        </div>    
    </section>
    
</body>
</html>