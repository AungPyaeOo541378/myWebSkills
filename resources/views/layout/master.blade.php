<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'MyWebSkills - Grow your web development skills')">
    <title>@yield('title', 'MyWebSkills')</title>

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Vite: Tailwind CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between p-4">
        <div>
            <!-- Brand Logo & Title -->
            <div class="flex items-center space-x-3 p-2 mb-6">
                <div class="bg-blue-600 text-white p-2 rounded-lg font-bold">&lt;/&gt;</div>
                <div>
                    <h1 class="font-bold text-white text-base">Web Skills Lab</h1>
                    <p class="text-xs text-slate-400">My Portfolio & Skills Demo</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1">
                <a href="{{ route('home') }}" class="nav-btn flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('home') ? 'bg-blue-600 text-white font-medium' : 'text-slate-400' }}">
                    <span data-lang-key="home">🏠 Home</span>
                </a>

                <a href="{{route('imgCRUD')}}" class="nav-btn flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('image.crud') ? 'bg-blue-600 text-white font-medium' : 'text-slate-400' }}">
                    <span data-lang-key="image_crud">🖼️ Image CRUD</span>
                </a>

                <a href="{{ route('textCRUD') }}" class="nav-btn flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('text.crud') ? 'bg-blue-600 text-white font-medium' : 'text-slate-400' }}">
                    <span data-lang-key="text_crud">📄 Text CRUD</span>
                </a>

                <a href="#" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-slate-800 text-slate-400 transition">
                    <span data-lang-key="search_filter">🔍 Search & Filter</span>
                </a>
            </nav>
        </div>

        <!-- Profile Info at Bottom Sidebar -->
        <div class="border-t border-slate-800 pt-4 flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-slate-700 flex items-center justify-center font-bold text-white">
                A
            </div>
            <div>
                <h2 class="text-sm font-semibold text-white">Aung Pyae Oo</h2>
                <p class="text-xs text-slate-400">Web Developer</p>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-y-auto">

        <!-- Top Navbar -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
            <div class="text-slate-500 font-medium" data-lang-key="dashboard">Dashboard</div>
            <div class="flex items-center space-x-3">
                <button class="text-gray-500 hover:text-gray-700">🔔</button>

                {{-- Language Switcher Button near Logout --}}
                <button type="button" id="langToggleBtn" onclick="toggleLanguage()" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs transition border border-slate-200 flex items-center gap-1.5 cursor-pointer shadow-2xs">
                    <span id="langFlag">🇬🇧</span> <span id="langLabel">EN</span>
                </button>

                <button class="text-slate-600 hover:text-slate-900 font-medium text-sm ml-2" data-lang-key="logout">Logout ➔</button>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6 bg-slate-50 flex-1">
            @yield('content')
        </main>

    </div>

</div>

    @stack('scripts')
</body>
<script>
    const translations = {
        en: {
            dashboard: "Dashboard",
            home: "🏠 Home",
            image_crud: "🖼️ Image CRUD",
            text_crud: "📄 Text CRUD",
            search_filter: "🔍 Search & Filter",
            logout: "Logout ➔",
            page_title: "📄 Text CRUD",
            page_subtitle: "Create, read, update and delete text records.",
            add_new_record: "➕ Add New Record",
            fill_all_fields: "Fill in all fields below and save.",
            title_label: "TITLE",
            writer_label: "WRITER",
            desc_label: "DESCRIPTION",
            title_placeholder: "Enter title…",
            writer_placeholder: "Enter writer name…",
            desc_placeholder: "Write content description here…",
            create_btn: "Create",
            all_records: "📋 All Records",
            manage_entries: "Manage your saved text entries.",
            records_suffix: "records",
            no_records_title: "No records yet",
            no_records_desc: "Add your first text record using the form on the left.",
            details: "Details",
            edit: "Edit",
            delete: "Delete",
            back: "Back",
            confirm_deletion: "Confirm Deletion",
            confirm_desc: "Are you sure you want to delete this text record?",
            no_cancel: "No, Cancel",
            yes_delete: "Yes, Delete",
            
        },
        ja: {
            dashboard: "ダッシュボード",
            home: "🏠 ホーム",
            image_crud: "🖼️ 画像 CRUD",
            text_crud: "📄 テキスト CRUD",
            search_filter: "🔍 検索 & フィルター",
            logout: "ログアウト ➔",
            page_title: "📄 テキスト CRUD",
            page_subtitle: "テキストレコードの作成、読み取り、更新、削除。",
            add_new_record: "➕ レコード追加",
            fill_all_fields: "以下の項目を入力して保存してください。",
            title_label: "タイトル",
            writer_label: "作成者",
            desc_label: "説明",
            title_placeholder: "タイトルを入力…",
            writer_placeholder: "作成者名を入力…",
            desc_placeholder: "説明コンテンツを入力…",
            create_btn: "作成する",
            all_records: "📋 すべてのレコード",
            manage_entries: "保存されたテキストエントリを管理します。",
            records_suffix: "件のレコード",
            no_records_title: "レコードがありません",
            no_records_desc: "左側のフォームを使用して最初のレコードを追加してください。",
            details: "詳細",
            edit: "編集",
            delete: "削除",
            back: "戻る",
            confirm_deletion: "削除の確認",
            confirm_desc: "このテキストレコードを削除してもよろしいですか？",
            no_cancel: "いいえ、キャンセル",
            yes_delete: "はい、削除します",
           
        }
    };

    let currentLang = localStorage.getItem('app_lang') || 'en';

    function applyLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('app_lang', lang);
        
        const flagElem = document.getElementById('langFlag');
        const labelElem = document.getElementById('langLabel');
        if (flagElem && labelElem) {
            flagElem.innerText = lang === 'en' ? '🇬🇧' : '🇯🇵';
            labelElem.innerText = lang === 'en' ? 'EN' : '日本語';
        }

        // Translate text contents
        document.querySelectorAll('[data-lang-key]').forEach(elem => {
            const key = elem.getAttribute('data-lang-key');
            if (translations[lang] && translations[lang][key]) {
                if (elem.tagName === 'INPUT' && elem.type === 'submit') {
                    elem.value = translations[lang][key];
                } else {
                    elem.innerText = translations[lang][key];
                }
            }
        });

        // Translate input placeholders
        document.querySelectorAll('[data-lang-placeholder]').forEach(elem => {
            const key = elem.getAttribute('data-lang-placeholder');
            if (translations[lang] && translations[lang][key]) {
                elem.placeholder = translations[lang][key];
            }
        });
    }

   
    function toggleLanguage() {
        const newLang = currentLang === 'en' ? 'ja' : 'en';
        applyLanguage(newLang);
    }

    document.addEventListener('DOMContentLoaded', () => {
        applyLanguage(currentLang);
    });

    function openDeleteModal(deleteUrl = null, title = null) {
        if (deleteUrl) {
            const btn = document.getElementById('confirmDeleteBtn');
            if (btn) btn.href = deleteUrl;
        }
        if (title) {
            const titleElem = document.getElementById('deleteItemTitle');
            if (titleElem) titleElem.innerText = `${title}`;
        }
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }


    function previewImage(event) {
        if (event.target.files && event.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                if (output) {
                    output.src = reader.result;
                }
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    }

   

</script>
</html>
