<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(){
    $division_id = DB::table('central_npf_domains')->where('domain_type_id',4)->get();
    // dd($division_id);
    return view('trainee.traineeForm',compact('division_id'));
    }


    // dependent drop down ajax response start ---- 
    public function getDistrict(Request $request){
        $district = DB::table('central_npf_domains')->where('parent_id',$request->division_id)->pluck("domain_id","sitename_bn");
        return response()->json($district);
    }

    public function getUpazila(Request $request){
        $upazila = DB::table('central_npf_domains')->where('parent_id',$request->district_id)->pluck("domain_id","sitename_bn");
        return response()->json($upazila);
    }
    public function getUnion(Request $request){
        $union = DB::table('central_npf_domains')->where('parent_id',$request->upazila_id)->pluck("domain_id","sitename_bn");
        return response()->json($union);
    }
    // dependent drop down ajax response end ---- 



    public function traineeStore(Request $request){

         $validated = $request->validate([
          'email' => 'required|unique:users,email|max:255',
          'name' => 'required',
          'gender' => 'required',
          'mobile'=> 'required|digits:11',
          'division'=>'required',
          'designation'=>'required',
        //   'training_time'=>'required',
          'training'=>'required',
          
         ],
        [ 'name.required' => 'অত্যাবশ্যকীয়',
        'gender.required' => 'অত্যাবশ্যকীয়',
        'email.required' => 'সঠিক ইমেইল দিন',
        'email.unique' => 'এই ইমেইলটি নেওয়া হয়েছে',
        'mobile.required' => 'অত্যাবশ্যকীয়',
        'mobile.digits' => '১১ টি ডিজিট দিন',
        'division.required' => 'অত্যাবশ্যকীয়',
        // 'training_time.required' => 'অত্যাবশ্যকীয়',
        'training.required' => 'অত্যাবশ্যকীয়',
        'gender.required' => 'অত্যাবশ্যকীয়',
        'designation.required' => 'অত্যাবশ্যকীয়',

    ]);
        // get the value from the request for condition 
         $training = $request->training;
          $division = $request->division;
           $district = $request->district;
            $upazila = $request->upazila;
            $union = $request->union;

            

        
    if($training == "yes"){
        $training_time = $request->training_time;
    }
    else{
        $training_time = 0;
    }

     

  

    // __filtering data if there are no value in Upazila level__

    if(!empty($division)){

        if(!empty($district)){

            $domain_id = $district;
            if(!empty($upazila)){
                $domain_id = $upazila;
                if(!empty($union)){
                    $domain_id = $union;
                }
                else
                {
                    $domain_id = $upazila;
                }
            }
            else
            {
                $domain_id = $district;
                $upazila = null; 
            }   

        }
          
    }
    User::insert([
            'domain_id'=>$domain_id,
            'name'=>$request->name,
            'designation'=>$request->designation,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'traning_time'=>$training_time,
            'division_id'=>$division,
            'district_id'=>$district,
            'upazila_id'=>$upazila 
        ]);
        return redirect('/dashboard');
    }




    // dashboard index view file 
    public function view(){
        $trainee = DB::table('users')
            ->join('central_npf_domains', 'users.domain_id', '=', 'central_npf_domains.domain_id')
            ->select('users.*', 'central_npf_domains.*')
            ->orderby('users.created_at', 'desc')->paginate(10);

        $total_trainee_count = DB::table('users')->count();

        $rangpur_count = User::where('division_id','40069')->count();
        $shylet_count = User::where('division_id','20067')->count();
        $barisal_count = User::where('division_id','30066')->count();
        $dhaka_count = User::where('division_id','90068')->count();
        $chittagong_count = User::where('division_id','70036')->count();
        $rajshahi_count = User::where('division_id','50060')->count();
        $mymonshingh_count = User::where('division_id','90438')->count();
        $khulna_count = User::where('division_id','60065')->count();

        $division_id = DB::table('central_npf_domains')->where('domain_type_id',4)->get();
    // dd($division_id);
    

      
       return view('dashboard.index',compact('division_id','total_trainee_count','trainee','rangpur_count','shylet_count','barisal_count','dhaka_count','chittagong_count','rajshahi_count','mymonshingh_count','khulna_count'));

    }

    public function countfilter(){
        $division_id = DB::table('central_npf_domains')->where('domain_type_id',4)->get();
        return view('dashboard.countfilter',compact('division_id'));
    }

    public function userscount(Request $request){
        // dd($request->all());
        $division = $request->division;
        $district = $request->district;
        $upazila = $request->upazila;
        $union = $request->union;
        // dd($request->all());

        if(empty($upazila)){
            $upazila = 0;
        }

        if(empty($union)){
            $union = 0;
        }

        // dd($division,$district,$upazila,$union);

        // else if(!empty($division) && !empty($district)){
        //     $query = User::where('division_id',$division)->where('district_id',$district)->get();
        //      $query_count = User::where('division_id',$division)->where('district_id',$district)->count();
        //      return view('dashboard.countview',compact('query','query_count'));
        // }


          if(!empty($division) && !empty($district) && !empty($upazila) && !empty($union)){
                $query = User::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upazila)->where('domain_id',$union)->get();
                $query_count = User::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upazila)->where('domain_id',$union)->count();
             return view('dashboard.countview',compact('query','query_count'));
             // dd($query_count);
        }


        else if(!empty($division) && !empty($district) && !empty($upazila)){
           $query = User::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upazila)->get();
           $query_count = User::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upazila)->count();
             return view('dashboard.countview',compact('query','query_count'));
             // dd($query_count);
        }


        else if(!empty($division) && !empty($district)){
           $query = User::where('division_id',$division)->where('district_id',$district)->get();
             $query_count = User::where('division_id',$division)->where('district_id',$district)->count();
             return view('dashboard.countview',compact('query','query_count'));
            // dd($query_count);
        }

           else if(!empty($division)){
            $query = User::where('division_id',$division)->get();
             $query_count = User::where('division_id',$division)->count();
               return view('dashboard.countview',compact('query','query_count'));
            //dd($query_count);
            // dd($query);
            
            

        }


    }
}
