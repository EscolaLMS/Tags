<?php

namespace EscolaLms\Tags\Tests\API;

use EscolaLms\Tags\Tests\TestCase;

class TagsApiTest extends TestCase
{
    public function testTagsInsert() : void
    {
        // Set value for test
        config(['tag_model_map.test' => 'Test']);
        $response = $this->json('POST', '/api/tags', [
            'model_type' => 'test',
            'model_id' => 1,
            'tags' => [
                ['title' => 'test'],
                ['title' => 'test2']
            ]
        ]);
        $this->assertObjectHasAttribute('data', $response->getData());
        $this->assertIsArray($response->getData()->data);
        $this->assertTrue($response->getData()->data[0]->title === 'test');
    }


}