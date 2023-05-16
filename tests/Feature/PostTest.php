<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\BlogPost;
use App\Models\Comment;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $connection = 'sqlite';

    public function test_no_blog_post()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No posts');
    }

    public function test_see_1_blog_post_if_exist()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = 'New title';
        $post->content = 'Content for the new blogpost';
        $post->save();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('New title');
        $response->assertSeeText('No Comments Yet');
        $this->assertDatabaseHas('blog_posts',[
            'title'=>'New title'
        ]);
    }

    public function test_store_valid()
    {
        $params = [
            'title' => 'Valid Test',
            'content' => 'At least 10 characters'
        ];

        $this->post('/posts', $params)
             ->assertStatus(302)
             ->assertSessionHas('status');
        
        $this->assertEquals(session('status'),'The blog post was created!');
    }

    public function test_store_fail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->post('/posts', $params)
             ->assertStatus(302)
             ->assertSessionHas('errors');
        
        $messages = session('errors')->getMessages();
        // dd($messages->getMessages());

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
        
    }

    public function test_update_valid()
    {
        $post = $this->create_dummy_blog_post();

        // dd($post->toArray());

        $this->assertDatabaseHas('blog_posts',$post->toArray());

        $params = [
            'title' => 'New Title3',
            'content' => 'Content for the new blogpost2 coz im lazy'
        ];

        $this->put("/posts/{$post->id}",$params)
            ->assertStatus(302)
            ->assertSessionHas('status');
        
        $this->assertEquals(session('status'),'Blog post was updated!');
        $this->assertDatabaseMissing('blog_posts',$post->toArray());
        $this->assertDatabaseHas('blog_posts',$params);
    }

    public function test_delete()
    {
        $post = $this->create_dummy_blog_post();
        $this->assertDatabaseHas('blog_posts',$post->toArray());

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'),'Blog post was deleted!');
        $this->assertDatabaseMissing('blog_posts',$post->toArray());
    }

    public function test_see_1_blog_post_with_comments()
    {
        $post = $this->create_dummy_blog_post();
        $comment = new Comment;
        $comment->factory(4)->create([
            'blog_post_id' => $post->id
        ]);

        $response = $this->get('/posts');
        // dd($response);

        $response->assertSeeText('Number of comments: 4');
    }

    public function create_dummy_blog_post(): BlogPost
    {
        // Arrange
        // $bp = new BlogPost;
        // $bp->title = 'New title2';
        // $bp->content = 'Content for the new blogpost2';
        // $bp->save();
        $bp = BlogPost::factory()->defaults()->create();

        return $bp;
    }

}
