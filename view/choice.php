<?php
include ('include/public_head.php');
?>
    <div class="container py-5 black">
        <div class="row contianer">
            <div class="col-md-12">
                <h2 class="text-center mb-5">what you gonna do ?</h2>
                <div class="container">
                    <div class="col-md-6 mx-auto">
                        <div class="card border-secondary">
                            <div class="card-header">
                                <h3 class="mb-0 my-2">HOME</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off">
                                    <div class="form-group home">
                                        <span class="octicon-arrow-right"></span>
                                        <button type="submit" class="btn btn-lg float-right"><a href="view/register.php">Registration</a></button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg float-right"><a href="view/login.php">Log In</a></button>
                                        <span class="octicon-arrow-right"></span>
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
include ('include/public_layout.php');
?>