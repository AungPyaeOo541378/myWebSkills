@extends('layout.master')

@section('title', 'Home – Aung Pyae Oo')

@section('content')
<div class="relative min-h-[calc(100vh-120px)] rounded-3xl bg-gradient-to-br from-pink-50/60 via-purple-50/40 to-indigo-50/50 p-6 sm:p-10 lg:p-12 border border-purple-100/60 shadow-xs flex items-center overflow-hidden">

   
    <div class="absolute -top-20 -left-20 w-80 h-80 bg-pink-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-16 w-80 h-80 bg-purple-200/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative w-full grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-4 items-center">
        
      <!--left content-->
        <div class="lg:col-span-7 space-y-6">
            
           <!--name-->
            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Hi, I'm <span class="bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-500 bg-clip-text text-transparent">Aung Pyae Oo</span>
            </h1>

            <!--subtitle with colorful accents -->
            <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-xl">
                I build <span class="text-pink-600 font-semibold">modern</span>, 
                <span class="text-purple-600 font-semibold">accessible</span> and 
                <span class="text-blue-600 font-semibold">beautiful</span> web experiences that make an impact.
            </p>

           <!--buttons-->
            <div class="flex flex-wrap items-center gap-3 pt-2">
                <a href="" class="px-6 py-3 rounded-2xl bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white font-semibold text-sm shadow-lg shadow-purple-500/25 active:scale-95 transition cursor-pointer">
                    View My Work
                </a>
                <a href="" class="px-6 py-3 rounded-2xl bg-white/90 hover:bg-white text-slate-700 font-semibold text-sm border border-slate-200/80 shadow-xs active:scale-95 transition cursor-pointer">
                    Let's Connect
                </a>
            </div>

           <!--social icons-->
            <div class="flex items-center gap-3 pt-2">
                <span class="text-xs font-medium text-slate-400">Find me on</span>
                <a href="https://github.com" target="_blank" class="w-9 h-9 rounded-xl bg-white/90 hover:bg-white text-slate-700 hover:text-purple-600 flex items-center justify-center border border-slate-200/80 shadow-xs transition">
                    <i class="fa-brands fa-github text-sm"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" class="w-9 h-9 rounded-xl bg-white/90 hover:bg-white text-slate-700 hover:text-purple-600 flex items-center justify-center border border-slate-200/80 shadow-xs transition">
                    <i class="fa-brands fa-linkedin-in text-sm"></i>
                </a>
                <a href="https://facebook.com" target="_blank" class="w-9 h-9 rounded-xl bg-white/90 hover:bg-white text-slate-700 hover:text-purple-600 flex items-center justify-center border border-slate-200/80 shadow-xs transition">
                    <i class="fa-brands fa-facebook-f text-sm"></i>
                </a>
            </div>

            {{-- Location & Availability Tags --}}
            <div class="flex flex-wrap items-center gap-4 pt-3 text-xs text-slate-500 font-medium">
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-pink-500"></span>
                    <span>Based in Yangon, Myanmar</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Open to opportunities</span>
                </div>
            </div>

        </div>

        {{-- Right Content: Photo + Organic Blobs + Floating Cards --}}
        <div class="lg:col-span-5 relative flex items-center justify-center py-8">
            
            {{-- Purple Organic Blob Shape --}}
            <div class="absolute w-72 h-80 sm:w-80 sm:h-96 bg-gradient-to-tr from-purple-400 via-violet-400 to-indigo-400 rounded-[45%_55%_65%_35%/50%_45%_55%_50%] opacity-90 shadow-2xl shadow-purple-500/25"></div>
            
            {{-- Soft Lavender Background Blob --}}
            <div class="absolute w-80 h-72 sm:w-88 sm:h-84 bg-purple-200/60 rounded-[55%_45%_40%_60%/45%_55%_45%_55%] -rotate-12 blur-sm"></div>

            {{-- Profile Photo --}}
            <div class="relative z-10 flex items-center justify-center">
                <img src="{{ asset('images/apo.png') }}" alt="Aung Pyae Oo" class="w-64 sm:w-72 max-h-[380px] object-contain drop-shadow-xl">
            </div>

            {{-- Floating Card 1: Top-Left (Clean Code) --}}
            <div class="absolute -top-3 left-2 sm:-left-4 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2.5 rounded-2xl border border-white/80 shadow-lg shadow-purple-900/5">
                <h4 class="text-xs font-bold text-slate-800">Clean Code</h4>
                <p class="text-[10px] text-slate-500">Scalable & maintainable solutions</p>
            </div>

            {{-- Floating Card 2: Right-Middle (UI/UX Focused) --}}
            <div class="absolute top-1/2 -right-3 sm:-right-6 -translate-y-1/2 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2.5 rounded-2xl border border-white/80 shadow-lg shadow-purple-900/5">
                <h4 class="text-xs font-bold text-slate-800">UI/UX Focused</h4>
                <p class="text-[10px] text-slate-500">Designing intuitive experiences</p>
            </div>

            {{-- Floating Card 3: Bottom-Left (Performance) --}}
            <div class="absolute -bottom-4 left-4 sm:left-6 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2.5 rounded-2xl border border-white/80 shadow-lg shadow-purple-900/5">
                <h4 class="text-xs font-bold text-slate-800">Performance</h4>
                <p class="text-[10px] text-slate-500">Fast, optimized and user-friendly websites</p>
            </div>

        </div>

    </div>

</div>
@endsection
