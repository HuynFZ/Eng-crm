<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route mặc định của Laravel
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- ĐOẠN TEST KẾT NỐI ---
Route::get('/test-connection', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Backend Laravel 12 đã kết nối thành công!',
        'team' => ['Huy', 'Khang', 'Thái'],
        'server_time' => now()->toDateTimeString()
    ]);
});
