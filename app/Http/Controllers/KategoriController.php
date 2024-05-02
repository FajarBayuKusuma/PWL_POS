<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
    public function create()
    {
        return view('kategori.create');
    }
   
    public function store(Request $request): RedirectResponse
    {
        // Retrive the validated input data...
        $validatedData = $request->validate([
            'kategori_kode' => 'required',
            'kategori_nama' => 'required',
        ]);

        // Retrive a portion of the validated input data
        // $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        // $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        // B. Validasi pada server
        $validatedData = $request->validate([

            'kategori_kode' => ['required', 'unique:m_kategori', 'max:10'],
            'kategori_nama' => ['required'],
            'kategori_kode' => 'bail|required|unique:m_kategori|max:10',
            'kategori_nama' => 'bail|required|unique:m_kategori',
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }
    public function edit_save(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }
    public function deleteKtg($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();
        return redirect('/kategori');
    }
}