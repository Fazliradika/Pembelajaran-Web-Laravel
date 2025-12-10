<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $tokos = Toko::orderBy('id', 'asc')->get();
        return view('tokos.index', compact('tokos'));
    }

    public function create()
    {
        return view('tokos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'email' => 'required|email|unique:tokos',
        ]);

        Toko::create($request->all());
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil ditambahkan!');
    }

    public function edit(Toko $toko)
    {
        return view('tokos.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'email' => 'required|email|unique:tokos,email,'.$toko->id,
        ]);

        $toko->update($request->all());
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil diupdate!');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil dihapus!');
    }
}
