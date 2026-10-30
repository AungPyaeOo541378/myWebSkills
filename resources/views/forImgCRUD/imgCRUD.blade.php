@extends('layout.master')

@section('title', 'Image CRUD – Web Skills Lab')

@section('content')

{{-- Page Header --}}
<div class="mb-4">
    <h1 class="text-xl font-bold text-slate-800"><i class="fa-solid fa-image-portrait fa-lg" style="color: rgb(24, 72, 153);"></i>   Image CRUD</h1>
    <p class="text-xs text-slate-500 mt-0.5" >Create, read, update and delete image records.</p>
</div>

{{-- Success Alert Message Banner --}}
@if(session('success'))
<div class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-sm animate-in fade-in slide-in-from-top duration-300">
    <div class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-lg bg-emerald-500 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <h4 class="font-bold text-xs text-emerald-900">Success!</h4>
            <p class="text-[11px] text-emerald-700">{{ session('success') }}</p>
        </div>
    </div>
    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 text-sm font-bold p-1 transition cursor-pointer">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif


<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-15">

    {{-- ── left side:Creat image ── --}}
    <div class="lg:col-span-1">
        <div class="bg-white mt-3 rounded-2xl shadow-sm border border-slate-200 overflow-hidden min-h-[380px] flex flex-col justify-between">

            <div>
                {{-- Card Header --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-3 h-[45px] shrink-0 flex items-center justify-between">
                    <div>
                        <h2 class="text-white font-semibold text-xs uppercase tracking-wider" data-lang-key="add_new_record"><i class="fa-regular fa-plus fa-fade fa-lg" style="color: rgb(255, 255, 255);"></i>Add New Record</h2>
                    </div>
                </div>

                {{-- Card Body --}}
                <form action="{{ route('imgStore') }}" method="post" enctype="multipart/form-data" class="p-3.5 space-y-2.5">
                    @csrf
                    {{-- Centered Fixed-Size Image Preview Box --}}
                    <div class="flex flex-col items-center justify-center">
                        <div class="relative rounded-xl overflow-hidden border-2 border-dashed border-slate-300 bg-slate-50 shadow-inner flex items-center justify-center group-hover:border-blue-400 transition-all duration-200 shrink-0">
                            <img src="" alt="" id="imagePreview" width="200px" height="200px" class=" object-center block object-contain">
                        </div>
                    </div>

                    {{-- Image File Input --}}
                    <div>
                        <label for="image" class="block text-[10px] font-semibold text-slate-600 mb-0.5 uppercase tracking-wide">Image File</label>
                        <input type="file" name="image" id="image" accept="image/*" class="@error('image') border-2 border-red-400 bg-red-50 @enderror block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer transition border border-slate-200 rounded-xl p-1 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="previewImage(event)">
                        @error('image')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Title Input --}}
                    <div>
                        <label for="title" class="block text-[10px] font-semibold text-slate-600 mb-0.5 uppercase tracking-wide" data-lang-key="title_label">Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter title…" data-lang-placeholder="title_placeholder" value="{{ old('title') }}" class="@error('title') border-2 border-red-400 bg-red-50 @enderror w-full px-3 py-1.5 rounded-xl border border-slate-200 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        @error('title')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-1">
                        <input type="submit" value="Create" data-lang-key="create_btn" class="w-full bg-blue-600 hover:bg-blue-700 active:scale-95 text-white text-xs font-semibold py-2 rounded-xl transition-all duration-150 shadow-sm cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--right side card--}}
     <div class="lg:col-span-2 mt-3">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden  flex flex-col justify-between">

            {{-- Card Header (45px) --}}
            <div class="px-4 py-2.5 border-b border-slate-100 bg-slate-400 flex items-center justify-between shrink-0 h-[45px]">
                <div>
                    <h2 class="text-slate-900  font-semibold text-xs uppercase tracking-wider" data-lang-key="all_records">📋 All Records</h2>
                </div>
                <span class="bg-blue-50 text-blue-600 text-[11px] font-semibold px-2.5 py-0.5 rounded-full">
                    <span>{{ $dataImgCRUD->total() }}</span> <span data-lang-key="records_suffix">records</span>
                </span>
            </div>

            <!-- Loop All Card Body (Exact Fixed 250px Height) -->
            <div class="divide-y divide-slate-100  shrink-0 flex flex-row justify-start overflow-hidden">
                @if($dataImgCRUD->count() == 0)
                    <div class="flex flex-col items-center justify-center h-full text-center px-4">
                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-xl mb-1.5">
                            📭
                        </div>
                        <h3 class="text-slate-700 font-semibold text-xs" data-lang-key="no_records_title">No records yet</h3>
                        <p class="text-slate-400 text-[11px] mt-0.5" data-lang-key="no_records_desc">Add your first text record using the form on the left.</p>
                    </div>
                @else
                    @foreach ($dataImgCRUD as $item)
                      <div class="flex flex-row gap-2 p-3 h-60">
                           <div class=" rounded-lg bg-white p-4 shadow ">
    
                             <img src="{{asset('images/'. $item->image)}}" width="150px" height="200px" class=" rounded-lg">
                            
                             <div class="py-2 mt-4">
                                <span class="text-sm ">Title: <span class="text-sm text-slate-600">{{ $item->title }} </span> </span>
                             </div>
                             <div class="flex items-center gap-2">
                                    <a href="{{route('imgDetail', $item->id)}}" class="text-[11px] text-gray-600 hover:underline font-medium" data-lang-key="details">Details</a>
                                    <a href="" class="text-[11px] text-blue-600 hover:underline font-medium" data-lang-key="edit">Edit</a>
                                    <a href="{{route('imgDelete' , $item->id)}}"  class="text-[11px] text-red-600 hover:underline font-medium" data-lang-key="delete">Delete</a>
                                </div>

                               
                            </div>
                      </div>
                    @endforeach
                @endif

            </div>

                       {{-- Pagination Links Bar (Exact Fixed 45px Height at Bottom) --}}
            <div class="px-4 py-2.5 bg-slate-400 border-t border-slate-100 flex items-center justify-between shrink-0 h-[45px]">
                @if($dataImgCRUD->hasPages())
                    <div class="text-[11px] text-slate-500">
                        Page <span class="font-semibold text-slate-700">{{ $dataImgCRUD->currentPage() }}</span> of <span class="font-semibold text-slate-700">{{ $dataImgCRUD->lastPage() }}</span>
                    </div>

                    <div class="flex items-center gap-1.5">
                        {{-- Previous Page Link --}}
                        @if ($dataImgCRUD->onFirstPage())
                            <span class="px-2.5 py-1 text-[11px] font-medium text-slate-300 bg-slate-100 rounded-lg cursor-not-allowed">
                                <i class="fa-solid fa-chevron-left text-[9px]"></i> Prev
                            </span>
                        @else
                            <a href="{{ $dataImgCRUD->previousPageUrl() }}" class="px-2.5 py-1 text-[11px] font-medium text-slate-700 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg transition shadow-2xs">
                                <i class="fa-solid fa-chevron-left text-[9px]"></i> Prev
                            </a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($dataImgCRUD->hasMorePages())
                            <a href="{{ $dataImgCRUD->nextPageUrl() }}" class="px-2.5 py-1 text-[11px] font-medium text-slate-700 bg-white hover:bg-slate-100 border border-slate-200 rounded-lg transition shadow-2xs">
                                Next <i class="fa-solid fa-chevron-right text-[9px]"></i>
                            </a>
                        @else
                            <span class="px-2.5 py-1 text-[11px] font-medium text-slate-300 bg-slate-100 rounded-lg cursor-not-allowed">
                                Next <i class="fa-solid fa-chevron-right text-[9px]"></i>
                            </span>
                        @endif
                    </div>
                @else
                    <div class="text-[11px] text-slate-400">Page 1 of 1</div>
                @endif
            </div>

        </div>
    </div>

</div>


<!-- Soft Neutral Matte Gray Footer Card -->
<div class="mt-2 pt-3 border-t border-slate-200">
    <div class="bg-slate-100/80 rounded-xl p-4 border border-slate-200 text-xs text-slate-600 space-y-2.5">
       

        <p class="text-xs text-slate-600">
            This application is built with Laravel, Tailwind CSS, and Font Awesome, featuring the following core technical capabilities:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-700">
            <div class="p-2.5 bg-white rounded-lg border border-slate-200/60">
                <strong>Full CRUD Operations:</strong> Complete functionality to Create, Read, Update, and Delete image records smoothly.
            </div>
            <div class="p-2.5 bg-white rounded-lg border border-slate-200/60">
                <strong>Server-side Validation:</strong> Prevents empty database submissions with strict Laravel form validation rules.
            </div>
            <div class="p-2.5 bg-white rounded-lg border border-slate-200/60">
                <strong>Custom Pagination:</strong> Efficient data chunking displaying records neatly page-by-page.
            </div>
            <div class="p-2.5 bg-white rounded-lg border border-slate-200/60">
                <strong>Modern Responsive UI:</strong> Clean layout styled with Tailwind CSS, supporting dark/light contrasts and dynamic icons.
            </div>

            

        </div>
        <p class="text-xs text-slate-600 text-center">{{ date('Y') }} © All rights reserved. Design by Aung Pyae Oo.</p>
       </div>
</div>


{{-- Include Reusable Delete Modal --}}
@include('forTextCRUD.deleteText')

@endsection