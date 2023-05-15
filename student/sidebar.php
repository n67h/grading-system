<?php
    require_once 'includes/session.inc.php';
?>
    <!-- jquery datatable css cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <!-- font-awesome cdn -->
    <script src="https://kit.fontawesome.com/3481525a72.js" crossorigin="anonymous"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/style.css?<?php echo time();?>" />
    <!-- cdn of chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- start of main container -->
    <div class="main-container d-flex">
        <!-- start of sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="header-box px-2 pt-3 pb-2 d-flex justify-content-between">
                <h1 class="fs-4"><a href="dashboard.php" class="text-decoration-none"><span class="bg-dark text-white rounded shadow px-2 me-2 p-1">JCMPHS</span><span class="text-dark">Student</span></a></h1>
                       
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <div class="d-flex mt-1 ps-2 pb-1">
                    <?php
                        if(isset($_SESSION['student_id'])){
                            $sql = "SELECT tbl_year_level.year_level_id, tbl_year_level.year_level, tbl_student.* FROM tbl_year_level INNER JOIN tbl_student USING (year_level_id) WHERE tbl_student.student_id = $student_id_session;";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $gender = $row['gender'];
                                    $year_level = $row['year_level'];
                                }
                                if($gender == 'Male'){
                                    echo '<img class="text-white rounded-circle" src="../assets/images/male-icon.png" alt="" style="width: 20%; height: 30%;">';
                                }elseif($gender == 'Female'){
                                    echo '<img class="text-white rounded-circle" src="../assets/images/female-icon.png" alt="" style="width: 20%; height: 30%;">';
                                }
                                echo '<li class="px-3 py-2 d-block text-dark">' .$first_name. ' ' .$last_name. '</li>';
                            }else{
                                echo 'tests';
                            }
                        }
                    ?>
                </div>
                <div class="text-white">
                    <hr class="mx-2">
                </div>
                <li class=""><a href="dashboard.php" class="text-decoration-none px-3 py-2 d-block text-dark"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class=""><a href="grades.php" class="text-decoration-none px-3 py-2 d-block text-dark"><i class="fa-regular fa-chart-bar"></i> Grades</a></li>
                <li class=""><a href="profile.php" class="text-decoration-none px-3 py-2 d-block text-dark"><i class="fa-solid fa-id-card"></i> Profile</a></li>
                <li class=""><a href="about-us.php" class="text-decoration-none px-3 py-2 d-block text-dark"><i class="fa-solid fa-circle-info"></i> About Us</a></li>
                

                <div class="text-dark">
                    <hr class="mx-2">
                </div>
            </ul>
            <ul class="list-unstyled px-2">
                <li class=""><a href="includes/logout.inc.php" class="text-decoration-none px-3 py-2 d-block text-dark"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
            </ul>
        </div>
        <!-- end of sidebar -->

        <div class="content">
            <!-- start of navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <a class="navbar-brand fs-4" href="#">JCMPHS</a>
                        <button class="btn px-1 py-0 open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    </div>
                    
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end me-5" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $first_name. ' ' .$last_name; ?>
                                </a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item bg-dark text-white admin-dropdown" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item bg-dark text-white admin-dropdown" href="includes/logout.inc.php">Log out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end of navbar -->