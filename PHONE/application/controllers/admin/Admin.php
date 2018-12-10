<!-- controller này quản lý danh sách các admin  -->
<?php 
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

		/**
		*lấy danh sách admin
		*/
		function index()
		
		{
			$input=array();
			$list=$this->admin_model->get_list($input);
			$this->data['list']=$list;

			$total=$this->admin_model->get_total();//lấy tổng số admin
			$this->data['total']=$total;

			//lấy ra nội dung của biến message
			$message=$this->session->flashdata('message');
			$this->data['message']=$message;
			
			$this->data['temp']='admin/admin/index';
			$this->load->view('admin/main',$this->data);
		}

		/**
		*Thêm mới quản trị viên
		*/
		function check_username(){
			$username=$this->input->post('username');

			$where=array('username'=>$username);

		//Kiểm tra xem username đã tồn tại chưa 
			if($this->admin_model->check_exists($where)){
			//trả về thông báo lỗi
				$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại ');
				return false;
			}
			return true;
		}

		function add()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');

		//kiếm tra nếu mà dữ liệu được post lên
			if($this->input->post()){

				$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
				$this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|callback_check_username');
				$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Xác nhận mật khẩu', 'matches[password]');

			//Nhập liệu chính xác
				if($this->form_validation->run())
				{
				//Thêm vào cơ sở dữ liệu
					$name=$this->input->post('name');
					$username=$this->input->post('username');
					$password=$this->input->post('password');
				//$re_password=$this->input->post('re_password');
					$data=array(
						'name'=> $name,
						'username' => $username,
						'password' => md5($password)//mã hoá md5 .
					);

					if($this->admin_model->create($data))
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
					redirect(admin_url('admin'));			
				}
				
			}
			$this->data['temp']='admin/Admin/add';
			$this->load->view('admin/main', $this->data);
		}

		/**
		*Hàm chỉnh sửa thông tin quản trị viên
		*/
		function edit()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');
			/**
			*lấy ra các phân đoạn trên link url, sử dụng this->uri->rsegment
			*Lấy ra phân đoạn thứ 3 - chính là id
			*/
			$id=$this->uri->rsegment('3'); 
			$id=intval($id); //ép kiểu $id về số nguyên . 
			
			/**
			*Phương thức get_info() lấy ra thông tin của một quản trị viên
			*Tham số truyền vào là biến $id
			*/
			$info=$this->admin_model->get_info($id);

			/**
			*Kiểm tra id, tránh trường hợp người dùng nhập bừa 1 url có id
			*không tồn tại, thì website sẽ bị lỗi . 
			*/
			if(!$info)
			{
				$this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
				redirect(admin_url('admin'));
			}

			$this->data['info']=$info;
			if($this->input->post()){

				$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
				
				/**
				*Kiểm tra: Nếu tên đăng nhập mà trùng với tên đăng nhập cũ thì gửi bình thường
				*
				*/
				if($this->input->post('username')!= $this->admin_model->get_info($id,'username')->username)
				{
					$this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|callback_check_username');
				}
				
				//Nếu người ta gửi mật khẩu lên thì mới set_rules cho mật khẩu, nếu không thì không làm gì cả
				$password=$this->input->post('password');
				if($password)
				{
					$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
					$this->form_validation->set_rules('re_password', 'Xác nhận mật khẩu', 'matches[password]');
				}
				if($this->form_validation->run())
				{
				//Thêm vào cơ sở dữ liệu
					$name=$this->input->post('name');
					$username=$this->input->post('username');
					
				//$re_password=$this->input->post('re_password');
					$data=array(
						'name'=> $name,
						'username' => $username,
						
					);

					//Nếu thay đổi mật khẩu thì mới gán dữ liệu
					if($password)
					{
						$data['password']=md5($password);
					}

					if($this->admin_model->update($id,$data))
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
						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại');
					}
					//chuyển hướng sang trang dánh sách quản trị viên
					redirect(admin_url('admin'));			
				}
			}

			$this->data['temp']='admin/Admin/edit';
			$this->load->view('admin/main', $this->data);
		}

		function delete()
		{
			$id=$this->uri->rsegment('3');
			$id=intval($id);

			$info=$this->admin_model->get_info($id);

			/**
			*Kiểm tra id, tránh trường hợp người dùng nhập bừa 1 url có id
			*không tồn tại, thì website sẽ bị lỗi . 
			*/
			if(!$info)
			{
				$this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
				redirect(admin_url('admin'));
			}
			
			$this->admin_model->delete($id);
			$this->session->set_flashdata('message', 'Xoá dữ liệu thành công');
			redirect(admin_url('admin'));
		}

		/**
		*Phân biệt admin đăng nhập thành công hay chưa thông qua biến session: $login
		*=> Muốn đăng xuất thì chỉ cần xoá dữ liệu của $login
		*/
		function logout()
		{
			if($this->session->userdata('login'))
			{
				//xoá biến login
				$this->session->unset_userdata('login');

				/**
				*Một khi đã huỷ, thì biến login mất, lúc này
				*hàm _check_login trong MY_Controller sẽ chạy vào hàm if
				*không có login => mọi link tới admin đều chuyển tới trang login
				*/
			}
			redirect(admin_url('login'));
		}
	}
	?>