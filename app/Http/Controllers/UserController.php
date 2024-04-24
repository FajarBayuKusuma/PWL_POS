<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){

    //tambah data user dengan eloquent model
    // $data = [
    //         'username'=>'Customer-1',
    //         'nama'=>'Pelanggan',
    //         'password'=>hash::make('12345'),
    //         'level_id'=>4
    // ];
    // UserModel::insert($data);//Untuk menambahkan data kedalam tabel m_user
       
    //   $data = [
    //         'nama' => 'Pelanggan Pertama',
    //     ];
    //     UserModel::where('username', 'customer-1')->update($data); // udate data user
        
    //         //coba untuk akses moder userModel
    // $user = UserModel::all(); //Mengambil semua data dari tabel m_user
    // return view('user',['data'=>$user]);

    //Jobsheet 4
    //Praktikum 1
    //langkah 1
    // $data = [
    //         'level_id' => 2,
    //         'username' => 'manager_dua',
    //         'nama' => 'Manager 2',
    //         'password' => Hash::make('12345')
    //     ];
    //     UserModel::create($data);

    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    //langkah 1
    // $data = [
    //         'level_id' => 2,
    //         'username' => 'manager_tiga',
    //         'nama' => 'Manager 3',
    //         'password' => Hash::make('12345')
    //     ];
    //     UserModel::create($data);

    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    // Praktikum 2
    // Praktikum 2.1
    //    $user = UserModel::find(1);
    //    $user = UserModel::firstWhere('level_id', 1);
    //    $user = UserModel::findOr(20,['username', 'nama'], function (){
    //             abort(404);
    //    });
    //    return view('user',['data'=>$user]);

    //    Praktikum 2.2
    //    $user = UserModel::findorFail(1);
        //   $user = UserModel::Where('username', 'manager9')->firstOrFail();
        //   return view('user',['data'=>$user]);
    
    //Praktikum 2.3
    $user = UserModel::Where('level_id', 2)->count();
    //dd($user);
    return view('user',['data'=>$user]);


    }

}
