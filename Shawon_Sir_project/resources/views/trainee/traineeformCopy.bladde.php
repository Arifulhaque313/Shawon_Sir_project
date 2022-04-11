@extends('layouts.main')


@section('content')
<div class="ctr">



<div class="form-head  bg-success">
    <div class="row px-3 py-2">
        <div class="col-12 col-md-6 col-lg 6 text-start">
            <h6 class="text-white">ফরম টাইটেল</h6>
        </div>
        <div class="col-12 col-md-6 col-lg 6 text-end">
            <button class="btn btn-primary">click here</button>
        </div>
    </div>
</div>


<!-- form start  -->
<form action="{{route('trainee.store')}}" method="post" class="p-3">
    @csrf

<center><h6> <b>রেজিট্রেশন নির্দেশনাঃ </b> প্রত্যেক প্রশিক্ষণার্থীকে তার নিজ কার্যালয়ের অফিস / ইউনিয়ন সিলেক্ট করে রেজিস্ট্রেশন করতে হবে। <span><a href="#">বিস্তারিত</a></span> </h6></center>

<div class="my-3">
    <div class="row ">
        <div class="col-12 col-md-6 col-lg-6">
            <label for="" class=""><span><b>বিভাগ :</b></span> ‍<b class="text-danger fs-5">*</b></label>
            <select name="division" id="division" class="form-select select-h @error('division') is-invalid @enderror" value="{{ old('division') }}"> 
            <option   value="">--বিভাগ--</option>
            @foreach($division_id as $div_id)

            <option value="{{ $div_id->domain_id }}">{{ $div_id->sitename_bn }}</option>

            @endforeach
               
            </select>
        @error('division')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-6  district" style="display:none;">
        <label for="" class=""><span><b>জেলা / বিভাগীয় পর্যায়ের অফিস:</b></span> ‍<b class="text-danger fs-5">*</b></label>
            <select name="district" id="district" class="form-select @error('district') is-invalid @enderror" >
                <!-- <option value="">1</option> -->
            </select>
             @error('district')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


<div class="my-3">
    <div class="row ">
        <div class="col-12 col-md-6 col-lg-6 upazila" style="display:none;">
            <label for="" class=""><span><b>উপজেলা / জেলা পর্যায়ের অফিস:</b></span> ‍<b class="text-danger fs-5">*</b></label>
            <select name="upazila" id="upazila" class="form-select">
                <!-- <option value="">1</option> -->
            </select>
        </div>


        <div class="col-12 col-md-6 col-lg-6 union" style="display:none;">
            <label for="" class=""><span><b>উপজেলা পর্যায়ের অফিস:</b></span> ‍<b class="text-danger fs-5">*</b></label>
            <select name="union" id="union" class="form-select">
                <!-- <option value="">1</option> -->
            </select>
        </div>
        
    </div>
</div>


<div class="my-3">
    <div class="row ">

        <div class="col-12 col-md-3 lg-md-3">
        <label for="" class=""><span><b>নাম:</b></span> ‍<b class="text-danger fs-5">*</b></label>
        <input type="text" name = "name" class="form-control @error('email') is-invalid @enderror" value="{{ old('name') }}" placeholder = "আপনার নাম লিখুন" >
        @error('name')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="col-12 col-md-2 lg-md-2 ">
        <label for="" class=""><span><b>পদবি:</b></span> ‍<b class="text-danger fs-5">*</b></label>
        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder ="সহকারি প্রোগ্রামার" value="{{ old('designation') }}" >
        @error('designation')
             <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>

        <div class="col-12 col-md-2 lg-md-2">
        <label for="" class=""><span><b>জেন্ডার:</b></span> ‍<b class="text-danger fs-5">*</b></label>
        <select name="gender" id="" class="form-select @error('gender') is-invalid @enderror" >
            <option selected disabled value="">লিঙ্গ</option>
            <option value="male">পুরুষ</option>
            <option value="female">মহিলা</option>
            
        </select>
        @error('gender')
             <div class="alert alert-danger">{{ $message }}</div>
         @enderror

        </div>

        <div class="col-12 col-md-2 lg-md-2">
        <label for="" class=""><span><b>মোবাইল নম্বর:</b></span> ‍<b class="text-danger fs-5">*</b></label>
        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="017********">
         @error('mobile')
             <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>

        <div class="col-12 col-md-3 lg-md-3">
        <label for="" class=""><span><b>ইমেইল:</b></span> ‍<b class="text-danger fs-5">*</b></label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder = "rohim111@gmail.com" >
        @error('email')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        
        
    </div>
</div>


<div class="mb-3">

        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">

               <label for="" class=""><span><b>আপনি কি পূর্বে প্রশিক্ষণটি নিয়েছেন:</b></span> ‍<b class="text-danger fs-5">*</b></label>
               <select name="training" id="training" class="form-select" >
                   <option selected disabled value="">--Select--</option>
                   <option value="yes">Yes</option>
                   <option value="no">No</option>
               </select>

            </div>
            <div class="col-12 col-md-2 col-lg-2 hidden" id="time">

               <label for="" class=""><span><b>কত বার:</b></span> ‍<b class="text-danger fs-5">*</b></label>
               <input type="text" name = "training_time" class="form-control" >

            </div>
        </div>


</div>


<div class="mt-4 mb-3 text-center">
    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
</div>

</form>

</div>
 



@yield('script')
<script type=text/javascript>
        $('#division').change(function(){
            $(".district").show();
        var divisionID = $(this).val();  
        if(divisionID){
            $.ajax({
            type:"GET",
            url:"{{url('getDistrict')}}?division_id="+divisionID,
            success:function(res){        
            if(res){
                $("#district").empty();
                $("#upazila").empty();
               
                $("#union").empty();
                
                // $("#district").append('<option>জেলা / বিভাগীয় পর্যায়ের অফিস</option>');
                $.each(res,function(key,value){
                $("#district").append('<option value="'+value+'">'+key+'</option>');
                });
            
            }else{
                $("#district").empty();
            }
            }
            });
        }else{
            $("#district").empty();
            $("#upazila").empty();
        }   
        });

        
        $('#district').on('change',function(){
            $(".upazila").show();
        var districtID = $(this).val();  
        if(districtID){
            $.ajax({
            type:"GET",
            url:"{{url('getUpazila')}}?district_id="+districtID,
            success:function(res){        
            if(res){
                $("#upazila").empty();
                $("#union").empty();
        // $("#upazila").append('<option>উপজেলা / জেলা পর্যায়ের অফিস: ‍</option>');
                $.each(res,function(key,value){
                $("#upazila").append('<option value="'+value+'">'+key+'</option>');
                });
            
            }else{
                $("#upazila").empty();
            }
            }
            });
        }else{
            $("#upazila").empty();
        }
            
        });

        $('#upazila').on('change',function(){
            $(".union").show();
        var upazilaID = $(this).val();  
        if(upazilaID){
            $.ajax({
            type:"GET",
            url:"{{url('getUnion')}}?upazila_id="+upazilaID,
            success:function(res){        
            if(res){
                $("#union").empty();
        $("#union").append('<option>উপজেলা পর্যায়ের অফিস:</option>');
                $.each(res,function(key,value){
                $("#union").append('<option value="'+value+'">'+key+'</option>');
                });
            
            }else{
                $("#union").empty();
            }
            }
            });
        }else{
            $("#union").empty();
        }
            
        });


        $('#training').change(function () {
        var responseID = $(this).val();

        if (responseID == "yes") {
        $('#time').removeClass("hidden");
        $('#time').addClass("show");

        }
        else {
        $('#time').addClass("hidden");
        $('#time').removeClass("show");
        }
        console.log(responseID);

        });

</script>

         

@endsection
