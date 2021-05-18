<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";
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
            $isset = $db->fetchOne("category","name = '".$data['name']."'");
            if(count($isset) > 0)
            {
                $_SESSION['error'] = "Danh mục đã tồn tại";
            }
            else
            {
                $id_insert = $db->insert("category",$data);
                if ($id_insert > 0) 
                {
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("category");
                }
                else 
                {
                    $_SESSION['error'] = "Thêm mới thất bại";
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
                    <i class="fa fa-dashboard"></i><a href="index.html">Dashboard</a>
                </li>
                <li>
                    <a href="#">Danh mục</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thêm mới
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
                        <input type="text" class="form-control" id="inputmd3" placeholder="Danh mục" name="name">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
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
