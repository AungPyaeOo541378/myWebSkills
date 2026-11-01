@extends('layout.master')
@section('title')
Search & Filter
@endsection
@section('content')


<div class="grid lg:grid-cols-3 grid-cols-1 gap-4 mb-4">
    {{-- Left Side: Records List Card (Col-span-2 - ဘယ်ဘက် ကြီးတဲ့အပိုင်း) --}}
<div class="lg:col-span-2">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden h-[340px] flex flex-col">

        {{-- Card Header (45px) --}}
        <div class="px-4 py-2.5 border-b border-slate-300 bg-slate-50 flex items-center justify-between shrink-0 h-[45px]">
            <div>
                <h2 class="text-slate-800 font-semibold text-xs uppercase tracking-wider">📋 All Records</h2>
            </div>
            <span class="bg-blue-50 text-blue-600 text-[11px] font-semibold px-2.5 py-0.5 rounded-full">
                <span>0</span> <span>records</span>
            </span>
        </div>

        <!-- Loop All Card Body (Fixed 250px Height) -->
        <div class="divide-y divide-slate-100 h-[250px] overflow-y-auto flex flex-col justify-start">
            <!-- Records items will go here -->
        </div>

        {{-- Pagination Links Bar (Fixed 45px Height at Bottom) --}}
        <div class="px-4 py-2.5 bg-slate-50 border-t border-slate-100 flex items-center justify-between shrink-0 h-[45px]">
            <div class="text-[11px] text-slate-500">Page 1 of 1</div>
        </div>

    </div>
</div>

{{-- Right Side: Search and Filter Card (Col-span-1 - ညာဘက် သေးတဲ့အပိုင်း) --}}
<div class="lg:col-span-1">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden h-[180px] flex flex-col">

        {{-- Card Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-3 h-[45px] shrink-0 flex items-center justify-between">
            <h2 class="text-white font-semibold text-xs uppercase tracking-wider">🔍 Search Product</h2>
        </div>
        
        {{-- Search Form Body --}}
        <div class="p-4 grid grid-cols-1 gap-3">
            <div class="col-span-1">
                <form action="" method="GET">
                <div class="relative">
                    <!-- Search Input -->
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by product name..."
                        class="w-full h-10 pl-3 pr-12 rounded-lg border border-slate-300
                        bg-white text-sm text-slate-700 placeholder-slate-400
                        focus:outline-none focus:ring-2 focus:ring-blue-500
                        focus:border-blue-500"
                    >

                    <!-- Search Button -->
                    <button
                        type="submit"
                        class="absolute right-1 top-1 h-8 px-3
                        bg-blue-600 hover:bg-blue-700
                        text-white text-xs font-semibold
                        rounded-md transition-all duration-150
                        active:scale-95 flex items-center justify-center"
                    >
                        🔍
                    </button>
                </div>
            </form>
            </div>
            
        </div>

    </div>
</div>
</div>

@endsection