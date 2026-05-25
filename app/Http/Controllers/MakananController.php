<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index(?Request $request = null)
    {
        $makanans = Makanan::latest('id')->get();

        return view('makanan.index', compact('makanans'));
    }
}
