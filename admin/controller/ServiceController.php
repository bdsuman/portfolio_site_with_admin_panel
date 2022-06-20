<?php
require 'dbConfig.php';
// THIS FOR CREATE
if (isset($_POST['saveService'])) {
    $service_name     = $_POST['service_name'];
    $service_details = $_POST['service_details'];
    $icon_name   = $_POST['icon_name'];

    if (empty($service_name) || empty($service_details) || empty($icon_name)) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO `services`(`service_name`, `service_details`, `icon_name`) VALUES ('{$service_name}', '{$service_details}', '{$icon_name}')";
        $isSubmit = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $message = "Services Inserted Succesfull";
        } else {
            $message = "Insert Failed";
        }
    }

    header("Location: ../service/servicesCreate.php?msg={$message}");
}

// THIS FOR UPDATE
if (isset($_POST['updateBanner'])) {

    $banner_id = $_POST['banner_id'];
    $title     = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $details   = $_POST['details'];

    if (empty($title) || empty($sub_title) || empty($details)) {
        $message = "All fields are required";
    } else {
        $updateQry = "UPDATE banners SET title='{$title}', sub_title='{$sub_title}', details='{$details}' WHERE id='{$banner_id}'";

        $isSubmit = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $message = "Banner Update Succesfull";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../service/bannerUpdate.php?banner_id={$banner_id}&msg={$message}");
}
