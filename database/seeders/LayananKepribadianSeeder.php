<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananKepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('layanan_kepribadians')->insert([
            'jenis_kepribadian' => 'Dominance',
            'keterangan' => 'Tipe kepribadian dominance merupakan tipe kepribadian yang cenderung memberikan penekanan kuat pada lingkungan dan membuat keputusan dalam mengatasi sebuah pertentangan',
        ]);

        DB::table('layanan_kepribadians')->insert([
            'jenis_kepribadian' => 'Influence',
            'keterangan' => 'Tipe kepribadian influence merupakan tipe kepribadian yang selalu ingin menambah dan memperluas koneksi mereka. Seseorang dengan tipe kepribadian influence cenderung suka berpindah-pindah dan suka mengerjakan banyak hal yang berbeda dalam satu waktu',
        ]);

        DB::table('layanan_kepribadians')->insert([
            'jenis_kepribadian' => 'Steadiness',
            'keterangan' => 'Seseorang dengan tipe kepribadian steadiness adalah seseorang yang bersifat pendiam dan lebih memilih menjadi pendengar yang baik dan berkontribusi saat situasi sudah tenang dan stabil',
        ]);

        DB::table('layanan_kepribadians')->insert([
            'jenis_kepribadian' => 'Compliance',
            'keterangan' => 'Seseorang dengan tipe kepribadian compliance merupakan seseorang dengan sifat pendiam dan cenderung menggunakan logika untuk membuat keputusan',
        ]);
    }
}
