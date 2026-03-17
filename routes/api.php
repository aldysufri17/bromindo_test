<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ktp;

Route::get('/ktp', function () {
    return response()->json([
        'status' => true,
        'data' => Ktp::paginate(10)
    ]);
});