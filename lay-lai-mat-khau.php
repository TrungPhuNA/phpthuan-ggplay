<?php
include 'autoload/autoload.php';
include './layouts/header.php';
$email = getInput('email');
if ($email) {

    $is_check = $db->fetchOne("user","email = '".$email."'");
    if ($is_check == NULL)
    {
        echo "<script type='text/javascript'>alert('Không tồn tại user trong hệ thống');location.href='/index.php'</script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data  =
            [
                'password'         => postInput('password'),
                'password_confirm' => postInput('password_confirm')
            ];
        $error = [];
        {
            if (postInput('password') == '') {
                $error['password'] = "Dữ liệu không được để trống";
            }

            if (postInput('password_confirm') == '') {
                $error['password_confirm'] = "Dữ liệu không được để trống";
            }

            if(postInput('password_confirm') && postInput('password_confirm') != postInput('password'))
            {
                $error['password_confirm'] = "Mật khẩu xác nhận không đúng";
            }

            if (empty($error)) {

                $idupdate = $db->update("user", [
                    'password' => md5(postInput('password'))
                ], array('id' => $is_check['id']));
                if ($idupdate > 0) {
                    header("location: dang-nhap.php");exit();
                } else {

                }
            }
        }
    }

}else{
    echo "<script type='text/javascript'>alert('Không tồn tại email');location.href='/index.php'</script>";
}
?>
<div style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <?php include './layouts/sidebar.php' ?>
            <div class="col-sm-6 col-sm-offset-2" style="min-height: 70vh">
                <div class="main-content">
                    <section class="box-main1">
                        <h3 class="title-main">Lấy lại mật khẩu - Cập nhật mật khẩu mới</h3>
                        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form"
                              style="margin-top: 20px">
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Mật khẩu mới</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" value="">
                                    <?php if (isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password']; ?></p>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Xác nhận mật
                                    khẩu</label>
                                <div class="col-md-8">
                                    <input type="password" name="password_confirm" class="form-control" value="">
                                    <?php if (isset($error['password_confirm'])): ?>
                                        <p class="text-danger"><?php echo $error['password_confirm']; ?></p>
                                    <?php endif;?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success col-md-2  col-md-offset-6">Cập nhật</button>
                        </form>
                        <!--content-->
                    </section>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './layouts/footer.php'
    ?>
</div>
</body>
</html>
