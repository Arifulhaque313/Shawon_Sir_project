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

    public function getDistrict(Request $request){
        $district = DB::table('central_npf_domains')->where('parent_id',$request->division_id)->pluck("domain_id","sitename_bn");
        return response()->json($district);
    }

    public function getUpazila(Request $request){
        $upazila = DB::table('central_npf_domains')->where('parent_id',$request->district_id)->pluck("domain_id","sitename_bn");
        return response()->json($upazila);
    }
    public function getUnion(Request $request){
        $upazila = DB::table('central_npf_domains')->where('parent_id',$request->upazila_id)->pluck("domain_id","sitename_bn");
        return response()->json($upazila);
    }

    public function traineeStore(Request $request){
        // dd($request->all());

         $validated = $request->validate([
          'email' => 'required|max:255',
          'name' => 'required',
          'gender' => 'required',
          'mobile'=> 'required|digits:11',
          'division'=>'required'

        ]);

         
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
            }   

        }
          
    }

      dd($training_time,$domain_id,$district,$upazila,$union);

    }
}

