<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID("category",$id);
    if (empty($EditCategory)) 
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];
        $error = [];
        if (postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập đầy đủ";
        }
        if (empty($error))
        {
            if($EditCategory['name'] != $data['name'])
            {
                $isset = $db->fetchOne("category","name = '".$data['name']."'");
                if(count($isset) > 0)
                {
                    $_SESSION['error'] = "Danh mục đã tồn tại";
                }
                else
                {
                    $id_update = $db->update("category",$data,array('id'=>$id));
                    if ($id_update > 0) 
                    {
                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("category");
                    }
                    else 
                    {
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("category");
                    }
                } 
            }
            else
            {
                $id_update = $db->update("category",$data,array('id'=>$id));
                if ($id_update > 0) 
                {
                    $_SESSION['success'] = "Sửa thành công";
                    redirectAdmin("category");
                }
                else 
                {
                    $_SESSION['error'] = "Dữ liệu không thay đổi";
                    redirectAdmin("category");
                }
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
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Trang chính</a>
                </li>
                <li>
                    <a href="#">Danh mục</a>
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
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Tên danh mục</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputmd3" placeholder="Danh mục" name="name" value="<?php echo $EditCategory['name'] ?>"> 
                    </div>
                </div>
                <!--<div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>-->
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?> 
