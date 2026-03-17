<?php

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


if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return Auth::user()->role == 'admin';
    }
}