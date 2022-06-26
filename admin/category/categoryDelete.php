<?php
    require '../controller/dbConfig.php';

    $category_id = $_GET['category_id'];
    $updateQry = "UPDATE categories SET active_status=0 WHERE id='{$category_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Category Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../category/categoryList.php?msg={$message}");
