<?php 
session_start();
if(isset($_SESSION['cart'])){
    //echo var_dump($_SESSION['cart']);
}
// echo '<pre>';
// print_r($_SESSION['cart']);
// echo '</pre>';
include './config/seed/connect.php';
include './dao/userDAO.php';
include './pages/top.php';


if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    // Giỏ hàng tồn tại và không phải là null
    // Tiếp tục xử lý giỏ hàng
    $i = 0;
    $totalPayment = 0;
    
    foreach ($_SESSION['cart'] as $i => $sp) {
        // Kiểm tra kiểu dữ liệu và xử lý giá trị không hợp lệ
        if (is_numeric($sp[3])) {
            $totalPayment += (float) $sp[3];
        } else {
            // In ra toàn bộ mảng để xem giá trị của $sp1['gia_hh']
            echo "Giá trị không hợp lệ tại dòng $i:";
            echo '<pre>';
            print_r($sp);
            echo '</pre>';
        }
    }
} else {
    // 'cart' không tồn tại hoặc là null
    
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            
        }   
        #app {
            min-height: 100vh; /* Đảm bảo chiều cao tối thiểu bằng chiều cao của viewport */
        }

        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-left: 170px;
            overflow: auto; /* hoặc overflow: scroll; */
            max-height: 500px; /* Điều chỉnh chiều cao theo nhu cầu */
        }

        .cart-item {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .product-image {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .product-details {
            flex: 1;
        }

        .quantity-input {
            width: 50px;
            padding: 5px;
            font-size: 16px;
        }

        .update-button, .remove-button {
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
        }

        .update-button:hover, .remove-button:hover {
            background-color: #45a049;
        }
        .total-container {
            background-color: #fff;
            border: 0px solid #ccc;
            border-radius: 10px;
            padding: 50px;
            width: 280px;
            margin-top: 18px;
            padding-left: 100 px;
            position: absolute;
            right: 150px;
            top:88px;
        }
        .checkout-button {
            background-color: #FF5B00;
            margin-top: 20px;
            padding: 10px 20px; /* Kích thước padding */
            font-size: 17px; /* Kích thước font chữ */
            text-align: center;
            width: 200px;
            border: none; /* Không có đường viền */
            cursor: pointer; /* Hiển thị con trỏ khi di chuột */
            border-radius: 13px; /* Bo tròn góc */
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .checkout-button:hover {
            background-color: #F35700; /* Màu nền khi di chuột qua */
        }
        .p{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        /* CSS cho văn bản tổng thanh toán */
        .total-container p {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            margin: 0;
        }
        .delete-all-container {
            text-align: right; /* Căn giữa nút */
            margin-top: 33px; /* Khoảng cách từ nút đến sản phẩm */
            width: 800px;
            background-color: #FFF;
            margin-left: 170px;
            
        }

        .delete-all-button {

            background-color: #fff; /* Màu nền đỏ */
            border: 2px solid;
            color: black; /* Màu chữ trắng */
            padding: 10px; /* Kích thước padding */
            font-size: 16px; /* Kích thước font chữ */
            border: none; /* Không có đường viền */
            cursor: pointer; /* Hiển thị con trỏ khi di chuột */
            border-radius: 9px; /* Bo tròn góc */
            border: 1px solid #666;
            font-size: small;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 600;
        }

        .delete-all-button:hover {
            background-color: #F0F0F0; /* Màu nền đỏ sáng khi di chuột qua */
        }
        p{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 600;
        }

    </style>
    <title>Form Giỏ hàng</title>
</head>

<!---------------------------------------------------------------------------------------------------------->
 
<body>
<?php 
echo '<div class="delete-all-container">
<button class="delete-all-button">Xóa tất cả các dịch vụ</button>
</div>';
?>
    
<div class="cart-container">
<?php
    $i = 0;
   

    $totalPayment = 0;
    foreach ($_SESSION['cart'] as $sp) {
        $gia_dinh_dang = number_format($sp[3], 2, ',' , '.');
        $gia_dinh_dang = rtrim($gia_dinh_dang, '0' );
        $gia_dinh_dang = rtrim($gia_dinh_dang, ',' );
        $linkdel="delcart.php?ind=".$i;
        echo '<div class="cart-item">
            
            <img src="'.$sp[2].'" alt="Product 1" class="product-image">
            <div class="product-details">
                <p>'.$sp[1].'</p>
                <p>₫'.$gia_dinh_dang.'</p>
                <input type="number" class="quantity-input" placeholder="Qty" min="1" value="1">
                
                <a href="'.$linkdel.'">Xóa</a> 
            </div>
        </div>';
        
        $totalPayment += $sp[3];
        $i++;
    }
    
?>

    
</div>      
<?php 
//$totalPayment = rtrim($totalPayment, '0' );
$totalPayment = rtrim($totalPayment, ',' );
echo '<div class="total-container">
<p>Tổng thanh toán: <br>
 ₫' . number_format($totalPayment, 2, ',', '.') . '</p>
 <button class="checkout-button">Thanh toán</button>
</div>';

include './pages/mid.php';
?>
        <!-- Nút thanh toán -->
         
<
</body>
</html>
