<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;

class WorkController extends Controller
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
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request) {

    	$this->validate($request, [
            'position' => 'required',
            'company' => 'required',
            'year' => 'required'
        ]);

        $id = Auth()->user()->id;
        $user = User::find($id);
    	$new_work = new Work();
    	$new_work->position = $request->position;
    	$new_work->company = $request->company;
    	$new_work->year = $request->year;    	
    	$new_work->description = $request->description;
    	$new_work->user_id = auth()->user()->id; 
        $new_work->save();
        return redirect()->route('profile', $user->name);
    }

    public function update(Request $request) {  
        $idu = Auth()->user()->id;
        $user = User::find($idu);  	
     	$id = $request->id;
    	$work = Work::find($id);
    	$work->position = $request->position;
    	$work->company = $request->company;
    	$work->year = $request->workyear;    	
    	$work->description = $request->description;
        $work->save();
        return redirect()->route('profile', $user->name);
    }

    public function destroy(Request $request) { 
        $userid = Auth()->user()->id;
        $user = User::find($userid);
    	$id = $request->id;
        Work::findOrFail($id)->delete(); 
        return redirect()->route('profile', $user->name);
    }
}
