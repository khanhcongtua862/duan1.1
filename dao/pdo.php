
<?php
include '/config/seed/connect.php';
function getall_dm($sql) {
    $data= "SELECT * FROM loai";
    return $data;
}

function getData($sql) {
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getDataWidthParams($sql, $params) {
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    return $result;
}

function executeCUD($sql, $params) {
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $count = $stmt->rowCount();
    return $count;
}



?>