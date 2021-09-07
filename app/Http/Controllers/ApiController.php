<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
	/**
	 * @param array $data
	 * @param int $code
	 * @param string $status
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function responseOk(array $data, $code = 200, $status = 'ok')
	{
		return $this->makeJsonResponse($data, $code, $status);
	}

	/**
	 * @param array $data
	 * @param int $code
	 * @param string $status
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function responseCreated(array $data, $code = 201, $status = 'ok')
	{
		return $this->makeJsonResponse($data, $code, $status);
	}

	/**
	 * @param array $data
	 * @param int $code
	 * @param string $status
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function errorResponse(array $data, $code = 500, $status = 'error')
	{
		return $this->makeJsonResponse($data, $code, $status);
	}

	/**
	 * @param array $data
	 * @param int $code
	 * @param string $status
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function customResponse(array $data, $code = 201, $status = 'error')
	{
		return $this->makeJsonResponse($data, $code, $status);
	}

	/**
	 * Calls Error function with status code depending of error which was caused
	 *
	 * @param \Exception $e
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function systemError(\Exception $e)
	{
		$message = $e->getMessage();
		$type = last(explode('\\', get_class($e)));
		return $this->errorResponse(['type' => $type, 'message' => $message]);
	}

	/**
	 * @param array $data
	 * @param int $code
	 * @param string $status
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function makeJsonResponse($data = [], $code = 200, $status = 'ok')
	{
		return response()->json([
			'status' => $status,
			'data' => $data,
			'code' => $code,
			'meta' => $this->transformer->meta ?? [],
		], $code, []);
	}
}
