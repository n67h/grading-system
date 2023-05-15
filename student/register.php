<?php
    require_once '../connection/db.inc.php';
    require_once 'includes/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- font-awesome cdn -->
    <script src="https://kit.fontawesome.com/3481525a72.js" crossorigin="anonymous"></script>
    <!-- latest bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css?<?php echo time();?>" />
</head>
<body>
    <?php
        $first_name_error = ' *';
        $last_name_error = ' *';
        $lrn_error = ' *';
        $birthdate_error = ' *';
        $email_error = ' *';
        $password_error = ' *';
        $repeat_password_error = ' *';

        $first_name_value = '';
        $last_name_value = '';
        $middle_name_value = '';
        $year_level_value = '';
        $lrn_value = '';
        $gender_value = '';
        $birthdate_value = '';
        $email_value = '';
        $password_value = '';
        $repeat_password_value = '';

        $first_name_success = '';
        $last_name_success = '';
        $middle_name_success = '';
        $year_level_success = '';
        $lrn_success = '';
        $gender_success = '';
        $birthdate_success = '';
        $email_success = '';
        $password_success = '';
        $repeat_password_success = '';

        if(isset($_POST['register'])){
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
            $year_level = mysqli_real_escape_string($conn, $_POST['year_level']);
            $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $repeat_password = mysqli_real_escape_string($conn, $_POST['repeat_password']);

            // validate first name
            if(firstnameEmpty($first_name) !== false) {
                $first_name_error = ' *This field is required.';
            } else {
                if(firstnameInvalid($first_name) !== false) {
                    $first_name_error = ' *Invalid first name.';
                } else {
                    $first_name_error = '';
                    $first_name_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $first_name_value = $first_name;
                }
            }

            //validate last name
            if(lastnameEmpty($last_name) !== false) {
                $last_name_error = ' *This field is required.';
            } else {
                if(lastnameInvalid($last_name) !== false) {
                    $last_name_error = ' *Invalid last name.';
                } else {
                    $last_name_error = '';
                    $last_name_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $last_name_value = $last_name;
                }
            }

            if(!empty($middle_name)){
                $middle_name_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                $middle_name_value = $middle_name;
            }
            //validate lrn
            if(lrnEmpty($lrn) !== false) {
                $lrn_error = ' *This field is required.';
            } else {
                if(lrnInvalid($lrn) !== false) {
                    $lrn_error = ' *Invalid LRN.';
                } else {
                    $lrn_error = '';
                    $lrn_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $lrn_value = $lrn;
                }
            }

            //validate birthdate
            if(birthdateEmpty($birthdate) !== false) {
                $birthdate_error = ' *This field is required.';
            } else {
                if(birthdateInvalid($birthdate) !== false) {
                    $birthdate_error = ' *Invalid birthdate.';
                } else {
                    $birthdate_error = '';
                    $birthdate_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $birthdate_value = $birthdate;
                }
            }

            //validate email
            if(emailEmpty($email) !== false) {
                $email_error = ' *This field is required.';
            } else {
                if(emailInvalid($email) !== false) {
                    $email_error = ' *Invalid email.';
                } elseif(emailExists($conn, $email) !== false) {
                    $email_error = ' *Email is already taken.';
                } else {
                    $email_error = '';
                    $email_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $email_value = $email;
                }
            }

            //validate password
            if(passwordEmpty($password) !== false) {
                $password_error = ' *This field is required';
            } else {
                if(passwordInvalid($password)  !== false) {
                    $password_error = ' *Password must be  8 to 16 characters only.';
                } else {
                    $password_error = '';
                    $password_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $password_value = $password;
                }
            }

            //validate repeat password
            if(passwordRepeatEmpty($repeat_password) !== false) {
                $repeat_password_error = ' *This field is required.';
            } else {
                if(passwordRepeatInvalid($repeat_password) !== false) {
                    $repeat_password_error = ' *Password must be 8 to 16 characters only.';
                } elseif(passwordMatch($password, $repeat_password) !== false) {
                    $repeat_password_error = ' *Password does not match.';
                } else {
                    $repeat_password_error = '';
                    $repeat_password_success = ' <i class="fa-sharp fa-solid fa-circle-check"></i>';
                    $repeat_password_value = $repeat_password;
                }
            }

            //generate random verification key
            $vkey = md5(time());
            // if all the inputs are valid, then create the account for user and send email to verify their account
            if(!empty($first_name) && !empty($last_name) && !empty($lrn) && !empty($birthdate) && !empty($email) && !empty($password) && !empty($repeat_password) && firstnameInvalid($first_name) === false && lastnameInvalid($last_name) === false && emailInvalid($email) === false && emailExists($conn, $email) === false && passwordInvalid($password) === false && passwordRepeatInvalid($repeat_password) === false && passwordMatch($password, $repeat_password) === false && $vkey != "") {
                createUser($conn, $year_level, $lrn, $first_name, $last_name, $middle_name, $gender, $birthdate, $email, $password, $vkey);

                header('location: register.php?register=success');
                die();
                
            }
        }
    ?>
    <div class="row mt-5 pt-5">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 bg-secondary rounded ps-5 pe-5 ms-5 me-5">
            <h3 class="text-center text-dark mt-5 pt-5">Register</h3>
            <?php
                $success_message = '';
                if(isset($_GET['register'])){
                    if($_GET['register'] == 'success'){
                        $success_message = 'Successfully registered';
                    }
                }
            ?>
            <h4 class="text-center text-success"><?= $success_message; ?></h4>
            <form action="" method="post">
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label fs-6 ps-2">First Name<span class="text-danger fs-6"><?= $first_name_error ?></span><span class="text-success fs-5"><?= $first_name_success ?></span></label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="" value="<?= $first_name_value ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label fs-6 ps-2">Last Name<span class="text-danger fs-6"><?= $last_name_error ?></span><span class="text-success fs-5"><?= $last_name_success ?></span></label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="" value="<?= $last_name_value ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="middle_name" class="form-label fs-6 ps-2">Middle Name<span class="text-danger fs-6"></span><span class="text-success fs-5"><?= $middle_name_success ?></span></label>
                            <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="" value="<?= $middle_name_value ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="year_level" class="form-label fs-6 ps-2">Year Level<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                            <select class="form-select" name="year_level" id="year_level" aria-label="Default select example">
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
                </div>
                
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="lrn" class="form-label fs-6 ps-2">LRN<span class="text-danger fs-6"><?= $lrn_error ?></span><span class="text-success fs-5"><?= $lrn_success ?></span></label>
                            <input type="number" name="lrn" class="form-control" id="lrn" placeholder="" value="<?= $lrn_value ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="gender" class="form-label fs-6 ps-2">Gender<span class="text-danger fs-6"></span><span class="text-success fs-5"></span></label>
                            <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-1">
                    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="birthdate" class="form-label fs-6 ps-2">Birthdate<span class="text-danger fs-6"><?= $birthdate_error ?></span><span class="text-success fs-5"><?= $birthdate_success ?></span></label>
                            <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="" value="<?= $birthdate_value ?>" max="2007-12-31" min="1995-12-31">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="email" class="form-label fs-6 ps-2">Email<span class="text-danger fs-6"><?= $email_error ?></span><span class="text-success fs-5"><?= $email_success ?></span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?= $email_value ?>">
                        </div>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="password" class="form-label fs-6 ps-2">Password<span class="text-danger fs-6"><?= $password_error ?></span><span class="text-success fs-5"><?= $password_success ?></span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="" value="<?= $password_value ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="repeat_password" class="form-label fs-6 ps-2">Confirm Password<span class="text-danger fs-6"><?= $repeat_password_error ?></span><span class="text-success fs-5"><?= $repeat_password_success ?></span></label>
                            <input type="password" name="repeat_password" class="form-control" id="repeat_password" placeholder="" value="<?= $repeat_password_value ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-sm-12 mb-5">
                        <button type="submit" name="register" class="btn btn-warning btn-lg" style="width: 100%;">Register</button>
                        <p class="teste" style="">TEST</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>

    <!-- latest bootstrap js popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <!-- latest bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>