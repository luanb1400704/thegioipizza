<?php

namespace App\Http\Controllers;

use App\BanhModel;
use App\GiaModel;
use App\Http\Requests\QuanLyBanhRequest;
use App\Http\Requests\QuanLyGiaBanhRequest;
use App\Http\Requests\QuanLyLoaiBanhRequest;
use App\LoaiBanhModel;
use Illuminate\Http\Request;

class BanhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banh = BanhModel::all();
        $count = count($banh);
        for ($i = 0; $i < $count; $i++) {
            $banh[$i]['stt'] = $i + 1;
        }
        return view('pages.banh.index', compact('banh'));
    }

    public function create()
    {
        return view('pages.banh.create');
    }

    public function store(QuanLyBanhRequest $req)
    {
        $banh = new BanhModel();
        $banh->b_ten = $req->get('b_ten');
        $banh->b_mota = $req->get('b_mota');
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $new_file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $new_file_name);
            $banh->b_anh = url('upload') . '/' . $new_file_name;
        } else {
            $banh->b_anh = "";
        }
        $banh->save();
        return redirect('/banh/index')->with('success', 'Thêm thành công !');
    }

    public function edit($id)
    {
        $banh = BanhModel::where('banh.b_id', '=', $id)->first();
        return view('pages.banh.edit', compact('banh'));
    }

    public function update(QuanLyBanhRequest $req, $id)
    {
        $banh = BanhModel::find($id);
        $banh->b_ten = $req->get('b_ten');
        $banh->b_mota = $req->get('b_mota');
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $new_file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $new_file_name);
            $banh->b_anh = url('upload') . '/' . $new_file_name;
        }
        $banh->save();
        return redirect('/banh/index')->with('success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        BanhModel::find($id)->delete();
        GiaModel::where('b_id', $id)->delete();
        return redirect('/banh/index')->with('success', 'Xóa thành công !');
    }

    // Loại Bánh

    public function l_index()
    {
        $l = LoaiBanhModel::all();
        $count = count($l);
        for ($i = 0; $i < $count; $i++) {
            $l[$i]['stt'] = $i + 1;
        }
        return view('pages.banh.lindex', compact('l'));
    }

    public function l_create()
    {
        return view('pages.banh.lcreate');
    }

    public function l_store(QuanLyLoaiBanhRequest $req)
    {
        $l = new LoaiBanhModel();
        $l->l_ten = $req->get('l_ten');
        $l->l_kichthuoc = $req->get('l_kichthuoc');
        $l->save();
        return redirect('/loai-banh/index')->with('success', 'Thêm thành công !');
    }

    public function l_edit($id)
    {
        $l = LoaiBanhModel::where('loaibanh.l_id', '=', $id)->first();
        return view('pages.banh.ledit', compact('l'));
    }

    public function l_update(Request $req, $id)
    {
        $l = LoaiBanhModel::find($id);
        $l->l_ten = $req->get('l_ten');
        $l->l_kichthuoc = $req->get('l_kichthuoc');
        $l->save();
        return redirect('/loai-banh/index')->with('success', 'Cập nhật thành công !');
    }

    public function l_destroy($id)
    {
        LoaiBanhModel::find($id)->delete();
        GiaModel::where('l_id', $id)->delete();
        return redirect('/loai-banh/index')->with('success', 'Xóa thành công !');
    }

    // giá Bánh

    public function g_index()
    {
        $g = GiaModel::leftjoin('banh', 'banh.b_id', '=', 'gia.b_id')
            ->leftjoin('loaibanh', 'loaibanh.l_id', '=', 'gia.l_id')
            ->get();
        $count = count($g);
        for ($i = 0; $i < $count; $i++) {
            $g[$i]['stt'] = $i + 1;
        }
        return view('pages.banh.gindex', compact('g'));
    }

    public function g_create()
    {
        $banh = BanhModel::all();
        $loaibanh = LoaiBanhModel::all();
        return view('pages.banh.gcreate', compact('banh', 'loaibanh'));
    }

    public function g_store(QuanLyGiaBanhRequest $req)
    {
        $g = new GiaModel();
        $g->b_id = $req->get('b_ten');
        $g->l_id = $req->get('l_ten');
        $g->g_tien = $req->get('g_tien');
        $g->save();
        return redirect('/gia-banh/index')->with('success', 'Thêm thành công !');
    }


    public function g_edit($id)
    {
        $banh = BanhModel::all();
        $loaibanh = LoaiBanhModel::all();
        $g = GiaModel::where('g_id', '=', $id)->first();
        return view('pages.banh.gedit', compact('g', 'banh', 'loaibanh'));
    }

    public function g_update(Request $req, $id)
    {
        $g = GiaModel::find($id);
        $g->b_id = $req->get('b_ten');
        $g->l_id = $req->get('l_ten');
        $g->g_tien = $req->get('g_tien');
        $g->save();
        return redirect('/gia-banh/index')->with('success', 'Cập nhật thành công !');
    }

    public function g_destroy($id)
    {
        GiaModel::find($id)->delete();
        return redirect('/gia-banh/index')->with('success', 'Xóa thành công !');
    }

}
