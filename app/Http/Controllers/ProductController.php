<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    Public function index(){
        $products = Http::get('productheroku2096.herokuapp.com/api/products')->json();
        $results = $products['data']['products'];
        //dd($results);
        return view('welcome', ['results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $response = Http::asForm()->post('productheroku2096.herokuapp.com/api/products', [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'inStock' => $request->instock,
        ]);
        return $response->json();
    }


    public function show($id)
    {
        return view('welcomeUpdate', ['id' => $id]);
    }

    public function update(Request $request)
    {
        $response = Http::put('productheroku2096.herokuapp.com/api/products/'.$request->id, [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'inStock' => $request->instock,
        ]);
        return $response->json();
    }

    Public function delete($id){
            $data = Http::delete('productheroku2096.herokuapp.com/api/products/'.$id)->json();
            //
            $products = Http::get('productheroku2096.herokuapp.com/api/products')->json();
            $results = $products['data']['products'];
            return view('welcome', ['results' => $results]);
    }
}
