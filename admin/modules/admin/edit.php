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
        $data =
        [
            "name"      => postInput('name'),
            "email"     => postInput('email'),
            "phone"     => postInput('phone'),
            "address"   => postInput('address'),
            "level"     => postInput('level')
        ];
        
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Bạn chưa nhập tên";
        }

        if (postInput('email') == '')
        {
            $error['email'] = "Bạn chưa nhập email";
        }

        if (postInput('phone') == '')
        {
            $error['phone'] = "Bạn chưa nhập sđt";
        }

        if (postInput('address') == '')
        {
            $error['address'] = "Bạn chưa nhập địa chỉ";
        }

        if (empty($error)) 
        {
            
            $id_update = $db->update("admin",$data, array("id"=>$id));
            if ($id_update > 0)
            {
                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin("admin");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật thất bại";
                redirectAdmin("admin");
            }
        }
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới danh mục
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i><a href="index.html">Trang chính</a>
                </li>
                <li>
                    <a href="#">Admin</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sửa
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
                    <label for="inputdm3" class="col-sm-2 control-label">Họ và tên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputmd3" placeholder="" name="name" value="<?php echo $Editadmin['name'] ?>">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputmd3" placeholder="...@mail.com" name="email" value="<?php echo $Editadmin['email'] ?>">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputmd3" placeholder="" name="phone" value="<?php echo $Editadmin['phone'] ?>">
                        <?php if (isset($error['phone'])): ?>
                            <p class="text-danger"> <?php echo $error['phone']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputmd3" placeholder="" name="address" value="<?php echo $Editadmin['address'] ?>">
                        <?php if (isset($error['address'])): ?>
                            <p class="text-danger"> <?php echo $error['address']; ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="level">
                            <option value="1" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 1 ? "selected = 'selected'" : '' ?>>CTV</option>
                            <option value="2" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 2 ? "selected = 'selected'" : '' ?>>Admin</option>
                            
                        </select>
                        <?php if (isset($error['level'])): ?>
                            <p class="text-danger"> <?php echo $error['level']; ?></p>
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
