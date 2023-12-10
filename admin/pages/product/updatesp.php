<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="danhmuc/dm.css">
    <style>
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select, input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        img {
            display: block;
            margin-top: 10px;
            max-width: 100%;
            height: auto;
        }

        input[type="submit"] {
            background-color: orange;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="main">
    <h2>UPDATE SẢN PHẨM</h2>
    <form action="index.php?act=sp_update" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
            $iddmcur=$spct[0]['iddm'];
             if(isset($dsdm)){
                foreach($dsdm as $dm){
                    if($dm['iddm']==$iddmcur){
                    echo '<option value="'.$dm['iddm'].'" selected>'.$dm['ten_dm'].'</option>';}
                    else {
                    echo  '<option value="'.$dm['iddm'].'" >'.$dm['ten_dm'].'</option>';
                    }
                }
             }
            ?>
        </select>
        <br>
        <br>
        Tên Tour:
        <input type="text" name="ten_hh" id="" value="<?php echo $spct[0]['ten_hh'];?>">
        <br>
        <br>
        Hình ảnh:
        <input type="file" name="hinh_anh" id="">
        <img src="<?=$spct[0]['hinh_anh'];?>" width=80 alt="">
        <br>
        <br>
        Giá
        <input type="text" name="gia_hh" id=""  value="<?php echo $spct[0]['gia_hh'];?>">
        <br>
        <br>
        Mô tả
        <textarea type='text' name="mo_ta" id="" value="<?php echo $spct[0]['mo_ta'];?>"> </textarea>

        <input type="hidden" name="id" value="<?php echo $spct[0]['ma_hh'];?>">
        <input type="submit" name="capnhat" value="Cập Nhật">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>dm</th>
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
                            <td><img src="'.$item['hinh_anh'].'" width="80px"</td>
                            <td>'.$item['gia_hh'].'</td>
                            <td>'.$item['mo_ta'].'</td>
                            <td>'.$item['iddm'].'</td>
                            <td><a href="index.php?act=updatesp&ma_hh='.$item['ma_hh'].'">Sửa</a> | <a href="index.php?act=deletesp&ma_hh='.$item['ma_hh'].'">Xóa</a></td> 
                        </tr>';
                        $i++;
                }
            }
        ?>
        
    </table>
</div>
</body>
</html>
