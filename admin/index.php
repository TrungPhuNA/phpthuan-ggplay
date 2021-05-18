<?php 
    $open = "index";
    require_once __DIR__. "/autoload/autoload.php";
    $category = $db->fetchAll("category");

    //Count number of products
    $sql = "SELECT number FROM product";
    $product = $db->fetchsql($sql);
    $sql2 = "SELECT count(*) FROM product";
    $product2 = $db->fetchnum($sql2);
    $num = (int)$product2['count(*)'];
    $s = 0;
    for ($i=0; $i < $num ; $i++) 
    {
        $s = $s + implode($product[$i]);
    }
    //Count sold products

    //Count remained products

    //Revenue
    
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Nội dung Admin
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i><a href="index.html"> Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <style type="text/css">
        ul {list-style-type: none;}
        #detail {padding: 10px 0px; margin-left: -25px;}
    </style>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $s;?></div>
                            <div>Tổng số lượng sản phẩm</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" data-toggle="collapse" data-target="#detail1">
                    <div class="panel-footer" style="border-bottom: 1px solid #337ab7; border-radius: 0px;">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="a-detail fa fa-angle-double-down fa-lg"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul id="detail1" class="collapse" style="margin: auto;">
                    <li id="detail">                       
                        Hello
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">12</div>
                            <div>Sản phẩn đã bán</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" data-toggle="collapse" data-target="#detail2">
                    <div class="panel-footer" style="border-bottom: 1px solid #5cb85c; border-radius: 0px;">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="a-detail fa fa-angle-double-down fa-lg"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul id="detail2" class="collapse" style="margin: auto;">
                    <li id="detail">                       
                        Hello
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">7</div>
                            <div>Sản phẩm còn lại</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" data-toggle="collapse" data-target="#detail3">
                    <div class="panel-footer" style="border-bottom: 1px solid #f0ad4e; border-radius: 0px;">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="a-detail fa fa-angle-double-down fa-lg"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul id="detail3" class="collapse" style="margin: auto;">
                    <li id="detail">                       
                        Hello
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">100.000</div>
                            <div>Doanh thu</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" data-toggle="collapse" data-target="#detail4">
                    <div class="panel-footer" style="border-bottom: 1px solid #d9534f; border-radius: 0px;">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="a-detail fa fa-angle-double-down fa-lg"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul id="detail4" class="collapse" style="margin: auto;">
                    <li id="detail">                       
                        Hello
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=185039975528998&autoLogAppEvents=1"></script>

    <div class="fb-share-button" data-href="https://www.google.com.vn/" data-layout="button" data-size="large">                   <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.google.com.vn/&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

    <script>
    function myFunction() {
      var x = document.URL;
      document.getElementById("url").innerHTML = x;
    }
    </script>
    <button onclick="myFunction()">Try it</button>
    <p id="url"></p>
    
    <?php
        
    ?>

<?php require_once __DIR__. "/layouts/footer.php"; ?>
