<?php
    require '../controller/dbConfig.php';

    $designation_id = $_GET['designation_id'];
    $updateQry = "UPDATE designations SET active_status=0 WHERE id='{$designation_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Designation Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../designation/designationList.php?msg={$message}");
