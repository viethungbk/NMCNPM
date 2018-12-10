<?php
/**
*Lấy ngày từ dạng int
*@$time: int thời gian muốn hiển thị
*@$full_time: cho biết có lấy cả giờ phút giây không
*/ 
function get_date($time, $full_time=true)
{
	$format='%d-%m-%Y';
	//Nếu muốn lấy cả giờ phút giây
	if($full_time)
	{
		$format=$format.' - %H:%i:%s';

	}
	/**
	*Hàm mdate có 2 tham số 
	*@$format: định dạng muốn hiển thị
	*@$time: thời gian dưới dạng int
	*/
	$date=mdate($format, $time);
	return $date;
}
 ?>
