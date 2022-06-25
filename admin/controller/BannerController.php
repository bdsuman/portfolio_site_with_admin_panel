<?php
    require 'dbConfig.php';
    // THIS FOR CREATE
    if (isset($_POST['saveBanner'])) {
        
        $upload_status = false;
        if ($_FILES['image']['size']>0) {
            $imgArray = $_FILES['image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/bannerImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $message = "File Not Found";
        }
        
        $title     = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $details   = $_POST['details'];

        if (empty($title) || empty($sub_title) || empty($details) || $upload_status == false) {
            $message = "All fields are required";
        } else {
            $insertQry = "INSERT INTO banners (`title`, `sub_title`, `details`, `image`,`active_status`) VALUES ('{$title}', '{$sub_title}', '{$details}', '{$random_file_name}',1)";
            $isSubmit = mysqli_query($dbCon, $insertQry);

            if ($isSubmit == true) {
                $message = "Banner Insert Succesfull";
            } else {
                $message = "Insert Failed";
            }
        }

        header("Location: ../banner/bannerCreate.php?msg={$message}");
        
    }

    // THIS FOR UPDATE
    if (isset($_POST['updateBanner'])) {

        $upload_status = false;
        if ($_FILES['image']['size']>0) {

            /**
             * Delete Previous File 
             */
            if(file_exists('../uploads/bannerImage/'.$_POST['oldImage'])){
                unlink('../uploads/bannerImage/'.$_POST['oldImage']);
            }
            $imgArray = $_FILES['image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/bannerImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $random_file_name=$_POST['oldImage'];
        }
        $banner_id = $_POST['banner_id'];
        $title     = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $details   = $_POST['details'];

        if (empty($title) || empty($sub_title) || empty($details)) {
            $message = "All fields are required";
        } else {
            $updateQry = "UPDATE banners SET title='{$title}', sub_title='{$sub_title}', details='{$details}',image='{$random_file_name}' WHERE id='{$banner_id}'";

            $isSubmit = mysqli_query($dbCon, $updateQry);

            if ($isSubmit == true) {
                $message = "Banner Update Succesfull";
            } else {
                $message = "Update Failed";
            }
        }

        header("Location: ../banner/bannerUpdate.php?banner_id={$banner_id}&msg={$message}");
        
    }