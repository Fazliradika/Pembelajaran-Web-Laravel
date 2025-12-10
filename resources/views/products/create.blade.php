@extends('layouts.app')

@section('title', 'Tambah Produk - Fazli Radika')

@section('content')
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #0f9b8e;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 15px;
        border: 2px solid #0f3460;
        border-radius: 8px;
        background: #1a1a2e;
        color: white;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #0f9b8e;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #666;
    }

    .btn-submit {
        background: #e94560;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background: #0f9b8e;
        transform: scale(1.05);
    }

    .btn-back {
        background: #0f3460;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
        transition: all 0.3s;
    }

    .btn-back:hover {
        background: #16213e;
    }

    .error-box {
        background: #e94560;
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 20px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }
</style>

<div class="card">
    <h1>➕ Tambah Produk Baru</h1>
    <p style="color: #888; margin-bottom: 30px;">Isi form di bawah ini untuk menambahkan produk baru</p>

    @if($errors->any())
        <div class="error-box">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input 
                type="text" 
                name="nama_produk" 
                id="nama_produk" 
                value="{{ old('nama_produk') }}"
                placeholder="Masukkan nama produk..."
                required
            >
        </div>

        <div class="form-group">
            <label for="harga">Harga Produk (Rp)</label>
            <input 
                type="number" 
                name="harga" 
                id="harga" 
                value="{{ old('harga') }}"
                placeholder="Contoh: 150000"
                min="0"
                step="1"
                required
            >
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Produk</label>
            <textarea 
                name="deskripsi" 
                id="deskripsi" 
                rows="5"
                placeholder="Tuliskan deskripsi produk..."
                required
            >{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">💾 Simpan Produk</button>
            <a href="{{ route('products.index') }}" class="btn-back">← Kembali</a>
        </div>
    </form>
</div>
@endsection