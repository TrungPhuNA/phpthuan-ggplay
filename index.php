<?php
    include 'autoload/autoload.php';
    include './layouts/header.php';

    $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at";
    $CategoryHome = $db->fetchsql($sqlHomecate);
    $data = [];
    foreach ($CategoryHome as $item)
    {
        $cateId = intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = $cateId LIMIT 4";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
    }
?>
<div style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <?php include './layouts/sidebar.php'?>
            <div class="col-sm-10">
                <div class="main-content">
                    <?php foreach ($data as $key => $product): ?>
                    <div class="lists">
                        <div class="page-header">
                            <h1><?= $key ?> <a href="/danh-muc-san-pham.php?id=<?= $product[0]['category_id'] ?? 0 ?>" class="btn btn-danger">Xem thêm</a></h1>
                        </div>
                        <div class="page-content">
                            <div class="lists-content">
                                <?php include "./layouts/prodcts.php"; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
