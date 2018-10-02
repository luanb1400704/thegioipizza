<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\GiaModel;
use App\HoaDonChiTietModel;
use App\HoaDonModel;
use App\HoaHongModel;
use App\Http\Requests\Customer;
use App\PhanCapModel;
use Illuminate\Support\Facades\Validator;
use App\TongTienHoaHongModel;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HoaDonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getBadge()
    {
        return HoaDonModel::where('status', 0)->count();
    }

    public function create()
    {
        $nhanVien = Auth::user();
        $khachHang = Users::where('type', 2)->orderby('name', 'asc')->get([
            'id', 'name', 'phone'
        ]);
        $item = collect([]);
        $banh = GiaModel::join('banh', 'banh.b_id', '=', 'gia.b_id')
            ->join('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
            ->orderby('gia.g_tien', 'asc')
            ->orderby('banh.b_ten', 'asc')
            ->get([
                'gia.g_id as id',
                'banh.b_ten as ten',
                'loaibanh.l_ten as loai',
                'gia.g_tien as gia'
            ]);
        if (!empty($banh)) {
            foreach ($banh as $val) {
                $item[$val->id] = $val;
            }
        }
        $hold = [$nhanVien, $khachHang, $item];
        return view('pages.hoadon.createhd', compact('hold'));
    }

    public function store(Request $request)
    {
        $contain = $request->except('_token');
        $contain['json'] = json_decode($contain['json']);
        $contain['hold'] = HoaDonModel::create([
            'id_nhan_vien_lap_hh' => Auth::user()->id,
            'id_khachhang' => $contain['khach_hang'],
            'tong_tien_hoa_don' => $contain['sum'],
            'status' => 0,
            'id_phan_cap' => PhanCapModel::where('status', 1)->first()->pc_id
        ]);
        $contain['json'] = collect($contain['json'])->filter(function ($value) {
            if (empty($value)) {
                return false;
            }
            return $value->soluong > 0;
        })->map(function ($value) {
            $hold = GiaModel::where('g_id', $value->id)->first([
                'g_id',
                'b_id',
                'l_id',
                'g_tien'
            ]);
            $hold->soluong = $value->soluong;
            return $hold->toArray();
        });
        $contain['array'] = [];
        foreach ($contain['json'] as $val) {
            array_push($contain['array'], [
                'hd_id' => $contain['hold']->hd_id,
                'g_id' => $val['g_id'],
                'so_luong_mua' => $val['soluong'],
                'b_id' => $val['b_id'],
                'l_id' => $val['l_id'],
                'g_tien' => $val['g_tien'],
                'thanh_tien' => $val['g_tien'] * $val['soluong']
            ]);
        }
        $contain['list'] = HoaDonChiTietModel::insert($contain['array']);
        return [
            'message' => 'Tạo hóa đơn thành công',
        ];
    }

    public function findFather($id)
    {
        return HoaHongModel::where('id_khachhang', $id)->first()->id_cha;
    }

    public function plusMoney($id, $money, $count, $number)
    {
        $contain['money'] = HoaHongModel::where('id_khachhang', $id)->first();
        if (empty($contain['money']) || $count >= $number) {
            return [];
        }

        $contain['money']->tien_hoa_hong += $money;
        $contain['money']->save();
        $contain['sum_money'] = TongTienHoaHongModel::where('id_khachhang', $id)->first();
        if (empty($contain['sum_money'])) {
            $contain['sum_money']->tien_da_lanh += $money;
            $contain['sum_money']->save();
        }
        $count++;
        return $this->plusMoney($contain['money']->id_cha, $money, $count, $number);
    }


    public function manyLevel($id, $count, $number)
    {
        $contain = HoaHongModel::where('id_khachhang', $id)->first();
        if (empty($contain) || $count > $number) {
            return $count;
        }
        $count++;
        return $this->manyLevel($contain->id_cha, $count, $number);
    }

    public function commission($id)
    {
        $contain['order'] = HoaDonModel::find($id);
        if($contain['order']->status == 1){
            return redirect(route('hoadon.indexdaduyet'));
        }
        $contain['level'] = PhanCapModel::find($contain['order']->id_phan_cap);
        $contain['customer'] = $contain['order']->id_khachhang;
        $contain['percent'] = $contain['level']->pc_tile;
        $contain['number'] = $contain['level']->pc_socap;
        $contain['order']->status = 1;
        $contain['order']->save();
        $contain['count'] = $this->manyLevel($contain['customer'], 0, $contain['number']);
        if ($contain['count'] < $contain['number']) {
            $contain['money_plus'] = $contain['percent'] / 100 * $contain['order']->tong_tien_hoa_don / $contain['count'];
        } else {
            $contain['money_plus'] = $contain['percent'] / 100 * $contain['order']->tong_tien_hoa_don / $contain['number'];
        }
        $contain['money_customer'] = HoaHongModel::where('id_khachhang', $contain['customer'])->first();

        $today = date('d-m-Y');
        $moth = strtotime(date("d-m-Y", strtotime($today)) . " +30 days");
        $moth = strftime("%d-%m-%Y", $moth);

        $contain['money_customer']->danh_dau = $moth;
        $contain['money_customer']->tien_hoa_hong += $contain['money_plus'];
        $contain['money_customer']->save();
        $contain['sum_money_customer'] = TongTienHoaHongModel::where('id_khachhang', $contain['customer'])->first();
        $contain['sum_money_customer']->tien_da_lanh += $contain['money_plus'];
        $contain['sum_money_customer']->save();
        $this->plusMoney($this->findFather($contain['customer']), $contain['money_plus'], 0, $contain['number'] - 1);
        return redirect(route('hoadon.indexdaduyet'));
    }

    public function createCustomer(Request $request)
    {
        $contain = $request->except('_token');
        $validated = Validator::make($contain, Customer::rules(), Customer::getMessage());
        if ($validated->fails()) {
            return [
                'status' => 'failed',
                'message' => $validated->errors()->all()
            ];
        }
        if (empty($contain['id_cha'])) {
            $contain['id_cha'] = 0;
        }
        $user = Users::create([
            'type' => 2,
            'name' => $contain['name'],
            'email' => '',
            'phone' => $contain['phone'],
            'password' => Hash::make($contain['password']),
            'active' => 1,
            'created_by' => Auth::user()->id,
        ]);
        CustomerModel::create([
            'user_id' => $user->id,
            'customer_birthday' => '',
            'customer_cmnd' => '',
            'customer_cmnd_ngaycap' => '',
            'customer_gender' => 0,
            'customer_address' => '',
            'customer_image' => '',
            'id_employee' => Auth::user()->id
        ]);
        HoaHongModel::create([
            'id_khachhang' => $user->id,
            'id_cha' => $contain['id_cha'],
            'tien_hoa_hong' => 0,
            'status' => 0,
            'danh_dau' => ''
        ]);
        TongTienHoaHongModel::create([
            'id_khachhang' => $user->id,
            'tien_da_lanh' => 0
        ]);
        $customer = Users::where('type', 2)->orderby('name', 'asc')->get([
            'id', 'name', 'phone'
        ]);
        return [
            'message' => 'Tạo khách hàng thành công',
            'data' => [
                $user->id, $customer
            ]
        ];
    }

    public function indexdaduyet(Request $req)
    {
        $tenkhachhang = Users::selectRaw('name,id')
            ->where('type', 2)
            ->get(['name', 'id']);
        $sdtkhachhang = Users::selectRaw('phone,id')
            ->where('type', 2)
            ->get(['phone', 'id']);
        $khachhang = HoaDonModel::join('users', 'hoadon.id_khachhang', '=', 'users.id')
            ->where('hoadon.status', 1)
            ->orderByRaw('hoadon.hd_id desc')
            ->orderByRaw('hoadon.created_at desc')
            ->select('users.*', 'hoadon.*');
        if ($req->has('q') && $req->get('q') != '')
            $khachhang = $khachhang->where(function ($q) use ($req) {
                return $q->where('users.name', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users.phone', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.tong_tien_hoa_don', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.created_at', 'like', '%' . $req->get('q') . '%');
            });
        if ($req->has('k') && $req->get('k') != '') {
            $khachhang = $khachhang->where('users.id', $req->get('k'));
        }
        if ($req->has('i') && $req->get('i') != '') {
            $khachhang = $khachhang->where('users.id', $req->get('i'));
        }
        $khachhang = $khachhang->get();
        return view('pages.hoadon.hddaduyet', compact('khachhang', 'tenkhachhang', 'sdtkhachhang'));
    }

    public function indexchuaduyet(Request $req)
    {
        $tenkhachhang = Users::selectRaw('name,id')
            ->where('type', 2)
            ->get(['name', 'id']);
        $sdtkhachhang = Users::selectRaw('phone,id')
            ->where('type', 2)
            ->get(['phone', 'id']);
//        dd($sdtkhachhang);
        $khachhang = HoaDonModel::leftjoin('users', 'hoadon.id_khachhang', '=', 'users.id')
            ->where('hoadon.status', 0)
            ->orderByRaw('users.id desc')
            ->orderByRaw('hoadon.created_at desc')
            ->select('users.*', 'hoadon.*');
        if ($req->has('q') && $req->get('q') != '')
            $khachhang = $khachhang->where(function ($q) use ($req) {
                return $q->where('users.name', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users.phone', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.tong_tien_hoa_don', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.created_at', 'like', '%' . $req->get('q') . '%');
            });
        if ($req->has('k') && $req->get('k') != '') {
            $khachhang = $khachhang->where('users.id', $req->get('k'));
        }
        if ($req->has('i') && $req->get('i') != '') {
            $khachhang = $khachhang->where('users.id', $req->get('i'));
        }
        $khachhang = $khachhang->get();
        return view('pages.hoadon.hdchuaduyet', compact('khachhang', 'tenkhachhang', 'sdtkhachhang'));
    }

    public function indexdaduyetdetail(Request $request)
    {
        $hoadon = HoaDonModel::leftjoin('users', 'hoadon.id_nhan_vien_lap_hh', '=', 'users.id')
            ->select('users.*', 'hoadon.*')
            ->where('hoadon.hd_id', $request->get('id'))
            ->first();
        $chitiethoadon = HoaDonChiTietModel::join('gia', 'gia.g_id', '=', 'hoadonchitiet.g_id')
            ->join('loaibanh', 'loaibanh.l_id', '=', 'hoadonchitiet.l_id')
            ->join('banh', 'banh.b_id', '=', 'hoadonchitiet.b_id')
            ->join('hoadon', 'hoadon.hd_id', '=', 'hoadonchitiet.hd_id')
            ->where('hoadonchitiet.hd_id', $request->get('id'))
            ->select('hoadonchitiet.*', 'banh.b_ten', 'loaibanh.l_ten', 'loaibanh.l_kichthuoc')
            ->get();
        $data = [
            'hoadon' => $hoadon,
            'chitiet' => $chitiethoadon
        ];
        if (isset($hoadon)) {
            return ['status' => 'success', 'data' => $data];
        } else {
            return ['status' => 'error', 'data' => $data, 'message' => 'Không tìm thấy hóa đơn này'];
        }
    }

}
