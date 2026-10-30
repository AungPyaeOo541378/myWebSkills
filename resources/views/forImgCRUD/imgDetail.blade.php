@extends('layout.master')
@section('title','Image Detail')
@section('content')
<div class="w-full max-w-4xl mx-auto p-4">


    {{-- Header & Action Buttons --}}
    <div class="flex items-center justify-between bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
        <div class="flex items-center gap-3">
            <a href="{{ route('imgCRUD') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-300 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-xl transition">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <h1 class="text-xl font-bold text-slate-800">📄 Image Details</h1>
        </div>

        <div class="flex items-center gap-3">
            {{-- Edit Button --}}
            <a href="" class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-medium text-sm rounded-xl transition shadow-sm">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </a>

        </div>
    </div>

    <!-- Detail img-->
    
    <div class="flex flex-row gap-2 p-3 h-60">
       <div class=" rounded-lg bg-white p-4 shadow ">
    
        <img src="{{asset('images/'. $dataImg->image)}}" width="300px" height="300px" class=" rounded-lg">
                            
        <div class="py-2 mt-4">
            <span class="text-sm ">Title: <span class="text-lg font-bold text-slate-600">{{ $dataImg->title }} </span> </span>
        </div>

                               
    </div>
    </div>
    
</div>
@endsection