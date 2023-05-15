<?php
    session_start();
    require_once '../../connection/db.inc.php';

    if(isset($_POST['edit'])){
        $edit_student_id = mysqli_real_escape_string($conn, $_POST['edit_student_id']);
        $edit_year_level_id = mysqli_real_escape_string($conn, $_POST['edit_year_level_id']);
        $edit_first_name = mysqli_real_escape_string($conn, $_POST['edit_first_name']);
        $edit_last_name = mysqli_real_escape_string($conn, $_POST['edit_last_name']);
        $edit_middle_name = mysqli_real_escape_string($conn, $_POST['edit_middle_name']);
        $edit_gender = mysqli_real_escape_string($conn, $_POST['edit_gender']);
        $edit_birthdate = mysqli_real_escape_string($conn, $_POST['edit_birthdate']);
        $edit_email = mysqli_real_escape_string($conn, $_POST['edit_email']);

        if(empty($edit_year_level_id) || empty($edit_first_name) || empty($edit_last_name) || empty($edit_gender) || empty($edit_birthdate) || empty($edit_email)){
            $error_message = "All fields are required!";
            echo "<script type='text/javascript'>alert('$error_message');</script>";

            $error_redirect = '<h3 style="color: red; text-align: center;">All fields are required! You will be redirected to previous page in <span id="counter">5</span> second(s).</h3>
            <script type="text/javascript">
                function countdown() {
                    var i = document.getElementById("counter");
                    if (parseInt(i.innerHTML)<=0) {
                        location.href = "../student.php?grade=7";
                    }
                    i.innerHTML = parseInt(i.innerHTML)-1;
                }
                setInterval(function(){ countdown(); },1000);
            </script>';
            echo $error_redirect;
            header("refresh:5;url=../student.php?grade=7");
            die();
        }else{
            $sql = "UPDATE tbl_student SET year_level_id = $edit_year_level_id, first_name = '$edit_first_name', last_name = '$edit_last_name', middle_name = '$edit_middle_name', gender = '$edit_gender', birthdate = '$edit_birthdate', email = '$edit_email' WHERE student_id = $edit_student_id;";
            if(mysqli_query($conn, $sql)){
                header("location: ../student.php?grade=7");
                die();
            }else{
                echo 'tangina';
            }
        }
    }else{
        header("location: ../student.php?grade=7");
        die();
    }