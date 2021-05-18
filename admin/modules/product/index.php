<?php
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else 
    {
        $p = 1;
    }

    $sql = "SELECT product.*,category.name as namecate FROM product
        LEFT JOIN category on category.id = product.category_id";
    $product = $db->fetchJone('product',$sql,$p,10,true);

    if (isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }

    ?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách sản phẩm
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
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Hình ảnh</th>
                            <th>Thông tin</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($product as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['slug'] ?></td>
                            <td><?php echo $items['namecate'] ?></td>
                            <td>
                                <img src="<?php echo uploads() ?>product/<?php echo $items['thumbn'] ?>" width="80px" height="80px">
                            </td>
                            <td>
                                <ul>
                                    <li>Giá: <?php echo $items['price']; ?></li>
                                    <li>Sale: <?php echo $items['sale']; ?></li>
                                    <li>Số lượng: <?php echo $items['number']; ?></li>
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="edit.php?id=<?php echo $items['id'] ?>"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
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
