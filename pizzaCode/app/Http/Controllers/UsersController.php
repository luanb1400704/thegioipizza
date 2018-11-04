<?php

namespace App\Http\Controllers;

use App\ChiNhanhModel;
use App\HoaDonModel;
use App\Http\Requests\NhanVienRequest;
use App\UserProfileModel;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    protected $SIZE_BREAK = 4;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()){
            if(Auth::user()->type != 0 && Auth::user()->type != 3 ){
                return redirect()->route('home');
            }
        }
        $id_user = Auth::user()->id;
        if ($id_user == 1) {
            $nhanvien = Users::leftjoin('userprofile', 'userprofile.user_id', '=', 'users.id')
                ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'userprofile.id_chinhanh')
                ->where('users.type', '=', 1);
        } else {
            $nhanvien = Users::leftjoin('userprofile', 'userprofile.user_id', '=', 'users.id')
                ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'userprofile.id_chinhanh')
                ->where('users.type', '=', 1)
                ->where('userprofile.id_chinhanh', '=', $id_user);
        }
        $nhanvien = $nhanvien->get();
        $count = count($nhanvien);
        for ($i = 0; $i < $count; $i++) {
            $nhanvien[$i]['stt'] = $i + 1;
        }
        return view('pages.nhanvien.nhanvienindex', compact('nhanvien'));
    }

    public function store(NhanVienRequest $request)
    {

        $id_user = Auth::user()->id;
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
                'id_chinhanh' => $id_user,
                'user_image' => $user_image,
                'user_at' => $id_user,
            ]
        );
        return redirect('nhan-vien-chi-nhanh/index')->with('success', 'Thêm thành công !');
    }

    public function create()
    {
        if(Auth::user()){
            if(Auth::user()->type != 0 && Auth::user()->type != 3 ){
                return redirect()->route('home');
            }
        }
        $chinhanh = ChiNhanhModel::all();
        return view('pages.nhanvien.nhanviencreate', compact('chinhanh'));
    }

    public function edit($id)
    {
        if(Auth::user()){
            if(Auth::user()->type != 0 && Auth::user()->type != 3 ){
                return redirect()->route('home');
            }
        }
        $nhanvien = Users::leftjoin('userprofile', 'userprofile.user_id', '=', 'users.id')
            ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'userprofile.id_chinhanh')
            ->where('users.id', '=', $id)
            ->first();
        return view('pages.nhanvien.nhanvienedit', compact('nhanvien'));
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()){
            if(Auth::user()->type != 0 && Auth::user()->type != 3 ){
                return redirect()->route('home');
            }
        }
        $container = '';
        if ($request->hasFile('user_image')) {
            $request->file('user_image')->move('upload', $request->file('user_image')->getClientOriginalName());
            $container = url('upload') . '/' . $request->file('user_image')->getClientOriginalName();
        }
        $data = $request->except(['_token']);
        $data = collect($data);
        if (empty($container)) {
            $data = $data->except('user_image');
        } else {
            $data['user_image'] = $container;
        }
        if (empty($data->get('password'))) {
            $data = $data->except('password');
            $container = $this->SIZE_BREAK - 1;
        } else {
            $data->offsetSet('password', Hash::make($data->get('password')));
            $container = $this->SIZE_BREAK;
        }
        Users::where('id', $id)->update($data->chunk($container)->shift()->all());
        UserProfileModel::where('user_id', $id)->update($data->slice($container)->all());
        return redirect('nhan-vien-chi-nhanh/index')->with('success', 'Cập nhật thành công !');
    }

    public function total(Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->type != 0 && Auth::user()->type != 3 ){
                return [
                    'sum'=> 0,
                    'list' => [],
                    'status' => true
                ];
            }
        }
        //Lấy ra số hóa đơn và tính tổng tiền của nhân viên đó trong một khoản thời gian đó
        $sum  = DB::table('hoadon')
            ->where('hoadon.id_nhan_vien_lap_hh', $request->id)
            ->whereRaw("`hoadon`.`created_at` >= '".$request->begin."'")
            ->whereRaw("`hoadon`.`created_at` <= '".$request->end."'")
            ->selectRaw('sum(tong_tien_hoa_don) as sum')
            ->first();
        $list = HoaDonModel
                ::join('users','users.id','=','hoadon.id_khachhang')
                ->where('hoadon.id_nhan_vien_lap_hh', $request->id)
                ->where('hoadon.status', 1)
                ->whereRaw("`hoadon`.`created_at` >= '".$request->begin."'")
                ->whereRaw("`hoadon`.`created_at` <= '".$request->end."'")
                ->select('hoadon.*', 'users.name','users.phone')
                ->get();
        return [
            'sum'=> $sum,
            'list' => $list,
            'status' => true
        ];
    }
}
