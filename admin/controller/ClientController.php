<?php
    require 'dbConfig.php';
    // THIS FOR CREATE
    if (isset($_POST['saveClient'])) {
        // print_r($_POST);
        // exit;
        $upload_status = false;
        if ($_FILES['client_image']['size']>0) {
            $imgArray = $_FILES['client_image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/clientImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $message = "File Not Found";
        }
        
        $clients_name     = $_POST['clients_name'];
        $designation_id = $_POST['designation_id'];
        $client_review   = $_POST['client_review'];

        if (empty($clients_name) || empty($designation_id) || empty($client_review) || $upload_status == false) {
            $message = "All fields are required";
        } else {
            $insertQry = "INSERT INTO `our_clients`(`clients_name`, `designation_id`, `client_image`, `client_review`, `active_status`) VALUES  ('{$clients_name}', '{$designation_id}', '{$random_file_name}','{$client_review}', 1)";
            $isSubmit = mysqli_query($dbCon, $insertQry);

            if ($isSubmit == true) {
                $message = "Client Insert Succesfull";
            } else {
                $message = "Insert Failed";
            }
        }

        header("Location: ../client/clientCreate.php?msg={$message}");
        
    }

    // THIS FOR UPDATE
    if (isset($_POST['updateClient'])) {
        // print_r($_POST);
        // exit;
        $upload_status = false;
        if ($_FILES['client_image']['size']>0) {

            /**
             * Delete Previous File 
             */
            if(file_exists('../uploads/clientImage/'.$_POST['oldImage'])){
                unlink('../uploads/clientImage/'.$_POST['oldImage']);
            }
            $imgArray = $_FILES['client_image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/clientImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $random_file_name=$_POST['oldImage'];
        }
        $client_id = $_POST['client_id'];
        $clients_name     = $_POST['clients_name'];
        $designation_id = $_POST['designation_id'];
        $client_review   = $_POST['client_review'];

        if (empty($clients_name) || empty($designation_id) || empty($client_review)) {
            $message = "All fields are required";
        }else {
            $updateQry = "UPDATE our_clients SET `clients_name`='{$clients_name}', designation_id='{$designation_id}',client_image='{$random_file_name}', client_review='{$client_review}' WHERE id='{$client_id}'";

            $isSubmit = mysqli_query($dbCon, $updateQry);

            if ($isSubmit == true) {
                $message = "Client Update Succesfull";
            } else {
                $message = "Update Failed";
            }
        }

        header("Location: ../client/clientUpdate.php?client_id={$client_id}&msg={$message}");
        
    }