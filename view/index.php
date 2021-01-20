<?php
require_once '../app/index.php';
require '../public/config.php'; 
?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=  BASEURL;  ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=  BASEURL;  ?>/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=  BASEURL;  ?>/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=  BASEURL;  ?>/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                </div>
                <h1 class="font-weight-light">Login</h1>
                <p>
                <form method="post" class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email_login" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password_login" placeholder="Password">
                  </div>
                  <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                  <div class="mt-3">
                   <button type="submit" name="submit_login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=  BASEURL;  ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=  BASEURL;  ?>/assets/js/off-canvas.js"></script>
    <script src="<?=  BASEURL;  ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?=  BASEURL;  ?>/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>