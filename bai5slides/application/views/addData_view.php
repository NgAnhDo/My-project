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
					<h3 class="text-sm-center"> Thêm Sildes mới</h3>
					<hr>
					<form method="post" action="Slides/addSlides" enctype="multipart/form-data">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tiêu đề Slides</label>
							<input name='title' type="text" class="form-control" id="title" placeholder="Tiêu đề">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Mô tả Slides</label>
							<input name="drescription" type="text" class="form-control" id="drescription" placeholder="Mô tả">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Link của nút</label>
							<input name="button_link" type="text" class="form-control" id="button_link" placeholder="Link của nút">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Text của nút</label>
							<input name="button_text" type="text" class="form-control" id="button_text" placeholder="Text của nút">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">upload Ảnh</label>
							<input name="slides_image" type="file" class="form-control" id="slides_image" >
						</fieldset>
						<fieldset class="form-group">
							
							<input type="submit" class="form-control btn-info" id="submit" value="Thêm" >
						</fieldset>
					</form>
				</div>
		</div><!-- end row -->
	</div><!-- end container -->

</body>
</html>