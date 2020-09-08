<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use App\JobCategory;
use App\Applicant;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function userList() {
    	$userlist = User::where(function ($query) {
                        $query->where('role', '1')
                              ->orWhere('role', '4');
               			 })
		    	->orderBy('created_at', 'asc')
		    	->paginate(10);
    	return view('admin.listusers', compact('userlist'));
	}

	public function deleteUser($id)
    {
       $user = User::findOrFail($id);    
	   $user->delete();
	   return redirect()->route('userlist');
    }


	public function clientList() {
    	$clientlist = User::where(function ($query) {
                        $query->where('role', '2')
                              ->orWhere('role', '4');
               			 })
		    	->orderBy('created_at', 'asc')
		    	->paginate(10);
    	return view('admin.clientlist', compact('clientlist'));
	}
	
	public function showJobs() {
    	$jobs = Job::orderBy('created_at', 'desc')
		    	->paginate(5);
    	return view('admin.joblist', compact('jobs'));
	}
	
	public function deleteJob($id)
    {
       $job = Job::findOrFail($id);    
	   $job->delete();
	   return redirect()->route('jobslist');
	}

	public function showCategories() {
		$categories = JobCategory::orderBy('created_at', 'asc')
		    	->paginate(5);
        return view('admin.listCategories',compact('categories'));
	}
	
	public function addCategory(){
		return view('admin.newCategory');
	}
	
	public function addCategories(Request $request) {
        $categories = new JobCategory;
        $categories->category_name = $request->input('newCategory');
        $categories->save();
        return redirect()->route('categoriesList');
	} 
	
	public function deleteCategory($id)
    {
       $category= JobCategory::findOrFail($id);    
	   $category->delete();
	   return redirect()->route('categoriesList');
	}

	public function statistic(){
		$users = User::where('role','1')->count();
		$clients = User::where('role','2')->count();
		$jobs = Job::all()->count();
		$categories = JobCategory::all()->count();
		$hired = Applicant::where('status','hired')->count();
		$messages = Message::all()->count();

		return view('admin.statistics',compact('users','clients', 'jobs', 'categories', 'hired', 'messages'));
	}
}
