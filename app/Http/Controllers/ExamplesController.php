<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examples;

class ExamplesController extends Controller
{
    public function allData(Request $req){
        return view('examples', ['data' => Examples::paginate(15)]);
    }
}
