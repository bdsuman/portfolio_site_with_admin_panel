<?php
    require '../controller/dbConfig.php';

    $contact_id = $_GET['contact_id'];
    $updateQry = "UPDATE contact_us SET active_status=0 WHERE id='{$contact_id}'";

    $isSubmit = mysqli_query($dbCon, $updateQry);

    if ($isSubmit == true) {
        $message = "Contact Deleted Succesfull";
    } else {
        $message = "Deleted Failed";
    }

    header("Location: ../contact/contactList.php?msg={$message}");
