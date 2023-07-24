<?php



function responseSuccess($data, ?string $message = "data loaded successfully", int $code = 200)
{
    return response()->json([
        'status' => true,
        'message' => $message,
        'data' => $data
    ], $code);
}

function responseError(mixed $message, ?int $code)
{
    return response()->json([
        'status' => false,
        'message' => $message,
    ], $code);
}


