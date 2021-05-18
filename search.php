
<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <br>
            <section class="box-main1">
                <div class="showitem clearfix">
                    <?php
                        if (isset($_GET['search'])) {$key = $_GET['search'];} else {$key = '';}
                        $sql = "SELECT * FROM product WHERE name LIKE '%$key%'";
                        $ProductHome = $db->fetchsql($sql); 
                    ?>
                    <div><h4 style="font-style: italic;">Có <span class="h4" id="soluong"></span> kết quả tìm kiếm với từ khóa "<?php echo $key?>"<h4></div><br>
                    <?php $soluong = 0; foreach ($ProductHome as $item): ?>
                        <div class="col-md-3  item-product bor">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>">
                            <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbn'] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><?php echo $item['name'] ?></a>
                                <p>
                                    <strike class="sale"><?php echo formatPrice($item['price']); ?></strike> 
                                    <br> 
                                    <b class="price"><?php echo formatpricesale($item['price'],$item['sale']); ?></b>
                                </p>
                            </div>
                            <div class="hidenitem">
                                <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>"><i class="fa fa-search"></i></a></p>
                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                            </div>
                        </div>
                    <?php $soluong++; endforeach; ?>
                    <script type="text/javascript">
                        document.getElementById("soluong").innerHTML = "<?php echo $soluong?>";
                    </script>
                </div>
            </section>
        </div>

    <?php require_once __DIR__. "/layouts/footer.php"; ?>