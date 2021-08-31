<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        return "Hello Laravel";
    }
    public function array(): array
    {
        return [
            'key'=> 'value',
            'message' => 'Hello Laravel',
            'success' => true,
            'error' => false,
        ];
    }
    public function posts($id=null){
        if ($id === null)
            return view('posts.index');
        return "Post ID: " .$id;
    }
    public function about(){
        return view('about',[
            'name' => 'Your Name',
            'info' => [
                'address' => '<b>Kasetsart</b> University',
                'email' => 'contact@ku.th'
            ]
        ]);
    }
}
