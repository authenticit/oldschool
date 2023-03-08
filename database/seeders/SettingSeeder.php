<?php

namespace Database\Seeders;

use App\Models\Settings\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'logo' => '1625477774-living-art.png',
            'website_name' => 'Gains School',
            'banner_text_1' => 'দুর্যোগ সরিয়ে  মনের  রঙে গড়বো পৃথি',
            'banner_text_2' => 'বাংলাদেশের স্বাধীনতার ৫০ বছর উপলক্ষে শিশু-কিশোরদের চিত্রাঙ্কন প্রতিযোগীতা ও প্রদর্শনী',
            'banner_text_3' => 'শিশু-কিশোরদের শিল্পকর্ম নিয়ে বাংলাদেশে সর্বপ্রথম হতে চলেছে ত্রিমাত্রিক ভার্চুয়াল প্রদর্শনী',
            'banner_image' => NULL,
            'pad_head' => '1625583777-pad.png',
            'website' => 'https://livingartbg.com/',
            'phone' => '8801911611991',
            'email' => 'livingart82@gmail.com'
        ]);
    }
}
