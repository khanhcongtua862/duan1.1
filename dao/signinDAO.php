<?php
function insert_taikhoan($user, $email, $pass) {
    try {
        $conn = connect_db();

        // Hash password before storing in the database for security
        

        $sql = "INSERT INTO users (user, email, pass) VALUES ('$user', '$email', '$pass')";

        // use exec() because no results are returned
        $conn->exec($sql);

        echo "Tài khoản đã được thêm thành công!";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

function kiem_tra_tai_khoan_ton_tai($user, $email) {
    try {
        $conn = connect_db();

        $sql = "SELECT COUNT(*) FROM users WHERE user = '$user' OR email = '$email'";
        $result = $conn->query($sql);
        $count = $result->fetchColumn();

        return $count > 0; // Trả về true nếu tài khoản tồn tại, ngược lại trả về false
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false; // Xử lý lỗi và trả về false
    }
}
?>