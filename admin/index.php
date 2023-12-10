
<?php 
include '../config/seed/connect.php';
include '../dao/danhmucDAO.php';
include '../dao/sanphamDAO.php';
include './layouts/header.php';
include '../dao/userDAO.php';


if(isset($_GET['act'])){
    switch ($_GET['act']) {
        case 'danhmuc':
            $kq=getall_dm();
            include 'danhmuc/list.php';
            break;

        case 'deletedm':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                deletedm($id);
            }
            $kq=getall_dm();
            include 'danhmuc/list.php';
            break;

        case 'updatedm':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $kqone=getonedm($id);

                $kq=getall_dm();
                include 'danhmuc/updatedm.php';
            }
            if(isset($_POST['capnhat'])){
                $id=$_POST['id'];
                $ten_dm=$_POST['ten_dm'];
                updatedm($id,$ten_dm);
                $kq=getall_dm();
                include 'danhmuc/list.php';
            }
            break;  

        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $ten_dm=$_POST['ten_dm'];
                themdm($ten_dm);
            }
            $kq=getall_dm();
            include 'danhmuc/list.php';
            break; 


        case 'sanpham':
            $dsdm=getall_dm();
            $kq=getall_sanpham(0);
            include './pages/product/listsp.php';
            break; 
        case 'addsp':
            if((isset($_POST['themmoi']))&&($_POST['themmoi'])){
                $iddm=$_POST['iddm'];
                $ten_hh=$_POST['ten_hh'];
                $gia_hh=$_POST['gia_hh'];
                $mo_ta=$_POST['mo_ta'];

               // $hinh_anh=$_FILES["hinh_anh"]["name"];

                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]) ;
                $hinh_anh=$target_file;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
            
                insert_sp($iddm,$ten_hh,$gia_hh,$hinh_anh,$mo_ta);
                
                $iddm=$_POST['iddm'];
                $thongbao="Them thanh cong";
            }
            $dsdm=getall_dm();
            $kq=getall_sanpham(0);
            include './pages/product/listsp.php';
            break;      
            
                
        case 'deletesp':
            if(isset($_GET['ma_hh'])){
                $ma_hh=$_GET['ma_hh'];
                deletesp($ma_hh); 
            }
            $kq=getall_sanpham(0);
            include './pages/product/listsp.php';
            break;
            
        case 'updatesp':
            $spct='';
            $dsdm=getall_dm();
            $mahh_1 = $_GET['ma_hh'];
            if(isset($mahh_1)&&($mahh_1)>0){
                $spct = getonesp($mahh_1);
            }
            $kq=getall_sanpham(0);
            include './pages/product/updatesp.php';
            break; 
        case 'sp_update':
            $spct='';
            $dsdm=getall_dm();
            if(isset($_POST['capnhat'])&&($_POST['capnhat']>0)){
                $iddm=$_POST['iddm'];
                $ten_hh=$_POST['ten_hh'];
                $gia_hh=$_POST['gia_hh'];
                $mo_ta=$_POST['mo_ta'];
                $id=$_POST['id'];
                if($_FILES["hinh_anh"]["name"]!=''){
                    $target_dir = "../uploads/";
                    $target_file =  basename($_FILES["hinh_anh"]["name"]);
                    $hinh_anh=$target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }
                    move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                    $iddm=$_POST['iddm'];
                }else{
                    $hinh_anh="";
                }
                updatesp($id, $ten_hh, $gia_hh, $hinh_anh, $mo_ta, $iddm);
            }
           
            $kq=getall_sanpham(0);
            include './pages/product/listsp.php';
            break;           
        
            case 'adduser':      
                if (isset($_POST['adduser'])) {
                    // Lấy dữ liệu từ form
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
            
                    // Thực hiện lấy thông tin người dùng
                    $user_info = getuserinfo($user, $pass);
            
                    if ($user_info) {
                        // Hiển thị thông tin người dùng có sẵn, có thể sử dụng $user_info để truy xuất thông tin cụ thể
                        echo "Thông tin người dùng: " . $user_info['name'] . ", " . $user_info['address'] . ", " . $user_info['email'] . ", " . $user_info['user'] . ", " . $user_info['role'];
                    } else {
                        // Hiển thị thông báo nếu không tìm thấy người dùng
                        echo "Người dùng không tồn tại hoặc mật khẩu không đúng.";
                    }
                }
                break;

             case 'dskh':
                $customers = get_all_customers();
                include 'user/listuser.php';
                break;
                
            case 'deleteuser':
                if(isset($_GET['id'])){
                $id=$_GET['id'];
                deleteuser($id);
            }
            
            case 'updateuser':
                if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
            
                    // Lấy thông tin chi tiết của người dùng
                    $user_info = getKhachHangById($id);
            
                    // Kiểm tra xem người dùng có tồn tại không
                    if($user_info) {
                        // Hiển thị form chỉnh sửa thông tin người dùng
                        // (Bạn cần tạo một form để hiển thị thông tin chi tiết và cho phép chỉnh sửa)
                        include 'user/updateuser.php';
                    } else {
                        echo "Người dùng không tồn tại.";
                    }
                } else {
                    echo "ID người dùng không hợp lệ.";
                }
            
                // Xử lý khi người dùng nhấn nút cập nhật
                if(isset($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $role = $_POST['role'];
            
                    // Gọi hàm cập nhật thông tin người dùng
                    updatekh($id, $name, $address, $email, $user, $pass, $role);
            
                    // Lấy lại danh sách người dùng sau khi cập nhật
                    $kq = get_all_customers();
            
                    // Include trang hiển thị danh sách người dùng
                    include 'user/listuser.php';
                }
                break; 

            
     
                
            case 'thoat':
            if(isset($_SESSION['role'])) unset($_SESSION['role']);
            header ('location: ../login.php ');
                
            

            default:
            include './layouts/home.php';
                break;
        }
    }else{
        include './layouts/home.php';
    }
    include './layouts/footer.php';
    ?>
