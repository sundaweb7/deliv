<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class SlideSeeder extends Seeder
{
    public function run()
    {
        // create storage dir
        Storage::disk('public')->makeDirectory('slides');

        $svg1 = '<svg xmlns="http://www.w3.org/2000/svg" width="800" height="300"><rect width="100%" height="100%" fill="#4F46E5"/><text x="50%" y="50%" fill="#fff" font-size="28" text-anchor="middle" dominant-baseline="middle">Sample Slide 1</text></svg>';
        $name1 = 'slide_sample_1.svg';
        Storage::disk('public')->put('slides/'.$name1, $svg1);

        $svg2 = '<svg xmlns="http://www.w3.org/2000/svg" width="800" height="300"><rect width="100%" height="100%" fill="#059669"/><text x="50%" y="50%" fill="#fff" font-size="28" text-anchor="middle" dominant-baseline="middle">Sample Slide 2</text></svg>';
        $name2 = 'slide_sample_2.svg';
        Storage::disk('public')->put('slides/'.$name2, $svg2);

        Slide::create(['image' => $name1, 'order' => 1, 'is_active' => true]);
        Slide::create(['image' => $name2, 'order' => 2, 'is_active' => true]);
    }
}
