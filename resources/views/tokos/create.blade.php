@extends('layouts.app')

@section('title', 'Tambah Toko - Fazli Radika')

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
    <h1>➕ Tambah Toko Baru</h1>
    <p style="color: #888; margin-bottom: 30px;">Isi form di bawah ini untuk menambahkan toko baru</p>

    @if($errors->any())
        <div class="error-box">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tokos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nama_toko">Nama Toko</label>
            <input 
                type="text" 
                name="nama_toko" 
                id="nama_toko" 
                value="{{ old('nama_toko') }}"
                placeholder="Masukkan nama toko..."
                required
            >
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea 
                name="alamat" 
                id="alamat" 
                rows="3"
                placeholder="Masukkan alamat toko..."
                required
            >{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input 
                type="text" 
                name="telepon" 
                id="telepon" 
                value="{{ old('telepon') }}"
                placeholder="Contoh: 081234567890"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old('email') }}"
                placeholder="Contoh: toko@example.com"
                required
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">💾 Simpan Toko</button>
            <a href="{{ route('tokos.index') }}" class="btn-back">← Kembali</a>
        </div>
    </form>
</div>
@endsection
