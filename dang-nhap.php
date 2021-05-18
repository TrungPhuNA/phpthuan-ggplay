<?php 
	require_once __DIR__. "/autoload/autoload.php";
    if (isset($_SESSION['name_id'])) 
    {
        echo "<script type='text/javascript'>alert('Bạn đã đăng nhập');location.href='index.php'</script>";
    }

    $data = 
    [
        'email'     => postInput("email"),
        'password'  => postInput("password")
    ];
    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($data['email'] == '') 
        {
            $error['email'] = "Chưa nhập email";
        }
        if ($data['password'] == '') 
        {
            $error['password'] = "Chưa nhập password";
        }
        if (empty($error))
        {
            $is_check = $db->fetchOne("user","email = '".$data['email']."' AND password = '".MD5($data['password'])."'");
            if ($is_check != NULL)
            {
                $_SESSION['name_user'] = $is_check['name'];
                $_SESSION['name_id'] = $is_check['id'];
                echo "<script>location.href='index.php' </script>";
            }
            else 
            {
                $_SESSION['error'] = "Đăng nhập thất bại";
            }
        }
    }


?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-6 col-md-offset-3 bor" style="margin-top: 50px">
            
            <section class="box-main1">
                <h3 class="title-main">Đăng nhập</a> </h3><br>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <strong>Success! </strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                    </div>
                <?php endif;?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <strong>Error! </strong><?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                    </div>
                <?php endif;?>

                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Email</label>
                		<div class="col-md-8">
                			<input type="email" name="email" placeholder="" class="form-control">
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
                	<button type="submit" class="btn btn-primary col-md-2  col-md-offset-6">Đăng nhập</button>
                </form>
            </section>
            <p style="    margin-top: 24px;    margin-left: 29px;"><a href="/quen-mat-khau.php"> Quên mật khẩu</a></p>
        </div>
