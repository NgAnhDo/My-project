<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện hiển thị danh sách nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>jqueryupload/js/jquery.fileupload.js"></script>
  
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
 
</head>
<body >
 		<div class="container">
 			<div class="text-sm-center">
 				<h3 class="display-3">Danh sách nhân sự</h3>
 			</div>
   
 			<div class="row themajax">
      <?php foreach ($mangketqua as $key => $value): ?>
        <div class="card-group col-sm-3" >
            <img class="card-img-top anhavatar" style="height: 200px;"  src="<?= $value['anhavatar'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title ten"  ><?= $value['ten'] ?></h5>
              <p class="card-text tuoi">Tuổi: <small class="badge-success"  ><?= $value['tuoi'] ?></small></p>
              <p class="card-text sdt">SDT: <small class="badge-success"><?= $value['sdt'] ?></small></p>
              
              <p class="card-text sodonhang">Số đơn hàng : <small class="badge-success"><?= $value['sodonhang'] ?></small></p>
              <p class="card-text linkfb"><small><a href="<?= $value['linkfb'] ?>" class="btn btn-info btn-sm">facebook <i class="fa fa-chevron-right"></i></a></small></p> 
              <p class="card-text edit">
                  <big><a href="<?= base_url() ?>/index.php/nhansu/edit_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-sm">Edit <i class="fas fa-pencil-alt"></i></a></big>
                  <big><a href="<?= base_url() ?>/index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-danger btn-sm">Del <i class="fas fa-trash-alt"></i></a></big>
              </p>
            </div>
        </div> <!-- end card -->
      <?php endforeach ?>
 				
        
			</div><!-- het row -->
      
      <div class="text-sm-center">
        <h3 class="display-3">Thêm mới nhân sự</h3>
      </div>
    
      <div class="row">
        <div class="col-sm-2"></div>
       
        <div class="col-sm-2"></div>
      </div>

<!--           <form action="<?= base_url()?>index.php/nhansu/nhansu_add" method="post" enctype="multipart/form-data"> -->
            <div class="form-group row">
                <label for="anhavatar" class="col-sm-4 text-sm-right">Thêm ảnh đại diện</label>
                <div class="col-sm-4">
                  <input type="file" name="files[]" class="form-control-file " id="anhavatar" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="ten" class="col-sm-4 col-form-label text-sm-right">Họ và Tên</label>
                <div class="col-sm-4">
                  <input type="text" name="ten" class="form-control" id="ten" placeholder="Nhập tên" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tuoi" class="col-sm-4 col-form-label text-sm-right">Tuổi</label>
                <div class="col-sm-4">
                  <input type="numble" name="tuoi" class="form-control " id="tuoi" placeholder="Nhập tuổi">
                </div>
            </div>
            <div class="form-group row">
                <label for="sdt" class="col-sm-4 col-form-label text-sm-right">SDT</label>
                <div class="col-sm-4">
                  <input type="numble" name="sdt" class="form-control " id="sdt" placeholder="Nhập SDT">
                </div>
            </div>
            <div class="form-group row">
                <label for="linkfb" class="col-sm-4 col-form-label text-sm-right">LinkFB</label>
                <div class="col-sm-4">
                  <input type="text" name="linkfb" class="form-control " id="linkfb" placeholder="Nhập LinkFB">
                </div>
            </div>
            <div class="form-group row">
                <label for="sodonhang" class="col-sm-4 col-form-label text-sm-right">Số đơn hàng</label>
                <div class="col-sm-4">
                  <input type="numble" name="sodonhang" class="form-control" id="sodonhang" placeholder="Nhập số đơn hàng">
                </div>
            </div>
            <div class="form-group row ">
                <div class="m-auto">
                  <button type="button" class="btn btn-outline-primary nut_xl_ajax">Thêm mới bằng Ajax</button>
                  <button type="reset" class="btn btn-outline-danger ">Nhập Lại</button>
               </div>
            </div>
         
         <!--  </form> end form -->
     </div> <!-- end container -->
     <div>
       <script>
        duongdan='<?php echo base_url() ?>';
        $('#anhavatar').fileupload({
        url: duongdan+'index.php/nhansu/uploadfile',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                tenfile=file.url;
            });
        }
      })

        $(".nut_xl_ajax").click(function(event) {
          $.ajax({
           url: 'nhansu/ajax_add',
           type: 'POST',
           dataType: 'json',
           data: {
              ten:$("#ten").val(),
              tuoi:$("#tuoi").val(),
              sdt:$("#sdt").val(),
              anhavatar:tenfile,
              linkfb:$("#linkfb").val(),
              sodonhang:$("#sodonhang").val(),
              
           },
         })
         .done(function() {
           console.log("success");
         })
         .fail(function() {
           console.log("error");
         })
         .always(function() {
           console.log("complete");
             noidung='<div class="card-group col-sm-3" >';
         noidung+='<img class="card-img-top anhavatar" style="height: 200px;" src="'+tenfile+'" alt="Card image cap">';
         noidung+='<div class="card-body">';
         noidung+=' <h5 class="card-title ten"  >'+$("#ten").val()+'</h5>';
         noidung+=' <p class="card-text tuoi">Tuổi: <small class="badge-success"  >'+$("#tuoi").val()+'</small></p>';
         noidung+='<p class="card-text sdt">SDT: <small class="badge-success">'+$("#sdt").val()+'</small></p>';
         noidung+=' <p class="card-text sodonhang">Số đơn hàng : <small class="badge-success">'+$("#sodonhang").val()+'</small></p>';
         noidung+='  <p class="card-text linkfb"><small><a href="'+$("#linkfb").val()+'" class="btn btn-info btn-sm">facebook <i class="fa fa-chevron-right"></i></a></small></p> ';
         noidung+='<p class="card-text edit">';
         noidung+='<big><a href="<?= base_url() ?>/index.php/nhansu/edit_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-sm">Edit <i class="fas fa-pencil-alt"></i></a></big>';
         noidung+=' <big><a href="<?= base_url() ?>/index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-danger btn-sm">Del <i class="fas fa-trash-alt"></i></a></big>';
         noidung+='  </p>';
         noidung+=' </div>';
         noidung+=' </div> <!-- end card -->';
         $(".themajax").append(noidung);
            $("#ten").val('');
            $("#tuoi").val('');
            $("#sdt").val('');
            $("#linkfb").val('');
            $("#sodonhang").val('');
         });
       
          /* Act on the event */
        });
         
         
       </script>
     </div>
</body>
</html>