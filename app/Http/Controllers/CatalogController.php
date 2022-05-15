<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function allData(Request $req){
        return view('catalog', ['data' => Catalog::paginate(15)]);
    }
}
