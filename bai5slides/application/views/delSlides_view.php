<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.js"></script> 	
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
</head>
<body>
	<div class="container">
 			<div class="text-sm-center">
 				<h3 class="display-3">Danh sách nhân sự</h3>
 			</div>
   
 			<div class="row themajax">
      <?php foreach ($mangdl as $key => $value): ?>
        <div class="card-group col-sm-3" >
            <img class="card-img-top anhavatar" style="height: 200px;"  src="<?= $value['slides_image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title ten"  >Title: <?= $value['title'] ?></h5>
              <p class="card-text tuoi">Mô tả: <small class="badge-success"  ><?= $value['drescription'] ?></small></p>
              <p class="card-text sodonhang">Button link : <small class="badge-success"><?= $value['button_link'] ?></small></p>
              <p class="card-text sdt">Button text: <small class="badge-success"><?= $value['button_text'] ?></small></p>
              
              
              
              <p class="card-text del">
                  
                  <big><a href="<?= base_url() ?>Xoa_Slide/<?= $value['title'] ?>" class="btn btn-danger btn-sm">Del <i class="fas fa-trash-alt"></i></a></big>
              </p>
            </div>
        </div> <!-- end card -->
      <?php endforeach ?>
 				
        
			</div><!-- het row -->
		</div>
</body>
</html>