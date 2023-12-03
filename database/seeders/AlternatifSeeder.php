<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alternatif')->insert([
            [
                'kode' => 'A01',
                'nama' => 'AM',
            ],
            [
                'kode' => 'A02',
                'nama' => 'SM',
            ],
            [
                'kode' => 'A03',
                'nama' => 'SL',
            ],
            [
                'kode' => 'A04',
                'nama' => 'SA',
            ],
            [
                'kode' => 'A05',
                'nama' => 'TY',
            ],
            [
                'kode' => 'A06',
                'nama' => 'NA',
            ],
            [
                'kode' => 'A07',
                'nama' => 'SW',
            ],
            [
                'kode' => 'A08',
                'nama' => 'VA',
            ],
            [
                'kode' => 'A09',
                'nama' => 'AF',
            ],
            [
                'kode' => 'A10',
                'nama' => 'AS',
            ],
            [
                'kode' => 'A11',
                'nama' => 'SZ',
            ],
            [
                'kode' => 'A12',
                'nama' => 'AK',
            ],
            [
                'kode' => 'A13',
                'nama' => 'AP',
            ],
            [
                'kode' => 'A14',
                'nama' => 'AA',
            ],
            [
                'kode' => 'A15',
                'nama' => 'TF',
            ],
            [
                'kode' => 'A16',
                'nama' => 'MR',
            ],
            [
                'kode' => 'A17',
                'nama' => 'DP',
            ],
            [
                'kode' => 'A18',
                'nama' => 'RD',
            ],
            [
                'kode' => 'A19',
                'nama' => 'DN',
            ],
            [
                'kode' => 'A20',
                'nama' => 'RM',
            ],
        ]);
    }
}
