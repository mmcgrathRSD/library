<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetsuiteEventController extends Controller
{
    public function index(Request $request){

        if($request->method() === 'POST'){
            $eventData = $request->all();
            $uuid = $request->input('request_id');

            return response()->json([
                'request_id' => $uuid,
                'data' => $eventData,
            ]);
        }
    }
}
