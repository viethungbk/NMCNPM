<?php 
class Catalog extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('catalog_model');
	}

	/**
	*Lấy ra danh mục sản phẩm
	*/
	function index()
	{
		$list= $this->catalog_model->get_list();
		$this->data['list']=$list;

		$message=$this->session->flashdata('message');
		$this->data['message']=$message;
		$this->data['temp']='admin/catalog/index';
		$this->load->view('admin/main',$this->data);
	}

	/**
	*Thêm mới dữ liệu
	*/
	function add()
	{
		//Thư viện để hiển thị lỗi
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiếm tra nếu mà dữ liệu được post lên
		if($this->input->post())
		{

			$this->form_validation->set_rules('name', 'Tên', 'required');			

			//Nhập liệu chính xác
			if($this->form_validation->run())
			{
				//Thêm vào cơ sở dữ liệu
				$name=$this->input->post('name');
				$parent_id=$this->input->post('parent_id');
				$sort_order=$this->input->post('sort_order');
				//$re_password=$this->input->post('re_password');
				$data=array(
					'name'=> $name,
					'parent_id' => $parent_id,
					'sort_order' => intval($sort_order)//mã hoá md5 .
				);

				//Thêm mới vào csdl
				if($this->catalog_model->create($data))
				{
					/**
					*đây là 1 hàm trong thư viện session, nó tạo ra cho cta một 
					*biến lưu lại 1 nội dung nào đó
					*trong trường hợp này là tạo ra một nội dung thông báo
					*set dữ liệu cho biến $message
					*/
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('message', 'Thêm mới thất bại');
				}
					//chuyển hướng sang trang dánh sách quản trị viên
				redirect(admin_url('catalog'));			
			}

		}
			//lấy danh sách danh mục cha
		$input=array();
		$input['where']=array('parent_id'=>0);
		$list=$this->catalog_model->get_list($input);
		$this->data['list']=$list;

		$this->data['temp']='admin/catalog/add';
		$this->load->view('admin/main', $this->data);
	}

	/**
	*Cập nhật dữ liệu
	*/
	function edit()
	{
			//Thư viện để hiển thị lỗi
		$this->load->library('form_validation');
		$this->load->helper('form');

		$id=$this->uri->rsegment(3);
		$info=$this->catalog_model->get_info($id);

		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại danh mục này');
			redirect(admin_url('catalog'));
		}

		$this->data['info']=$info;
			//kiếm tra nếu mà dữ liệu được post lên
		if($this->input->post()){

			$this->form_validation->set_rules('name', 'Tên', 'required');			

				//Nhập liệu chính xác
			if($this->form_validation->run())
			{
				//Thêm vào cơ sở dữ liệu
				$name=$this->input->post('name');
				$parent_id=$this->input->post('parent_id');
				$sort_order=$this->input->post('sort_order');
				
				$data=array(
					'name'=> $name,
					'parent_id' => $parent_id,
					'sort_order' => intval($sort_order)
					);

				if($this->catalog_model->update($id,$data))
				{
					/**
					*đây là 1 hàm trong thư viện session, nó tạo ra cho cta một 
					*biến lưu lại 1 nội dung nào đó
					*trong trường hợp này là tạo ra một nội dung thông báo
					*set dữ liệu cho biến $message
					*/
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('message', 'Cập nhật thất bại');
				}
					//chuyển hướng sang trang dánh sách quản trị viên
				redirect(admin_url('catalog'));			
			}

		}
		//lấy danh sách danh mục cha
		$input=array();
		$input['where']=array('parent_id'=>0);
		$list=$this->catalog_model->get_list($input);
		$this->data['list']=$list;

		$this->data['temp']='admin/catalog/edit';
		$this->load->view('admin/main', $this->data);
	}

	/*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('catalog'));
    }
    
    /*
     * Xoa nhieu danh muc san pham
     */
    function deleteAll()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id , false);
        }
    }
    
    /*
     * Thuc hien xoa
     */
    private function _del($id, $rediect = true)
    {
        $info = $this->catalog_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            if($rediect)
            {
                redirect(admin_url('catalog'));
            }else{
                return false;
            }
        }
        
        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
        if($product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Danh mục '.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
            if($rediect)
            {
                redirect(admin_url('catalog'));
            }else{
                return false;
            }
        }
        
        //xoa du lieu
        $this->catalog_model->delete($id);
        
    }
}
?>
