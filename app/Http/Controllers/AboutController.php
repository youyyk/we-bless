<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('about',[
            'name' => 'Your Name',
            'info' => [
                'address' => '<b>Kasetsart</b> University',
                'email' => 'contact@ku.th'
            ]
        ]);
    }
}
