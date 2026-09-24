<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $table = 'about_pages';

    protected $fillable = [

        // About Hero
        'hero_tag',
        'hero_title',
        'hero_highlight',
        'hero_description',
        'hero_image',

        // Our Vision
        'vision_tag',
        'vision_title',
        'vision_highlight',
        'vision_description_1',
        'vision_description_2',
        'vision_image',
    ];
}