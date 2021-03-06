<?php

namespace App\Http\Controllers;

use App\ChiNhanhModel;
use App\HoaHongModel;
use App\LogHoaHongModel;
use App\LogTienChiHoModel;
use App\TienChiNhanhTraChoKhachModel;
use App\User;
use App\UserProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TienChiHoController extends Controller
{
    public function index(Request $req)
    {
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 1 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
        $hoahongchinhanh = HoaHongModel::join('users', 'users.id', '=', 'hoahong.id_khachhang')
            ->join('customer', 'customer.user_id', '=', 'users.id')
            ->select(
                'hoahong.hh_id',
                'hoahong.tien_hoa_hong',
                'hoahong.id_cha',
                'hoahong.danh_dau',
                'hoahong.status',
                'hoahong.danh_dau',
                'users.name',
                'users.id',
                'users.email',
                'users.phone',
                'customer.customer_birthday',
                'customer.customer_cmnd',
                'customer.customer_address'
            );
        if ($req->has('q') && $req->get('q') != '')
            $hoahongchinhanh = $hoahongchinhanh->where(function ($q) use ($req) {
                return $q->where('users.name', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users.phone', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users.email', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('users.email', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('customer.customer_birthday', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('customer.customer_cmnd', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('customer.customer_address', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoahong.tien_hoa_hong', 'like', '%' . $req->get('q') . '%')
                    ->orwhere('hoahong.id_cha', 'like', '%' . $req->get('q') . '%');
            });
        $hoahongchinhanh = $hoahongchinhanh->paginate(10);
        $count = count($hoahongchinhanh);
        for ($i = 0; $i < $count; $i++) {
            $hoahongchinhanh[$i]['stt'] = $i + 1;
        }
        return view('pages.chihohoahong.chihohoahongindex', compact('hoahongchinhanh'));
    }

    public function tru_tien(Request $req, $id)
    {
        if (Auth::user()) {
            if (Auth::user()->type != 1) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
        $id_user = Auth::user()->id;
        try {
            $id_chinhanh = UserProfileModel::find($id_user)->id_chinhanh;
            $chiNhanh = ChiNhanhModel::find($id_chinhanh)->ten_chinhanh;
        } catch (\Exception $e) {
            $id_chinhanh = 0;
            $chiNhanh = '####';
        }
        $hoahong = HoaHongModel::join('users', 'users.id', '=', 'hoahong.id_khachhang')
            ->join('customer', 'customer.user_id', '=', 'users.id')
            ->where('hoahong.hh_id', '=', $id)
            ->first(
                [
                    'hoahong.tien_hoa_hong',
                    'hoahong.id_khachhang',
                ]
            );
        $tien = $hoahong->tien_hoa_hong;
        $hoahong->tien_hoa_hong = 0;

        HoaHongModel::where('id_khachhang', $hoahong->id_khachhang)->update([
            'tien_hoa_hong' => 0
        ]);

        // log tien hoa hong
        LogHoaHongModel::create([
            'id_khachhang' => $hoahong->id_khachhang,
            'so_tien_da_tra' => $tien,
            'ngay_tra' => 'Nhân viên ' . Auth::user()->name . ' của cửa hàng ' . $chiNhanh . '. Vào lúc ' . date('d-m-Y H:i:s'),
            'id_chinhanh' => $id_chinhanh,
            'id_nhan_vien_tra' => $id_user
        ]);

        $tienTraChoKhach = TienChiNhanhTraChoKhachModel::where('id_chinhanh', $id_chinhanh)->first();
        $tienTraChoKhach->sotien += $tien;
        $tienTraChoKhach->save();

        return redirect('tien-chi-ho-hoa-hong/index')->with('success', 'Thanh toán thành công !');
    }

    public function log_tra_tien()
    {
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
        $id_user = Auth::user()->id;
        if (Auth::user()->type == 0) {
            $log = LogHoaHongModel::leftjoin('users', 'users.id', '=', 'loghoahong.id_khachhang')
                ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'loghoahong.id_chinhanh')
                ->orderBy('loghoahong.created_at', 'desc')
                ->select(
                    'users.name as tenkhachhang',
                    'users.phone as phone',
                    'loghoahong.so_tien_da_tra as so_tien_da_tra',
                    'loghoahong.ngay_tra as ngay_tra',
                    'chinhanh.ten_chinhanh as ten_chinhanh'
                );
            $tongtien = $log->sum('loghoahong.so_tien_da_tra');
        } else {
            $log = LogHoaHongModel::leftjoin('users', 'users.id', '=', 'loghoahong.id_khachhang')
                ->leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'loghoahong.id_chinhanh')
                ->where('loghoahong.id_chinhanh', '=', $id_user)
                ->orderBy('loghoahong.created_at', 'desc')
                ->select(
                    'users.name as tenkhachhang',
                    'users.phone as phone',
                    'loghoahong.so_tien_da_tra as so_tien_da_tra',
                    'loghoahong.ngay_tra as ngay_tra',
                    'chinhanh.ten_chinhanh as ten_chinhanh'
                );
            $tongtien = $log->sum('loghoahong.so_tien_da_tra');
        }
        $log = $log->get();
        $count = count($log);
        for ($i = 0; $i < $count; $i++) {
            $log[$i]['stt'] = $i + 1;
        }
        return view('pages.lichsu.lichsuhoahong', compact('log', 'tongtien'));
    }

    public function tien_chi_nhanh()
    {
        $tienchinhanhtra = LogHoaHongModel::all();
        return view('pages.chihohoahong.tienbanhchinhanh', compact('tienchinhanhtra'));
    }

    //Code của Luân
    //Hiển thị danh sách các chi nhánh đã trả số tiền bao nhiều
    public function tongtienchinhanh()
    {
        if (Auth::user()) {
            if (Auth::user()->type != 0) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
        $listChiNhanh = TienChiNhanhTraChoKhachModel
            ::join('chinhanh', 'tien_chi_nhanh_tra_cho_khach.id_chinhanh', '=', 'chinhanh.id_chinhanh')
            ->join('users', 'users.id', '=', 'chinhanh.id_chinhanh')
            ->where('users.type', 3)->get();
        $count = count($listChiNhanh);
        for ($i = 0; $i < $count; $i++) {
            $listChiNhanh[$i]['stt'] = $i + 1;
        }
        return view('pages.chihohoahong.chinhanhchiho', compact('listChiNhanh'));
    }

    //Thanh toán tiền và lưu vào logchiho
    public function thanhtoan($id)
    {
        if (Auth::user()) {
            if (Auth::user()->type != 0) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
        //Tìm kiếm chi nhánh thông qua id
        $chinhanh = ChiNhanhModel::find($id);
        //Chưa có thì cho về lại trang danh sách chi nhánh
        if (!isset($chinhanh)) {
            return redirect('tien-chi-ho-hoa-hong/tong_tien_chi_nhanh');
        }
        //trong bản chi nhánh không có dữ liệu hoặc là dữ liệu tiền trả cho khách bằng 0 thì trả về trang chính
        $tientrakhach = TienChiNhanhTraChoKhachModel::where('id_chinhanh', $id)->first();
        if (!isset($tientrakhach) && $tientrakhach->sotien == 0) {
            return redirect('tien-chi-ho-hoa-hong/tong_tien_chi_nhanh');
        }
        //Ngược lại làm tiếp
        LogTienChiHoModel::insert([
            'id_chinhanh' => $chinhanh->id_chinhanh,
            'sotien' => $tientrakhach->sotien,
            'ngay_tra' => (string)date('d/m/Y - H:i:s')
        ]);
        TienChiNhanhTraChoKhachModel::where('id_chinhanh', $id)
            ->update([
                'sotien' => 0
            ]);
        return redirect('tien-chi-ho-hoa-hong/tong_tien_chi_nhanh');
    }
    //Xem lại số tiền đã chi cho chi nhánh
    //Hiển thị danh sách các chi nhánh đã trả số tiền bao nhiều
    public function lichsuthanhtoan()
    {
        if (Auth::user()) {
            if (Auth::user()->type != 0 && Auth::user()->type != 3) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
        //Là chủ chi nhánh thì chỉ cho nhìn được lịch sử của chính mình
        if (Auth::user()->type == 3) {
            $listChiNhanh = LogTienChiHoModel
                ::join('chinhanh', 'log_tien_chi_ho.id_chinhanh', '=', 'chinhanh.id_chinhanh')
                ->join('users', 'users.id', '=', 'chinhanh.id_chinhanh')
                ->where('users.type', 3)
                ->where('users.id', Auth::user()->id)
                ->get();
            $count = count($listChiNhanh);
            for ($i = 0; $i < $count; $i++) {
                $listChiNhanh[$i]['stt'] = $i + 1;
            }
        } //Nếu là admin thì thấy được lịch sử tất cả chi nhánh
        else {
            $listChiNhanh = LogTienChiHoModel
                ::join('chinhanh', 'log_tien_chi_ho.id_chinhanh', '=', 'chinhanh.id_chinhanh')
                ->join('users', 'users.id', '=', 'chinhanh.id_chinhanh')
                ->where('users.type', 3)
                ->get();
            $count = count($listChiNhanh);
            for ($i = 0; $i < $count; $i++) {
                $listChiNhanh[$i]['stt'] = $i + 1;
            }
        }
        return view('pages.chihohoahong.lichsuthanhtoan', compact('listChiNhanh'));
    }

}
