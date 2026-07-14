<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [

            'Home',
            'About',
            'Services',
            'Blog',
            'Portfolio',
            'Clients',
            // 'Privacy Policy',
            // 'Terms and Conditions',
            // 'Testimonials',
            'Contact Us',

        ];
        foreach ($pages as $page) {
              Page::create([

                'name' => $page,

                'slug' => Str::slug($page),

            ]);
        }
    }
}
