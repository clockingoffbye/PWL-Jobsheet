<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar supplier dalam sistem'
        ];

        $activeMenu = 'supplier';

        $suppliers = SupplierModel::all();

        return view('supplier.index', compact('breadcrumb', 'page', 'suppliers', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $suppliers = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_nama', 'kontak', 'alamat', 'email');

        // Filter
        if ($request->supplier_id) {
            $suppliers->where('supplier_id', $request->supplier_id);
        }

        return DataTables::of($suppliers)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                // Menambahkan kolom aksi
                $btn  = '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah Supplier']
        ];

        $page = (object) [
            'title' => 'Tambah supplier baru'
        ];

        $activeMenu = 'supplier';

        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode'  => 'required|string|max:10|unique:m_supplier,supplier_kode',
            'supplier_nama'  => 'required|string|max:100',
            'alamat'         => 'required|string|max:255',
            'kontak'         => 'required|string|max:20|unique:m_supplier,kontak',
            'email'          => 'required|email|max:100|unique:m_supplier,email',
        ]);

        SupplierModel::create($request->only(['supplier_kode', 'supplier_nama', 'alamat', 'kontak', 'email']));

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    public function show($id)
    {
        $supplier = SupplierModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    public function edit($id)
    {
        $supplier = SupplierModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.edit', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_kode'  => 'required|string|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
            'supplier_nama'  => 'required|string|max:100',
            'alamat'         => 'required|string|max:255',
            'kontak'         => 'required|string|max:20|unique:m_supplier,kontak,' . $id . ',supplier_id',
            'email'          => 'required|email|max:100|unique:m_supplier,email,' . $id . ',supplier_id',
        ]);

        SupplierModel::findOrFail($id)->update($request->only(['supplier_kode', 'supplier_nama', 'alamat', 'kontak', 'email']));

        return redirect('/supplier')->with('success', 'Data supplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        $supplier = SupplierModel::find($id);
        if (!$supplier) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        try {
            $supplier->delete();
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena masih terkait dengan data lain');
        }
    }

    public function create_ajax()
    {
        $suppliers = SupplierModel::select('supplier_id', 'supplier_nama')->get();

        return view('supplier.create_ajax', compact('suppliers'));
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode',
                'supplier_nama' => 'required|string|max:100',
                'kontak'        => 'nullable|string|max:15',
                'alamat'        => 'nullable|string|max:255',
                'email'         => 'nullable|email|max:100|unique:m_supplier,email'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            SupplierModel::create($request->all());

            return response()->json([
                'status'  => true,
                'message' => 'Data supplier berhasil disimpan'
            ]);
        }

        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);

        if (!$supplier) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }

        return view('supplier.edit_ajax', compact('supplier'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
                'supplier_nama' => 'required|string|max:100',
                'kontak'        => 'nullable|string|max:15',
                'alamat'        => 'nullable|string|max:255',
                'email'         => 'nullable|email|max:100|unique:m_supplier,email,' . $id . ',supplier_id'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $supplier = SupplierModel::find($id);

            if (!$supplier) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }

            $supplier->update($request->all());

            return response()->json([
                'status'  => true,
                'message' => 'Data supplier berhasil diupdate'
            ]);
        }

        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);

        if (!$supplier) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }

        return view('supplier.confirm_ajax', compact('supplier'));
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $supplier = SupplierModel::find($id);
            if ($supplier) {
                $supplier->delete();
                return response()->json([
                    'status'  => true,
                    'message' => 'Data supplier berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
    }

    public function show_ajax($id)
    {
        $supplier = SupplierModel::find($id);

        if (!$supplier) {
            return response()->json([
                'status'  => false,
                'message' => 'Supplier tidak ditemukan'
            ], 404);
        }

        return view('supplier.show_ajax', compact('supplier'));
    }
}
