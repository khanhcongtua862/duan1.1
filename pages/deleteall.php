<?php
session_start();

// Kiểm tra xem giỏ hàng có tồn tại không và có phải là một mảng không
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    // Xóa tất cả sản phẩm từ giỏ hàng
    unset($_SESSION['cart']);
}

// Chuyển hướng người dùng đến trang giỏ hàng sau khi xóa tất cả
header('Location: cart.php');
exit();
?>
