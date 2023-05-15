<?php
    session_start();
    require_once '../../connection/db.inc.php';

    if(isset($_POST['edit'])){
        $edit_grades_id = mysqli_real_escape_string($conn, $_POST['edit_grades_id']);
        $edit_student_id = mysqli_real_escape_string($conn, $_POST['edit_student_id']);
        $edit_first_quarter = mysqli_real_escape_string($conn, $_POST['edit_first_quarter']);
        $edit_second_quarter = mysqli_real_escape_string($conn, $_POST['edit_second_quarter']);
        $edit_third_quarter = mysqli_real_escape_string($conn, $_POST['edit_third_quarter']);
        $edit_fourth_quarter = mysqli_real_escape_string($conn, $_POST['edit_fourth_quarter']);

        $sql = "UPDATE tbl_grades SET 1st_quarter = $edit_first_quarter, 2nd_quarter = $edit_second_quarter, 3rd_quarter = $edit_third_quarter, 4th_quarter = $edit_fourth_quarter WHERE grades_id = $edit_grades_id;";
        if(mysqli_query($conn, $sql)){
            header("location: ../grades.php?student_id=$edit_student_id");
            die();
        }
    }else{
        header("location: ../grades.php?student_id=$edit_student_id");
        die();
    }