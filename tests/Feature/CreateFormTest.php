<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        
    }
    
    public function test_groupeCreate()
    {
        $user = User::find(5);
        $response = $this->actingAs($user)->get('groupes/create',[
            'name'=>'GroupeX',
            'nationalite' => 'France',
            'date_creation'=> '2001',
            'photo' => '',
            'imageUpload' => '',
        ]);
        $response->assertStatus(200);
    }
    
    public function test_groupeStore()
    {
        $user = User::find(5);
        $response = $this->actingAs($user)->post('groupes/store',[
            'name'=>'GroupeX',
            'nationalite' => 'Freance',
            'date_creation'=> '2001',
            'photo' => '',
            'imageUpload' => '',
        ]);
        $response->assertRedirect('groupes/index');
    }

}
