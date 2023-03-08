<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'rtl' => '0',
            'is_default' => '1',
            'language' => 'EN',
            'name' => '1620552746VSC7X94Q',
            'file' => '1620552746VSC7X94Q.json',
            'register_id' => '0',
        ]);
    }
}
