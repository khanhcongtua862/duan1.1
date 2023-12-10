    <?php
   
    function themdm($ten_dm){
        $conn = connect_db();
        $sql = "INSERT INTO danhmuc (ten_dm) VALUES ('$ten_dm')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function getall_dm(){
        $conn = connect_db();
        
        $stmt = $conn->prepare("SELECT * FROM danhmuc");
        $stmt->execute();
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        
        return $kq;
    }
    function deletedm($id){
        $conn= connect_db();
        $sql = "DELETE FROM danhmuc WHERE iddm=".$id;
        $conn->exec($sql);
    }
    function getonedm($id){
        $conn = connect_db();
        
        $stmt = $conn->prepare("SELECT * FROM danhmuc WHERE iddm=".$id);
        $stmt->execute();
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        
        return $kq;
    }
    function updatedm($id, $ten_dm){
        
        $conn = connect_db();

        // Sử dụng biến ràng buộc để tránh SQL injection
        $sql = "UPDATE danhmuc SET ten_dm = :ten_dm WHERE iddm = :id";
        
        $stmt = $conn->prepare($sql);
    
        // Ràng buộc giá trị với tham số
        $stmt->bindParam(':ten_dm', $ten_dm, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        // Thực thi truy vấn
        $stmt->execute();
        
        
    }

    ?>
