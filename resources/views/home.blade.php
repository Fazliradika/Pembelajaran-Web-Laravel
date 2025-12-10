@extends('layouts.app')

@section('title', 'Home - Fazli Radika')

@section('content')
<div class="card">
    <div class="profile-header">
        <img src="{{ asset('GGWP.jpg') }}" alt="Fazli Radika" class="profile-img">
        <h1>Halo, Saya <span class="highlight">Fazli Radika</span> 👋</h1>
        <p>Mahasiswa Teknologi Informasi | Web Developer | Cyber Security Enthusiast</p>
    </div>
</div>

<div class="card">
    <h2>🎓 Tentang Saya</h2>
    <p>Saya adalah mahasiswa <strong>Jurusan Teknologi Informasi Semester 5</strong> yang memiliki passion di bidang <span class="highlight">Web Development</span> dan <span class="highlight">Cyber Security</span>.</p>
    <p>Saat ini saya aktif belajar dan mengembangkan skill di kedua bidang tersebut untuk mempersiapkan karir di dunia IT.</p>
</div>

<div class="card">
    <h2>💻 Bidang Minat</h2>
    <div style="margin-top: 15px;">
        <span class="skill-tag">🌐 Web Development</span>
        <span class="skill-tag">🔐 Cyber Security</span>
        <span class="skill-tag">🛡️ Network Security</span>
        <span class="skill-tag">📱 Frontend</span>
        <span class="skill-tag">⚙️ Backend</span>
    </div>
</div>

<div class="card">
    <h2>🚀 Website Ini</h2>
    <p>Portfolio sederhana ini dibuat menggunakan <strong>Laravel Framework</strong> sebagai tugas kuliah. Website ini menampilkan informasi tentang saya, skill yang saya miliki, dan cara menghubungi saya.</p>
    <p>Silakan explore halaman lainnya melalui menu di atas! 😊</p>
</div>

<div class="card">
    <h2>🎓 Proyek Tugas Besar Pemrograman Web</h2>
    <p>Berikut adalah proyek <strong>Tugas Besar Pemrograman Web</strong> yang telah saya kerjakan:</p>
    <a href="https://tubes-pemweb-production.up.railway.app/" target="_blank" class="project-link">🌐 Lihat Proyek Tubes Pemweb</a>
</div>
@endsection
