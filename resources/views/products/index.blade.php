@extends('layouts.app')

@section('title', 'Daftar Produk - Fazli Radika')

@section('content')
<style>
    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .product-table th {
        background: #0f3460;
        color: #0f9b8e;
        padding: 15px;
        text-align: left;
        border-bottom: 2px solid #e94560;
    }

    .product-table td {
        padding: 15px;
        border-bottom: 1px solid #0f3460;
        color: #eee;
    }

    .product-table tr:hover {
        background: rgba(15, 52, 96, 0.5);
    }

    .btn-add {
        display: inline-block;
        background: #0f9b8e;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn-add:hover {
        background: #0d8577;
        transform: scale(1.05);
    }

    .btn-edit {
        background: #ffd700;
        color: #1a1a2e;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        transition: all 0.3s;
        text-align: center;
        flex: 1;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .btn-edit:hover {
        background: #e6c200;
    }

    .btn-delete {
        background: #e94560;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
        flex: 1;
    }

    .btn-delete:hover {
        background: #d13a54;
    }

    .header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .success-msg {
        background: #0f9b8e;
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .empty-state {
        text-align: center;
        padding: 50px;
        color: #888;
    }

    .empty-state p {
        font-size: 18px;
    }

    .price-tag {
        color: #e94560;
        font-weight: bold;
        font-size: 16px;
    }
</style>

<div class="card">
    <div class="header-flex">
        <h1>📦 Daftar Produk</h1>
        <a href="{{ route('products.create') }}" class="btn-add">+ Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    @if($products->count() > 0)
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nama_produk }}</td>
                    <td class="price-tag">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>{{ $product->deskripsi }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('products.edit', $product) }}" class="btn-edit">✏️ Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="margin: 0; flex: 1;" onsubmit="return confirm('Yakin ingin menghapus {{ $product->nama_produk }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <p style="font-size: 48px; margin-bottom: 20px;">📦</p>
            <p>Belum ada produk.</p>
            <p style="color: #666;">Klik tombol "Tambah Produk" untuk menambahkan produk baru.</p>
        </div>
    @endif
</div>
@endsection