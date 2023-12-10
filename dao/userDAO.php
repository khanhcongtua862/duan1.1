<?php
function checkuser($user,$pass){
    $conn=connect_db();
    $stsm =$conn->prepare("SELECT * FROM users WHERE user='".$user."' AND pass='".$pass."'");
    $stsm->execute();
    $result=$stsm->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stsm->fetchAll();
    //if(count($kq)>0) return $kq[0]['role'];
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}
function getuserinfo($user,$pass){
    $conn=connect_db();
    $stsm =$conn->prepare("SELECT * FROM users WHERE user='".$user."' AND pass='".$pass."'");
    $stsm->execute();
    $result=$stsm->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stsm->fetchAll();
    return $kq;
}
function getKhachHangById($ma_kh) {
    // Assuming `connect_db` is a function to establish a database connection
    $conn = connect_db();

    // Using prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);

    // Binding the parameter
    $stmt->bindParam(':id', $ma_kh);

    // Executing the query
    $stmt->execute();

    // Fetching the result
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Closing the database connection
    $conn = null;

    // Returning the result
    return $kq;
}
function get_all_customers() {
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function deleteuser($id) {
    $conn = connect_db();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
function updatekh($id, $ten, $address, $email, $user, $pass, $role) {
    try {
        // Kết nối CSDL
        $conn = connect_db();

        // Câu truy vấn SQL cập nhật thông tin người dùng
        $sql = "UPDATE users 
                SET name = :ten, 
                    address = :address, 
                    email = :email, 
                    user = :user, 
                    pass = :pass, 
                    role = :role 
                WHERE id = :id";

        // Sử dụng prepared statements để tránh SQL injection
        $stmt = $conn->prepare($sql);

        // Binding các giá trị vào câu truy vấn
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':role', $role);

        // Thực hiện câu truy vấn
        $stmt->execute();

        // Đóng kết nối CSDL
        $conn = null;

        // Trả về true nếu cập nhật thành công
        return true;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Lỗi cập nhật thông tin người dùng: " . $e->getMessage();
        return false;
    }
}
?>