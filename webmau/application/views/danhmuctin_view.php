<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
	
</head>
<body>
	<?php include 'header_view.php' ?>
	
	<div class="container">
		<h1>Them danh muc tin</h1>
		<div class="row">
			<div class="col-sm-6">
				<!-- <form method="post" action="<?php echo base_url() ?>tin/themtin">   -->
		<fieldset class="form-group">
			<label for="formGroupExampleInput">Them danh muc</label>
			<input type="text" class="form-control" name="tendanhmuc" id="tendanhmuc" placeholder="Them danh muc">
		</fieldset>
		<fieldset class="form-group">
			
			<input type="button" name="nutthemdanhmuc" id='nutthemdanhmuc' value="them danh muc">
		</fieldset>
	</form>
			</div>
			
			<div class="col-sm-6 cacdanhmuc">
				<h4 class="card-title">Danh sach danh muc da them</h4>
				<?php foreach ($dulieu as $value): ?>
				<div class="card-group">
					<div class="card">
						
						<div class="card-block">
							
							
							
							<div >
								<?php if ($value['id']==94) {?>
									
								 
								<a data-href="<?= $value['id'] ?>" class="btn btn-success nutxoa d-none" >Xóa</a>
							<?php } 
							 else{ ?>
								<a data-href="<?= $value['id'] ?>" class="btn btn-success nutxoa" >Xóa</a>
							<?php } ?>
								<a data-href="<?= $value['id'] ?>" class="btn btn-danger nutsua">Sửa</a>
								
							</div>
							<div class='d-none'>
								<a data-href="<?= $value['id'] ?>" class="btn btn-info nutluu">Lưu</a>
								<input type="text" name='tendanhmuc' class="jquery_sua tendanhmuc"  value="<?= $value['tendanhmuc'] ?>">
								<input type="hidden" name='id' class="id" id='id' value="<?= $value['id'] ?>">
							</div>
							<div class="">
								<p class="card-text"><?= $value['tendanhmuc'] ?></p>
								
								
								
							</div>
						</div>
					</div>
				</div>		
			
			<?php endforeach ?>
			</div>
			
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script> 
	<script >
		$(function(){
			var duongdan ='<?php echo base_url() ?>';
			$('#nutthemdanhmuc').click(function(event) {
				/* Act on the event */
				$.ajax({
					url: duongdan+'/tin/addAjax',
					type: 'POST',
					dataType: 'json',
					data: {tendanhmuc: $('#tendanhmuc').val(),
					id: $('#id').val()},
					
					

				})
				.done(function() {
				// 	console.log("success");
				 })
				.fail(function() {
				// 	console.log("error");
				 })
				.always(function(response) {
					console.log(response);
					noidung='<div class="card-group">';
					noidung+='<div class="card">';
					noidung+='<div class="card-block">';
					
					noidung+='<div>';
					noidung+='<a data-href="'+$('#id').val()+'" class="btn btn-success nutxoa">Xóa</a>';
					noidung+='<a data-href="'+$('#id').val()+'" class="btn btn-danger nutsua">Sửa</a>';
					noidung+='</div>';
					noidung+='<div>'
					noidung+='<p class="card-text">'+$('#tendanhmuc').val()+'</p>';
					
					noidung+='</div>';
					noidung+='</div>';
					noidung+='</div>';
					noidung+='</div>';
					$('.cacdanhmuc').append(noidung);
					$('#tendanhmuc').val('');
					
				});
				
		
			$('body').on('click', '.nutxoa', function(event) {
				idtin=$(this).data('href');
				doituongcanxoa=$(this).parent().parent().parent();
				$.ajax({
					url: duongdan+'/tin/delDanhmuc/'+idtin,
					type: 'POST',
					dataType: 'json',
					
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
					doituongcanxoa.remove();
				});
			});
			
		})
		$('body').on('click', '.nutsua', function(event) {

			$(this).parent().addClass('d-none');
			$(this).parent().next().next().addClass('d-none');
			$(this).parent().next().removeClass('d-none');
			
			/* Act on the event */
		});
		$('body').on('click', '.nutluu', function(event) {
			var duongdan ='<?php echo base_url() ?>';
			var giatriten=$(this).parent().children('.tendanhmuc').val();
			var giatritid=$(this).parent().children('.id').val();
			phantu1=$(this).parent().addClass('d-none');
			
			noidung1=$(this).parent().children('.tendanhmuc').val();
			hienthi1=$(this).parent().next().html(noidung1).removeClass('d-none');
			hienthi2=$(this).parent().prev().removeClass('d-none');
			
			$.ajax({
				url: duongdan+'/tin/updateDanhmuc',
				type: 'POST',
				dataType: 'json',
				data: {tendanhmuc: giatriten,
					id: giatritid},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			/* Act on the event */
		});
			});
		
	</script>
</body>
</html>

