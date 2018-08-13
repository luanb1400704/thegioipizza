<?php

namespace App\Http\Controllers;

use App\ChiNhanhModel;
use App\UserProfileModel;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nhanvien = Users::leftjoin('userprofile', 'userprofile.user_id', '=', 'users.id')
            ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'userprofile.id_chinhanh')
            ->where('users.type', '=', 1)
            ->get();
        $count = count($nhanvien);
        for ($i = 0; $i < $count; $i++) {
            $nhanvien[$i]['stt'] = $i + 1;
        }
        return view('pages.nhanvien.nhanvienindex', compact('nhanvien'));
    }

    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
//        dd($id_user);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload', $file->getClientOriginalName());
            $user_image = url('upload') . '/' . $file->getClientOriginalName();
        } else {
            $user_image = "";
        }
        $user = Users::create(
            [
                'type' => 1,
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
                'active' => 1,
            ]
        );
        UserProfileModel::create(
            [
                'user_id' => $user->id,
                'user_gender' => $request->get('user_gender'),
                'user_cmnd' => $request->get('user_cmnd'),
                'user_ngaycap_cmnd' => $request->get('user_ngaycap_cmnd'),
                'user_address' => $request->get('user_address'),
                'id_chinhanh' => $request->get('id_chinhanh'),
                'user_image' => $user_image,
                'user_at' => $id_user,
            ]
        );
//        dd($request->all());
        return redirect('nhan-vien-chi-nhanh/index');
    }

    public function create()
    {
        $chinhanh = ChiNhanhModel::all();
        return view('pages.nhanvien.nhanviencreate', compact('chinhanh'));
    }

    public function edit($id)
    {
        $nhanvien = Users::leftjoin('userprofile', 'userprofile.user_id', '=', 'users.id')
            ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'userprofile.id_chinhanh')
            ->where('users.id', '=', $id)
            ->first();
        $chinhanh = ChiNhanhModel::all();
        return view('pages.nhanvien.nhanvienedit', compact('nhanvien', 'chinhanh'));
    }

    public function update(Request $request, $id)
    {
        $profile = [
            'user_gender' => $request->get('user_gender'),
            'user_address' => $request->get('user_address'),
            'id_chinhanh' => $request->get('id_chinhanh')
        ];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move('upload', $file->getClientOriginalName());
            $profile['user_image'] = url('upload') . '/' . $file->getClientOriginalName();
        }
        Users::where('id', $id)
            ->update(
                [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                ]
            );
        UserProfileModel::where('user_id', $id)
            ->update($profile);
        return redirect('nhan-vien-chi-nhanh/index');
    }

}
