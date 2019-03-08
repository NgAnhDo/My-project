<!DOCTYPE html>
<html lang="en"><head>
  <title> Giao diện hiển thị danh sách nhân sự </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
    <div class="container">
     
      <div class="text-sm-center">
        <h3 class="display-3">Chỉnh sửa nhân sự</h3>
      </div>
    
      
    <?php foreach ($dulieu_nv as $key => $value): ?>
          <form action="<?= base_url()?>index.php/nhansu/update_nhansu" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="" class="col-sm-4 text-sm-right">Đổi ảnh đại diện</label>
                <div class="col-sm-4">
                  <img src="<?= $value['anhavatar'] ?>" style="width: 300px;height: 200px" alt="" class="anhdd">
                  <input type="hidden" name="id" value="<?= $value['id'] ?>">
                  <input type="hidden" name="anhavatar2" value="<?= $value['anhavatar'] ?>">
                  <input type="file" name="anhavatar" class="form-control-file " id="anhavatar" >
                </div>
            </div>
            <div class="form-group row">
                <label for="ten" class="col-sm-4 col-form-label text-sm-right">Họ và Tên</label>
                <div class="col-sm-4">
                  <input type="text" name="ten" class="form-control" id="ten" placeholder="Nhập tên" required value="<?= $value['ten'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tuoi" class="col-sm-4 col-form-label text-sm-right">Tuổi</label>
                <div class="col-sm-4">
                  <input type="numble" name="tuoi" class="form-control " id="tuoi" placeholder="Nhập tuổi" value="<?= $value['tuoi'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="sdt" class="col-sm-4 col-form-label text-sm-right">SDT</label>
                <div class="col-sm-4">
                  <input type="numble" name="sdt" class="form-control " id="sdt" placeholder="Nhập SDT" value="<?= $value['sdt'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="linkfb" class="col-sm-4 col-form-label text-sm-right">LinkFB</label>
                <div class="col-sm-4">
                  <input type="text" name="linkfb" class="form-control " id="linkfb" placeholder="Nhập LinkFB" value="<?= $value['linkfb'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="sodonhang" class="col-sm-4 col-form-label text-sm-right">Số đơn hàng</label>
                <div class="col-sm-4">
                  <input type="numble" name="sodonhang" class="form-control" id="sodonhang" placeholder="Nhập số đơn hàng" value="<?= $value['sodonhang'] ?>">
                </div>
            </div>
            <div class="form-group row ">
                <div class="m-auto">
                  <button type="submit" class="btn btn-outline-primary ">Hoàn Thành</button>
                  <a type="submit" href="<?php echo base_url()?>/index.php/nhansu" class="btn btn-outline-danger ">Trở Về</a>
               </div>
            </div>
         
          </form> <!-- end form -->
    <?php endforeach ?>
          
     </div> <!-- end container -->
</body>
</html>