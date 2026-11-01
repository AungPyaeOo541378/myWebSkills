@extends('layout.master')

@section('title', 'Product Detail – ' . ($dataImg->product_name ?? 'Record'))

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header & Action Buttons -->
    <div class="flex flex-wrap items-center justify-between gap-3 bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
        <div class="flex items-center gap-3">
            <a href="{{ route('imgCRUD') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <h1 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-bag-shopping text-blue-600"></i> Product Details
            </h1>
        </div>

        <div class="flex items-center gap-2.5">
            {{-- Edit Button --}}
            <a href="{{route('imgEditPage',$dataImg->id)}}" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 active:scale-95 text-white font-semibold text-xs rounded-xl transition shadow-xs">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </a>

            {{-- Delete Button  --}}
            <a href="{{ route('imgDelete', $dataImg->id)}}"  class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 active:scale-95 text-white font-semibold text-xs rounded-xl transition shadow-xs cursor-pointer">
                <i class="fa-solid fa-trash"></i> Delete
            </a>
        </div>
    </div>

    {{-- Main Detail Card (2 Columns: Image Preview + Metadata) --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
            
            {{-- Left Column: Image Display (Col 5) --}}
            <div class="md:col-span-5 flex flex-col items-center">
                <div class="relative w-full rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 shadow-inner flex items-center justify-center p-3 group">
                    <img src="{{ asset('images/' . $dataImg->image) }}" alt="{{ $dataImg->product_name }}" class="w-full max-h-[380px] object-contain rounded-xl drop-shadow-sm group-hover:scale-[1.02] transition duration-200">
                </div>
            </div>

            {{-- Right Column: Information Details (Col 7) --}}
            <div class="md:col-span-7 space-y-4">
                
                {{-- Product Name Field --}}
                <div class="rounded-xl border border-slate-200 overflow-hidden">
                    <div class="bg-indigo-700 px-4 py-2 text-white font-semibold text-xs uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-tag"></i> Product Name
                    </div>
                    <div class="p-4 bg-slate-50 text-slate-800 font-bold text-lg">
                        {{ $dataImg->product_name }}
                    </div>
                </div>

                {{-- Category & Price --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    {{-- Category --}}
                    <div class="rounded-xl border border-slate-200 overflow-hidden">
                        <div class="bg-indigo-700 px-4 py-1.5 text-white font-semibold text-xs uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-layer-group"></i> Category
                        </div>
                        <div class="p-3 bg-slate-50 text-slate-800 font-semibold text-sm">
                            <span class="inline-block px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">
                                {{ $dataImg->category->category_name ?? 'General' }}
                            </span>
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="rounded-xl border border-slate-200 overflow-hidden">
                        <div class="bg-indigo-700 px-4 py-1.5 text-white font-semibold text-xs uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-dollar-sign"></i> Price
                        </div>
                        <div class="p-3 bg-slate-50 text-emerald-600 font-bold text-lg">
                            ${{ number_format($dataImg->price) }}
                        </div>
                    </div>
                </div>

                {{-- Description Field --}}
                <div class="rounded-xl border border-slate-200 overflow-hidden">
                    <div class="bg-indigo-700 px-4 py-2 text-white font-semibold text-xs uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-align-left"></i> Description
                    </div>
                    <div class="p-4 bg-slate-50 text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                        {{ $dataImg->description }}
                    </div>
                </div>


            </div>

        </div>
    </div>

</div>


@endsection