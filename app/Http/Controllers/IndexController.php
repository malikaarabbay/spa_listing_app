<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return inertia(
            'Index/Index', [
                'message' => 'Hello from index method'
        ]);
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
