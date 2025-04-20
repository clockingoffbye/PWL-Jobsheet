<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'kategori_id'  => 'required|integer|exists:m_kategori,kategori_id',
                'barang_kode'  => 'required|string|max:10|unique:m_barang,barang_kode',
                'barang_nama'  => 'required|string|max:255',
                'harga_beli'   => 'required|numeric|min:0',
                'harga_jual'   => 'required|numeric|min:0',
                'image'        => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);

            // Proses upload file
            if ($request->hasFile('image')) {
                $file     = $request->file('image');
                $filename = time() . '_' . $file->hashName();
                $file->move(public_path('uploads/barang'), $filename);
                $validated['image'] = 'uploads/barang/' . $filename;
            }

            // Simpan ke database
            $barang = BarangModel::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data barang berhasil ditambahkan',
                'data'    => $barang
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap error validasi
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // Tangkap error umum (SQL error, file permission, dll)
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
                'error_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(BarangModel $barang)
    {
        return $barang;
    }

    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        return $barang;
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil dihapus',
        ]);
    }
}
