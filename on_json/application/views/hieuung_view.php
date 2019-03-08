<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <script type="text/javascript" src="<?php //echo base_url() ?>js/bootstrap.min.js"></script>  -->	
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
</head>
<body>
	<?php include'menu_view.php' ?>
	<hr>
	<div class="container">
		<h2 class="text-sm-center">Thêm Dữ Liệu</h2>
	<form  method="post" action="Xuly/addData" enctype="multipart/form-data">
		<div class="form-group">
		    <label >Title</label>
		    <input name="title" type="text" class="form-control" id="title"  placeholder="Thêm tiêu đề">
  		</div>
  		<div class="form-group">
		    <label >Text</label>
		    <input name="text" type="text" class="form-control" id="text"  placeholder="Thêm nội dung">
  		</div>
  		<div class="form-group">
		    <label >Link Button</label>
		    <input name='link_button' type="text" class="form-control" id="link_button"  placeholder="Thêm Link Button">
  		</div>
  		<div class="form-group">
		    <label >Text Button</label>
		    <input name='text_button' type="text" class="form-control" id="text_button"  placeholder="Thêm Text Button">
  		</div>
  		<div class="form-group">
		    <label >Upload Ảnh</label>
		    <input name="upload_img" type="file" class="form-control" id="upload_img" >
  		</div>
  		<div class="form-group">
		    
		   <input type="submit" class="form-control btn-success" id="submit" value="Thêm"  >
  		</div>
	</form>
	</div>	
	
</body>
</html>