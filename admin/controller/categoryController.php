<?php
require 'dbConfig.php';
// THIS FOR CREATE
if (isset($_POST['saveCategory'])) {
    $category_name     = $_POST['category_name'];
   

    if (empty($category_name)) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO `categories`(`category_name`, `active_status`) VALUES ('{$category_name}', 1)";
        $isSubmit = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $message = "Category Inserted Succesfull";
        } else {
            $message = "Insert Failed";
        }
    }

    header("Location: ../category/categoryCreate.php?msg={$message}");
}

// THIS FOR UPDATE
if (isset($_POST['updateCategory'])) {
   // print_r($_POST);
    $category_id     = $_POST['category_id'];
    $category_name     = $_POST['category_name'];
   

    if (empty($category_name)) {
        $message = "All fields are required";
    }  else {
        $updateQry = "UPDATE categories SET `category_name`='{$category_name}' WHERE id='{$category_id}'";

        $isSubmit = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $message = "Category Update Succesfull";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../category/categoryUpdate.php?category_id={$category_id}&msg={$message}");
}
