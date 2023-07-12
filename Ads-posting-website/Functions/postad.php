<?php

    include '../database.php';
    session_start();

    $targetdir = "../ad-images";

    if(isset($_POST["submit"])){
        $file = $_FILES['cover-image'];

        $fileName = $_FILES['cover-image']['name'];
        $fileType = $_FILES['cover-image']['type'];
        $fileSize = $_FILES['cover-image']['size'];
        $fileError = $_FILES['cover-image']['error'];
        $fileTmpName = $_FILES['cover-image']['tmp_name'];

        // other input fields
        $adTitle = $_POST['ad-title'];
        $adDescription = $_POST['ad-description'];
        $adPrice = $_POST['ad-price'];
        $adCategory = $_POST['category'];
        $adLocation = $_POST['ad-location'];
        $adPhone1 = $_POST['phone-number'];
        $adPhone2 = $_POST['phone-number-2'];
        $userID = $_SESSION['sessionId'];
        

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $acceptedFileTypes = array("jpg", "jpeg", "png");

        if(in_array($fileActualExt, $acceptedFileTypes)) {
            if($fileError == 0) {
                if($fileSize < 500000){
                    $fileNameNew = uniqid('', true). "." . $fileActualExt;
                    $fileDestination = $targetdir."/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    
                    if(empty($adTitle) || empty($adDescription) || empty($adCategory) || empty($adPhone1) || empty($adLocation)){
                        header("location:../create-ad.php?error=fillalldata");
                        exit();
                    } else {
                        $sql = "INSERT INTO ads (ad_cover_img, ad_title, ad_description, ad_price, ad_location, ad_category, ad_phone1, ad_phone2, user_id) VALUES (?, ?, ?,? , ?, ?, ?, ?, ?)";

                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header("location: ../profile.php?error=sqlerror");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssssssss", $fileDestination, $adTitle, $adDescription, $adPrice, $adLocation, $adCategory, $adPhone1, $adPhone2, $userID);
                            mysqli_stmt_execute($stmt);
                            
                            header("location: ../profile.php?success=adsubmitted");
                            exit();

                        }
                    }


                    header("location:../create-ad.php?success=uploadsucceses");
                    exit();
                } else {
                    header("location:../create-ad.php?error=oversizedfile");
                    exit();
                }
            } else {
                header("location:../create-ad.php?error=erroruploadingfile");
                exit();
            }
        } else {
            header("location:../create-ad.php?error=unacceptedfiletype");
            exit();
        }
    }

?>