@extends('layouts.app')

@section('title', 'Register - Fazli Radika')

@section('content')
<div class="card" style="max-width: 500px; margin: 50px auto;">
    <h1>📝 Register</h1>
    <p style="color: #888; margin-bottom: 30px;">Buat akun baru untuk mengakses dashboard</p>
    
    @if($errors->any())
        <div style="background: #e94560; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: #0f9b8e; font-weight: bold;">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                style="width: 100%; padding: 15px; border: 2px solid #0f3460; border-radius: 8px; background: #1a1a2e; color: white; font-size: 16px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: #0f9b8e; font-weight: bold;">Email</label>
            <input type="email" name="email" autocomplete="off" required
                style="width: 100%; padding: 15px; border: 2px solid #0f3460; border-radius: 8px; background: #1a1a2e; color: white; font-size: 16px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; color: #0f9b8e; font-weight: bold;">Password</label>
            <input type="password" name="password" autocomplete="off" required
                style="width: 100%; padding: 15px; border: 2px solid #0f3460; border-radius: 8px; background: #1a1a2e; color: white; font-size: 16px;">
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; margin-bottom: 8px; color: #0f9b8e; font-weight: bold;">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
                style="width: 100%; padding: 15px; border: 2px solid #0f3460; border-radius: 8px; background: #1a1a2e; color: white; font-size: 16px;">
        </div>

        <button type="submit" style="width: 100%; padding: 12px; background: #e94560; border: none; color: white; font-size: 16px; border-radius: 25px; cursor: pointer; font-weight: bold; transition: all 0.3s;">
            📝 Daftar
        </button>
    </form>

    <p style="text-align: center; margin-top: 20px; color: #888;">
        Sudah punya akun? <a href="{{ route('login') }}" style="color: #0f9b8e; font-weight: bold;">Login di sini</a>
    </p>
</div>
@endsection
