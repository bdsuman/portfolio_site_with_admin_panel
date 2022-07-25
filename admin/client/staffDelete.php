<?php
    require '../controller/dbConfig.php';

    $staff_id = $_GET['staff_id'];
    $updateQry = "UPDATE our_staff SET active_status=0 WHERE id='{$staff_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Staff Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../staff/staffList.php?msg={$message}");
