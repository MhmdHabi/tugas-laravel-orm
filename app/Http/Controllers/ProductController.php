<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function getForm()
    {
        return view('product_form');
    }

    public function listProduct()
    {
        $Product = Product::all();

        return view('admin', compact('Product'));
    }
    public function listCatalog()
    {
        $Product = Product::all([

            'gambar',
            'nama',
            'berat',
            'harga',
            'stok',
            'kondisi',
            'deskripsi'
        ]);
        return view('product_catalog', compact('Product'));
    }

    public function getProduct($user_id)
    {
        $user = User::find($user_id);
        $Product = $user->products;
        return view('product_get', compact('Product'));
    }


    public function create(Request $req)
    {
        if (!$req->filled('gambar')) {
            return redirect()->back()->with('error', 'Error. Field Gambar Wajib diisi.');
        } else if (!$req->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama Wajib diisi.');
        } else if (!$req->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$req->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$req->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($req->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$req->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }

        Product::create([

            'gambar' => $req->gambar,
            'nama' => $req->nama,
            'berat' => $req->berat,
            'harga' => $req->harga,
            'stok' => $req->stok,
            'kondisi' => $req->kondisi,
            'deskripsi' => $req->deskripsi,
        ]);

        return redirect('admin/list-products');
    }


    public function update($id)
    {
        $Product = Product::find($id);

        return view('update_product', compact('Product'));
    }

    public function updatePost(Request $request, $id)
    {

        $Product = Product::findOrFail($id);

        $Product->gambar = $request->gambar;
        $Product->nama = $request->nama;
        $Product->berat = $request->berat;
        $Product->harga = $request->harga;
        $Product->stok = $request->stok;
        $Product->kondisi = $request->kondisi;
        $Product->deskripsi = $request->deskripsi;

        $Product->save();

        return redirect('/admin/list-products')
            ->with('success', 'Product berhasil diperbarui');
    }

    public function delete($id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return redirect('admin/list-products');
    }
}
