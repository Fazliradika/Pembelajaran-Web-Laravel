@extends('layouts.app')

@section('title', 'Tambah Stok - Fazli Radika')

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
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #0f3460;
        border-radius: 8px;
        background: #16213e;
        color: white;
        font-size: 16px;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #0f9b8e;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn-submit {
        background: #0f9b8e;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
        margin-right: 10px;
    }

    .btn-submit:hover {
        background: #0d8577;
        transform: scale(1.05);
    }

    .btn-back {
        background: #e94560;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-back:hover {
        background: #d13a54;
        transform: scale(1.05);
    }

    .error-box {
        background: #e94560;
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .error-box ul {
        margin: 10px 0 0 20px;
    }

    .help-text {
        color: #888;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<div class="card">
    <h1>📦 Tambah Stok Baru</h1>

    @if($errors->any())
        <div class="error-box">
            <strong>❌ Terjadi kesalahan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stoks.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="product_id">Produk</label>
            <select name="product_id" id="product_id" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->nama_produk }}
                    </option>
                @endforeach
            </select>
            <div class="help-text">Pilih produk yang akan ditambahkan stoknya</div>
        </div>

        <div class="form-group">
            <label for="toko_id">Toko</label>
            <select name="toko_id" id="toko_id" required>
                <option value="">-- Pilih Toko --</option>
                @foreach($tokos as $toko)
                    <option value="{{ $toko->id }}" {{ old('toko_id') == $toko->id ? 'selected' : '' }}>
                        {{ $toko->nama_toko }}
                    </option>
                @endforeach
            </select>
            <div class="help-text">Pilih toko tempat penyimpanan stok</div>
        </div>

        <div class="form-group">
            <label for="jumlah_stok">Jumlah Stok</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" 
                   value="{{ old('jumlah_stok') }}" 
                   min="0" 
                   step="1" 
                   required>
            <div class="help-text">Masukkan jumlah stok (dalam unit)</div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-submit">💾 Simpan Stok</button>
            <a href="{{ route('stoks.index') }}" class="btn-back">🔙 Kembali</a>
        </div>
    </form>
</div>
@endsection
