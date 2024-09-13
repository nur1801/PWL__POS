<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-2',
        //     'nama' => 'Pelanggan 2',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ];
        // UserModel::insert($data);

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer-2')->update($data); 

        //coba akses model UserModel
        $user = UserModel::all(); //ambil semua data dari table m_user
        return view('user', ['data' => $user]);
    }
}