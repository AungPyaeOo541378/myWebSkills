{{-- ── Custom Delete Confirmation Alert Modal Card ── --}}
<div id="deleteModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 space-y-5 border border-slate-100 animate-in fade-in zoom-in duration-150">
        
        {{-- Icon & Header --}}
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-800" data-lang-key="confirm_deletion">Confirm Deletion</h3>
                <p class="text-xs text-slate-500 mt-0.5" data-lang-key="confirm_desc">Are you sure you want to delete this text record?</p>
            </div>
        </div>

        {{-- Record Title Preview --}}
        <div class="bg-slate-50 border border-slate-200 rounded-xl p-3.5 text-sm text-slate-700">
            <span class="font-semibold text-slate-900" data-lang-key="title_label">Title:</span> <span id="deleteItemTitle">"{{ $dataID->title ?? 'Selected Record' }}"</span>
        </div>

        {{-- Action Anchors: Yes / No --}}
        <div class="flex items-center justify-end gap-3 pt-2">
            {{-- No / Cancel Anchor --}}
            <a href="javascript:void(0)" onclick="closeDeleteModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-xl transition cursor-pointer" data-lang-key="no_cancel">
                No, Cancel
            </a>

            {{-- Yes, Delete Anchor --}}
            <a id="confirmDeleteBtn" href="{{ isset($dataID) ? route('textDelete', $dataID->id) : '#' }}" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 active:scale-95 text-white font-semibold text-sm rounded-xl transition shadow-sm inline-flex items-center gap-2 cursor-pointer" data-lang-key="yes_delete">
                <i class="fa-solid fa-trash"></i> Yes, Delete
            </a>
        </div>

    </div>
</div>
