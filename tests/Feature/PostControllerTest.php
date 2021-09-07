<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
	/**
	 * @var Post
	 */
	protected $postModel;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->json('GET', '/post');

        $response->assertStatus(200);
    }

    protected function createPost(): Post
	{
		$this->postModel = Post::create([
			'title' => 'Some title',
			'description' => 'Some description',
			'image_url' => 'https://some-image-url.jpg'
		]);

		return $this->postModel;
	}

    public function test_show()
	{
		$this->createPost();

		$response = $this->json('GET', '/post/'.$this->postModel->id);

		$response->assertStatus(200);
	}

	public function test_update()
	{
		$response = $this->json('PATCH', '/post/'.$this->postModel->id);

		$response->assertStatus(200);
	}

	public function test_destroy()
	{
		$response = $this->json('DELETE', '/post/'.$this->postModel->id);

		$response->assertStatus(200);
	}
}
