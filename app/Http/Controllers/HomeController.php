<?php

namespace App\Http\Controllers;

Use App\JobCategory;
use App\Job;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'jobs']]);
    }

    public function index()
    {
        $categories = JobCategory::all();

        $jobs = Job::orderBy('id', 'desc')->take(10)->get();

        $latest = Profile::with('user')->orderBy('id','desc')->take(15)->get();
        

        $companies = User::select(['*', DB::raw('count(jobs.id) as total')])
        ->leftJoin('jobs', 'users.id', '=', 'jobs.user_id')
        ->groupBy('users.id')
        ->orderBy('total', 'DESC')
        ->limit(5);

        $cat1= Job::where('category_id', '=', 1)->count();
        $cat2= Job::where('category_id', '=', 2)->count();
        $cat3= Job::where('category_id', '=', 3)->count();
        $cat4= Job::where('category_id', '=', 4)->count();
        $cat5= Job::where('category_id', '=', 5)->count();
        $cat6= Job::where('category_id', '=', 6)->count();
        // return dd($latest);
        return view('index',compact('cat1','cat2','cat3','cat4','cat5','cat6','categories','jobs','companies','latest'));
    }

    public function jobs()
    {
        return view('jobs');    
    }
}
