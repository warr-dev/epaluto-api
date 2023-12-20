<?php

namespace App\Traits;

trait HttpResponseTrait
{
    public function success($data = null, $message = null)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message ?? 'Operation successful',
        ]);
    }

    public function error($message = null, $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }
}
