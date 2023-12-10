<!-- Trang updateuser.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin người dùng</title>
    <link rel="stylesheet" href="danhmuc/dm.css">
</head>
<body>
    <div class="main">
        <h2>CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG</h2>
        
        <?php
        // Kiểm tra xem có thông tin người dùng được chuyển từ trang danh sách hay không
        if(isset($user_info) && !empty($user_info)) {
        ?>
        <form action="index.php?act=updateuser" method="post">
            <input type="hidden" name="id" value="<?php echo isset($user_info['id']) ? $user_info['id'] : ''; ?>">
            
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" value="<?php echo isset($user_info['name']) ? $user_info['name'] : ''; ?>" required>
            
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" id="address" value="<?php echo isset($user_info['address']) ? $user_info['address'] : ''; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo isset($user_info['email']) ? $user_info['email'] : ''; ?>" required>
            
            <label for="user">Tên đăng nhập:</label>
            <input type="text" name="user" id="user" value="<?php echo isset($user_info['user']) ? $user_info['user'] : ''; ?>" required>
            
            <label for="pass">Mật khẩu:</label>
            <input type="password" name="pass" id="pass" required>
            
            <label for="role">Quyền:</label>
            <select name="role" id="role">
                <option value="admin" <?php echo (isset($user_info['role']) && $user_info['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?php echo (isset($user_info['role']) && $user_info['role'] == 'user') ? 'selected' : ''; ?>>User</option>
            </select>
            
            <!-- Các trường thông tin khác nếu cần -->
            
            <input type="submit" name="update_user" value="Cập nhật">
        </form>
        <?php
        } else {
            echo "Không tìm thấy thông tin người dùng.";
        }
        ?>
    </div>
</body>
</html>
