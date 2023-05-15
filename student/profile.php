<?php
    require_once 'includes/session.inc.php';
    require_once '../connection/db.inc.php';
    ob_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php
        require_once 'sidebar.php';
        $success_message = '';
        $sql = "SELECT * FROM tbl_student WHERE student_id = $student_id_session;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $middle_name = $row['middle_name'];
            $gender = $row['gender'];
            $birthdate = $row['birthdate'];
            $email = $row['email'];
        }

        if(isset($_POST['edit'])){
            $edit_first_name = $_POST['first_name'];
            $edit_last_name = $_POST['last_name'];
            $edit_middle_name = $_POST['middle_name'];
            $edit_gender = $_POST['gender'];
            $edit_birthdate = $_POST['birthdate'];
            $edit_email = $_POST['email'];

            $edit_sql = "UPDATE tbl_student SET first_name = '$edit_first_name', last_name = '$edit_last_name', middle_name = '$edit_middle_name', gender = '$edit_gender', birthdate = '$edit_birthdate', email = '$edit_email' WHERE student_id = $student_id_session;";
            if($edit_result = mysqli_query($conn, $edit_sql)){
                $success_message = 'Edit successful';
            }else{
                $success_message = 'Edit testetestsetse';

            }
        }

    ?>
        <div class="container mt-5">
            <div class="row">
                <h3 class="mb-3">Profile</h3>
                <div class="bg-white rounded">
                    <h4 class="mt-3 ms-3 mb-5">Edit information</h4>
                    <h5 class="ms-3 text-success"><?= $success_message ?></h3>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label fs-6 ps-2">First Name<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="" value="<?= $first_name ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label fs-6 ps-2">Last Name<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="" value="<?= $last_name ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label fs-6 ps-2">Middle Name<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                    <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="" value="<?= $middle_name ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label fs-6 ps-2">Gender<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                    <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                        <?php
                                            if($gender == 'Male'){
                                                echo '
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                ';
                                            }elseif($gender == 'Female'){
                                                echo '
                                                    <option value="Female" selected>Female</option>
                                                    <option value="Male">Male</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="birthdate" class="form-label fs-6 ps-2">Birthdate<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                    <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="" value="<?= $birthdate ?>" max="2007-12-31" min="1995-12-31" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="email" class="form-label fs-6 ps-2">Email<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?= $email ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12 mb-5">
                                    <button type="submit" name="edit" class="btn btn-warning btn-lg" style="width: 100%;">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
    <?php
        require_once 'scripts.php';
    ?>