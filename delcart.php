<?php
session_start();

if(isset($_GET['ind']) && is_numeric($_GET['ind'])) {
    $product_index_to_remove = $_GET['ind'];

    // Kiểm tra xem giỏ hàng có tồn tại không và có phải là một mảng không
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        // Kiểm tra xem vị trí cần xóa có tồn tại không
        if (isset($_SESSION['cart'][$product_index_to_remove])) {
            // Loại bỏ sản phẩm khỏi giỏ hàng
            array_splice($_SESSION['cart'], $product_index_to_remove, 1);

            // Nếu giỏ hàng rỗng sau khi xóa, bạn có thể unset nó
            if (empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
        }
    }
}

// Chuyển hướng người dùng đến trang giỏ hàng sau khi xóa
header('Location: cart.php');
exit();
?>
