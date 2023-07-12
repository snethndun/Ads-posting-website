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


    <div class="ad-details-backbtn">
        <a href="search.php">
            <img src="./images/back-btn.png" alt="">
        </a>
    </div>

    <?php
    include './database.php';

    if(isset($_POST['more-details'])){
        $selectedAdId = $_POST['more-details'];

        $sql = "SELECT * FROM ads WHERE ad_id = $selectedAdId";
        $results = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($results);

        $title = $row['ad_title'];
        $description = $row['ad_description'];
        $price = $row['ad_price'];
        $category = $row['ad_category'];
        $contact = $row['ad_phone1'];
        $contact2 = $row['ad_phone2'];
        $image = $row['ad_cover_img'];
        $location = $row['ad_location'];

        if($contact2 !== 0){
            $secondNumber = ",". $contact2;
        } else {
            $secondNumber == "";
        }


        echo "
        <section class='ad-details-section'>
            <div class='ad-details-images'>
                <img src='./ad-images/$image' alt='main-image'>
            </div>

            <div class='ad-details-details'>
                <h1>$title</h1>

                <p>$description</p>

                <h3>RS. $price</h3>
                
                <p>Category:- <span>$category</span></p>

                <p>Location:- <span>$location</span></p>

                <p>Date:- <span>22/12/2022</span></p>

                <p class='ad-details-contact'>Contact Number:- <span><a href='tel:$contact'>$contact $secondNumber</a></span> <img src='./images/phone.png' alt=''phone icon></p>    
            
            </div>
        </section>
        ";
    }
    ?>

        <!-- <div class="ad-details-images">
            <img src="https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547__340.jpg" alt="main-image">

            <div class="ad-details-images-sm">
                <img src="https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547__340.jpg" alt="other-images">
                <img src="https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547__340.jpg" alt="other-images">
                <img src="https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547__340.jpg" alt="other-images">
                <img src="https://cdn.pixabay.com/photo/2018/08/14/13/23/ocean-3605547__340.jpg" alt="other-images">
            </div>
        </div> -->

    <?php
        include './components/footer.php';
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