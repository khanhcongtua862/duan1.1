
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('../img/anh2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            outline: none;
        }

        .login-form button {
            width: 100%;
            background-color: #ff4500;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #e04400;
        }

        /* Thêm style cho nút đăng nhập */
        .login-form input[type="submit"] {
            background-color: #ff4500;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form input[type="submit"]:hover {
            background-color: #e04400;
        }

        /* Thêm style cho nút "Quên mật khẩu" */
        .login-form a {
            text-decoration: none;
            color: #333;
            font-size: 12px;
        }

        /* Thêm style cho nút "Quên mật khẩu" khi hover */
        .login-form a:hover {
            color: #ff4500;
        }
    </style>
    
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form class="" action="index.php?act=login" method="post">
        <input type="text" name="user" placeholder="Username" required>
        <input type="password" name="pass" placeholder="Password" required> <br>
        <input type="submit" name="login" value="Đăng nhập"></input> <br>
       
    </form>
</div>
<script>
    // Hiển thị/ẩn form khi nhấn vào nút
    const loginContainer = document.getElementById('loginContainer');
    const loginForm = document.querySelector('.login-form');

    // Ẩn form ban đầu
    loginContainer.style.display = 'none';

    // Hiển thị form khi người dùng nhấn chuột vào nút đăng nhập
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Ngăn chặn chuyển hướng đến trang khác
        loginContainer.style.display = 'block';
    });
</script>

</body>
</html>
