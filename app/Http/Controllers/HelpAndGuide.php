<?php

namespace App\Http\Controllers;

use App\Models\HelpGuide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpAndGuide extends Controller
{
    public function index(){
        $guide=HelpGuide::latest()->get();
        return view('help_guide',compact('guide'));
    }
    public function create(){
        return view('create_guide');
    }
    public function store(Request $request){
        $validate=$request->validate([
            'link'=>['required'],
            'description'=>['required']
        ]);

        if($validate){
            $guide=new HelpGuide();
            $guide->link=$request->link;
            $guide->description=$request->description;
            $guide->user_name=Auth::user()->name;
            $guide->date_created=Carbon::now();

            $guide->save();

            return redirect()->back()->with('message','New guide added!!!');
        }else{
            return redirect()->back()->with('message','Error in guide adding!!!');

        }
    }
}
