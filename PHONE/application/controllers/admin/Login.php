
<?php 
/**
 * 
 */
class Login extends MY_Controller
{
	/**
	*load ra một cái view đăng nhập của hệ thống
	*/
	function index()
	{
		/**
		*Kiểm tra xem username và password có trong CSDL không
		*Nếu có thì đăng nhập thành công
		*/
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Nếu có dữ liệu post lên
		if($this->input->post())
		{
			$this->form_validation->set_rules('login','login','callback_check_login');

			/**
			*Nếu đăng nhập đúng = >admin đăng nhập thành công
			*Chuyển về trang admin/admin
			*/
			if($this->form_validation->run())
			{
				/**
				*Đối với login, sử dụng thư viện session 
				*để biết được admin đăng nhập hay chưa
				*Trong trường hợp admin chưa đăng nhập thì vào tất cả link
				*trong admin đều redirect ra trang login
				*
				*Tại đây, sau khi đăng nhập thành công sẽ set ra 1 biến session
				*để cho biết admin đăng nhập thành công rồi
				*
				*Phương thức set_userdata cho phép gắn một giá trị cho 1 biến session
				*
				*Tạo một biến session $login = true;
				*/
				$this->session->set_userdata('login',true);//dạng 1 flag để báo admin đăng nhập thành công
				redirect(admin_url('home'));
			}
		}
		$this->load->view('admin/login/index');
	}

	/**
	*Hàm _check_login kiểm tra xem username vs password có chính xác không
	*/
	function check_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		//mã hoá md5 để kiểm tra do trong csdl mật khẩu lưu ở dạng md5
		$password=md5($password);

		$this->load->model('admin_model');

		$where=array(
			'username'=>$username,
			'password'=>$password
		);

		/**
		*Hàm check_exists kiểm tra xem có tồn tại trong csdl không?
		*/
		if($this->admin_model->check_exists($where))
		{
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__,'Đăng nhập thất bại');
		return false;
	}
}
 ?>