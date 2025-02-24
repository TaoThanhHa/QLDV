<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <style>
        a{
            color: gray;
            font-weight: 600;
        }

        a:hover{
            color: gray;
            font-weight: 600;
        }

        h2{
            text-align: center;
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
        <a href="{{ route('login') }}">X</a>
        <h2>Đăng ký</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="username">Tên tài khoản:</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ten_khoa">Tên Khoa:</label>
                <select class="form-control @error('ten_khoa') is-invalid @enderror" id="ten_khoa" name="ten_khoa" required>
                    <option value="">-- Chọn Khoa --</option>
                    @foreach($khoas as $key => $value)
                        <option value="{{ $key }}" {{ old('ten_khoa') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('ten_khoa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ten_truong">Tên Trường:</label>
                <input type="text" class="form-control @error('ten_truong') is-invalid @enderror" id="ten_truong" name="ten_truong" required>
                @error('ten_truong')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
    </div>
</body>
</html>
