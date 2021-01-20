<?php require_once 'app/index.php'; require 'public/config.php'; ?>
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
                <h1 class="font-weight-light">Register For User</h1>
                <p>
                <form method="post" class="pt-3" enctype="multipart/form-data"> 
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="nip" name="nip" placeholder="NIP">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="alamat" name="alamat" placeholder="alamat">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="konfirmasi" name="password_konfirmasi" placeholder="Password konfirmasi">
                  </div>
                  <div class="mt-3">
                    <input type="file"  id="gambar" name="gambar" placeholder="gambar">
                  </div>
                  <div class="mt-3">
                   <button type="submit" name="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Sign Up</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Apakah sudah mempunyai accoun ? <a href="view/" class="text-primary">Login</a>
                  </div>
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
</html>
