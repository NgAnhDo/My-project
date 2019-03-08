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
		<div class="row">
			<div class="col-sm-6">
					<h3 class="text-sm-center"> Sửa Sildes mới</h3>
					<hr>
					<?php $dem=0 ?>
					<form method="post" action="Do_edit/editSlide" enctype="multipart/form-data">
						<?php foreach ($mangdl as $key => $value): ?>
						<?php $dem++ ?>
						<h3> Slide so <?= $dem ?></h3>
						<hr>	
						
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tiêu đề Slides</label>
							<input name='title[]' type="text" class="form-control" id="title" placeholder="Tiêu đề" value="<?= $value['title'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Mô tả Slides</label>
							<input name="drescription[]" type="text" class="form-control" id="drescription" placeholder="Mô tả" value="<?= $value['drescription'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Link của nút</label>
							<input name="button_link[]" type="text" class="form-control" id="button_link" placeholder="Link của nút" value="<?= $value['button_link'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Text của nút</label>
							<input name="button_text[]" type="text" class="form-control" id="button_text" placeholder="Text của nút" value="<?= $value['button_text'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">upload Ảnh</label>
							<img src="<?= $value['slides_image'] ?>" alt="" width='40%'  >
							<input name="slides_image_old[]" type="hidden" class="form-control" id="slides_image" value="<?= $value['slides_image'] ?>" >
							<input name="slides_image[]" type="file" class="form-control" id="slides_image" >
						</fieldset>
						<?php endforeach ?>
						<fieldset class="form-group">
							
							<input type="submit" class="form-control btn-info" id="submit" value="Sửa" >
						</fieldset>

					</form>
				</div>
		</div><!-- end row -->
	</div><!-- end container -->

</body>
</html>