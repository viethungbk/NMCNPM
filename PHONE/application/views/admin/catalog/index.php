<!-- hiển thị list danh sách admin -->

<?php 
$this->load->view('admin/catalog/head', $this->data);
?>

<div class="line"></div>

<div class="wrapper">
	<?php $this->load->view('admin/message',$this->data); ?>

	<div class="widget">

		<div class="title">
			<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" id="titleCheck" name="titleCheck" style="opacity: 0;"></span></div></span>
			<h6>Danh sách danh mục sản phẩm</h6>
			<div class="num f12">Tổng số: <b><?php echo count($list) ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url() ?>admin/images/icons/tableArrows.png"></td>
					<td style="width:80px;">Mã số</td>
					<td style="width:80px;">Thứ tự hiển thị</td>
					<td>Tên danh mục</td>					
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead> 
			
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('catalog/deleteAll') ?>">
								<span style="color:white;">Xóa hết</span>
							</a>
						</div>

						<div class="pagination">
						</div>
					</td>
				</tr>
			</tfoot>

			<tbody>
				<?php foreach ($list as $key ): ?>
					<!-- Filter -->
					<tr class="row_<?php echo $key->id ?>">
						<td>
							<div class="checker" id="uniform-undefined">
								<span><input type="checkbox" name="id[]" value="<?php echo $key->id ?>" style="opacity: 0;">
								</span>
							</div>
						</td>

						<td class="textC"><?php echo $key->id ?></td>
						<td class="textC"><?php echo $key->sort_order ?></td>
						<td>
							<span class="tipS" original-title="<?php echo $key->name ?>">
								<?php echo $key->name ?>						
							</span>
						</td>					

						<td class="option">
							<!-- Mỗi lần kick vào nút chỉnh sửa sẽ hiện ra một link phân biệt bởi id -->
							<a href="<?php echo admin_url('catalog/edit/'.$key->id) ?>" class="tipS " original-title="Chỉnh sửa">
								<img src="<?php echo public_url() ?>admin/images/icons/color/edit.png">
							</a>

							<a href="<?php echo admin_url('catalog/delete/'.$key->id) ?>" class="tipS verify_action" original-title="Xóa">
								<img src="<?php echo public_url() ?>admin/images/icons/color/delete.png">
							</a>
						</td>
					</tr>
				<?php endforeach; ?>				
			</tbody>
		</table>		
	</div>
</div>

<div class="clear mt30"></div>