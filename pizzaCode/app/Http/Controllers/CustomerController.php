<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\HoaHongModel;
use App\PhanCapModel;
use App\Users;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function register(Request $request)
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



        $user = Users::create(
            [
                'type' => 2,
                'name' => $request->get('name'),
                'email' => $request->get('email') || '',
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
                'active' => 1,
            ]
        );
        $customer = CustomerModel::create(
            [
                'user_id' => $user->id,
                'customer_gender' => $request->get('customer_gender'),
                'customer_birthday' => $request->get('customer_birthday'),
                'customer_address' => $request->get('customer_address'),
                'customer_cmnd' => $request->get('customer_cmnd'),
                'customer_cmnd_ngaycap' => $request->get('customer_cmnd_ngaycap'),
                'customer_image' => '',
                'id_employee' => 0
            ]
        );
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_file_name = $customer->id;
            $file->move('upload', $new_file_name);
            $kh_anhdaidien = url('upload') . '/' . $new_file_name;
        } else {
            $kh_anhdaidien = "";
        }
        $customer->customer_image = $kh_anhdaidien;
        $customer->save();

        if($check_user == 'notuser'){
            $idcha = 0;
        }
        else{
            $idcha = $check_user->id ;

        }
        HoaHongModel::create(
            [
                'id_khachhang' => $user->id,
                'id_cha' => $idcha,
                'tien_hoa_hong' => 0,
                'status' => 0,
                'danh_dau' => 0

            ]
        );
        return redirect('/store/home')->with('success', 'Tạo tài khoản thành công, vui lòng đăng nhập để sử dụng dịch vụ');
    }
    public function update(Request $request)
    {
        if ($request->password != $request->repassword) {
            return redirect('/store/register')->with('errconfirmpass', 'Nhập password không trùng khớp, vui lòng nhập lại pasword xác nhận');
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_file_name = $request->id;
            $file->move('upload', $new_file_name);
            $kh_anhdaidien = url('upload') . '/' . $new_file_name;
            $file = CustomerModel::find($request->id);
        } else {
            $kh_anhdaidien = "";
        }

        $user = Users::where('id', $request->id)
            ->update(
            [
                'type' => 2,
                'name' => $request->get('name'),
                'email' => $request->get('email') || '',
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
                'active' => 1,
            ]
        );
        $cus = CustomerModel::where('user_id', $request->id)
            ->update(
                [
                    'customer_gender' => $request->get('customer_gender'),
                    'customer_birthday' => $request->get('customer_birthday'),
                    'customer_address' => $request->get('customer_address'),
                    'customer_cmnd' => $request->get('customer_cmnd'),
                    'customer_cmnd_ngaycap' => $request->get('customer_cmnd_ngaycap'),
                ]
            );
        if(!empty($kh_anhdaidien))
        $cus->customer_image = $kh_anhdaidien;

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

        $user = Users::create(
            [
                'type' => 2,
                'name' => $request->get('name'),
                'email' => '',
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
                'active' => 1,
            ]
        );
        CustomerModel::create(
            [
                'user_id' => $user->id,
                'customer_gender' => 0,
                'customer_birthday' => '',
                'customer_address' => '',
                'customer_cmnd' => '',
                'customer_cmnd_ngaycap' => '',
                'customer_image' => '',
                'id_employee' => 0
            ]
        );
        if($check_user == 'notuser'){
            $idcha = 0;
        }
        else{
            $idcha = $check_user->id ;

        }

        HoaHongModel::create(
            [
                'id_khachhang' => $user->id,
                'id_cha' => $idcha,
                'tien_hoa_hong' => 0,
                'status' => 0,
                'danh_dau' => 0

            ]
        );

        return redirect('/store/home')->with('success', 'Tạo tài khoản thành công, vui lòng đăng nhập để sử dụng dịch vụ');
    }

    public function index()
    {
        $this->middleware('auth');
        $index = 0;
        $khachhang = Users::join('customer', 'customer.user_id', '=', 'users.id')
            ->join('hoahong', 'hoahong.id_khachhang', '=', 'users.id')
            ->get();
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
        CustomerModel::create(
            [
                'user_id' => $user->id,
                'customer_gender' => $data['kh_gioitinh'],
                'customer_birthday' => $data['kh_ngaysinh'],
                'customer_address' => $data['kh_diachi'],
                'customer_image' => '' //
            ]
        );
        HoaHongModel::create(
            [
                'id_khachhang' => $user->id,
                'id_cha' => $data['id_ch'],
                'tien_hoa_hong' => 0,
                'status' => 0,
                'danh_dau' => 0

            ]
        );
        return redirect(route('kh.index'));
    }

    public function conghoahong($id)
    {
        $phancap = PhanCapModel::where('status', 1)->first();
        dd($phancap);
    }

    public  function detail(Request $request){
        $data = Users::join('customer', 'customer.user_id','=','users.id')
            ->where('users.id',$request->id)
            ->first();
        $gioithieu = HoaHongModel::join('users','users.id', '=','hoahong.id_cha')
            ->where('hoahong.id_khachhang', $request->id)
            ->first();
        if (isset($data)) {
            return ['status' => 'success', 'data' => $data, 'gioithieu' => $gioithieu];
        } else {
            return ['status' => 'error', 'message' => 'Không tìm thấy hóa đơn này'];
        }
    }
    public function changePass(Request $request){
        if(isset($request->id_kh)){
            $data = Users::where('id', $request->id_kh)->first();
            $data->password = Hash::make($request->get('password'));
            $data->save();
            return redirect(route('kh.index'));
        }
        else{
            return redirect(route('kh.index'));
        }
    }
}
