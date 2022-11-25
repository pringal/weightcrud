<?php

namespace Pringal\Weightcrud\Controllers;

use Illuminate\Routing\Controller;
use Pringal\Weightcrud\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    function store(Request $request){
        $input = $request->all();
        Weight::create($input);
        return response(['status'=>'success'],200);
    }

    function datalist(){
        $weight = Weight::all()->toArray();
        return response()->json(['success'=>'true','data' => $weight]);
    }

    function test(){
        dd('aasas');
    }
}
