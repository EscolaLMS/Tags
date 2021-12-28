<?php

namespace EscolaLms\Tags\Database\Seeders;

use EscolaLms\Tags\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class TagsSeeder extends Seeder
{
    public function run()
    {
        Config::set('escolalms_tags.tag_model_map.test', 'test');
        $tagsData = [
            [
                'title' => 'Bestseller',
                'morphable_type' => 'test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Nowości',
                'morphable_type' => 'test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Promocje',
                'morphable_type' => 'test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Najlepsze hity',
                'morphable_type' => 'test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Na czasie',
                'morphable_type' => 'test',
                'morphable_id' => 1
            ]
        ];
        foreach ($tagsData as $value) {
            Tag::create($value);
        }
    }
}
