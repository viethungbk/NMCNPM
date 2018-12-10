<?php 
function public_url($url = '')
{
	return base_url('public/'.$url);
}

	//function chuyên để in dữ liệu
function pre($list,$exit=true)
{
	echo "<pre>";
	print_r($list);
	if($exit)
	{
		die();
	}
}
?>