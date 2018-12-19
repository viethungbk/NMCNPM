<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WebApp Nhóm 10</title>
	<link rel="shortcut icon" href="<?php echo public_url() ?>site/images/icon1.png" type="image/x-icon">
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
				<?php if(isset($message)):?>
					<h3 style="color:red"><?php echo $message?></h3>
				<?php endif;?>
				<?php $this->load->view($temp , $this->data);?>
			</div>

			<div class="right">
				<?php $this->load->view('site/right',$this->data); ?>
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