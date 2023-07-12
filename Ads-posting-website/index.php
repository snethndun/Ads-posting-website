<?php 
    require_once './database.php';
?>

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
    include './components/navbar.php';
   ?>

    <section class="home-top">
        <center>
            <h1 class="home-top-h1">Search for the product or service you need</h1>
            <div class="home-top-section">
                <a href="./search.php">Search</a>
            </div>
        </center>
    </section>

    <section class="home-categories">
        <center><h1>CATEGORIES</h1></center>

        <div class="category-items-1">
            <div class="category-item">
                <img src="./images/real-state.png" alt="real-state-icon">
                <h3>Real Estate</h3>
                <p>Ads related to buying, selling, or renting properties</p>
            </div>

            <div class="category-item">
                <img src="./images/vehicles.png" alt="vehicles-icon">
                <h3>Vehicles</h3>
                <p>AAds related to buying or selling cars, motorcycles, boats, or other vehicles</p>
            </div>

            <div class="category-item">
                <img src="./images/customer-service.png" alt="services-icon">
                <h3>Services</h3>
                <p>Ads related to services offered, such as home repair, lawn care, or tutoring</p>
            </div>

            <div class="category-item">
                <img src="./images/device.png" alt="Electronics-icon">
                <h3>Electronic</h3>
                <p>Ads related to buying or selling electronics, such as phones, computers, or TVs</p>
            </div>
        </div>

        <div class="category-items-2">
            <div class="category-item">
                <img src="./images/pets.png" alt="pet-icon">
                <h3>Pets</h3>
                <p>Ads related to buying or selling pets, pet supplies, or pet services</p>
            </div>

            <div class="category-item">
                <img src="./images/clothes-hanger.png" alt="cloths-icon">
                <h3>Cloths</h3>
                <p>Ads related to selling cloths.</p>
            </div>

            <div class="category-item">
                <img src="./images/job.png" alt="jobs-icon">
                <h3>Jobs</h3>
                <p>Ads related to job listings and job seekers</p>
            </div>
        </div>
    </section>
    <?php
        error_reporting(0);
        if(!isset($_SESSION)){
            session_Start();
            $sessionID = $_SESSION['sessionId'];
            
            if($sessionID){
                $link = "./profile.php";
            } else {
                $link = "./login.php";
            }
        } else {
            if($sessionID){
                $link = "./profile.php";
            } else {
                $link = "./login.php";
            }
        }
        
    ?>

    <section class="post-ad-section">
        <div>
            <h2>Want to sell a good or a service?</h2>
            <div class="post-ad-button">
                <a href='<?php echo $link?>'>POST YOUR AD</a>
                <img src="./images/arrow.png" alt="arrow-icon" width="40px">
            </div>
        </div>

        <div class="post-ad-about">
            <h2>ABOUT THIS WEBSITE</h2>
            <p>Introducing our new ad posting website! With our platform, you can easily create and publish ads for your products or services. Whether you're a small business owner looking to increase your online presence or an individual looking to sell something, our website provides a simple and convenient way to reach a broad audience. Plus, with our user-friendly interface and advanced search capabilities, potential customers can easily find what they're looking for. Give us a try today and start making connections!</p>
        </div>
    </section>

   <?php
    include './components/footer.php'
   ?>

   
    <style>
        <?php
            include './styles.css';
            include './nav.css';
            include './responsive.css';
        ?>
    </style>


    <script src="script.js"></script>
</body>
</html>