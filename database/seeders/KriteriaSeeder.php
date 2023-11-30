<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria')->insert([
            [
                'kode' => 'C01',
                'nama' => 'Hasil Wawancara',
                'bobot' => '0.25',
                'jenis' => 'Benefit',
            ],
            [
                'kode' => 'C02',
                'nama' => 'IPK',
                'bobot' => '0.15',
                'jenis' => 'Benefit',
            ],
            [
                'kode' => 'C03',
                'nama' => 'Kepemilikan KIP',
                'bobot' => '0.1',
                'jenis' => 'Benefit',
            ],
            [
                'kode' => 'C04',
                'nama' => 'Kepemilikan KKS',
                'bobot' => '0.1',
                'jenis' => 'Benefit',
            ],
            [
                'kode' => 'C05',
                'nama' => 'Penghasilan Ayah',
                'bobot' => '0.1',
                'jenis' => 'Cost',
            ],
            [
                'kode' => 'C06',
                'nama' => 'Penghasilan Ibu',
                'bobot' => '0.1',
                'jenis' => 'Cost',
            ],
            [
                'kode' => 'C07',
                'nama' => 'Kepemilikan Rumah',
                'bobot' => '0.05',
                'jenis' => 'Cost',
            ],
            [
                'kode' => 'C08',
                'nama' => 'Daya Listrik',
                'bobot' => '0.05',
                'jenis' => 'Cost',
            ],
            [
                'kode' => 'C09',
                'nama' => 'Luas Tanah',
                'bobot' => '0.05',
                'jenis' => 'Cost',
            ],
            [
                'kode' => 'C10',
                'nama' => 'Sumber Air',
                'bobot' => '0.05',
                'jenis' => 'Cost',
            ],
        ]);
    }
}
