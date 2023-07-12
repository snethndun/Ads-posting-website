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
    ?>

    <a href="profile.php" class="create-ad-backbtn">
        <img src="./images/back-btn.png" alt="back button">
    </a>

    <section class="create-ad-section">
        <h1>Create your ad</h1>

        <form action="./Functions/postad.php" method="post" name="create-ad" enctype="multipart/form-data">
        <div class="add-img-text add-cover-image">
            <p>Select your cover image</p>
<!--             <div class="add-image-icon">
                <img src="./images/plus.png" alt="plus icon" for="cover-image">
            </div> -->
            <br>
            <input type="file" name="cover-image" id="cover-image">
        </div>

        <!-- <div class="add-img-text">
            <p>Select other images</p>
            <div class="add-image-row">
                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <input type="file" name="cover-image-1">
                </div>

                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <input type="file" name="cover-image-2">
                </div>

                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <input type="file" name="cove-image-3">
                </div>

                <div class="add-image-icon">
                    <img src="./images/plus.png" alt="plus icon">
                    <input type="file" name="cover-image-4">
                </div>

            </div>
        </div> -->

        <div class="create-ad-details">
            <p class="create-ad-details-p">Ad title</p>
            <input type="text" name="ad-title">
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Description</p>
            <textarea id="" cols="30" rows="10" name="ad-description"></textarea>
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Price</p>
            <input type="text" name="ad-price">
            <!-- <p class="negotiable-or">or</p>
            <div class="negotiable">
                <input type="checkbox" name="negotiable" value="negotiable">
                <p>Negotiable</p>
            </div> -->
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Location</p>
            <input type="text" name="ad-location">
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
            <input type="text" name="phone-number">
        </div>

        <div class="create-ad-details">
            <p class="create-ad-details-p">Phone number 2</p>
            <input type="text" name="phone-number-2">
        </div>

        <button class="create-ad-button" type="submit" name="submit">
            Post your ad
        </button>
        </form>
    </section>

    <script src="script.js"></script>
</body>
</html>