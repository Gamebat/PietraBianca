<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderApplication;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function allData(Request $req){

        $accept = DB::table('order_accepteds') -> get();
        $appli = DB::table('order_applications') -> get();
        $complete = DB::table('order_completeds') -> orderBy('id','desc') -> get();
        $refuse = DB::table('order_refuseds') -> get();
        return view('orders', compact('accept','appli','complete','refuse'));
    }

    public function orderAccept($id)
    {
        return view('order-accept', ['data' => DB::table('order_applications') -> find($id)]);
    }

    public function submitAccept($id, Request $req)
    {
        // $order = DB::table('order_applications')->find($id);
        DB::table('order_accepteds')->insert([
            // 'id' => $order->id+100,
            'name' => $req -> input('name'),
            'number' => $req -> input('number'),
            'comment' => $req -> input('comment'),
            'address' => $req -> input('address'),
            'material' => $req -> input('material'),
            'details' => $req -> input('details'),
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('order_applications')->where('id', '=', $id)->delete();
        return redirect()->route('user.orders')->with('succes', 'Заказ перемещен в принятые');
    }

    public function orderDecline($id)
    {
        $order = DB::table('order_applications')->find($id);
        DB::table('order_refuseds')->insert([
            // 'id' => $order->id+100,
            'name' => $order -> name,
            'number' => $order -> number,
            'comment' => $order -> comment,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('order_applications')->where('id', '=', $id)->delete();
        return redirect()->route('user.orders')->with('succes', 'Заказ перемещен в принятые');
    }

    public function orderComplete($id)
    {
        $order = DB::table('order_accepteds')->find($id);
        DB::table('order_completeds')->insert([
            // 'id' => $order->id+100,
            'name' => $order -> name,
            'number' => $order -> number,
            'comment' => $order -> comment,
            'address' => $order -> address,
            'material' => $order -> material,
            'details' => $order -> details,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);

        DB::table('order_accepteds')->where('id', '=', $id)->delete();
        return redirect()->route('user.orders')->with('succes', 'Заказ перемещен в завершенные');
    }
}

//return view('orders', compact(['data' => DB::table('users') -> get()]));