<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\HoaHongModel;
use App\Http\Requests\StoreCustomerRequest;
use App\PhanCapModel;
use App\TongTienHoaHongModel;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function register(StoreCustomerRequest $request)
    {
        $check_user = 'notuser';
        if (isset($request->phone_introduce))
            $check_user = Users::where('phone', $request->phone_introduce)->first();
        if (!isset($check_user)) {
            return redirect('/store/register')->with('notphone', 'Không tìm thấy số điện thoại của người giới thiệu');
        }
        if ($request->password != $request->repassword) {
            return redirect('/store/register')->with('errconfirmpass', 'Nhập password không trùng khớp, vui lòng nhập lại pasword xác nhận');
        }
        $a = Users::select('id')->max('id');
        $b = $a + 1;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_file_name = $b . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $new_file_name);
            $kh_anhdaidien = $new_file_name;
        } else {
            $kh_anhdaidien = "";
        }
        $user = Users::create([
            'type' => 2,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'active' => 1,
        ]);
        CustomerModel::create([
            'user_id' => $user->id,
            'customer_gender' => $request->get('customer_gender'),
            'customer_birthday' => $request->get('customer_birthday'),
            'customer_address' => $request->get('customer_address'),
            'customer_cmnd' => $request->get('customer_cmnd'),
            'customer_cmnd_ngaycap' => $request->get('customer_cmnd_ngaycap'),
            'customer_image' => $kh_anhdaidien,
            'id_employee' => 0
        ]);
        if ($check_user == 'notuser') {
            $idcha = 0;
        } else {
            $idcha = $check_user->id;
        }
        HoaHongModel::create([
            'id_khachhang' => $user->id,
            'id_cha' => $idcha,
            'tien_hoa_hong' => 0,
            'status' => 0,
            'danh_dau' => 0
        ]);
        TongTienHoaHongModel::create([
            'id_khachhang' => $user->id,
            'tien_da_lanh' => 0
        ]);
        return redirect('/store/home')->with('success', 'Tạo tài khoản thành công, vui lòng đăng nhập để sử dụng dịch vụ');
    }

    public function update(Request $request)
    {
        if ($request->password != $request->repassword) {
            return redirect('/store/register')->with('errconfirmpass', 'Nhập password không trùng khớp, vui lòng nhập lại pasword xác nhận');
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $request->id;
            $new_file_name = $name . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $new_file_name);
            $kh_anhdaidien = $new_file_name;
            CustomerModel::find($request->id);
        } else {
            $kh_anhdaidien = "";
        }
        Users::where('id', $request->id)->update([
            'type' => 2,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'active' => 1,
        ]);

        if ($kh_anhdaidien != '') {
            CustomerModel::where('user_id', $request->id)->update([
                'customer_gender' => $request->get('customer_gender'),
                'customer_birthday' => $request->get('customer_birthday'),
                'customer_address' => $request->get('customer_address'),
                'customer_cmnd' => $request->get('customer_cmnd'),
                'customer_cmnd_ngaycap' => $request->get('customer_cmnd_ngaycap'),
                'customer_image' => $kh_anhdaidien
            ]);
        } else {
            CustomerModel::where('user_id', $request->id)->update([
                'customer_gender' => $request->get('customer_gender'),
                'customer_birthday' => $request->get('customer_birthday'),
                'customer_address' => $request->get('customer_address'),
                'customer_cmnd' => $request->get('customer_cmnd'),
                'customer_cmnd_ngaycap' => $request->get('customer_cmnd_ngaycap'),
            ]);
        }
        return redirect('/store/contact')->with('success', 'Cập nhật tài khoản thành công');
    }

    public function fast_register(Request $request)
    {
        $check_user = 'notuser';
        if (isset($request->phone_introduce))
            $check_user = Users::where('phone', $request->phone_introduce)->first();
        if (!isset($check_user)) {
            return redirect('/store/register')->with('notphone', 'Không tìm thấy số điện thoại của người giới thiệu');
        }
        if ($request->password != $request->repassword) {
            return redirect('/store/register')->with('errconfirmpass', 'Nhập password không trùng khớp, vui lòng nhập lại pasword xác nhận');
        }
        $user = Users::create([
            'type' => 2,
            'name' => $request->get('name'),
            'email' => '',
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'active' => 1,
        ]);
        CustomerModel::create([
            'user_id' => $user->id,
            'customer_gender' => 3,
            'customer_birthday' => '',
            'customer_address' => '',
            'customer_cmnd' => '',
            'customer_cmnd_ngaycap' => '',
            'customer_image' => '',
            'id_employee' => 0
        ]);
        if ($check_user == 'notuser') {
            $idcha = 0;
        } else {
            $idcha = $check_user->id;
        }
        HoaHongModel::create([
            'id_khachhang' => $user->id,
            'id_cha' => $idcha,
            'tien_hoa_hong' => 0,
            'status' => 0,
            'danh_dau' => 0

        ]);
        TongTienHoaHongModel::create([
            'id_khachhang' => $user->id,
            'tien_da_lanh' => 0
        ]);
        return redirect('/store/login')->with('success', 'Tạo tài khoản thành công, vui lòng đăng nhập để sử dụng dịch vụ');
    }

    public function index()
    {
        $this->middleware('auth');
        $index = 0;
        $khachhang = Users::join('customer', 'customer.user_id', '=', 'users.id')
            ->join('hoahong', 'hoahong.id_khachhang', '=', 'users.id')
            ->leftjoin('users as nguoigioithieu', 'nguoigioithieu.id', '=', 'hoahong.id_cha')
            ->get([
                'users.id as id',
                'users.name as ten',
                'users.phone as sdt',
                'nguoigioithieu.name as nguoigioithieu',
                'hoahong.tien_hoa_hong as tien',
            ]);
        foreach ($khachhang as $val) {
            $val->stt = ++$index;
        }
        return view('pages.khachhang.danhsach', compact('khachhang'));
    }

    public function create()
    {
        $this->middleware('auth');
        $kh = CustomerModel::join('users', 'users.id', '=', 'customer.user_id')->where('type', 2)->get();
        return view('pages.khachhang.create', compact('kh'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $user = Users::create([
            'type' => 2,
            'name' => $data['kh_ten'],
            'email' => $data['kh_email'],
            'phone' => $data['kh_sdt'],
            'password' => Hash::make($data['kh_matkhau']),
            'active' => 1,
        ]);
        CustomerModel::create([
            'user_id' => $user->id,
            'customer_gender' => $data['kh_gioitinh'],
            'customer_birthday' => $data['kh_ngaysinh'],
            'customer_address' => $data['kh_diachi'],
            'customer_image' => '' //
        ]);
        HoaHongModel::create([
            'id_khachhang' => $user->id,
            'id_cha' => $data['id_ch'],
            'tien_hoa_hong' => 0,
            'status' => 0,
            'danh_dau' => 0

        ]);
        return redirect(route('kh.index'));
    }

    public function conghoahong($id)
    {
        $phancap = PhanCapModel::where('status', 1)->first();
        dd($phancap);
    }

    public function detail(Request $request)
    {
        $data = Users::join('customer', 'customer.user_id', '=', 'users.id')
            ->where('users.id', $request->id)
            ->first();
        $gioithieu = HoaHongModel::leftjoin('users', 'users.id', '=', 'hoahong.id_cha')
            ->where('hoahong.id_khachhang', $request->id)
            ->first();
        if (isset($data)) {
            return ['status' => 'success', 'data' => $data, 'gioithieu' => $gioithieu];
        } else {
            return ['status' => 'error', 'message' => 'Không tìm thấy hóa đơn này'];
        }
    }

    public function changePass(Request $request)
    {
        if (isset($request->id_kh)) {
            $data = Users::where('id', $request->id_kh)->first();
            $data->password = Hash::make($request->get('password'));
            $data->save();
            return redirect(route('kh.index'));
        } else {
            return redirect(route('kh.index'));
        }
    }
}
