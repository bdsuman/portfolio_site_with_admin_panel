<?php
require 'dbConfig.php';
// THIS FOR CREATE
if (isset($_POST['saveDesignation'])) {
    $designation_name     = $_POST['designation_name'];
   

    if (empty($designation_name)) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO `designations`(`designation_name`, `active_status`) VALUES ('{$designation_name}', 1)";
        $isSubmit = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $message = "Designation Inserted Succesfull";
        } else {
            $message = "Insert Failed";
        }
    }

    header("Location: ../designation/designationCreate.php?msg={$message}");
}

// THIS FOR UPDATE
if (isset($_POST['updateDesignation'])) {
   // print_r($_POST);
    $designation_id     = $_POST['designation_id'];
    $designation_name     = $_POST['designation_name'];
   

    if (empty($designation_name)) {
        $message = "All fields are required";
    }  else {
        $updateQry = "UPDATE designations SET `designation_name`='{$designation_name}' WHERE id='{$designation_id}'";

        $isSubmit = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $message = "Designation Update Succesfull";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../designation/designationUpdate.php?designation_id={$designation_id}&msg={$message}");
}
