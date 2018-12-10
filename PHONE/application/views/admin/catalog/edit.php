<?php 
$this->load->view('admin/catalog/head', $this->data);
?>
<div class="line"></div>

<div class="wrapper">
	<div class="widget">

		<div class="title">			
			<h6>Thêm mới danh mục sản phẩm</h6>			
		</div>
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">		
			<fieldset>					
				<div class="formRow">
					<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" value="<?php echo $info->name; ?>" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error("name"); ?></div>
					</div>
					<div class="clear"></div>
				</div>	

				<div class="formRow">
					<label class="formLeft" for="param_name">Danh mục cha:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo">
							<select name="parent_id" id="param_parent_id" _autocheck="true">
								<option value="0">Là danh mục cha</option>
								<?php foreach ($list as $key):?>
									<option value="<?php echo $key->id ?>" <?php echo ($key->id == $info->parent_id) ? 'selected':'';?>>
									<?php echo $key->name ?></option>
								<?php endforeach ;?>
							</select>
						</span> 
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error("sort_order"); ?></div>
					</div>
					<div class="clear"></div>
				</div>	

				<div class="formRow">
					<label class="formLeft" for="param_name">Thứ tự hiển thị:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="sort_order" id="param_sort_order" _autocheck="true" value="<?php echo $info->sort_order ?>" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error("sort_order"); ?></div>
					</div>
					<div class="clear"></div>
				</div> 	 								

				<div class="formSubmit">
					<input type="submit" value="Thêm mới" class="redB">

				</div>
				<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
</div>