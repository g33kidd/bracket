<?php

use App\Models\Post;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsControllerTest extends TestCase
{
    use DatabaseMigrations;

    const FACTORY_POSTS_TO_CREATE = 5;

    public function setUp()
    {
        parent::setUp();

        $this->posts = factory(
            Post::class, self::FACTORY_POSTS_TO_CREATE)->create();
    }

    public function testPostsControllerExtendsController()
    {
        $this->assertTrue(is_subclass_of(PostsController::class, Controller::class));
    }

    public function testPostsIndexReturnsAListOfPosts()
    {
        $this->get('/api/posts');

        $this->assertResponseOk();
		$this->seeJsonStructure([
            '*' => [
                'id', 'title', 'slug', 'content', 'excerpt', 'status',
                'user'
            ]
        ]);
	}

    public function testPostsShowReturnsASinglePost()
    {
        $this->get('/api/posts/1');

        $this->assertResponseOk();
		$this->seeJsonStructure([
            'id', 'title', 'slug', 'content', 'excerpt', 'status',
            'user'
		]);
	}

    public function testPostsShowReturns404IfRecordDoesntExist()
    {
        $this->get('/api/posts/99999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testPostsDestroyRemovesPostWithId()
    {
        $post = Post::find('1');

        // Assert that post exists before api call
        $this->assertTrue($post instanceof Post);

        // Call delete on the existing Post
        $this->delete('/api/posts/1');

        $post = Post::find('1');

        $this->assertResponseOk();
        $this->assertEquals($post, null);
    }

    public function testPostsDestroyReturns404IfRecordDoesntExist()
    {
        $this->delete('/api/posts/99999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testPostsStoreRequiresFields()
    {
        $this->actingAs($this->user)->post('/api/posts', []);

        $this->assertSessionHasErrors([
            'title', 'slug', 'content', 'status', 'excerpt'
        ]);
    }

    public function testPostsStoreAddsNewPost()
    {
        $this->actingAs($this->user)->post('/api/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Lorem ipsum sit dolor...',
            'status' => 'published',
            'excerpt' => 'Lorem...'
        ]);

        $this->assertResponseOk();
        $this->seeJsonStructure(['id']);

        $nextId = self::FACTORY_POSTS_TO_CREATE + 1;
        $post = Post::find($nextId);

        $this->assertTrue($post instanceof Post);
    }

    public function testPostsUpdateReturns404IfResourceDoesntExist()
    {
        $this->actingAs($this->user)->put('/api/posts/99999', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Lorem ipsum sit dolor...',
            'status' => 'published',
            'excerpt' => 'Lorem...'
        ]);

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testPostsUpdateAllowsUpdatesToAllFields()
    {
        $newTitle = 'This is an entirely new name.';
        $newSlug = 'this-is-the-new-slug';
        $newContent = 'Lorem ipsum...';
        $newStatus = 'draft';
        $newExcerpt = 'L...';

        $this->actingAs($this->user)->put('/api/posts/1', [
            'title' => $newTitle,
            'slug' => $newSlug,
            'content' => $newContent,
            'status' => $newStatus,
            'excerpt' => $newExcerpt
        ]);

        $post = Post::find(1);

        $this->assertTrue($post->title === $newTitle);
        $this->assertTrue($post->slug === $newSlug);
        $this->assertTrue($post->status === $newStatus);
        $this->assertTrue($post->excerpt === $newExcerpt);
        $this->assertTrue($post->content === $newContent);
    }

    public function testPostsUpdateRequiresFields()
    {
        $this->actingAs($this->user)->put('/api/posts/1', []);

        $this->assertSessionHasErrors([
            'title', 'slug', 'content', 'status', 'excerpt'
        ]);
    }

}