<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="nav.css">
    <title>Needs</title>
</head>
<body>
    
    <?php
        include './components/navbar.php';
        session_start();

        if(isset($_POST['edit-ad'])){
            $adId = $_POST['edit-ad'];

            $sql="SELECT * FROM  ads WHERE ad_id = $adId";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            $title = $row['ad_title'];
            $description = $row['ad_description'];
            $price = $row['ad_price'];
            $location = $row['ad_location'];
            $category = $row['ad_category'];
            $phone1 = $row['ad_phone1'];
            $phone2 = $row['ad_phone2'];
            $image = $row['ad_cover_img'];
        }
    ?>

    <a href="profile.html" class="create-ad-backbtn">
        <img src="./images/back-btn.png" alt="back button">
    </a>

    <section class="create-ad-section">
        <h1>Create your ad</h1>
<!-- 
        <div class="add-img-text add-cover-image">
            <p>Select your cover image</p>
            <div class="add-image-icon">
                <img src="./images/plus.png" alt="plus icon">
                <input type="file" name='cover-image'>
                <button class="edit-ad-bin"><img src="./images/bin.png" alt="bin-icon"></button>
            </div>
        </div> -->

    <!--     <div class="add-img-text">
            <p>Select other images</p>
            <div class="add-image-row">
                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <button class="edit-ad-bin"><img src="./images/bin.png" alt="bin-icon"></button>
                </div>

                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <button class="edit-ad-bin"><img src="./images/bin.png" alt="bin-icon"></button>
                </div>

                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <button class="edit-ad-bin"><img src="./images/bin.png" alt="bin-icon"></button>
                </div>

                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <button class="edit-ad-bin"><img src="./images/bin.png" alt="bin-icon"></button>
                </div>

            </div> -->
        </div>

        <form action="edit-ad.php">
        <div class="create-ad-details">
            <p class="create-ad-details-p">Ad title</p>
            <input type="text" name='ad-title' value="<?php echo $title;?>">
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Description</p>
            <textarea name="" id="" cols="30" rows="10" name='ad-description'><?php echo $description;?></textarea>
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Price</p>
            <input type="text" name='ad-price' value="<?php echo $price; ?>">
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Location</p>
            <input type="text" name="ad-location" value="<?php echo $location?>">
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Category</p>
            <select name="category" id="category">
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

        <div class="create-ad-details">
            <p class="create-ad-details-p">Phone number</p>
            <input type="text" name="ad-phone1" value="<?php echo $phone1;?>">
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Phone number 2</p>
            <input type="text" name='ad-phone2'  value="<?php echo $phone2;?>">
        </div>

        <button class="create-ad-button" name='save' value="<?php echo $adId?>">
            Save
        </button>
        </form>
    </section>

    <script>
        document.getElementById('category').value = '<?php echo $category; ?>';
    </script>
    
    <script src="script.js"></script>
</body>
</html>