<?php

// app/Http/Controllers/DoanVienController.php

namespace App\Http\Controllers;

use App\Models\DoanVien;
use App\Http\Requests\DoanVienRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DoanVienController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $userId = Auth::id();

        $doanViens = DoanVien::query()
            ->where('user_id', $userId)
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('ho_ten', 'like', '%' . $searchTerm . '%');
            })
            ->latest()
            ->get();

        $searchTerm = $request->input('search');
        $users = User::all();

        return view('doanviens.index', compact('doanViens', 'searchTerm', 'users'));
    }

    public function create()
    {
        return view('doanviens.create');
    }

    public function store(DoanVienRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        DoanVien::create($data);

        return redirect()->route('doanviens.index')->with('success', 'Thêm đoàn viên thành công.');
    }

    public function edit($id)
    {
        $doanVien = DoanVien::findOrFail($id);

        if ($doanVien->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa đoàn viên này.');
        }

        return view('doanviens.edit', compact('doanVien'));
    }

    public function update(DoanVienRequest $request, $id)
    {
        $doanVien = DoanVien::findOrFail($id);

        if ($doanVien->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền cập nhật đoàn viên này.');
        }

        $data = $request->validated();

        $doanVien->update($data);

        return redirect()->route('doanviens.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $doanVien = DoanVien::findOrFail($id);

        if ($doanVien->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền xóa đoàn viên này.');
        }

        $doanVien->delete();

        return redirect()->route('doanviens.index')->with('success', 'Đoàn viên đã được xóa thành công.');
    }
}
