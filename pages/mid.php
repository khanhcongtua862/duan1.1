<?php

if (isset($_SESSION['sphome1'])) {
    $sphome1 = $_SESSION['sphome1'];
    // Sử dụng $spupload như thường lệ
} else {
    echo 'No products available.';
}
?>



<style>
.image-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            margin-right: 8px;
        }

        .rounded-4 {
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .rounded-4 img {
            border-radius: 10px;
            width: 343px;
            margin: 15px;
        }

        .rounded-4:hover {
            transform: translateY(-10px); /* Đẩy lên 10px khi hover */
            box-shadow: 0 0 10px rgba(1, 0, 0, 0.9);
        }  
  .container {
    max-width: 1200px;
    margin: 0 auto;
}

.col {
    margin-bottom: 20px;
    width: 500px;
    justify-content: center;
}
.row{ 
  margin:30px ;
}

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    height: auto;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 220px; 
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-body a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    font-size: 14px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.card-text {
    margin-top: 4px;
    color: #777;
    font-size: 14px;
    font-weight: 600;
}

.btn-primary {
    background-color: #fff0e5;
    width: 100%;
    color: orangered;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 10px;
    display: inline-block;
    margin-top: 10px;
    border: none;
    font-weight: 400;
}
.btn-primary a{
  color: orangered;

}
h3{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 26;
  margin-left: 147px ;margin-bottom:20px;
}
</style>

<body>


<h3 class="" style="margin-left: 147px ;margin-bottom:40px;">Thường Được Đặt Với</h3>

<!-- <form action="" method="post" enctype="multipart/form-data"> -->
<div class="container">
<div class="row" style="margin-bottom: 10px;" >
    <?php
    foreach($sphome1 as $sp) {
        echo '<div class="col">
                <div class="card" style="width: 250px; height: 403px;">
                <form action="index.php?act=addcart" method="post"> 
                <img src="../uploads/' . $sp['hinh_anh'] . '" class="card-img-top" alt="Product Image";>
                <input type="hidden" value="'.$sp['ma_hh'].'" name="ma_hh">
                <input type="hidden" value="'.$sp['ten_hh'].'" name="ten_hh">
                <input type="hidden" value="'.$sp['hinh_anh'].'" name="hinh_anh">
                <input type="hidden" value="'.$sp['gia_hh'].'" name="gia_hh">
                <div class="card-body">
                    <a href="/pages/chitietsp.php?hanghoa='.$sp['ma_hh'].'">'.$sp['ten_hh'].'</a>
                    <p class="card-text">Từ ' . $sp['gia_hh'] . ' VND</p>
                    <input type="submit" name="addtocart" value="Đặt ngay">
                </div></form>
                </div>
            </div>';
            }
            
      ?>
      
</div> 
</div> 

<h3 class="" style="margin-left: 147px ;margin-bottom:40px;">Hot nhất tại Klook</h3>

<form action="" method="post" enctype="multipart/form-data">
<div class="container">
<div class="row" style="margin-bottom: 10px;" >
    <?php
    foreach($sphome1 as $sp) {
        echo '<div class="col">
                <div class="card" style="width: 250px; height: 403px;">
                <img src="../uploads/' . $sp['hinh_anh'] . '" class="card-img-top" alt="Product Image";>
              
                <div class="card-body">
                    <a href="">'.$sp['ten_hh'].'</a>
                    <p class="card-text">Từ ' . $sp['gia_hh'] . ' VND</p>
                    <a href="#" class="btn btn-primary">Đặt ngay</a>
                </div>
                </div>
            </div>';
            }
            
      ?>
</div> 
</div>

<div class="blockcode">
    <div class="header"></div>
  
    <footer class="page-footer shadow">
      <div class="d-flex flex-column mx-auto py-5" style="width: 80%">
        <div class="d-flex flex-wrap justify-content-between">
          <div>
            <a href="/" class="d-flex align-items-center p-0 text-dark">
              <img alt="logo" src="../img/logo.png" width="30px" />
              <span class="ms-3 h5 font-weight-bold">Devwares</span>
            </a>
            <p class="my-3" style="width: 250px">
              We are creating High Quality Resources and tools to Aid developers during the
              developement of their projects
            </p>
            <span class="mt-4">
              <button class="btn btn-dark btn-flat p-2">
                <i class="fa fa-facebook"></i>
              </button>
              <button class="btn btn-dark btn-flat p-2">
                <i class="fa fa-twitter"></i>
              </button>
              <button class="btn btn-dark btn-flat p-2">
                <i class="fa fa-instagram"></i>
              </button>
            </span>
          </div>
          <div>
            <p class="h5 mb-4" style="font-weight: 600">Devwares</p>
            <ul class="p-0" style="list-style: none; cursor: pointer">
              <li class="my-2">
                <a class="text-dark" href="/">Resources</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">About Us</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">Contact</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">Blog</a>
              </li>
            </ul>
          </div>
          <div>
            <p class="h5 mb-4" style="font-weight: 600">Help</p>
            <ul class="p-0" style="list-style: none; cursor: pointer">
              <li class="my-2">
                <a class="text-dark" href="/">Support</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">Sign Up</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">Sign In</a>
              </li>
            </ul>
          </div>
          <div>
            <p class="h5 mb-4" style="font-weight: 600">Help</p>
            <ul class="p-0" style="list-style: none; cursor: pointer">
              <li class="my-2">
                <a class="text-dark" href="/">Support</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">Sign Up</a>
              </li>
              <li class="my-2">
                <a class="text-dark" href="/">Sign In</a>
              </li>
            </ul>
          </div>
        </div>
        <small class="text-center mt-5">&copy; Devwares, 2020. All rights reserved.</small>
      </div>
      
    </footer>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</form>
  
</body>