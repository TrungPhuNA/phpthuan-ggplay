<?php
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else 
    {
        $p = 1;
    }

    $sql = "SELECT user.* FROM user ORDER BY ID DESC";
    $user = $db->fetchJone('user',$sql,$p,3,true);

    if (isset($user['page']))
    {
        $sotrang = $user['page'];
        unset($user['page']);
    }

    ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách thành viên
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thành viên
                </li>
            </ol>
            <div class="clearfix"></div>
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($user as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['phone'] ?></td>
                            <td><?php echo $items['email'] ?></td>
                            <td><?php echo $items['address'] ?></td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $items['id'] ?>"><i class="fa fa-times"></i>&nbsp;Xóa</a>
                            </td>
                        </tr>
                    <?php $stt++; endforeach ?>
                    </tbody>
                </table>
            <div class="pull-right">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i<= $sotrang; $i++): ?>
                            <?php  
                            if (isset($_GET['page']))
                            {
                                $p = $_GET['page'];
                            }
                            else
                            {
                                $p = 1;
                            }
                            ?>
                            <li class="<?php echo($i == $p) ? 'active' : '' ?>">
                                <a href="?page=<?php echo $i;?>"><?php echo $i;?></a>
                            </li>
                        <?php endfor; ?>
                        <li>
                            <a href="" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
