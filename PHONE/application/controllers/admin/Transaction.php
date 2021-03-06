<?php
Class Transaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('transaction_model');
        
        // Tai cac file thanh phan
        $this->load->helper('language');
        $this->lang->load('admin/transaction');
        $this->lang->load('admin/common');
        
    }
    
    /*
     * Hien thi danh sach giao dịch
     */
    function index()
    {
        //lay tong so luong ta ca cac giao dich trong websit
        $total_rows = $this->transaction_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac giao dich tren website
        $config['base_url']   = admin_url('transaction/index'); //link hien thi ra danh sach giao dich
        $config['per_page']   = 10;//so luong giao dich hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $where = array();
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        //lọc theo thành viên
        $user = $this->input->get('user');
        if($user)
        {
            $where['user_id'] = $user;
        }
        
        //lọc theo cổng thanh toán
        $payment = $this->input->get('payment');
        if($payment)
        {
            $where['payment'] = $payment;
        }
        
        
        //lọc theo thời gian
        $created_to = $this->input->get('created_to');
        $created    = $this->input->get('created');
        if($created && $created_to)
        {
            //tiem kiem tu ngay A -> B
            $time = get_time_between_day($created,$created_to);
            //nếu dữ liệu trả về hợp lệ
            if(is_array($time))
            {   
                $where['created >='] = $time['start'];
                $where['created <='] = $time['end'];
            }
        }
        //gắn các điệu điện lọc
        $input['where'] = $where;
        
        
        //lay danh sach san pha
        $list = $this->transaction_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['filter'] = $input['where'];
        $this->data['created_to'] = $created_to;
        $this->data['created']    = $created;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/transaction/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /**
     * Xem chi tiet giao dich
     */
    function view()
    {
        //lay id cua giao dịch ma ta muon xoa
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->transaction_model->get_info($id);
        if(!$info)
        {
            return false;
        }
        $info->_amount = number_format($info->amount);




        //lấy danh sách đơn hàng  của giao dịch này
        $this->load->model('order_model');
        $input = array();
        $input['where'] = array('transaction_id' => $id);
        $orders = $this->order_model->get_list($input);
        if(!$orders)
        {
            return false;
        }
        //load model sản phẩm product_model
        $this->load->model('product_model');
        foreach ($orders as $row)
        {
            //thông tin sản phẩm
            $product = $this->product_model->get_info($row->product_id);
            $product->image = base_url('upload/product/'.$product->image_link);
            $product->_url_view = site_url('product/view/'.$product->id);           
            $row->_price = number_format($product->price);
            $row->_amount = number_format($row->amount);
            $row->product = $product;
            
        }
        
        $this->data['info']   = $info;
        $this->data['orders'] = $orders;
        // Tai file thanh phan
        $this->load->view('admin/transaction/view', $this->data);
    }
    
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);

        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
        redirect(admin_url('transaction'));
    }
    
    /*
     * Xóa nhiều sản phẩm
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $transaction = $this->transaction_model->get_info($id);
        if(!$transaction)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
            redirect(admin_url('transaction'));
        }
        //thuc hien xoa san pham
        $this->transaction_model->delete($id);
        
    }
}
