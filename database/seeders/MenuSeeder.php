<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'nama' => 'Nasi Goreng Spesial',
                'deskripsi' => 'Nasi goreng dengan bumbu rahasia, telur mata sapi, dan kerupuk.',
                'harga' => 25000,
                'kategori' => 'makanan',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/10e88954-4ddc-4750-809c-e5f882bda959.png'
            ],
            [
                'nama' => 'Mie Ayam Daging Wahyu',
                'deskripsi' => 'Mie ayam spesial dengan bakso homemade dan pangsit goreng Wagyu.',
                'harga' => 30000,
                'kategori' => 'makanan',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/26e054fb-d6eb-4692-931d-1f49bbc2b177.png'
            ],
            [
                'nama' => 'Jus Jeruk',
                'deskripsi' => 'Jus jeruk segar dengan gula aren dan lemon.',
                'harga' => 10000,
                'kategori' => 'minuman',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c989437b-ff70-4920-a280-6ccef816dc3c.png'
            ],
            [
                'nama' => 'Jus Alpukat Susu Davina Karamoy',
                'deskripsi' => 'Jus alpukat premium dengan SKM dan coklat cair.',
                'harga' => 15000,
                'kategori' => 'minuman',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e58fa14d-eecd-43f4-95b1-8dc9b3608ae2.png'
            ],
            [
                'nama' => 'Tahu Crispy',
                'deskripsi' => 'Tahu crispy renyah dengan saus sambal pedas.',
                'harga' => 12000,
                'kategori' => 'cemilan',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/544a108c-66ea-40a8-bd98-664210db2bc4.png'
            ],
            [
                'nama' => 'Chicken Spicy',
                'deskripsi' => 'Ayam pedas renyah dengan mayo dan saus tomat.',
                'harga' => 18000,
                'kategori' => 'cemilan',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2a52faa3-1bb2-4425-9f0a-9d4a831106fe.png'
            ],
            [
                'nama' => 'Kue Bantal',
                'deskripsi' => 'Kue bantal lembut dengan taburan keju.',
                'harga' => 15000,
                'kategori' => 'penutup',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/3b86f2be-f146-4128-b4d9-27749f88cc0f.png'
            ],
            [
                'nama' => 'Puding Coklat Karamel',
                'deskripsi' => 'Puding coklat premium dengan karamel lembut.',
                'harga' => 30000,
                'kategori' => 'penutup',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/24ac8a4e-835e-4783-9d43-c6299af60bbf.png'
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
