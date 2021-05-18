
<?php 
	require_once __DIR__. "/autoload/autoload.php";
    if (!isset($_SESSION['name_id'])) 
    {
        echo "<script type='text/javascript'>alert('Bạn phải đăng nhập!');location.href='index.php'</script>";

    }
	else
	{
		$id = intval(getInput('id'));

		//chi tiết sp
		$product = $db->fetchID("product", $id);

		//kiểm tra giỏ hàng
		if (!isset($_SESSION['cart'][$id]))
		{
			//tạo mới
			$_SESSION['cart'][$id]['name'] 		= $product['name'];
			$_SESSION['cart'][$id]['thumbn'] 	= $product['thumbn'];
			$_SESSION['cart'][$id]['price'] 	= ((100 - $product['sale']) * $product['price'])/100;
			$_SESSION['cart'][$id]['qty'] 		= 1;
		}
		else 
		{
			//cập nhật
			$_SESSION['cart'][$id]['qty'] += 1;
			$_SESSION['sosp'] +=1;

		}
		echo "<script>alert('Thêm sản phẩm thành công');location.href='gio-hang.php'</script>";
	}


?>