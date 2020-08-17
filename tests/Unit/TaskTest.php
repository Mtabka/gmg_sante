<?php
namespace Tests\Unit;


use Tests\TestCase;

class TaskStoreTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        /**
         * tester la creation d'un utilisateur
         */
        $params = [
            'name' => "User name",
            'description' => 'sssssssss',
            'user_id' => 2,
            ];
        $response = $this->json('POST', getUri() . "/api/task/store", $params);
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $params = [
            'name' => "User name",
            'user_id' => 2,
        ];
        $response = $this->json('POST', getUri() . "/api/task/store", $params);
        $response->assertStatus(400)
            ->assertJson([
                'success' => false,
            ]);
        /**
         * tester la creation d'un task avec des params manquant
         */
        $params = [
            'name' => "User name",
            'description' => 'sssssssss',
            'user_id' => 5555,
        ];
        $response = $this->json('POST', getUri() . "/api/task/store", $params);
        $response->assertStatus(400)
            ->assertJson([
                'success' => false,
            ]);
    }
}
