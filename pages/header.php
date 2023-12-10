<?php
if (isset($_SESSION['dsdm'])) {
    $dsdm = $_SESSION['dsdm'];
    // Sử dụng $dsdm như thường lệ
} else {
    echo '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
     .card-header {
  background-color: #f8f9fa;
  padding: 10px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.card-header .logo img {
  width: 110px;
  margin-left: 120px;
}

.card-header .btn {
  margin-right: 10px;
} 

.card-body {
  padding: 20px;
}
.cart-button{
    position: absolute;
    right: 200px;
    top: 20px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

    
}

.btn-group {
  margin-top: 20px;
  
}

.btn-group .btn {
  margin-right: 5px;
  
}


body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
          margin-left: 130px;
            background-color: #f8f9fa;
            color: #f8f9fa;
            text-align: center;
            justify-content: space-between;
            margin-top: 10px;
            padding: 10px;
            border-radius: 50px;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            justify-content: center;
            border-radius: 10px;
        }

        nav li {
            margin-right: 20px;
            position: relative;
        }
        

        nav a {
            color: black;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 10px;
            display: block;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        

        nav a:hover {
            background-color: #cccccc;
            border-radius: 35px;
            
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            display: none;
            width: 200px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown li {
            margin: 0;
        }

        .dropdown a {
            padding: 10px;
            font-weight: 400;
        }
        .dropdown a:hover{
            background-color: #ffffff;
            padding: 10px;
            color: orangered;
            transition: 0s;
        }

        nav li:hover .dropdown {
            display: block;
        }
        .search{
            position: absolute;
            left:270px;
            top: 21px;
            border-radius: 15px;
        }
        .search {
        display: flex;
        align-items: center;
        }

        #search {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 25px;
        margin-right: 5px;
        font-size: 13px;
        }

        button {
        padding: 5px 7px;
        background-color: orangered;
        color: white;
        border: none    ;
        border-radius: 25px;
        cursor: pointer;
        font-size: 13px;
        }
        .timkiem:hover{
            background-color: orange;
        }
        
        #myHeader.sticky {
        
        top: 0;
        width: 100%;
        }
        
        .logouser{
            position: absolute;
            right: 80px;
            top: -28px;
            
        }
        .logouser > li {
        position: relative;
        }
        .userlogo {
            display: block;
            text-decoration: none;
            color: #333;
        }
        .dropdown {
            
            display: none;
            position: absolute;
            top: 100%;
            left: -50px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        .logouser:hover .dropdown {
            z-index: 1;
            display: flex;
            flex-direction: column; /* Chạy xuống dưới */
        }

        .dropdown li {
            padding: 10px;
        }

        .dropdown li a {
            text-decoration: none;
            color: #333;
        }


    </style>
</head>
<body>


<header id="myHeader">
    <div class="card-header">
  <div class="card-header">
    <a href="../index.php"><div class="logo"><img src="../img/Etsy_logo.svg.png" alt="" width="120px" ></a>
    <form action="search" method="get" class="search">
        <input type="text" id="search" name="search" placeholder="Nhập từ khóa...">
        <button type="submit" class="timkiem">Search</button>
    </form>
</div>
<?php

    if (!isset($_SESSION['iduser'])) {
        echo ' <ul class="list-unstyled main-menu-twologin">';
        echo '   <a href="signin.php"><button type="button" class="btn btn" style="position: absolute;right:150px;top:20px;background-color:white; border-radius: 20px;font-family:system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;font-size:14px;font-weight:500;">Sign-in</button></a></a>
                        </li> ';
        echo   '<a href="login.php"><button type="button" class="btn btn-" style="position: absolute;right:30px;top:20px; background-color:orangered; color:white; border-radius: 20px;font-family:system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;font-size:14px;font-weight:500">Login</button></a>';
                  
                echo ' </ul>';
    } else {
        $makh = $_SESSION['iduser'];
        $list_kh = getKhachHangById($makh);
        foreach ($list_kh as $kh) {
        extract($kh);
        //$hinhpath = "./admin/khachhang/img/" . $hinh_anh;
        echo '<nav class="logouser">
        <li><a href=""class="userlogo"><img src="../img/user.png" alt="" width="24px" style=""></a>
        <ul class="dropdown">
            <li><a href="#">Thông tin tài khoản</a></li>
            <li><a href="index.php?act=logout">Đăng xuất</a></li>
        </ul>
    </li>
    
    </nav>'  ;
        //echo $user;
        echo '<a href="../cart.php"><button class="cart-button">Giỏ hàng</button></a>
        ';
       
         
        echo '<ul class="list-unstyled  main-menulist">';
        echo '<li class="dropdown">';
       
        echo '<ul class="sub-menu">';
        echo '<li><a href="products.html">Thông tin tài khoản</a></li>';
        echo '<li><a href="index.php?tkh=dangxuat">Đăng xuất</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '</ul>';

                                    }

                                }
                                ?>
    <?php
//       if(isset($_SESSION['username'])&&($_SESSION['username']!="")){
//         echo'<a href="index.php?act=userinfo"><button type="button" class="btn btn-#fd7e14" style="position: absolute;right:150px;top:20px;background-color:white; border-radius: 20px;">'.$_SESSION['username'].'</button></a>';
//       }else{
    
//  echo   '<a href="signin.php"><button type="button" class="btn btn-#fd7e14" style="position: absolute;right:150px;top:20px;background-color:white; border-radius: 20px;font-family:system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;font-size:14px;font-weight:500;">Đăng ký</button></a>';
//  echo   '<a href="login.php"><button type="button" class="btn btn-" style="position: absolute;right:30px;top:20px; background-color:orangered; color:white; border-radius: 20px;font-family:system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;font-size:14px;font-weight:500">Đăng nhập</button></a>';
//       }?>
  </div>
  <nav>
    <ul>
    <li><a href="#"class="ticchinbadao">Categories</a>
            <ul class="dropdown">
            <?php

            foreach($dsdm  as $dm){
                echo '
                <li><a href="index,php?act=pagessanpham&id='.$dm['iddm'].'">' .$dm['ten_dm']. '</a></li>';
            }
        ?>
                
            </ul>
        </li>
        <li><a href="#" class="ticchinbadao">The Holiday Shop</a>
            
        </li>
        
        <li><a href="#"class="ticchinbadao">Weddings</a>
            
        </li>
        <li><a href="#"class="ticchinbadao">Fashion Find</a>
            
        </li>
        <li><a href="#"class="ticchinbadao">Gif Guides</a>
            
        </li>
        <li><a href="#"class="ticchinbadao">Posts</a></li>
        <li><a href="#"class="ticchinbadao">...</a>
            <ul class="dropdown">
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">SEO</a></li>
            </ul>
        </li>
    </ul>
</nav>
</div>

</header>

<script src="../script.js"></script>
  
  
<!--Header -->


<!--Slide Show -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>