@extends('layout.master')

@section('title', 'Text Detail – Web Skills Lab')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Header & Action Buttons --}}
    <div class="flex items-center justify-between bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
        <div class="flex items-center gap-3">
            <a href="{{ route('textCRUD') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-300 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-xl transition">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <h1 class="text-xl font-bold text-slate-800">📄 Text Edit</h1>
        </div>

       
    </div>

    {{-- Detail Card --}}
   <form action="{{route('update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $dataID->id }}">
     <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-5">
        
        {{-- Title Grid --}}
        <div class="grid grid-cols-5 gap-3 items-center">
            <div class="p-4 bg-indigo-800 text-white font-semibold text-base rounded-xl col-span-1 flex items-center gap-2"><i class="fa-solid fa-heading"></i> Title</div>
            <input type="text" name="title" class="p-4 bg-slate-100 text-slate-800 font-medium rounded-xl col-span-4 text-base" value="{{old('title',$dataID->title) }}">
        </div>

        {{-- Writer Grid --}}
        <div class="grid grid-cols-5 gap-3 items-center">
            <div class="p-4 bg-indigo-800 text-white font-semibold text-base rounded-xl col-span-1 flex items-center gap-2"><i class="fa-solid fa-user-pen"></i> Writer
            </div>
            <input type="text" name="writer" class="p-4 bg-slate-100 text-slate-800 font-medium rounded-xl col-span-4 text-base" value="{{ $dataID->writer }}">
        </div>

        {{-- Description Grid --}}
        <div class="grid grid-cols-5 gap-3 items-start">
            <div class="p-4 bg-indigo-800 text-white font-semibold text-base rounded-xl col-span-1 flex items-center gap-2"><i class="fa-solid fa-align-left"></i> Description</div>
            <textarea name="description" id="" cols="30" class="p-4 bg-slate-100 text-slate-800 font-normal rounded-xl col-span-4 text-base whitespace-pre-line leading-relaxed" rows="10">{{ old('description',$dataID->description) }}</textarea>
        </div>

        <div class="flex items-end justify-end">
            <input type="submit" class="cursor-pointer inline-flex items-end gap-2 px-4 py-2.5 bg-indigo-500 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl transition" value="Update">
        </div>

    </div>
   </form>

</div>

{{-- Include Delete Modal Component --}}
@include('forTextCRUD.deleteText')

@endsection