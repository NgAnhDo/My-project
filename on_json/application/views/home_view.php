<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <script type="text/javascript" src="<?php //echo base_url() ?>js/bootstrap.min.js"></script>  -->	
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>font/css/all.css">
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>js/popper.min.js"></script>
	
	<script src="<?php echo base_url() ?>font/bootstrap.min.js" ></script>
</head>
<body>
  
<?php include'menu_view.php' ?>
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel"  data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <?php $dem=1 ?>
      <?php foreach ($mangdl as $key => $value): ?>
        
     
      <div class="carousel-item <?php if($dem==1){echo "active";$dem++;} ?>">
        <img src="<?= $value['upload_img'] ?>" width="100%" height="400px"  alt="">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1><?= $value['title'] ?></h1>
            <p><?= $value['text'] ?></p>
            <p><a class="btn btn-lg btn-primary" href="<?= $value['link_button'] ?>" role="button"><?= $value['text_button'] ?></a></p>
          </div>
        </div>
      </div>
       <?php endforeach ?>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	</div>
	
	
</body>
</html>