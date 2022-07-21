<?php
    require '../controller/dbConfig.php';

    $section_id = $_GET['section_id'];
    $updateQry = "UPDATE sections SET `status`=0 WHERE id='{$section_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Section Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../section/sectionsList.php?msg={$message}");
