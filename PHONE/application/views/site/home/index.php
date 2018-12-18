<?php 
$this->load->view('site/slide');	
?>
<!-- lay san pham moi nhat -->
<div class="box-center"><!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>Sản phẩm mới</h2>
	</div>
	<div class="box-content-center product"><!-- The box-content-center -->
		<?php foreach ($product_newsest as $key): ?>					
			<div class='product_item'>
				<h3>
					<a  href="<?php echo base_url('product/view/'.$key->id) ?>" title="<?php echo $key->name ?>">
						<?php echo $key->name ?>	                     
					</a>
				</h3>
				<div class='product_img'>
					<a  href="<?php echo base_url('product/view/'.$key->id) ?>" title="<?php echo $key->name ?>">
						<img src="<?php echo base_url('upload/product/'.$key->image_link ) ?>" alt=''/>
					</a>
				</div>

				<p class='price'>
					<?php if($key->discount > 0): ?>
						<?php $price_new=$key->price - $key->discount; ?>
						<?php echo number_format($price_new); ?>đ
						<span class="price_old"><?php echo number_format($key->price); ?>đ</span>
						<?php else: ?>
							<?php echo number_format($key->price); ?>đ
						<?php endif; ?>
					</p>

					<center>
						<div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
					</center>

					<div class='action'>
						<p style='float:left;margin-left:10px'>Lượt xem: <b><?php echo $key->view ?></b></p>
						<a class='button' href="<?php echo base_url('product/view/'.$key->id) ?>" title='chi tiết'>Chi tiết</a>
						<div class='clear'></div>
					</div>
				</div>
			<?php endforeach ?>


			<div class='clear'></div>
		</div><!-- End box-content-center -->
	</div>	<!-- End box-center product-->

	<!-- hiển thị sản phẩm được mua nhiều nhất -->
	<div class="box-center"><!-- The box-center product-->
		<div class="tittle-box-center">
			<h2>Sản phẩm bán chạy</h2>
		</div>
		<div class="box-content-center product"><!-- The box-content-center -->
			<?php foreach ($product_buyest as $key): ?>					
				<div class='product_item'>
					<h3>
						<a  href="" title="<?php echo $key->name ?>">
							<?php echo $key->name ?>	                     </a>
						</h3>
						<div class='product_img'>
							<a  href="<?php echo base_url('product/view/'.$key->id) ?>" title="<?php echo $key->name ?>">
								<img src="<?php echo base_url('upload/product/'.$key->image_link ) ?>" alt=''/>
							</a>
						</div>

						<p class='price'>
							<?php if($key->discount > 0): ?>
								<?php $price_new=$key->price - $key->discount; ?>
								<?php echo number_format($price_new); ?>đ
								<span class="price_old"><?php echo number_format($key->price); ?>đ</span>
								<?php else: ?>
									<?php echo number_format($key->price); ?>đ
								<?php endif; ?>
							</p>

							<center>
								<div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
							</center>

							<div class='action'>
								<p style='float:left;margin-left:10px'>Lượt mua: <b><?php echo $key->view ?></b></p>
								<a class='button' href="<?php echo base_url('product/view/'.$key->id) ?>" title='chi tiết'>Chi tiết</a>
								<div class='clear'></div>
							</div>
						</div>
					<?php endforeach ?>


					<div class='clear'></div>
				</div><!-- End box-content-center -->
</div>	<!-- End box-center product-->