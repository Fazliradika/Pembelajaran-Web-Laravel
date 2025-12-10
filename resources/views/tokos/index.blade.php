@extends('layouts.app')

@section('title', 'Daftar Toko - Fazli Radika')

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
        padding: 8px 15px;
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
</style>

<div class="card">
    <div class="header-flex">
        <h1>🏪 Daftar Toko</h1>
        <a href="{{ route('tokos.create') }}" class="btn-add">+ Tambah Toko</a>
    </div>

    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    @if($tokos->count() > 0)
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Toko</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tokos as $toko)
                <tr>
                    <td>{{ $toko->id }}</td>
                    <td>{{ $toko->nama_toko }}</td>
                    <td>{{ $toko->alamat }}</td>
                    <td>{{ $toko->telepon }}</td>
                    <td>{{ $toko->email }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('tokos.edit', $toko) }}" class="btn-edit">✏️ Edit</a>
                            <form action="{{ route('tokos.destroy', $toko) }}" method="POST" style="margin: 0; flex: 1;" onsubmit="return confirm('Yakin ingin menghapus {{ $toko->nama_toko }}?')">
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
            <p style="font-size: 48px; margin-bottom: 20px;">🏪</p>
            <p style="font-size: 18px;">Belum ada toko.</p>
            <p>Klik tombol "Tambah Toko" untuk menambahkan toko baru.</p>
        </div>
    @endif
</div>
@endsection
