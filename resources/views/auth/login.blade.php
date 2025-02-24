<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <style>
        h2{
            text-align: center;
        }

        a{
            color: white;
        }
        a:hover{
            color: white;
            text-decoration: none;
        }

        .box{
            height: 100vh;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("{{ asset('img/nen.jpg') }}");
            background-size: cover;
            height: 100vh;
        }

        .container {
            width: 400px;
            background-color: rgba(252, 236, 213, 0.7);
            border-radius: 20px;
            padding: 20px;
        }

    </style>
    <div class="box">
    <div class="container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="form-group">
                <label for="username">Tên tài khoản:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <button type="submit" class="btn btn-primary"><a href="{{ route('register') }}">Đăng Ký</a></button>
        </form>
    </div>
    </div>
</body>
</html>
