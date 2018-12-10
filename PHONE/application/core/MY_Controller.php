<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	//Biến toàn cục gửi dữ liệu sang bên view (do khi controller gửi dữ liệu sang view nó gửi sang 1 mảng DL)
	public $data=array();

	/**
	* Hàm khởi tạo ở trong MY_Controller
	*/
	public function __construct()
	{
		//kế thừa từ CI_Controller
		parent::__construct();

		//Kiểm tra xem hệ thống có bao nhiêu thư mục trong Controller
		$controller =$this->uri->segment(1);
		switch ($controller) 
		{
			case 'admin':
			/** 
			*Nếu biến $controller có giá trị là admin thì chứng tỏ đang truy cập vào các
			*thư mục ở trong admin
			*/
			{
				$this->load->helper('admin_helper');
				$this->_check_login();
				break;
			}

			default:
			{
				//xử lí dữ liệu ở home
				//lấy danh sách danh mục sản phẩm
				$this->load->model('catalog_model');
				$input=array();
				$input['where']=array('parent_id'=>0);
				$catalog_list=$this->catalog_model->get_list($input);//lấy ra toàn bộ danh sách danh mục

				foreach ($catalog_list as $key) {
					# code...
					$input['where']=array('parent_id'=>$key->id);
					$subs=$this->catalog_model->get_list($input);
					$key->subs=$subs;
				}
				$this->data['catalog_list']= $catalog_list;
				


			}
			break;
		}
	}

	/**
	*Kiểm tra trạng thái đăng nhập của admin
	*Ngay khi truy cập vào những controller ở trong admin thì cần phải kiểm tra ngay
	*/
	public function _check_login()
	{
		$controller=$this->uri->rsegment('1');
		$controller=strtolower($controller);//gán cho controller về dạng chữ thường
		
		$login=$this->session->userdata('login');

		/**
		*Nếu admin chưa đăng nhập mà vào controller khác controller login
		*Thì chuyển về trang login
		*/
		if(! $login && $controller != 'login')
		{
			redirect(admin_url('login'));
		}

		/**
		*Nếu admin đã login rồi mà còn cố tính truy vập vào controller login
		*Thì sẽ chuyển họ về trang home
		*/
		if($login &&$controller =='login')
		{
			redirect(admin_url('home'));
		}
	}

}


/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */