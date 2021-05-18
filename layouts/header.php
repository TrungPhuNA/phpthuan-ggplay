<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="/"><img src="<?= public_frontend() ?>images/logo.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="/">Trang chủ</a></li>
                <?php foreach($category as $item): ?>
                    <li>
                        <a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form class="navbar-form navbar-left" action="/tim-kiem.php">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?= getInput('k') ?>" name="k" placeholder="Tên ứng dụng ..">
                </div>
                <button type="submit" class="btn btn-default">Tìm kiếm</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['name_user'])): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?= $_SESSION['name_user'] ?></span> <span class="caret"></a>
                        <ul class="dropdown-menu">
                            <li><a href="/info-user.php">Cập nhật thông tin</a></li>
                            <li><a href="/cap-nhat-mat-khau.php">Cập nhập mật khẩu</a></li>
                            <li><a href="/thoat.php">Thoát</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="/dang-ky.php">Đăng ký</a></li>
                    <li><a href="/dang-nhap.php">Đăng nhập</a></li>

                <?php endif ; ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

