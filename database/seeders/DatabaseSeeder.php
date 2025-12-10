<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Stok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User (using firstOrCreate to avoid duplicate errors)
        User::firstOrCreate(
            ['email' => 'fazli@admin.com'],
            [
                'name' => 'Fazli Radika',
                'password' => 'admin123',
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@tokofazli.com'],
            [
                'name' => 'Admin Toko',
                'password' => 'toko123',
            ]
        );

        // Create Gaming Products
        $products = [
            [
                'nama_produk' => 'PC Gaming RTX 4090',
                'harga' => 45000000,
                'deskripsi' => 'PC Gaming High-End dengan Intel Core i9-14900K, NVIDIA RTX 4090 24GB, RAM 64GB DDR5, SSD 2TB NVMe. Cocok untuk gaming 4K dan content creation.',
            ],
            [
                'nama_produk' => 'PC Gaming RTX 4070',
                'harga' => 25000000,
                'deskripsi' => 'PC Gaming Mid-High dengan AMD Ryzen 7 7800X3D, NVIDIA RTX 4070 12GB, RAM 32GB DDR5, SSD 1TB NVMe. Perfect untuk gaming 1440p.',
            ],
            [
                'nama_produk' => 'PC Gaming RTX 4060',
                'harga' => 15000000,
                'deskripsi' => 'PC Gaming Mid-Range dengan Intel Core i5-14400F, NVIDIA RTX 4060 8GB, RAM 16GB DDR4, SSD 512GB NVMe. Budget friendly untuk gaming 1080p.',
            ],
            [
                'nama_produk' => 'Laptop Gaming ASUS ROG Strix',
                'harga' => 28000000,
                'deskripsi' => 'Laptop Gaming ASUS ROG Strix G16, Intel Core i7-13650HX, RTX 4060 8GB, RAM 16GB, SSD 1TB, Display 16" 165Hz.',
            ],
            [
                'nama_produk' => 'Laptop Gaming Lenovo Legion 5',
                'harga' => 18000000,
                'deskripsi' => 'Laptop Gaming Lenovo Legion 5, AMD Ryzen 7 7735HS, RTX 4050 6GB, RAM 16GB, SSD 512GB, Display 15.6" 144Hz.',
            ],
            [
                'nama_produk' => 'Monitor Gaming ASUS 27" 165Hz',
                'harga' => 4500000,
                'deskripsi' => 'Monitor Gaming ASUS VG27AQ1A, 27" IPS, 2560x1440, 165Hz, 1ms, G-Sync Compatible, HDR10.',
            ],
            [
                'nama_produk' => 'Monitor Gaming AOC 24" 144Hz',
                'harga' => 2500000,
                'deskripsi' => 'Monitor Gaming AOC 24G2, 24" IPS, 1920x1080, 144Hz, 1ms, FreeSync Premium, Frameless.',
            ],
            [
                'nama_produk' => 'Keyboard Mechanical Logitech G Pro X',
                'harga' => 1800000,
                'deskripsi' => 'Keyboard Gaming Mechanical Logitech G Pro X, Hot-swappable switches, RGB Lightsync, Tenkeyless.',
            ],
            [
                'nama_produk' => 'Keyboard Mechanical Razer BlackWidow V4',
                'harga' => 2500000,
                'deskripsi' => 'Keyboard Gaming Razer BlackWidow V4, Green Mechanical Switches, Chroma RGB, Magnetic Wrist Rest.',
            ],
            [
                'nama_produk' => 'Mouse Gaming Logitech G502 X Plus',
                'harga' => 2200000,
                'deskripsi' => 'Mouse Gaming Wireless Logitech G502 X Plus, HERO 25K Sensor, LIGHTSPEED, RGB, 13 Programmable Buttons.',
            ],
            [
                'nama_produk' => 'Mouse Gaming Razer DeathAdder V3',
                'harga' => 1500000,
                'deskripsi' => 'Mouse Gaming Razer DeathAdder V3, Focus Pro 30K Sensor, 90 Million Click Switches, Ergonomic.',
            ],
            [
                'nama_produk' => 'Headset Gaming HyperX Cloud III',
                'harga' => 1800000,
                'deskripsi' => 'Headset Gaming HyperX Cloud III, 53mm Drivers, DTS Spatial Audio, Memory Foam, Detachable Mic.',
            ],
            [
                'nama_produk' => 'Headset Gaming SteelSeries Arctis Nova 7',
                'harga' => 3200000,
                'deskripsi' => 'Headset Gaming Wireless SteelSeries Arctis Nova 7, 360° Spatial Audio, 38 Hour Battery, Multi-Platform.',
            ],
            [
                'nama_produk' => 'Mousepad Gaming SteelSeries QcK XXL',
                'harga' => 450000,
                'deskripsi' => 'Mousepad Gaming SteelSeries QcK XXL, 900x400mm, Micro-woven Cloth, Non-slip Rubber Base.',
            ],
            [
                'nama_produk' => 'Gaming Chair Secretlab Titan Evo',
                'harga' => 8500000,
                'deskripsi' => 'Gaming Chair Secretlab Titan Evo 2022, 4-way Lumbar Support, Neo Hybrid Leatherette, Magnetic Armrests.',
            ],
            [
                'nama_produk' => 'Webcam Logitech C922 Pro',
                'harga' => 1200000,
                'deskripsi' => 'Webcam Streaming Logitech C922 Pro, Full HD 1080p 30fps, Background Replacement, Autofocus.',
            ],
            [
                'nama_produk' => 'Capture Card Elgato HD60 X',
                'harga' => 2800000,
                'deskripsi' => 'Capture Card Elgato HD60 X, 4K60 HDR10 Passthrough, 1080p60 Capture, VRR Support, Zero-Lag.',
            ],
            [
                'nama_produk' => 'Microphone Blue Yeti X',
                'harga' => 2500000,
                'deskripsi' => 'USB Microphone Blue Yeti X, 4-Capsule Condenser, Blue VO!CE Software, LED Metering, Multi-Pattern.',
            ],
            [
                'nama_produk' => 'Controller PS5 DualSense',
                'harga' => 1100000,
                'deskripsi' => 'Controller Sony PlayStation 5 DualSense, Haptic Feedback, Adaptive Triggers, Built-in Mic.',
            ],
            [
                'nama_produk' => 'Controller Xbox Elite Series 2',
                'harga' => 2800000,
                'deskripsi' => 'Controller Xbox Elite Wireless Series 2, Adjustable Tension Thumbsticks, 40 Hour Battery, Carrying Case.',
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['nama_produk' => $product['nama_produk']],
                $product
            );
        }

        // Create Gaming Stores
        $tokos = [
            [
                'nama_toko' => 'Toko Fazli Gaming Center Jakarta',
                'alamat' => 'Jl. Mangga Dua Raya No. 123, Jakarta Utara',
                'telepon' => '021-12345678',
                'email' => 'jakarta@tokofazli.com',
            ],
            [
                'nama_toko' => 'Toko Fazli Gaming Bandung',
                'alamat' => 'Jl. Braga No. 45, Bandung',
                'telepon' => '022-87654321',
                'email' => 'bandung@tokofazli.com',
            ],
            [
                'nama_toko' => 'Toko Fazli Gaming Surabaya',
                'alamat' => 'Jl. Tunjungan Plaza No. 88, Surabaya',
                'telepon' => '031-11223344',
                'email' => 'surabaya@tokofazli.com',
            ],
            [
                'nama_toko' => 'Toko Fazli Gaming Yogyakarta',
                'alamat' => 'Jl. Malioboro No. 55, Yogyakarta',
                'telepon' => '0274-556677',
                'email' => 'yogya@tokofazli.com',
            ],
            [
                'nama_toko' => 'Toko Fazli Gaming Online',
                'alamat' => 'Warehouse Cikupa, Tangerang',
                'telepon' => '0812-9999-8888',
                'email' => 'online@tokofazli.com',
            ],
        ];

        foreach ($tokos as $toko) {
            Toko::firstOrCreate(
                ['nama_toko' => $toko['nama_toko']],
                $toko
            );
        }

        // Create Stock for each product in each store (only if not exists)
        $allProducts = Product::all();
        $allTokos = Toko::all();

        foreach ($allTokos as $toko) {
            foreach ($allProducts as $product) {
                Stok::firstOrCreate(
                    [
                        'product_id' => $product->id,
                        'toko_id' => $toko->id,
                    ],
                    [
                        'jumlah_stok' => rand(5, 50), // Random stock between 5-50
                    ]
                );
            }
        }
    }
}
