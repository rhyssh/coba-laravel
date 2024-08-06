<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kaprodi;

class KaprodiController extends Controller
{
    public function index()
    {
        return view('kaprodi._dashboard');
    }

}
