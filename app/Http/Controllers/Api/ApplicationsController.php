<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $data = [];

        return response()->json($data);
    }
}
