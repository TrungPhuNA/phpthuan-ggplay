<?php
require_once __DIR__. "/autoload/autoload.php";

$data =
    [
        'email'     => postInput('email'),
    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ($data['email'] == '')
    {
        $error['email'] = "Email không được để trống";
    }
    else
    {
        $is_check = $db->fetchOne("user","email = '".$data['email']."'");
        if ($is_check == NULL)
        {
            $error['email'] = "Email không tồn tại trong hệ thống";
        }
    }

    if (empty($error))
    {
        //goi thu vien
        include('PHPMailer/class.smtp.php');
        include "PHPMailer/class.phpmailer.php";
        $link = 'http://hoanghuy.site/lay-lai-mat-khau.php?email='.$data['email'];
        $nFrom = "Codethue";    //mail duoc gui tu dau, thuong de ten cong ty ban
        $mFrom = 'websitedonghotrungphu@gmail.com';  //dia chi email cua ban
        $mPass = 'yokhjwjngslbqqlx';       //mat khau email cua ban
        $nTo = 'TrungPhuNA'; //Ten nguoi nhan
        $mTo = 'codethue94@gmail.com';   //dia chi nhan mail
        $mail             = new PHPMailer();
        $link  = "<a href='".$link."'>Click tại đây</a>";
        $body             = 'Click vào đây để cập nhật mật khẩu ' .$link;   // Noi dung email
        $title = 'Hướng dẫn gửi mail bằng PHPMailer';   //Tieu de gui mail
        $mail->IsSMTP();
        $mail->CharSet  = "utf-8";
        $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;    // enable SMTP authentication
        $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";    // sever gui mail.
        $mail->Port       = 465;         // cong gui mail de nguyen
        // xong phan cau hinh bat dau phan gui mail
        $mail->Username   = $mFrom;  // khai bao dia chi email
        $mail->Password   = $mPass;              // khai bao mat khau
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo('info@freetuts.net', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->Subject    = $title;// tieu de email
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail
        if(!$mail->Send()) {
            echo "<script type='text/javascript'>alert('Gủi email lỗi xin vui lòng thử lại');location.href='/quen-mat-khau.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Vui lòng kiểm tra email để cập nhật mật khẩu mới');location.href='index.php'</script>";

        }
    }
}

?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
<div class="col-md-6 col-md-offset-3 bor" style="margin-top: 50px;">

    <section class="box-main1">
        <h3 class="title-main">Đăng ký thành viên</a> </h3>
        <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
            <div class="form-group">
                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Email</label>
                <div class="col-md-8">
                    <input type="email" name="email" placeholder="" class="form-control" value="<?php echo $data['email'] ?>">
                    <?php if (isset($error['email'])): ?>
                        <p class="text-danger"><?php echo $error['email']; ?></p>
                    <?php endif;?>
                </div>
            </div>
            <button type="submit" class="btn btn-success col-md-2  col-md-offset-6">Đăng ký</button>
        </form>
        <!--content-->
    </section>
    <!--    --><?php //require_once __DIR__. "/layouts/footer.php"; ?>
