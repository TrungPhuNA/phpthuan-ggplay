<?php
    include 'autoload/autoload.php';
    include './layouts/header.php';

    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID("category", $id);

    if (isset($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
    {
        $p = 1;
    }
    $sql = "SELECT * FROM product WHERE 1 ";
    $k = getInput('k');

    if($k)
        $sql .= "AND name LIKE '%$k%'";

    $total = count($db->fetchsql($sql));

    $product = $db->fetchJones("category",$sql,$total,$p,20,true);
    $sotrang = $product['page'];
    unset($product['page']);
    $path = $_SERVER['SCRIPT_NAME'];
?>
<div style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2" style="padding: 0">
                <div class="nav-sidebar-left">
                    <ul class="">
                        <li><a href="">Tài khoản</a></li>
                        <li><a href="">Phương thức thanh toán</a></li>
                        <li><a href="">Danh sách yêu thích</a></li>
                        <li><a href="">Hoạt động của tôi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="main-content">
                    <div class="lists">
                        <div class="page-header">
                            <h1>Kết quả tìm kiếm phù hợp</h1>
                        </div>
                        <div class="page-content">
                            <div class="lists-content">
                                <?php include './layouts/prodcts.php' ?>
                            </div>
                        </div>
                    </div>
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
