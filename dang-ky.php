<?php
	require_once __DIR__. "/autoload/autoload.php";
    //$name = $email = $password = $address = $phone = '';
    $data =
    [
        'name'      => postInput('name'),
        'email'     => postInput('email'),
        'password'  => postInput('password'),
        'address'   => postInput('address'),
        'phone'     => postInput('phone')
    ];
    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($data['name'] == '') 
        {
            $error['name'] = "Nhập tên";
        }

        if ($data['email'] == '') 
        {
            $error['email'] = "Nhập email";
        }
        else
        {
            $is_check = $db->fetchOne("user","email = '".$data['email']."'");
            if ($is_check != NULL)
            {
                $error['email'] = "Email đã tồn tại";
            }
        }

        if ($data['password'] == '') 
        {
            $error['password'] = "Nhập password";
        }
        else
        {
            $data['password'] = MD5(postInput('password'));
        }

        if ($data['address'] == '') 
        {
            $error['address'] = "Nhập address";
        }

        /*if (isset($_POST['phone']) && $_POST['phone'] != NULL)
        {
            $phone = $_POST['phone'];
        }*/
        if ($data['phone'] == '') 
        {
            $error['phone'] = "Nhập phone";
        }

        if (empty($error))
        {
            /*$sql = "INSERT INTO user(name,email,password,address,phone) VALUES ('".$name."','".$email."','".$password."','".$address."','".$phone."') ";
            $insert = mysqli_query($conn,$sql) or die("Fail!");*/
            $idinsert = $db->insert("user", $data);
            if ($idinsert > 0)
            {
                $_SESSION['name_id'] = $idinsert;
                $_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
                header("location: dang-nhap.php");
            }
            //$_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
            //header("location: dang-nhap.php");
        }
    }

?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-6 col-md-offset-3 bor" style="margin-top: 50px;">
            
            <section class="box-main1">
                <h3 class="title-main">Đăng ký thành viên</a> </h3>
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Tên thành viên</label>
                		<div class="col-md-8">
                			<input type="text" name="name" placeholder="" class="form-control" value="<?php echo $data['name'] ?>">
                            <?php if (isset($error['name'])): ?>
                                <p class="text-danger"><?php echo $error['name']; ?></p>
                            <?php endif;?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Email</label>
                		<div class="col-md-8">
                			<input type="email" name="email" placeholder="" class="form-control" value="<?php echo $data['email'] ?>">
                            <?php if (isset($error['email'])): ?>
                                <p class="text-danger"><?php echo $error['email']; ?></p>
                            <?php endif;?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Mật khẩu</label>
                		<div class="col-md-8">
                			<input type="password" name="password" placeholder="********" class="form-control">
                            <?php if (isset($error['password'])): ?>
                                <p class="text-danger"><?php echo $error['password']; ?></p>
                            <?php endif;?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                		<div class="col-md-8">
                			<input type="text" name="phone" placeholder="" class="form-control" value="<?php echo $data['phone'] ?>">
                            <?php if (isset($error['phone'])): ?>
                                <p class="text-danger"><?php echo $error['phone']; ?></p>
                            <?php endif;?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                		<div class="col-md-8">
                			<input type="text" name="address" placeholder="" class="form-control" value="<?php echo $data['address'] ?>">
                            <?php if (isset($error['address'])): ?>
                                <p class="text-danger"><?php echo $error['address']; ?></p>
                            <?php endif;?>
                		</div>
                	</div>
                	<button type="submit" class="btn btn-success col-md-2  col-md-offset-6">Đăng ký</button>
                    <p style="    margin-top: 24px;    margin-left: 29px;"><a href="/quen-mat-khau.php"> Quên mật khẩu</a></p>
                </form>
                <!--content-->
            </section>
<!--    --><?php //require_once __DIR__. "/layouts/footer.php"; ?>
