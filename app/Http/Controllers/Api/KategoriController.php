<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Validation\ValidationException;

class KategoriController extends Controller
{
    public function index()
    {
        return KategoriModel::all();
    }

    public function store(Request $request)
    {
        // Validasi untuk mengecek apakah kategori_kode sudah ada
        $request->validate([
            'kategori_kode' => 'required',
            // Tambahkan validasi lain jika diperlukan
        ]);

        // Cek apakah kategori_kode sudah ada di database
        $existingKategori = KategoriModel::where('kategori_kode', $request->kategori_kode)->first();
        if ($existingKategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori dengan kode ini sudah ada.',
            ], 400);
        }

        // Jika kategori_kode belum ada, maka simpan data
        $kategori = KategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }

    public function show(KategoriModel $kategori)
    {
        return response()->json($kategori);
    }

    public function update(Request $request, KategoriModel $kategori)   
    {
        $kategori->update($request->all());
        return response()->json($kategori);
    }

    public function destroy(KategoriModel $kategori)
    {
        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
