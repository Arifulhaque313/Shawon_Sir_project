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
<form action="{{route('users.count')}}" method="post" class="p-3">
    @csrf


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
             <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-6  district" style="display:none;">
        <label for="" class=""><span><b>জেলা / বিভাগীয় পর্যায়ের অফিস:</b></span> ‍<b class="text-danger fs-5">*</b></label>
            <select name="district" id="district" class="form-select @error('district') is-invalid @enderror" >
                <!-- <option value="">1</option> -->
            </select>
             @error('district')
             <div class="text-danger">{{ $message }}</div>
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


<div class="mt-4 mb-3 text-center">
    <button class="btn btn-primary" type="submit" >Submit</button>
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
                
                 $("#district").append('<option value="">জেলা / বিভাগীয় পর্যায়ের অফিস</option>');
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
         $("#upazila").append('<option value="">উপজেলা / জেলা পর্যায়ের অফিস: ‍</option>');
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
        $("#union").append('<option value="">উপজেলা পর্যায়ের অফিস:</option>');
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
</script>

         

@endsection
