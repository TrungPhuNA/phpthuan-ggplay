<?php
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";


    $id = intval(getInput('id'));

    $Editproduct = $db->fetchID("product",$id);
    if (empty($Editproduct)) 
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
    }

    $category = $db->fetchAll("category");
    $user = $db->fetchAll("user");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data =
        [
            "category_id"   => postInput('category_id'),
            "user_id"   => postInput('user_id'),
            "name"          => postInput('name'),
            "slug"          => to_slug(postInput('name')),
            "price"         => postInput('price'),
            "content"       => postInput('content'),
            "sale"          => postInput('sale'),
            "number"        => postInput('number'),
            "descs"        => postInput('descs')
        ];
        $error = [];

        if (postInput('name') == '')
        {
            $error['name'] = "Bạn chưa nhập tên sản phẩm";
        }

        if (postInput('descs') == '')
        {
            $error['descs'] = "Bạn chưa nhập descs";
        }

        if (postInput('sale') == '')
        {
            $error['sale'] = "Bạn chưa nhập tên sale";
        }

        if (postInput('category_id') == '')
        {
            $error['category_id'] = "Bạn chưa nhập danh mục";
        }

        if (postInput('user_id') == '')
        {
            $error['user_id'] = "Bạn chưa nhập tên nhà phát triển";
        }

        if (postInput('price') == '')
        {
            $error['price'] = "Bạn chưa nhập giá sản phẩm";
        }

        if (postInput('content') == '')
        {
            $error['content'] = "Bạn chưa nhập nội dung";
        }

        if (postInput('number') == '')
        {
            $error['number'] = "Bạn chưa nhập số lượng";
        }

        if (empty($error)) 
        {
            if (isset($_FILES['thumbn']))
            {
                $file_name  = $_FILES['thumbn']['name'];
                $file_tmp   = $_FILES['thumbn']['tmp_name'];
                $file_type  = $_FILES['thumbn']['type'];
                $file_erro  = $_FILES['thumbn']['error'];

                if ($file_erro == 0) 
                {
                    $part = ROOT ."product/";
                    $data['thumbn'] = $file_name;
                    move_uploaded_file($file_tmp, $part.$file_name);
                }
            }
            $update = $db->update("product",$data,array("id" => $id));
            if ($update > 0)
            {

                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin("product");
            }
            else
            {
                $_SESSION['error'] = "Cập nhật thất bại";
                redirectAdmin("product");

            }
        }
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa danh mục
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i><a href="index.html">Trang chính</a>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
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
                    <label for="inputdm3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="category_id">
                            <option value="">- Mời bạn chọn danh mục sản phẩm -</option>
                            <?php foreach ($category as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php echo $Editproduct['category_id'] == $item['id'] ? "selected = 'selected'" :''?>><?php echo $item['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($error['category_id'])): ?>
                            <p class="text-danger"> <?php echo $error['category_id']; ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Nhà phát triển</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="user_id">
                            <option value="">- Mời bạn chọn nhà phát triển -</option>
                            <?php foreach ($user as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php echo $Editproduct['user_id'] == $item['id'] ? "selected = 'selected'" :''?>><?php echo $item['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($error['user_id'])): ?>
                            <p class="text-danger"> <?php echo $error['user_id']; ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputmd3" placeholder="Sản phẩm" name="name" value="<?php echo $Editproduct['name'] ?>">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputmd3" value="<?= $Editproduct['descs'] ?>" placeholder="Mô tả" name="descs">
                        <?php if (isset($error['descs'])): ?>
                            <p class="text-danger"> <?php echo $error['descs']; ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Giá sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputmd3" placeholder="Giá" name="price" value="<?php echo $Editproduct['price'] ?>">
                        <?php if (isset($error['price'])): ?>
                            <p class="text-danger"> <?php echo $error['price']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Số lượng</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputmd3" placeholder="Số lượng" name="number" value="<?php echo $Editproduct['number']; ?>">
                        <?php if (isset($error['number'])): ?>
                            <p class="text-danger"> <?php echo $error['number']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Giảm giá</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="inputmd3" placeholder="Giảm giá" name="sale" value="<?php echo $Editproduct['sale']; ?>">
                    </div>

                    <label for="inputdm3" class="col-sm-1 control-label">Hình ảnh</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" id="inputmd3" name="thumbn">
                        <?php if (isset($error['thumbn'])): ?>
                            <p class="text-danger"> <?php echo $error['thumbn']; ?></p>
                        <?php endif ?>
                        <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['thumbn'] ?>" width="50px" height="50px">
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputdm3" class="col-sm-2 control-label">Nội dung</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="content" rows="2"><?php echo $Editproduct['content']; ?></textarea>
                        <?php if (isset($error['content'])): ?>
                            <p class="text-danger"> <?php echo $error['content']; ?></p>
                        <?php endif ?>
                    </div>
                </div> 

                <div class="form-group">
                    
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
