<?php

namespace App\Http\Controllers;

use App\BanhModel;
use App\CustomerModel;
use App\GiaModel;
use App\HoaDonChiTietModel;
use App\HoaDonModel;
use App\HoaHongModel;
use App\LogHoaHongModel;
use App\PhanCapModel;
use App\TongTienHoaHongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FontEndController extends Controller
{
    public  function get_home(){
        $banh = BanhModel::all();
        //Điều hướng xem có giỏ bánh sẵn hay chưa
        //Chưa đăng nhập thì mặc định giỏ rỗng
        if(!Auth::user()){
            foreach ($banh as $key=> $value){
                $tempbanh  = GiaModel::join('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
                ->where('b_id',$value->b_id)
                ->get();
                $value->loai = $tempbanh;

            }
            return view('website.home', compact('banh'));
        }
        //Nếu đăng nhập rồi thì tìm giỏ hàng

        else {
            $giohang = HoaDonModel::where('status', -1)
                ->where('id_khachhang', Auth::user()->id )
                ->get();
            //Có giỏ hàng thì tiến hàng nạp giá trị cho nó
            if(sizeof($giohang)!=0){
                foreach ($banh as $key=> $value){
                    $tempbanh  = GiaModel::join('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
                        ->leftjoin('hoadonchitiet', 'hoadonchitiet.g_id', '=', 'gia.g_id')
                        ->where('gia.b_id',$value->b_id)
                        ->where('hoadonchitiet.hd_id', $giohang[0]->hd_id)
                        ->select('gia.*','hoadonchitiet.hdct_id', 'hoadonchitiet.so_luong_mua','loaibanh.l_ten', 'loaibanh.l_kichthuoc' )
                        ->get();
                    if(sizeof($tempbanh)==0){
                        $tempbanh  = GiaModel::join('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
                            ->leftjoin('hoadonchitiet', 'hoadonchitiet.g_id', '=', 'gia.g_id')
                            ->where('gia.b_id',$value->b_id)
                            ->select('gia.*','hoadonchitiet.hdct_id', 'hoadonchitiet.so_luong_mua','loaibanh.l_ten', 'loaibanh.l_kichthuoc' )
                            ->get();
                    }
                    $value->loai =  $tempbanh ;
                }
                return view('website.home', compact('banh'));
            }
            //Nếu không có giỏ hàng thì hiện bình thường
            else{
                foreach ($banh as $key=> $value){
                    $tempbanh  = GiaModel::join('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
                        ->where('b_id',$value->b_id)
                        ->get();
                    $value->loai = $tempbanh;

                }
                return view('website.home', compact('banh'));
            }
        }

    }

    public  function get_about(){
        return view('fontend.about');
    }

    public  function get_cart(){
        return view('fontend.cart');
    }

    public  function get_contact(){
        //Bắt đăng nhập
        if(!Auth::user()){
            return view('website.login')->with('success', 'Vui lòng đăng nhập trước !!!');
        }
        //Lấy thông tin người đăng nhập
        $customer = CustomerModel::
            join('users', 'users.id','=', 'customer.user_id')
            ->where('customer.user_id', Auth::user()->id)
            ->where('users.type', 2)
            ->first();

        //Lấy tiền hoa hồng hiện tại
        $hoahong = HoaHongModel::where('id_khachhang', Auth::user()->id)->first();
//        dd($hoahong);
        //Lấy thông tin lịch sử mua hàng
        $hoadon = HoaDonModel::where('id_khachhang',Auth::user()->id)
            ->where('status', 1)->get();
        if(!empty($hoadon))
        foreach ($hoadon as $key => $value){
            $chitiethoadon = HoaDonChiTietModel
                ::join('gia','gia.g_id', '=','hoadonchitiet.g_id')
                ->join ('loaibanh','loaibanh.l_id', '=', 'hoadonchitiet.l_id')
                ->join('banh', 'banh.b_id', '=','hoadonchitiet.b_id')
                ->join('hoadon', 'hoadon.hd_id', '=','hoadonchitiet.hd_id')
                ->where('hoadonchitiet.hd_id', $value->hd_id)
                ->where('hoadon.status',1)
                ->select('hoadonchitiet.*','banh.b_ten','loaibanh.l_ten','loaibanh.l_kichthuoc')
                ->get();
            $value['chitiet'] = $chitiethoadon;
        }

        //Lấy lịch sử nhận tiền hoa hồng
        $nhantien = LogHoaHongModel
            ::join('users', 'users.id','=','loghoahong.id_nhan_vien_tra')
            ->where('id_khachhang', Auth::user()->id)
            ->select('loghoahong.*', 'users.name')
            ->get();

        //Lấy tổng tích lũy
        $tongtichluy = TongTienHoaHongModel::where('id_khachhang', Auth::user()->id)->first();

        return view('website.contact',compact(

            'customer',
            'hoahong',
            'hoadon',
            'nhantien',
            'tongtichluy'

        ));
    }

    public function order(){
        //Lấy thông tin từ hóa đơn hiện tại chưa duyệt
        //Bắt đăng nhập
        if(!Auth::user()){
            return view('website.login')->with('success', 'Vui lòng đăng nhập trước !!!');
        }
        $hoadon = HoaDonModel::where('status', -1)
            ->where('id_khachhang',Auth::user()->id)
            ->first();
        //Nếu có 1 hóa đơn thì lấy dữ liệu của nó
        if(isset($hoadon))
        $hoadonchitiet = HoaDonChiTietModel::join('banh', 'banh.b_id', '=','hoadonchitiet.b_id')
            ->join('hoadon', 'hoadon.hd_id', '=', 'hoadonchitiet.hd_id')
            ->join('gia', 'gia.g_id', '=','hoadonchitiet.g_id')
            ->join('loaibanh', 'loaibanh.l_id', '=','hoadonchitiet.l_id')
            ->where('hoadon.hd_id',$hoadon->hd_id)
            ->select('hoadonchitiet.*', 'gia.g_tien','banh.b_ten', 'banh.b_anh','loaibanh.l_ten','loaibanh.l_kichthuoc' )
            ->get();
        else $hoadonchitiet = [];

        return view('website.order', compact('hoadonchitiet','hoadon'));
    }
    public function order_remove($id){
        $chitiet = HoaDonChiTietModel::find($id);
        $id_hd = $chitiet->hd_id;
        $chitiet->delete();
        $chitietfind = HoaDonChiTietModel::where('hd_id',$chitiet->hd_id)->get();
        if(sizeof($chitietfind)==0)
            HoaDonModel::find($id_hd)->delete();
        else{
            $sum = 0;
            foreach ($chitietfind as $key => $value){
                $sum = $sum + $value->thanh_tien;
            }
            $hoadon = HoaDonModel::find($id_hd);
            $hoadon->tong_tien_hoa_don = $sum;
            $hoadon->save();
        }
        return redirect('/store/order')->with('delete_success','Đã xóa bánh khỏi giỏ hàng thành công');
    }
    //Xác nhận thanh toán
    public function order_success(Request $request){
//        dd($request);
        $tongtien = 0;
        $mangchitiet = array();
        foreach ($request->l_id as $key => $value){
                if($request->soluong[$key]!='' && $request->soluong[$key]>0){
                    $chitiettemp = HoaDonChiTietModel::where('b_id',$request->b_id[$key])
                        ->where('l_id',$request->l_id[$key])
                        ->where('hdct_id',$request->hdct_id[$key])
                        ->first();
                    $tamtinh = $chitiettemp->g_tien * $request->soluong[$key];
                    $tongtien = $tongtien + $tamtinh;
                    $chitiettemp->update([
                        'so_luong_mua' => $request->soluong[$key],
                        'thanh_tien' => $tamtinh
                    ]);
                }

        }
        //Tìm phân cấp mới nhất đang bật
        $phancap = PhanCapModel::where('status', 1)->first();
        //Tìm hóa đơn xem có chưa
        $hoadon = HoaDonModel::where('status', -1)
            ->where('id_khachhang',Auth::user()->id)
            ->first();
        //Nếu giỏ hàng rỗng thì báo lỗi
        if(!isset($hoadon))
            return redirect('/store/home')->with('order_error_success   ','Rất tiết có lỗi thanh toán !!!');
        $hoadon->status = 0;
        $hoadon->tong_tien_hoa_don = $tongtien;
        $hoadon->save();
        return redirect('/store/home')->with('order_success','Đã xác nhận thanh toán thành công');
    }
    public function login(){
        return view('website.login');
    }

    public function register(){
        return view('website.register');
    }
    public function fast_register(){
        return view('website.fast_register');
    }



    //Hàm cho người dùng đặt bánh
    public function order_pizza(Request $request){
        $tongtien = 0;
        $mangchitiet = array();
        foreach ($request->key as $key => $value){
            $dongia = GiaModel::where('b_id',$request->b_id)
                ->where('l_id', $value)
                ->first();
            if(empty($dongia)){
                return redirect('/store/home')->with('sailoai', 'Loại bánh bạn chọn không tồn tại');
            }
            else{
                if($request->soluong[$key]!='' && $request->soluong[$key]>0){
                    array_push($mangchitiet,[
                        'g_id' => $dongia ->g_id,
                        'so_luong_mua' => $request->soluong[$key],
                        'b_id' =>$request->b_id,
                        'l_id' => $value,
                        'g_tien'=> $dongia->g_tien,
                        'thanh_tien' => $dongia->g_tien * $request->soluong[$key]
                    ]);
                    $tamtinh = $dongia->g_tien * $request->soluong[$key];
                    $tongtien = $tongtien + $tamtinh;
                }

            }

        }
        //Tìm phân cấp mới nhất đang bật
        $phancap = PhanCapModel::where('status', 1)->first();
        //Tìm hóa đơn xem có chưa
        $hoadon = HoaDonModel::where('status', -1)
            ->where('id_khachhang',Auth::user()->id)
            ->first();
        //Nếu giỏ hàng rỗng thì tạo cái mới
        if(!isset($hoadon))
        $hoadon = HoaDonModel::create(
            [
                'id_nhan_vien_lap_hh' => '2',
                'id_khachhang' => Auth::user()->id,
                'tong_tien_hoa_don' => $tongtien,
                'status' => -1,
                'id_phan_cap' => $phancap->pc_id,
            ]
        );
        foreach ($mangchitiet as $key => $value){
            //Tìm xem có không, có thì sửa lại, không thì thêm
            $chitiet = HoaDonChiTietModel
                ::where('hd_id', $hoadon->hd_id)
                ->where('b_id',$value['b_id'])
                ->where('l_id',$value['l_id'])
                ->first();
            //Nếu không có thì tạo
            if(!isset($chitiet))
            HoaDonChiTietModel::create(
                [
                    'hd_id' => $hoadon->hd_id,
                    'g_id' => $value['g_id'],
                    'so_luong_mua' => $value['so_luong_mua'],
                    'b_id' =>$value['b_id'],
                    'l_id' => $value['l_id'],
                    'g_tien'=> $value['g_tien'],
                    'thanh_tien' => $value['thanh_tien']
                ]
            );
            if(isset($chitiet)){
                $chitiet->so_luong_mua = $value['so_luong_mua'];
                $chitiet->thanh_tien = $value['thanh_tien'];
                $chitiet->save();
            }
        }
        return redirect('/store/home')->with('themhoadonthanhcong','Đặt hàng thành công, đến mục giỏ hàng để xác nhận mua bạn nhé');
    }




}
