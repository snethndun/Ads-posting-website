<?php 
    include './database.php';
    if(!isset($_SESSION)){
        session_start();
    }
    
    if(isset($_SESSION['sessionId'])){
        $sessionId = $_SESSION['sessionId'];
        $sql = "SELECT * FROM ads WHERE user_id = $sessionId";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['ad_title'];
                $description = $row['ad_description'];
                $category = $row['ad_category'];
                $adIndex = $row["ad_id"];
                $location = $row["ad_location"];
                $image = $row["ad_cover_img"];
                $finalDesc = substr($description, 0 , 25);

                echo "
                    <div class='card'>
                    <div class='card-left'><img src='./ad-images/$image' width='175px' height='150px'></div>
                        <div class='card-mid'>
                            <h3 class='h3-type1'>$title</h3>
                            <p class='p-type1'>$finalDesc</p>
                            <div class='card-mid-bottom'>
                            <a href='' class='a-type1'><i class='fa-solid fa-location-dot'></i> $location</a>
                            <a href='' class='a-type1'>$category</a>
                        </div>
                        
                        </div>
                            <div class='card-right'>
                            <form method='post'>
                            <div class='card-right-top'>
                                <button class='btn-type2' name='selected-item' value='$adIndex'>Delete</button>
                                </form>
                        </div>

                    </div>
                    </div>
                ";
            }
        } else {
            echo "<h1>No ads to display</h1>";
        }
    }
?>

<?php
    if(isset($_POST["selected-item"])){
        $selectedId = $_POST["selected-item"];
        $sql = "DELETE FROM ads WHERE ad_id = $selectedId";
        $result = mysqli_query($conn, $sql);
    };
?>
