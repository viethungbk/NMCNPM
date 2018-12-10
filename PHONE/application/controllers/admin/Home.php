<?php 
	// controller ở trang chủ của trang admin
	class Home extends MY_Controller
	{
		//load ra giao diện của trang chủ
		function index()
		{
			//key temp là template load ra giao diện của từng trang
			$this->data['temp']='admin/home/index'; 

			//load trang admin/main lên với giao diện là mainlayout -lưu trong biến $temp, dữ liệu là index.php
			$this->load->view('admin/main', $this->data);
		}
	}
 ?>