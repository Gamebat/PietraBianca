<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class FeedbackController extends Controller
{
    public function upload(UploadRequest $req)
    {
        $user = $req -> input('name');

        // Преобразуем массив путей в строку
        $path=[];
        $string = '';

        foreach ($req->file('image') as $file){
            $file -> store('feedbackImages');
            array_push($path, $file);
        }

        foreach($path as $a)
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
            'path_image' => $solution
        ]);

        return('success');

        // $path = $req->file('image');
        // dd($req->files);
        // return view('feedback', compact('path'));
    }

    public function test(UploadRequest $req)
    {
        // $stroka='';
        // $collection = ['adsa','asd','qweq'];
        // foreach ($collection as $element){
        //     $stroka+=$element;
        // }
        
        // return ($stroka);

        // $string = '';

        // $collection = ['adsa','asd','qweq'];
        // foreach($collection as $a)
        // { 
        //     $string .= $a.';';
        // }

        // $solution = substr($string,0,-1);

        // $explode = explode(';', $solution);

        // array_push($collection, 'asdassad');
        // return($collection);

        // Преобразуем массив путей в строку
        $path=[];
        $string = '';

        foreach ($req->file('image') as $file){
            $file -> store('feedbackImages');
            array_push($path, $file);
        }

        foreach($path as $a)
        { 
            $string .= $a.';';
        }

        $solution = substr($string,0,-1);

        return('loh');
        
    }

}
