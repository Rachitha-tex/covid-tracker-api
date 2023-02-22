<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use App\Models\NewCases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     
             $response=Covid::orderBy('date','desc')->paginate(15);
            $covidData=Http::get('https://hpb.health.gov.lk/api/get-current-statistical');

             return view('home',compact('response'),['newdata'=>$covidData->collect('data')]);
    }
    public function store(){

        $response=Http::get('https://hpb.health.gov.lk/api/get-current-statistical');

        $data=json_decode($response->collect('data.daily_pcr_testing_data'));

        foreach($data as $covid){
            $covid=(array)$covid;

            Covid::updateOrCreate([
                'date'=>$covid['date'],
                'pcr_count'=>$covid['pcr_count']
            ]);
        }


        dd('data stored');
    }

    public function edit($id){
        $resp=Covid::findOrFail($id);
        return view('edit',compact('resp'));
    }

    public function update(Request $request){
        $covid_id=$request->pcr_id;
        $request->validate([
            'date'=>['required'],
            'pcr_count'=>['required']
        ]);

        Covid::findOrFail($covid_id)->update([
            'date'=>$request->date,
            'pcr_count'=>$request->pcr_count
        ]);

        return redirect()->route('home')->with('message','Updated Successfull!!!');

    }

    public function destroy($id){
        $del=Covid::findOrFail($id);
        $del->delete();

        return redirect()->back()->with('message','Item Deleted ');
    }
}
