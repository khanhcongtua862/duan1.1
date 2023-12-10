<?php 
include '../seed/connect.php';
try {
    $conn = connect_db();
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        pass VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    $conn->exec($sql);
    echo "Table users created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

?>
