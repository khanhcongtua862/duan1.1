<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Kết nối đến cơ sở dữ liệu (Giả sử bạn đã có hàm connect_db())
    $conn = connect_db();

    // Kiểm tra xem email đã được sử dụng chưa
    $check_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_sql);

    if ($result->rowCount() == 0) {
        // Nếu email chưa được sử dụng, thực hiện đăng ký
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
        $conn->exec($insert_sql);

        echo "Đăng ký thành công!";
    } else {
        echo "Email đã được sử dụng. Vui lòng chọn email khác.";
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn = null;
}
?>
