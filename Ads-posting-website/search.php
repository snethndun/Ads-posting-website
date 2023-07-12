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

    <form action="search.php" method="get">
    <section class="search-section">
        <div class="search-searchbar">
            <input type="text" placeholder="Search Ads" name="search">
            <button type="submit" name="submit" style="height: 30px; width: 30px;">
                <img src="./images/search.png" alt="search-icon" height="20px" width="20px">
            <button>
        </div>

        <div class="search-filters">
            <select name="category" id="">
                <option value="">Select category</option>
                <option value="real-estate">Real Estate</option>
                <option value="vehicles">Vehicles</option>
                <option value="services">Services</option>
                <option value="electronics">Electronics</option>
                <option value="pets">Pets</option>
                <option value="cloths">Cloths</option>
                <option value="jobs">Jobs</option>
            </select>
        </div>
        
    </section>
    </form>

    <section class="searchItems-section">
        <?php 
            include './database.php';
        
            if(isset($_GET['submit'])){
        
                $category = $_GET['category'];
                $searchText = $_GET['search'];
        
                $sql = "SELECT * FROM ads WHERE ad_title LIKE '".$searchText."' OR  ad_category = '".$category."' LIMIT 8";
        
                $result = mysqli_query($conn, $sql);
        
                if(mysqli_num_rows($result) > 0) {
                    $count = 0; 
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['ad_title'];
                        $description = $row['ad_description'];
                        $category = $row['ad_category'];
                        $adIndex = $row["ad_id"];
                        $location = $row["ad_location"];
                        $image = $row["ad_cover_img"];
                        $count++;
            
                        $finalDesc = substr($description, 0 , 15);
                        
                        echo "
                        <div class='searchItems-card'>
                            <img src='./ad-images/$image'>
                        
                            <h3>$title</h3>
                            <p>$finalDesc...</p>
                            <p class='searchItems-category'>$category</p>
                        
                            <div class='searchItems-location'>
                                <div>
                                    <img src='./images/location.png' alt='location icon'>
                                    <p> $location</p>
                                </div>
                        
                                <p>16/12/2022</p>
                            </div>
                            <form class='search-card-form' method='post' action='ad-details.php'>
                                <button class='search-card-more' name='more-details' value=$adIndex>
                                    More Details
                                </button>
                            </form>
                        </div>                
                        ";
                    }
                }
        
            } else {
                $sql = "SELECT * FROM ads LIMIT 8";
                $result = mysqli_query($conn, $sql);
                
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['ad_title'];
                        $description = $row['ad_description'];
                        $category = $row['ad_category'];
                        $adIndex = $row["ad_id"];
                        $location = $row["ad_location"];
                        $image = $row["ad_cover_img"];
            
                        $finalDesc = substr($description, 0 , 15);
                        
                        echo "
                        <div class='searchItems-card'>
                            <img src='./ad-images/$image'>
                        
                            <h3>$title</h3>
                            <p>$finalDesc...</p>
                            <p class='searchItems-category'>$category</p>
                        
                            <div class='searchItems-location'>
                                <div>
                                    <img src='./images/location.png' alt='location icon'>
                                    <p> $location</p>
                                </div>
                        
                                <p>16/12/2022</p>
                            </div>
                            <form method='post' action='ad-details.php'>
                                <button class='search-card-more' name='more-details' value=$adIndex>
                                    More Details
                                </button>
                            </form>
                        </div>                
                        ";
                    }
                }
            }
        ?>

    </section>

    <div class="search-page-number">
        <span class="sp-selected sp-number">1</span>
        <span class="sp-number">2</span>
        <span class="sp-number">3</span>
        <span class="sp-number">4</span>

        <img src="./images/next-arrow.png" alt="next-arrow" width="20px">
    </div>

    <?php
        include './components/footer.php'
    ?>

    <style>
        <?php 
            include './nav.css';
            include './styles.css';
            include './responsive.css';
        ?>
    </style>
    
    <script src="script.js"></script>
</body>
</html>