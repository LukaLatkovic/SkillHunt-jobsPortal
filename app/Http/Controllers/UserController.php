<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\JobCategory;
use App\User;
use App\Profile;
use App\Skill;
use App\Education;
Use App\Work;
use Image;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    // Job list/ search job from index
    public function index(Request $request) {
        $categories = JobCategory::all();
        $cat = $request->input('cat');
        $search = $request->input('search');
        

        if($request->has('cat') && $cat != 'all') {
            if($request->has('search') && $search != null) {
                $jobs = Job::where('category_id', $cat)
                ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%'.$search.'%')
                              ->orWhere('body', 'like', '%'.$search.'%');
                })->orderBy('created_at', 'desc')
                ->paginate(5)
                ->appends([
                    'cat' => request('cat'),
                    'search' => request('search')
                ]);
            } else {
                $jobs = Job::where('category_id', $cat)
                ->orderBy('created_at', 'desc')
                ->paginate(5)
                ->appends([
                    'cat' => request('cat')
                ]);
            } 
        } else {
            $jobs = Job::where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
            ->orderby('created_at', 'desc')
            ->paginate(5)
            ->appends([
                'search' => request('search')
            ]);
        }
        
        
        return view('jobs', compact('categories', 'jobs', 'cat', 'search'));
    }

    //GET
    public function profile() {
        // if(Auth()->user()->role !== 3) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 
        $user_id = Auth()->user()->id;
        $user = User::find($user_id);
        $skills = Skill::orderBy('skill', 'asc')->get();     
        $profile = Profile::where('user_id', $user->id)->first();
        $educations = Education::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        $works = Work::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get(); 
        return view('user.profile', compact('user', 'profile', 'skills', 'educations', 'works'));
    }
    public function profileClient() {
        // if(Auth()->user()->role !== 3) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 
        $user_id = Auth()->user()->id;
        $user = User::find($user_id);
        $skills = Skill::orderBy('skill', 'asc')->get();     
        $profile = Profile::where('user_id', $user->id)->first();
        $educations = Education::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        $works = Work::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get(); 
        return view('user.profile', compact('user', 'profile', 'skills', 'educations', 'works'));
    }


    //GET   
    public function editProfile(){
        // if(Auth()->user()->role !== 1) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // }
        $user_id = Auth()->user()->id;
        $user = User::find($user_id);
        $profile = Profile::where('user_id', $user->id)->first();
       
        return view('user.editProfile', compact('user','profile'));


    }
    //POST
    public function storeProfile(Request $request) {
        // if(Auth()->user()->role !== 1) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 

        $username = Auth()->user()->name;
        $profile = new Profile;
        $profile->job_title = $request->title;
        $profile->overview = $request->overview;  
        $profile->city = $request->city;
        $profile->province = $request->province;
        $profile->country = $request->country;
        $profile->user_id = Auth()->user()->id;      
        
        $profile->save();
       
        return redirect()->route('profile', $username)->with('success','You have successfully added your info!');
    }

    public function messages()
    {
    return [
        
            'title.regex' => 'Invalid format ,You can only type letters in Title field!',
            'city.regex' => 'Invalid format ,You can only type letters in City field!',
            'province.regex' => 'Invalid format ,You can only type letters in Province field!',
            'country.required' => 'Invalid format ,You can only type letters in Country field!',
            
    ];
    }

    public function updateProfile(Request $request) {
        // if(Auth()->user()->role !== 1) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 

        $this->validate($request, [
            'title' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'city' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'province' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'country' => 'required|regex:/^[a-zA-Z]+$/u'
        ]);
        $username = Auth()->user()->name;
        $user_id = Auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)-> first();
        $profile->job_title = $request->title;
        $profile->overview = $request->overview;  
        $profile->city = $request->city;
        $profile->province = $request->province;
        $profile->country = $request->country;
        $profile->save();
        return redirect()->route('profile', $username)->with('success','You have successfully edited your info!');
    }

     public function uploadPhoto(Request $request) {
        // if(Auth()->user()->role !== 1) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 
        $this->validate($request, [
            'photo'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $id = Auth()->user()->id;
        $user = User::find($id);
        $username = Auth()->user()->name;
        $profile = Profile::where('user_id', $id)-> first();
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $path = public_path('storage/images/');
            $filename = time().'.'.$image->GetClientOriginalExtension();
            $location = $request->file('photo')->storeAs('public/images', $filename);
            $location = storage_path('public/images', $filename);
            $new=Image::make($image->getRealPath())->fit(128, 128);
            $new->save($path.$filename);

            $profile->photo = $filename;

            // $image = $request->file('photo');
            // $filename = time().'.'.$image->GetClientOriginalExtension();
            // $imageURL = request()->file('image')->store('public/images',$filename);
            // $item = Item::update($imageURL);
            // Image::make(storage_path('app/public/images' . $item->photo))
            // ->resize(300, 300)
            // ->save(storage_path('app/public/images' . $item->photo));

            // $image = $request->file('photo');
            // $type = pathinfo($image, PATHINFO_EXTENSION);
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $location = $request->file('photo')->storeAs('public/images', $filename);
            // $location = storage_path('public/images', $filename);
            // Image::make($image->getRealPath())->resize(128, 128)->save($type,$location);
           
            // $profile->photo = $filename;


            // $image = $request->file('photo');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $path = storage_path('public/images', $filename);
            // Image::make($image)->resize(300, 300)->save($path);
            // $profile->image = $filename;
            
            // $profile->update([
            //    'image' =>  request()->image->store('images','public')
            // ]);

           

        }
        
        $profile->save();
        return redirect()->route('profile',$username)->with('success','You have changed your profile photo!');
    }
     public function updatePhoto(Request $request) {
        // if(Auth()->user()->role !== 1) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 
        $id = Auth()->user()->id;
        $profile = Profile::where('user_id', $id)-> first();
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time().'.'.$image->GetClientOriginalExtension();
            $location = $request->file('photo')->storeAs('public/images', $filename);
            $location = storage_path('photo/', $filename);
            Image::make($image->getRealPath())->resize(128, 128)->save($type, $location);
            $profile->photo = $filename;
        }
        if($request->hasFile('photo')) {
            dd($profile->photo);
            // Storage::delete('public/photo/' . $profile->photo);
            // $profile->photo = $filename;
        }    
        $profile->save();
        return redirect('/');
    }

    public function myJobs() {
        // if(Auth()->user()->role !== 1) {
        //     return redirect('/')->with('error', 'Unauthorize Page');
        // } 
        $id = Auth()->user()->id;
        $user = User::find($id);
        $jobs = DB::table('applicants')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->when($id, function ($query) use ($id) {
                    return $query->where('applicants.user_id', $id);
                })
            ->orderBy('applicants.created_at', 'desc')
            ->get();
        return view('user.my-jobs')->withUser($user)->withJobs($jobs);
    }


    public function autocomplete(Request $request)
    {
        // $data = User::select('name')
        //         ->where('name','LIKE',"%{$request->input('query')}%")
        //         ->get();
        
        $user =$request->term;
        $items = User:: where('name', 'LIKE', '%'.$user.'%')->get();
        // return $item;
        if(count($items)== 0){
            $searchResult[]= 'No item found';
        }
        else{
            foreach($items as $item){
                $searchResult[] = array('label'=> $item->name, 'value' => $item->id);
            }
        }
        return $searchResult;
        // return response()->json($data);
    }
    
    public function clientJobProfiles($id)  {
        $user = User::find($id);        
        $skills = Skill::orderBy('skill', 'asc')->get();     
        $profile = Profile::where('user_id', $id)->first();
        $educations = Education::where('user_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        $works = Work::where('user_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();            
        return view('user.profile', compact('user', 'profile', 'skills', 'educations', 'works'));
    }

}
