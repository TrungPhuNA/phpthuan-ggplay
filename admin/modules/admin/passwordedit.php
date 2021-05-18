<?php
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

    $id = intval(getInput('id'));

    $Editadmin = $db->fetchID("admin",$id);
    if (empty($Editadmin))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (postInput('password') == '')
        {
            $error['password'] = "Bạn chưa nhập mật khẩu";
        }

        if (postInput('re_password') == '')
        {
            $error['re_password'] = "Bạn chưa nhập lại mật khẩu";
        }

        if (postInput('oldpassword') == '')
        {
            $error['oldpassword'] = "Bạn chưa nhập mật khẩu cũ";
        }
        else
        {
            if (MD5(postInput('oldpassword')) != $Editadmin['password']) 
            {
                $error['oldpassword'] = "Mật khẩu cũ không đúng";
            }
            else
            {
                if (postInput('password') != NULL && postInput('re_password') != NULL) 
                {
                    if (postInput('password') == postInput('oldpassword'))
                    {
                        $error['password'] = "Mật khẩu mới trùng với mật khẩu cũ";
                    }
                    if (postInput('password') != postInput('re_password')) 
                    {
                        $error['password'] = "Mật khẩu thay đổi không trùng khớp";
                    }
                    else
                    {
                        $data['password'] = MD5(postInput("password"));
                    }
                }

                if (empty($error)) 
                {
                    
                    $id_update = $db->update("admin",$data, array("id"=>$id));
                    if ($id_update > 0)
                    {
                        $_SESSION['success'] = "Đổi mật khẩu thành công";
                        redirectAdmin("admin");
                    }
                    else
                    {
                        $_SESSION['error'] = "Đổi mật khẩu thất bại";
                        redirectAdmin("admin");
                    }
                }            
            }
        }
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Đổi mật khẩu
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i><a href="index.html">Dashboard</a>
                </li>
                <li>
                    <a href="#">Admin</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Password
                </li>
            </ol> 
            <div class="clearfix"></div>
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputmd3" placeholder="********" name="oldpassword" value="">
                        <?php if (isset($error['oldpassword'])): ?>
                            <p class="text-danger"> <?php echo $error['oldpassword']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputmd3" placeholder="********" name="password" value="">
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"> <?php echo $error['password']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputmd3" placeholder="********" name="re_password" value="">
                        <?php if (isset($error['re_password'])): ?>
                            <p class="text-danger"> <?php echo $error['re_password']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?> 
