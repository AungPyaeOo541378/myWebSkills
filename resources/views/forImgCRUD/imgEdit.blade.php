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
                <i class="fa-solid fa-bag-shopping text-blue-600"></i> Product Update
            </h1>
        </div>

       
    </div>

    {{-- Main Detail Card (2 Columns: Image Preview + Metadata) --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
            
            {{-- Left Column: Image Display (Col 5) --}}
            <div class="md:col-span-5 flex flex-col items-center">
                <div class="relative w-full rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 shadow-inner flex items-center justify-center p-3 group">
                    <img src="{{ asset('images/' . $dataImg->image) }}"  id="imagePreview" alt="{{ $dataImg->product_name }}" class="w-full max-h-[380px] object-contain rounded-xl drop-shadow-sm group-hover:scale-[1.02] transition duration-200">
                   
                </div>
                
                <!----NewImage Update ---->
            <form action="{{route ('updateImg')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-10">

                    <!--taking old data-->
                    <input type="hidden" name="id" value="{{ $dataImg->id }}">
                    <input type="hidden" name="old_image" value="{{ $dataImg->image }}">
                    <!--taking old data-->

                    
                    <input type="file" name="new_image" id="new_image"
                     accept="image/*" class="@error('new_image') 
                     border-2 border-red-400 bg-red-50 @enderror block w-full 
                     text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 
                     file:rounded-lg file:border-0 file:text-[11px] 
                     file:font-semibold file:bg-blue-50 file:text-blue-700 
                     hover:file:bg-blue-100 cursor-pointer transition
                     border border-slate-200 rounded-xl p-1 bg-slate-50/50 
                     focus:outline-none focus:ring-2 focus:ring-blue-500" 
                     onchange="previewImage(event)">
                    @error('image')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
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
                        <input type="text" name="product_name"
                         id="product_name" value="{{ $dataImg->product_name }}" 
                         class="@error('product_name') border-2 border-red-400
                          bg-red-50 @enderror block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer transition border border-slate-200 rounded-xl p-1 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('product_name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
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
                            <select name="category_id" id="category_id" class="@error('category_id') border-2 border-red-400 bg-red-50 @enderror block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer transition border border-slate-200 rounded-xl p-1 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $dataImg->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="rounded-xl border border-slate-200 overflow-hidden">
                        <div class="bg-indigo-700 px-4 py-1.5 text-white font-semibold text-xs uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-dollar-sign"></i> Price
                        </div>
                        <div class="p-3 bg-slate-50 text-emerald-600 font-bold text-lg">
                            <input type="text" name="price" id="price" value="{{ $dataImg->price }}" class="@error('price') border-2 border-red-400 bg-red-50 @enderror block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer transition border border-slate-200 rounded-xl p-1 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('price')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Description Field --}}
                <div class="rounded-xl border border-slate-200 overflow-hidden">
                    <div class="bg-indigo-700 px-4 py-2 text-white font-semibold text-xs uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-align-left"></i> Description
                    </div>
                    <div class="p-4 bg-slate-50 text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                        <textarea name="description" id="description" rows="9" cols="70" class="@error('description') border-2 border-red-400 bg-red-50 @enderror block w-full text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer transition border border-slate-200 rounded-xl p-1 bg-slate-50/50 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $dataImg->description }}</textarea>
                        @error('description')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                 <div class="flex items-end justify-end">
            {{-- Update Button --}}
               <input type="submit" name="update_product" value="Update" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 active:scale-95 text-white font-semibold text-xs rounded-xl transition shadow-xs">

        </div>

                </form>


            </div>

        </div>
    </div>

</div>

@endsection

@section('script')
<script>
    function previewImage(event) {
        const imageInput = event.target;
        const imagePreview = document.getElementById('imagePreview');

        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(imageInput.files[0]);
        }
    }
</script>
@endsection

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
                <i class="fa-solid fa-bag-shopping text-blue-600"></i> Product Update
            </h1>
        </div>

        <div class="flex items-center gap-2.5">
            {{-- Edit Button --}}
            <a href="" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 active:scale-95 text-white font-semibold text-xs rounded-xl transition shadow-xs">
                <i class="fa-solid fa-pen-to-square"></i> Update
            </a>

        </div>
    </div>

    {{-- Main Detail Card (2 Columns: Image Preview + Metadata) --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
            
            {{-- Left Column: Image Display (Col 5) --}}
            <div class="md:col-span-5 flex flex-col items-center">
                <div class="relative w-full rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 shadow-inner flex items-center justify-center p-3 group">
                    <img src="{{ asset('images/' . $dataImg->image) }}" id="imagePreview" alt="{{ $dataImg->product_name }}" class="w-full max-h-[380px] object-contain rounded-xl drop-shadow-sm group-hover:scale-[1.02] transition duration-200">
                </div>
                
                <!----NewImage Update ---->
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <input type="file" name="image" id="image"
                     accept="image/*" class="@error('image') 
                     border-2 border-red-400 bg-red-50 @enderror block w-full 
                     text-xs text-slate-500 file:mr-2.5 file:py-1 file:px-2.5 
                     file:rounded-lg file:border-0 file:text-[11px] 
                     file:font-semibold file:bg-blue-50 file:text-blue-700 
                     hover:file:bg-blue-100 cursor-pointer transition
                     border border-slate-200 rounded-xl p-1 bg-slate-50/50 
                     focus:outline-none focus:ring-2 focus:ring-blue-500" 
                     onchange="previewImage(event)">
                    @error('image')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
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

                </form>


            </div>

        </div>
    </div>

</div>


@endsection