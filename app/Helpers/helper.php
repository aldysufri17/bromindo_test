<?php

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function generateNik()
{
    return fake()->numerify('################');
}

function calculateAge($tanggalLahir)
{
    return Carbon::parse($tanggalLahir)->age;
}

function logActivity($activity, $data = null)
{
    ActivityLog::create([
        'user_id' => Auth::id(),
        'activity' => $activity,
        'data' => $data
    ]);
}

function compareItems($old, $new)
{
    $changes = [];
    foreach ($new as $key => $value) {
        if (isset($old[$key]) && $old[$key] != $value) {
            $changes[$key] = [
                'old' => $old[$key],
                'new' => $value
            ];
        }
    }

    return $changes;
}


if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return Auth::user()->role == 'admin';
    }
}