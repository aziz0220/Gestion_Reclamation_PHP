 <!DOCTYPE html>
  <html>
 <head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <?php  include_once 'views/Staff/layout.php'; ?>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <p><?php echo $sys->sys_name; ?></p>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Log In To Start Staff Session</p>

          <form method="post" action="staff.php?page=submit">
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" name="login" class="btn btn-success btn-block">Log In</button>
              </div>

            </div>
          </form>

          <p class="mb-1">
            <a href="index.php" class="btn btn-secondary">Retour à l'accueil</a>
          </p>

        </div>
      </div>
    </div>


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>

  </body>

  </html>

