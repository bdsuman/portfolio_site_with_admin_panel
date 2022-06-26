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
if (isset($_POST['updateService'])) {
   // print_r($_POST);
    $service_id     = $_POST['service_id'];
    $service_name     = $_POST['service_name'];
    $service_details = $_POST['service_details'];
    $icon_name   = $_POST['icon_name'];

    if (empty($service_name) || empty($service_details) || empty($icon_name)) {
        $message = "All fields are required";
    }  else {
        $updateQry = "UPDATE services SET `service_name`='{$service_name}', service_details='{$service_details}', `icon_name`='{$icon_name}' WHERE id='{$service_id}'";

        $isSubmit = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $message = "Service Update Succesfull";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../service/servicesUpdate.php?service_id={$service_id}&msg={$message}");
}
