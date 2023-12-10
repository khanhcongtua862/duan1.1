<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="danhmuc/dm.css">
</head>
<body>
<div class="main">
    <h2>CẬP NHẬT DANH MỤC</h2>
    
    <form action="index.php?act=updatedm" method="post">
        <input type="text" name="ten_dm"  value="<?php echo $kqone[0]['ten_dm']?>">
        <input type="hidden" name="id" value="<?php echo $kqone[0]['iddm']?>">
        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Ưu tiên</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
        <?php
        // var_dump($kq)
        ?>
        <?php
            if(isset($kq)&&($kq)>0){
                $i=1;
                foreach($kq as $dm){
                    echo'<tr>
                            <td>'.$i.'</td>
                            <td>'.$dm['ten_dm'].'</td>
                            <td>'.$dm['uu_tien'].'</td>
                            <td>'.$dm['hien_thi'].'</td>
                            <td><a href="index.php?act=updatedm&id='.$dm['iddm'].'">Sửa</a> | <a href="index.php?act=deletedm&id='.$dm['iddm'].'">Xóa</a></td> 
                        </tr>';
                        $i++;
                }
            }
        ?>
        
    </table>
</div>
</body>
</html>
