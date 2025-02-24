<!DOCTYPE html>
<html>
<head>
    <title>Sửa Đoàn viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    header {
        display: flex;
        justify-content: space-between;
        background-color: darkblue;
        color: white;
        padding: 15px;
        margin-bottom: 20px;
    }

    a {
        color: white;
    }

    a:hover {
        color: white;
    }

    .menu_left {
        display: flex;
        align-items: center;
    }

    .menu_left > img {
        width: 40px;
        margin-right: 20px;
    }

    .account {
        display: flex;
        align-items: center;
        position: relative;
    }

    .account-wrapper a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .account-wrapper:hover .logout {
        display: block;
    }

    .logout {
        background-color: rgba(255, 255, 255, 0.8);
        margin: 0;
        position: absolute;
        top: 100%;
        right: 0;
        width: auto;
        z-index: 10;
        display: none;
        border-radius: 5px;
    }

    .logout a {
        color: blue;
        text-decoration: none;
    }

    body {
        background-color: rgb(235, 235, 235);
    }

    .container {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
    }

    h2 {
        text-align: center;
    }

    .btn {
        background-color: darkblue;
        color: white;
    }

    .mb-3 {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn-primary {
        background-color: darkblue;
        color: white;
    }

    .table-container {
        overflow-x: auto;
        border: 1px solid #ccc;
        padding: 10px;
    }

    th{
        text-align: center;
    }

    footer {
        text-align: center;
        padding: 30px;
    }
</style>
<body>
    <header>
        <div class="menu_left">
            <img src="{{ asset('img/Huy_Hiệu_Đoàn.png') }}" alt="">
            <a href="{{ route('doanviens.index') }}">Đoàn TNCS Hồ Chí Minh</a>
        </div>
        <div class="account">
            @auth
                <div class="account-wrapper">
                    <a href="#">{{ Auth::user()->username }}</a>
                    <div class="logout">
                        <a href="{{ route('login') }}">Đăng xuất</a>
                    </div>
                </div>
            @endauth
        </div>
    </header>
    <div class="container">
        <h2>Sửa Đoàn viên</h2>

        @if(!isset($doanVien))
            <p>Đoàn viên không tồn tại.</p>
        @else
            <form action="{{ route('doanviens.update', $doanVien->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="ho_ten">Họ tên:</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="{{ old('ho_ten', $doanVien->ho_ten) }}">
                    @error('ho_ten')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ngay_sinh">Ngày sinh:</label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ old('ngay_sinh', $doanVien->ngay_sinh) }}">
                    @error('ngay_sinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ngay_vao_doan">Ngày vào đoàn:</label>
                    <input type="date" class="form-control" id="ngay_vao_doan" name="ngay_vao_doan" value="{{ old('ngay_vao_doan', $doanVien->ngay_vao_doan) }}">
                    @error('ngay_vao_doan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gioi_tinh">Giới tính:</label>
                    <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" {{ old('gioi_tinh', $doanVien->gioi_tinh) == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gioi_tinh', $doanVien->gioi_tinh) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                    @error('gioi_tinh')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dia_chi">Quê quán:</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ old('dia_chi', $doanVien->dia_chi) }}">
                </div>

                <div class="form-group">
                    <label for="dien_thoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="dien_thoai" name="dien_thoai" value="{{ old('dien_thoai', $doanVien->dien_thoai) }}">
                    @error('dien_thoai')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $doanVien->email) }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('doanviens.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        @endif
    </div>
    <footer> Sinh viên: Tào Thanh Hà Msv: 22010252</footer>
</body>
</html>
