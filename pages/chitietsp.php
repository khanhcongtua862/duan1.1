    <?php
    session_start();

    include '../config/seed/connect.php';
    include '../dao/sanphamDAO.php';
    include '../dao/userDAO.php';
    include './header.php';


    if (isset($_GET['hanghoa'])){
        $id= $_GET['hanghoa'];
        $sp=getonesp($id);
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi Tiết Sản Phẩm</title>
        <style>
            
            .product-container {
                max-width: 1200px;
                margin: 20px auto;
                background-color: #FFFFFF;
                padding: 20px;
                border-radius: 5px;
                padding: auto;
                position: relative;
            }

            .product-container img {
                max-width: 650px;
                height: 600px;
                height: auto;
                margin-bottom: 15px;
            }
            .product-container input[type="submit"] {
                width: 400px;
                background-color: black;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 15px;
                cursor: pointer;
                transition: background-color 0.3s ease; /* Hiệu ứng màu nền */
            }

            .product-container input[type="submit"]:hover {
                background-color: gray;
                box-shadow: 15px;
            }
            
            .ttsp{
                width: 350px;
                position: absolute; /* Thêm thuộc tính position */
                top: 20px; /* Đặt vị trí ở phía trên container */
                right: 70px; /* Đặt vị trí ở phía bên phải container */
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            .h2{
                font-weight: 700;
            }
            .size-selector {
                margin: 0px;
            }
            .size{
                font-size: x-small;
            }
            /* Tuỳ chỉnh kiểu dropdown */
            .size-dropdown {
                padding: 10px;
                width: 400px;
                border-radius: 15px;
            }
            .sp-t{
                font-size: small;
            }
            .product-price {
                font-weight: 700;
            }
            .mota{
                white-space: unset; /* Ngăn chặn xuống dòng */
                 /* Ẩn phần dư thừa */
                text-overflow: ellipsis; /* Hiển thị dấu chấm khi văn bản bị cắt ngắn */
                word-wrap: break-word;
            }
            .product-description {
                margin: 0px;
                
            }

            .dropdown-header {
                background-color: #fff;
                color: black;
                border: none;
                cursor: pointer;
                border-radius: 15px;
                padding: 11px;
                text-align: center ;
                width: 400px  ;
                margin-right: 10px
            }
            .dropdown-header:hover {
                background-color: #E9E9E9;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
                color: black;
                border: 1px solid;
            }

            .dropdown-content {
                text-align: left;
                display: none;
                overflow: hidden;
                padding: 10px;
            }

            .product-description.active .dropdown-content {
                display: block;
            }
            .product-description .dropdown-header::after {
            content: '▼'; /* Mũi tên xuống */
            position: absolute;
            right: 10px; /* Dịch phải mũi tên */
            transition: transform 0.3s ease; /* Hiệu ứng chuyển đổi */
        }

        .product-description.active .dropdown-header::after {
            content: '▼'; /* Mũi tên lên */
            transform: rotate(180deg); /* Chuyển đổi góc để mũi tên trỏ lên */
        }
        </style>
        
    </head>
    <body>
        

        <div class="product-container">
            <?php
            foreach ($sp as $sp1) {
                extract($sp1);
            ?>  
                <img src="<?php echo $sp1['hinh_anh']; ?>" alt="Product Image">


            <div class="ttsp">
                <h2 class="product-price"><?php echo number_format($sp1['gia_hh'], 2, ',', '.'); ?> VNĐ</h2>
                <label for="size" class="sp-t">Đã bao gồm thuế địa phương (nếu có)</label> <br>
                <p><?php echo $sp1['ten_hh']; ?></p>

            <div class="size-selector">
                <label for="size" class="sp-t">Kích thước*</label> <br>
                <select id="size" class="size-dropdown" onchange="selectSize()">
                <option value="S">Chọn một tùy chọn</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <!-- Thêm các lựa chọn size khác nếu cần -->
                </select>
            </div>
            <div class="size-selector">
                <label for="size" class="sp-t">Chọn quà tặng đi cùng*</label> <br>
                <select id="size" class="size-dropdown" onchange="selectSize()">
                <option value="S">Chọn một tùy chọn</option>
                <option value="S">Vòng tay</option>
                <option value="M">Hộp</option>
                <option value="L">Vật trang trí noel</option>
                <option value="XL">Tranh</option>
                <!-- Thêm các lựa chọn size khác nếu cần -->
                </select>
            </div>
                <br>
                

                <form action="" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $sp1['ma_hh']; ?>">
                    <input type="submit" name=""value="Thêm vào Giỏ Hàng"> 
                </form>
                <br>
                <div class="product-description">
                <div class="dropdown-header" onclick="toggleDropdown()">Mô Tả Sản Phẩm</div>
                <div class="dropdown-content" id="descriptionContent">
                <p class="mota">  Thủ công <img src="../img/hand-svgrepo-com.svg" alt="" width="20px"> </p>
                <p class="mota">  Chất liệu: Bông <img src="../img/hand-svgrepo-com.svg" alt="" width="20px"> </p>
                <p class="mota"> <?php echo $sp1['mo_ta']; ?> </p>
                </div>
            </div>
                </div>
            <?php } 
            ?>
            
            
                
        </div>

        <br>
        <br>
        <br>
                <br>
        <?php 
        include './mid.php';
        ?>
        <!-- Include your footer or any other necessary elements here -->

        <script src="../script.js"></script>
        <script>
            function toggleDropdown() {
    var dropdown = document.querySelector('.product-description');
    dropdown.classList.toggle('active');
}   
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    </body>
    </html>
