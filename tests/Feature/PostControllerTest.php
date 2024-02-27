<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   
     public function test_can_create_post()
     {
         $user = User::factory()->create();
         $this->actingAs($user);
     
         $response = $this->post('/blogs', [
             'title' => 'Test Post',
             'subtitle' => 'Test Subtitle',
             'description' => 'This is a test post content',
             'slug' => Str::slug('Test Post'),
             'user_id' => Auth::user()->id,
         ]);
     
         // Assert that the post creation was successful
         $response->assertStatus(200); 
    
     }
}
