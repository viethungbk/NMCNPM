
<!-- The Support -->
<div class="box-right">
	<div class="title tittle-box-right">
		<h2> Hỗ trợ trực tuyến </h2>
	</div>
	<div class="content-box">
		<!-- goi ra phuong thuc hien thi danh sach ho tro -->
		<div class="support">
			<strong>Vũ Duy Mạnh </strong>				
			<a rel="nofollow" href="ymsgr:sendIM?tuyenht90">
				
			</a>

			<p>
				<img style="margin-bottom:-3px" src="<?php echo public_url() ?>site/images/phone.png"> 0969160198	      </p>

				<p>
					<a rel="nofollow" href="">
						<img style="margin-bottom:-3px" src="<?php echo public_url() ?>site/images/email.png"> Email: thinhhanh1@gmail.com
					</a>
				</p>
				<p>
					<a rel="nofollow" href="skype:tuyencnt90">
						<img style="margin-bottom:-3px" src="<?php echo public_url() ?>site/images/skype.png"> Skype: Manh Vu			</a>
					</p>	
				</div>			        </div>
			</div>
			<!-- End Support -->

			<!-- The news -->
			<div class="box-right">
				<div class="title tittle-box-right">
					<h2> Bài viết mới </h2>
				</div>
				<div class="content-box">
					<ul class="news">
						<?php foreach ($news_list as $row):?>
							<li>
								<a href="<?php echo site_url('news/view/'.$row->id); ?>" title="<?php echo $row->title?> ">
									<img src="<?php echo base_url('upload/news/'.$row->image_link)?>" style="width:50px" alt="<?php echo $row->title?> ">
									<?php echo $row->title?>                        
								</a>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>		<!-- End news -->

			
		</div>
		<!-- End Fanpage -->

		


