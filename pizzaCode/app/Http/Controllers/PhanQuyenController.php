<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhanQuyenRequest;
use App\PhanQuyenModel;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pq = PhanQuyenModel::all();
        $count = count($pq);
        for ($i = 0; $i < $count; $i++) {
            $pq[$i]['stt'] = $i + 1;
        }
        return view('pages.phanquyen.index', compact('pq'));
    }

    public function create()
    {
        return view('pages.phanquyen.create');
    }

    public function store(PhanQuyenRequest $req)
    {
        $pq = new PhanQuyenModel();
        $pq->pq_ten = $req->get('pq_ten');
        $pq->save();
        return redirect('phan-quyen/index')->with('messages', 'Thêm thành công !');
    }

    public function edit($id)
    {
        $pq = PhanQuyenModel::where('phanquyen.pq_id', '=', $id)->first();
        return view('pages.phanquyen.edit', compact('pq'));
    }

    public function update(Request $request, $id)
    {
        $pq = PhanQuyenModel::find($id);
        $pq->pq_ten = $request->get('pq_ten');
        $pq->save();
        return redirect('phan-quyen/index');
    }
}
