<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        dd('aa');
        $domain_id=1;

        if ($domain_id == 1){
            return redirect()->route('owner.dashboard');
        }
    }

    public function test()
    {
        return 'abc';
    }
}

