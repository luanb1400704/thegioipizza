<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * Tao khach hang mau de tinh hoa hong
     * Khong co profile cho nhung khach hang nay
     */
    public function create(Request $request)
    {
        return Users::create([
            'type' => $request->get('type'),
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'active' => $request->get('active'),
        ]);
    }

    public function makeUsersEmpty()
    {   return 1;
//        return User::whereNotNull('id')->delete();
    }
}
