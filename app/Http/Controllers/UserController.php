<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use app\DataTables\UserDataTable;

class UserController extends Controller
{

    public function index(){

                // $user = UserModel::all();
    $user = UserModel::with('level')->get();
    return view('user', ['data' => $user]);
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
    // //langkah 1
    // $data = [
    //         'level_id' => 2,
    //         'username' => 'manager_dua',
    //         'nama' => 'Manager 2',
    //         'password' => Hash::make('12345')
    //     ];
    //     UserModel::create($data);

    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    //langkah 1.2
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
    //    $user = UserModel::findOr(1,['username', 'nama'], function (){
    //             abort(404);
    //    });
    //    return view('user',['data'=>$user]);
    //    $user = UserModel::findOr(20,['username', 'nama'], function (){
    //             abort(404);
    //    });
    //    return view('user',['data'=>$user]);

    //    Praktikum 2.2
    //    $user = UserModel::findorFail(1);
        //   $user = UserModel::Where('username', 'manager9')->firstOrFail();
        //   return view('user',['data'=>$user]);
    
    //Praktikum 2.3
    // $user = UserModel::Where('level_id', 2)->count();
    // //dd($user);
    // return view('user',['data'=>$user]);

    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager',
    //         'nama' => 'Manager',
    //     ],
    // );
    // return view('user',['data'=>$user]);
    // $user = UserModel::firstOrCreate(
    //     [
    //         'username' => 'manager33',
    //         'nama' => 'Manager Tiga Tiga',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ],
    // );
    // $user->save();
    // return view('user',['data'=>$user]);


    //Praktikum 2.5]
    //   $user = UserModel::create([
    //         'username' => 'manager55',
    //         'nama' => 'Manager55',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2
    //     ]);

    //     $user->username = 'manager56';

    //     $user->isDirty(); //true
    //     $user->isDirty('username'); //true
    //     $user->isDirty('nama');//false
    //     $user->isDirty(['nama', 'username']); //true

    //     $user->isClean(); //false
    //     $user->isClean('username'); //false
    //     $user->isClean('nama'); //true
    //     $user->isClean(['nama','username']); //false

    //     $user->save();

    //     $user->isDirty(); //false
    //     $user->isClean(); //true
    //     dd($user->isDirty());
    
    // $user = UserModel::all();
    // return view('user', ['data' => $user]);
    
    // $user = UserModel::with('level')->get();
    // dd($user);

    // $user = UserModel::with('level')->get();
 }
    public function tambah(){
        //
        return view('user_tambah');

    }
    public function tambah_simpan(request $request){
            UserModel::create([
            'username' =>$request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah', ['data' =>$user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

}
