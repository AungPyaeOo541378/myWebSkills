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
            <h1 class="text-xl font-bold text-slate-800">📄 Text Details</h1>
        </div>

        <div class="flex items-center gap-3">
            {{-- Edit Button --}}
            <a href="{{ route('textEditPage', $data->id)}}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-medium text-sm rounded-xl transition shadow-sm">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </a>

            {{-- Delete Anchor Tag (Triggers Custom Modal Alert) --}}
            <a href="javascript:void(0)" onclick="openDeleteModal()" class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium text-sm rounded-xl transition shadow-sm cursor-pointer">
                <i class="fa-solid fa-trash"></i> Delete
            </a>
        </div>
    </div>

    {{-- Detail Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-5">
        
        {{-- Title Grid --}}
        <div class="grid grid-cols-5 gap-3 items-center">
            <div class="p-4 bg-indigo-800 text-white font-semibold text-base rounded-xl col-span-1 flex items-center gap-2">
                <i class="fa-solid fa-heading"></i> Title
            </div>
            <div class="p-4 bg-slate-100 text-slate-800 font-medium rounded-xl col-span-4 text-base">
                {{ $data->title }}
            </div>
        </div>

        {{-- Writer Grid --}}
        <div class="grid grid-cols-5 gap-3 items-center">
            <div class="p-4 bg-indigo-800 text-white font-semibold text-base rounded-xl col-span-1 flex items-center gap-2">
                <i class="fa-solid fa-user-pen"></i> Writer
            </div>
            <div class="p-4 bg-slate-100 text-slate-800 font-medium rounded-xl col-span-4 text-base">
                {{ $data->writer }}
            </div>
        </div>

        {{-- Description Grid --}}
        <div class="grid grid-cols-5 gap-3 items-start">
            <div class="p-4 bg-indigo-800 text-white font-semibold text-base rounded-xl col-span-1 flex items-center gap-2">
                <i class="fa-solid fa-align-left"></i> Description
            </div>
            <div class="p-4 bg-slate-100 text-slate-800 font-normal rounded-xl col-span-4 text-base whitespace-pre-line leading-relaxed">
                {{ $data->description }}
            </div>
        </div>

    </div>

</div>

{{-- Include Delete Modal Component --}}
@include('forTextCRUD.deleteText')

@endsection