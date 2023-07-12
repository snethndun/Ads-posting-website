<footer class="footer">
        <div class="footer-details">
            <div class="footer-left">
                <img src="./images/1234.png" alt="logo" height="40px">
                <div class="footer-buttons">
                    <?php 
                        if(!isset($_SESSION)){
                            session_start();
                        }
                        
                        $sessionID = $_SESSION['sessionId'];

                        if(!$sessionID){
                            echo "
                                <button class='footer-login-btn'><a href='login.php'>Login</a></button>
                                <button class='footer-signup-btn'><a href='signup.php'>Sign Up</a></button>
                            ";
                        }
                    ?>
                </div>
            </div>

            <div class="footer-links">
                <a href="index.php">Home</a>
                <a href="contact.php">Contact</a>
                <a href="blog.php">How to write an ad</a>
                <a href="about.php">About</a>
                <a href="search.php">Browse Ads</a>
            </div>
        </div>

        <p>Copyright © 2022</p>
    </footer>