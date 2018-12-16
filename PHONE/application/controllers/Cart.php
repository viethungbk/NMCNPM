<?php 
/**
 * 
 */
class Cart extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
	}	

	/*
	* Thêm sản phẩm vao giỏ hàng
	*/
	function add($id){

		//lấy ra sản phẩm muốn thêm vào giỏ hàng
		$this->load->model('product_model');
		$id=$this->uri->rsegment(3);
		$product=$this->product_model->get_info($id);

		//nếu không tồn tại sản phẩm thì redirect về trang chủ
		if(!$product){
			redirect();
		}

		//nếu có tồn tại sản phẩm thì thêm sản phẩm vào trong giỏ hàng
		//tổng số sản phẩm 
		$qty=1;
		$price=$product->price;
		if($product->discount>0)
		{
			$price=$product->price - $product->discount;
		}

		//thông tin thêm vào giỏ hàng
		$data=array();//biến chứa thông tin sản phẩm
		$data['id']=$product->id;
		$data['qty']=$qty;
		$data['name']=url_title($product->name);
		$data['image_link']=$product->image_link;
		$data['price']=$price; 
		$this->cart->insert($data);

		//chuyển sang trang danh sách sản phẩm trong giỏ hàng
		redirect(base_url('cart'));
	}	

	/*
	* Hiển thị ra danh sách sản phẩm trong giỏ hàng
	*/
	function index()
	{
		//thông tin giỏ hàng
		$carts=$this->cart->contents();
		//tổng số sản phẩm có trong giỏ hàng
		$total_items=$this->cart->total_items();

		$this->data['total_items']=$total_items;
		$this->data['carts']=$carts;

		$this->data['temp']='site/cart/index';
		$this->load->view('site/layout', $this->data);
	}

	/**
	* Cập nhật giỏ hàng
	*/
	function update()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            //tong so luong san pham
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }

    
    /*
     * Xoa sản phẩm trong gio hang
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id > 0)
        {
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row)
            {
                if($row['id'] == $id)
                {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }else{
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
}	
 ?>