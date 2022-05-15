<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function upload(Request $req)
    {
        $path = $req->file('image');
        return view('feedback', compact('path'));
    }
}
