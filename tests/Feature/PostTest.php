<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_list_of_posts_can_be_fetched_for_the_authenticated_user() //////
    {
        $user = factory(User::class)->create();
        $anotherUser = factory(User::class)->create();

        $post = factory(Post::class)->create(['user_id' => $user->id]);
        $anotherPost = factory(Post::class)->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/posts?api_token=' . $user->api_token);
        
        $response->assertJsonCount(1)
            ->assertJson([             
                'data' => [
                    [
                        "data" => [
                            'post_id' => $post->id
                        ]
                    ]   
                ]
                  
            ]);
    }

   

    /** @test */
    public function an_authenticated_user_can_add_a_post()   ///////
    {
        $response = $this->post('/api/posts', $this->data());

        $post = Post::first();
        
        $this->assertEquals('06/13/2001', $post->date->format('m/d/Y'));
        $this->assertEquals('Maths', $post->subject);
        $this->assertEquals('Algebra', $post->topic);
        $this->assertEquals('Worked on simultaneous equations. Very good work!', $post->takeaway);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'data' => [
                'post_id' => $post->id,
            ],
            'links' => [
                'self' => $post->path(),
            ]
            
        ]);
    }

    /** @test */
    public function post_fields_are_required()
    {
        collect(['date', 'subject', 'topic', 'takeaway'])
            ->each(function ($field) {
                $response = $this->post('/api/posts',
                    array_merge($this->data(), [$field => '']));

                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Post::all());
            });
    }

    

    /** @test */
    public function dates_are_properly_stored()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/posts',
            array_merge($this->data()));

        $this->assertCount(1, Post::all());
        $this->assertInstanceOf(Carbon::class, Post::first()->date);
        $this->assertEquals('06-13-2001', Post::first()->date->format('m-d-Y'));
    }
    
    /** @test */
    public function a_post_can_be_retrieved()
    {
        $post = factory(Post::class)->create(['user_id' => $this->user->id]);

        $response = $this->get('/api/posts/' . $post->id . '?api_token=' . $this->user->api_token);

        $response->assertJson([
            'data' => [
                'post_id' => $post->id,
                'date' => $post->date->format('m/d/Y'),
                'subject' => $post->subject,
                'topic' => $post->topic,
                'takeaway' => $post->takeaway,

                'last_updated' => $post->updated_at->diffForHumans(),
            ]
        ]);
    }

    /** @test */
    public function only_the_users_posts_can_be_retrieved()
    {
        $post = factory(Post::class)->create(['user_id' => $this->user->id]);


        $anotherUser = factory(User::class)->create();

        $response = $this->get('/api/posts/' . $post->id . '?api_token=' . $anotherUser->api_token);

        $response->assertStatus(403);
    }

    /** @test */
    public function a_post_can_be_patched() ///////
    {
        $post = factory(Post::class)->create(['user_id' => $this->user->id]);

        $response = $this->patch('/api/posts/' . $post->id, $this->data());

        $post = $post->fresh();
        $this->assertEquals('06/13/2001', $post->date->format('m/d/Y'));
        $this->assertEquals('Maths', $post->subject);
        $this->assertEquals('Algebra', $post->topic);
        $this->assertEquals('Worked on simultaneous equations. Very good work!', $post->takeaway);
        
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                'post_id' => $post->id,
            ],
            'links' => [
                'self' => $post->path(),
            ]
        ]);
    }

    /** @test */
    public function only_the_owner_of_the_post_can_patch_the_contact()
    {
        $post = factory(Post::class)->create();

        $anotherUser = factory(User::class)->create();

        $response = $this->patch('/api/posts/' . $post->id,
            array_merge($this->data(), ['api_token' => $anotherUser->api_token]));

        $response->assertStatus(403);
    }

    /** @test */
    public function a_post_can_be_deleted()
    {
        $post = factory(Post::class)->create(['user_id' => $this->user->id]);

        $response = $this->delete('/api/posts/' . $post->id,
            ['api_token' => $this->user->api_token]);

        $this->assertCount(0, Post::all());
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /** @test */
    public function only_the_owner_can_delete_the_post()
    {
        $post = factory(Post::class)->create();

        $anotherUser = factory(User::class)->create();

        $response = $this->delete('/api/posts/' . $post->id,
            ['api_token' => $this->user->api_token]);

        $response->assertStatus(403);
    }

    private function data()
    {
        return [
            'date' => '06/13/2001',
            'subject' => 'Maths',
            'topic' => 'Algebra',
            'takeaway' => 'Worked on simultaneous equations. Very good work!',
            
            'api_token' => $this->user->api_token,
        ];
    }
    
}
