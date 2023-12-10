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
    <h2>SẢN PHẨM</h2> <br>
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
             if(isset($dsdm)){
                foreach($dsdm as $dm){
                    echo '<option value="'.$dm['iddm'].'">'.$dm['ten_dm'].'</option>';
                }
             }
            ?>
        </select>
        <br><br>
        
        <input type="text" name="ten_hh" id="" placeholder="Tên Tour"> 
       
        <input type="text" name="gia_hh" id=""placeholder="Giá">
        
        <textarea type="text" name="mo_ta" id=""placeholder="Mô Tả"></textarea> <br> <br> 

        <input type="file" name="hinh_anh" id="" placeholder="Hình Ảnh"><br> <br>

        <input type="submit" name="themmoi" value="Thêm mới">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Danh mục</th>
            <th>Hành động</th>
        </tr>
        <?php
        // var_dump($kq)
        ?>
        
        <?php
            if(isset($kq)&&($kq)>0){
                $i=1;

                foreach($kq as $item){
                    echo'<tr>
                            <td>'.$i.'</td>
                            <td>'.$item['ten_hh'].'</td>
                            <td><img src="'.$item['hinh_anh'].'" width="80px"></td>
                            <td>'.$item['gia_hh'].'</td>
                            <td>'.$item['mo_ta'].'</td>
                            <td>'.$item['iddm'].'</td>
                            <td><a href="index.php?act=updatesp&ma_hh='.$item['ma_hh'].'">Sửa</a>|<a href="index.php?act=deletesp&ma_hh='.$item['ma_hh'].'">Xóa</a></td> 
                        </tr>';
                        $i++;
                }
            }
        ?>
        
    </table>
</div>
</body>
</html>
