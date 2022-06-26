<?php
    require '../controller/dbConfig.php';

    $service_id = $_GET['service_id'];
    $updateQry = "UPDATE services SET design_status=0 WHERE id='{$service_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Service Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../service/servicesList.php?msg={$message}");
