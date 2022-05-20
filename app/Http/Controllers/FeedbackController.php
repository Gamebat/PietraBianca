<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Reviews;

class FeedbackController extends Controller
{

    public function allData(UploadRequest $req){
        return view('feedback', ['data' => Reviews::orderBy('id','desc')->paginate(5)]);

    }

    public function upload(UploadRequest $req)
    {
        $user = $req -> input('name');

        // Преобразуем массив путей в строку
        $allpath=[];
        $string = '';

        foreach ($req->file('image') as $file){
            $path = $file -> store('feedbackImages', 'public');
            array_push($allpath, $path);
        }

        foreach($allpath as $a)
        { 
            $string .= $a.';';
        }

        $solution = substr($string,0,-1);

        // $image = $req -> file('image');
        // $path = $image -> store('feedbackImages');

        $rating = $req -> input('stars');

        $comment = $req -> input('comment');

        DB::table('reviews')->insert([
            'user' => $user,
            'rating' => $rating,
            'comment' => $comment,
            'path_image' => $solution,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        return view('feedback', ['data' => Reviews::orderBy('id','desc')->paginate(5)]);

        // $path = $req->file('image');
        // dd($req->files);
        // return view('feedback', compact('path'));
    }

    public function test(UploadRequest $req)
    {
        $string = '';

        $collection = ['adsa','asd','qweq'];
        foreach($collection as $a)
        { 
            $string .= $a.';';
        }

        $solution = substr($string,0,-1);

        $explode = explode(';', $solution);

        return($explode);
    }

}
