<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index(){
        //Kitta ambil data user lalu simpan pada variabel $user
        $user = Auth::user();
        
        //Kondisi Jika usernya ada
        if($user){

            //Jika usernya memiliki level admin
            if($user -> level_id == '1'){
                return redirect()->intended('admin');
            }
            //jika usernya memiliki level manager
            else if($user->level_id == '2'){
                return redirect()->intended('manager');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request){
        //kita buat validasi pada tombol login di klik
        // Validasinya username & password wajib di isi
        // dd($user);
        $request->validate([
            'username'=> 'required',
            'password' => 'required'
        ]);
        //Ambil data request username dan password saja
        $credential = $request-> only('username','password');
        //Cek lagi jika data username dan password valid/sesuai dengan data
        if (Auth::attempt($credential)){
            //kalau berhasil simpan data user ya di variabel $user
            $user = Auth::user();

            //cek lagi jika level user admin maka arahkan ke halaman admin
            if($user->level_id=='1'){
                //dd($user->level_id);
                return redirect()->intended('admin');
            }
            //cek lagi jika level user admin maka arahkan ke halaman user
            if($user->level_id=='2'){
                //dd($user->level_id);
                return redirect()->intended('manager');
            }
            //jika belum ada role maka ke halaman
            return redirect()->intended('/');
        }
        //Jika ga ada data user yang valid maka kembalikan lagi ke halaman log in
        //Pastikan kirim pesan eror juga kalau login gagal ya
        return redirect('login')
        ->withInput()
        ->withErrors(['login_gagal'=>'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }
    Public function register(){
        //tampilkan view register
        return view('register');
    }
    //aksi form register
    Public function proses_register(Request $request){
        //kita buat validasi nih buat proses register
        //validasi yaitu semua field wajib di isi
        //validasi username itu harus uniqe atauu tidak boleh username
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'username'=>'required|unique:m_user',
            'password'=>'required',
        ]);
        //kalau gagal kembali ke halaman register dengan munculkan pesan error
        if($validator->fails()){
            return redirect('/register')
            ->withErrors($validator)
            ->withInput();
        }
        //kalau berhasil isi level & hash passwordnya ya biar secure
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);

        //masukkan semua data pada request ke table user
        UserModel::create($request->all());

        //kalo berhasil arahkan ke halaman login
        return redirect()->route('login');

    }
    public function logout(Request $request){
        //logout itu harus menghapus sessionya
        $request->session()->flush();

        //jalankan juga fungsi logout pada auth
        Auth::logout();
        //Kembali kan ke halaman login
        return Redirect('login');
    }


}
