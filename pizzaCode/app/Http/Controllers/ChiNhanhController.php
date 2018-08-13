<?php

namespace App\Http\Controllers;

use App\ChiNhanhModel;
use App\Http\Requests\ChiNhanhRequest;
use App\TienChiNhanhModel;
use App\TienChiNhanhTraChoKhachModel;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChiNhanhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chinhanh = ChiNhanhModel::join('users', 'users.id', '=', 'chinhanh.id_chinhanh')->get();
        $count = count($chinhanh);
        for ($i = 0; $i < $count; $i++) {
            $chinhanh[$i]['stt'] = $i + 1;
        }
        return view('pages.chinhanh.index', compact('chinhanh'));
    }

    public function create()
    {
        return view('pages.chinhanh.create');
    }

    public function store(ChiNhanhRequest $req)
    {
        $id_user = Auth::user()->id;
        $chinhanh = Users::create(
            [
                'type' => 3,
                'name' => $req->get('name'),
                'email' => $req->get('email'),
                'phone' => $req->get('phone'),
                'password' => Hash::make($req->get('phone')),
                'active' => 1,
            ]
        );
        ChiNhanhModel::create(
            [
                'id_chinhanh' => $chinhanh->id,
                'ten_chinhanh' => $req->get('ten_chinhanh'),
                'diachi_chinhanh' => $req->get('diachi_chinhanh'),
                'created_by' => $id_user,
            ]
        );
        TienChiNhanhTraChoKhachModel::create([
            'id_chinhanh' => $chinhanh->id,
            'sotien' => 0
        ]);
        return redirect('chi-nhanh/index')->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $chinhanh = ChiNhanhModel::leftjoin('users', 'users.id', '=', 'chinhanh.id_chinhanh')
            ->where('chinhanh.id_chinhanh', $id)
            ->first();
        return view('pages.chinhanh.edit', compact('chinhanh'));
    }

    public function update(Request $req, $id)
    {
        $chinhanh = ChiNhanhModel::join('users', 'users.id', '=', 'chinhanh.id_chinhanh')
            ->find($id);
        $chinhanh->name = $req->get('name');
        $chinhanh->email = $req->get('email');
        $chinhanh->phone = $req->get('phone');
        $chinhanh->ten_chinhanh = $req->get('ten_chinhanh');
        $chinhanh->diachi_chinhanh = $req->get('diachi_chinhanh');
        $chinhanh->save();
        return redirect('chi-nhanh/index')->with('success', 'Cập nhật thành công');
    }

    // tiền cho chi nhánh

    public function chi_tieu_index()
    {
        $chitieu = TienChiNhanhModel::leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'tienchinhanh.id_chinhanh')
            ->get();
        $count = count($chitieu);
        for ($i = 0; $i < $count; $i++) {
            $chitieu[$i]['stt'] = $i + 1;
        }
        return view('pages.chinhanh.chitieuindex', compact('chitieu'));
    }

    public function chi_tieu_create()
    {
        $chinhanh = ChiNhanhModel::all();
        return view('pages.chinhanh.chitieucreate', compact('chinhanh'));
    }

    public function chi_tieu_store(Request $req)
    {
        $chitieu = new TienChiNhanhModel();
        $chitieu->id_chinhanh = $req->get('id_chinhanh');
        $chitieu->sotien = $req->get('sotien');
//        dd($req->all());
        $chitieu->save();
        return redirect('chi-nhanh/chi-tieu-create');
    }

    public function chi_tieu_edit($id)
    {
        $chinhanh = ChiNhanhModel::all();
        $chitieu = TienChiNhanhModel::find($id);
        return view('pages.chinhanh.chitieuedit', compact('chinhanh', 'chitieu'));
    }

    public function chi_tieu_update(Request $req, $id)
    {
        dd($req->all());
        $chitieu = TienChiNhanhModel::leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'tienchinhanh.id_chinhanh')
            ->where('tienchinhanh.id', '=', $id)->first();
        $chitieu->id_chinhanh = $req->get('id_chinhanh');
        $chitieu->sotien = $req->get('sotien');
//        dd($req->all());
        $chitieu->save();
        return redirect('chi-nhanh/chi-tieu-index');
    }

    public function chi_tieu_destroy()
    {

    }

    public function lichsuthutien()
    {
        $tienthu = TienChiNhanhModel::leftjoin('chinhanh', 'chinhanh.id_chinhanh', '=', 'tienchinhanh.id_chinhanh')
            ->get();
        $count = count($tienthu);
        for ($i = 0; $i < $count; $i++) {
            $tienthu[$i]['stt'] = $i + 1;
        }
        return view('pages.chinhanh.lichsuthutien', compact('tienthu'));
    }
}
