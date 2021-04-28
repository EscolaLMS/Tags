<?php

namespace EscolaLms\Tags\Tests\API;

use EscolaLms\Tags\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class TagsApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Artisan::call('tag-permissions:seed');
    }

    public function testTagsInsert() : void
    {
        $user = config('auth.providers.users.model')::factory()->create();
        $user->guard_name = 'api';
        $user->givePermissionTo('create tags');
        // Set value for test
        config(['tag_model_map.test' => 'Test']);
        $response = $this->actingAs($user, 'api')->json('POST', '/api/tags', [
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

    public function testTagsIndex() : void
    {
        $response = $this->json('GET', '/api/tags');
        $this->assertObjectHasAttribute('data', $response->getData());
        $this->assertIsArray($response->getData()->data);
        $this->assertObjectHasAttribute('title', $response->getData()->data[0]);
    }

    public function testTagShow() : void
    {
        $user = config('auth.providers.users.model')::factory()->create();
        $user->guard_name = 'api';
        $user->givePermissionTo('create tags');
        // Set value for test
        config(['tag_model_map.test' => 'Test']);
        $response = $this->actingAs($user, 'api')->json('POST', '/api/tags', [
            'model_type' => 'test',
            'model_id' => 1,
            'tags' => [
                ['title' => 'Bestseller']
            ]
        ]);
        $tags = $response->getData()->data;
        $response = $this->json('GET', '/api/tags/' . $tags[0]->id);
        $this->assertObjectHasAttribute('data', $response->getData());
        $this->assertIsObject($response->getData()->data);
        $this->assertTrue($response->getData()->data->id === $tags[0]->id);
    }

    public function testTagDestroy() : void
    {
        $user = config('auth.providers.users.model')::factory()->create();
        $user->guard_name = 'api';
        $user->givePermissionTo('create tags');
        $user->givePermissionTo('delete tags');
        // Set value for test
        config(['tag_model_map.test' => 'Test']);
        $response = $this->actingAs($user, 'api')->json('POST', '/api/tags', [
            'model_type' => 'test',
            'model_id' => 1,
            'tags' => [
                ['title' => 'Bestseller'],
                ['title' => 'Nowości'],
                ['title' => 'Promocje'],
                ['title' => 'Najlepsze hity'],
                ['title' => 'Na czasie']
            ]
        ]);
        $tags = $response->getData()->data;
        $response = $this->actingAs($user, 'api')->json('DELETE', '/api/tags', [
            'tags' => [
                array_map(function ($tag) {
                    return $tag->id;
                }, $tags)
            ]
        ]);
        $response->assertStatus(200);
    }

    public function testTagsUnique() : void
    {
        $response = $this->json('GET', '/api/tags/unique');
        $response->assertStatus(200);
        $this->assertObjectHasAttribute('data', $response->getData());
        $temp_array = $key_array = [];
        foreach($response->getData()->data as $key => $val) {
            if (!in_array($val->title, $key_array)) {
                $key_array[$key] = $val->title;
                $temp_array[$key] = $val;
            }
        }
        $this->assertTrue(count($temp_array) === count($response->getData()->data));
    }
}