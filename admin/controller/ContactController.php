<?php
require 'dbConfig.php';
// THIS FOR CREATE
if (isset($_POST['saveContact'])) {
    $contact_topic     = $_POST['contact_topic'];
    $contact_details = $_POST['contact_details'];
    $icon_name   = $_POST['icon_name'];

    if (empty($contact_topic) || empty($contact_details) || empty($icon_name)) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO `contact_us`(`contact_topic`, `contact_details`, `icon_name`,`active_status`) VALUES ('{$contact_topic}', '{$contact_details}', '{$icon_name}',1)";
        $isSubmit = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $message = "Contacts Inserted Succesfull";
        } else {
            $message = "Insert Failed";
        }
    }

    header("Location: ../contact/contactCreate.php?msg={$message}");
}

// THIS FOR UPDATE
if (isset($_POST['updateContact'])) {
   // print_r($_POST);
    $contact_id     = $_POST['contact_id'];
    $contact_topic     = $_POST['contact_topic'];
    $contact_details = $_POST['contact_details'];
    $icon_name   = $_POST['icon_name'];

    if (empty($contact_topic) || empty($contact_details) || empty($icon_name)) {
        $message = "All fields are required";
    }  else {
        $updateQry = "UPDATE contact_us SET `contact_topic`='{$contact_topic}', contact_details='{$contact_details}', `icon_name`='{$icon_name}' WHERE id='{$contact_id}'";

        $isSubmit = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $message = "Contact Update Succesfull";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../contact/contactUpdate.php?contact_id={$contact_id}&msg={$message}");
}
