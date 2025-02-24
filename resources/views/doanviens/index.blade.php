<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Đoàn viên</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        text-decoration: none;
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

    .btn-success {
        margin-left: 20px;
    }

    .btn-info, .btn-primary, .btn-danger {
        background-color: white;
        color: gray;
        border: none;
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
        <h2>Danh sách Đoàn viên</h2>

        <div class="mb-3">
            <form action="{{ route('doanviens.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm theo tên" name="search" value="{{ $searchTerm ?? '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('doanviens.create') }}" class="btn btn-success">+ Thêm mới</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Ngày vào đoàn</th>
                        <th>Giới tính</th>
                        <th>Quê quán</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $doanViens = $doanViens->sortBy(function ($doanVien) {
                            $nameParts = explode(' ', $doanVien->ho_ten);
                            return end($nameParts);
                        });
                    @endphp

                    @foreach ($doanViens as $doanVien)
                        <tr>
                            <td>{{ $doanVien->ho_ten }}</td>
                            <td>{{ $doanVien->ngay_sinh }}</td>
                            <td>{{ $doanVien->ngay_vao_doan }}</td>
                            <td>{{ $doanVien->gioi_tinh }}</td>
                            <td>{{ $doanVien->dia_chi }}</td>
                            <td>{{ $doanVien->dien_thoai }}</td>
                            <td>{{ $doanVien->email }}</td>
                            <td>
                                <a href="{{ route('doanviens.edit', $doanVien->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('doanviens.destroy', $doanVien->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <footer> Sinh viên: Tào Thanh Hà Msv: 22010252</footer>
</body>
</html>
