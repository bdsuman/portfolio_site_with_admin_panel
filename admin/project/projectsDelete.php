<?php
    require '../controller/dbConfig.php';

    $project_id = $_GET['project_id'];
    $updateQry = "UPDATE projects SET active_status=0 WHERE id='{$project_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Project Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../project/projectsList.php?msg={$message}");
