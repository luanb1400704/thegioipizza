<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhanCapRequest;
use App\PhanCapModel;

class PhanCapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pc = PhanCapModel::all();
        $count = count($pc);
        for ($i = 0; $i < $count; $i++) {
            $pc[$i]['stt'] = $i + 1;
        }
        return view('pages.phancap.index', compact('pc'));
    }

    public function create()
    {
        return view('pages.phancap.create');
    }

    public function store(PhanCapRequest $req)
    {
        $pc = new PhanCapModel();
        $pc->pc_ten = $req->get('pc_ten');
        $pc->pc_socap = $req->get('pc_socap');
        $pc->pc_tile = $req->get('pc_tile');
        $pc->status = 0;
        $pc->save();
        return redirect('phan-cap/index')->with('success', 'Thêm thành công !');
    }

    public function edit($id)
    {
        $pc = PhanCapModel::where('pc_id', $id)->first();
        return view('pages.phancap.edit', compact('pc'));
    }

    public function update(PhanCapRequest $req, $id)
    {
        $pc = PhanCapModel::find($id);
        $pc->pc_ten = $req->get('pc_ten');
        $pc->pc_socap = $req->get('pc_socap');
        $pc->pc_tile = $req->get('pc_tile');
        $pc->save();
        return redirect('/phan-cap/index')->with('success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        PhanCapModel::find($id)->delete();
        return redirect('/phan-cap/index')->with('success', 'Xóa thành công !');
    }

    public function status($id)
    {
        $item = PhanCapModel::find($id);
        if ($item->status == 0) {
            $item->status = 1;
        }
        $item->save();
        PhanCapModel::where('pc_id', '<>', $id)->update(['status' => 0]);
        return redirect('phan-cap/index');
    }
}
