<?php
    require 'dbConfig.php';
    // THIS FOR CREATE
    if (isset($_POST['saveStaff'])) {
        // print_r($_POST);
        // exit;
        $upload_status = false;
        if ($_FILES['staff_image']['size']>0) {
            $imgArray = $_FILES['staff_image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/staffImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $message = "File Not Found";
        }
        
        $name     = $_POST['name'];
        $designation_id = $_POST['designation_id'];
        $twitter   = $_POST['twitter'];
        $facebook   = $_POST['facebook'];
        $linkedin   = $_POST['linkedin'];
        $instagram   = $_POST['instagram'];

        if (empty($name) || empty($designation_id) || empty($twitter) || empty($facebook) || empty($linkedin) || empty($instagram) || $upload_status == false) {
            $message = "All fields are required";
        } else {
            $insertQry = "INSERT INTO `our_staff`(`staff_name`, `designation_id`, `staff_image`, `twitter`, `facebook`, `linkedin`, `instagram`, `active_status`) VALUES  ('{$name}', '{$designation_id}', '{$random_file_name}','{$twitter}', '{$facebook}','{$linkedin}','{$instagram}', 1)";
            $isSubmit = mysqli_query($dbCon, $insertQry);

            if ($isSubmit == true) {
                $message = "Staff Insert Succesfull";
            } else {
                $message = "Insert Failed";
            }
        }

        header("Location: ../staff/staffCreate.php?msg={$message}");
        
    }

    // THIS FOR UPDATE
    if (isset($_POST['updateStaff'])) {
        // print_r($_POST);
        // exit;
        $upload_status = false;
        if ($_FILES['staff_image']['size']>0) {

            /**
             * Delete Previous File 
             */
            if(file_exists('../uploads/staffImage/'.$_POST['oldImage'])){
                unlink('../uploads/staffImage/'.$_POST['oldImage']);
            }
            $imgArray = $_FILES['staff_image'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/staffImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $random_file_name=$_POST['oldImage'];
        }
        $staff_id = $_POST['staff_id'];
        $name     = $_POST['name'];
        $designation_id = $_POST['designation_id'];
        $twitter   = $_POST['twitter'];
        $facebook   = $_POST['facebook'];
        $linkedin   = $_POST['linkedin'];
        $instagram   = $_POST['instagram'];

        if (empty($name) || empty($designation_id) || empty($twitter) || empty($facebook) || empty($linkedin) || empty($instagram) ) {
            $message = "All fields are required";
        } else {
            $updateQry = "UPDATE our_staff SET `staff_name`='{$name}', designation_id='{$designation_id}',staff_image='{$random_file_name}', twitter='{$twitter}', facebook='{$facebook}' ,linkedin='{$linkedin}' ,instagram='{$instagram}' WHERE id='{$staff_id}'";

            $isSubmit = mysqli_query($dbCon, $updateQry);

            if ($isSubmit == true) {
                $message = "Staff Update Succesfull";
            } else {
                $message = "Update Failed";
            }
        }

        header("Location: ../staff/staffUpdate.php?staff_id={$staff_id}&msg={$message}");
        
    }