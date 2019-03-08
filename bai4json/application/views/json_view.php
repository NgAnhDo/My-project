<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Json</title>
	<script type="text/javascript" src="<?php echo base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>
	<?php include "menu.php" ?>
	<?php foreach ($mangkq as $key => $value): ?>
		
	
		

			<div class="card">
				
				<div class="card-block">
					<h4 class="card-title">Ten: <?= $value['ten'] ?></h4>
					<p class="card-text">So Dien Thoai: <?= $value['sdt'] ?></p>
					<a href="json/xoa_json/<?= $value['sdt'] ?>" type="button" class="btn btn-outline-danger ">xoa</a>
				</div>
			</div>	
	<?php endforeach ?>

	<div class="container">
		<h3>Them vao form</h3>
		<form action="json/add_json" method="post" >
			<div class="form-group">
			    <label for="exampleInputEmail1">Tên: </label>
			    <input type="text" name="ten" class="form-control" id="ten"  placeholder="Ten">
		    
		  	</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">SDT</label>
			    <input type="numble" name="sdt" class="form-control" id="sdt"  placeholder="SDT">
		    
		  	</div>
			<button type="submit" class="btn btn-primary">Thêm</button>
		</form>
	</div>
</body>
</html>