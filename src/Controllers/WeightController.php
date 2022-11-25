<?php

namespace Pringal\Weightcrud\Controllers;

use Illuminate\Routing\Controller;
use Pringal\Weightcrud\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    function store(Request $request){
        $input = $request->all();
        
        if(isset($input['id']) && (int)@$input['id'] > 0){
            //dd($input['id']);
            $weight = Weight::find($input['id']);
            $id = $input['id'];
            unset($input['id']);
            $affectedRows = Weight::where("id", $id)->update($input);
        }else{
            Weight::create($input);
        }

        return response(['status'=>'success'],200);
    }

    function datalist(){
        $weight = Weight::all()->toArray();
        return response()->json(['success'=>'true','data' => $weight]);
    }

    function getdata($id){
        $weight = Weight::find($id);
        return response()->json(['success'=>'true','data' => $weight]);
    }

    function deletedata($id){
        Weight::find($id)->delete();
        return response()->json(['success'=>'true','data' => []]);
    }
    

    function test(){
        dd('aasas');
    }
}
