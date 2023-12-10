
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Form</title>
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
    </style>
</head>
<body>

<div class="login-container">
    
    <h2>Đăng ký</h2>
    <form method="post" action="index.php?act=signin">
        <input type="text" name="user" placeholder="Tên người dùng" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="pass" placeholder="Mật khẩu" required> <br>
        <input type="submit" name="signin" value="Đăng ký">
        
    </form>
</div>

</body>
</html>
