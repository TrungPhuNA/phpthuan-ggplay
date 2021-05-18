
<?php 
	require_once __DIR__. "/autoload/autoload.php";
	$user = $db->fetchID("user",intval($_SESSION['name_id']));

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$data =
		[
			'amount' => $_SESSION['total'],
			'users_id' => $_SESSION['name_id'],
			'note' => postInput('note')
		];
		$idtran = $db->insert("transaction",$data);
		if ($idtran > 0)
		{
			foreach ($_SESSION['cart'] as $key => $value) 
			{
				$data2 =
				[
					'transaction_id' => $idtran,
					'product_id' => $key,
					'qty' => $value['qty'],
					'price' => $value['price']
				];
				$id_insert = $db->insert("orders",$data2);
			}

			$_SESSION['success'] = "Lưu thông tin đơn hàng thành công";
			header("location: thong-bao.php");
		}
		
	}
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            
            <section class="box-main1">
                <h3 class="title-main" style="text-decoration: none;"><a href="javascript:void(0)" style="font-family: sans-serif;"> Thanh toán đơn hàng </a> </h3>
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Tên thành viên</label>
                		<div class="col-md-8">
                			<input readonly type="text" name="name" placeholder="" class="form-control" value="<?php echo $user['name'] ?>">
                            
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Email</label>
                		<div class="col-md-8">
                			<input readonly type="email" name="email" placeholder="" class="form-control" value="<?php echo $user['email'] ?>">
                            
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                		<div class="col-md-8">
                			<input readonly type="text" name="phone" placeholder="" class="form-control" value="<?php echo $user['phone'] ?>">
                            
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                		<div class="col-md-8">
                			<input readonly type="text" name="address" placeholder="" class="form-control" value="<?php echo $user['address'] ?>">
                            
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số tiền thanh toán</label>
                		<div class="col-md-8">
                			<input readonly type="text" name="address" placeholder="" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
                            
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Ghi chú</label>
	                    <div class="col-sm-8">
	                        <textarea class="form-control" name="note" rows="2"></textarea>
	                    </div>
	                </div> 
                	
                	<button type="submit" class="btn btn-success col-md-2  col-md-offset-6">Xác nhận</button>
                </form>
                <!--content-->
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>