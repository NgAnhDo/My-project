<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script> 
	<script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script> 
</head>
<body>
	<?php include 'header_view.php' ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 themmoi">
				<div class="jumbotron">
							<h1 class="display-3">Them moi tin</h1>
							<p class="lead">Them moi tin</p>
							
						</div>
						<div class="formthemmoi">
							<form method="post" action="<?php echo base_url() ?>tin/themmoitin" enctype="multipart/form-data">
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Tieu de tin</label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="tieude" placeholder="Tieu de tin">
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Anh tin</label>
									<input type="file" class="form-control" id="anhtin" name="anhtin" >
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Trich dan</label>
									<textarea type="text" class="form-control" id="trichdan" name="trichdan" ></textarea>
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Danh muc tin</label>
									
										<select  class="form-control" id="iddanhmuc" name="iddanhmuc" ">
											<?php foreach ($mangkq as $value): ?>
											<option value="<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></option>
											<?php endforeach ?>
										</select>
									
									
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Noi dung tin</label>
									<textarea  type="text" class="form-control" class="noidungtin" id="noidungtin" name="noidungtin" cols="30" rows="10"></textarea>
								</fieldset>
								<fieldset class="form-group">
									<input type="submit" name="" value="themmoi">

								</fieldset>
							</form>
						</div>
			</div>
			<div class="col-sm-6 danhsach">
						<div class="jumbotron">
							<h1 class="display-3">Danh sach tin</h1>
							<p class="lead">Danh sach tin</p>
							
						</div>
						<div class="row">
							<div class="card-group">
								<?php foreach ($mangtintuc as $value): ?>
									
								
								<div class="col-sm-4">
									<div class="card">
										<?php
											if(empty($value['anhtin'])){?>
									<img class="card-img-top img-fluid" src="https://via.placeholder.com/700x400" alt="Card image cap">
								
								 <?php }
								 else{?>
									<img class="card-img-top img-fluid" src="<?= $value['anhtin'] ?>" alt="Card image cap">
								<?php } ?>
									<div class="card-block">
									<h4 class="card-title"><?= $value['tieude'] ?></h4>
									<p class="card-text"><?= $value['trichdan'] ?></p>
									<a href="<?php echo base_url() ?>tin/suaTin/<?= $value['id'] ?>" class="btn btn-success">Sửa</a>
									<a href="<?php echo base_url() ?>tin/xoaTin/<?= $value['id'] ?>" class="btn btn-danger">Xóa</a>
									
									</div>
								</div>
								</div>

							<?php endforeach ?>
							
							
						</div>
						</div>
						
			</div>
		</div>
	</div>
	<script>
		CKEDITOR.replace( 'noidungtin', {
		    filebrowserBrowseUrl: '<?= base_url() ?>'+'/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl:  '<?= base_url() ?>'+'/ckfinder/ckfinder.html?Type=Images',});
	</script>
</body>
</html>