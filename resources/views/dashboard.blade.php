@extends('layouts.app')

@section('title', 'Dashboard - Fazli Radika')

@section('content')
<style>
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .dashboard-card {
        background: linear-gradient(135deg, #16213e 0%, #0f3460 100%);
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        border: 2px solid #0f9b8e;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transition: all 0.3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(15, 155, 142, 0.3);
        border-color: #ffd700;
    }

    .dashboard-card h2 {
        color: #0f9b8e;
        font-size: 32px;
        margin: 5px 0;
    }

    .dashboard-card p {
        color: #ccc;
        font-size: 14px;
        margin: 5px 0;
    }

    .dashboard-card .icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .welcome-section {
        background: linear-gradient(135deg, #e94560 0%, #d13a54 100%);
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 20px;
        color: white;
        box-shadow: 0 5px 15px rgba(233, 69, 96, 0.3);
    }

    .welcome-section h1 {
        color: white;
        font-size: 24px;
        margin-bottom: 5px;
    }

    .welcome-section p {
        color: rgba(255,255,255,0.9);
        font-size: 16px;
    }

    .quick-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .action-btn {
        background: #0f9b8e;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s;
        display: inline-block;
    }

    .action-btn:hover {
        background: #0d8577;
        transform: scale(1.05);
    }

    .action-btn.secondary {
        background: #ffd700;
        color: #1a1a2e;
    }

    .action-btn.secondary:hover {
        background: #e6c200;
    }

    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s;
    }

    .modal-content {
        background: #1a1a2e;
        width: 90%;
        max-width: 800px;
        max-height: 80vh;
        border-radius: 15px;
        padding: 20px;
        border: 2px solid #0f9b8e;
        overflow-y: auto;
        position: relative;
        animation: slideUp 0.3s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: #16213e;
        border-radius: 10px;
        overflow: hidden;
    }

    .detail-table th {
        background: #0f3460;
        color: #0f9b8e;
        padding: 12px;
        text-align: left;
        position: sticky;
        top: 0;
    }

    .detail-table td {
        padding: 12px;
        border-bottom: 1px solid #0f3460;
        color: #eee;
    }

    .detail-table tr:last-child td {
        border-bottom: none;
    }

    .close-btn {
        background: #e94560;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        cursor: pointer;
        float: right;
        font-weight: bold;
    }

    .close-btn:hover {
        background: #d13a54;
    }
</style>

<div class="welcome-section">
    <h1>👋 Selamat Datang, {{ Auth::user()->name }}!</h1>
    <p>Kelola data produk, toko, dan stok e-commerce Anda dengan mudah</p>
</div>

<div class="card">
    <h2 style="text-align: center; color: #0f9b8e;">📊 Ringkasan Data</h2>
    
    <div class="dashboard-grid">
        <div class="dashboard-card" onclick="showDetail('products')" style="cursor: pointer;">
            <div class="icon">📦</div>
            <h2>{{ $products->count() }}</h2>
            <p>Total Produk</p>
        </div>

        <div class="dashboard-card" onclick="showDetail('tokos')" style="cursor: pointer;">
            <div class="icon">🏪</div>
            <h2>{{ $tokos->count() }}</h2>
            <p>Total Toko</p>
        </div>

        <div class="dashboard-card" onclick="showDetail('stoks')" style="cursor: pointer;">
            <div class="icon">📈</div>
            <h2>{{ $stoks->count() }}</h2>
            <p>Total Stok</p>
        </div>

        <div class="dashboard-card" onclick="showDetail('users')" style="cursor: pointer;">
            <div class="icon">👥</div>
            <h2>{{ $users->count() }}</h2>
            <p>Total User</p>
        </div>
    </div>

    <!-- Detail Sections (Modals) -->
    <div id="products-detail" class="modal-overlay" onclick="if(event.target === this) hideDetail('products')">
        <div class="modal-content">
            <button class="close-btn" onclick="hideDetail('products')">Tutup</button>
            <h3 style="color: #0f9b8e; border-bottom: 2px solid #0f9b8e; padding-bottom: 10px; margin-top: 0;">📦 Detail Produk</h3>
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td>{{ Str::limit($product->deskripsi, 50) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="tokos-detail" class="modal-overlay" onclick="if(event.target === this) hideDetail('tokos')">
        <div class="modal-content">
            <button class="close-btn" onclick="hideDetail('tokos')">Tutup</button>
            <h3 style="color: #0f9b8e; border-bottom: 2px solid #0f9b8e; padding-bottom: 10px; margin-top: 0;">🏪 Detail Toko</h3>
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Toko</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tokos as $toko)
                    <tr>
                        <td>{{ $toko->id }}</td>
                        <td>{{ $toko->nama_toko }}</td>
                        <td>{{ $toko->alamat }}</td>
                        <td>{{ $toko->telepon }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="stoks-detail" class="modal-overlay" onclick="if(event.target === this) hideDetail('stoks')">
        <div class="modal-content">
            <button class="close-btn" onclick="hideDetail('stoks')">Tutup</button>
            <h3 style="color: #0f9b8e; border-bottom: 2px solid #0f9b8e; padding-bottom: 10px; margin-top: 0;">📈 Detail Stok</h3>
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produk</th>
                        <th>Toko</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stoks as $stok)
                    <tr>
                        <td>{{ $stok->id }}</td>
                        <td>{{ $stok->product->nama_produk }}</td>
                        <td>{{ $stok->toko->nama_toko }}</td>
                        <td>{{ $stok->jumlah_stok }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="users-detail" class="modal-overlay" onclick="if(event.target === this) hideDetail('users')">
        <div class="modal-content">
            <button class="close-btn" onclick="hideDetail('users')">Tutup</button>
            <h3 style="color: #0f9b8e; border-bottom: 2px solid #0f9b8e; padding-bottom: 10px; margin-top: 0;">👥 Detail User</h3>
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Bergabung</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="quick-actions">
        <a href="{{ route('products.create') }}" class="action-btn">+ Tambah Produk</a>
        <a href="{{ route('tokos.create') }}" class="action-btn">+ Tambah Toko</a>
        <a href="{{ route('stoks.create') }}" class="action-btn secondary">+ Tambah Stok</a>
    </div>
</div>

<script>
    function showDetail(type) {
        // Show selected modal
        document.getElementById(type + '-detail').style.display = 'flex';
    }

    function hideDetail(type) {
        document.getElementById(type + '-detail').style.display = 'none';
    }
</script>
@endsection