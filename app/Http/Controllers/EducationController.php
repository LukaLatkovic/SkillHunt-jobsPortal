<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\User;
class EducationController extends Controller
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


    public function storeEducation(Request $request) {

    	$this->validate($request, [
            'course' => 'required',
            'school' => 'required',
            'year' => 'required'
        ]);
        

        $id = Auth()->user()->id;
        $user = User::find($id);
    	$new_education = new Education();
    	$new_education->course = $request->course;
    	$new_education->school = $request->school;
    	$new_education->year = $request->year;    	
    	$new_education->achievement = $request->achievement;
    	$new_education->user_id = auth()->user()->id; 
        $new_education->save();
        return redirect()->route('profile', $user->name);
    }

    public function updateEducation(Request $request) {    	
        
        $userid = Auth()->user()->id;
        $user = User::find($userid);
     	$id = $request->id;
    	$education = Education::find($id);
    	$education->course = $request->course;
    	$education->school = $request->school;
    	$education->year = $request->year;    	
    	$education->achievement = $request->achievement;
        $education->save();
        return redirect()->route('profile', $user->name);
    }

    public function deleteEducation(Request $request) { 
        $userid = Auth()->user()->id;
        $user = User::find($userid);
    	$id = $request->id;
        Education::findOrFail($id)->delete(); 
        return redirect()->route('profile', $user->name);
    }
}
