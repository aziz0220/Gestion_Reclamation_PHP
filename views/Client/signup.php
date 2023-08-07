<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <?php include 'views/Client/include/head.php'; ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <p><?php echo $sys->sys_name; ?> - Sign Up</p>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign Up To Use Our IBanking System</p>

            <form method="post" action="Client.php?page=create">
                <div class="input-group mb-3">
                    <input type="text" name="Nom" required class="form-control" placeholder="Client Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="Prenom" required class="form-control" placeholder="Client Family Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" required name="national_id" class="form-control" placeholder="National ID Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-tag"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3" style="display:none">
                    <input type="text" name="client_number" value="STB-CLIENT-<?php echo $_Number; ?>" class="form-control" placeholder="Client Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="phone" required class="form-control" placeholder="Client Phone Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="address" required class="form-control" placeholder="Client Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map-marker"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" required class="form-control" placeholder="Client Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" name="create_account" class="btn btn-success btn-block">Sign Up</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-0">
                <a href="client.php?page=login" class="text-center">Login</a>
            </p>
        </div>
    </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>

</html>