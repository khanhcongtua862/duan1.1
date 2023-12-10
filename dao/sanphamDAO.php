<?php

function updatesp($id, $ten_hh, $gia_hh, $hinh_anh, $mo_ta, $iddm){
        
    $conn = connect_db();
    if ($hinh_anh == "") {
        $sql = "UPDATE sanpham SET ten_hh ='".$ten_hh."', gia_hh='".$gia_hh."', mo_ta='".$mo_ta."', iddm='".$iddm."' WHERE ma_hh=".$id;
    } else {
        $sql = "UPDATE sanpham SET ten_hh ='".$ten_hh."', gia_hh='".$gia_hh."', mo_ta='".$mo_ta."', iddm='".$iddm."', hinh_anh='".$hinh_anh."' WHERE ma_hh=".$id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function getonesp($id){
    $conn = connect_db();
    
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE ma_hh=".$id);
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    
    return $kq;
}


function deletesp($id){
    $conn= connect_db();
    $sql = "DELETE FROM sanpham WHERE ma_hh=".$id;
    $conn->exec($sql);
}


    // function insert_sp($iddm,$ten_hh,$gia_hh,$hinh_anh,$mo_ta){
    //     $conn = connect_db();
        
    //     $sql = "INSERT INTO sanpham (iddm, ten_hh, gia_hh, hinh_anh, mo_ta) VALUES ('$iddm', '$ten_hh', '$gia_hh','$hinh_anh','$mo_ta')";
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
    // } 
function insert_sp($iddm, $ten_hh, $gia_hh, $hinh_anh, $mo_ta) {
        $conn = connect_db();
    
        // Kiểm tra sự tồn tại của iddm trong bảng danhmuc trước khi thêm
        $check_sql = "SELECT * FROM danhmuc WHERE iddm = '$iddm'";
        $result = $conn->query($check_sql);
    
        if ($result->rowCount() > 0) {
            // Nếu iddm tồn tại, thực hiện thêm dữ liệu vào bảng sanpham
            $sql = "INSERT INTO sanpham (iddm, ten_hh, gia_hh, hinh_anh, mo_ta) VALUES ('$iddm', '$ten_hh', '$gia_hh', '$hinh_anh', '$mo_ta')";
            $conn->exec($sql);
        } else {
            // Nếu iddm không tồn tại, có thể thông báo lỗi hoặc thực hiện các xử lý khác
            echo "Lỗi: iddm không tồn tại trong bảng danhmuc.";
        }
    }
    function getall_sanpham($view){
        $conn = connect_db();
        $sql = "SELECT * FROM sanpham ";
        if($view == 1){
            $sql.=" order by view DESC ";
        }else{
            $sql.=" order by ma_hh DESC";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
            
        return $kq;
        }
        ?>