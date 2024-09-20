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

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-2')->update($data); 

        // //coba akses model UserModel
        // $user = UserModel::all(); //ambil semua data dari table m_user
        // return view('user', ['data' => $user]);
        // --------------------------------------------------------------

        // JS04 - Pratikum 1 - $fillable
        // $data = [
        //     'level_id' => '2',
        //     'username' => 'manager_2',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::insert($data);

        // $data = [
        //     'level_id' => '2',
        //     'username' => 'manager_3',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::insert($data);

        // $user = UserModel::all(); //ambil semua data dari table m_user
        // return view('user', ['data' => $user]);
        // -------------------------------------------------------------

        // JS04 - Pratikum 2.1 - Retrieving Single Models
        // $user = UserModel::find(1); // ambil semua data dari table m_user
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(1, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(20, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);
        // --------------------------------------------------------------

        // JS04 - Pratikum 2.2 - Not Found Exceptions
        // coba akses model UserModel
        // $user = UserModel::findOrFail(1); // ambil semua data dari m_user
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('username', 'manager9')->firstOrFail(); 
        // return view('user', ['data' => $user]);
        // ----------------------------------------------------------------

        // JS 04 - Pratikum 2.3 - Retrieving Aggregrates
        // coba akses ke model UserModel
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);
        // return view('user', ['data' => $user]);

        $user = UserModel::where('level_id', 2)->count();
        
        return view('user', ['data' => $user]);
    }
}