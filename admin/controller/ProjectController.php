<?php
    require 'dbConfig.php';
    // THIS FOR CREATE
    if (isset($_POST['saveProject'])) {
        $upload_status = false;
        if ($_FILES['project_thumb']['size']>0) {
            $imgArray = $_FILES['project_thumb'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/projectImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $message = "File Not Found";
        }
        
        $category_id     = $_POST['category_id'];
        $project_name = $_POST['project_name'];
        $project_link   = $_POST['project_link'];

        if (empty($category_id) || empty($project_name) || empty($project_link) || $upload_status == false) {
            $message = "All fields are required";
        } else {
            $insertQry = "INSERT INTO projects (`category_id`, `project_name`, `project_link`, `project_thumb`,`active_status`) VALUES ('{$category_id}', '{$project_name}', '{$project_link}', '{$random_file_name}',1)";
            $isSubmit = mysqli_query($dbCon, $insertQry);

            if ($isSubmit == true) {
                $message = "Project Insert Succesfull";
            } else {
                $message = "Insert Failed";
            }
        }

        header("Location: ../project/projectsCreate.php?msg={$message}");
        
    }

    // THIS FOR UPDATE
    if (isset($_POST['updateProject'])) {

        $upload_status = false;
        if ($_FILES['project_thumb']['size']>0) {

            /**
             * Delete Previous File 
             */
            if(file_exists('../uploads/projectImage/'.$_POST['oldImage'])){
                unlink('../uploads/projectImage/'.$_POST['oldImage']);
            }
            $imgArray = $_FILES['project_thumb'];
            $file_name = $imgArray['name'];
            $tmp_file_name = $imgArray['tmp_name'];

            $nameExtArr = explode('.', $file_name);
            $file_extension = strtolower(end($nameExtArr));
            $valid_extensions = array('jpg', 'png', 'jpeg');

            $random_file_name = time().'.'.$file_extension;

            if (in_array($file_extension, $valid_extensions)) {
                move_uploaded_file($tmp_file_name, '../uploads/projectImage/'.$random_file_name);
                $upload_status = true;
            } else {
                $message = $file_extension." is not Supported";
            }
        } else {
            $random_file_name=$_POST['oldImage'];
        }
        $project_id = $_POST['project_id'];
        $category_id     = $_POST['category_id'];
        $project_name = $_POST['project_name'];
        $project_link   = $_POST['project_link'];

        if (empty($category_id) || empty($project_name) || empty($project_link)) {
            $message = "All fields are required";
        } else {
            $updateQry = "UPDATE projects SET category_id='{$category_id}', project_name='{$project_name}', project_link='{$project_link}',project_thumb='{$random_file_name}' WHERE id='{$project_id}'";

            $isSubmit = mysqli_query($dbCon, $updateQry);

            if ($isSubmit == true) {
                $message = "Project Update Succesfull";
            } else {
                $message = "Update Failed";
            }
        }

        header("Location: ../project/projectUpdate.php?project_id={$project_id}&msg={$message}");
        
    }