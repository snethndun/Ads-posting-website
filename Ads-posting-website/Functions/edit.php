<?php
    include './database.php';
    session_start();

    if(isset($_POST['save'])){
            $title = $_POST['ad_title'];
            $description = $_POST['ad_description'];
            $price = $_POST['ad_price'];
            $location = $_POST['ad_location'];
            $category = $_POST['ad_category'];
            $phone1 = $_POST['ad_phone1'];
            $phone2 = $_POST['ad_phone2'];
            $adId = $_POST['save'];

            if(empty($adTitle) || empty($adDescription) || empty($adCategory) || empty($adPhone1) || empty($adLocation)){
                header("location:../edit-ad.php?error=fillalldata");
                exit();
            } else {
                 $sql = "UPDATE ads SET ad_title = $title, ad_description = $description, ad_price = $price, ad_location = $location, ad_category = $category, ad_phone1 = $phone1, ad_phone2 = $phone2 WHERE ad_id = $adId";

            if(mysqli_query($conn, $sql)){
                 header("Location: ../profile.php?success=adupdated");
                exit();
            } else {
                header("Location: ../edit-ad.php?error=somethingwentwrong");
                exit();
            }
        }
    }
?>