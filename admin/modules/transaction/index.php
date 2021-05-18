<?php
    $open = "transaction";
    require_once __DIR__. "/../../autoload/autoload.php";

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else 
    {
        $p = 1;
    }

    $sql = "SELECT transaction.*, user.name as nameuser, user.phone as phoneuser FROM transaction LEFT JOIN user ON user.id = transaction.users_id ORDER BY ID DESC";
    $transaction = $db->fetchJone('transaction',$sql,$p,3,true);

    if (isset($transaction['page']))
    {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }

    ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Quản lí đơn hàng
                <a href="add.php" class="btn btn-primary">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sản phẩm
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
                            <th>Phone</th>
                            <th>Giá</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($transaction as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['nameuser'] ?></td>
                            <td><?php echo $items['phoneuser'] ?></td>
                            <td><?php echo $items['amount']; ?></td>
                            <td>
                                <a href="status.php?id=<?php echo $items['id']  ?>" class="btn-sm <?php echo $items['status'] == 0 ? 'btn-danger' : 'btn-primary' ?>"><?php echo $items['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="edit.php?id=<?php echo $items['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
                
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
