<?php
require 'dbConfig.php';
// THIS FOR CREATE
if (isset($_POST['saveSection'])) {
    $title     = $_POST['title'];
    $sub_title   = $_POST['sub_title'];
    $page_link   = $_POST['page_link'];

    if (empty($title)|| empty($sub_title) || empty($page_link)) {
        $message = "All fields are required";
    } else {
        $insertQry = "INSERT INTO `sections`(`title`, `sub_title`,`page_link`, `status`) VALUES ('{$title}', '{$sub_title}','{$page_link}',1)";
        $isSubmit = mysqli_query($dbCon, $insertQry);

        if ($isSubmit == true) {
            $message = "Section Inserted Succesfull";
        } else {
            $message = "Insert Failed";
        }
    }

    header("Location: ../section/sectionsCreate.php?msg={$message}");
}

// THIS FOR UPDATE
if (isset($_POST['updateSection'])) {
//    print_r($_POST);
//    exit;
    $section_id     = $_POST['section_id'];
    $title     = $_POST['title'];
    $sub_title   = $_POST['sub_title'];
    $page_link   = $_POST['page_link'];

    if (empty($title) || empty($sub_title) || empty($page_link)) {
         $message = "All fields are required";
    }  else {
       $updateQry = "UPDATE sections SET `title`='{$title}',`sub_title`='{$sub_title}', `page_link`='{$page_link}' WHERE id='{$section_id}'";
        $isSubmit = mysqli_query($dbCon, $updateQry);

        if ($isSubmit == true) {
            $message = "Section Update Succesfull";
        } else {
            $message = "Update Failed";
        }
    }

    header("Location: ../section/sectionsUpdate.php?section_id={$section_id}&msg={$message}");
}
