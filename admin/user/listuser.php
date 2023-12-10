
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Khách Hàng</title>
    <!-- Thêm các file CSS hoặc thư viện cần thiết -->
    <link rel="stylesheet" href="danhmuc/dm.css">
</head>
<body>
    <div class="main">
        <h2>DANH SÁCH KHÁCH HÀNG</h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Tên Đăng Nhập</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Role</th>
                <th>Hành động</th>
                <!-- Thêm các cột khác nếu cần -->
            </tr>
            
            <?php
            // Hiển thị thông tin từ danh sách khách hàng
            foreach ($customers as $customer) {
                echo '<tr>
                        <td>' . $customer['id'] . '</td>
                        <td>' . $customer['user'] . '</td>
                        <td>' . $customer['name'] . '</td>
                        <td>' . $customer['address'] . '</td>
                        <td>' . $customer['email'] . '</td>
                        <td>' . $customer['role'] . '</td>
                        <td><a href="index.php?act=updateuser&id='.$customer['id'].'">Sửa</a> | <a href="index.php?act=deleteuser&id='.$customer['id'].'">Xóa</a></td> 
                        <!-- Thêm các cột khác nếu cần -->
                      </tr>';
            }
            ?>
            
        </table>
    </div>
</body>
</html>
