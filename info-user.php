<?php
    include 'autoload/autoload.php';
    include './layouts/header.php';
    if (isset($_SESSION['name_id']))
    {
        $id = intval($_SESSION['name_id']);
        $EditUser = $db->fetchID("user",$id);
        if (empty($EditUser))
        {
            header("location: info-user.php");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $data =
                [
                    'name'      => postInput('name'),
                    'address'   => postInput('address'),
                    'phone'     => postInput('phone')
                ];
            $error = [];
            {
                if (postInput('name') == '')
                {
                    $error['name'] = "Nhập tên";
                }
                if (postInput('phone') == '')
                {
                    $error['phone'] = "Nhập sđt";
                }
                if (postInput('address') == '')
                {
                    $error['address'] = "Nhập địa chỉ";
                }
                if (isset($_FILES['avatar']))
                {
                    $file_name  = $_FILES['avatar']['name'];
                    $file_tmp   = $_FILES['avatar']['tmp_name'];
                    $file_type  = $_FILES['avatar']['type'];
                    $file_erro  = $_FILES['avatar']['error'];

                    if ($file_erro == 0)
                    {
                        $part = ROOT ."avatar/";
                        $data['avatar'] = $file_name;
                        move_uploaded_file($file_tmp, $part.$file_name);
                    }
                }

                if (empty($error))
                {
                    $idupdate = $db->update("user", $data, array('id'=>$id));
                    if ($idupdate > 0)
                    {
                        $_SESSION['name_user'] = $data['name'];
                        $_SESSION['avatar_user'] = $data['avatar'];
                        header("location: info-user.php");
                    }
                    else
                    {
                        $_SESSION['name_user'] = $data['name'];
                        header("location: info-user.php");
                    }
                }
            }
        }
    }
    else
    {
        header("location: info-user.php");

    }
?>
<div style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <?php include './layouts/sidebar.php'?>
            <div class="col-sm-6 col-sm-offset-2">
                <div class="main-content">
                    <section class="box-main1">
                        <h3 class="title-main">Cập nhật thông tin</a> </h3>
                        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form" style="margin-top: 20px">
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Tên thành viên</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" value="<?php echo $EditUser['name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone" class="form-control" value="<?php echo $EditUser['phone'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                                <div class="col-md-8">
                                    <input type="text" name="address" class="form-control" value="<?php echo $EditUser['address'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Avatar</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" id="inputmd3" name="avatar">
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
