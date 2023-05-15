<?php
    // require_once 'includes/session.inc.php';
    require_once '../connection/db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <?php
        require_once 'sidebar.php';
        $year_level_id;
        if(isset($_GET['grade'])){
            $grade = $_GET['grade'];
            if($grade == 7){
                $year_level_id = 1;
            }elseif($grade == 8){
                $year_level_id = 2;
            }elseif($grade == 9){
                $year_level_id = 3;
            }elseif($grade == 10){
                $year_level_id = 4;
            }
        }
    ?>
        <div class="container mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <?php
                            if($year_level_id == 1){
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark active" aria-current="true" href="student.php?grade=7">Grade 7</a>
                                    </li>';
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark" href="student.php?grade=8">Grade 8</a>
                                    </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark" href="student.php?grade=9">Grade 9</a>
                                </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark" href="student.php?grade=10">Grade 10</a>
                                </li>';
                            }elseif($year_level_id == 2){
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark" aria-current="true" href="student.php?grade=7">Grade 7</a>
                                    </li>';
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark active" href="student.php?grade=8">Grade 8</a>
                                    </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark" href="student.php?grade=9">Grade 9</a>
                                </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark" href="student.php?grade=10">Grade 10</a>
                                </li>';
                            }elseif($year_level_id == 3){
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark" aria-current="true" href="student.php?grade=7">Grade 7</a>
                                    </li>';
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark" href="student.php?grade=8">Grade 8</a>
                                    </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark active" href="student.php?grade=9">Grade 9</a>
                                </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark" href="student.php?grade=10">Grade 10</a>
                                </li>';
                            }elseif($year_level_id == 4){
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark" aria-current="true" href="student.php?grade=7">Grade 7</a>
                                    </li>';
                                echo '<li class="nav-item">
                                        <a class="nav-link text-decoration-none text-dark" href="student.php?grade=8">Grade 8</a>
                                    </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark" href="student.php?grade=9">Grade 9</a>
                                </li>';
                                echo '<li class="nav-item">
                                    <a class="nav-link text-decoration-none text-dark active" href="student.php?grade=10">Grade 10</a>
                                </li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="card-body">
                <h3 class="mb-3"></h3>
            <!-- start of first row -->
            <div class="row">
                <!-- start of second container -->
                <div class="container">
                    <!-- start of second row -->
                    <div class="row">
                        <!-- start of div on center -->
                        <div class="col-md-12">
                            <!-- start of table -->
                            <table class="table table-bordered table-striped table-warning" id="datatable">
                                <!-- start of table header -->
                                <thead>
                                    <tr>
                                        <th class="table-light text-uppercase d-none">student id</th>
                                        <th class="table-light text-uppercase d-none">year level id</th>
                                        <th class="table-light text-uppercase">lrn</th>
                                        <th class="table-light text-uppercase">year level</th>
                                        <th class="table-light text-uppercase">first name</th>
                                        <th class="table-light text-uppercase">last name</th>
                                        <th class="table-light text-uppercase">middle name</th>
                                        <th class="table-light text-uppercase">gender</th>
                                        <th class="table-light text-uppercase">birthdate</th>
                                        <th class="table-light text-uppercase">email</th>
                                        <th class="table-light text-uppercase">action</th>
                                    </tr>
                                </thead>
                                <!-- end of table header -->
                                <!-- start of table body -->
                                <tbody>
                                <?php
                                    $sql_select = "SELECT tbl_year_level.year_level_id, tbl_year_level.year_level, tbl_student.* FROM tbl_year_level INNER JOIN tbl_student USING (year_level_id) WHERE year_level_id = $year_level_id;";
                                    $result_select = mysqli_query($conn, $sql_select);
                                    if(mysqli_num_rows($result_select) > 0){
                                        while($row_select = mysqli_fetch_assoc($result_select)){
                                            $student_id = $row_select['student_id'];
                                            $year_level_id = $row_select['year_level_id'];
                                            $lrn = $row_select['student_lrn'];
                                            $year_level = $row_select['year_level'];
                                            $first_name = $row_select['first_name'];
                                            $last_name = $row_select['last_name'];
                                            $middle_name = $row_select['middle_name'];
                                            $gender = $row_select['gender'];
                                            $birthdate = $row_select['birthdate'];
                                            $email = $row_select['email'];

                                            
                                ?>
                                            <tr>
                                                <td class="text-center d-none"><?= $student_id ?></td>
                                                <td class="text-center d-none"><?= $year_level_id ?></td>
                                                <td class="text-center"><?= $lrn ?></td>
                                                <td class="text-center"><?= $year_level ?></td>
                                                <td class="text-center"><?= $first_name ?></td>
                                                <td class="text-center"><?= $last_name ?></td>
                                                <td class="text-center"><?= $middle_name ?></td>
                                                <td class="text-center"><?= $gender ?></td>
                                                <td class="text-center"><?= $birthdate ?></td>
                                                <td class="text-center"><?= $email ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-success edit" href="#" data-bs-toggle="modal" data-bs-target="#edit_student_modal"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a class="btn btn-sm btn-primary grade" href="grades.php?student_id=<?= $student_id ?>"><i class="fa-regular fa-newspaper"></i></a>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    }else{
                                ?>
                                    <tr>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="" class="text-center d-none"></td>
                                        <td colspan="10" class="text-center">No records found.</td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                <!-- end of table body -->
                            </table>
                            <!-- end of table -->
                        </div>
                        <!-- end of div on center -->
                    </div>
                    <!-- end of second row -->
                </div>
                <!-- end of second container -->
            </div>
            <!-- end of first row -->
            </div>
            </div>
            
        </div>
        <!-- end of container fluid -->
    </div>
    <!-- end of first container -->
    </div>
    <!-- start of edit student modal -->
    <div class="modal fade" id="edit_student_modal">
        <!-- start of edit modal dialog -->
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- start of edit modal content -->
            <div class="modal-content">
                <!-- start of modal header -->
                <div class="modal-header bg-dark border-0">
                    <h4 class="modal-title text-white">Edit Student Information</h4>
                    <button type="button" class="btn btn-danger close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <!-- end of modal header -->
                <!-- start of edit modal form -->
                <form action="includes/edit-student.inc.php" method="post">
                    <!-- start of edit modal body -->                
                    <div class="modal-body">
                        <input type="hidden" name="edit_student_id" id="edit_student_id">
                        <!-- start of edit modal row -->
                        <div class="row">
                            <!-- start of edit modal col -->
                            <div class="col-md-12">
                                <!-- start of edit modal card -->
                                <div class="card card-primary">
                                    <!-- start of edit modal card body -->
                                    <div class="card-body">
                                        <!-- start of edit modal row -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label for="edit_year_level_id" class="form-label fs-6 ps-2">Year Level<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <select class="form-select" name="edit_year_level_id" id="edit_year_level_id" aria-label="Default select example">
                                                        <?php
                                                            $sql = "SELECT * FROM tbl_year_level ORDER BY year_level_id DESC;";
                                                            $result = mysqli_query($conn, $sql);
                                                            if(mysqli_num_rows($result) > 0){
                                                                while($row = mysqli_fetch_assoc($result)){
                                                                    $year_level_id = $row['year_level_id'];
                                                                    $year_level = $row['year_level'];
                                                                    echo '<option value="' .$year_level_id. '" selected>' .$year_level. '</option>';
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="edit_first_name" class="form-label fs-6 ps-2">First Name<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <input type="text" name="edit_first_name" class="form-control" id="edit_first_name" placeholder="" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="edit_last_name" class="form-label fs-6 ps-2">Last Name<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <input type="text" name="edit_last_name" class="form-control" id="edit_last_name" placeholder="" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="edit_middle_name" class="form-label fs-6 ps-2">Middle Name<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <input type="text" name="edit_middle_name" class="form-control" id="edit_middle_name" placeholder="" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="edit_gender" class="form-label fs-6 ps-2">Gender<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <select class="form-select" name="edit_gender" id="edit_gender" aria-label="Default select example">
                                                        <option value="Male" selected>Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="edit_birthdate" class="form-label fs-6 ps-2">Birthdate<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <input type="date" name="edit_birthdate" class="form-control" id="edit_birthdate" placeholder="" value="" max="2007-12-31" min="1995-12-31" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="edit_email" class="form-label fs-6 ps-2">Email<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                                    <input type="email" name="edit_email" class="form-control" id="edit_email" placeholder="" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of edit modal row -->
                                    </div>
                                    <!-- end of edit modal card body -->
                                    <!-- start of edit modal footer -->
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="edit" class="btn btn-success">Save Changes</button>
                                    </div>
                                    <!-- end of edit modal footer -->
                                </div>
                                <!-- end of edit modal card -->
                            </div>
                            <!-- end of edit modal col -->
                        </div>
                        <!-- end of edit modal row -->
                    </div>
                    <!-- end of edit modal body -->                
                </form>
                <!-- end of edit modal form -->
            </div>
            <!-- end of edit modal content -->
        </div>
        <!-- end of edit modal dialog -->
    </div>
    <!-- end of edit student modal -->
    <?php
        require_once 'scripts.php';
    ?>