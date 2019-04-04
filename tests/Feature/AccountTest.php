<?php

namespace Tests\Feature;

use App\Jobs\Account\CreateAccount;
use App\Models\Account;
use App\Models\Client;
use App\Models\User;
use App\Utils\Traits\UserSessionAttributes;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AccountTest extends TestCase
{

    //use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        Session::start();

        $this->faker = \Faker\Factory::create();

        Model::reguard();
    }

    /*
     * @covers AccountController
     */
    public function testAccountCreation()
    {
        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'ALongAndBrilliantPassword123',
            '_token' => csrf_token(),
            'privacy_policy' => 1,
            'terms_of_service' => 1
        ];

        $response = $this->post('/signup', $data);

        $response->assertStatus(200)
                ->assertJson([
                'first_name' => $data['first_name'],
            ]);

    }

    public function testApiAccountCreation()
    {

        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'ALongAndBrilliantPassword123',
            //'_token' => csrf_token(),
            'privacy_policy' => 1,
            'terms_of_service' => 1
        ];


        $response = $this->withHeaders([
                'X-API-SECRET' => config('ninja.api_secret'),
            ])->post('/api/v1/signup', $data);

        $response->assertStatus(200)
                ->assertJson([
                'first_name' => $data['first_name'],
            ]);
        
    }



}