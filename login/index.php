<?php require_once __DIR__. "/../autoload/autoload.php";

    $data =
    [
        'email'     => postInput('email'),
        'password'  => postInput('password')
    ];
    $error=[];

    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        if ($data['email'] == '') 
        {
            $error['email'] = "Chưa nhập email";
        }
        if ($data['password'] == '') 
        {
            $error['password'] = "Chưa nhập password";
        }
        if (empty($error))
        {
            $is_check = $db->fetchOne("admin","email = '".$data['email']."' AND password = '".MD5($data['password'])."'");
            if ($is_check != NULL)
            {
                $_SESSION['admin_name'] = $is_check['name'];
                $_SESSION['admin_id'] = $is_check['id'];
                echo "<script>location.href='/admin' </script>";
            }
            else 
            {
                $_SESSION['error'] = "Đăng nhập thất bại";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <style type="text/css">
            body, html {
                height: 100%;
                background-repeat: no-repeat;
                background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
            }

            .wrapper {
                margin-top: 50px;
                margin-bottom: 20px;
            }

            .form-signin {
                max-width: 480px;
                padding: 10px 38px 66px;
                margin: 0 auto;
                background-color: #eee;
                border: 3px dotted rgba(0,0,0,0.1);
                border-radius: 5px;
            }

            .form-signin-heading {
                text-align: center;
                margin-bottom: 20px;
            }

            .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
            }

            input[type="text"] {
                margin-bottom: 0px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            input[type="password"] {
                margin-bottom: 20px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="wrapper">
                <form class="form-signin"  action="" method="POST">
                    <h3 class="form-signin-heading">
                        <img id="profile-img" class="profile-img-card img-circle" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                        <br><br>
                        <b style="color:#c7c7c7 !important">Company Name</b><br>
                    </h3>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                    </div>
                    <?php endif; ?>
                    <input required type="text" class="form-control" name="email" placeholder="Username" autocomplete="off" /><br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                    <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login</button>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>