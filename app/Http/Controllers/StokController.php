<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::with(['product', 'toko'])->orderBy('id', 'asc')->get();
        return view('stoks.index', compact('stoks'));
    }

    public function create()
    {
        $products = Product::all();
        $tokos = Toko::all();
        return view('stoks.create', compact('products', 'tokos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'toko_id' => 'required|exists:tokos,id',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        Stok::create($request->all());
        return redirect()->route('stoks.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function edit(Stok $stok)
    {
        $products = Product::all();
        $tokos = Toko::all();
        return view('stoks.edit', compact('stok', 'products', 'tokos'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'toko_id' => 'required|exists:tokos,id',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        $stok->update($request->all());
        return redirect()->route('stoks.index')->with('success', 'Stok berhasil diupdate!');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stoks.index')->with('success', 'Stok berhasil dihapus!');
    }
}
