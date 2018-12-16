<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//Lấy danh sách sản phẩm mới
		$this->load->model('product_model');
		$input=array();
		$input['limit']=array(3,0);
		$product_newsest=$this->product_model->get_list($input);
		$this->data['product_newsest']=$product_newsest;

		//Lấy danh sách sản phẩm được mua nhiều
		$input['order']=array('buyed','DESC');
		$product_buyest=$this->product_model->get_list($input);
		$this->data['product_buyest']=$product_buyest;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		$this->data['temp']='site/home/index'; //biến temp là giao diện của phần nội dung chính sẽ được hiển thị đối với từng page
		$this->load->view('site/layout', $this->data);//lấy dữ liệu từ MY COntroller rồi lại chuyển từ layout sang left
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */