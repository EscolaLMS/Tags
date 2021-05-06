<?php

namespace EscolaLms\Tags\Database\Seeders;

use EscolaLms\Tags\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run()
    {
        config(['tag_model_map.test' => 'Test']);
        $tagsData = [
            [
                'title' => 'Bestseller',
                'morphable_type' => 'Test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Nowości',
                'morphable_type' => 'Test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Promocje',
                'morphable_type' => 'Test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Najlepsze hity',
                'morphable_type' => 'Test',
                'morphable_id' => 1
            ],
            [
                'title' => 'Na czasie',
                'morphable_type' => 'Test',
                'morphable_id' => 1
            ]
        ];
        foreach ($tagsData as $value) {
            Tag::create($value);
        }
    }
}