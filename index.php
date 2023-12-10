<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<?php
session_start();
ob_start();
//if(isset($_SESSION['role'])&&($_SESSION['role']==1)){
//session_destroy();  
        

      include "./config/seed/connect.php";
      include "./dao/userDAO.php";
      include "./pages/header.php";
      include "./pages/home.php";
      include "./dao/sanphamDAO.php";
      include "./dao/danhmucDAO.php";
      include "./dao/signinDAO.php";

      //$spupload=getall_sanpham();
      $sphome1=getall_sanpham(0);
      $sphome2=getall_sanpham(1);

      $_SESSION['sphome1'] = $sphome1;
      $dsdm=getall_dm();
      $_SESSION['dsdm'] = $dsdm;



      if(isset($_GET['act'])){
        $act=$_GET['act'];
      switch($act){
        case 'about':
          include '';
          break;

        case 'sanpham': 
          $dsdm=getall_dm();
          if(isset($_GET['id'])&&($_GET['id']>0)){
            $iddm=$_GET['id'];
          }
          if(isset($_GET['id'])&&($_GET['id']>0)){
            $iddm = $_GET['id'];
          }
          include './pages/header.php';
          break;
          
          case 'signin':
            if(isset($_POST['signin']) && ($_POST['signin'] > 0)) {
                // Kiểm tra xem có đủ thông tin cần thiết hay không
                if(isset($_POST['email']) && isset($_POST['user']) && isset($_POST['pass'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
        
                    // Kiểm tra xem người dùng đã tồn tại hay chưa
                   
                    if (!kiem_tra_tai_khoan_ton_tai($user, $email)) {
                        // Thực hiện đăng ký
                        insert_taikhoan($user, $email, $pass);
                        $thongbao = "Đã đăng ký thành công";
                    } else {
                        $thongbao = "Tài khoản đã tồn tại. Vui lòng chọn tên đăng nhập và email khác.";
                    }
                } else {
                    $thongbao = "Vui lòng điền đầy đủ thông tin!";
                }
            }
            echo '<script>window.location.href = "login.php" </script>';
            // Include form để người dùng có thể nhập thông tin
            //include './signin.php';
           // break;
        case 'login':
          if(isset($_POST['login'])&&($_POST['login'])){
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $kq=getuserinfo($user,$pass);
            $role=$kq[0]['role'];
            if($role){
                $_SESSION['role']=$role;
                header('location: admin/index.php');
                $_SEESION['username']=$kq[0]['user'];
            }else{
                $_SESSION['role']=$role;
                $_SESSION['iduser']=$kq[0]['id'];
                $_SEESION['username']=$kq[0]['user'];
                header('location: index.php');
                break; 
            }

          include '';
          break;  }


          case 'logout':
          
            if (isset($_SESSION['iduser']) && $_SESSION['iduser'] != 0) {
                // Xóa tất cả dữ liệu session
                session_destroy();

                // Chuyển hướng đến trang đăng nhập hoặc trang chính
                header('location: index.php'); // Chỉnh sửa thành trang bạn muốn chuyển hướng
                exit();
            } else {
                // Nếu không có ID người dùng, in ra thông báo lỗi
                echo "Bạn không có quyền thực hiện đăng xuất.";
            }
            break;

        
            


        case 'addcart': 
          
          if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
            $ma_hh = $_POST['ma_hh'];
            $ten_hh = $_POST['ten_hh'];
            $hinh_anh = $_POST['hinh_anh'];
            $gia_hh = $_POST['gia_hh'];
        
            // Khởi tạo mảng con trước khi đưa vào giỏ hàng
            $sp = array($ma_hh, $ten_hh, $hinh_anh, $gia_hh);
        
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
        
            $_SESSION['cart'][] = $sp;
            header('location: cart.php');
        }
          break;

        case 'delcart': 
          if (isset($_GET['ind']) &&($_GET['ind']>=0)) {
            array_splice($_SESSION['cart'],$_GET['ind'],1) ;
            header('location: cart.php');
            }
        break;
        
                   
          
          
        default: 
        include './pages/home.php';
        break;  
      }
      }
// }else{
//       header('location: login.php');
// }
?>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
