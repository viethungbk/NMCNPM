<?php 
$this->load->view('admin/admin/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">
	<div class="widget">

		<div class="title">			
			<h6>Chỉnh sửa thông tin quản trị viên</h6>			
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">		
			<fieldset>					
				 <div class="formRow">
					<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" value="<?php echo $info->name ?>" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error("name"); ?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_username">Tên đăng nhập:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="username" id="param_username" _autocheck="true" value="<?php echo $info->username ?>" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error("username"); ?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_username">Mật khẩu:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo">
							<input name="password" id="param_password" _autocheck="true" type="password">
							<p>Nếu cập nhật mật khẩu thì mới nhập giá trị</p>
						</span>
						<span name="name_autocheck" class="autocheck">
						</span>
						<div name="name_error" class="clear error"><?php echo form_error("password"); ?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_username">Xác nhận mật khẩu:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="re_password" id="param_re_password" _autocheck="true" type="password"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error("re_password"); ?></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="formSubmit">
					<input type="submit" value="Chỉnh sửa" class="redB">
					
				</div>
				<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
</div>