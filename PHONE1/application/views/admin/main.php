 <!-- main layout -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php $this->load->view('admin/head'); ?>
</head>
<body>
	<div id="left_content">
		<?php $this->load->view('admin/left'); ?>
	</div>

	<div id="rightSide">				
		<?php $this->load->view('admin/header'); ?>		
		
		<!-- content -->		
		<?php $this->load->view($temp,$this->data); ?>
		<!-- End content-->	

		<?php $this->load->view('admin/footer'); ?>		
		
	</div>
	<div class="clear"></div>
</body>
</html>