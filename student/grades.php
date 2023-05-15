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
    <title>Grades</title>
    <?php
        require_once 'sidebar.php';
    ?>
        <div class="container mt-5">
            <h3 class="mb-3"><?= $year_level ?></h3>
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
                                        <th class="table-light text-uppercase d-none">grades id</th>
                                        <th class="table-light text-uppercase d-none">student id</th>
                                        <th class="table-light text-uppercase d-none">year level</th>
                                        <th class="table-light text-uppercase">subject</th>
                                        <th class="table-light text-uppercase">1st quarter</th>
                                        <th class="table-light text-uppercase">2nd quarter</th>
                                        <th class="table-light text-uppercase">3rd quarter</th>
                                        <th class="table-light text-uppercase">4th quarter</th>
                                        <th class="table-light text-uppercase">final grade</th>
                                        <th class="table-light text-uppercase">remarks</th>
                                    </tr>
                                </thead>
                                <!-- end of table header -->
                                <!-- start of table body -->
                                <tbody>
                                <?php
                                    $sql_select = "SELECT tbl_year_level.year_level_id,  tbl_year_level.year_level, tbl_subject.subject_id, tbl_subject.subject, tbl_grades.* FROM tbl_year_level INNER JOIN tbl_grades USING (year_level_id) INNER JOIN tbl_subject USING (subject_id) WHERE student_id = $student_id_session AND tbl_year_level.year_level_id = $year_level_id_session ORDER BY tbl_subject.subject ASC;";
                                    $result_select = mysqli_query($conn, $sql_select);
                                    if(mysqli_num_rows($result_select) > 0){
                                        while($row_select = mysqli_fetch_assoc($result_select)){
                                            $grades_id = $row_select['grades_id'];
                                            $student_id = $row_select['student_id'];
                                            $year_level = $row_select['year_level'];
                                            $subject = $row_select['subject'];
                                            $first_quarter = $row_select['1st_quarter'];
                                            $second_quarter = $row_select['2nd_quarter'];
                                            $third_quarter = $row_select['3rd_quarter'];
                                            $fourth_quarter = $row_select['4th_quarter'];
                                            $final_grade = $row_select['final_grade'];
                                            $remarks = $row_select['remarks'];
                                            if(($final_grade >= 75) && ($final_grade <= 100)){
                                                $remarks = 'Passed';
                                            }else{
                                                $remarks = 'Failed';
                                            }
                                ?>
                                            <tr>
                                                <td class="text-center d-none"><?= $grades_id ?></td>
                                                <td class="text-center d-none"><?= $student_id ?></td>
                                                <td class="text-center d-none"><?= $year_level ?></td>
                                                <td class="text-center"><?= $subject ?></td>
                                                <td class="text-center"><?= $first_quarter ?></td>
                                                <td class="text-center"><?= $second_quarter ?></td>
                                                <td class="text-center"><?= $third_quarter ?></td>
                                                <td class="text-center"><?= $fourth_quarter ?></td>
                                                <td class="text-center"><?= $final_grade ?></td>
                                                <td class="text-center"><?= $remarks ?></td>
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
        <!-- end of container fluid -->
    </div>
    <!-- end of first container -->
        </div>
    <?php
        require_once 'scripts.php';
    ?>