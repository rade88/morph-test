<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends ApiController
{
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function index(): JsonResponse
    {
		return $this->responseOk(Post::paginate(20), 200, 'ok');
    }

	/**
	 * @param CreatePostRequest $request
	 */
    public function store(CreatePostRequest $request): JsonResponse
    {
        return $this->responseCreated(Post::create($request->validated()));
    }

	/**
	 * @param Post $post
	 * @return JsonResponse
	 */
    public function show(Post $post): JsonResponse
    {
		return $this->responseOk($post->toArray());
    }

	/**
	 * @param UpdatePostRequest $request
	 * @param Post $post
	 * @return JsonResponse
	 * @throws \Exception
	 */
    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
		try {
			$post->update($request->validated());

			return $this->responseOk($post->toArray());
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage(), $e->getCode());
		}
    }

	/**
	 * @param DeletePostRequest $request
	 * @param Post $post
	 * @return JsonResponse
	 * @throws \Exception
	 */
    public function destroy(DeletePostRequest $request, Post $post): JsonResponse
    {
		try {
			$post->delete();
			return $this->responseOk([
				'message' => 'Post was deleted',
			]);
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
    }
}
