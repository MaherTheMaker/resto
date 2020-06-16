<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Session;
class RestoController extends Controller
{
    //

    function index()
    {
        return view('Restohome');
    }
    function list()
    {
        $data= Restaurant::all();
        return view('list',['data'=>$data]);
    }
    function add(Request $req)
    {
        // print_r($req->input());
        $resto=new Restaurant;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();

        $req->session()->flash('status','Restaurant entered Successfully');
        return redirect('list');
    }
    function delete( $id)
    {
       Restaurant::find($id)->delete();
       Session::flash('stat','Restaurant has been deleted Successfully');
       return redirect('list');
    }
    function edit( $id)
    {
      $data= Restaurant::find($id);
      if(!empty($data))
       return view('edit',['data'=>$data]);
       else
       return redirect('list');
    }
    function updateResto(Request $req,$id)
    {
        $resto=Restaurant::find($id);
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('stat','Restaurant edited Successfully');
        // return redirect('list');
    }

}
