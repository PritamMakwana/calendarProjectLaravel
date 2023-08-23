<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Cal;

class CalendarController extends Controller
{

    public function dashboard()
    {
        $cal1 = Cal::where('month','=','01')->Where('year','=',date('Y'))->count();
        $cal2 = Cal::where('month','=','02')->where('year','=',date('Y'))->count();
        $cal3 = Cal::where('month','=','03')->where('year','=',date('Y'))->count();
        $cal4 = Cal::where('month','=','04')->where('year','=',date('Y'))->count();
        $cal5 = Cal::where('month','=','05')->where('year','=',date('Y'))->count();
        $cal6 = Cal::where('month','=','06')->where('year','=',date('Y'))->count();
        $cal7 = Cal::where('month','=','07')->where('year','=',date('Y'))->count();
        $cal8 = Cal::where('month','=','08')->where('year','=',date('Y'))->count();
        $cal9 = Cal::where('month','=','09')->where('year','=',date('Y'))->count();
        $cal10 = Cal::where('month','=','10')->where('year','=',date('Y'))->count();
        $cal11 = Cal::where('month','=','12')->where('year','=',date('Y'))->count();
        $cal12 = Cal::where('month','=','12')->where('year','=',date('Y'))->count();

        return view('index',compact('cal1','cal2','cal3','cal4','cal5','cal6','cal7','cal8','cal9','cal10','cal11','cal12'));

    }
    public function index()
    {
        $event = Event::all();
        $cal = Cal::all();
        return view('cal',compact('event','cal'));
    }

    public function calAdd(Request $request){
        // dateStr,2023-08-07,
        // $request->event
        $exploreDate = explode('-', $request->dateStr[1]);
        // $s = "year ".$exploreDate[0]."month ".$exploreDate[1]."date ".$exploreDate[2];

        $Cal = new Cal;
        $Cal->date = $exploreDate[2];
        $Cal->month = $exploreDate[1];
		$Cal->year = $exploreDate[0];
		$Cal->event = $request->event;
		$Cal->save();

        // return response(['success' =>  "Add Event"]);
        // return response()->json($company);
        return redirect('cal');

    }
}
