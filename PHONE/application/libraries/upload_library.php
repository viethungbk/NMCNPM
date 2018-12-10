<?php 
Class upload_library
{
	/**
	*Biến $CI thực hiện việc lưu lại "siêu đối tượng" ở trong code igniter
	*Vì trong library hoặc trong helper nếu muốn sử dụng 1 phương thức hay dữ liệu ở trong Code Igniter
	*Sẽ phải khởi tạo thông qua biến get_instance
	*Ví dụ muốn load_model hay load một thư viện nào đó, thì phải thông qua siêu đối tượng
	*Không được gọi trực tiếp kiểu như : $this->load->library
	*/
	var $CI='';
	function __construct()
	{
		$this->CI =& get_instance();
	}

	/**
	*Upload file
	*/
	function upload($upload_path='',$file_name='')
	{
		$config=$this->config($upload_path);
		$this->CI->load->library('upload',$config);//chỗ này phải thông qua $CI 

		//thực hiện upload
		if($this->CI->upload->do_upload($file_name))
		{
			$data=$this->CI->upload->data();
		}
		else
		{
			//Không upload thành công
			$data=$this->CI->upload->display_errors();
		}
		return $data;
	}

	/**
	*Upload nhiều file
	*/
	function upload_file($upload_path='',$file_name='')
	{
		//Lấy thông tin cấu hình upload
		$config=$this->config($upload_path);
		//lưu biến môi trường khi thực hiện upload
		$file  = $_FILES['image_list'];
		$count = count($file['name']);

		$image_list=array();//lưu tên các file ảnh upload thành công
		for($i=0; $i<=$count-1; $i++) 
		{
            $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
            $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
            $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
            $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
            //load thư viện upload và cấu hình
            $this->CI->load->library('upload', $config);
            //thực hiện upload từng file
            if($this->CI->upload->do_upload())
            {
                //nếu upload thành công thì lưu toàn bộ dữ liệu
            	$data = $this->CI->upload->data();
                //in cấu trúc dữ liệu của các file
            	$image_list[]=$data['file_name'];
            }     
        }
        return $image_list;
    }

	/**
	*Cấu hình upload file
	*/
	function config($upload_path='')
	{
		//Khai bao bien cau hinh
		$config = array();
         //thuc mục chứa file
		$config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
		$config['allowed_types'] = 'jpg|png|gif';
         //Dung lượng tối đa
		$config['max_size']      = '1200';
         //Chiều rộng tối đa
		$config['max_width']     = '1028';
         //Chiều cao tối đa
		$config['max_height']    = '1028';

		return $config;
	}
}
?>
