<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sua tin</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script> 
	<script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script> 
</head>
<body>
	<?php include 'header_view.php' ?>
	<div class="container">
		<div class="col-sm-10">
				<div class="jumbotron">
							<h1 class="display-3">Them moi tin</h1>
							<p class="lead">Them moi tin</p>
							
						</div>
						<div class="formthemmoi">
							<form method="post" action="<?php echo base_url() ?>tin/updateTin" enctype="multipart/form-data">
								<?php foreach ($suamangtintuc as $value): ?>
									
								<input type="hidden" name="id" value="<?= $value['id'] ?>">
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Tieu de tin</label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="tieude" value="<?= $value['tieude'] ?>">
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Anh tin</label>
									<img src="<?= $value['anhtin'] ?>" alt="" class='img-fluid' style='width: 400px;height: 200px'>
									<input type="hidden" class="form-control" id="anhtincu" name="anhtincu" value="<?= $value['anhtin'] ?>" >
									<input type="file" class="form-control" id="anhtin" name="anhtin" >
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Trich dan</label>
									<textarea type="text" class="form-control" id="trichdan" name="trichdan"  ><?= $value['trichdan'] ?></textarea>
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Id danh muc</label>
									
										<select  class="form-control" id="iddanhmuc" name="iddanhmuc" ">
											
											
											<?php foreach ($mangdulieu as $value1): ?>
												<?php if($value1['id']==$value['iddanhmuc']){ ?>
												<option value="<?= $value['iddanhmuc'] ?>" selected>
													<?= $mangtendm ?>
												</option>
											<?php }
											else{ ?>
												<option value="<?= $value1['id'] ?>" >
													<?= $value1['tendanhmuc'] ?>
												</option>
											<?php } ?>
											<?php endforeach ?>
											
											
											
											
										</select>
									
									
								</fieldset>
								<fieldset class="form-group">
									<label for="formGroupExampleInput">Noi dung tin</label>
									<textarea  type="text" class="form-control" class="noidungtin" id="noidungtin" name="noidungtin" cols="30" rows="10" ><?= $value['noidungtin'] ?></textarea>
								</fieldset>
								<fieldset class="form-group">
									<input type="submit" name="" value="Sữa Tin">
									<a href="<?php echo base_url() ?>tin/xoaTin/<?= $value['id'] ?>" class="btn btn-danger">Xóa</a>
								</fieldset>
								<?php endforeach ?>
							</form>
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