    <!DOCTYPE html>
    <html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= $sys->sys_name; ?> - <?= $sys->sys_tagline; ?></title>
        <link href="dist/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="dist/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="dist/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="dist/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="dist/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="dist/css/robust.css" rel="stylesheet">
        <link href="src/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
            <div class="container">
                <a class="navbar-brand" href="index.php"><?= $sys->sys_name; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link"  href="Admin.php?page=login">Admin</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="staff.php?page=login">Staff</a>
                        </li>
                        <li class="nav-item active">
                            <a class="btn btn-danger" href="Client.php?page=login">Client</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url(dist/img/digital-banking.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown"><span><?= $sys->sys_name; ?></span></h2>
              <p class="animate__animated animate__fadeInUp">             <?= $sys->sys_tagline; ?></p>
                <a href="Client.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
 <div class="clients  ">
                    <img src="src/bfi_logo.svg"  class="img-fluid" alt="">
                    </div>
              </div>
            </div>
          </div>
             <div class="carousel-item active" style="background-image: url(dist/img/banking.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown"><span><?= $sys->sys_name; ?></span></h2>
              <p class="animate__animated animate__fadeInUp">             <?= $sys->sys_tagline; ?></p>
                <a href="Client.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
 <div class="clients  ">
                    <img src="src/bfi_logo.svg" class="img-fluid" alt="">
                    </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </section>
        <script src="dist/js/bundle.js"></script>
        <script src="dist/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="dist/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="dist/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="dist/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="dist/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="dist/vendor/php-email-form/validate.js"></script>
        <script src="dist/js/main.js"></script>
    </body>
    </html>
