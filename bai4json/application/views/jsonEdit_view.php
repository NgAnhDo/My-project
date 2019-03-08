<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chỉnh sửa json</title>
	<script type="text/javascript" src="<?php echo base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
 	
</head>
<body>
	<?php include "menu.php" ?>
	<div class="container">
		<h3>Them vao form</h3>
		
			
		
		<form method="post" action="jsonEdit/edit" >
			<?php foreach ($mangdl as $key): ?>
			<div class="form-group">
			    <label for="exampleInputEmail1">Tên: </label>
			    <input type="text" name="ten[]" class="form-control" id="ten"  value="<?= $key['ten'] ?>">
		    
		  	</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">SDT</label>
			    <input type="numble" name="sdt[]" class="form-control" id="sdt"  value="<?= $key['sdt'] ?>">
		    
		  	</div>
		  	<?php endforeach ?>
			<button type="submit" class="btn btn-primary">Thêm</button>
		</form>
		
	</div>
</body>
</html>