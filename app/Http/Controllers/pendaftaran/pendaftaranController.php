<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class pendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Str::uuid() . date('d') . date('m') . date('y') . time();
        return view('vokasi', compact('pendaftaran'));
    }
}
