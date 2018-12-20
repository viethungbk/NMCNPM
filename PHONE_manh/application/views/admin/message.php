<!-- chuyên để hiển thị nội dung thông báo -->


<!-- Kiếm tra nếu tồn tại biến $message và biến này có giá trị
thì hiện ra dòng thông báo, còn không thì ko có thông báo   -->

<?php if(isset($message) && $message):?>
	<div class="nNote nInformation hideit">
		<p><strong>THÔNG BÁO: </strong> <?php echo $message ?></p>
	</div>
<?php endif; ?>
