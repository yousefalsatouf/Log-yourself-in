<?php
include('../include/public_head.php');
include '../controllers/registerManagement.php';
?>
<div class="container py-5 black">
    <?php
    /*if (!empty($email_gone)) {
        echo "<div class=\"alert-success\" role=\"alert\"><h3 class='missingfield'> <b>Alert:</b> " . $email_gone . "!</h3></div>";
    }
    if (!empty($email_isnot_gone)) {
        echo "<div class=\"alert-danger\" role=\"alert\"><h3 class='missingfield'> <b>Alert:</b> " . $email_not_gone . "!</h3></div>";
    }*/
    ?>
    <div class="alert <?php echo !empty($class_alert)? $class_alert : ""; ?>" role="alert">
        <?php
        if (!empty($show_msg)) {
            echo "<h6 class='red missingfield'><b>Alert:</b> " . $show_msg . "!</h6>";
        }
        ?>
    </div>
    <div class="row contianer">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Register Yourself In !</h2>
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 my-2">Sign Up</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" method="POST" action="../controllers/registerManagement.php">
                                <div class="form-group">
                                    <label for="inputName">Username: <span style="color:red;">**</span></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username">
                                    <span>
                                        <?php
                                        if (!empty($fieldUsername)) {
                                            echo "<p class='text-danger'>" . $fieldUsername . "</p>";
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Email: <span style="color:red;">**</span></label>
                                    <input type="email" class="form-control" id="email" name="rg-mail" placeholder="email@gmail.com">
                                    <span>
                                        <?php
                                        if (!empty($fieldEmail)) {
                                            echo "<p class='text-danger'>" . $fieldEmail . "</p>";
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3">Password: <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" id="password" placeholder="rg-password" name="password" title="At least 6 characters with letters and numbers">
                                    <span>
                                        <?php
                                        if (!empty($fieldPassword)) {
                                            echo "<p class='text-danger'>" . $fieldPassword . "</p>";
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputVerify3">Verify: <span style="color:red;">**</span></label>
                                    <input type="password" class="form-control" id="verify" name="verify" placeholder="password (again)">
                                </div>
                                <div class="form-group home">
                                    <button type="submit" class="btn btn-lg float-right"><a href="../index.php">Back</a></button>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg float-right" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
<?php
include('../include/public_layout.php');
?>