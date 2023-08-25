<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    /**
     * Test retrieving all Item.
     *
     * @return void
     */
    public function testGetAllItem()
    {
        Item::factory()->count(5)->create();

        $response = $this->get('api/items');

        $response->assertStatus(200);
        $response->assertJsonCount(4);
    }

    /**
     * Test retrieving an Item by its ID.
     *
     * @return void
     */
    public function testGetItemById()
    {
        // Create a dummy Item model
        $item = Item::factory()->create();

        // Send a GET request to the API endpoint with the categories ID
        $response = $this->get('/api/items/' . $item->id);

        // Assert the response status code is 200 (OK)
        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'List Item Successful',
            ]);
    }
    //    /**
//     * Test creating a categories.
//     *
//     * @return void
//     */
    public function testAddCategories()
    {

        $data = [
            'name' => 'Defacto',
            'price' => 1,
            'seller' => 'Alex',
        ];

        $response = $this->postJson('/api/items', $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('items', [ 'name' => 'Defacto',
            'price' => 1,
            'seller' => 'Alex',]);

    }
}
