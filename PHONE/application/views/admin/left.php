
<div id="leftSide" style="padding-top:30px;">

	<!-- Account panel -->

	<div class="sideProfile">
		<a href="" title="" class="profileFace"><img width="40" src="<?php echo public_url() ?>admin/images/user.png"></a>
		<span>Xin chào: <strong>admin!</strong></span>
		<span>Vũ Duy Mạnh</span>
		<div class="clear"></div>
	</div>
	<div class="sidebarSep"></div>		    
	<!-- Left navigation -->

	<ul id="menu" class="nav">

		<li class="home">

			<a href="<?php echo admin_url() ?>">
				<span>Trang Chủ</span>
				<strong></strong>
			</a>


		</li>
		<li class="tran">

			<a href="admin/tran.html" class="exp inactive">
				<span>Quản lý bán hàng</span>
				<strong>2</strong>
			</a>

			<ul class="sub" style="display: none;">
				<li>
					<a href="<?php echo admin_url('transaction') ?>">
					Giao dịch							</a>
				</li>
				<li>
					<a href="<?php echo admin_url('order') ?>">
					Đơn hàng sản phẩm							</a>
				</li>
			</ul>

		</li>
		<li class="product">

			<a href="admin/product.html" class="exp inactive">
				<span>Sản phẩm</span>
				<strong>3</strong>
			</a>

			<ul class="sub" style="display: none;">
				<li>
					<a href="<?php echo admin_url('Product') ?>">
					Sản phẩm							</a>
				</li>
				<li>
					<a href="<?php echo admin_url('catalog'); ?>">
					Danh mục							</a>
				</li>
				
			</ul>

		</li>
		<li class="account">

			<a href="<?php echo admin_url('Admin'); ?>">
				<span>Ban Quản Trị</span>
				<strong>3</strong>
			</a>

			

		</li>
		
		

	</ul>

</div>
<div class="clear"></div>
