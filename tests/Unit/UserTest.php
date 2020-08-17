<?php
namespace Tests\Unit;


use Tests\TestCase;

class UserStoreTest extends TestCase
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
            'first_name' => 'User first name',
            'email' => 'test@test.com',
        ];
        $response = $this->json('POST', getUri() . "/api/user/store", $params);
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        /**
         * tester la creation d'un utilisateur avec des params manquant
         */
        $params = [
            'name' => "User name",
            'first_name' => 'User first name',
        ];
        $response = $this->json('POST', getUri() . "/api/user/store", $params);
        $response->assertStatus(400)
            ->assertJson([
                'success' => true,
            ]);
    }
}
