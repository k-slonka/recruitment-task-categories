<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test add new category.
     *
     * @return void
     */
    public function test_create_category()
    {
        $response = $this->json('POST', 'api/categories', [
            'name' => 'test_add_category_pl',
            'locale' => 'PL'
        ]);

        $response->assertStatus(201);
    }

    /**
     * Get categories in specific language.
     *
     * @return void
     */
    public function test_get_categories()
    {
        $response = $this->withHeaders([
            'locale' => 'PL',
        ])->json('GET', 'api/categories');

        $response->assertStatus(200);
    }
}
