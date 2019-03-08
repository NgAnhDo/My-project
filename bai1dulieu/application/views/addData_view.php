<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Them moi so sim dt</title>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>
	<div class="container">
		<h2 class="text-xs-center">Thêm số điện thoại ơ3 trong form sau</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<form action="insertData_controller" method="post" enctype="multidata/form-data">
					<div class="card">
						<div class="card-block">
						<div class="form-group">
						    <label for="formGroupExampleInput">So Sim</label>
						    <input type="text" name="so" class="form-control" id="formGroupExampleInput" placeholder="vd: 0987678909">
						  </div>
						  <div class="form-group">
						    <label for="formGroupExampleInput2">Gia Sim </label>
						    <input type="text" name="gia" class="form-control" id="formGroupExampleInput2" placeholder="vd: 200000">
						  </div>
						<input type="submit" class="btn btn-success btn-block" value="Nhập vao cơ sở dữ liệu">
						  </div>
				</form>
				
			</div>
		</div>
	</div>
</body>
</html>