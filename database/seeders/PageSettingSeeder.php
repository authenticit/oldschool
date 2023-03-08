<?php

namespace Database\Seeders;

use App\Models\Admin\PageSetting;
use Illuminate\Database\Seeder;

class PageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageSetting::create([
            'contact_email' => 'support@gainsgroup.com.bd',
            'street' => 'House Number: 665/1, Islamnagar, Behind the Khan Jahan Ali Hall, Hall Road, Khulna University.',
            'phone' => '01756120009',
            'fax' => NULL,
            'email' => 'support@gainsgroup.com.bd',
            'site' => 'https://gainsgroup.com.bd/',
            'hero_bg' => '1624774825boyattendingonlineclass_hero2.jpg',
            'instructor_img' => '1624774864download.jpg',
            'faq_image' => '1643399548www.gainsschool.com.png',
            'faq_link' => 'https://vimeo.com/663706475',
            'newsletter_image' => '1624775070download.jpg',
            'newsletter_title' => 'Subscribe Our Newsletters',
            'newsletter_text' => 'Subscribe Our Newsletters for any update.',
            'hero_title' => 'আপনার সৃজনশীল প্রতিভাকে জাগ্রত করতে আমরা সর্বদা নিয়োজিত',
            'hero_text' => 'আজই যোগদান করুন আমাদের অনলাইন স্কুলে',
            'hero_btn_text' => 'View Courses',
            'hero_btn_url' => 'https://gainsschool.com/',
            'register_id' => '0',
        ]);
    }
}
