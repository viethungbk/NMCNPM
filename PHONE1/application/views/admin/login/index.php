 
<!-- Quy tắc đặt tên: tên controller = tên thư mục view
	Tên action = ten file trong thư mục view -->
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php $this->load->view('admin/head'); ?>
</head>
<body class="nobg loginPage" style="min-height:100%;">
	<div class="loginWrapper" style="top:45%;">

		<div class="widget" id="admin_login" style="height:auto; margin:auto;">
			<div class="title"><img src="<?php echo public_url() ?>admin/images/icons/dark/laptop.png" alt="" class="titleIcon">
				<h6>Đăng nhập</h6>
			</div>

			<form class="form" id="form" action="" method="post">
				<fieldset>
					<div class="formRow">
						<label for="param_username">Tên đăng nhập:</label>
						<div class="loginInput"><input type="text" name="username" id="param_username"></div>
						<div class="clear"></div>
					</div>
 
					<div class="formRow">
						<label for="param_password">Mật khẩu:</label>
						<div class="loginInput"><input type="password" name="password" id="param_password"></div>
						<div class="clear"></div>
					</div>

					<div class="loginControl">
						<div style="color:red ;font-weight:bold ;text-align: left;"><?php echo form_error('login'); ?></div>
						<input type="hidden" name="submit" value="1">
						<input type="submit" value="Đăng nhập" class="dredB logMeIn">
						<div class="clear"></div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<?php $this->load->view('admin/footer'); ?>
</body>
</html>

