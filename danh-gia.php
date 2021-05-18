<?php
    require_once __DIR__ . "/autoload/autoload.php";
    if (!isset($_SESSION['name_id'])) {
        echo "<script type='text/javascript'>alert('Bạn phải đăng nhập!');location.href='index.php'</script>";

    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data     = [
                'id_product' => postInput('product_id'),
                'review'     => postInput('review'),
                'id_user'    => $_SESSION['name_id'],
                'comment'    => postInput('content_review')
            ];
            $idinsert = $db->insert("comments", $data);
            if ($idinsert) {
                $product = $db->fetchID('product', postInput('product_id'));
                $newData = [
                    'total_review'  => $product['total_review'] + 1,
                    'number_review' => $product['number_review'] + postInput('review'),
                ];
                $db->update('product', $newData, array("id" => postInput('product_id')));
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

?>
