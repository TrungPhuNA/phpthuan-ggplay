<?php
    include 'autoload/autoload.php';
    include './layouts/header.php';

    $id = intval(getInput('id'));
    $sqlDetail =  "SELECT product.*,user.name as name_auth FROM product LEFT JOIN user on user.id = product.user_id WHERE product.id = $id";
    $product = $db->fetchsql( $sqlDetail)[0] ?? '';

    $_SESSION['id_product'] = $product['id'];
    $id_product = $_SESSION['id_product'];

    $cateid = intval($product['category_id']);
    $category = $db->fetchID('category', $cateid);

    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY id DESC LIMIT 4";
    $sanphamkemtheo = $db->fetchsql($sql);
    $sql2 = "SELECT comments.*, user.name as name_auth, user.avatar as avatar FROM comments LEFT JOIN user on user.id = comments.id_user WHERE id_product = $id_product  ORDER BY id DESC";
    $comments = $db->fetchsql($sql2);
?>
<div style="margin-top: 50px;">
    <style>
        #ratings i {
            font-size: 18px;
            color: #eff0f5;
            cursor: pointer;
        }
        #ratings i.active, .glyphicon-star.active {
            color: #f57223 !important;
        }

    </style>
    <div class="container-fluid">
        <div class="row">
            <?php include './layouts/sidebar.php'?>
            <div class="col-sm-10">
                <div class="box-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#"><?= $category['name'] ?>></a></li>
                        <li class="active"><?= $product['name'] ?></li>
                    </ol>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="content row d-flex">
                                <div class="avatar col-sm-3">
                                    <a href="" class="img">
                                        <img src="<?php echo uploads() ?>/product/<?php echo $product['thumbn'] ?>" style="max-width: 100%">
                                    </a>
                                </div>
                                <div class="info col-sm-9">
                                    <h1><?= $product['name'] ?></h1>
                                    <p>
                                        <span><a href=""><?= $product['name_auth'] ?></a> <?= $product['created_at'] ?></span>
                                        <?php
                                            $age = 0;
                                            if($product['total_review'] > 0)
                                            {
                                                $age = round($product['number_review'] / $product['total_review'],2);
                                            }
                                        ?>
                                        <span class="start">
                                               <?php for($i = 1 ; $i <= 5; $i ++) :?>
                                                   <span class="glyphicon glyphicon-star <?= $i <= $age ? 'active' : '' ?>" aria-hidden="true"></span>
                                               <?php endfor ;?>

                                                <span><?= $product['total_review'] ?></span>
                        					</span>
                                    </p>
                                    <p class="info-footer">
                                        <?php if($product['price']) :?>
                                            <p class="price btn btn-customer">Giá : <?php echo formatPrice($product['price']); ?></p>
                                        <?php else :?>
                                            <a href="" class="btn btn-customer">Miễn phí</a>
                                        <?php endif; ?>


                                    </p>
                                </div>
                            </div>
                            <div>
                                <div jsname="bN97Pc" class="description" itemprop="description" style="max-height: none;">
                                    <?= $product['descs'] ?>
                                    <p class="bg-article"></p>
                                    <a href="javascript:void(0)" class="btn-detail jsArticle">
                                        <span>Đọc thêm</span>
                                    </a>
                                    <div class="hide js-content-pro"><?= $product['content'] ?></div>
                                </div>
                            </div>
                            <hr>
<!--                            <h4>Giới thiệu tác giả</h4>-->
<!--                            <div jsname="bN97Pc" class="DWPxHb description" itemprop="description" style=""><span jsslot=""><p></p><p>Nguyễn Nga tốt nghiệp Khoa Báo chí-Truyền thông, trường ĐH Khoa học xã hội và Nhân văn TP.HCM</p><p><br></p><p>Tốt nghiệp Khóa đạo diễn ngắn hạn trường ĐH Sân khấu-Điện ảnh TP.HCM</p><p><br></p><p>Ngoài công việc biên kịch, nhà văn, tác giả còn là blogger, sống và làm việc tại TP.HCM.</p><p><br></p><p>Tác giả kịch bản phim truyền hình Tía ơi đừng say, Thầy đổi nghề...</p><p><br></p><p>Một số truyện ngắn tiêu biểu như: Món nợ(Tạp chí Tiếp thị và Gia đình), Đêm trăng đời người, Tìm thấy thiên đường(Báo Phụ nữ TP.HCM)...</p><p><br></p><p>Đăng ký blog cá nhân của cô ấy để đọc những câu chuyện hay, ý nghĩa về tình yêu, hôn nhân, gia đình, cuộc sống.&nbsp;</p><p>Những bài viết chia sẻ kinh nghiệm viết lách, SEO, bán sách, ebook và kịch bản phim.</p><p><br></p><p>Blog:http://www.vietlachvn.com/</p><p><br></p><p>Instagram:https://www.instagram.com/vietlachvn/</p>-->
<!--			</span><div jsname="WgKync" class="uwAgLc f3Fr9d qAWA2"></div></div>-->
<!--                            <div style="clear: both;"></div>-->
                            <h4>Đánh giá</h4>
                            <div class="block-reviews" id="block-review">
                                <form action="/danh-gia.php" id="form-review" method="POST">
                                    <div>
                                        <p style="margin-bottom: 0">
                                            <span>Chọn số sao yêu thích</span>
                                            <span id="ratings">
                                               <?php for($i = 1 ; $i <= 5; $i ++) :?>
                                                    <i class="glyphicon glyphicon-star active" data-i="<?= $i ?>"></i>
                                                <?php endfor ;?>
                                            </span>
                                            <span class="reviews-text" id="reviews-text">Tuyệt vời</span>
                                        </p>
                                        <span style="color: red;margin-bottom: 10px;display: block">(Đặt con chuột vào ngôi sao bạn muốn đánh giá)</span>
                                    </div>
                                    <div>
                                        <textarea name="content_review"  class="form-control" id="rv_content" cols="30" rows="5" placeholder="Nội dung đánh giá "></textarea>
                                        <input type="hidden" name="review" id="review_value" value="5">
                                        <input type="hidden" name="product_id"  value="<?= $product['id'] ?>">
                                    </div>
                                    <button type="submit" style="font-size: 14px;margin-top: 10px" class="btn btn-success js-process-review">Đánh giá</button>
                                </form>
                            </div>
                            <div class="rating">
                                <div style="color: ">

                                    <h4 class="number-start"><?= $age ?></h4>
                                    <div class="start">
                                        <?php for($i = 1 ;$i <= 5 ; $i ++) :?>
                                            <span class="glyphicon glyphicon-star <?= $i <= $age ? 'active' : '' ?>" aria-hidden="true"></span>
                                        <?php endfor; ?>
                                    </div>
                                    <div><i class="glyphicon glyphicon-user"></i> Tổng <b><?= $product['total_review'] ?></b></div>
                                </div>
                                <div class="lists">
                                    <?php foreach ($comments as $item) :?>
                                    <div class="item">
                                        <div class="avatar" style="width: 50px !important;">
                                            <img src="<?php echo uploads() ?>/avatar/<?= $item['avatar'] ?>" style="width: 50px;">

                                        </div>
                                        <div class="content">
                                            <p><?= $item['name_auth'] ?></p>
                                            <p class="start">
                                                <?php for($i = 1 ;$i <= 5 ; $i ++) :?>
                                                    <span class="glyphicon glyphicon-star <?= $i <= $item['review'] ? 'active' : '' ?>" aria-hidden="true"></span>
                                                <?php endfor; ?>
                                            </p>
                                            <p><?= $item['comment'] ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach ;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-right">

                                <div class="lists">
                                    <h3 style="margin-left: -15px;"><?= $category['name'] ?> <a href="/danh-muc-san-pham.php?id=<?= $cateid ?>" class="btn btn-customer" style="float: right;">Xem thêm</a></h3>
                                    <?php foreach ($sanphamkemtheo as $item) :?>
                                    <div class="item row" style="margin-bottom: 10px;">
                                        <div class="col-sm-3 col-xs-3" style="padding: 0">
                                            <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>" class="img">
                                                <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbn'] ?>">
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="title">
                                                <a href="">Wonder Woman 1984</a>
                                            </h4>
                                            <div class="auth"><a href="">Nga nguyễn</a></div>
                                            <div class="desc"><?= $item['descs'] ?></div>
                                            <div class="footer">
<!--                                                <div class="start">-->
<!--                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
<!--                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
<!--                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
<!--                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
<!--                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
<!--                                                </div>-->
                                                <?php if($item['price']) :?>
                                                    <p class="price ">Giá : <?php echo formatPrice($product['price']); ?></p>
                                                <?php else :?>
                                                    <p class="price">Miễn phí</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
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
