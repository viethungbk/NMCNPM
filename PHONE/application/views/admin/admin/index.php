<!-- hiển thị list danh sách admin -->

<?php 
$this->load->view('admin/admin/head');
?>

<div class="line"></div>

<div class="wrapper">
	<?php $this->load->view('admin/message'); ?>

	<div class="widget">

		<div class="title">
			
			<h6>Danh sách Admin</h6>
			<div class="num f12">Tổng số: <b><?php echo $total ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:80px;">Mã số</td>
					<td>name</td>
					<td>username</td>
					
					
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
			
			<tbody>
				<?php foreach ($list as $key ): ?>
					<!-- Filter -->
					<tr>
						

						<td class="textC"><?php echo $key->id ?></td>
						<td>
							<span class="tipS" original-title="<?php echo $key->name ?>">
								<?php echo $key->name ?>						
							</span>
						</td>

						<td>
							<span class="tipS" original-title="<?php echo $key->username ?>">
								<?php echo $key->username ?>						
							</span>
						</td>
						
						<td class="option">
							<!-- Mỗi lần kick vào nút chỉnh sửa sẽ hiện ra một link phân biệt bởi id -->
							<a href="<?php echo admin_url('admin/edit/'.$key->id) ?>" class="tipS " original-title="Chỉnh sửa">
								<img src="<?php echo public_url() ?>admin/images/icons/color/edit.png">
							</a>

							<a href="<?php echo admin_url('admin/del/'.$key->id) ?>" class="tipS verify_action" original-title="Xóa">
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