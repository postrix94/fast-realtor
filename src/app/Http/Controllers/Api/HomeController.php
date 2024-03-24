<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $frontendData = [
            "routes" => [
                'olx_parser' => route('olx_parser'),
            ],
        ];
        return response()->json($frontendData);
    }
}
