<?php
    require '../controller/dbConfig.php';

    $client_id = $_GET['client_id'];
    $updateQry = "UPDATE our_clients SET active_status=0 WHERE id='{$client_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Client Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../client/clientList.php?msg={$message}");
