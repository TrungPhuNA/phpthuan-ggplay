<style>
    .glyphicon-star.active {
        color: #f57223 !important;
    }
</style>
<?php foreach ($product as $item): ?>
    <div class="item">
        <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>" title="" class="img">
            <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbn'] ?>">
        </a>
        <h4 class="title"><a href="/chi-tiet-san-pham.php?id=<?php echo $item['id']; ?>" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></a></h4>
        <div class="desc"><?= $item['descs'] ?></div>
        <div class="footer d-flex">
            <?php
            $age = 0;
                if($item['total_review'] > 0)
                {
                    $age = round($item['number_review'] / $item['total_review'],2);
                }
            ?>

            <div class="start">
                <?php for($i = 1 ;$i <= 5 ; $i ++) :?>
                    <span class="glyphicon glyphicon-star <?= $i <= $age ? 'active' : '' ?>" aria-hidden="true"></span>
                <?php endfor; ?>
            </div>
            <?php if($item['price']) :?>
                <p class="price"><?php echo formatPrice($item['price']); ?></p>
            <?php else :?>
                <p class="price" style="color: red">Free</p>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
