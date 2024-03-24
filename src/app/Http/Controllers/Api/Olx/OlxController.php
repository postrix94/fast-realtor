<?php

namespace App\Http\Controllers\Api\Olx;

use App\Http\Controllers\Controller;
use App\Validators\Olx\ValidationOlxLink;
use Illuminate\Http\Request;

class OlxController extends Controller
{
    public function store(Request $request) {

        try {
            $olx = new ValidationOlxLink($request->get('olx'));

            dd($olx->link);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
