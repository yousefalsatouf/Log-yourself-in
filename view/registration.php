<?php
include('../include/public_head.php');
?>
<div class="container py-5 black">
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
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputName">Username: ( * ) </label>
                                    <input type="text" class="form-control" id="inputName" placeholder="full name">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Email: ( * ) </label>
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="email@gmail.com" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3">Password: ( * )</label>
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="password" title="At least 6 characters with letters and numbers" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputVerify3">Verify: ( * ) </label>
                                    <input type="password" class="form-control" id="inputVerify3" placeholder="password (again)" required="">
                                </div>
                                <div class="form-group home">
                                    <span class="octicon-arrow-right"></span>
                                    <button type="submit" class="btn btn-lg float-right"><a href="../index.php">Back</a></button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg float-right">Register</button>
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