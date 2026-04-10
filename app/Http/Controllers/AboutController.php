<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'name' => 'Galih', // Placeholder
            'nim' => '6701220000', // Placeholder
            'prodi' => 'D3 Sistem Informasi', // Placeholder
            'hobi' => 'Coding & Gaming', // Placeholder
        ]);
    }
}
