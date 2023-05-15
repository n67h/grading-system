<?php
    session_start();
    require_once '../connection/db.inc.php';
    if(isset($_SESSION['student_id'])){
        $student_id_session = $_SESSION['student_id'];
        $year_level_id_session = $_SESSION['year_level_id'];
        $student_lrn_session = $_SESSION['student_lrn'];
    }else{
        header('location: login.php');
        die();
    }