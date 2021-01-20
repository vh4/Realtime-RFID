
 <?php require_once '../app/index.php'; require_once 'header.php'; if(!isset($_SESSION['login'])){ header("Location:http://localhost/kantor/view/"); }
?>
    <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Welcome to dashboard, you can access anyway want to you doing it .</p>
                  <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">welcome !!!</a>
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <?php if(isset($_SESSION['status'])): ?>
              <?php if( $_SESSION['status'] == 'admin'): ?>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Tickets</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> NIP </th>
                            <th> Email </th>
                            <th> Address </th>
                            <th> Date </th>
                            <th> # </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $x): ?>
                          <tr>
                            <td>
                              <img src="<?=  BASEURL;  ?>/assets/images/<?= $x['foto']; ?> " class="mr-2" alt="image"><a style="text-decoration: none;color: inherit;" href="profile.php?id=<?= $x['register_id']; ?>"><?= $x['nama']; ?></a> 
                            </td>
                            <td><?= $x['nip']; ?> </td>
                            <td>
                            <?= $x['email']; ?>
                            </td>
                            <td><?= $x['alamat']; ?></td>
                            <td><?= date("d M, Y", strtotime($x['created_at'])); ?> </td>
                            <td>
                              <a><button id="ubahdata" class="btn badge-gradient-warning" data-toggle="modal" data-id="<?= $x['register_id']; ?>" 
                              data-nama="<?= $x['nama']; ?>" data-email="<?= $x['email']; ?>" data-nip="<?= $x['nip']; ?>" data-alamat="<?= $x['alamat']; ?>" data-foto="<?= $x['foto']; ?>"  
                              data-target="#exampleModalCenter">Edite</button></a>
                              <a href=""><button class="btn badge-gradient-danger">Delete</button></a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <div class="container">
                      <ul class="pagination d-flex justify-content-center">
                      <?php
                       $halaman_active = (int) (isset($_GET['page'])) ? $_GET['page'] : 1;

                      if($halaman_active >= 1): ?>
                      <li class="page-item"><a class="page-link" href="dashboard.php?page=<?= $halaman_active - 1; ?>">Previous</a></li>
                      <?php endif; ?>

                      <?php for($i =1; $i <= $jumlahdata;$i++): ?>
                      <?php 
                        if($i == $halaman_active): ?>
                          <li class="page-item active"><a class="page-link" href="dashboard.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else: ?>
                          <li class="page-item"><a class="page-link" href="dashboard.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php endif; ?>
                      <?php endfor; ?>

                      <?php if($halaman_active < $jumlahdata) : ?>
                      <li class="page-item"><a class="page-link" href="dashboard.php?page=<?= $halaman_active + 1; ?>">Next</a></li>
                      <?php endif; ?>
                      </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background-color: white;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edite Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_edit" class="form-control" id="Id" placeholder="Id"> </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="nama_edit" class="form-control" id="Nama" placeholder="Nama"> </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email_edit" class="form-control" id="Email" placeholder="Email"> </div>
                    <div class="form-group">
                        <label for="NIP">NIP</label>
                        <input type="text" name="nip_edit" class="form-control" id="NIP" placeholder="NIP"> </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" name="alamat_edit" class="form-control" id="Alamat" placeholder="Alamat"> </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit_edit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>


<div class="container">
<div class="row"></div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Card Name</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal</th>
    </tr>
  </thead>
  <tbody id="getdata">
  </tbody>
</table>
</div>
</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Tony Template 2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> PT. Anak baik indonesia LTT</a></span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<!-- container-scroller -->
<script>
    $(document).on('click', '#ubahdata', function(){

      var id = $(this).data('id');
      var nama = $(this).data('nama');
      var email = $(this).data('email');
      var nip = $(this).data('nip');
      var alamat = $(this).data('alamat');
      var foto = $(this).data('foto');

      $('.modal-body #Nama').val(nama);
      $('.modal-body #NIP').val(nip);
      $('.modal-body #Email').val(email);
      $('.modal-body #Alamat').val(alamat);
      $('.modal-body #Id').val(id);

    })


$(document).ready(function(){

function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 10);
}
 
     function update(){
	$.getJSON("api/fetch.php", function(data) {
    $("#getdata").empty();
    
    $('#count').html(data.count);
		var no = 1;
		$.each(data.result, function() {
			$("#getdata").append("<tr><td>"+(no++)+"</td><td>"+this['nama']+"</td><td>"+this['card_number']+"</td><td>"+this['value']+"</td><td>"+this['tanggal']+"</td></tr>");
		});
	});
        
 }
selesai();

});

</script>

<?php
require 'footer.php';
?>