
<!-- The box-header-->

<link type="text/css" href="<?php echo public_url() ?>js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet">	
<script type="text/javascript" src="<?php echo public_url() ?>js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript">
  $(function() {
    $( "#text-search" ).autocomplete({
      source: "<?php echo base_url('product/search/1') ?>",
    });
  });
</script>
<div class="top"><!-- The top -->
  <div id="logo"><!-- the logo -->
   <a href="<?php echo base_url() ?>" title="Website bán điện thoại by Nhóm 10">
    <img src="<?php echo public_url() ?>site/images/logo3.png" alt="Website bán điện thoại by Nhóm 10">
  </a>
</div><!-- End logo -->

<!--  load gio hàng -->
<div id="cart_expand" class="cart"> 
  <a href="<?php echo base_url('cart') ?>" class="cart_link">
   Giỏ hàng <span id="in_cart"><?php echo $total_items?></span> sản phẩm
 </a> 
 <img alt="cart bnc" src="<?php echo public_url() ?>site/images/cart.png"> 
</div>       
<div id="search"><!-- the search -->
 <form method="get" action="<?php echo base_url('product/search') ?>">
   <input type="text" id="text-search" name="key-search" value="<?php echo isset($key) ? $key : "" ?>" placeholder="Tìm kiếm sản phẩm..." class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
   <input type="submit" id="but" name="but" value="">
 </form>
</div><!-- End search -->


<div class="clear"></div><!-- clear float --> 
</div><!-- End top -->			   <!-- End box-header  -->

<!-- The box-header-->
<div id="menu"><!-- the menu -->
 <ul class="menu_top">
   <li class="active index-li"><a href="<?php echo base_url()?>">Trang chủ </a></li>
   <li class=""><a href="<?php echo base_url('Product')?>">Sản phẩm</a></li>
   <li class=""><a href="https://tinhte.vn/">Tin tức</a></li>
   <?php if(isset($user_info)):?>
    <li class=""><a href="<?php echo site_url('user')?>">Xin chào: <?php echo $user_info->name?></a></li>
    <li class=""><a href="<?php echo site_url('user/logout')?>">Thoát</a></li>
    <?php else:?>
      <li class=""><a href="<?php echo site_url('user/register')?>">Đăng ký</a></li>
      <li class=""><a href="<?php echo site_url('user/login')?>">Đăng nhập</a></li>
    <?php endif;?>
  </ul>
</div><!-- End menu -->			   <!-- End box-header  -->

