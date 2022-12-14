<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategories = ['wisata kuliner', 'resep dan tutorial', 'review makanan'];

        foreach ($kategories as $kategori) {
            Kategori::create([
                'nama' => $kategori,
                'slug' => Str::slug($kategori)
            ]);
        }
    }
}
