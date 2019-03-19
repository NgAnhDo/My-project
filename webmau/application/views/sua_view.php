<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
</head>
<body>
	<h1>Sua danh muc tin</h1>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
		<?php foreach ($mangdulieu as $value): ?>
			
		
			
		
			<form method="post" action="<?php echo base_url() ?>tin/updateDanhmuc">  
		<fieldset class="form-group">
			<label for="formGroupExampleInput">Them danh muc</label>
			<input type="hidden" class="form-control" name="id" id="id" value="<?= $value['id'] ?>">
			<input type="text" class="form-control" name="tendanhmuc" id="tendanhmuc" value="<?= $value['tendanhmuc'] ?>">
		</fieldset>
		<fieldset class="form-group">
			
			<input type="submit" value="sua danh muc">
		</fieldset>
	</form>
	<?php endforeach ?>
</body>
</html>