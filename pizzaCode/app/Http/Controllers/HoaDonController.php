<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\GiaModel;
use App\HoaDonChiTietModel;
use App\HoaDonModel;
use App\HoaHongModel;
use App\Http\Requests\Customer;
use App\PhanCapModel;
use Illuminate\Support\Facades\DB;
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
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        return HoaDonModel::where('status', 0)->count();
    }

    public function edit(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        $order = HoaDonModel::find($request->get('id'));
        if (empty($order)) {
            return [
                'status' => 'fail',
                'data' => []
            ];
        }
        $user = Users::where('id', $order->id_khachhang)->get([
            'name',
            'phone'
        ])[0];
        $details = HoaDonChiTietModel::leftjoin('banh', 'banh.b_id', '=', 'hoadonchitiet.b_id')
            ->leftjoin('loaibanh', 'loaibanh.l_id', '=', 'hoadonchitiet.l_id')
            ->leftjoin('gia', 'gia.g_id', '=', 'hoadonchitiet.g_id')
            ->where('hoadonchitiet.hd_id', $order->hd_id)
            ->get([
                'hoadonchitiet.hd_id as order',
                'hoadonchitiet.hdct_id as id',
                'banh.b_ten as name',
                'loaibanh.l_ten as label',
                'loaibanh.l_id as type',
                'hoadonchitiet.so_luong_mua as amounts',
                'gia.g_tien as price',
                'hoadonchitiet.thanh_tien as total'
            ])
            ->toArray();
        return [
            'status' => 'success',
            'data' => [
                'order' => $order,
                'user' => $user,
                'details' => $details
            ]
        ];
    }

    public function type(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        $labels['Loại Nhỏ'] = 7;
        $labels['Loại Vừa'] = 8;
        $labels['Loại Lớn'] = 9;
        $order = HoaDonModel::where('hd_id', $request->get('order'));
        $detail = HoaDonChiTietModel::where('hdct_id', $request->get('id'));
        $price = GiaModel::where('l_id', $labels[$request->get('label')])
            ->where('b_id', $detail->first()->b_id);
        $detail->update([
            'g_id' => $price->first()->g_id,
            'l_id' => $labels[$request->get('label')],
            'g_tien' => $price->first()->g_tien,
            'thanh_tien' => $detail->first()->so_luong_mua * $price->first()->g_tien
        ]);
        $order->update(['tong_tien_hoa_don' => $order->first()->tong_tien_hoa_don - $request->get('total') + $detail->first()->thanh_tien]);
        return [
            'date' => $order->first()->updated_at,
            'total' => $order->first()->tong_tien_hoa_don,
            'data' => HoaDonChiTietModel::leftjoin('banh', 'banh.b_id', '=', 'hoadonchitiet.b_id')
                ->leftjoin('loaibanh', 'loaibanh.l_id', '=', 'hoadonchitiet.l_id')
                ->leftjoin('gia', 'gia.g_id', '=', 'hoadonchitiet.g_id')
                ->where('hoadonchitiet.hdct_id', $request->get('id'))
                ->get([
                    'hoadonchitiet.hd_id as order',
                    'hoadonchitiet.hdct_id as id',
                    'banh.b_ten as name',
                    'loaibanh.l_ten as label',
                    'loaibanh.l_id as type',
                    'hoadonchitiet.so_luong_mua as amounts',
                    'gia.g_tien as price',
                    'hoadonchitiet.thanh_tien as total'
                ])->toArray()
        ];
    }

    public function modal(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        return GiaModel::join('banh', 'banh.b_id', '=', 'gia.b_id')
            ->join('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
            ->whereNotIn('banh.b_id', HoaDonChiTietModel::where('hd_id', $request->get('order'))
                ->distinct('b_id')
                ->get([
                    'b_id'
                ])->map(function ($item) {
                    return $item->b_id;
                }))
            ->orderby('gia.g_tien', 'asc')
            ->orderby('banh.b_ten', 'asc')
            ->get([
                'gia.g_id as id',
                'banh.b_ten as ten',
                'loaibanh.l_ten as loai',
                'gia.g_tien as gia'
            ]);
    }

    public function add(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        try {
            $price = GiaModel::where('g_id', $request->get('id'));
            $order = HoaDonModel::where('hd_id', $request->get('order'));
            $order->update([
                'tong_tien_hoa_don' => $order->first()->tong_tien_hoa_don + $price->first()->g_tien * $request->get('amounts')
            ]);
            HoaDonChiTietModel::create([
                'hd_id' => $order->first()->hd_id,
                'g_id' => $price->first()->g_id,
                'so_luong_mua' => $request->get('amounts'),
                'b_id' => $price->first()->b_id,
                'l_id' => $price->first()->l_id,
                'g_tien' => $price->first()->g_tien,
                'thanh_tien' => $price->first()->g_tien * $request->get('amounts')
            ]);
            return [
                'status' => 'success',
                'message' => 'Thêm bánh thành công',
                'data' => [
                    'date' => $order->first()->updated_at,
                    'total' => $order->first()->tong_tien_hoa_don,
                    'rows' => HoaDonChiTietModel::leftjoin('banh', 'banh.b_id', '=', 'hoadonchitiet.b_id')
                        ->leftjoin('loaibanh', 'loaibanh.l_id', '=', 'hoadonchitiet.l_id')
                        ->leftjoin('gia', 'gia.g_id', '=', 'hoadonchitiet.g_id')
                        ->where('hoadonchitiet.hd_id', $order->first()->hd_id)
                        ->get([
                            'hoadonchitiet.hd_id as order',
                            'hoadonchitiet.hdct_id as id',
                            'banh.b_ten as name',
                            'loaibanh.l_ten as label',
                            'loaibanh.l_id as type',
                            'hoadonchitiet.so_luong_mua as amounts',
                            'gia.g_tien as price',
                            'hoadonchitiet.thanh_tien as total'
                        ])
                        ->toArray()
                ]
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'failed',
                'message' => 'Thêm bánh thất bại'
            ];
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        $detail = HoaDonChiTietModel::where('hdct_id', $request->get('id'));
        $query = HoaDonModel::where('hd_id', $request->get('order'));
        $query->update([
            'tong_tien_hoa_don' => $query->first()->tong_tien_hoa_don - $detail->first()->thanh_tien + $request->get('total')
        ]);
        $detail->update([
            'so_luong_mua' => $request->get('amounts'),
            'thanh_tien' => $request->get('total')
        ]);
        return [
            'date' => $query->first()->updated_at,
            'total' => $query->first()->tong_tien_hoa_don
        ];
    }

    public function remove(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
        if ($request->get('type') === 'item') {
            $query = HoaDonChiTietModel::where('hdct_id', $request->get('id'));
            $order = HoaDonModel::where('hd_id', $query->first()->hd_id);
            $order->update([
                'tong_tien_hoa_don' => $order->first()->tong_tien_hoa_don - $query->first()->thanh_tien
            ]);
            $query->delete();
            return [
                'date' => $order->first()->updated_at
            ];
        }
        try {
            HoaDonModel::find($request->get('id'))->delete();
            if ($request->get('type') === 'all') {
                HoaDonChiTietModel::where('hd_id', $request->get('id'))->delete();
            }
            return [
                'status' => 'success',
                'message' => 'Hoá đơn đã được xoá'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'failed',
                'message' => 'Lỗi khi xoá hoá đơn'
            ];
        }
    }

    public function create()
    {
        if (Auth::user()) {
            if (Auth::user()->type == 2) {
                return redirect()->route('home');
            }
        }
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
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 1 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        }
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
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 1 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        }
        $contain['order'] = HoaDonModel::find($id);
        if ($contain['order']->status == 1) {
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
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 1 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        }
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
            'customer_gender' => 3,
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
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 1 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        }
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
        if ($req->has('1') && $req->get('1') && $req->has('2') && $req->get('2') != '')
            $khachhang = $khachhang->where(function ($q) use ($req) {
                return $q->whereBetween('hoadon.created_at', [$req->get('1'), $req->get('2')]);
            });
        $khachhang = $khachhang->paginate(10);
        $count = count($khachhang);
        for ($i = 0; $i < $count; $i++) {
            $khachhang[$i]['stt'] = $i + 1;
        }
        return view('pages.hoadon.hddaduyet', compact('khachhang', 'tenkhachhang', 'sdtkhachhang'));
    }

    public function indexchuaduyet(Request $req)
    {
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 1 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        }
        $tenkhachhang = Users::selectRaw('name,id')
            ->where('type', 2)
            ->get(['name', 'id']);
        $sdtkhachhang = Users::selectRaw('phone,id')
            ->where('type', 2)
            ->get(['phone', 'id']);
        $khachhang = HoaDonModel::leftjoin('users', 'hoadon.id_khachhang', '=', 'users.id')
            ->where('hoadon.status', 0)
            ->orderByRaw('hoadon.created_at desc')
            ->orderByRaw('users.id desc')
            ->select('users.*', 'hoadon.*');
        if ($req->has('q') && $req->get('q') != '')
            $khachhang = $khachhang->where(function ($q) use ($req) {
                return $q->where('users.name', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users.phone', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.tong_tien_hoa_don', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.created_at', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoadon.hd_id', 'like', '%' . $req->get('q') . '%');
            });
        if ($req->has('k') && $req->get('k') != '') {
            $khachhang = $khachhang->where('users.id', $req->get('k'));
        }
        if ($req->has('i') && $req->get('i') != '') {
            $khachhang = $khachhang->where('users.id', $req->get('i'));
        }
        if ($req->has('1') && $req->get('1') && $req->has('2') && $req->get('2') != '')
            $khachhang = $khachhang->where(function ($q) use ($req) {
                return $q->whereBetween('hoadon.created_at', [$req->get('1'), $req->get('2')]);
            });
        $khachhang = $khachhang->paginate(10);
        $count = count($khachhang);
        for ($i = 0; $i < $count; $i++) {
            $khachhang[$i]['stt'] = $i + 1;
        }
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
            ->join('userprofile','userprofile.user_id','=','hoadon.id_nhan_vien_lap_hh')
            ->join('chinhanh','chinhanh.id_chinhanh','=','userprofile.id_chinhanh')
            ->where('chinhanh.id_chinhanh', $request->id)
            ->whereRaw("`hoadon`.`created_at` >= '".$request->begin."'")
            ->whereRaw("`hoadon`.`created_at` <= '".$request->end."'")
            ->selectRaw('sum(tong_tien_hoa_don) as sum')
            ->first();
        $list = HoaDonModel
            ::join('users','users.id','=','hoadon.id_khachhang')
            ->join('userprofile','userprofile.user_id','=','hoadon.id_nhan_vien_lap_hh')
            ->join('chinhanh','chinhanh.id_chinhanh','=','userprofile.id_chinhanh')
            ->where('chinhanh.id_chinhanh', $request->id)
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
