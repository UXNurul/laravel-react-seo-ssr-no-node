<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        DB::table('pages')->insert([
            [
                'slug' => '/',
                'title' => 'Home | Welcome',
                'description' => 'Home | description',
                'keywords' => 'home, welcome',
                'props' => json_encode([
                    'component' => 'Home',
                    'props' => [
                        'title' => 'Home | Welcome',
                        'description' => 'Home | description',
                        'message' => 'Home | Welcome 📞',
                        'subtitle' => 'We are here to help you 24/7',
                        'email' => 'home@example.com'
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact Us - Get in Touch | Modernseva',
                'description' => 'Need help? Contact us for support, business inquiries, or collaboration.',
                'keywords' => 'Contact Modernseva, customer support, business inquiries, collaboration',
                'props' => json_encode([
                    'component' => 'Contact',
                    'props' => [
                        'title' => 'Contact Us - Get in Touch | Modernseva',
                        'description' => 'Need help? Contact us for support, business inquiries, or collaboration. Reach out to us today!',
                        'message' => 'Contact Us 📞',
                        'subtitle' => 'We are here to help you 24/7',
                        'email' => 'support@example.com'
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
