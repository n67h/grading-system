<?php
    session_start();
    require_once '../connection/db.inc.php';
    if(isset($_SESSION['admin_id'])){
        $admin_id_session = $_SESSION['admin_id'];
    }else{
        header('location: login.php');
        die();
    }