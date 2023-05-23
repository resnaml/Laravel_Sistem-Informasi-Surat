<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\jenissurat;
use App\Models\Kategoriarsip;
use App\Models\Sifatsurat;
use App\Models\Suratkeluar;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Sifatsurat::create([
            'namesifat' => 'Biasa'
        ]);
        Sifatsurat::create([
            'namesifat' => 'Rahasia'
        ]);
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
            'kodesurat' => 'SR01',
            'namejenis' => 'SuratResmi'
        ]);
        jenissurat::create([
            'kodesurat' => 'SP01',
            'namejenis' => 'SuratPermohonan'
        ]);
        jenissurat::create([
            'kodesurat' => 'SK01',
            'namejenis' => 'SuratKuasa'
        ]);
        jenissurat::create([
            'kodesurat' => 'SP02',
            'namejenis' => 'SuratPerintah'
        ]);
        jenissurat::create([
            'kodesurat' => 'SP03',
            'namejenis' => 'SuratPengantar'
        ]);
        jenissurat::create([
            'kodesurat' => 'SE01',
            'namejenis' => 'SuratEdaran'
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

        User::create([
            'name' => 'Ares',
            'username' => 'ares',
            'email' => 'ares@gmail.com',
            'nip' => '199205142023052001',
            'jabatan' => 'Karyawan',
            'level' => 'Kepala',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Emul',
            'username' => 'emul',
            'email' => 'emul@gmail.com',
            'nip' => '199205142023052002',
            'jabatan' => 'Karyawan',
            'level' => 'Kepala',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'nip' => '199205142023052003',
            'jabatan' => 'Admin',
            'level' => 'Kepala',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);
    }
}
