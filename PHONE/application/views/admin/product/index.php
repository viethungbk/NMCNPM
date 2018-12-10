<?php 
$this->load->view('admin/product/head', $this->data);
?>

<div class="line"></div>

<div class="wrapper" id="main_product">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
			<h6>
			Danh sách sản phẩm			</h6>
			<div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="<?php echo admin_url('product') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>

						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="<?php echo $this->input->get('id'); ?>" id="filter_id" type="text" style="width:55px;"></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;"><input name="name" value="<?php echo $this->input->get('name'); ?>" id="filter_iname" type="text" style="width:155px;"></td>
							
							<td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
							<td class="item">
								<select name="catalog"><!-- đặt tên biến select để biết tên biến dữ liệu sẽ gửi lên  -->
									<option value=""></option>
									<!-- kiem tra danh muc co danh muc con hay khong -->
									<?php foreach ($catalogs as $key): ?>
										<?php if($key->subs > 1): ?>
											<optgroup label="<?php echo $key->name ?>">
												<?php foreach ($key->subs as $sub): ?>
													<option value="<?php echo $sub->id ?>">
														<?php echo $sub->name; ?>
													</option>
												<?php endforeach; ?>
											</optgroup>	
										<?php else: ?>
											<option value="<?php echo $key->id ?>"><?php echo $key->name ?></option>
										<?php endif; ?>	
									<?php endforeach; ?>							
								</select>
							</td>

							<td style="width:150px">
								<input type="submit" class="button blueB" value="Lọc">
								<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo admin_url('product') ?>'; ">
							</td>

						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>

			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Tên</td>
					<td>Giá</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>

			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('product/deleteAll'); ?>">
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
							<div class="image_thumb">
								<img src="<?php echo base_url('upload/product/'.$key->image_link) ?>" height="50">
								<div class="clear"></div>
							</div>

							<a href="" class="tipS" title="" target="_blank">
								<b><?php echo $key->name ?></b>
							</a>

							<div class="f11">
								Đã bán: <?php echo $key->buyed ?>| Xem: <?php echo $key->view ?>								
								</div>

						</td>

						<td class="textR">
							<?php if($key->discount > 0): ?>
								<?php $price_new=$key->price - $key->discount; ?>
								<b style="color:red"><?php echo number_format($price_new); ?>đ</b>
								<p style="text-decoration:line-through"><?php echo number_format($key->price) ?></p>
							<?php else: ?>
								<b style="color:red"><?php echo number_format($key->price); ?>đ</b>
							<?php endif; ?>


						</td>


						<td class="textC"><?php echo get_date($key->created); ?></td>

						<td class="option textC">

							<a href="product/view/9.html" target="_blank" class="tipS" title="Xem chi tiết sản phẩm">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png">
							</a>
							<a href="<?php echo admin_url('product/edit/'.$key->id) ?>" title="Chỉnh sửa" class="tipS">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png">
							</a>

							<a href="<?php echo admin_url('product/delete/'.$key->id) ?>" title="Xóa" class="tipS verify_action">
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png">
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>

</div>