<?php
    require_once '../connection/db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php
        require_once 'sidebar.php';
    ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center bg-success ms-5" style="width: 18rem;">
                        <div class="card-body">
                            <a href="student.php?grade=7" class="text-decoration-none text-dark"><h5 class="card-title mb-3">Grade 7</h5></a>
                            <span class="fs-1 mb-5"><i class="fa fa-file-text"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center bg-warning ms-5" style="width: 18rem;">
                        <div class="card-body">
                            <a href="student.php?grade=8" class="text-decoration-none text-dark"><h5 class="card-title mb-3">Grade 8</h5></a>
                            <span class="fs-1 mb-5"><i class="fa fa-file-text"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center bg-danger ms-5" style="width: 18rem;">
                        <div class="card-body">
                            <a href="student.php?grade=9" class="text-decoration-none text-dark"><h5 class="card-title mb-3">Grade 9</h5></a>
                            <span class="fs-1 mb-5"><i class="fa fa-file-text"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center bg-primary ms-5" style="width: 18rem;">
                        <div class="card-body">
                            <a href="student.php?grade=10" class="text-decoration-none text-dark"><h5 class="card-title mb-3">Grade 10</h5></a>
                            <span class="fs-1 mb-5"><i class="fa fa-file-text"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        require_once 'scripts.php';
    ?>