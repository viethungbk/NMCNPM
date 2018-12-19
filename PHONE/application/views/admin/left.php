
<div id="leftSide" style="padding-top:30px;">

	<!-- Account panel -->

	<div class="sideProfile">
		<a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin')?>/images/user.png" width="40"></a>
		<span>Xin chào: <strong>admin!</strong></span>
		<span>Nhóm 10</span>
		<div class="clear"></div>
	</div>
	<div class="sidebarSep"></div>		    
	<!-- Left navigation -->

	<ul id="menu" class="nav">

		<li class="home">

			<a href="<?php echo admin_url()?>" class="active" id="current">
				<span>Bảng điều khiển</span>
				<strong></strong>
			</a>
			

		</li>
		<li class="tran">

			<a href="" class="exp inactive">
				<span>Quản lý bán hàng</span>
				<strong>2</strong>
			</a>
			
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('transaction')?>">
					Giao dịch							</a>
				</li>
				<li>
					<a href="<?php echo admin_url('order')?>">
					Đơn hàng sản phẩm							</a>
				</li>
			</ul>

		</li>
		<li class="product">

			<a href="" class="exp inactive">
				<span>Sản phẩm</span>
				<strong>2</strong>
			</a>
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('product')?>">
						Sản phẩm							
					</a>
				</li>
				<li>
					<a href="<?php echo admin_url('catalog')?>">
						Danh mục							
					</a>
				</li>

			</ul>

		</li>
		<li class="account">

			<a href="" class="exp inactive">
				<span>Tài khoản</span>
				<strong>2</strong>
			</a>
			
			<ul style="display: none;" class="sub">
				<li>
					<a href="<?php echo admin_url('admin')?>">
						Ban quản trị							
					</a>
				</li>

				<li>
					<a href="<?php echo admin_url('user')?>">
					Thành viên							</a>
				</li>
			</ul>

		</li>
		<li class="content">

			<a href="<?php echo admin_url('news')?>" >
				<span>Bài viết</span>
				<strong>2</strong>
			</a>
			
			

		</li>

	</ul>

</div>
<div class="clear"></div>
