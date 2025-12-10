@extends('layouts.app')

@section('title', 'About - Fazli Radika')

@section('content')
<div class="card">
    <h1>👨‍💻 Tentang Saya</h1>
    <p>Halo! Perkenalkan nama saya <strong class="highlight">Fazli Radika</strong>.</p>
    <p>Saya adalah mahasiswa <strong>Jurusan Teknologi Informasi Semester 5</strong> yang sangat antusias dalam dunia IT, khususnya di bidang <strong>Web Development</strong> dan <strong>Cyber Security</strong>.</p>
    <p>Saya percaya bahwa teknologi dapat membuat dunia menjadi lebih baik, dan saya ingin menjadi bagian dari perubahan tersebut.</p>
</div>

<div class="card">
    <h2>🎯 Bidang Fokus</h2>
    <ul style="margin-left: 20px;">
        <li><strong>Web Development</strong> - Membangun aplikasi web yang modern dan responsif</li>
        <li><strong>Cyber Security</strong> - Mempelajari keamanan sistem dan jaringan</li>
        <li><strong>Penetration Testing</strong> - Belajar ethical hacking untuk menemukan kerentanan</li>
        <li><strong>Network Security</strong> - Memahami keamanan infrastruktur jaringan</li>
    </ul>
</div>

<div class="card">
    <h2>🛠️ Technical Skills</h2>
    <h3 style="color: #666; margin: 15px 0 10px 0;">Web Development:</h3>
    <div>
        <span class="skill-tag">HTML5</span>
        <span class="skill-tag">CSS3</span>
        <span class="skill-tag">JavaScript</span>
        <span class="skill-tag">PHP</span>
        <span class="skill-tag">Laravel</span>
        <span class="skill-tag">MySQL</span>
        <span class="skill-tag">Bootstrap</span>
    </div>
    
    <h3 style="color: #666; margin: 20px 0 10px 0;">Cyber Security:</h3>
    <div>
        <span class="skill-tag">Network Analysis</span>
        <span class="skill-tag">Linux</span>
        <span class="skill-tag">Wireshark</span>
        <span class="skill-tag">Nmap</span>
        <span class="skill-tag">OWASP</span>
    </div>
</div>

<div class="card">
    <h2>📚 Pendidikan</h2>
    <p><strong>Teknologi Informasi</strong> <span class="badge">Semester 5</span></p>
    <p style="color: #666;">Aktif mengikuti perkuliahan dan mengembangkan skill di luar kelas melalui project pribadi dan sertifikasi online.</p>
</div>

<div class="card">
    <h2>🎮 Hobi & Aktivitas</h2>
    <ul style="margin-left: 20px;">
        <li>Mengikuti CTF (Capture The Flag) Competition</li>
        <li>Membuat project web pribadi</li>
        <li>Belajar dari platform online (TryHackMe, HackTheBox)</li>
        <li>Membaca artikel tentang teknologi terbaru</li>
        <li>Bermain game</li>
    </ul>
</div>
@endsection
