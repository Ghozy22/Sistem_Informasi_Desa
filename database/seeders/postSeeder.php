<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            'judul' => 'Contoh Judul',
            'isi' => 'Contoh isi',
            'gambar' => 'contoh.png',
            'penulis' => 'Contoh Penulis',
        ]);
    }
}
