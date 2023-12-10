<?php 
include '../seed/connect.php';

try {
    $conn = connect_db();
    for ($i=1; $i <= 10; $i++) { 
        $sql = "INSERT INTO users (firstname, lastname, email)
        VALUES ('John $i', 'Doe $i', 'john$i@example.com')";
        $conn->exec($sql);
    }
    echo "Make data successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>