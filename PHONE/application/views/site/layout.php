<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WebApp Nhóm 10</title>
	<?php $this->load->view('site/head'); ?>
</head>
<body>
	<a href="#" id="back_to_top">
		<img src="<?php echo public_url() ?>site/images/top.png" />
	</a>
	
	<div class="wraper">
		<!-- the header -->
		<div class='header'>
			<?php $this->load->view('site/header'); ?>
		</div>
		<div id="container">
			<div class="left">
				<?php $this->load->view('site/left',$this->data); ?>
			</div>

			<div class="content">
				<?php $this->load->view($temp); ?>
			</div>

			<div class="right">
				<?php $this->load->view('site/right'); ?>
			</div>

			<div class="clear">

			</div>
		</div>
		<center>
			<center>
				<img src="<?php echo public_url() ?>site/images/bank.png"> 
			</center>
		</center>

		<div class = "footer">
			<?php $this->load->view('site/footer'); ?>
		</div>
	</div>
	
</body>
</html>