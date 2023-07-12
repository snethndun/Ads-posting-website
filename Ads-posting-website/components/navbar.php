<nav class="navbar">
        <div class="nav-with-burger">
            <div  class="nav-logo">
                <img src="./images/1234.png" alt="logo" height="30px">
            </div>
    
            <button class="nav-open" id="nav-open">
                <img src="./images/burger.png" alt="burger-icon">
            </button>
        </div>
       
        <div class="nav-details" id="nav-details">
            <button class="nav-close" id="nav-close">
                <img src="./images/close.png" alt="close-icon">
            </button>

            <div class="nav-links">
                <div><a href="index.php">Home</a></div>
                <div><a href="search.php">Browse ad</a></div>
                <div><a href="contact.php">Contact us</a></div>
                <div><a href="about.php">About</a></div>
            </div>
    
            <?php 
            include './database.php';
                if(!isset($_SESSION)){
                    session_start();
                }
                
                if(isset($_SESSION['sessionId'])){
                    $sessionId = $_SESSION['sessionId'];
                    $sql = "SELECT user_name FROM users WHERE user_id = $sessionId";
                    $result = mysqli_query($conn, $sql);
                    $item = mysqli_fetch_assoc($result);
                    echo "<div class='nav-user'>";
                    echo $item['user_name'];
                    echo '
                        <a href="profile.php"><img src="./images/profile.jpg" alt="user avatar" height="40px" width "40px"></a>
                     </div>';
                } else {
                    echo "<div class='nav-button'>";
                    echo "<button><a href='login.php'>Post an ad</a></button>";
                    echo "</div>";
                };
            ?>
            
        </div>
        
    </nav>