<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\jenissurat;
use App\Models\Kategoriarsip;
use App\Models\Sifatsurat;
use App\Models\User;
use App\Models\Nip;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Sifatsurat::create([
            'namesifat' => 'Biasa'
        ]);
        // Sifatsurat::create([
        //     'namesifat' => 'Rahasia'
        // ]);
        Sifatsurat::create([
            'namesifat' => 'Penting'
        ]);
        Sifatsurat::create([
            'namesifat' => 'Segera'
        ]);
        Sifatsurat::create([
            'namesifat' => 'Rutin'
        ]);

        jenissurat::create([
            'kodesurat' => 'PP01',
            'namejenis' => 'Surat Penerimaan PKL'
        ]);
        jenissurat::create([
            'kodesurat' => 'IP01',
            'namejenis' => 'Surat Izin Penelitian'
        ]);
        jenissurat::create([
            'kodesurat' => 'SP01',
            'namejenis' => 'Surat Permohonan'
        ]);
        jenissurat::create([
            'kodesurat' => 'SP02',
            'namejenis' => 'Surat Perintah'
        ]);
        jenissurat::create([
            'kodesurat' => 'SP03',
            'namejenis' => 'Surat Pengantar'
        ]);
        jenissurat::create([
            'kodesurat' => 'SE01',
            'namejenis' => 'Surat Edaran'
        ]);

        Kategoriarsip::create([
            'arsip_kategori' => 'Arsip Berguna',
            'kode_arsip' => 'AB01'
        ]);

        Kategoriarsip::create([
            'arsip_kategori' => 'Arsip Penting',
            'kode_arsip' => 'AP01'
        ]);

        Kategoriarsip::create([
            'arsip_kategori' => 'Arsip Vital',
            'kode_arsip' => 'AV01'
        ]);

        Kategoriarsip::create([
            'arsip_kategori' => 'Arsip Dinamis',
            'kode_arsip' => 'AD01'
        ]);



        Nip::create([
            'nip_kode' => '199205142023052001',
            'nama_lengkap' => 'Admin',
            'jabatan' => 'Admin',
            'alamat' => 'Jln. Patimura no.90',
            'telepon' => '09823921993929',
            'tgl_lahir' => '2023-06-19'
        ]);

        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'nip' => '199205142023052001',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        Nip::create([
            'nip_kode' => '199205142023052002',
            'nama_lengkap' => 'Kepala',
            'jabatan' => 'Kepala Tata Usaha',
            'alamat' => 'Jln. Patimura no.90',
            'telepon' => '09823921993929',
            'tgl_lahir' => '2023-06-19'
        ]);

        User::create([
            'username' => 'kepala',
            'email' => 'kepala@gmail.com',
            'nip' => '199205142023052002',
            'password' => bcrypt('password'),
            'is_kepala' => 1
        ]);

        Nip::create([
            'nip_kode' => '199205142023052003',
            'nama_lengkap' => 'Ares',
            'jabatan' => 'Karyawan',
            'alamat' => 'Jln. Patimura no.90',
            'telepon' => '09823921993929',
            'tgl_lahir' => '2023-06-19'
        ]);

        User::create([
            'username' => 'ares',
            'email' => 'ares@gmail.com',
            'nip' => '199205142023052003',
            'password' => bcrypt('password'),
        ]);
        
    }
}
