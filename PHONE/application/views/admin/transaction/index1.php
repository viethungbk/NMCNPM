<?php 
$this->load->view('admin/transaction/head', $this->data);
?>

<div class="line"></div>

<div class="wrapper" id="main_transaction">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
			<h6>
			Danh sách giao dịch			</h6>
			<div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="7">
				<form class="list_filter form" action="<?php echo admin_url('transaction') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>

						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="<?php echo $this->input->get('id'); ?>" id="filter_id" type="text" style="width:55px;"></td>

							<td style="width:150px">
								<input type="submit" class="button blueB" value="Lọc">
								<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo admin_url('transaction') ?>'; ">
							</td>

						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>

			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>				
					<td>Số tiền</td>					
					<td>Trạng thái</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>

			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="7">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('transaction/deleteAll'); ?>">
								<span style="color:white;">Xóa hết</span>
							</a>
						</div>

						<div class="pagination">
							<?php echo $this->pagination->create_links(); ?>
						</div>
					</td>
				</tr>
			</tfoot>

			<tbody class="list_item">
				<?php foreach($list as $key): ?>
					<tr class="row_<?php echo $key->id ?>">
						<td><input type="checkbox" name="id[]" value="<?php echo $key->id; ?>"></td>

						<td class="textC"><?php echo $key->id ?></td>

						<td>							
							<?php echo number_format($key->amount) ?> đ							
						</td>
						<td>
							<?php if($key->status==0){
								echo "Chưa thanh toán";
							}else if($key->status == 1){
								echo "Đã thanh toán";
							}else{
								echo "Thanh toán thất bại";
							} ?>
						</td>
						<td class="textC"><?php echo get_date($key->created); ?></td>

						<td class="option textC">
							
							
							<a href="<?php echo admin_url('transaction/del/'.$key->id) ?>" title="Xóa" class="tipS verify_action">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png">
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>

</div>