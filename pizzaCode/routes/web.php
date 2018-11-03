<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout')->name('admin.logout');

Auth::routes();

Route::get('/admin', function () {
    if (empty(Auth::user())) {
        if (Auth::user()->active == 1)
            return redirect('login');
        else {
            return view('website.chan');
        }
    }
    if (Auth::user()->type == 2) {
        if (Auth::user()->active == 1)
            return redirect(route('store/get_home'));
        else {
            return view('website.chan');
        }
    }
    if (Auth::user()->type == 1 || Auth::user()->type == 3) {
        if (Auth::user()->active == 1)
            return redirect(route('kh.index'));
        else {
            return view('website.chan');
        }

    }
    return view('pages.home');
})->name('khachhang.danhsach');

Route::get('/', function () {
    if (empty(Auth::user())) {
        return redirect('login');
    }
    if (Auth::user()->type != 2)
        return view('pages.home');
    if (Auth::user()->type == 2)
        return view('pages.home');
});

Route::group(['prefix' => 'hoa-don'], function () {
    Route::get('get-badge', 'HoaDonController@getBadge')->name('hoadon.get-badge');
    Route::get('create', 'HoaDonController@create')->name('hoadon.create');
    Route::post('create', 'HoaDonController@store')->name('hoadon.store');
    Route::get('{id}/done', 'HoaDonController@commission')->name('hoadon.done');
    Route::post('customer', 'HoaDonController@createCustomer')->name('hoadon.customer');
    Route::get('indexdaduyet', 'HoaDonController@indexdaduyet')->name('hoadon.indexdaduyet');
    Route::get('indexchuaduyet', 'HoaDonController@indexchuaduyet')->name('hoadon.indexchuaduyet');
    Route::get('indexdaduyetdetail', 'HoaDonController@indexdaduyetdetail')->name('hoadon.indexdaduyetdetail');
    Route::post('edit', 'HoaDonController@edit')->name('hoadon.edit');
    Route::post('update', 'HoaDonController@update')->name('hoadon.update');
    Route::post('type', 'HoaDonController@type')->name('hoadon.type');
    Route::get('add', 'HoaDonController@modal')->name('hoadon.modal');
    Route::post('add', 'HoaDonController@add')->name('hoadon.add');
    Route::post('remove', 'HoaDonController@remove')->name('hoadon.remove');
});

Route::group(['prefix' => '/store'], function () {
    Route::get('/', 'FontEndController@get_home')->name('store/get_home');
    Route::get('/contact', 'FontEndController@get_contact')->name('store/get_contact');
    Route::get('/order', 'FontEndController@order')->name('store/order');
    Route::post('/order_success', 'FontEndController@order_success')->name('store/order_success');
    Route::get('/order/remove/{id}', 'FontEndController@order_remove')->name('store/order_remove');
    Route::get('/register', 'FontEndController@register')->name('store/register');
    Route::post('/customer_register', 'CustomerController@register')->name('customer/register');
    Route::get('/fast_register', 'FontEndController@fast_register')->name('store/fast_register');
    Route::post('/customer_fast_register', 'CustomerController@fast_register')->name('customer/fast_register');
    Route::get('/update', 'FontEndController@update')->name('store/update');
    Route::post('/customer_update', 'CustomerController@update')->name('customer/update');
    Route::get('/login', 'FontEndController@login')->name('store/login');
    Route::post('/order_pizza', 'FontEndController@order_pizza')->name('store/order_pizza');
    Route::get('/change_pass', 'FontEndController@change_pass')->name('store/change_pass');
    Route::post('/repass', 'FontEndController@repass')->name('store/repass');
});

Route::group(['prefix' => 'loai-banh'], function () {
    Route::get('index', 'BanhController@l_index')->name('l.index');
    Route::get('create', 'BanhController@l_create')->name('l.create');
    Route::post('store', 'BanhController@l_store')->name('l.store');
    Route::get('destroy/{id}', 'BanhController@l_destroy')->name('l.destroy');
    Route::get('edit/{id}', 'BanhController@l_edit')->name('l.edit');
    Route::post('update/{id}', 'BanhController@l_update')->name('l.update');
});

Route::group(['prefix' => 'banh'], function () {
    Route::get('index', 'BanhController@index')->name('banh.index');
    Route::get('create', 'BanhController@create')->name('banh.create');
    Route::post('store', 'BanhController@store')->name('banh.store');
    Route::get('destroy/{id}', 'BanhController@destroy')->name('banh.destroy');
    Route::get('edit/{id}', 'BanhController@edit')->name('banh.edit');
    Route::post('update/{id}', 'BanhController@update')->name('banh.update');
});

Route::group(['prefix' => 'gia-banh'], function () {
    Route::get('index', 'BanhController@g_index')->name('g.index');
    Route::get('create', 'BanhController@g_create')->name('g.create');
    Route::post('store', 'BanhController@g_store')->name('g.store');
    Route::get('destroy/{id}', 'BanhController@g_destroy')->name('g.destroy');
    Route::get('edit/{id}', 'BanhController@g_edit')->name('g.edit');
    Route::post('update/{id}', 'BanhController@g_update')->name('g.update');
});

Route::group(['prefix' => 'phan-cap'], function () {
    Route::get('index', 'PhanCapController@index')->name('pc.index');
    Route::get('create', 'PhanCapController@create')->name('pc.create');
    Route::post('store', 'PhanCapController@store')->name('pc.store');
    Route::get('destroy/{id}', 'PhanCapController@destroy')->name('pc.destroy');
    Route::get('edit/{id}', 'PhanCapController@edit')->name('pc.edit');
    Route::get('status/{id}', 'PhanCapController@status')->name('pc.status');
    Route::post('update/{id}', 'PhanCapController@update')->name('pc.update');
});

Route::group(['prefix' => 'khach-hang'], function () {
    Route::get('index', 'CustomerController@index')->name('kh.index');
    Route::get('create', 'CustomerController@create')->name('kh.create');
    Route::post('store', 'CustomerController@store')->name('kh.store');
    Route::get('destroy/{id}', 'CustomerController@destroy')->name('kh.destroy');
    Route::get('edit/{id}', 'CustomerController@edit')->name('kh.edit');
    Route::post('update/{id}', 'CustomerController@update')->name('kh.update');
    Route::get('detail', 'CustomerController@detail')->name('kh.detail');
    Route::post('changePass', 'CustomerController@changePass')->name('kh.changePass');
});

Route::group(['prefix' => 'nhan-vien-chi-nhanh'], function () {
    Route::get('index', 'UsersController@index')->name('nv.index');
    Route::get('create', 'UsersController@create')->name('nv.create');
    Route::post('store', 'UsersController@store')->name('nv.store');
    Route::get('edit/{id}', 'UsersController@edit')->name('nv.edit');
    Route::post('update/{id}', 'UsersController@update')->name('nv.update');
});

Route::group(['prefix' => 'chi-nhanh'], function () {
    Route::get('index', 'ChiNhanhController@index')->name('cn.index');
    Route::get('lichsuthutien', 'ChiNhanhController@lichsuthutien')->name('cn.lichsuthutien');
    Route::get('create', 'ChiNhanhController@create')->name('cn.create');
    Route::post('store', 'ChiNhanhController@store')->name('cn.store');
    Route::get('destroy/{id}', 'ChiNhanhController@destroy')->name('cn.destroy');
    Route::get('edit/{id}', 'ChiNhanhController@edit')->name('cn.edit');
    Route::post('update/{id}', 'ChiNhanhController@update')->name('cn.update');
//    Route::get('chi-tieu-index', 'ChiNhanhController@chi_tieu_index')->name('ct.index');
//    Route::get('chi-tieu-create', 'ChiNhanhController@chi_tieu_create')->name('ct.create');
//    Route::post('chi-tieu-store', 'ChiNhanhController@chi_tieu_store')->name('ct.store');
//    Route::get('chi-tieu-destroy/{id}', 'ChiNhanhController@chi_tieu_destroy')->name('ct.destroy');
//    Route::get('chi-tieu-edit/{id}', 'ChiNhanhController@chi_tieu_edit')->name('ct.edit');
//    Route::post('chi-tieu-update/{id}', 'ChiNhanhController@chi_tieu_update')->name('ct.update');
});

Route::group(['prefix' => 'tien-chi-ho-hoa-hong'], function () {
    Route::get('/index', 'TienChiHoController@index')->name('index');
//    Route::get('/tien-banh', 'TienChiHoController@tien_chi_nhanh')->name('tien_chi_nhanh');
    Route::get('/lich-su', 'TienChiHoController@log_tra_tien')->name('log_tra_tien');
    Route::get('tru_tien/{id}', 'TienChiHoController@tru_tien')->name('tru_tien');
    Route::get('/tong_tien_chi_nhanh', 'TienChiHoController@tongtienchinhanh')->name('tien-chi-ho-hoa-hong/tong_tien_chi_nhanh');
    Route::get('/thanh_toan/{id}', 'TienChiHoController@thanhtoan')->name('tien-chi-ho-hoa-hong/thanh_toan');
    Route::get('/lich_su_thanh_toan', 'TienChiHoController@lichsuthanhtoan')->name('tien-chi-ho-hoa-hong/lich_su_thanh_toan');
});


